#!/bin/bash

# Mise en place du dépot ondrej/php
sudo apt-get update
sudo apt-get -y install lsb-release ca-certificates curl apt-transport-https
sudo curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
sudo dpkg -i /tmp/debsuryorg-archive-keyring.deb
sudo sh -c 'echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
sudo apt-get update

# Installation de PHP 8.4
sudo apt install -y php8.4-cli php8.4-fpm php8.4-xml

# Installation Symfony CLI
curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
sudo apt install -y symfony-cli

# Purge du container
sudo apt autoremove -y