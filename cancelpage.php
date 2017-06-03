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


if(!empty($_GET))
{
    $SlotNo = $_GET['SlotNo'];
    $username = $_SESSION['user'];
    $start_time = $_SESSION['start_time'];
    $end_time = $_SESSION['end_time'];
    $r123 = mysqli_query($con,"select Name from signup where Username = '$username';");
    $row = mysqli_fetch_assoc($r123);
    $name = $row['Name'];
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

      <h5 class="indigo-text">Cancel Your Booking</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="width:90%; display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' minlength="10" name='phno' id='phno' />
                <label for='phno' data-error="Enter a 10 digit phone numbers" data-success="Perfect!" >Enter your Phone Number for Confirmation</label>
              </div>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_book' class='col s12 btn btn-large waves-effect indigo'>BOOK</button>
              </div>
            </center>
            <?php
            if(isset($_POST['btn_book']))
            {
                $phoneno = $_POST['phno'];
                $booked = "Booked";
                $sql1="select * from signup where Phone like '%$phoneno%';";
                $result=mysqli_query($con,$sql1);
                if(mysqli_num_rows($result)>0) {
                $sql = "UPDATE `home` SET `Book`='Not Booked' WHERE SlotNo = $SlotNo";
                if(mysqli_query($con,$sql))
                {
                  echo '<script> swal({
  title: "Success....!!!",
  text: "Do you want to go back to home page ?!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes",
  cancelButtonText: "Nope..",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    window.location.replace("panel.php");
  } else {
    swal("Cancelled", "Ohkay take more Time to Think.. :)", "error");
  }
});
</script>';
                      //echo "<script type='text/javascript'>swal('DONE', ' Successfully Cancelled', 'success')</script>";
                      //header('location:panel.php');
                      exit();
                }
                else
                {
                    echo "<script type='text/javascript'>swal('Sorry', '   ERROR', 'error')</script>";
                }
              } else {
                echo "<script type='text/javascript'>swal('Sorry', '  Incorrect Phone NUmber', 'error')</script>";
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
