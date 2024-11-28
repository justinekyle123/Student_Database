<?php

        
    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "admin"){
        echo "welcome ".$_SESSION['UserLogin'];
    }else{
       echo header("Location: index.php");
    }

    include_once("connections/connections.php");
    
    $con = connection();
    
    $sql = "SELECT * FROM student_list";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();

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
    
</body>
</html>