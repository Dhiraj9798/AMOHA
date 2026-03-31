# Use official PHP Apache image
FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Enable Apache modules
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files to container
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Configure Apache to serve from project root
RUN echo '<Directory /var/www/html>' > /etc/apache2/sites-available/000-default.conf && \
    echo '  Options Indexes FollowSymLinks' >> /etc/apache2/sites-available/000-default.conf && \
    echo '  AllowOverride All' >> /etc/apache2/sites-available/000-default.conf && \
    echo '  Require all granted' >> /etc/apache2/sites-available/000-default.conf && \
    echo '</Directory>' >> /etc/apache2/sites-available/000-default.conf && \
    echo 'DocumentRoot /var/www/html' >> /etc/apache2/sites-available/000-default.conf

# Expose port 8080 (Render required)
EXPOSE 8080

# Change Apache to listen on 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# Start Apache in foreground
CMD ["apache2-foreground"]
