<?php

class tweet extends basemodel{

	public function getPost() {
		$connection = new dbconnection() ;
		$sql = "select post.* from jabaianb.tweet join jabaianb.post on tweet.post=post.id where tweet.id='".$this->id."'" ;

		$res = $connection->doQueryObject( $sql, "post" );

		if($res === false)
		return false ;

		return $res ;
	}
	
	public function getParent() {
		$connection = new dbconnection() ;
		$sql = "select identifiant,nom,prenom from jabaianb.tweet join jabaianb.utilisateur on tweet.parent=utilisateur.id where tweet.id='".$this->id."'";
		$res = $connection->doQuery( $sql );

		if($res === false)
		return false ;

		return $res ;
	} 
	
	public function getLikes() {
		$connection = new dbconnection() ;
		$sql = "select nbVotes from jabaianb.tweet where tweet.id='".$this->id."'";
		$res = $connection->doQuery( $sql );

		if($res === false)
		return false ;

		return $res ;
	}
	
}

?>
