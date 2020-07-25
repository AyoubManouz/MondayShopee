<?php


class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // Get user by id
    public function getUserById($user_id = null, $table = "user"){
        $result = $this->db->con->query("Select * from {$table} WHERE user_id = {$user_id}");

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    // insert into user table
    public function  insertIntoUser($username,$lastname,$email,$tel,$sexe,$userpwd,$table="user"){
        if(isset($username) && isset($userpwd) &&isset($lastname) && isset($email) &&isset($tel) &&isset($sexe)){
            $s="select * from user where first_name='$username' && password='$userpwd'";
            $result=mysqli_query($this->db->con,$s);
            $num=mysqli_num_rows($result);
            if($num==1){
                //header('location:index.php');
                echo '<script>alert("user already exist ,try another coordinates ")</script>';
            }else{
                $reg="insert into user(first_name,last_name,email,tel,sexe,password) values('$username','$lastname','$email','$tel','$sexe','$userpwd')";
                mysqli_query($this->db->con,$reg);
                header('location:login.php');
                echo"registration successful";
            }
        }
    }

    //login
    public function loginUser($username,$userpwd,$table="user"){
        if(isset($username) && isset($userpwd)) {
            $s="select * from user where first_name='$username' && password='$userpwd'";
            $result=mysqli_query($this->db->con,$s);
            $num=mysqli_num_rows($result);
            $rs=mysqli_fetch_array($result);
            if($num==1){
                $_SESSION['id']=$rs['user_id'];
                $_SESSION["logged_in"] = true;
                $_SESSION["name"]=$username;
                header('location:index.php');
            }
            else{
                echo '<script>alert("unfound coordinations")</script>';
            }
        }
    }
}