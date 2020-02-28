<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="chaatrom";

    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn)
    {
        die("failed to connect". mysqli_connect_error());
    }
?>