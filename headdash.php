<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>e-Examination | Head Dashboard</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="img/favicon.png">
	<!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
	
	<!-- icons library -->
    <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/LineIcons.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	<!-- Animat -->
    <link rel="stylesheet" href="css/animate.css">
	
	<!--StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
	
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/color/color1.css">
	<!--<link rel="stylesheet" href="css/color/color2.css">-->
	<!--<link rel="stylesheet" href="css/color/color3.css">-->
	<!--<link rel="stylesheet" href="css/color/color4.css">-->

	<link rel="stylesheet" href="#" id="colors">
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preeloader">
		<div class="preloader-spinner"></div>
	</div>
	<!-- End Preloader -->
	
	<!-- Color Plate -->
	<div class="color-plate ">
		<a class="color-plate-icon"><i class="fa fa-cog fa-spin"></i></a>
		<h4>Colors</h4>
		<p>Here is some awesome color's</p>
		<span class="color1"></span>
		<span class="color2"></span>
		<span class="color3"></span>
		<span class="color4"></span>
	</div>
	<!-- /End Color Plate -->

	<!-- Header Area -->
	<header id="site-header" class="site-header">
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<p>e-Examination</p>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<div class="social-contact">
							<ul>
								<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1"><span class="log1"><span class="lni lni-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span><a href="headdash.php" class="log log1">'.$email.'</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#SignOutModal" class="log"><button class="btn-danger" style="padding:7px;"><span class="lni lni-exit" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Bottom -->
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="headdash.php?q=0"><h4><span class="lni lni-dashboard"></span> Dashboard</h4></a>
						</div>
						<!-- End Logo -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-10 col-md-10 col-12">
						<!-- Main Menu -->
						<div class="main-menu">
							<nav class="navigation ">
								<ul class="nav menu">
									<li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="headdash.php?q=0"><span class="lni lni-home"></span> Home<span class="sr-only">(current)</span></a></li>
        							<li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="headdash.php?q=1"><span class="lni lni-user"></span> User</a></li>
		    						<li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="headdash.php?q=2"><span class="lni lni-bar-chart"></span> Ranking</a></li>
									<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="headdash.php?q=3"><span class="lni lni-comments"></span> Feedback</a></li>
									<li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="headdash.php?q=4"><span class="lni lni-add-files"></span> Add Admin</a></li>
									<li <?php if(@$_GET['q']==5) echo'class="active"'; ?>><a href="headdash.php?q=5"><span class="lni lni-remove-file"></span> Remove Admin</a></li>
								</ul>
							</nav>
						</div>
						<!--/ End Main Menu -->
						   
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Bottom -->
    </header>
	<!--/ End Header Area -->
		
	<!-- Start Work Area -->
	<section id="about-us" class="work section" >
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="single-work">

					<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><table class="table table-striped table table-hover table-sm .table-responsive title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total Question</b></td><td><b>Marks</b></td><td><b>Positive</b></td><td><b>Negative</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
  	$wrong = $row['wrong'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$sahi.'</td><td>'.$wrong.'</td><td>'.$time.'&nbsp;min</td>
	</tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	</tr>';
}
}
$c=0;
echo '</table></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title">
<table class="table table-striped table table-hover table-sm .table-responsive title1" >
<tr ><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
}
echo '</table></div>';}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><table class="table table-striped table table-hover table-sm .table-responsive title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><table class="table table-striped table table-hover table-sm .table-responsive title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="headdash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="headdash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->



<!--add admin start-->

<?php
if(@$_GET['q']==4) {
echo ' 

<div class="row">
  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Admin Details</b></span><br /><br />
  <div class="col-md-3  col-lg-3">
    
  </div>
  
  <div class=" col-md-6 col-lg-6">   
    
    <form class="form-horizontal title1" name="form" action="signadmin.php?q=headdash.php?q=4"  method="POST">
    <fieldset>


<!-- Text input-->
  <div  class="" style="margin:auto;">
    <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>
      <div class="col-md-12">
        <input id="email" name="email" placeholder="Enter Admin Email" class="form-control input-md" type="email">

      </div>
    </div>



<!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="total"></label>
    <div class="col-md-12">
      <input id="password" name="password" placeholder="Enter password" class="form-control input-md" type="password">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12">
      <input  type="submit" style="margin-left:45%" value="Submit" class="btn btn-primary"/>
    </div>
  </div>

</fieldset>
    </form>

  </div>
  
  <div col-md-3 class="col-lg-3">
    
  </div>
</div>'
;



}
?>
<!--add admin end-->


<!--users start-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM admin where role ='admin' ") or die('Error');
echo  '<div class="panel"><table class="table table-striped table table-hover table-sm .table-responsive title1">
<tr><td><b>Email</b></td><td><b>Action</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  
    $email = $row['email'];
  

  echo '<tr><td>'.$email. '</td>
  <td><a data-toggle="modal" data-target="#deleteUser" title="Delete User"><b><button class="btn-danger pull-right" style="padding:7px;"><span class="lni lni-trash" aria-hidden="true"></span>&nbsp;Delete User</button></b></a></td></tr>
	
  <!-- Confirm Delete Modal -->
	<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Confirm User Delete</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				Do you really want to delete user?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-danger" data-dismiss="modal" style="padding:10px;">Cancel</button>
                    <a class="btn-primary" style="padding:6px;" href="update.php?demail1=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b>Delete User</a>
				</div>
			</div>
		</div>
	</div>
  
  ';
}
$c=0;
echo '</table></div>


';

}?>
<!--user end-->
				



<?php
include_once 'modal.php';
?>


 
	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Steller JS -->
	<script src="js/steller.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Wow Min JS -->
	<script src="js/wow.min.js"></script>
	<!-- Jquery Counterup JS -->
	<script src="js/jquery-counterup.min.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
</body>
</html>