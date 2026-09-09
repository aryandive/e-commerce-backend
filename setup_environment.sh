#!/bin/bash
# Z PAD E-Commerce Backend - Environment Setup Script
# This script installs PHP 8.3, Composer, and MariaDB on Ubuntu/Mint.

echo "Installing PHP 8.3, Composer, and MariaDB server..."
sudo apt update
sudo apt install -y php8.3 php8.3-cli php8.3-curl php8.3-mbstring php8.3-xml \
                    php8.3-zip php8.3-intl php8.3-mysql php8.3-gd php8.3-bcmath \
                    composer mariadb-server unzip curl

echo "Installation complete!"
echo "Now run:"
echo "composer install"
echo "php artisan bagisto:install"
