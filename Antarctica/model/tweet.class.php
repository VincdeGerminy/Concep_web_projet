<?php

class tweet extends basemodel{

	public function getPost($idTweet) {
		$connection = new dbconnection() ;
		$sql = "select texte from jabaianb.tweet join jabaianb.post on tweet.post=post.id where tweet.id='".$idTweet."'" ;

		$res = $connection->doQuery( $sql );

		if($res === false)
		return false ;

		return $res ;
	}
	
	public function getParent($idTweet) {
		$connection = new dbconnection() ;
		$sql = "select identifiant,nom,prenom from jabaianb.tweet join jabaianb.utilisateur on tweet.parent=utilisateur.id where tweet.id='".$idTweet."'";
		$res = $connection->doQuery( $sql );

		if($res === false)
		return false ;

		return $res ;
	} 
	
	public function getLikes($idTweet) {
		$connection = new dbconnection() ;
		$sql = "select nbVotes from jabaianb.tweet where tweet.id='".$idTweet."'";
		$res = $connection->doQuery( $sql );

		if($res === false)
		return false ;

		return $res ;
	}
	
}

?>
