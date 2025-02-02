# Utilizza un'immagine base di PHP 8.2 con Apache
FROM php:8.2-apache

# Installa le dipendenze di sistema necessarie
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installa Node.js per Vue 3 e Tailwind CSS
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Configura la directory di lavoro
WORKDIR /var/www/html

# Copia i file del progetto nel container
COPY . /var/www/html

# Installa le dipendenze PHP
RUN composer install --no-dev --optimize-autoloader

# Installa le dipendenze Node.js
RUN npm install && npm run build

# Imposta i permessi corretti per la directory di lavoro
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Espone la porta 80
EXPOSE 80

# Comando per avviare Apache
CMD ["apache2-foreground"]
