#!/bin/bash
#
# This script installs Pi-WebStats developed by Nexus Engineering - http://nexeng.us
# Find this project on GitHub - https://github.com/NexEng/Pi-WebStats
#
# Get the script
cd /var/www/
wget https://github.com/NexEng/Pi-WebStats/archive/master.zip
unzip master.zip
cp Pi-WebStats-master/index.php .
chown -R www-data.www-data *
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
echo "All done! Navigate to http://127.0.0.1 in your browser"
