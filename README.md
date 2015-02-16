# Pi-WebStats
Displays general system and GPIO information for the Raspberry Pi in a simple web interface.

Requirements:

  General - Webserver and PHP

  For GPIO status - http://wiringpi.com/download-and-install/

  For Shutdown / Reboot functions - Add entry to /etc/sudoers
  	www-data cnc-pi = (root) NOPASSWD: /sbin/shutdown

Installation:
  Simply put in your default web server directory, or a virtual host directory of your choice.
