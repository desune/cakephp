<?php
class User extends AppModel{
	var $name = "User";

//------MongoDB-----
	function checkLogin($username,$password){ 
		$params = array(
			'fields' => array('username','password'),
			'conditions' => array('username' => $username,'password' => $password),
			'order' => array('_id' => -1),
			'limit' => 35,
			'page' => 1,
			);
		$results = $this->find('all', $params);
		if($results == null){ 
			return false; 
		}else{ 
			return true; 
		} 
	} 

//------MySql
	// function checkLogin($username,$password){ 
	// 	$sql = "Select username,password from users Where username='$username' AND password ='$password'"; 
	// 	$this->query($sql); 
	// 	if($this->getNumRows()==0){ 
	// 		return false; 
	// 	}else{ 
	// 		return true; 
	// 	} 
	// } 

}