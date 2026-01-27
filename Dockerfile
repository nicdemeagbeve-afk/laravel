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

# Optimiser PHP-FPM config
RUN echo '[www]\nuser = www-data\ngroup = www-data\nlisten = 0.0.0.0:9000\npm.max_children = 20\npm.start_servers = 5\npm.min_spare_servers = 5\npm.max_spare_servers = 10\npm.max_requests = 1000' > /usr/local/etc/php-fpm.d/www.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader && \
    composer dump-autoload --optimize

# Créer le répertoire pour les logs
RUN mkdir -p /app/storage/logs && \
    chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 777 /app/storage /app/bootstrap/cache

# Créer le script d'initialisation avec meilleur diagnostic
RUN cat > /usr/local/bin/entrypoint.sh << 'EOF'
#!/bin/bash
set -e

echo "========================================="
echo "Laravel Docker Container Initialization"
echo "========================================="

# Attendre la base de données avec timeout
echo "Waiting for database..."
for i in {1..30}; do
    if nc -z db 3306 2>/dev/null; then
        echo "Database is ready!"
        break
    fi
    echo "Waiting... attempt $i/30"
    sleep 2
done

# Nettoyer les caches Laravel
echo "Clearing Laravel caches..."
php artisan config:clear 2>&1 || true
php artisan cache:clear 2>&1 || true
php artisan route:clear 2>&1 || true
php artisan view:clear 2>&1 || true

# Générer la clé d'application si absent
echo "Checking app key..."
php artisan key:generate --force 2>&1 || true

# Exécuter les migrations
echo "Running database migrations..."
php artisan migrate --force 2>&1 || true

# Configurer les permissions finales
echo "Setting permissions..."
chown -R www-data:www-data /app
chmod -R 777 /app/storage /app/bootstrap/cache

# Vérifier la configuration
echo "Checking configuration..."
php artisan config:cache 2>&1 || true

echo "========================================="
echo "Container ready. Starting PHP-FPM..."
echo "========================================="

# Démarrer PHP-FPM en foreground
exec php-fpm --nodaemonize
EOF
chmod +x /usr/local/bin/entrypoint.sh

# Installer netcat pour health checks
RUN apt-get update && apt-get install -y netcat-openbsd && rm -rf /var/lib/apt/lists/*

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
