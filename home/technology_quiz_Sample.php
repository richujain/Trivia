<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
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

				// Create connection
				$conn = mysqli_connect("localhost","root","root","trivia");

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				?>  

				<?php

                  $q_id = trim(mysqli_real_escape_string($_GET['qid'])); 

                  $r = mysqli_query($conn, "select * from tbl_quiz where qid = '".$q_id."'");
                  
                  while($rs = mysqli_fetch_array($r))
                  {
                      ?>
                    <tr>
						<th colspan="2" style="text-align:center"><h2><?php echo $rs['question']?></h2></th>
						</tr>0
						<tr>
                            
							<td  style="text-align:center;background-color:#B4A796;margin:20px"><input type="radio" name="answer" value="<?php $rs['a']?>"><h4><?php echo $rs['a']?></h4></td>
							<td  style="text-align:center;background-color:#e1e1e1;margin:20px"><input type="radio" name="answer" value="<?php $rs['b']?>"><h4><?php echo $rs['b']?></h4></td>
						</tr>
						<tr>
							<td style="text-align:center;background-color:#e1e1e1;margin:20px"><input type="radio" name="answer" value="<?php $rs['c']?>"><h4><?php echo $rs['c']?></h4></td>
							<td style="text-align:center;background-color:#B4A796;margin:20px"><input type="radio" name="answer" value="<?php $rs['d']?>"><h4><?php echo $rs['d']?></h4></td>
						</tr>
                        <?php
                  }  
                    
					?>
				 
				
			</table>
			</center>	
			<div class="clearfix"></div>
		</div>
<!--//four-grids here-->





	
<!-- script-for sticky-nav -->
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
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<!--
<div class="copyrights">
	 <p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
	-->
<!--COPY rights end here-->
</div>
</div>
  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	

</body>
</html>