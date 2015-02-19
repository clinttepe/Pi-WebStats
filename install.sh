#!/bin/bash
#
# This script prepares for use of Pi-WebStats developed by Nexus Engineering - http://nexeng.us
# Find this project on GitHub - https://github.com/NexEng/Pi-WebStats
#
# Download the zip file, unzip, and put index.php in /var/www/ then change ownership to www-data
#
# Install dependencies.
apt-get install -y apache2 apache2-utils php5 libapache2-mod-php5 git-core
#
# Install wiringPi
git clone git://git.drogon.net/wiringPi
cd wiringPi
git pull origin
./build
gpio -v
#
# Configure sudoers to support shutdown functionality
echo "www-data cnc-pi = (root) NOPASSWD: /sbin/shutdown" >>/etc/sudoers
#
# All done!
