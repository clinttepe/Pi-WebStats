<?php 
	print('<br>');
	print trim(`uptime`); 
	print('<br><br>');
        print( trim(`ps -e | wc -l`). ' processes running.');
	print('<br><br>');
	print `free -m | head -2`;
	print('<br>');
	print `df -h | head -2`;
	print('<br>');
	print trim(`/sbin/ifconfig eth0 | grep "bytes"`);
	print('<br>');
	//print `/usr/bin/apt-get -u upgrade --assume-no`;
	?>
