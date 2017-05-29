
## Install Docker

``` bash
apt-get update;
apt-get -y upgrade;

apt-get -y install \
     apt-transport-https \
     ca-certificates \
     curl \
     gnupg2 \
     software-properties-common

curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -

echo "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable" >> /etc/apt/sources.list.d/docker.list
apt-get update
apt-get -y install docker-ce
```

## Clone project from github

``` bash
git clone https://github.com/akramfares/tmbc.git
cd tmbc/
```

## Install composer and project vendor

``` bash
apt-get -y install php5-common libapache2-mod-php5 php5-cli php5-curl

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

# Install project vendor
./composer.phar install 
``` 


## Install NodeJS and NPM

``` bash
curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -
apt-get install -y nodejs npm

npm install
```

## Run Docker containers

``` bash
# MySQL
docker run --name tmbc_mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=Tmbc12x -e MYSQL_DATABASE=tmbc -d mysql
# Laravel + Apache
docker run --name tmbc_web -p 8080:80 -v `pwd`/:/var/www/laravel/ --link tmbc_mysql:mysql -d eboraas/laravel
```

## Init Environment + Database + Seeding

``` bash
docker exec -i -t tmbc_web /bin/bash
cd var/www/laravel

mv .env.dist .env
php artisan key:generate
php artisan config:clear
php artisan migrate:refresh --seed

# Set folders permission
chown -R www-data:www-data ../

```
