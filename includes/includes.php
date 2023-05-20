<?php
require_once('database.php');
class User extends Database
{
    public function checkLogin() {

        if (!isset($_SESSION['email'])) {
            header ('Location:login.php');
		}
	}
    public function login($email, $password){

        $password = md5($password);
		$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
    }
    public function saveUser() {
        
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

        $sqlInsert = "INSERT INTO users VALUES (NULL, '".$firstname."', '".$lastname."', '".$email."', '".$password."', 'user')";

		mysqli_query($this->dbConnect, $sqlInsert);
    }
    public function userAvailabilityCheck() {

        //Check if user already registered
        $query = "SELECT * FROM users WHERE email='".$_POST['email']."'";

        $userResult = $this->getData($query);

        return $userResult;
    }
    public function getAddress($getUrl) {

        switch ($getUrl) {
            case 'register':
                $getUrl = 'register-group.php';
                break;
            
            default:
                $getUrl = null;
                break;
        }

        return $getUrl;
    }
}