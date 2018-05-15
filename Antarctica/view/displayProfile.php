<?php
	if (key_exists("id", $_REQUEST)) {
		$ut=utilisateurTable::getUserById($_REQUEST['id']);
?>
		<h3>Profil</h3>
<?php
		echo 'id: ', $ut[0]["id"], "<br/>";
		echo 'avatar: ', '<img src="', $ut[0]["avatar"], '" width=100px/>', "<br/>";
		echo 'identifiant: ', $ut[0]["identifiant"], "<br/>";
		echo 'nom: ', $ut[0]["nom"], "<br/>";
		echo 'prenom: ', $ut[0]["prenom"], "<br/>";
		echo 'statut: ', $ut[0]["statut"], "<br/>";
		$tt=tweetTable::getTweetsPostedBy($ut[0]["id"]);
		$connection = new dbconnection();
		foreach ($tt as $key => $value) {
			$p = $value->getPost();
			include("Antarctica/view/tweetView.php");
		}	
			//echo $p[0]["texte"], " - ", $value->id, "<br/>";
		if ($ut[0]["id"]==$_SESSION["user"][0]["id"]) {
			echo '<h3>Modif Profil</h3>';
	
?>
			<form action="?action=modifProfil" name="modifProfil" id="modifProfil" method="POST" >
				Entrez un nouvel identifiant:<input type="text" name="identifiant"/><br/> 
				Entrez l'url du nouvel avatar:<input type="text" name="img"/><br/>
				Entrez le nouveau nom:<input type="text" name="nom"/><br/>
				Entrez le nouveau prenom:<input type="text" name="prenom"/><br/>
				Entrez le nouveau statut:<input type="text" name="statut"/><br/>
				<input type="submit" placeholder="Modifier le profil">
			</form>	
<?php
		}
	}	
?>
