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
			$sql = "select tweet.* from jabaianb.tweet join jabaianb.post on (tweet.post = post.id) where emetteur='".$id."' ORDER BY post.date DESC" ;

			$res = $connection->doQueryObject( $sql, "tweet" );

			if($res === false)
				return false ;

			return $res ;
		}
	}

?>
