
<?php

include 'config.php';
session_start();

$status = "";
if(isset($_POST['submit'])){
  $trn_date = date("Y-m-d H:i:s");
  $slot = $_REQUEST['slot'];
  $car = $_REQUEST['car'];
  $type = $_REQUEST['type'];
  $platenum = $_REQUEST['platenum'];
  $status = $_REQUEST['status'];
  $name = $_REQUEST['name'];
  $amount = $_REQUEST['amount'];


 $insert = mysqli_query($conn, "INSERT INTO `parkdb`(trn_date, slot, car, type, platenum, status, name, amount) VALUES('$trn_date', '$slot', '$car', '$type', '$platenum', '$status', '$name', '$amount')") or die('query failed');
  $status = "Reserved. <a href='b1slot.php'>View</a>";
 
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>BOOKING </title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>
</head>
<style>
  body {
      overflow: hidden;
    }
    .back{
    text-decoration: none;
    color: white;
    border-radius: 5px;
    background-color: #86B049;
    padding: 5px;
    margin: 10px;
    font-size:20px;
    font-weight: 20px;
    border: none;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
} 

  .savebtn:hover{
    text-decoration: none;
    background-color: #0161e7;
    margin: 400px;
    padding: 10px;
    color: white;
    display: block;
    margin-top: 18px;
    margin-bottom: 20px;
  }
  img:hover {
    animation: shake 0.5s;
    animation-iteration-count: infinite;
  }
  
  @keyframes shake {
    0% { transform: translate(1px, 1px) rotate(40deg); }
    10% { transform: translate(-1px, -2px) rotate(-1deg); }
    20% { transform: translate(-3px, 0px) rotate(1deg); }
    30% { transform: translate(3px, 2px) rotate(0deg); }
    40% { transform: translate(1px, -1px) rotate(1deg); }
    50% { transform: translate(-1px, 2px) rotate(-1deg); }
    60% { transform: translate(-3px, 1px) rotate(0deg); }
    70% { transform: translate(3px, 1px) rotate(-1deg); }
    80% { transform: translate(-1px, -1px) rotate(1deg); }
    90% { transform: translate(1px, 2px) rotate(0deg); }
    100% { transform: translate(1px, -2px) rotate(-1deg); }
  }
  
</style>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <div class="form">
        <div class="row">
            <div class="leftcolumn" style="border-radius:8px;">
                <div class="menu" style="overflow: auto;">
                <div class="picture_icon">
                <img class="sm" src="sm.png" alt="smlogo123" style="height: 120px;width: 120px; margin-left: 20px; margin-top: 45px; margin-bottom: 30px;">
                </div>
                <a class="a" href="home.php">ADMIN</a>    
                <a class="a" href="slotcar.php" style="background-color: #0161e7; color:white;">BOOK</a>
                <a class="a" href="b1occupied.php">RESERVED</a>
                <a class="a" href="mainhome.php">EXIT</a>
                </div>
                <!--CLOCK-->
    <button class="glow" style="margin-left:25px;">
        <body onload="initClock()">
            <!--digital clock start-->
            <div class="datetime">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
            </div>
            <!--digital clock end-->
        
            <script type="text/javascript">
            function updateClock(){
              var now = new Date();
              var dname = now.getDay(),
                  mo = now.getMonth(),
                  dnum = now.getDate(),
                  yr = now.getFullYear(),
                  hou = now.getHours(),
                  min = now.getMinutes(),
                  sec = now.getSeconds(),
                  pe = "AM";
        
                  if(hou >= 12){
                    pe = "PM";
                  }
                  if(hou == 0){
                    hou = 12;
                  }
                  if(hou > 12){
                    hou = hou - 12;
                  }
        
                  Number.prototype.pad = function(digits){
                    for(var n = this.toString(); n.length < digits; n = 0 + n);
                    return n;
                  }
        
                  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                  var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                  var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
                  var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
                  for(var i = 0; i < ids.length; i++)
                  document.getElementById(ids[i]).firstChild.nodeValue = values[i];
            }
        
            function initClock(){
              updateClock();
              window.setInterval("updateClock()", 1);
            }


            var car1 = []
            </script><br>
  </button>
    </div>  
        
    <div class="rightcolumn" style="margin-top:14px; border-radius:12px;">
    <h2 style="padding-left:0px; text-align:center; margin-left:0px; color: white; text-shadow: 4px 4px 5px #000000;">BOOK</h2>
    <div class="floor" oncontextmenu="return false;" onselectstart="return false;">
    <p>Right Side</p>
    <a href="b1car1.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
    <a href="b1car2.php"><img class="img"  src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
    <a href="b1car3.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
    <a href="b1car4.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
    <a href="b1car5.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
</div>

<hr>
        <div class="floor">
            <p>Left Side</p>
            <a href="b1car6.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
            <a href="b1car7.php"><img class="img"  src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
            <a href="b1car8.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
            <a href="b1car9.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
            <a href="b1car10.php"><img class="img" src="images/parkcar.png" style="transform: rotate(40deg); height: 90px; width:130px;"></a>
        </div>

    </div>

    
</div>


</body>
</html>