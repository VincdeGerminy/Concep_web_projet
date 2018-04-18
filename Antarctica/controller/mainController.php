<?php
/*
 * Controller 
 */

class mainController
{
	
	public static function logout($request,$context)
	{
		return context::SUCCESS;
	}
	
	public static function login($request,$context)
	{
		if(isset($request['login']) && isset($request['password']))
		{
			$uT = utilisateurTable::getUserByLoginAndPass($request['login'], $request['password']);
			if($uT)
			{
				context::setSessionAttribute("user", $uT);
				return context::SUCCESS;
			}
			else
			{
				return context::ERROR;
			}
		}
		return context::SUCCESS;
	}
	
	public static function superTest($request,$context)
	{
		if(key_exists("param1", $request))
		{
			$context->param1 =  $request['param1'];
		}
		if(key_exists("param2", $request))
		{
			$context->param2 =  $request['param2'];
		}
		if (!key_exists("param1", $request) || !key_exists("param2", $request))
		{
			return context::ERROR;
		}
		return context::SUCCESS;
	}

	public static function helloWorld($request,$context)
	{
		if (isset($_SESSION["user"]))
		{
			$context->mavariable="hello world";
			return context::SUCCESS;
		}
		return context::ERROR;
	}



	public static function index($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function tweets($request,$context) {
		if (isset($_SESSION["user"]))
		{
			$context->tab = tweetTable::getTweets();
			return context::SUCCESS;
		}
		return context::SUCCESS;
	}
	
	public static function display_profile($request,$context) {
		if(key_exists("id", $request))
		{
			$context->id =  $request['id'];
		}
		return context::SUCCESS;
	}
	
	public static function upvote($request,$context) {
		$newVote= new vote();
		$newVote->id=false;
		$newVote->utilisateur=$_SESSION["user"][0]["id"];
		$newVote->message=$_REQUEST['idT'];
		if($newVote->save()){
			return context::SUCCESS;
		}
		else return context::ERROR;	
	}
}
