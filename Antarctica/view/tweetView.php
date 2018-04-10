<div class=tweet>
<?php
	$user = utilisateurTable::getUserById($value->emetteur);
	if ($_SESSION["user"][0]["avatar"]=="") {
		echo '<img id="logo" src="https://pedago02a.univ-avignon.fr/~uapv1602104/images/undefined_avatar.png" height="100px"/>';
	}
	else {
		echo $user[0]["avatar"];
	}
	echo $user[0]["identifiant"], '<br/>';
	echo $p[0]->texte ;
	if ($p[0]->image!="") echo '<img src=',$p[0]->image,' height="100px" />';
	echo '<br/>';
	$date=$p[0]->date;
	echo substr($date, 11, 5), " - ", date('d M Y', strtotime($date)),'<br/>';
	echo 'nbVotes:',$tt[0]->getLikes()[0]["nbvotes"];
	
?>
</div>
