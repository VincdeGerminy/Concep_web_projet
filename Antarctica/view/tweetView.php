<div class=tweet>
<?php
	$user = utilisateurTable::getUserById($value->emetteur);
	if ($_SESSION["user"][0]["avatar"]=="") {
		echo '<img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/>';
	}
	else {
		echo '<img src="'.$user[0]["avatar"].'" height="100px" />';
	}
	echo $user[0]["identifiant"], '<br/>';
	echo $p[0]->texte ;
	if ($p[0]->image!="") echo '<img src=',$p[0]->image,' height="100px" />';
	echo '<br/>';
	$date=$p[0]->date;
	echo substr($date, 11, 5), " - ", date('d M Y', strtotime($date)),'<br/>';
	echo 'nbVotes:',$tt[0]->getLikes()[0]["nbvotes"],'<br/>';
	$sql='SELECT * FROM jabaianb.vote WHERE utilisateur = '.$_SESSION["user"][0]["id"].' AND message = '.$value->id;
	$test = $connection->doQuery($sql);
	if (!$test)
	{
		echo '<a href="?action=upvote&idT='.$value->id.'&id='.$ut[0]["id"].'">upvote</a>';
	}
	#echo '<a href="?action=retweet">retweet</a>';
	
?>
</div>
