<div class=tweet>
<?php
	$user = utilisateurTable::getUserById($value->emetteur);
	if ($user[0]["avatar"]=="") {
		echo '<img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/>';
	}
	else {
		echo '<img src="'.$user[0]["avatar"].'" height="100px" />';
	}
	echo $user[0]["identifiant"], '<br/>';
	if($value->emetteur!=$value->parent) {
		echo "a partagé le post de:";
		$user2 = utilisateurTable::getUserById($value->parent);
		if ($user2[0]["avatar"]=="") {
			echo '<img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/>';
		}
		else {
			echo '<img src="'.$user2[0]["avatar"].'" height="100px" />';
		}
		echo $user2[0]["identifiant"], '<br/>';
	}
	echo $p[0]->texte ;
	if ($p[0]->image!="") echo '<img src=',$p[0]->image,' height="100px" />';
	echo '<br/>';
	$date=$p[0]->date;
	echo substr($date, 11, 5), " - ", date('d M Y', strtotime($date)),'<br/>';
	echo 'nbVotes:',$value->getLikes()[0]["nbvotes"],'<br/>';
	$sql='SELECT * FROM jabaianb.vote WHERE utilisateur = '.$_SESSION["user"][0]["id"].' AND message = '.$value->id;
	$test = $connection->doQueryObject($sql, "vote");
	if (!$test)
	{
		echo '<a href="?action=upvote&idT='.$value->id.'&id='.$value->emetteur.'">upvote</a> ';
	}
	if($value->emetteur==$value->parent) {
	echo '<a href="?action=retweet&idT='.$p[0]->id.'&id='.$value->emetteur.'">retweet</a>';
	}
?>
</div>
