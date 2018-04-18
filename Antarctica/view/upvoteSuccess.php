<?php
	echo 'Vous avez upvoté ce tweet.';
	/*$newVote= new vote();
	$newVote->utilisateur=$_SESSION["user"][0]["id"];
	$newVote->message=$_REQUEST['idT'];
	$newVote->save();*/
	#$connection = new dbconnection() ;
	#$sql1 = 'INSERT INTO jabaianb.vote (utilisateur, message) VALUES ('.$_SESSION["user"][0]["id"].', '.$_REQUEST['idT'].')';
	#$connection->doExec($sql1);
	#$sql2 = 'UPDATE jabaianb.tweet SET nbVotes = (nbVotes+1) WHERE id='.$_REQUEST['idT'];
	#$connection->doExec($sql2);
	echo '<a href=Antarctica.php?action=display_profile&id='.$_REQUEST['id'].'>retour</a>'; 
	#context::redirect('Antarctica.php?action=display_profile&id="'.$_REQUEST['id']);
?>
