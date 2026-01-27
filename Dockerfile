# Build stage
FROM node:20-alpine as node-builder
WORKDIR /app
COPY package*.json ./
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm ci
RUN npm run build

# PHP stage
FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    libzip-dev \
    zip \
    curl \
    git

# Install PHP extensions (including MySQL)
RUN docker-php-ext-install pdo pdo_mysql zip

# Set working directory
WORKDIR /app

# Copy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files (excluding .env)
COPY --exclude=.env . .

# Copy built assets from node stage (overwrite with fresh build)
COPY --from=node-builder /app/public/build ./public/build

# Create .env file for build from example
RUN cp .env.example .env

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set proper permissions first
RUN chown -R www-data:www-data /app && \
    chmod -R 755 /app/storage /app/bootstrap/cache

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
