#!/bin/bash
set -e

echo "🚀 Laravel starting..."

# Wait DB
for i in {1..30}; do
  nc -z ${DB_HOST:-db} ${DB_PORT:-3306} && break
  sleep 2
done

php artisan key:generate --force || true
php artisan migrate --force || true
php artisan config:clear || true
php artisan config:cache || true

chown -R www-data:www-data /app
chmod -R 775 storage bootstrap/cache


# Check Nginx configuration
nginx -t || (cat /var/log/nginx/error.log && exit 1)

exec /usr/bin/supervisord

