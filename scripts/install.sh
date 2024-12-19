#!/bin/bash

set -e

sudo apt-get clean --assume-yes
sudo apt-get update --assume-yes
sudo apt-get upgrade --assume-yes

# Composer 설치 함수
install_composer() {
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    sudo chmod +x /usr/local/bin/composer
}

# Laravel 설치 함수
install_laravel() {
    sudo composer global require laravel/installer
    sudo ln -s ~/.composer/vendor/bin/laravel /usr/local/bin/laravel
}

# 필수 패키지 설치 함수
install_packages() {
    sudo apt install software-properties-common
    sudo add-apt-repository ppa:ondrej/php
    sudo apt update

    sudo apt-get install -y \
        curl \
        git \
        unzip \
        zip \
        nginx \
        mysql-server \
        mysql-client \
        php8.4-cli php8.4-fpm php8.4-mysql php8.4-xml php8.4-mbstring php8.4-curl php8.4-zip php8.4-gd php8.4-bcmath php8.4-sqlite3 \
        phpmyadmin \
        vsftpd \
        certbot \
        python3-certbot-nginx
}

# Configure VSFTPD
configure_vsftpd() {
    if [ ! -f /etc/vsftpd.conf ] || ! grep -q "listen_port=2121" /etc/vsftpd.conf; then
    sudo tee /etc/vsftpd.conf > /dev/null <<EOL
listen=YES
listen_ipv6=NO
anonymous_enable=NO
local_enable=YES
write_enable=YES
local_umask=022
dirmessage_enable=YES
use_localtime=YES
chroot_local_user=YES
pasv_enable=YES
pasv_min_port=10090
pasv_max_port=10100
allow_writeable_chroot=YES
listen_port=2121
port_enable=YES
connect_from_port_20=NO
local_max_rate=0
secure_chroot_dir=/var/run/vsftpd/empty
pam_service_name=vsftpd
rsa_cert_file=/etc/ssl/certs/ssl-cert-snakeoil.pem
rsa_private_key_file=/etc/ssl/private/ssl-cert-snakeoil.key
ssl_enable=NO
EOL
    sudo systemctl restart vsftpd
    fi
}

# Configure firewall
configure_firewall() {
    sudo ufw allow OpenSSH
    sudo ufw allow mysql
    sudo ufw allow 80/tcp
    sudo ufw allow 443/tcp
    sudo ufw allow 2121/tcp
    sudo ufw allow 20:21/tcp
    sudo ufw allow 30000:31000/tcp
    sudo ufw --force enable
}

# Main function to execute all configuration steps
main() {
    install_packages
    install_composer
    install_laravel
    configure_vsftpd
    configure_firewall
}
