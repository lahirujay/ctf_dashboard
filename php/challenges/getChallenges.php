<?php
include_once '../config.php';

if($conn)
{

    $username = $_POST['username'];

    $check = "SELECT user,challenge,points FROM challenges WHERE user = '$username'";
    
    if($result = mysqli_query($conn, $check))
    {
        if (mysqli_num_rows($result)) {

            while($row = mysqli_fetch_array($result)) {
                $array[] = array("user"=>$row["user"],"challenge"=>$row["challenge"],"points"=>$row["points"]);
            }
            echo json_encode($array);
        } else {
            echo "No rows found";
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