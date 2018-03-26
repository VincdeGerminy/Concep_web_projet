<?php

	echo '<a href="?action=superTest&param1=Banana&param2=Split">Super Test (2 parametres)</a><br/>';
	echo '<a href="?action=superTest">Super Test (aucun parametre)</a><br/>';
	if (!isset($_SESSION["user"]))
	{
		echo 
			'<div class="log">
				<a href="?action=login">Login</a>
			</div>';
	}
	else
	{
		echo '<a href="?action=helloWorld">Hello World</a><br/>';
		echo 
			'<div class="log">
				<a href="?action=logout">Logout</a>
			</div>';
	}

?>
