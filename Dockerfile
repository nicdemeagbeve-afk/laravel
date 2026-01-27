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
    && rm -rf /var/lib/apt/lists/*

# Configurer PHP pour production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader && \
    composer dump-autoload --optimize

# Créer le script d'initialisation
RUN echo '#!/bin/bash\n\
echo "Attendre la base de données..."\n\
sleep 10\n\
\n\
echo "Générer la clé d\'application..."\n\
php artisan key:generate --force\n\
\n\
echo "Nettoyer les caches..."\n\
php artisan config:clear\n\
php artisan cache:clear\n\
php artisan route:clear\n\
php artisan view:clear\n\
\n\
echo "Exécuter les migrations..."\n\
php artisan migrate --force\n\
\n\
echo "Configurer les permissions..."\n\
chmod -R 775 /app/storage /app/bootstrap/cache\n\
chown -R www-data:www-data /app\n\
\n\
echo "Démarrer PHP-FPM..."\n\
php-fpm' > /usr/local/bin/start.sh && \
chmod +x /usr/local/bin/start.sh

# Définir les permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache

# Exposer le port 9000 (PHP-FPM)
EXPOSE 9000

# Démarrer avec le script
CMD ["/usr/local/bin/start.sh"]
