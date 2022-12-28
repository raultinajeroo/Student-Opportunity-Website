<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->


<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM utep_personnel where id = $id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No user id received on request at update_student_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 UTEP Personnel Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update UTEP Personnel</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_utep_personnel.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $row['email'] ?>">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input class="form-control" type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?>">
            </div>
            <div class="form-group">
                <label for="fax_number">Fax Number</label>
                <input class="form-control" type="text" id="fax_number" name="fax_number" value="<?php echo $row['fax_number'] ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
			<a href="../sign_out.php">Sign Out</a></br>
			<?php 
			if ($_SESSION['status'] > 1) { 
			?>
				<a href="view_utep_personnel.php">Back to Managing Personnel</a></br>
			<?php 
			} else { 
			?>
				<a href="../main_menu.php">Back to Main Menu</a></br>
			<?php
			}
			?>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>