# Pi-WebStats
Displays general system and GPIO information for the Raspberry Pi in a simple web interface.

Screenshot: http://imgur.com/HqEttvo
  
  **Always review code before running it on your system; particularly when it requests sudo/root priviliges!!**
  
**Simple Installation:**
  - To download Pi-WebStats and completely install it will all dependencies, simply install git and run: 
  
  - <code>git clone https://raw.githubusercontent.com/NexEng/Pi-WebStats && sudo bash Pi-WebStats/install.sh</code>
  
**Manual Installation:** 
  - If you want to set up the webserver on your own, simply download the PHP files and put them in your default web server directory, or a virtual host directory of your choice and follow the requirements below:

Requirements:

  1. General - Webserver and PHP support

  2. For GPIO status - http://wiringpi.com/download-and-install/

  3. For Shutdown / Reboot functions - Add entry to /etc/sudoers
  	<code>www-data cnc-pi = (root) NOPASSWD: /sbin/shutdown</code>
