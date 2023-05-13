<?php
$systemName = "LOAN MANAGEMENT SYSTEM";

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $database = 'mikopo';
    private $password = '';
    private $dbConnect = false;
    protected $userTable = 'users';

    //Method to create connection with $conn as variable
    public function __construct() {

        if(!$this->dbConnect) {
            $conn = new mysqli(
                $this->host,
                $this->user,
                $this->password,
                $this->database
            );
        }
        if($conn->connect_error){
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        }else{
            $this->dbConnect = $conn;
        }
    }
    //Parse any query to return fetch data 
    protected function getData($sqlQuery) {

        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if ( $result->num_rows > 0 ) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo "No result found";
        }

        return $data;
    }
}