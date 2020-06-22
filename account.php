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
	<title>e-Examination | Student</title>
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

	<!-- StyleSheet -->
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
								$email = $_SESSION['email'];
								if (!(isset($_SESSION['email']))) {
									header("location:index.php");
								} else {
									$name = $_SESSION['name'];

									include_once 'dbConnection.php';
									echo '<span class="pull-right top title1" ><span class="log1"><span class="lni lni-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="headdash.php" class="log log1">' . $email . '</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#SignOutModal" class="log"><button class="btn-danger" style="padding:7px;"><span class="lni lni-exit" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
								} ?>
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
							<h4><span class="lni lni-dashboard"></span> Dashboard</h4>
						</div>
						<!-- End Logo -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-10 col-md-10 col-12">
						<!-- Main Menu -->
						<div class="main-menu">
							<nav class="navigation ">
								<ul class="nav menu">
									<li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="account.php?q=1"><span class="lni lni-home" aria-hidden="true"></span> Home</a></li>
									<li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="account.php?q=2"><span class="lni lni-list" aria-hidden="true"></span> History</a></li>
									<li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="account.php?q=3"><span class="lni lni-bar-chart" aria-hidden="true"></span> Ranking</a></li>
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

	<!-- Hero Header Start-->

	<!-- Hero Header End-->

	<!-- Start Brands Area-->

	<!-- End Brands Area -->

	<!-- Start Work Area -->
	<section id="about-us" class="work section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="single-work">
						<?php if (@$_GET['q'] == 1) {

							$result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
							echo  '<div class="panel"><table class="table table-striped title1">
<tr style="color:black"><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>positive</b></td><td><b>negative</b></td><td><b>Time limit</b></td><td></td><td></td></tr>';
							$c = 1;
							while ($row = mysqli_fetch_array($result)) {
								$title = $row['title'];
								$total = $row['total'];
								$sahi = $row['sahi'];
								$wrong = $row['wrong'];
								$time = $row['time'];
								$eid = $row['eid'];
								// $id = $row['id'];
								$q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
								$rowcount = mysqli_num_rows($q12);
								if ($rowcount == 0) {
									echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $sahi . '</td><td>' . $wrong . '</td><td>' . $time . '&nbsp;min</td>
  <td><a title="Open quiz description" href="account.php?q=1&fid=' . $eid . '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>
  <td><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
								} else {
									echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $sahi . '</td><td>' . $wrong . '</td><td>' . $time . '&nbsp;min</td>
  </tr>';
								}
							}
							$c = 0;
							echo '</table></div>';
						} ?>
						<!----quiz reading portion starts--->

						<?php if (@$_GET['fid']) {
							echo '<br />';
							$eid = @$_GET['fid'];
							$result = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error');
							while ($row = mysqli_fetch_array($result)) {
								// $name = $row['name'];
								$title = $row['title'];
								$date = $row['date'];
								$date = date("d-m-Y", strtotime($date));
								//$time = $row['time'];
								$intro = $row['intro'];

								echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $title . '</b></h1>';
								echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;' . $date . '</span>
<span style="line-height:35px;padding:5px;"></span><br />' . $intro . '</div></div>';
							}
						} ?>
						<!--quiz reading portion closed-->

						<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

						<!--home closed-->

						<!--quiz start-->
						<?php
						if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
							$eid = @$_GET['eid'];
							$sn = @$_GET['n'];
							$total = @$_GET['t'];
							$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
							echo '<div class="panel" style="margin:5%">';
							while ($row = mysqli_fetch_array($q)) {
								$qns = $row['qns'];
								$qid = $row['qid'];
								echo '<b>Question &nbsp;' . $sn . '&nbsp;::<br />' . $qns . '</b><br /><br />';
							}
							$q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
							echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
<br />';

							while ($row = mysqli_fetch_array($q)) {
								$option = $row['option'];
								$optionid = $row['optionid'];
								echo '<input type="radio" name="ans" value="' . $optionid . '">' . $option . '<br /><br />';
							}
							echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
							//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
						}
						//result display
						if (@$_GET['q'] == 'result' && @$_GET['eid']) {
							$eid = @$_GET['eid'];
							$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error157');
							echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

							while ($row = mysqli_fetch_array($q)) {
								$s = $row['score'];
								$w = $row['wrong'];
								$r = $row['sahi'];
								$qa = $row['level'];
								echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>' . $qa . '</td></tr>
      <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
    <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
    <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
							}
							$q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ") or die('Error157');
							while ($row = mysqli_fetch_array($q)) {
								$s = $row['score'];
								echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
							}
							echo '</table></div><br> <a href="" class="log"><button class="btn-danger" style="padding:7px;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a>';
						}
						?>
						<!--quiz end-->
						<?php
						//history start
						if (@$_GET['q'] == 2) {
							$q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
							echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:black"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
							$c = 0;
							while ($row = mysqli_fetch_array($q)) {
								$eid = $row['eid'];
								$s = $row['score'];
								$w = $row['wrong'];
								$r = $row['sahi'];
								$qa = $row['level'];
								$q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
								while ($row = mysqli_fetch_array($q23)) {
									$title = $row['title'];
								}
								$c++;
								echo '<tr><td>' . $c . '</td><td>' . $title . '</td><td>' . $qa . '</td><td>' . $r . '</td><td>' . $w . '</td><td>' . $s . '</td></tr>';
							}
							echo '</table></div>';
						}

						//ranking start
						if (@$_GET['q'] == 3) {
							$q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
							echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:black"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
							$c = 0;
							while ($row = mysqli_fetch_array($q)) {
								$e = $row['email'];
								$s = $row['score'];
								$q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
								while ($row = mysqli_fetch_array($q12)) {
									$name = $row['name'];
									$gender = $row['gender'];
									$college = $row['college'];
								}
								$c++;
								echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
							}
							echo '</table></div>';
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- /End Work Area -->

	<!-- Sign Out Modal -->
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