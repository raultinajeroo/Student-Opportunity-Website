<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS 4342 Opportunity Menu</title>

    <!-- Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <!-- Displaying a menu for CRUD operations in Student table -->
    <div class="container">
		<?php session_start();
		require_once('config.php');
		require_once('validate_session.php');
		if ($_SESSION['status'] == 1) {
			$username = $_SESSION['personnel_username'];
			$query = "SELECT * FROM utep_personnel WHERE email='$username';";
			$result = $conn->query($query);
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
		}
		if ($_SESSION['status'] > 1) { ?>
			<h2>Administrator Menu</h2>
		<?php 
		} else { ?>
			<h2>Personnel Menu</h2>
		<?php 
		} 
		if ($_SESSION['status'] == 1) {
		?>
        <a href="opportunity/create_opportunity_interface.php">Create Opportunity</a><br>
		<?php
		}
		?>
        <a href="opportunity/view_opportunities.php">Manage Opportunities</a><br>
        <a href="opportunity/view_active_opportunities.php">View Active Opportunities</a><br>
		<?php if ($_SESSION['status'] > 1) { ?>
			 <a href="opportunity/visit_report.php">View Vist Reports</a><br>
			 <a href="utep_personnel/view_utep_personnel.php">Manage Personnel</a><br>
		<?php
		} else { ?>
		<a href="utep_personnel/update_utep_personnel_interface.php?id=<?php echo $id ?>">Update Account</a><br>
		<?php
		}
		?>
		<a href="sign_out.php">Sign Out</a><br>	

    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>