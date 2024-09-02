<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="display.php"><h1><button>back_to_database</button></h1></a>
    
</body>
</html>


<?php
include 'conn.php';

$id=$_GET['id'];
$sql="DELETE FROM user WHERE id=$id";
if($con->query($sql)==TRUE){
    echo "record deleted successfully";
}
else{
    echo"error".$sql."<br>".$con->error;
}
$con->close();

exit;
?>
