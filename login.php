<?php
$con = mysqli_connect("localhost","root","root","trivia");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

$username = $_POST['username'];
$password = $_POST['password'];
if($username == "admin" && $password == "admin"){
  header("Location: home/admin_panel.php"); /* Redirect browser */
  exit();
}else{
  $sql = "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";
  $result = mysqli_query($con, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION["username"] = $username;
    $_SESSION["lid"] = $row['lid'];
    header("Location: home/index.php"); /* Redirect browser */
    exit();

  } else {
    echo "Your username or password is incorrect!";
  }
}

?>