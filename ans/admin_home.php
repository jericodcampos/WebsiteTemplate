<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");

}   
elseif($_SESSION['usertype'] != 'admin'){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Home - ANS Technical Competency Program</title>
</head>
<body>
    <h1>Welcome to the Admin Home Page</h1>
    <p>This is a restricted area for administrators only.</p>

    <a href="logout.php">Logout</a>
</body>
</html>