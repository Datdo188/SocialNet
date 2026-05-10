# SocialNet Web Application

Student Name: YOUR NAME  
Student Number: YOUR ID

## Tech Stack
- Ubuntu 24.04
- Nginx
- PHP 8.3
- MySQL

---

## Project Structure

/var/www/SocialNet
- admin/newuser.php
- socialnet/signin.php
- socialnet/index.php
- socialnet/setting.php
- socialnet/profile.php
- socialnet/about.php
- socialnet/signout.php
- socialnet/style.css
- db.sql

## Setup Instructions

### 1. Install required packages
sudo apt update
sudo apt install nginx mysql-server php-fpm php-mysql -y

### 2. Create Database
mysql -u root -p < db.sql

### 3. Configure Nginx
Create file:

/etc/nginx/sites-available/socialnet

Add this configuration:
server {
    listen 8080;
    server_name localhost;

    root /var/www/SocialNet;
    index index.php;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
    }
}

Enable and restart nginx:
sudo ln -s /etc/nginx/sites-available/socialnet /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx

### 4. Set permissions
sudo chown -R www-data:www-data /var/www/SocialNet
sudo chmod -R 755 /var/www/SocialNet
