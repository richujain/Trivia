<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Trivia Welcome Page</title>
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
<script>
	function technology(){
		window.location.href = "technology_quiz.php";
	}
	function science(){
		window.location.href = "science_quiz.php";
	}
</script>
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
								<h1><a href="index.php"><b>Trivia</b></a></h1>
							</div>
							<div class="logo-w3-agile">
										<h1><a href="index.php">About us</a></h1>
									</div>
									<div class="logo-w3-agile">
												<h1><a href="learnmore.php">Learn More</a></h1>
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
<br>
<br>
<br>

				<p style="margin-top:20px;align:justify|center">Trivia is a free online dictionary of quiz and Internet terms. The original Trivia site launched in 2019 and it has been growing ever since. Trivia definitions are available via the web as well as from mobile apps for iOS and Android.
					The goal of Trivia is simple — we want to make technical terms easy to understand. Instead of using high-level terminology, Trivia definitions are written in simple everday language. We also believe that while definitions of computer terms are helpful, simple explanations of terms with examples are even better. Therefore, most definitions on Trivia.com include real-life examples of how the term is used.
</p><p>Some terms in the Trivia Computer Dictionary are commonly used and require little technical knowledge to understand. Others are less common and may have definitions that contain more advanced terminology. For this reason, each definition includes a "Tech Factor" rating from 1 to 10. Terms with low tech factors are basic terms that are well known, while terms with high tech factors are more advanced and are not used as often.</p>
					
					Help
					If you have questions about using the Trivia website or mobile apps, please visit the Help Center where you can find answers to frequently asked questions. If you have other inquiries or would like to suggest a term, please contact us.
				</p>


					<div class="clearfix"></div>
				</div>




<br>
<br>
<br


<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<footer>

<img src="footer1.png" alt="" >

</footer>
</body>
</html>
