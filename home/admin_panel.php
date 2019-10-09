
-->
<?php error_reporting(0); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Quiz Admin panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
                                  <h1  style="color:white;"><b> Admin  Panel</b></h1>
                            </div>
                         
                        <div class="profile_details w3l" style="float: right">      
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">   
                                                <span class="prfil-img"><img src="images/user.png" alt=""> </span> 
                                                <div class="user-name">
                                                    <p><?php echo "Hello Admin"?></p>
                                                    <span></span>
                                                </div>
                                                <i class="fa fa-angle-down"></i>
                                                <i class="fa fa-angle-up"></i>
                                                <div class="clearfix"></div>    
                                            </div>  
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="admin_view_question.php"><i class="fa fa-user"></i> View Questions</a> </li> 
                                            <li> <a href="index.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                     <div class="clearfix"> </div>  
                
        
<div class="form-group">
<center>
<table width= 100%>
                
<form name="adminpanel" method="post" enctype="multipart/form-data">

<center>
    <br/><br/><br/><br/><br/><br/><br/>
<label for="txtarea1" class="col-sm-2 control-label">Question</label>
<div class="col-sm-8"><textarea name="question" placeholder="Question" cols="50" rows="4" class="form-control1"></textarea></div>
<br/> <br/><br/>

<label for="smallinput" class="col-sm-2 control-label label-input-sm">Option A</label>
<div class="col-sm-8">
<input type="text" name="a" class="form-control1 input-sm" id="smallinput" placeholder="Option A">
</div>
<br/><br/><br/>
<label for="smallinput" class="col-sm-2 control-label label-input-sm">Option B</label>

<div class="col-sm-8">
<input type="text" name="b" class="form-control1 input-sm" id="smallinput" placeholder=" Option B">
</div>
<br/><br/><br/>
<label for="smallinput" class="col-sm-2 control-label label-input-sm">Option C</label>

<div class="col-sm-8">
<input type="text" name="c" class="form-control1 input-sm" id="smallinput" placeholder="Option C">
</div>
<br/><br/><br/>
<label for="smallinput" class="col-sm-2 control-label label-input-sm">Option D</label>
<div class="col-sm-8">
<input type="text" name="d" class="form-control1 input-sm" id="smallinput" placeholder=" Option D">
</div>
<br/><br/><br/>
<div class="form-group">
                                    <label class="col-sm-2 control-label"> Correct Answer </label>
                                    <div class="col-sm-8">
                                        <select multiple="" class="form-control1" name="correct_answer">
                                        <option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
                                        </select>
                                    </div>
                                </div>



<br/>
<br/>
<br/>
<br/>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Quiz  Category</label>
                                    <div class="col-sm-8">
                                        <select multiple="" class="form-control1" name="quiz_category">
                                        <option value="technology">Technology</option>
                                        <option value="science">Science</option>
                                        </select>
                                    </div>
                                </div>


<br/>
<br/><br/><br/>
<input type="submit" name="submit" value="submit" class="btn-primary btn">
<br/>

<?php
if(isset($_POST["submit"]))
{
$qid = $_POST['qid'];
$question=$_POST["question"]; 
$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["c"];
$d=$_POST["d"];
$correct_answer=$_POST["correct_answer"];
$quiz_category=$_POST["quiz_category"];




$i="INSERT Into tbl_quiz (question, a, b, c, d, correct_answer, quiz_category) values('".$_POST["question"]."','".$_POST["a"]."','".$_POST["b"]."','".$_POST["c"]."','".$_POST["d"]."','".$_POST["correct_answer"]."','".$_POST["quiz_category"]."')"; 

if(mysqli_query($conn, $i))
{
    header("Location: admin_view_question.php"); /* Redirect browser */
    exit();
}
else
{
echo "Error: ";
}

}

?>
</form>

                          
                        
                    
                
                
            </table>
            
            </center>
            
            
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
</div>
</div>
  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->  

</body>
</html>