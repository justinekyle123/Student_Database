<?php

    if(!isset($_SESSION)){
        session_start();
    } 

    include_once("connections/connections.php");
    $con = connection();
    
    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

     $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password' ";

     $user = $con->query($sql) or die ($con->error);
     $row = $user->fetch_assoc();

    echo $total = $user->num_rows;

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <h1>Login Page</h1><br>

   <form action="" method="post">
        <label for="">Username</label>
        <input type="text" name="username" id="username">

        <label for="">Password</label>
        <input type="text" name="password" id="password">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>