<?php
include_once 'config.php';

if($conn)
{

    $username = $_POST['username'];

    $sql = "SELECT username,firstName,lastName,email FROM users WHERE username = '$username'";
    
    if($result = mysqli_query($conn, $sql))
    {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            echo json_encode(array("username"=>$row["username"], "firstName"=>$row["firstName"], "lastName"=>$row["lastName"], "email"=>$row["email"]));
        } else {
            echo "Authentication failed";
        }
    }
    else
    {
        echo"<script>alert('ERROR:could not able to execute $sql. ')</script>";
    }
    //close connection
    mysqli_close($conn);
}	
?> 
