# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT

# Install dependencies

sudo add-apt-repository ppa:ondrej/php
sudo apt-get update

sudo apt-get install -y apache2
sudo apt-get install -y git
sudo apt-get install -y curl

apt-get install -y php7.2
apt-get install -y php7.2-bcmath php7.2-bz2 php7.2-cli php7.2-curl php7.2-intl php7.2-json php7.2-mbstring
apt-get install -y php7.2-sqlite3 php7.2-xml php7.2-xsl php7.2-zip libapache2-mod-php7.2 php-xdebug

# Configure Apache
echo "<VirtualHost *:80>
	DocumentRoot \"/var/www/application/public\"
	AllowEncodedSlashes On

	ServerName "spa.local.vm";
	ServerAlias "www.spa.local.vm";

	<Directory \"/var/www/application/public\">
		Options +Indexes +FollowSymLinks
		DirectoryIndex index.php index.html
		Order allow,deny
		Allow from all
		AllowOverride All
	</Directory>

	ErrorLog /var/www/server/logs/error.log
	CustomLog /var/www/server/logs/access.log combined

</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

#echo "<VirtualHost 192.168.0.203:80>
#	DocumentRoot \"/var/www/messenger/public\"
#	AllowEncodedSlashes On

#	ServerName "messenger.local.vm";
#	ServerAlias "www.messenger.local.vm";

#	<Directory \"/var/www/messenger/public\">
#		Options +Indexes +FollowSymLinks
#		DirectoryIndex index.php index.html
#		Order allow,deny
#		Allow from all
#		AllowOverride All
#	</Directory>
#
#	ErrorLog /var/www/server/logs/error-messenger.log
#	CustomLog /var/www/server/logs/access.log combined
#
#</VirtualHost>" > /etc/apache2/sites-available/001-default.conf

a2enmod rewrite

echo "\n\r[xdebug]" >> /etc/php/7.0/mods-available/xdebug.ini
echo "xdebug.default_enable: 1" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_autostart: 0\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_connect_back: 1\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_enable=1\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_handler: dbgp\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_port: '9000'\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_host: '127.0.0.1:8085'\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.idekey: 'PHPSTORM'\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_mode: 'req'\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.var_display_max_depth: '-1'\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.var_display_max_children: '-1'\n" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.var_display_max_data: '-1'\n" >> /etc/php/7.1/mods-available/xdebug.ini

# START APACHE2
service apache2 restart

rm -Rf /var/www/html

# Install Composer
if [ -e /usr/local/bin/composer ]; then
    /usr/local/bin/composer self-update
else
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

# Install NodeJS and managers

cd ~

curl -sL https://deb.nodesource.com/setup_8.x -o nodesource_setup.sh

sudo bash nodesource_setup.sh
sudo apt-get install nodejs -y
sudo apt-get install build-essential -y
#sudo apt-get install npm -y
#sudo npm install yarn
#sudo npm install grunt-cli

curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -
echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
sudo apt-get update && sudo apt-get install yarn

#ln -s /usr/bin/nodejs /usr/bin/node

# Install nodejs dependencies
cd /var/www/application
sudo yarn install
#grunt

# Reset home directory of vagrant user
if ! grep -q "cd /var/www" /home/vagrant/.profile; then
    echo "cd /var/www" >> /home/vagrant/.profile
fi

# Install MySQL
# echo "Install MySQL"
# debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
# debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
# apt-get update
# apt-get install -y mysql-server

#mysql -u root -proot -e "CREATE DATABASE acorn;"
#mysql -u root -proot acorn < /var/www/server/data/schema.sql

# Install the Composer dependencies
cd /var/www/application && composer install
composer development-enable

#cd /var/www/messenger && composer install
#composer development-enable

echo "** Visit http://localhost:8083 in your browser for to view the application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vm.box = 'bento/ubuntu-16.04'

    config.vm.define "spa" do |spa|
        spa.vm.network "forwarded_port", guest: 80, host: 8083
        spa.vm.synced_folder '.', '/var/www'
        spa.vm.provision 'shell', inline: @script
        spa.vm.host_name = 'spa.local.vm'
        spa.vm.network :public_network, ip: "192.168.0.202"

        spa.vm.provider "virtualbox" do |vb|
            #vb.customize ["modifyvm", :id, "--nic2", "intnet"]
            vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
            vb.customize ["modifyvm", :id, "--memory", "512"]
            vb.customize ["modifyvm", :id, "--name", "SPA by Secalith - Ubuntu 16.04"]
        end
    end

#    config.vm.define "messenger" do |messenger|
#        messenger.vm.network "forwarded_port", guest: 88, host: 8084
#        messenger.vm.synced_folder '.', '/var/www'
#        messenger.vm.provision 'shell', inline: @script
#        messenger.vm.host_name = 'messenger.local.vm'
#        messenger.vm.network :public_network, ip: "192.168.0.203"
#
#        messenger.vm.provider "virtualbox" do |vb|
#            #vb.customize ["modifyvm", :id, "--nic2", "intnet"]
#            vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
#            vb.customize ["modifyvm", :id, "--memory", "512"]
#            vb.customize ["modifyvm", :id, "--name", "Messenger by Secalith - Ubuntu 16.04"]
#        end
#    end

end
