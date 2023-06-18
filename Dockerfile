FROM webdevops/php-nginx:7.4

# Add your application code
COPY . /app

# Set the working directory
WORKDIR /app

RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
RUN composer install
COPY .env.example .env
RUN php artisan key:generate
EXPOSE 80
# Run the application
CMD ["php", "artisn", "serve", "--port=80"]