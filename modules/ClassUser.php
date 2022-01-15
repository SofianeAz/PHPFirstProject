<?php
class User {

    public $username;

    public function setUsername($username){
		return $this->username = $username;
	}
    public function getUsername(){
		return $this->username;
	}

    public function checkName($param){
        $Db = databaseCon::getInstance();
        $checkIfExist = $Db->prepareQuery('SELECT 1 FROM `users` WHERE `username` = ?');
        $checkIfExist->bindValue(1, $param, PDO::PARAM_STR);         
        $checkIfExist->execute();
        return  $checkIfExist->fetchColumn();
} 

}

?>