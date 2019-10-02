<?php
include("home/connection.php");
error_reporting(0);
if ($conn->connect_error)
{
 die("Connection failed: " . $conn->connect_error);
}
$t_id = $_POST['t_id'];
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$EmailId = $_POST['EmailId'];
$addr = $_POST['addr'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$confirm_password = $_POST['confirm_password'];

echo "$pass";
echo "$addr";
$INSERT = "INSERT Into tbl_register (First_Name, Last_Name, EmailId, addr, phone, pass, confirm_password) values('".$_POST["First_Name"]."','".$_POST["Last_Name"]."','".$_POST["EmailId"]."','".$_POST["addr"]."','".$_POST["phone"]."','".$_POST["pass"]."','".$_POST["confirm_password"]."')";

if(mysqli_query($conn, $INSERT))
{
echo "New record created successfully";
}
else
{
echo "Error: " . $INSERT . "<br>" .mysqli_error($conn);
}
?>