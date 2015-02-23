#!/bin/bash
#
# This script downloads and completely installs Pi-WebStats
# Developed by Nexus Engineering - http://nexeng.us
# Find this project on GitHub - https://github.com/NexEng/Pi-WebStats
#
echo "
Installing webserver packages and git... step 1/5
"
apt-get install -y apache2 apache2-utils php5 libapache2-mod-php5 git-core
#
echo "
Installing wiringPi for GPIO support... step 2/5
"
git clone git://git.drogon.net/wiringPi
cd wiringPi
git pull origin
./build
gpio -v
#
echo "
Downloading Pi-WebStats files... step 3/5
"
cd /var/www/
wget https://github.com/NexEng/Pi-WebStats/archive/master.zip
unzip master.zip
chown -R pi.www-data *
#
echo "
Adding Apache Virtualhost... step 4/5
"
echo "<VirtualHost *:80>
        ServerAdmin webmaster@localhost

        DocumentRoot /var/www/Pi-WebStats-master
        <Directory />
                Options FollowSymLinks
                AllowOverride None
        </Directory>
        <Directory /var/www/Pi-WebStats-master>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride None
                Order allow,deny
                allow from all
        </Directory>
</VirtualHost" >> /etc/apache2/sites-available/default
#
echo "
Configuring sudoers to support shutdown functionality... step 5/5
"
echo "www-data cnc-pi = (root) NOPASSWD: /sbin/shutdown" >>/etc/sudoers
#
echo "All done! Navigate to http://`hostname -I | xargs`/Pi-WebStats-master/ in your browser."
