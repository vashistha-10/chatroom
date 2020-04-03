<?php

$room = $_POST['roomname'];

if(strlen($room) > 20)
{
    echo '<script language = "javascript"> alert("Please choose name smaller than 20 characters");';
    echo 'window.location = "http://localhost/chatroom/index.php";';
        echo '</script>';

}

else 
{
    //connect to the chat database
    include 'database_conn.php';
$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result  = mysqli_query($conn,$sql);
if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        echo '<script language = "javascript"> alert("this room already exist ! Please try with a different name");';
       echo 'window.location = "http://localhost/chatroom/index.php";';
        echo '</script>';
    }
    else{
        $sql = "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ('$room', CURRENT_TIMESTAMP);";
        if(mysqli_query($conn,$sql)){
            echo '<script language = "javascript"> alert("Your room is ready !");';
            echo 'window.location = "http://localhost/chatroom/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
    }
}

}


?>