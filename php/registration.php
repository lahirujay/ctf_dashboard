<?php
include_once 'config.php';

if($conn)
{
    // $_POST = json_decode(file_get_contents('php://input'),true);

    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "INSERT INTO `users` (`username`, `firstName`,`lastName`,`email`,`password`) VALUES ('$username','$firstName','$lastName','$email','$password')";
    
    if(mysqli_query($conn, $sql))
    {
        echo json_encode(array("username"=>$username));
        // echo header("Location:../Challenges.html?name=$username");
    }
    else
    {
        echo"<script>alert('ERROR:could not able to execute $sql. ')</script>";
    }
    //close connection
    mysqli_close($conn);
}	
?> 
