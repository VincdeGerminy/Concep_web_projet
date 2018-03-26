<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="https://pedago02a.univ-avignon.fr/~uapv1602104/css/style.css"/>

		<title>
			Antarctica
		</title>

	</head>

	<body>
		<div class="title">
			<a href="Antarctica.php"><img id="logo" src="http://www.get-emoji.com/images/emoji/1f427.png"/></a>
			<div id="name">Antarctica</div>
		</div>
		<div class="profil">
		<?php if(isset($_SESSION["user"])){
			echo $_SESSION["user"][0]["nom"];
			echo " ";
			echo $_SESSION["user"][0]["prenom"];
			echo '<br/>';
			if ($_SESSION["user"][0]["avatar"]=="") {
				echo '<img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/>';
			}
			else {
				echo "avatar: ".$_SESSION["user"][0]["avatar"];	
			}	
			echo '<br/>';
			echo "statut: ".$_SESSION["user"][0]["statut"];
			echo '<form action="" method="POST" id="tweet">
					Online: <input type="checkbox" onChange="this.form.submit()" id="on">
					Do not disturb: <input type="checkbox" onChange="this.form.submit()" id="dis">
					Away: <input type="checkbox" onChange="this.form.submit()" id="aw">
				</form>';
			echo '<br/>';
			}
		?>
		</div>
		<div class="menu">
			
		</div>
		<div class="tweet">
			<?php if(isset($_SESSION["user"])){
				echo 
				'<form action="" method="POST" id="tweet">
					<textarea name="content" rows=4 cols=40 maxlength="140" placeholder="write your bray ..." form="tweet" autofocus></textarea><br>
					<input type="submit" value="Bray">
				</form>';
			}?>
		</div>
		<?php include($template_view); ?>
	</body>
</html>
