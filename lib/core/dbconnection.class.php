<?php

define ('HOST', 'localhost') ;
define ('USER', 'uapv1602104'  ) ;
define ('PASS', 'bGQ1hI' ) ;
define ('DB', 'etd' ) ;

class dbconnection
{
  private $link, $error ;

  public function __construct()
  {
    $this->link = null;
    $this->error = null;
    try{
       // ici on crée une instance de l'objet PDO pour établir une connexion avec la base de données 
       // cette nouvelle instance sera assignée à $this->link 
       $this->link = new PDO('pgsql:host='.HOST.'; dbname='.DB.';user='.USER.';password='.PASS);
    }catch( PDOException $e ){
        $this->error =  $e->getMessage();
    }
  }

  public function getLastInsertId($att)
  {
    return $this->link->lastInsertId($att."_id_seq");
  }

  public function doExec( $sql )
  {
    $prepared = $this->link->prepare( $sql );
    return $prepared->execute();
  }

  public function doQuery( $sql )
  {
    $prepared = $this->link->prepare( $sql );
    $prepared->execute();
    $res = $prepared->fetchAll( PDO::FETCH_ASSOC );
   
    return $res;
  }

  public function doQueryObject( $sql, $className )
  {
	$prepared = $this->link->prepare( $sql );
    $prepared->execute();  
	$res = $prepared->fetchAll( PDO::FETCH_CLASS, $className );
	
	return $res;
  }

  public function __destruct()
  {
    $this->link = null;
  }
}
