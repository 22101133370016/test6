<?php
include 'conn.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $fname= $_POST['fname'];
    $email= $_POST['email'];
    $phone =$_POST['phone'];
    $password= $_POST['password'];


    $sql="INSERT INTO user(fname,email,phone,password)
    VALUES('$fname','$email','$phone','$password')";

    if($con->query($sql)==TRUE){
        echo" inserted successfully";
    }
    else{
        echo" failed to insert new user".$sql.'<br> '.$con->error;
    }
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_new_user</title>
    <link rel="stylesheet" href="create.css">
    
   
</head>
<body >
    <div  class="dev">
        <form action="create.php" method="POST" >
            <h1>Dear customer fill bellow form carefully and correct</h1>
            <label for="Fname">NAME</label><br>
            <input type="text" name="fname"required placeholder="enter_name"><br><br>
            <label for="email">EMAIL</label><br>
            <input type="email" name="email"required placeholder="enter-email"><br><br>
            <label for="phone">PHONE_NO</label><br>
            <input type="tel" name="phone" placeholder="enter phone no"><br><br>
            <label for="password">ENTER_PASSWORD</label><br>
            <input type="password" name="password"required placeholder="enter_password"><br><br>
            <input type="submit" value="submit"><br>
            <h3> <button> <a href="display.php">view_users</a></button> </h3>
        </form>
    </div>
</body>
</html>