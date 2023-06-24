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
    public function updateUser($oldpass) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $password = $_POST['password'];
        $password = md5($password);
        
        if ($oldpass == $password) {

            if(isset($password1) && isset($password2)) {

                if ($password1 == $password2) {
                    
                    $password = md5($password1);

                    if ($_SESSION['role'] = 'member') {

                        $sqlInsert = "
                            UPDATE group_members
                            SET firstname='".$firstname."', lastname='".$lastname."', password='".$password."'
                            WHERE email='".$_SESSION['email']."'";
        
                        mysqli_query($this->dbConnect, $sqlInsert);
                        $message = 'Member data updated successfully!';
                    } else {
        
                        $sqlInsert = "
                            UPDATE users
                            SET firstname='".$firstname."', lastname='".$lastname."', password='".$password."'
                            WHERE email='".$_SESSION['email']."'";
        
                        mysqli_query($this->dbConnect, $sqlInsert);
                        $message = 'Admin data updated successfully!';
                    }
                } else {

                    $message = "New password do not match! Please try again";
                }
            } else {
                if ($_SESSION['role'] = 'member') {

                    $sqlInsert = "
                        UPDATE group_members
                        SET firstname='".$firstname."', lastname='".$lastname."', password='".$password."'
                        WHERE email='".$_SESSION['email']."'";
    
                    mysqli_query($this->dbConnect, $sqlInsert);
                    $message = 'Member data updated successfully!';
                } else {
    
                    $sqlInsert = "
                        UPDATE users
                        SET firstname='".$firstname."', lastname='".$lastname."', password='".$password."'
                        WHERE email='".$_SESSION['email']."'";
    
                    mysqli_query($this->dbConnect, $sqlInsert);
                    $message = 'Admin data updated successfully!';
                }
            }
            
        } else {

            $message = 'Incorrect old password. Please confirm password and try again!';
        }

        return $message;
    }
    public function getUser() {

        $sqlQuey = "SELECT * FROM users WHERE email='".$_SESSION['email']."'";

        return $this->getData($sqlQuey);
    } 
    public function userAvailabilityCheck() {

        //Check if user already registered
        $query = "SELECT * FROM users WHERE email='".$_POST['email']."'";

        return $this->getData($query);
    }

    //Control web urls and page appearance on index page.
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
    public function getGroups() {
        
        $groupQuery = "SELECT * FROM groups";

        return $this->getData($groupQuery);
    }
    public function getGroupsDetails($id) {
        
        $groupQuery = "SELECT * FROM groups WHERE id='".$id."'";

        return $this->getData($groupQuery);
    }
    public function getMemberGroup($email) {

        $groupQuery = "SELECT * FROM groups WHERE groupadminid='".$email."'";

        return $this->getData($groupQuery);
    }
    public function saveMember() {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
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
            (NULL, '".$firstname."', '".$lastname."', '".$birthdate."', '".$gender."', '".$email."', '".$phonenumber."', '".$address."',
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
    public function getMembersDetails($adminid) {
        
        $memberQuery = "SELECT * FROM group_members WHERE adminid = '".$adminid."' AND status='ACCEPTED'";

        return $this->getData($memberQuery);
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

        if(isset($_FILES['upload'])){
            $file_name = $_FILES['upload']['name'];
            $file_ext = explode('.',$_FILES['upload']['name']);
            $file_ext = end($file_ext);
            $file_ext = strtolower($file_ext);
            $file_name = pathinfo($_FILES['upload']['name'], PATHINFO_FILENAME).uniqid().".".$file_ext;
            $file_tmp =$_FILES['upload']['tmp_name'];
         
            
            move_uploaded_file($file_tmp,"uploads/".$file_name);
           
        }

        $sqlInsert = "INSERT INTO group_activities VALUES 
        (NULL, '".$groupActivity."', '".$file_name."', '".$adminemail."')";

        mysqli_query($this->dbConnect, $sqlInsert);
        
        $message = 'Activity added successful!';

        
        return $message;
    }
    public function getActivity() {
        
        $adminemail = $_SESSION['email'];
        $activityQuery = "SELECT * FROM group_activities WHERE adminid='".$adminemail."'";

        return $this->getData($activityQuery);
    }
    public function getActivityDetails($adminemail) {
        
        $activityQuery = "SELECT * FROM group_activities WHERE adminid='".$adminemail."'";

        return $this->getData($activityQuery);
    }
    public function delGroupActivity($id) {

        $delQuery = "DELETE FROM group_activities WHERE id='".$id."'";
        mysqli_query($this->dbConnect, $delQuery);
    }
    public function submitApplication() {

        $check = $this->getApplication();
        if ($check == NULL) {
            
            $sqlQuery = "SELECT * FROM group_members WHERE adminid='".$_SESSION['email']."' AND status='ACCEPTED'";

            $result = $this->getData($sqlQuery);

            if (sizeof($result) >= 5) {

                $sqlInsert = "INSERT INTO applications VALUES (NULL, '".$result[0]['id']."', '".$_SESSION['email']."', '".$_POST['amount']."', 'IN REVIEW', NULL)";

                mysqli_query($this->dbConnect, $sqlInsert);
            } else {

                $message = "Accepted group members must be five or more!";
            }
        }

        return @$message;
    }
    public function getApplication() {
    
        $sqlQuery = "SELECT * FROM applications WHERE adminid='".$_SESSION['email']."'";
        return $this->getData($sqlQuery);
    }
    public function getApplicationDetails($adminid) {
    
        $sqlQuery = "SELECT * FROM applications WHERE adminid='".$adminid."'";
        return $this->getData($sqlQuery);
    }
    public function updateApplication($adminid) {

        $description = $_POST['description'];
        $status = $_POST['status'];

        $sqlInsert = "UPDATE applications SET status='".$status."', description='".$description."' WHERE adminid='".$adminid."'";

        mysqli_query($this->dbConnect, $sqlInsert);
    }
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
            case 'request':
                $getUrl = 'loan-request.php';
                break;
            case 'member':
                $getUrl = 'member-dash.php';
                break;
            case 'admin':
                $getUrl = 'admin-dash.php';
                break;
            case 'group-details':
                $getUrl = 'group-details.php';
                break;
            case 'settings':
                $getUrl = 'account-settings.php';
                break;
            default:
                $getUrl = null;
                break;
        }

        return $getUrl;
    }
}