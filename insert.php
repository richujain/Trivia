<?php
include("home/connection.php");
error_reporting(0);
if ($conn->connect_error)
{
 die("Connection failed: " . $conn->connect_error);
}


echo "$pass";
echo "$addr";
$INSERT = "INSERT Into tbl_login (username, password, usertype,status) values('".$_POST["EmailId"]."','".$_POST["pass"]."','1','1')";
if(mysqli_query($conn, $INSERT))
{   
    header("Location: ./index.php"); /* Redirect browser */
    exit();
}
else
{
echo "Error: " . $INSERT . "<br>" .mysqli_error($conn);
}

/*

$result=mysql_query("SELECT count(*) as total from tbl_login");
            $data=mysql_fetch_assoc($result);
            $total_count =  $data['total'];
            $total_count++;
            echo $total_count;



            $INSERT = "INSERT Into tbl_register (lid,first_name, last_name, address, phone) values('$total_count','".$_POST["First_Name"]."','".$_POST["Last_Name"]."','".$_POST["addr"]."','".$_POST["phone"]."')";
echo $INSERT;
            if(mysqli_query($conn, $INSERT))
            {
                
            }
            else
            {
            echo "Error: " . $INSERT . "<br>" .mysqli_error($conn);
            }

            */
?>