#!/bin/bash
#
# This script prepares for use of Pi-WebStats
# Developed by Nexus Engineering - http://nexeng.us
# Find this project on GitHub - https://github.com/NexEng/Pi-WebStats
#
# Download the zip file, unzip, and put index.php in /var/www/ then change ownership to www-data
#
echo "
Installing webserver packages and git... step 1/3
"
apt-get install -y apache2 apache2-utils php5 libapache2-mod-php5 git-core
#
echo "
Installing wiringPi for GPIO support... step 2/3
"
git clone git://git.drogon.net/wiringPi
cd wiringPi
git pull origin
./build
gpio -v
#
echo "
Configuring sudoers to support shutdown functionality... step 3/3
"
echo "www-data cnc-pi = (root) NOPASSWD: /sbin/shutdown" >>/etc/sudoers
#
echo "

Pi prepared; please make sure you have a VirtualHost configured.
"
