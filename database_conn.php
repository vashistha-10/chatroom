<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "chatroom";

//Creating the database connection
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    echo "error";
    die(mysqli_connect_error());
}


?>
