<?php

class postTable{

	public function getPostbyId($id) {
		$connection = new dbconnection() ;
		$sql = "select * from jabaianb.post where id='".$id."'" ;

		$res = $connection->doQuery( $sql );

		if($res === false)
		return false ;

		return $res ;
	}

}

?>
