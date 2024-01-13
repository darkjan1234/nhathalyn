<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);


  $select = mysqli_query($conn, "SELECT * FROM parkdb WHERE name = '$name'") or die('query failed');
  
  if(mysqli_num_rows($select) > 0){
     $row = mysqli_fetch_assoc($select);
     $_SESSION['user_id'] = $row['id'];
     header("location:b1slot.php");
  }else{
     $message[] = 'Not Find!';
  }

}

?>
<!DOCTYPE html>
<html>
<head>
<script>
function printTable() {
    window.print();
}
</script>

<meta charset="utf-8">
<title>RESERVED</title>
<link rel="icon" href="sm.png">
<link rel="stylesheet" href="styleindex.css"/>

</head>
<style>
  body {
      overflow: hidden;
    }
</style>
<body>
<div class="header">
        <h1>SM PARKING LOT SYSTEM</h1>
</div>
    <form class="form">
        <div class="row">
        <div class="leftcolumn" style="border-radius:8px;">
                <div class="menu" style="overflow: auto;">
                <img class="sm" src="sm.png" alt="smlogo" style="height: 120px;width: 120px; margin-left: 80px; margin-top: 45px; margin-bottom: 30px;">
                <a class="a" href="home.php">ADMIN</a>    
                <a class="a" href="slotcar.php" >BOOK</a>
                <a class="a" href="b1occupied.php" style="background-color: #0161e7; color:white;">RESERVED</a>
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
            </script><br>
    </button>
            </div>  
    </form>
    <form class="rightcolumn" style="margin-top:14px; border-radius:12px;">
    <h2 style="padding-left:250px; margin-left:43px; color: white; text-shadow: 4px 4px 5px #000000;">RESERVED PARKING</h2>
        <table width="100%" border="30" style="border:dotted;box-shadow: 10px 10px 5px lightblue;">
        <thead>
        <tr>
        <th><strong style="color:blue;">SLOT NO.</strong></th>
        <th><strong style="color:blue;">CAR</strong></th>
        <th><strong style="color:blue;">TYPE</strong></th>
        <th><strong style="color:blue;">PLATE NO.</strong></th>
        <th><strong style="color:blue;">STATUS</strong></th>
        <th><strong style="color:blue;">OWNER</strong></th>
        <th><strong style="color:blue;">AMOUNT</strong></th>
        <th><strong style="color:blue;">ACTIONS</strong></th>
        </tr>
        </thead>
        <body>
        <?php
        $count=1;
        $sel_query="Select * from parkdb ORDER BY id asc;";
        $result = mysqli_query($conn,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <td align="center"><?php echo $row["slot"]; ?></td>
        <td align="center"><?php echo $row["car"]; ?></td>
        <td align="center"><?php echo $row["type"]; ?></td>
        <td align="center"><?php echo $row["platenum"]; ?></td>
        <td align="center"><?php echo $row["status"]; ?></td>
        <td align="center"><?php echo $row["name"]; ?></td>
        <td align="center"><?php echo $row["amount"]; ?></td>
        <td align="center">
        <a href="b1slot.php? <span></span>id=<?php echo $row["id"] && $row["name"];?>"><img src="view.png" style="height:20px;width:20px;"></a>  
        <a href="print.php?id=<?php echo $row["id"]; ?>"><img src="printer.png" style="height:20px;width:20px;"></a>
        <a href="b1remove.php?id=<?php echo $row["id"]; ?>"><img src="bin.png" style="height:20px;width:20px;"></a>
       
        </tr>
        <?php $count++; } ?>
        </tbody>
        </table>
        </div>
        <form class="rightcolumn" style="margin-top:14px; border-radius:12px;">
    <h2 style="padding-left:250px; margin-left:43px; color: white; text-shadow: 4px 4px 5px #000000;">RESERVED PARKING</h2>
    <!-- ... Your existing table code ... -->

    <!-- Add a Print button -->
    <button onclick="printTable()">Print</button>
</form>

    </form>
    
</div>


</body>
</html>