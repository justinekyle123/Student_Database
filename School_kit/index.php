<?php

        
    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_SESSION['UserLogin'])){
        echo "welcome ".$_SESSION['UserLogin'];
    }else{
       echo "welcome guest";
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
    <h1 style="text-align:center;">Student System</h1>
    <?php if(isset($_SESSION['UserLogin'])){?>
        <a href="logout.php">Log out</a><?php }else{ ?>

        <a href="login.php">Login</a> ?>
    <?php  } ?>
    <a href="add.php">Add new</a>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <?php }while($row = $students->fetch_assoc()); ?>
        </tbody>
    </table>
</body>
</html>