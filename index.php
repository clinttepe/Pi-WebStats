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
	<title>Pi-WebStats</title>	

	<style>
	h2 {margin:0px auto; line-height:1em;}
	pre { display: inline; margin:0px;}
	</style>

	<script language="javascript" type="text/javascript">
	function loadSystem(){
		var xmlhttp;
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("system").innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET","system.php",true);
		xmlhttp.send();
	}

	function loadGPIO(){
		var xmlhttp;
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("gpio").innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET","gpio.php",true);
		xmlhttp.send();
	}
	</script>

</head>
<body>
	<?php if(isset($msg)) {
		print('<div style="width:50%; margin:auto; background-color:red; text-align:center;">
			<h1>'. $msg . '</h1>
		</div>');
	}
	?>	
	<h1>Pi-WebStats</h1>
	
	<h2>System Stats</h2>
	<pre>
	<div id="system">
	<script language="javascript" type="text/javascript">
	loadSystem(); // This will run on page load
	setInterval(function(){
	    loadSystem() // this will run after every 5 seconds
	}, 5000);
	</script>
	</div>

	<h2>GPIO</h2>
	<div id="gpio">
	<script language="javascript" type="text/javascript">
	loadGPIO(); // This will run on page load
	setInterval(function(){
	    loadGPIO() // this will run after every 5 seconds
	}, 5000);
	</script>
	</div></pre>
	
	<br>
	<form action="index.php" method="post" style="display:inline;">
		<input type="hidden" name="shutdown" value="1" />
		<input type="submit" value="Shut Down" style="color:red; font-size:1.5em;" />
	</form>
	<form action="index.php" method="post" style="display:inline;">
		<input type="hidden" name="shutdown" value="2" />
		<input type="submit" value="Reboot"  style="color:red; font-size:1.5em;"/>
	</form>

	<br><br>
	<a href="https://github.com/NexEng/Pi-WebStats">Pi-WebStats on GitHub</a> developed by <a href="http://nexeng.us/">Nexus Engineering LLC</a>

</body></html>
