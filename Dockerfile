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
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    bcmath \
    gd \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Définir les permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Exposer le port 80
EXPOSE 80

# Démarrer PHP-FPM
CMD ["php-fpm"]
