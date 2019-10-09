<?php
$conn = mysqli_connect("localhost","root","root","trivia");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$delete_option = $_POST['delete_option'];
echo "Question to be deleted : " . $delete_option;
$DELETE = "DELETE from tbl_quiz where qid='$delete_option'";
echo $DELETE;
if(mysqli_query($conn, $DELETE))
{   
    header("Location: admin_view_question.php"); /* Redirect browser */
    exit();
}
else
{
echo "Error: " . "<br>" .mysqli_error($conn);
}

?>