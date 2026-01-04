# Culture Bénin - Production Deployment Guide

## 🚀 Production Ready Setup

This guide will help you deploy the Culture Bénin application to production with all security optimizations and best practices.

## 📋 Prerequisites

- Ubuntu 20.04+ or CentOS 8+
- Nginx web server
- PHP 8.2+
- MySQL 8.0+
- Redis server
- SSL certificate (Let's Encrypt recommended)
- Domain name configured

## 🔧 Quick Deployment

### 1. Automated Deployment
```bash
# Set environment variables
export DB_PASSWORD="your_secure_password"
export DOMAIN="yourdomain.com"

# Run deployment script
sudo DB_PASSWORD=$DB_PASSWORD DOMAIN=$DOMAIN ./deploy.sh
```

### 2. Manual Deployment

#### System Setup
```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install required packages
sudo apt install -y nginx curl wget unzip git software-properties-common \
    certbot python3-certbot-nginx redis-server \
    php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl \
    php8.2-zip php8.2-gd php8.2-intl php8.2-bcmath
```

#### Application Setup
```bash
# Clone repository
git clone <your-repo-url> /var/www/culture
cd /var/www/culture

# Set permissions
sudo chown -R www-data:www-data /var/www/culture
sudo chmod -R 755 /var/www/culture/storage
sudo chmod -R 755 /var/www/culture/bootstrap/cache

# Install dependencies
composer install --no-dev --optimize-autoloader

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure database
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan db:seed --force
```

#### Nginx Configuration
```bash
# Copy nginx configuration
sudo cp nginx.conf /etc/nginx/sites-available/culture
sudo ln -sf /etc/nginx/sites-available/culture /etc/nginx/sites-enabled/

# Test and reload nginx
sudo nginx -t
sudo systemctl reload nginx
```

#### SSL Setup
```bash
# Install SSL certificate
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

## 🔒 Security Configuration

### Environment Variables
```bash
# Production .env configuration
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Security
FORCE_HTTPS=true
SECURITY_HEADERS_ENABLED=true
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=culture_production
DB_USERNAME=culture_user
DB_PASSWORD=secure_password

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis

# FedaPay (Production)
FEDAPAY_API_KEY=your_production_api_key
FEDAPAY_ENVIRONMENT=live
```

### Security Headers
The application includes security headers middleware:
- X-Content-Type-Options: nosniff
- X-Frame-Options: SAMEORIGIN
- X-XSS-Protection: 1; mode=block
- Referrer-Policy: strict-origin-when-cross-origin
- Content-Security-Policy: strict policy
- Strict-Transport-Security: HSTS for HTTPS

### Rate Limiting
```bash
# Enable rate limiting in .env
RATE_LIMITING_ENABLED=true
RATE_LIMIT_ATTEMPTS=60
RATE_LIMIT_MINUTES=1
```

## 🐳 Docker Deployment

### Docker Compose (Production)
```bash
# Build and start containers
docker-compose -f docker-compose.prod.yml up -d

# Run migrations
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force

# Seed database
docker-compose -f docker-compose.prod.yml exec app php artisan db:seed --force
```

### Dockerfile
The application includes a production-ready Dockerfile with:
- PHP 8.2-FPM
- Required extensions
- Optimized for production
- Security hardening

## 📊 Monitoring & Health Checks

### Health Endpoints
- `/health` - Application health status
- `/metrics` - Application metrics
- `/up` - Laravel health check

### Monitoring Setup
```bash
# Setup cron jobs
crontab -e

# Add Laravel scheduler
* * * * * cd /var/www/culture && php artisan schedule:run >> /dev/null 2>&1

# Log rotation
sudo nano /etc/logrotate.d/culture
```

## 🔧 Performance Optimization

### Caching
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### Redis Configuration
```bash
# Redis configuration for caching
redis-cli CONFIG SET save "900 1 300 10 60 10000"
redis-cli CONFIG SET maxmemory 256mb
redis-cli CONFIG SET maxmemory-policy allkeys-lru
```

## 🛡️ Security Best Practices

1. **Environment Security**
   - Never commit .env to version control
   - Use strong, unique passwords
   - Rotate secrets regularly

2. **File Permissions**
   - Web files: 755
   - Storage: 755
   - Sensitive files: 600

3. **Database Security**
   - Use dedicated database user
   - Limit privileges
   - Enable SSL connections

4. **Network Security**
   - Use HTTPS only
   - Implement firewall rules
   - Use fail2ban for brute force protection

## 🔄 Backup Strategy

### Automated Backups
```bash
# Create backup script
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/var/backups/culture"

# Database backup
mysqldump -u culture_user -p culture_production > $BACKUP_DIR/db_backup_$DATE.sql

# Files backup
tar -czf $BACKUP_DIR/files_backup_$DATE.tar.gz /var/www/culture/storage

# Cleanup old backups (keep 30 days)
find $BACKUP_DIR -name "*.sql" -mtime +30 -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +30 -delete
```

### Restore Process
```bash
# Restore database
mysql -u culture_user -p culture_production < db_backup_DATE.sql

# Restore files
tar -xzf files_backup_DATE.tar.gz -C /var/www/culture/
```

## 📱 CDN Integration

### Cloudflare Setup
1. Sign up for Cloudflare
2. Add your domain
3. Update nameservers
4. Enable SSL/TLS (Full mode)
5. Configure caching rules
6. Enable security features

### Asset Optimization
```bash
# Install npm packages for asset optimization
npm install
npm run build

# Configure CDN in .env
ASSET_URL=https://cdn.yourdomain.com
```

## 🚀 Scaling Considerations

### Horizontal Scaling
- Use load balancer (Nginx, HAProxy)
- Multiple application servers
- Shared Redis for sessions/cache
- Database read replicas

### Vertical Scaling
- Increase server resources
- Optimize PHP-FPM settings
- Database tuning
- Caching layers

## 📞 Support & Troubleshooting

### Common Issues
1. **500 Internal Server Error**
   - Check Laravel logs: `storage/logs/laravel.log`
   - Verify file permissions
   - Check .env configuration

2. **Database Connection Error**
   - Verify database credentials
   - Check MySQL service status
   - Test connection manually

3. **SSL Certificate Issues**
   - Check certificate expiration
   - Verify Nginx SSL configuration
   - Renew with certbot

### Log Locations
- Laravel logs: `/var/www/culture/storage/logs/`
- Nginx logs: `/var/log/nginx/`
- PHP logs: `/var/log/php8.2-fpm.log`
- MySQL logs: `/var/log/mysql/`

## 🎯 Post-Deployment Checklist

- [ ] SSL certificate installed and valid
- [ ] Security headers configured
- [ ] Database optimized
- [ ] Caching enabled
- [ ] Monitoring setup
- [ ] Backup strategy implemented
- [ ] Performance testing completed
- [ ] Security audit performed
- [ ] Documentation updated
- [ ] Team training completed

## 📞 Emergency Contacts

- Hosting provider support
- Domain registrar
- SSL certificate provider
- Monitoring service

---

**Note**: This deployment guide assumes you have root access to your server and basic knowledge of Linux system administration.
