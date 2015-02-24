<?php print trim(`gpio -v | grep "version"`);
	print('<br>');
	print `gpio readall`;
	?>
