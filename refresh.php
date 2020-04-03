<?php

$room = $_POST['room'];
include 'database_conn.php';
$sql = "SELECT msg, stime, ip FROM msgs WHERE room = '$room'";

$msgshow = "";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $msgshow = $msgshow . '<div class="container"><b><i><font face = verdana size = 2 color = red>IP address: ';
        $msgshow = $msgshow . $row['ip'];
        $msgshow = $msgshow . " : </font><p><b><font size = 4 face = verdana>message: ".$row['msg'];
        $msgshow = $msgshow . '</p></b></font> <span class="time-right">' . $row["stime"] . '</span></div>';
    }
}

echo $msgshow;

?>