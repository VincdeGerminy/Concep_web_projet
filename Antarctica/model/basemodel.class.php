<?php

abstract class basemodel
{
 private $data;
 
 public function basemodel($tab) {
	 $data = array();
	 foreach ($tab as $key => $valeur) {
		 _set($data[$key],$valeur);
	 }
 }
 
 public function basemodel2() {
	$data = array();
 }
 
 public function _set($key,$valeur) {
	$this->data[$key]=$valeur; 
 }
 
 public function _get($key) {
	 return $this->data[$key];
 }
 
 public function save()
  {
    $connection = new dbconnection() ;

    if($this->id)
    {
      $sql = "update ".get_class($this)." set " ;

      $set = array() ;
      foreach($this->data as $att => $value)
        if($att != 'id' && $value)
          $set[] = "$att = '".$value."'" ;

      $sql .= implode(",",$set) ;
      $sql .= " where id=".$this->id ;
    }
    else
    {
      $sql = "insert into ".get_class($this)." " ;
      $sql .= "(".implode(",",array_keys($this->data)).") " ;
      $sql .= "values ('".implode("','",array_values($this->data))."')" ;
    }

    $connection->doExec($sql) ;
    $id = $connection->getLastInsertId("jabaianb.".get_class($this)) ;

    return $id == false ? NULL : $id ; 
  }

}
