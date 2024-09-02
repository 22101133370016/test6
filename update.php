<?php
include 'conn.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id= $_POST["id"];
    $fname= $_POST["fname"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];
    $password= $_POST['password'];

    $sql= "UPDATE user SET fname= '$fname', email='$email', phone='$phone',password='$password' WHERE ID=$id";
    if($con->query($sql)===TRUE){
        echo "records updated successfully";

    }
    else{
        echo "error updating".$sql."<br>".$con->error;
    }
    $con->close();
}
else{
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        /*$fname= $_GET['fname'];
         $email= $_GET['email'];
         $phone= $_GET['phone'];
         $password= $_GET['password'];*/
        $sql= "SELECT*FROM user WHERE ID=$id";
        $result=$con->query($sql);
        if($result==FALSE){
            echo "error".$con->error;
            exit;
        }
        $user= $result->fetch_assoc();
        if(!$user){
            echo "no user found with ID= $id";
            exit;
        }
    }
    else{
        echo" no user id found";
        exit;

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update_BY_ID</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
   
    <div class="dev">
   
    <?php if (isset($user)): ?>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="fname">Full-Name:</label><br>
        <input type="text" id="fname" name="fname" value="<?php echo $user['fname']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
        <label for="phone">Phone:</label><br>
        <input type="phone" id="phone" name="phone" value="<?php echo $user['phone']; ?>"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value=""><br>
        <input type="submit" value="  Update  "><br>
        <a href="create.php">back-to-home-page</a>
    </form>
    <?php else: ?>
        <h2><button><a href="create.php">back-home-page</a></button></h2><br>
        <h1><button><a href="display.php">view_users</a></button></h1>
    <?php endif; ?>
    </div>
    
</body>
</html>