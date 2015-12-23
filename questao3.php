<?php
class MyUserClass{
  public function getUserList() {
  	$server = "localhost";
  	$user = "user";
  	$password = "password";

    $dbconn = new DatabaseConnection($server,$user,$password);

    if($dbconn->connect_error){
    	die("Conexão falhou: ". $dbconn->connection_error);
    }else{
    	$results = $dbconn->query('select name from user');
    	sort($results);	
    	return $results;	
    }
  }
}

