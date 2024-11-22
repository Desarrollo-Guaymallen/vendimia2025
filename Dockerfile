# Dockerfile para el contenedor de PHP
FROM php:8.2-fpm

# Instalación de librerías necesarias y extensiones de PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \              
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql gd # <-- Aseguramos que se instale pdo_pgsql y gd

# Añadir Node.js al contenedor de PHP (opcional si no usas el servicio de Vite separado)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Copiamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecemos el directorio de trabajo
WORKDIR /var/www

# Copiamos el código fuente al contenedor
COPY . .

# Instalamos dependencias de PHP
RUN composer install --no-interaction --optimize-autoloader

# Cambiamos permisos para el directorio de almacenamiento
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponemos el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando por defecto para iniciar PHP-FPM
CMD ["php-fpm"]
