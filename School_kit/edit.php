<?php

    include_once("connections/connections.php");
    
    $con = connection();
    
    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id' " ;
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();


    if(isset($_POST['submit'])){
        $fname =  $_POST['first_name'];
        $lname =  $_POST['last_name'];
        $gender =  $_POST['gender'];

        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`,`gender`) VALUES ('$fname','$lname','$gender')";

        $con->query($sql) or die ($con->error);

        echo header("Location: index.php");
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
   
    <form action="" method="post">
        <label for="">First Name</label>
        <input type="text" name="first_name" id="search" value="<?php echo $row['first_name'];?>">

        <label for="">Last Name</label>
        <input type="text" name="last_name" id="search" value="<?php echo $row['last_name'];?>">

        <label for="">Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="submit" name="submit" value="submit form">
    </form>

</body>
</html>