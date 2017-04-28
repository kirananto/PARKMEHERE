<?php
//error_reporting(0);
$con = mysqli_connect('localhost','root','');
if(!$con)
{
echo "Not Connected";
}
mysqli_select_db($con,"parkmehere");
?>
