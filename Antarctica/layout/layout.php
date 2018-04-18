<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="https://pedago02a.univ-avignon.fr/~uapv1603134/css/style.css"/>

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
			if ($_SESSION["user"][0]["avatar"]=="") {
				echo '<img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/>';
			}
			else {
				echo 'avatar: <img src="'.$_SESSION["user"][0]["avatar"].'" height="100px"/>';	
			}	
			echo $_SESSION["user"][0]["nom"];
			echo " ";
			echo $_SESSION["user"][0]["prenom"];
			echo '<br/>';
			echo "statut: ".$_SESSION["user"][0]["statut"];
			echo '<form action="" method="POST" id="tweet">
					Online<input type="checkbox" onChange="this.form.submit()" id="on">
					Do not disturb<input type="checkbox" onChange="this.form.submit()" id="dis">
					Away<input type="checkbox" onChange="this.form.submit()" id="aw">
				</form>';
			echo '<br/>';
			}
		?>
		</div>
		<?php if(isset($_SESSION["user"])) {
			echo '<div class="users">';
			echo '<div class=users_title>';
			echo '<h2>Users</h2>';
			echo '</div>';
			$ut=utilisateurTable::getUsers();
			uasort($ut, function($a, $b) {
				return $a["identifiant"] > $b["identifiant"];
			});
			foreach ($ut as $key => $valeur) {
				echo '<a href="?action=display_profile&id='.$ut[$key]["id"].'" >'.$ut[$key]["identifiant"].'</a>';
				echo '<br/>';
			}
		}
		echo '</div>';
		?>
		<div class="tweet_box">
			<?php if(isset($_SESSION["user"])){
				echo 
				'<form action="" method="POST" id="tweet">
					<textarea name="content" rows=4 cols=40 maxlength="140" placeholder="write your bray ..." form="tweet" autofocus></textarea><br>
					<input type="submit" value="Bray">
				</form>';
				$tt=tweetTable::getTweetsPostedBy($_SESSION["user"][0]["id"]);
				foreach ($tt as $key => $valeur) {
					echo $tt[$key][$valeur];
					//echo $tt.getPost($tt[$key]["id"]);
				}
			}?>
		</div>
		<div class=contenu>
			<?php include($template_view); ?>
		</div>
	</body>
</html>
