FROM php:8.2-fpm

WORKDIR /app

# Installer les dépendances système + Nginx
RUN apt-get update && apt-get install -y \
    curl \
    git \
    libmysqlclient-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    mysql-client \
    netcat-openbsd \
    nginx \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    bcmath \
    gd \
    zip \
    opcache \
    && rm -rf /var/lib/apt/lists/*

# Configurer PHP pour production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# PHP configuration
RUN echo "error_reporting = E_ALL\ndisplay_errors = On\nlog_errors = On\nerror_log = /var/log/php-error.log" >> "$PHP_INI_DIR/php.ini"

# Configurer PHP-FPM
RUN echo '[www]\nuser = www-data\ngroup = www-data\nlisten = 127.0.0.1:9000\npm.max_children = 20\npm.start_servers = 5\npm.min_spare_servers = 5\npm.max_spare_servers = 10\npm.max_requests = 1000\ncatch_workers_output = yes' > /usr/local/etc/php-fpm.d/www.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist && \
    composer dump-autoload --optimize

# Créer les répertoires
RUN mkdir -p /app/storage/logs /app/bootstrap/cache && \
    chown -R www-data:www-data /app && \
    chmod -R 755 /app && \
    chmod -R 777 /app/storage /app/bootstrap/cache

# Configurer Nginx
RUN mkdir -p /etc/nginx/sites-available /etc/nginx/sites-enabled && \
    cat > /etc/nginx/sites-available/default << 'NGINXEOF'
server {
    listen 80 default_server;
    listen [::]:80 default_server;
    server_name _;
    root /app/public;
    index index.php;

    client_max_body_size 100M;
    gzip on;
    gzip_types text/plain text/css text/xml text/javascript application/x-javascript application/xml+rss;

    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
        fastcgi_connect_timeout 60s;
        fastcgi_send_timeout 60s;
        fastcgi_read_timeout 60s;
    }

    location ~ /\.(?!well-known).* {
        deny all;
        access_log off;
        log_not_found off;
    }

    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    error_log /var/log/nginx/laravel_error.log;
    access_log /var/log/nginx/laravel_access.log;
}
NGINXEOF
ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Configurer Supervisor pour gérer PHP-FPM et Nginx
RUN mkdir -p /var/log/supervisor && \
    cat > /etc/supervisor/conf.d/supervisord.conf << 'SUPERVISOREOF'
[supervisord]
nodaemon=true
logfile=/var/log/supervisor/supervisord.log
pidfile=/var/run/supervisord.pid

[program:php-fpm]
command=php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.d/www.conf
autostart=true
autorestart=true
stderr_logfile=/var/log/supervisor/php-fpm.err.log
stdout_logfile=/var/log/supervisor/php-fpm.out.log

[program:nginx]
command=nginx -g "daemon off;"
autostart=true
autorestart=true
stderr_logfile=/var/log/supervisor/nginx.err.log
stdout_logfile=/var/log/supervisor/nginx.out.log
SUPERVISOREOF

# Créer le script d'initialisation
RUN cat > /usr/local/bin/entrypoint.sh << 'ENTRYEOF'
#!/bin/bash
set -e

echo "======================================"
echo "Laravel Docker Container - Starting"
echo "======================================"

# Attendre la DB
echo "Waiting for database..."
for i in {1..60}; do
    if nc -z ${DB_HOST:-db} ${DB_PORT:-3306} 2>/dev/null; then
        echo "✓ Database is ready!"
        break
    fi
    echo "  Attempt $i/60..."
    sleep 2
done

# Attendre un peu plus pour que MySQL soit vraiment prêt
sleep 5

# Nettoyer les caches
echo "Clearing caches..."
php artisan config:clear 2>&1 || true
php artisan cache:clear 2>&1 || true
php artisan route:clear 2>&1 || true
php artisan view:clear 2>&1 || true

# Générer la clé
echo "Generating APP_KEY..."
php artisan key:generate --force 2>&1 || true

# Migrations
echo "Running migrations..."
php artisan migrate --force 2>&1 || true

# Permissions
echo "Setting permissions..."
chown -R www-data:www-data /app
chmod -R 777 /app/storage /app/bootstrap/cache

echo "Caching configuration..."
php artisan config:cache 2>&1 || true

echo "======================================"
echo "✓ Container is ready - Starting services"
echo "======================================"
echo ""

# Démarrer Supervisor (qui gère PHP-FPM et Nginx)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
ENTRYEOF
chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

echo "Caching configuration..."
php artisan config:cache 2>&1 || true

echo "Setting permissions..."
chown -R www-data:www-data /app
chmod -R 777 /app/storage /app/bootstrap/cache

echo ""
echo "======================================"
echo "Container is ready - PHP-FPM starting"
echo "======================================"
echo ""

# Afficher les logs
tail -f /var/log/php-error.log &

# Démarrer PHP-FPM en foreground
exec php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.d/www.conf
ENTRYEOF
chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
