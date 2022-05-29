<?php

class Db{
    
    protected $dbHost="localhost";
    protected $dbUser="root";
    protected $dbPass="";
    protected $dbName="library_management";
    public $msg=" ";

    public function connect(){

        $connect = new mysqli($this->dbHost,$this->dbUser,$this->dbPass,$this->dbName);
        if($connect->connect_errno){
            die('Error with Db connection');
        }
        return $connect;
        
    }


    public function getPublishers(){
        $query = "SELECT * FROM publishers";
        $res = $this->connect()->query($query);

        if($res->num_rows){
            while($row = $res->fetch_object()){

                echo "<td>" . $row->pub_name . "</td>" ;
                echo "<td>" . $row->country . "</td>" ;
                echo "<td>" . $row->headquarter . "</td>" ;
                echo "<td>" . $row->no_of_branch . "</td>" ;
            }
        }
    }


    public function login(){
        session_start();
        $_SESSION['user'] = '';
        $_SESSION['userId'] = '';
        if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($this->connect(),$_POST['name']);
        $pass = mysqli_real_escape_string($this->connect(),$_POST['password']);
        $pass = md5($pass);
        
        $query = "SELECT * FROM admin WHERE name='$name' and password='$pass'";
        $res = $this->connect()->query($query);

        if($res->num_rows){
            $admin = $res->fetch_object();
            $_SESSION['userId'] = $admin->id;
            $_SESSION['user'] = $admin->name;
            header("Location: dashboard.php");
        }elseif(empty($_POST['name']) || empty($_POST['password'])){
           $this->msg = "Field empty";
        }
        else{
            $this->msg = "Wrong user or password";
        }
    }
}

public static function logout(){
    session_start();
    session_destroy();
    header('Location: login.php');
}
    

    

}

// $returnValue = new Db();
//  $returnValue->connect();
?>