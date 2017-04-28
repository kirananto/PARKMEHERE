<html>

<head>

  <?php
  include 'sql.php';
  session_start();
  ?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
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

      <h5 class="indigo-text">Sign Up</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="width:70%;display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='name' id='name' />
                <label for='name'>Enter your Name</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' />
                <label for='username'>Enter your UserName</label>
              </div>
            </div>
<!-- starting -->
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' minlength="8" name='password' id='password' />
                <label for='password' data-error="Please enter a name of length minum 8 characters" data-success="Perfect!">Enter your Password</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='passwordConfirm' id='passwordConfirm' />
                <label for='passwordConfirm' data-error="Passwords do not match" data-success="Passwords Match">Retype password</label>
              </div>
            </div>


            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='phoneno' id='phoneno' />
                <label for='phoneno'>Enter your Phone Number</label>
              </div>
            </div>
<!-- ending -->
<script>
$("#password").on("focusout", function (e) {
    if ($(this).val() != $("#passwordConfirm").val()) {
        $("#passwordConfirm").removeClass("valid").addClass("invalid");
    } else {
        $("#passwordConfirm").removeClass("invalid").addClass("valid");
    }
});

$("#passwordConfirm").on("keyup", function (e) {
    if ($("#password").val() != $(this).val()) {
        $(this).removeClass("valid").addClass("invalid");
    } else {
   </script>


            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>SIGN ME UP</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>
    <?php
    if(isset($_POST['btn_login']))
    {
      $name = $_POST['name'];
      $username = $_POST['username'];
      $phoneno = $_POST['phoneno'];
      $password = $_POST['password'];
      $sql1="select * from signup where Phone like '%$phoneno%';";
      $result=mysqli_query($con,$sql1);
      if(mysqli_num_rows($result)<=0)
      {
        $sql = "INSERT INTO `signup`(`Name`, `Phone`,`Username`, `Password`) VALUES ($name,$username,$phoneno,$password)";
        if(mysqli_query($con,$sql)){
              $_SESSION['user']=$username;
              header('location:panel.php');
              exit();
        }
        else{
          //echo 'failure';
        }
      }
      else
        echo "AlreadyDone";

    }
    ?>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>
