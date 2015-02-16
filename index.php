<?php
	if(isset($_POST['shutdown'])) {
		if($_POST['shutdown'] == 1) {
			`sudo shutdown -h now`;
			$msg = 'Shutting down now!';
		} else if($_POST['shutdown'] == 2) {
			`sudo shutdown -r now`;
			$msg = 'Rebooting now!';
		}
	}
?>
<html>
  <head>
	<meta http-equiv="refresh" content="10">
	<style>
	h2 {margin:0px auto; line-height:1em;}
	pre { display: inline; margin:0px;}
	</style>
  </head>
  <body>
	<?php if(isset($msg)) {
		print('<div style="width:50%; margin:auto; background-color:red; text-align:center;">
			<h1>'. $msg . '</h1>
		</div>');
	}
	?>	
	<h2>System Stats</h2>
	<pre><?php 
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

	<h2>GPIO</h2>
	<?php print trim(`gpio -v | grep "version"`);
	print('<br>');
	print `gpio readall`;
	?></pre>
	
	<br>
	<form action="index.php" method="post" style="display:inline;">
		<input type="hidden" name="shutdown" value="1" />
		<input type="submit" value="Shut Down" style="color:red; font-size:1.5em;" />
	</form>
	<form action="index.php" method="post" style="display:inline;">
		<input type="hidden" name="shutdown" value="2" />
		<input type="submit" value="Reboot"  style="color:red; font-size:1.5em;"/>
	</form>

  </body>
    </html>
