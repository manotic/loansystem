<?php
require_once('database.php');
class User extends Database
{
    // private $userTable = 'users';
    public function checkLogin() {
        if (empty($_SESSION['email'])) {
            header ('Location:login.php');
		}
	}
    public function login($email, $password){
        $password = md5($password);
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
    }
}