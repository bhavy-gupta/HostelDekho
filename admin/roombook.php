<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("location:index.php");
}
?>

<?php
if (!isset($_GET["rid"])) {

	header("location:index.php");
} else {
	$curdate = date("Y/m/d");
	include('db.php');
	$id = $_GET['rid'];


	$sql = "Select * from booking where sno = '$id'";
	$re = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($re)) {
		$sno = $row['sno'];
		$name = $row['name'];
		$phone = $row['phone'];
		$email = $row['email'];
		$course = $row['course'];
		$hometown = $row['hometown'];
		$aphone = $row['alt_phone'];
		$troom = $row['type_room'];
		$meal = $row['meal'];
		$wifi = $row['wifi'];
		$laun = $row['laundry'];
		$cin = $row['check_in'];
		$cout = $row['check_out'];
		$sta = $row['stat'];
		$hostel = $row['hostel'];
		$days = $row['nodays'];
	}

	$ratesql = "SELECT `price` FROM `room` WHERE hostel_name = 'A'";
	$rate = mysqli_query($conn, $ratesql);
	while ($row = mysqli_fetch_array($rate)) {
		$price = $row['price'];
	}
}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Administrator </title>
	<!-- Bootstrap Styles-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Morris Chart Styles-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
			</div>

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
		</nav>
		<!--/. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">

					<li>
						<a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
					</li>
					<li>
						<a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
					</li>
					<li>
						<a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
					</li>
					<li>
						<a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
					</li>
					<li>
						<a href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
					</li>

					<li>
						<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>




				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->




		<div id="page-wrapper">
			<div id="page-inner">


				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">
							Room Booking<small> <?php echo  $curdate; ?> </small>
						</h1>
					</div>


					<div class="col-md-8 col-sm-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								Booking Confirmation
							</div>
							<div class="panel-body">

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>DESCRIPTION</th>
											<th>INFORMATION</th>

										</tr>
										<tr>
											<th>S.no</th>
											<th><?php echo $sno; ?> </th>

										</tr>
										<tr>
											<th>Name</th>
											<th><?php echo $name; ?> </th>

										</tr>
										<tr>
											<th>Phone No.</th>
											<th><?php echo $phone; ?></th>

										</tr>
										<tr>
											<th>Email </th>
											<th><?php echo $email;  ?></th>

										</tr>
										<tr>
											<th>Alternate Phone No </th>
											<th><?php echo $aphone; ?></th>

										</tr>
										<tr>
											<th>Course </th>
											<th><?php echo $course; ?></th>

										</tr>
										<tr>
											<th>Hometown</th>
											<th><?php echo $hometown; ?></th>

										</tr>
										<tr>
											<th>hostel</th>
											<th><?php echo $hostel; ?></th>

										</tr>
										<tr>
											<th>Room Type</th>
											<th><?php echo $troom; ?></th>

										</tr>
										<tr>
											<th>Meal Plan </th>
											<th><?php echo $meal; ?></th>

										</tr>
										<tr>
											<th>Wi-Fi </th>
											<th><?php echo $wifi; ?></th>

										</tr>
										<tr>
											<th>Laundry </th>
											<th><?php echo $laun; ?></th>

										</tr>
										<tr>
											<th>Check-in Date </th>
											<th><?php echo $cin; ?></th>

										</tr>
										<tr>
											<th>Check-out Date</th>
											<th><?php echo $cout; ?></th>

										</tr>
										<tr>
											<th>No of days</th>
											<th><?php echo $days; ?></th>

										</tr>
										<tr>
											<th>Status Level</th>
											<th><?php echo $sta; ?></th>

										</tr>





									</table>
								</div>



							</div>
							<div class="panel-footer">
								<form method="post">
									<div class="form-group">
										<label>Select the Confirmation</label>
										<select name="conf" class="form-control">
											<option value selected> </option>
											<option value="Confirmed">Confirm</option>
											<option value="Not-Confirmed">Not-Confirm</option>


										</select>
									</div>
									<input type="submit" name="co" value="Confirm" class="btn btn-success">

								</form>
							</div>
						</div>
					</div>

					<?php
					$rsql = "select * from room where hostel_name='$hostel'";
					$rre = mysqli_query($conn, $rsql);
					$r = 0;
					$snac = 0;
					$sac = 0;
					$dnac = 0;
					$dac = 0;
					while ($rrow = mysqli_fetch_array($rre)) {
						$r = $r + 1;
						$s = $rrow['type'];
						$p = $rrow['status'];
						if ($s == "SINGLE AC ROOM" and $p == "Unoccupied") {
							$sac = $sac + 1;
						}

						if ($s == "SINGLE NON-AC ROOM" and $p == "Unoccupied") {
							$snac = $snac + 1;
						}
						if ($s == "DOUBLE AC ROOM" and $p == "Unoccupied") {
							$dac = $dac + 1;
						}
						if ($s == "DOUBLE NON-AC ROOM" and $p == "Unoccupied") {
							$dnac = $dnac + 1;
						}
					}
					?>

					<?php
					$csql = "select * from payment";
					$cre = mysqli_query($conn, $csql);
					$cr = 0;
					$csc = 0;
					$cgh = 0;
					$csr = 0;
					$cdr = 0;
					while ($crow = mysqli_fetch_array($cre)) {
						$cr = $cr + 1;
						$cs = $crow['troom'];

						if ($cs == "SINGLE AC ROOM") {
							$csc = $csc + 1;
						}

						if ($cs == "SINGLE NON-AC ROOM") {
							$cgh = $cgh + 1;
						}
						if ($cs == "DOUBLE AC ROOM") {
							$csr = $csr + 1;
						}
						if ($cs == "DOUBLE NON-AC ROOM") {
							$cdr = $cdr + 1;
						}
					}

					?>
					<div class="col-md-4 col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Available Room Details
							</div>
							<div class="panel-body">
								<table width="200px">

									<tr>
										<td><b>Single AC Room</b></td>
										<td><button type="button" class="btn btn-primary btn-circle"><?php
																										$f1 = $sac - $csc;
																										if ($f1 <= 0) {
																											$f1 = "NO";
																											echo $f1;
																										} else {
																											echo $f1;
																										}


																										?> </button></td>
									</tr>
									<tr>
										<td><b>Single Non-AC Room</b> </td>
										<td><button type="button" class="btn btn-primary btn-circle"><?php
																										$f2 =  $snac - $cgh;
																										if ($f2 <= 0) {
																											$f2 = "NO";
																											echo $f2;
																										} else {
																											echo $f2;
																										}

																										?> </button></td>
									</tr>
									<tr>
										<td><b>Double AC Room </b></td>
										<td><button type="button" class="btn btn-primary btn-circle"><?php
																										$f3 = $dac - $csr;
																										if ($f3 <= 0) {
																											$f3 = "NO";
																											echo $f3;
																										} else {
																											echo $f3;
																										}

																										?> </button></td>
									</tr>
									<tr>
										<td><b>Double Non-AC Room</b> </td>
										<td><button type="button" class="btn btn-primary btn-circle"><?php

																										$f4 = $dnac - $cdr;
																										if ($f4 <= 0) {
																											$f4 = "NO";
																											echo $f4;
																										} else {
																											echo $f4;
																										}
																										?> </button></td>
									</tr>
									<tr>
										<td><b>Total Rooms </b> </td>
										<td> <button type="button" class="btn btn-danger btn-circle"><?php

																										$f5 = $r - $cr;
																										if ($f5 <= 0) {
																											$f5 = "NO";
																											echo $f5;
																										} else {
																											echo $f5;
																										}
																										?> </button></td>
									</tr>
								</table>





							</div>
							<div class="panel-footer">

							</div>
						</div>
					</div>
				</div>
				<!-- /. ROW  -->

			</div>
			<!-- /. ROW  -->




		</div>
		<!-- /. PAGE INNER  -->
	</div>
	<!-- /. PAGE WRAPPER  -->
	</div>
	<!-- /. WRAPPER  -->
	<!-- JS Scripts-->
	<!-- jQuery Js -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- Bootstrap Js -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- Morris Chart Js -->
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	<!-- Custom Js -->
	<script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
