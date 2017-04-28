<?php
include 'sql.php';
session_start();
if(!isset($_SESSION['user']))
{
  echo "  <center> NOT LOGGED IN</center> ";
  $succ = "<script type='text/javascript'>swal({
    title: 'Error',
    text: 'You are not Logged In',
    type: 'error'
  },
  function(){
    window.location.href = 'index.php';
  });</script>";
echo $succ;
}
?>
<html>

<head>
  <link rel="stylesheet" href="style1.css">
  <script src="dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=name]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=name]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>
<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="assets/images/logo.jpg" />
      <div class="section"></div>

      <h5 class="indigo-text">Welcome to ParkMeHere</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="width:50%; display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" method="post">

 <!-- JUNK BRS -->
<div class="row">
  <!-- CODE FOR TIMEPICKER -->
  <!-- <a class="c-btn c-datepicker-btn">
    <span class="material-icon">Open date picker</span>
  </a>

  <pre id="output"></pre> -->
  <label for='starting_time'>Enter Starting Time</label>
  <input type="time" id="starting_time" name="starting_time">

                </div>
 <!-- JUNK BRS -->
                <div class="row">
<label for='ending_time'>Enter Ending Time</label>
<input type="time" id="ending_time" name="ending_time">
                                </div>

                <br>
                 <!-- JUNK BRS -->

                 <div class='row'>
                   <button type='submit' name='btn_search' class='col s6 offset-s3 btn btn-large waves-effect red'>Search</button>
                 </div>
<br>
<script >

function booknow(i)
{
window.location = "http://127.0.0.1/albin/bookingpage.php?SlotNo="+i;
}
</script>
 <!-- Starting for handling post request -->
 <?php
 if(isset($_POST['btn_search']))
 {
        $start_time = $_POST['starting_time'];
        $end_time = $_POST['ending_time'];
        if($end_time > $start_time) {
        $res=mysqli_query($con,"SELECT * FROM `home` WHERE TimeFrom < '$start_time' AND TimeTo > '$start_time' AND  TimeFrom < '$end_time' AND TimeTo > '$end_time';");
        if($res!=null)
        {
          $_SESSION['start_time']=$start_time;
            $_SESSION['end_time']=$end_time;
          echo '<table class="table table-hover"><thead><tr><th>Slot Number</th><th>Slots Available</th><th>Status</th></tr></thead><tbody>';
        while($r=(mysqli_fetch_array($res)))
        {
          echo '<tr><td>'.$r['SlotNo'].'</td><td>'.$r['Slot_Avail'].'</td><td>'.$r['Book'].'</td><td><a class="waves-effect waves-light btn" onclick="booknow(\''.$r['SlotNo'].'\');">Book</a>
</td></tr>';
        }
        echo '</tbody>
        </table>';

        }
      }
 }
 ?>
</form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>

</html>
