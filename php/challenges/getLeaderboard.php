<?php
include_once '../config.php';

if($conn)
{

    $check = "SELECT user,SUM(points) AS 'total' FROM challenges GROUP BY user ORDER BY total DESC";
    
    if($result = mysqli_query($conn, $check))
    {
        if (mysqli_num_rows($result)) {

            while($row = mysqli_fetch_array($result)) {
                $array[] = array("user"=>$row["user"],"total"=>$row["total"]);
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