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
        
        $results = $this->getData($sqlQuery);

        if ($results != NULL) {
            $data = $results;
        } else  {

            $sqlQuery = "SELECT * FROM group_members WHERE email='".$email."' AND password='".$password."'";
            
            $results = $this->getData($sqlQuery);
            $data = $results;
        }

        return $data;
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

    //Control web urls and page appearance on index page.
    public function getAddress($getUrl) {

        switch ($getUrl) {
            case 'register':
                $getUrl = 'register-group.php';
                break;
            case 'group-members':
                $getUrl = 'add-group-members.php';
                break;
            case 'group-activities':
                $getUrl = 'add-group-activities.php';
                break;
            case 'member':
                $getUrl = 'member-dash.php';
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
                location='".$location."', postaddress='".$address."', contactphone='".$contactnumber."', contactname='".$contactname."'
                
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
        }
        
        return $message;
    }
    public function getGroup() {

        $groupQuery = "SELECT * FROM groups WHERE groupadminid='".$_SESSION['email']."'";

        return $this->getData($groupQuery);
    }
    public function getMemberGroup($email) {

        $groupQuery = "SELECT * FROM groups WHERE groupadminid='".$email."'";

        return $this->getData($groupQuery);
    }
    public function saveMember() {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $activies = $_POST['activities'];
        $position = $_POST['position'];
        $education = $_POST['education'];
        $adminemail = $_SESSION['email'];

        $password = md5('password'); //Set default password as password

        $sqlCheck = "SELECT * FROM group_members WHERE email='".$email."'";

        $checkResult = $this->getData($sqlCheck);

        if (!empty($checkResult)) {
            
            $message = 'User already registered. Please use another email address!';
        } else {

            $sqlInsert = "INSERT INTO group_members VALUES 
            (NULL, '".$firstname."', '".$lastname."', '".$gender."', '".$email."', '".$phonenumber."', '".$address."',
            '".$activies."', '".$position."', '".$education."', '".$password."', '".$adminemail."',
            'member', 'NOT SET' )";

            mysqli_query($this->dbConnect, $sqlInsert);
            
            $message = 'User added successful!';
        }
        
        return $message;
    }
    public function getMembers() {

        $groupQuery = "SELECT * FROM group_members WHERE adminid='".$_SESSION['email']."'";

        return $this->getData($groupQuery);
    }
    public function getMember() {

        $groupQuery = "SELECT * FROM group_members WHERE email='".$_SESSION['email']."'";

        return $this->getData($groupQuery);
    }
    public function delGroupMember($id, $email) {

        $delQuery = "DELETE FROM group_members WHERE id='".$id."'";
        mysqli_query($this->dbConnect, $delQuery);
        
        $message = 'Member with name '.$email.' deleted successful!'; //Return message

        return $message;
    }
    public function memberSign() {

        $status = $_POST['status'];

        $sqlInsert = "UPDATE group_members SET status='".$status."' WHERE email='".$_SESSION['email']."'";

        mysqli_query($this->dbConnect, $sqlInsert);
    }
    public function saveActivity() {

        $groupActivity = $_POST['activity'];
        $adminemail = $_SESSION['email'];

        $sqlInsert = "INSERT INTO group_activities VALUES 
        (NULL, '".$groupActivity."', '".$adminemail."')";

        mysqli_query($this->dbConnect, $sqlInsert);
        
        $message = 'Activity added successful!';
        
        return $message;
    }
    public function getActivity() {
        
        $adminemail = $_SESSION['email'];
        $activityQuery = "SELECT * FROM group_activities WHERE adminid='".$adminemail."'";

        return $this->getData($activityQuery);
    }
    public function delGroupActivity($id) {

        $delQuery = "DELETE FROM group_activities WHERE id='".$id."'";
        mysqli_query($this->dbConnect, $delQuery);
    }
}