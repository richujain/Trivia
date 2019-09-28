<?php error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  echo "result is " . $result;
  if ($row = mysqli_fetch_assoc($result)) {
    echo "You are logged in!   " .$sql;

  } else {
    echo "Your username or password is incorrect!   " .$sql;
  }
?>