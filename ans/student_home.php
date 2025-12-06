<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}   
elseif($_SESSION['usertype'] != 'student'){
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Home - ANS Technical Competency Program</title>
</head>
<body>
    <h1>Welcome to the Student Home Page</h1>
    <p>This is a restricted area for students only.</p>
    <a href="logout.php">Logout</a>
</body>
</html>