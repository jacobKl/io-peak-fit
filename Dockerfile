FROM php:8.2
# Install necessary packages
RUN apt-get update -y \
    && apt-get install -y openssl zip unzip git libicu-dev zlib1g-dev libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo intl zip
# Set working directory
WORKDIR /app
# Copy application files
COPY . /app
# Command to run the application
CMD php artisan serve --host=0.0.0.0 --port=8181
# Expose port 8181
EXPOSE 8181 