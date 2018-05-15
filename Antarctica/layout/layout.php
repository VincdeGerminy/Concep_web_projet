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
				echo '<a href=?id='.$_SESSION["user"][0]["id"].'><img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/></a>';
			}
			else {
				echo 'avatar: <a href=?id='.$_SESSION["user"][0]["id"].'><img src="'.$_SESSION["user"][0]["avatar"].'" height="100px"/></a>';	
			}	
			echo $_SESSION["user"][0]["nom"];
			echo " ";
			echo $_SESSION["user"][0]["prenom"];
			echo '<br/>';
			echo "statut: ".$_SESSION["user"][0]["statut"];
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
				echo '<a href="?id='.$ut[$key]["id"].'" >'.$ut[$key]["identifiant"].'</a>';
				echo '<br/>';
			}
		}
		echo '</div>';
		?>
		<div class="tweet_box">
			<?php if(isset($_SESSION["user"])){
				?>
				<form action="?action=createTweet" name="createTweet" id="createTweet" method="POST" >
					<textarea id="content" name="content" form="createTweet" rows=4 cols=40 maxlength="140" placeholder="write your bray ..." form="tweet" autofocus></textarea>
					<br>
					<input id="img" name="img" type="text" /> 
					<!--<input id="img" name="img" type="file" accept="image/*" /> -->
					<input type="submit" placeholder="Bray">
				</form>
				<?php
				/*$tt=tweetTable::getTweetsPostedBy($_SESSION["user"][0]["id"]);
				foreach ($tt as $key => $valeur) {
					echo $valeur;
					//echo $tt.getPost($tt[$key]["id"]);
				}*/
			}?>
		</div>
		<div class=contenu>
			<?php if(isset($_SESSION["user"])){	
				include("Antarctica/view/displayProfile.php"); 
			}	
			?>
			<?php include($template_view); ?>
		</div>
	</body>
</html>
