
<?php
	if (key_exists("id", $_REQUEST)) {
		$ut=utilisateurTable::getUserById($context->id);
	}
	else {
		$ut = $_SESSION["user"];
	}
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
	foreach ($tt as $key => $value) {
		$p = $value->getPost();
		include("Antarctica/view/tweetView.php");
		//echo $p[0]["texte"], " - ", $value->id, "<br/>";
	}
?>
