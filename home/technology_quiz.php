
<?php error_reporting(0) ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Technology Quiz Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head>
<?php

				// Create connection
				$conn = mysqli_connect("localhost","root","root","trivia");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				?>  
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  width: 100%;
  height: 100%;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<?php
	function logout() {
		session_start();
		session_destroy();
		header("Location: ../index.php"); 
		exit();
  }

  if (isset($_GET['logout'])) {
    logout();
  }	
  ?>
<?php
session_start();
$username = $_SESSION["username"];

?>
<body>
   <div class="page-container">
   <!--/content-inner-->
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="index.php">Trivia</a></h1>
							</div>
							<div class="profile_details w3l" style="background-color:grey;margin-left:150px;">
								  <h1  style="color:white;"><b>IT QUIZ QUESTIONS</b></h1>
							</div>
						 
						<div class="profile_details w3l" style="float: right">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/user.png" alt=""> </span> 
												<div class="user-name">
													<p><?php echo "Hello " . $username ?></p>
													<span></span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="result.php"><i class="fa fa-user"></i> Results</a> </li> 
											<li> <a href="index.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				
		
		<div class="four-grids">
  			<center>
  			<table width= 70%>
				<?php
// read variable 
				$numbers = $_SESSION["numbers"];
				$count = $_SESSION["count"];
				$correctanswercount = $_SESSION["correctanswercount"];
				$quiz_category = "technology";
				if($count>=14){
					$lid = $_SESSION["lid"];
					$today = date("d/m/Y");
					$total = $count - 1;
					$INSERT = "INSERT into tbl_results (lid, score,total, date, quiz_category) values('".$lid."','".$correctanswercount."','".$total."','".$today."','technology')";
					if(mysqli_query($conn, $INSERT))
					{
						unset($_SESSION['count']);
						unset($_SESSION['numbers']);
						unset($_SESSION['correctanswercount']);
						header("Location: result.php"); /* Redirect browser */
						exit();
					}
					else
					{
					echo "Error: " . $INSERT . "<br>" .mysqli_error($conn);
					}
					
				}
				if(!$numbers){
					$numbers = range(1, 15);
					shuffle($numbers);
					$count = 1;
					$correctanswercount = 0;
					session_start();
					$_SESSION["numbers"] = $numbers;
					$_SESSION["count"] = $count;
					$_SESSION["correctanswercount"] = $correctanswercount;

				}
				
				if(isset($_POST['option1'])){
					$count++;
					$_SESSION["count"] = $count;
					$correct_answer = $_POST['correct_answer'];
					if($correct_answer == "a"){
						$correctanswercount++;
						$_SESSION["correctanswercount"] = $correctanswercount;
					}
					onCreate($count);
				}
				if(isset($_POST['option2'])){
					$count++;
					$_SESSION["count"] = $count;
					$correct_answer = $_POST['correct_answer'];
					if($correct_answer == "b"){
						$correctanswercount++;
						$_SESSION["correctanswercount"] = $correctanswercount;
					}
					onCreate($count);
				}
				if(isset($_POST['option3'])){
					$count++;
					$_SESSION["count"] = $count;
					$correct_answer = $_POST['correct_answer'];
					if($correct_answer == "c"){
						$correctanswercount++;
						$_SESSION["correctanswercount"] = $correctanswercount;
					}
					onCreate($count);
				}
				if(isset($_POST['option4'])){
					$count++;
					$_SESSION["count"] = $count;
					$correct_answer = $_POST['correct_answer'];
					if($correct_answer == "d"){
						$correctanswercount++;
						$_SESSION["correctanswercount"] = $correctanswercount;
					}
					onCreate($count);
				}
				if(isset($_POST['quit'])){

					unset($_SESSION['count']);
					unset($_SESSION['numbers']);
					header("Location: index.php"); /* Redirect browser */
   					exit();
				}
				
				//onCreate($numbers[$count]);
				$sql = "SELECT * FROM tbl_quiz where quiz_category='technology' and qid='$numbers[$count]'";
				
					if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result) > 0){
	
					  
					  
						while($row = mysqli_fetch_array($result))
							{
						  ?>
						  
						<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<tr>
							<th colspan="2" style="text-align:center"><h2><?php echo $row['question']?></h2></th>
							</tr>
							<tr>
								<td><input type="submit" name="option1"  style="background-color:#473b3b" class="button" value="<?php echo $row['a']?>"></td>
								<td><input type="submit" name="option2" style="background-color:#5b7d7b;margin-left:10px;" class="button" value="<?php echo $row['b']?>"></td>
							</tr>
							<tr>
							<input type="hidden" name="correct_answer"  style="display:inline" value="<?php echo $row['correct_answer']?>"/>
							<td><input type="submit" name="option3"  style="background-color:#4c264d" class="button" value="<?php echo $row['c']?>"></td>
							<td><input type="submit" name="option4" style="background-color:#61600e;margin-left:10px;" value="<?php echo $row['d']?>" class="button"></td>
							</tr>
							<tr>
							<input type="submit" name="quit" style="background-color:#bd271c;" value="GIVE UP" class="button"></td>	
							</tr>
							</form>
							<?php
					  }  
					} else
					{
						echo "No records matching your query were found.";
					}
				}

					
				function onCreate($qid){
					
					$sql = "SELECT * FROM tbl_quiz where quiz_category='technology' and qid='$numbers[$count]'";
				
					if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result) > 0){
	
					  
					  
						while($row = mysqli_fetch_array($result))
							{
						  ?>
						  
						<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<tr>
						
							<th colspan="2" style="text-align:center"><h2><?php echo $row['question']?></h2></th>
							</tr>
							<tr>
								<td><input type="submit" name="option1"  style="background-color:#473b3b" class="button" value="<?php echo $row['a']?>"></td>
								<td><input type="submit" name="option2" style="background-color:#5b7d7b;margin-left:10px;" class="button" value="<?php echo $row['b']?>"></td>
							</tr>
							<tr>
							<td><input type="submit" name="option3"  style="background-color:#4c264d" class="button" value="<?php echo $row['c']?>"></td>
							<td><input type="submit" name="option4" style="background-color:#61600e;margin-left:10px;" value="<?php echo $row['d']?>" class="button"></td>
							</tr>
							<tr>
							<input type="submit" name="quit" style="background-color:#bd271c;" value="GIVE UP" class="button"></td>	
							</tr>
							</form>
							<?php
					  }  
					} else
					{
						echo "No records matching your query were found.";
					}
				}

				}
					?>
				 
				
			</table>
			
			</center>
			<center>
			<table style="margin-top:40px;">
				
				<tr>
					<td>
					<div style="background-color:#962d5e;" class="button">Correct Answers : <?php echo $correctanswercount ?></div></td>	
					</td>
				</tr>
			</table>	
			</center>
			<div class="clearfix"></div>
		</div>
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
<div class="inner-block">

</div>
</div>
</div>
  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
   <script src="js/bootstrap.min.js"></script>

</body>
</html>