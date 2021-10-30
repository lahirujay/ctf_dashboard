<?php
include_once 'config.php';

if($conn)
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";
    
    if($result = mysqli_query($conn, $sql))
    {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            echo json_encode(array("username"=>$row["username"]));
        } else {
            echo "error";
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
