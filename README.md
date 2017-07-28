# Pi-WebStats
Displays general system and GPIO information for the Raspberry Pi in a simple web interface.

Screenshot: http://imgur.com/HqEttvo
  
  **Always review code before running it on your system; particularly when it requests sudo/root priviliges!!**
  
**Simple Installation:** To download Pi-WebStats and completely install it will all dependencies, simply install git and run 
  
  <code>git clone https://raw.githubusercontent.com/NexEng/Pi-WebStats && sudo bash Pi-WebStats/install.sh</code>
  
 
  If you want to set up the webserver on your own, simply download Pi-WebStats and put it in your default web server directory, or a virtual host directory of your choice and follow the requirements below:


Requirements:

  General - Webserver and PHP

  For GPIO status - http://wiringpi.com/download-and-install/

  For Shutdown / Reboot functions - Add entry to /etc/sudoers
  	www-data cnc-pi = (root) NOPASSWD: /sbin/shutdown
