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
	
	public static function createTweet($request,$context){
		$newPost=new post();
		$newTweet=new tweet();
		$newPost->texte=$_POST['content'];
		$date= date('Y-m-d h:i:s');
		$newPost->date=$date;
		if (isset($_POST["img"])){
			$newPost->image=$_POST['img'];
		}	
		$newTweet->emetteur=$_SESSION["user"][0]["id"];
		$newTweet->parent=$_SESSION["user"][0]["id"];
		$newTweet->post=$newPost->save();
		$newTweet->nbVotes=0;
		if($newTweet->save()){
			return context::SUCCESS;
		}
		
	}
	
	public static function upvote($request,$context) {
		$newVote= new vote();
		$newVote->utilisateur=$_SESSION["user"][0]["id"];
		$newVote->message=$request['idT'];
		if($newVote->save()){
			$connection = new dbconnection() ;
			$sql2 = 'UPDATE jabaianb.tweet SET nbVotes = (nbVotes+1) WHERE id='.$_REQUEST['idT'];
			$connection->doExec($sql2);
			return context::SUCCESS;
		}
		else return context::ERROR;	
	}
	
	public static function modifProfil($request,$context) {
		$newUser=new utilisateur();
		$newUser->id=$_SESSION["user"][0]["id"];
		if (isset($_POST["identifiant"]))
			$newUser->identifiant=$_POST["identifiant"];
		else
			$newUser->identifiant=$_SESSION["user"][0]["identifiant"];
		if (isset($_POST["img"]))
			$newUser->avatar=$_POST["img"];
		else
			$newUser->avatar=$_SESSION["user"][0]["avatar"];
		if (isset($_POST["nom"]))
			$newUser->nom=$_POST["nom"];
		else
			$newUser->nom=$_SESSION["user"][0]["nom"];
		if (isset($_POST["prenom"]))
			$newUser->prenom=$_POST["prenom"];
		else
			$newUser->prenom=$_SESSION["user"][0]["prenom"];
		if (isset($_POST["statut"])) {
			$newUser->statut=$_POST["statut"];
		}
		else {
			$newUser->statut=$_SESSION["user"][0]["statut"];
		}
		if($newUser->save()){
			return context::SUCCESS;
		}	
	}
	
	public static function retweet($request,$context) {
		$newTweet=new tweet();
		$newTweet->emetteur=$_SESSION["user"][0]["id"];
		$newTweet->parent=$_REQUEST['id'];
		$newTweet->post=$_REQUEST['idT'];
		$newTweet->nbVotes=0;
		if($newTweet->save()){
			return context::SUCCESS;
		}
	}
}
