<?php
     $roomname = $_GET['roomname'];

     include 'database_conn.php';
     $sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'";
     $result = mysqli_query($conn,$sql);
     if($result)
     {
          if(mysqli_num_rows($result) == 0)
          {
            echo '<script language = "javascript"> alert("Room does not exist!");';
            echo 'window.location = "http://localhost/chatroom";';
            echo '</script>';
          }
          
     }
     else {
         echo "error";
     }
     
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  .ipfile{
    height :50px;
    width : 800px;
    font-size : 20px;
    font-family:arial;
    border-radius:20px;
    border:2px solid black;
  }
  .bhai{
    height : 50px;
    width : 150px;
    font-size : 20px;
    font-family:arial;
    background: black;
    color:white;
    border-radius:20px;
    border:0px;
  }
  .bhai:hover{
    background: grey;
    color:black;
  }
body {
  margin: 0 auto;
  background:linear-gradient(black,red,white);
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px auto;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width:100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.scrolltable{
  height:340px;
  overflow-y:scroll;
}
</style>
</head>
<body>
<hr><font color = white size = 6>
Room name : <b><?php echo $roomname ?></b></font>
<hr>
<div class="container"><div class="scrolltable">
 
</div></div>



<input type="text" class="ipfile" name= "usermsg" id="usermsg" placeholder=" type your message here..."><br><br>
<center><button class="bhai" name="submitmsg" id="submitmsg">Send</button></center>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">

setInterval(run, 1000);
function run()
{
  $.post("refresh.php", {room:'<?php echo $roomname ?>'},
  function(data,status){
    document.getElementsByClassName('scrolltable')[0].innerHTML = data;
  }
  )
}

var input = document.getElementById("usermsg");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("submitmsg").click();
  }
});

$("#submitmsg").click(function(){
  var clientmsg = $("#usermsg").val();
  $.post("postmsg.php", {text : clientmsg, room:'<?php echo $roomname ?>', ip : '<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
  function(data, status){document.getElementsByClassName('scrolltable')[0].innerHTML = data;});
  $("#usermsg").val("");
  return false;
});

</script>

</body>
</html>
