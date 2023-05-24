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
    public function registerGroup() {
        
        $groupName = $_POST['groupname']; 
        $shortName = $_POST['shortname'];
        $phoneNumber = $_POST['phonenumber'];
        $groupEmail = $_POST['email'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        $contactnumber = $_POST['contactnumber'];
        $contactname = $_POST['contactname'];
        $adminemail = $_SESSION['email'];

        if (isset($groupEmail)) {

            $checkQuery = "SELECT * FROM groups WHERE groupemail='".$groupEmail."'";
            
            $chechResult = $this->getData($checkQuery);

            //Check if group already exists then update else create new 
            if (!empty($chechResult)) {

                $groupId = $_POST['id'];
               
                $sqlInsert = "
                UPDATE groups
                SET groupname='".$groupName."', shortname='".$shortName."', phonenumber='".$phoneNumber."', groupemail='".$groupEmail."',
                location='".$location."', postaddress='".$address."', contactphone='".$contactnumber."', contactphone='".$contactname."',
                postaddress='".$adminemail."'
                WHERE id='".$groupId."'";

                mysqli_query($this->dbConnect, $sqlInsert);
                $message = 'Changes saved successful!';
            } else {
                
                $sqlInsert = "INSERT INTO groups VALUES 
                (NULL, '".$groupName."', '".$shortName."', '".$phoneNumber."', '".$groupEmail."',
                '".$location."', '".$address."', '".$contactnumber."', '".$contactname."', '".$adminemail."' )";

                mysqli_query($this->dbConnect, $sqlInsert);
                
                $message = 'Data saved successful!';
            }
                
            return $message;
        }
    }
    public function getGroup() {

        $groupQuery = "SELECT * FROM groups WHERE groupadminid='".$_SESSION['email']."'";

        return $this->getData($groupQuery);
    }
}