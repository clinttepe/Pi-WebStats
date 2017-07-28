#!/bin/bash
#
# This script prepares for use of Pi-WebStats
# Developed by Nexus Engineering - http://nexeng.us
# Find this project on GitHub - https://github.com/NexEng/Pi-WebStats
#
# Installs at /var/www/Pi-WebStats and changes file ownership to www-data
#
echo "
Installing webserver packages and git... step 1/4
"
apt-get install -y apache2 apache2-utils php5 libapache2-mod-php5 git-core
#
echo "
Copying to /var/www... step 2/4
"
cp -R Pi-WebStats /var/www/
cd /var/www/Pi-Webstats
#
echo "
Installing wiringPi for GPIO support... step 3/4
"
git clone git://git.drogon.net/wiringPi
cd wiringPi
git pull origin
./build
gpio -v
#
echo "
Configuring sudoers to support shutdown functionality... step 4/4
"
echo "www-data `hostname` = (root) NOPASSWD: /sbin/shutdown" >>/etc/sudoers
#
echo "

Pi-Webstats Ready! Navigate to http://`hostname -i | xargs`/Pi-WebStats-master/ in your browser.
-Alternatively, http://`hostname`.local/Pi-WebStats-master/ can be used if your Pi is on your local network.
"
