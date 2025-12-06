<?php
error_reporting(0);

$host="localhost";
$user="root";
$password="";
$db="anstcc";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["username"];
    
    //$name(is a variable)
    //"username"(comes from login form"username")

    $pass=$_POST["password"]; //"password"(comes from login form name="password")

    $sql="SELECT * FROM user WHERE username='".$name."' AND password='".$pass."' ";

    //FROM user(this is database table name)  
    // WHERE username (is the column name in database table)
    //$name(is te variable defined above)


    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="admin"){
        session_start();//starts a new session or resumes an existing session
        $_SESSION['username']=$name; //creates a session variable

        $_SESSION['usertype'] = 'admin';
    
        header("location:admin_home.php");
    }
    elseif($row["usertype"]=="student"){
        $_SESSION['username']=$name;

             $_SESSION['usertype'] = 'student';
        header("location:student_home.php");
    }
    else{
        session_start();


        $message= "Username or Password incorrect"; //$message is a variable  that is assigned a value "Username or Password incorrect"

        $_SESSION['loginMessage'] = $message;//the $message is assigned to $_SESSION[loginMessage] so that it can be used in login.php page


        header("location:login.php");
    }
}


?>