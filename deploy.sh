#!/bin/bash

# Production Deployment Script for Culture Bénin
# This script prepares and deploys the application for production

set -e

echo "🚀 Starting Culture Bénin Production Deployment..."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Helper functions
print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

# Check if running as root
if [ "$EUID" -ne 0 ]; then
    print_error "This script must be run as root (use sudo)"
    exit 1
fi

# Set variables
APP_DIR="/var/www/culture"
BACKUP_DIR="/var/backups/culture"
DATE=$(date +%Y%m%d_%H%M%S)

echo "📋 Deployment Configuration:"
echo "   App Directory: $APP_DIR"
echo "   Backup Directory: $BACKUP_DIR"
echo "   Timestamp: $DATE"

# Create backup directory
mkdir -p $BACKUP_DIR

# Function to backup current installation
backup_current() {
    if [ -d "$APP_DIR" ]; then
        print_warning "Creating backup of current installation..."
        tar -czf "$BACKUP_DIR/culture_backup_$DATE.tar.gz" -C "$(dirname $APP_DIR)" "$(basename $APP_DIR)"
        print_success "Backup created: $BACKUP_DIR/culture_backup_$DATE.tar.gz"
    fi
}

# Function to update system packages
update_system() {
    print_warning "Updating system packages..."
    apt update && apt upgrade -y
    print_success "System packages updated"
}

# Function to install required packages
install_packages() {
    print_warning "Installing required packages..."
    apt install -y nginx curl wget unzip git software-properties-common \
        certbot python3-certbot-nginx redis-server \
        php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl \
        php8.2-zip php8.2-gd php8.2-intl php8.2-bcmath
    print_success "Required packages installed"
}

# Function to setup SSL certificate
setup_ssl() {
    DOMAIN=$1
    if [ -z "$DOMAIN" ]; then
        print_error "Domain name is required for SSL setup"
        return 1
    fi
    
    print_warning "Setting up SSL certificate for $DOMAIN..."
    certbot --nginx -d $DOMAIN -d www.$DOMAIN --non-interactive --agree-tos --email admin@$DOMAIN
    print_success "SSL certificate installed for $DOMAIN"
}

# Function to setup database
setup_database() {
    print_warning "Setting up database..."
    
    # Create database if it doesn't exist
    mysql -u root -p$DB_PASSWORD -e "CREATE DATABASE IF NOT EXISTS culture_production;"
    
    # Import database if dump file exists
    if [ -f "database_dump.sql" ]; then
        mysql -u root -p$DB_PASSWORD culture_production < database_dump.sql
        print_success "Database imported from dump"
    fi
    
    print_success "Database setup completed"
}

# Function to optimize Laravel
optimize_laravel() {
    print_warning "Optimizing Laravel application..."
    
    cd $APP_DIR
    
    # Clear and cache configurations
    php artisan config:clear
    php artisan cache:clear
    php artisan route:clear
    php artisan view:clear
    
    # Optimize for production
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan optimize
    
    # Run migrations
    php artisan migrate --force
    
    # Seed database if needed
    if [ "$1" = "--seed" ]; then
        php artisan db:seed --force
    fi
    
    # Set correct permissions
    chown -R www-data:www-data $APP_DIR
    chmod -R 755 $APP_DIR/storage
    chmod -R 755 $APP_DIR/bootstrap/cache
    
    print_success "Laravel optimization completed"
}

# Function to setup cron jobs
setup_cron() {
    print_warning "Setting up cron jobs..."
    
    # Add Laravel scheduler
    (crontab -l 2>/dev/null; echo "* * * * * cd $APP_DIR && php artisan schedule:run >> /dev/null 2>&1") | crontab -
    
    # Add log rotation
    cat > /etc/logrotate.d/culture << EOF
$APP_DIR/storage/logs/*.log {
    daily
    missingok
    rotate 52
    compress
    delaycompress
    notifempty
    create 644 www-data www-data
    postrotate
        php $APP_DIR/artisan log:clear --keep=30
    endscript
}
EOF
    
    print_success "Cron jobs configured"
}

# Function to setup monitoring
setup_monitoring() {
    print_warning "Setting up basic monitoring..."
    
    # Create health check endpoint
    cat > $APP_DIR/routes/monitoring.php << 'EOF'
<?php

use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
        'version' => app()->version(),
    ]);
});

Route::get('/metrics', function () {
    // Basic metrics for monitoring
    return response()->json([
        'active_users' => \App\Models\User::count(),
        'total_contents' => \App\Models\Contenu::count(),
        'total_payments' => \App\Models\Payment::count(),
        'timestamp' => now()->toISOString(),
    ]);
});
EOF
    
    print_success "Monitoring endpoints configured"
}

# Main deployment flow
main() {
    echo "🎯 Starting production deployment..."
    
    # Check for required environment variables
    if [ -z "$DB_PASSWORD" ] || [ -z "$DOMAIN" ]; then
        print_error "Please set DB_PASSWORD and DOMAIN environment variables"
        echo "Usage: DB_PASSWORD=your_password DOMAIN=yourdomain.com sudo ./deploy.sh"
        exit 1
    fi
    
    # Backup current installation
    backup_current
    
    # Update and install packages
    update_system
    install_packages
    
    # Setup application directory
    mkdir -p $APP_DIR
    chown www-data:www-data $APP_DIR
    
    # Copy application files (assuming script is run from app directory)
    cp -r . $APP_DIR/
    
    # Setup database
    setup_database
    
    # Setup SSL
    setup_ssl $DOMAIN
    
    # Setup Nginx configuration
    cp nginx.conf /etc/nginx/sites-available/culture
    ln -sf /etc/nginx/sites-available/culture /etc/nginx/sites-enabled/
    nginx -t && systemctl reload nginx
    
    # Optimize Laravel
    optimize_laravel $1
    
    # Setup cron jobs
    setup_cron
    
    # Setup monitoring
    setup_monitoring
    
    # Restart services
    systemctl restart nginx
    systemctl restart php8.2-fpm
    systemctl restart redis-server
    
    print_success "🎉 Deployment completed successfully!"
    echo ""
    echo "📊 Application Information:"
    echo "   URL: https://$DOMAIN"
    echo "   Health Check: https://$DOMAIN/health"
    echo "   Metrics: https://$DOMAIN/metrics"
    echo "   Logs: $APP_DIR/storage/logs/"
    echo ""
    echo "🔧 Next Steps:"
    echo "   1. Update your .env file with production values"
    echo "   2. Configure your FedaPay API keys"
    echo "   3. Test all functionality"
    echo "   4. Setup monitoring and alerts"
    echo ""
    echo "📁 Backup location: $BACKUP_DIR/culture_backup_$DATE.tar.gz"
}

# Run main function with all arguments
main "$@"
