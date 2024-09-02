<?php
$con=new mysqli('localhost','root','','testing');
if($con){
    //echo"success!";

}
else{
    die(mysqli_error($con));
}

?>