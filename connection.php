<?php

$con = mysqli_connect("localhost","br_user","bookrecommender","br");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

