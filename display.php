<?php
include 'conn.php';

$sql= "SELECT id,fname,email,phone FROM user";

$result = $con->query($sql);
if($result==FALSE){
    echo "failed to fetch".$con->error;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
</head>
<body>
    <h1><button ><a href="create.php">add_new_user</a></button></h1>
    <table border="35">
        <tr >
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>

        </tr>
        <?php
        if($result->num_rows>0){
            while( $row=$result->fetch_assoc()){
                echo "<tr >";
                echo '<td>' .$row['id'].'</td>';
                echo '<td>' .$row['fname'].'</td>';
                echo '<td>' .$row['email'].'</td>';
                echo '<td>' .$row['phone'].'</td>';
                echo "<td>
                      <a href='update.php?id= ".$row['id']."'>Update</a>
                      <a href='delete.php?id= ".$row['id']."'>Delete</a>
                     </td>";
                echo "</tr>";
                      
            }
        }
       else{
            //echo "<tr><td colspan='1115'>no record found</td></tr>";
        }
        ?>
    </table>
    
</body>
</html>