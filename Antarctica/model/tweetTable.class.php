<?php

	class tweetTable
	{
		public static function getTweets()
		{
			$connection = new dbconnection() ;
			$sql = "select * from jabaianb.tweet" ;

			$res = $connection->doQueryObject( $sql, "tweet" );

			if($res === false)
				return false ;

			return $res ;
		}
		
		public static function getTweetsPostedBy($id)
		{
			$connection = new dbconnection() ;
			$sql = "select * from jabaianb.tweet where parent='".$id."'" ;

			$res = $connection->doQueryObject( $sql, "tweet" );

			if($res === false)
				return false ;

			return $res ;
		}
	}

?>