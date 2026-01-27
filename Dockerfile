FROM php:8.2-fpm

WORKDIR /app

# Installer les dépendances système
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

# Optimiser PHP pour logs visibles
RUN echo "error_reporting = E_ALL\ndisplay_errors = On\nlog_errors = On\nerror_log = /var/log/php-error.log" >> "$PHP_INI_DIR/php.ini"

# Configurer PHP-FPM
RUN echo '[www]\nuser = www-data\ngroup = www-data\nlisten = 0.0.0.0:9000\npm.max_children = 20\npm.start_servers = 5\npm.min_spare_servers = 5\npm.max_spare_servers = 10\npm.max_requests = 1000\ncatch_workers_output = yes' > /usr/local/etc/php-fpm.d/www.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist && \
    composer dump-autoload --optimize

# Créer les répertoires nécessaires
RUN mkdir -p /app/storage/logs /app/bootstrap/cache && \
    chown -R www-data:www-data /app && \
    chmod -R 755 /app && \
    chmod -R 777 /app/storage /app/bootstrap/cache

# Créer le script de démarrage avec diagnostic
RUN cat > /usr/local/bin/entrypoint.sh << 'ENTRYEOF'
#!/bin/bash
set -e

echo "======================================"
echo "Laravel Container - Starting..."
echo "======================================"
echo "PHP Version: $(php -v)"
echo "Working Directory: $(pwd)"
echo "Files:"
ls -la /app | head -20

# Attendre la DB
echo ""
echo "Waiting for database on db:3306..."
for i in {1..60}; do
    if nc -z db 3306 2>/dev/null; then
        echo "✓ Database is ready!"
        break
    fi
    echo "  Attempt $i/60..."
    sleep 1
done

# Vérifier la connexion
echo ""
echo "Testing database connection..."
php -r "
try {
    \$pdo = new PDO('mysql:host=db;port=3306', 'laravel', 'password');
    echo '✓ MySQL connection OK\n';
} catch (\Exception \$e) {
    echo '✗ MySQL Error: ' . \$e->getMessage() . '\n';
    exit(1);
}
"

echo ""
echo "Clearing caches..."
php artisan config:clear 2>&1 || true
php artisan cache:clear 2>&1 || true
php artisan route:clear 2>&1 || true
php artisan view:clear 2>&1 || true

echo "Generating APP_KEY..."
php artisan key:generate --force 2>&1 || true

echo "Running migrations..."
php artisan migrate --force 2>&1 || true

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
