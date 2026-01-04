<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Production Optimizations
    |--------------------------------------------------------------------------
    */

    'production' => [
        // Enable aggressive caching
        'cache' => [
            'default' => env('CACHE_DRIVER', 'redis'),
            'stores' => [
                'redis' => [
                    'driver' => 'redis',
                    'connection' => 'cache',
                    'lock_connection' => 'default',
                ],
            ],
        ],

        // Session configuration
        'session' => [
            'driver' => env('SESSION_DRIVER', 'redis'),
            'lifetime' => env('SESSION_LIFETIME', 120),
            'expire_on_close' => false,
            'encrypt' => false,
            'files' => storage_path('framework/sessions'),
            'connection' => null,
            'table' => 'sessions',
            'store' => null,
            'lottery' => [2, 100],
            'cookie' => env('SESSION_COOKIE', 'culture_session'),
            'path' => '/',
            'domain' => env('SESSION_DOMAIN'),
            'secure' => env('SESSION_SECURE_COOKIE', true),
            'http_only' => true,
            'same_site' => env('SESSION_SAME_SITE', 'lax'),
        ],

        // Queue configuration
        'queue' => [
            'default' => env('QUEUE_CONNECTION', 'redis'),
            'connections' => [
                'redis' => [
                    'driver' => 'redis',
                    'connection' => 'default',
                    'queue' => env('REDIS_QUEUE', 'default'),
                    'retry_after' => 90,
                    'after_commit' => false,
                ],
            ],
        ],

        // Performance optimizations
        'optimizations' => [
            'opcode_cache' => true,
            'realpath_cache' => true,
            'output_buffering' => true,
            'gzip_compression' => true,
        ],

        // Security settings
        'security' => [
            'force_https' => env('FORCE_HTTPS', true),
            'security_headers' => env('SECURITY_HEADERS_ENABLED', true),
            'rate_limiting' => env('RATE_LIMITING_ENABLED', true),
            'rate_limit_attempts' => env('RATE_LIMIT_ATTEMPTS', 60),
            'rate_limit_minutes' => env('RATE_LIMIT_MINUTES', 1),
        ],

        // File upload settings
        'uploads' => [
            'max_file_size' => env('MAX_FILE_SIZE', 10240), // KB
            'allowed_types' => explode(',', env('ALLOWED_FILE_TYPES', 'jpg,jpeg,png,gif,pdf,doc,docx')),
            'storage_path' => env('FILESYSTEM_DISK', 'local'),
        ],

        // Monitoring settings
        'monitoring' => [
            'health_check_enabled' => true,
            'metrics_enabled' => true,
            'log_level' => env('LOG_LEVEL', 'warning'),
            'slow_query_threshold' => 1000, // ms
        ],

        // Cache settings
        'cache_settings' => [
            'prefix' => env('CACHE_PREFIX', 'culture_'),
            'ttl' => [
                'short' => 300,      // 5 minutes
                'medium' => 3600,    // 1 hour
                'long' => 86400,     // 24 hours
                'very_long' => 604800, // 7 days
            ],
        ],

        // Database optimizations
        'database' => [
            'persistent_connections' => true,
            'connection_pool_size' => 20,
            'query_cache' => true,
            'slow_query_log' => true,
        ],

        // Email configuration
        'mail' => [
            'default' => env('MAIL_MAILER', 'smtp'),
            'mailers' => [
                'smtp' => [
                    'transport' => 'smtp',
                    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
                    'port' => env('MAIL_PORT', 587),
                    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
                    'username' => env('MAIL_USERNAME'),
                    'password' => env('MAIL_PASSWORD'),
                    'timeout' => null,
                    'auth_mode' => null,
                ],
            ],
        ],
    ],
];
