# استخدام صورة PHP مع Nginx
FROM php:8.2-fpm

# تثبيت Nginx
RUN apt-get update && apt-get install -y nginx

# تثبيت التمديدات المطلوبة لـ PHP
RUN docker-php-ext-install pdo pdo_mysql

# نسخ تطبيق Laravel إلى الحاوية
COPY . /var/www

# نسخ ملف تكوين Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# تعيين مسار العمل
WORKDIR /var/www

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# إعداد الأذونات (تأكد من أن لديك الأذونات المناسبة)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# فتح المنفذ 80
EXPOSE 80

# بدء Nginx و PHP-FPM
CMD ["sh", "-c", "service nginx start; php-fpm"]
