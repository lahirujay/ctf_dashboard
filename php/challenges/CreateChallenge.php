<?php
include_once '../config.php';

if($conn)
{

    $username = $_POST['username'];
    $challenge = $_POST['challenge'];
    $points = $_POST['points'];

    $check = "SELECT user,challenge,points FROM challenges WHERE user = '$username' AND challenge = '$challenge'";
    
    if($result = mysqli_query($conn, $check))
    {
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);

            echo "Already completed";
        } else {
            $query = "INSERT INTO challenges VALUES ('$username','$challenge','$points')";

            if (mysqli_query($conn, $query)) {
                echo "challenge completed";
            } else {
                echo "challenge failed to create";
            }
        }
    }
    else
    {
        echo"<script>alert('ERROR:could not able to execute.')</script>";
    }
    //close connection
    mysqli_close($conn);
}	
?> 