if (isset($_POST['co'])) {
	$st = $_POST['conf'];
	if ($st == "Confirmed") {
		$urb = "UPDATE `room` SET `status`='$st' WHERE sno = '$id'";

		if ($f1 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Single AC Room ')</script>";
		} else if ($f2 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Single Non-AC House')</script>";
		} else if ($f3 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Double AC Room')</script>";
		} else if ($f4 == "NO") {
			echo "<script type='text/javascript'> alert('Sorry! Not Available Double Non-AC Room')</script>";
		} else if (mysqli_query($conn, $urb)) {
			//echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
			//echo "<script type='text/javascript'> window.location='home.php'</script>";

			if ($troom == "Single AC Room") {
				$type_of_room = 30;
			} else if ($troom == "Single Non-AC Room") {
				$type_of_room = 18;
			} else if ($troom == "Double AC Room") {
				$type_of_room = 20;
			} else if ($troom == "Double Non-AC Room") {
				$type_of_room = 10;
			} else {
				$type_of_room = 0;
			}

			if ($meal == "Room Only") {
				$type_of_meal = 0;
			} else if ($meal == "Breakfast") {
				$type_of_meal = 40;
			} else if ($meal == "Breakfast + Dinner") {
				$type_of_meal = 65;
			} else if ($meal == "Breakfast + Lunch + Dinner") {
				$type_of_meal = 85;
			} else {
				$type_of_meal = 0;
			}


			if ($wifi == "Yes") {
				$wificharge = 10;
			} else {
				$wificharge = 0;
			}

			if ($laun == "Yes") {
				$laun_charge = 10;
			} else {
				$laun_charge = 10;
			}

			$price = ((int)$rate) / 30;
			$ttot = $type_of_room * $days;
			$mepr = $type_of_meal * $days;
			$wich = $wificharge * $days;
			$lach = $laun_charge * $days;

			$fintot = $price + $ttot + $mepr + $wich + $lach;

			//echo "<script type='text/javascript'> alert('$count_date')</script>";
			$psql = "INSERT INTO `payment` (`name`, `hostel`, `troom`, `cin`, `cout`, `noofdays`, `roomcharge`, `mealcharge`, `wificharge`, `launcharge`, `total`) VALUES ('$name', '$hostel', '$troom', '$cin', '$cout', '$days', '$ttot', '$mepr', '$wich', '$lach', '$fintot')";

			if (mysqli_query($conn, $psql)) {
				$sta = "Occupied";
				$rpsql = "update room set status='$sta' where sno=(select sno from room where status='Unoccupied' and hostel_name='$hostel' LIMIT 1);";
				if (mysqli_query($conn, $rpsql)) {
					echo "<script type='text/javascript'> alert('Booking Conform')</script>";
					echo "<script type='text/javascript'> window.location='roombook.php'</script>";
				}
			}
		}
	}
}




?>