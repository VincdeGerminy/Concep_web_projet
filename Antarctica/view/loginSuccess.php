<?php

if(isset($_SESSION["user"]))
{
	context::redirect("Antarctica.php");
}

if(!isset($_REQUEST['login']) || !isset($_REQUEST['password']))
{
	echo 
		'<span style="font-size: 15px; color: blue; font-weight: bold;">Connexion:</span>
		<br/><br/>
		<form action="" method="POST">
			<input type="text" name="login" placeholder="Login" autofocus>
			<br/>
			<input type="password" name="password" placeholder="Password">
			<br/><br/>
			<input type="submit" value="Submit">
		</form>';
}


//echo $_POST['login'], $_POST['password'];

?>
