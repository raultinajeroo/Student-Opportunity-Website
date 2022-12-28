<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 * Include your name here - ex. Modified by Villanueva for Assignment 2
 */
-->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CS 4342 User Login</title>

  <!-- Bootstrap CSS library https://getbootstrap.com/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
  <div style="margin-top: 20px" class="container">
    
    <h1>User Login</h1>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="username">User Name</label>
        <input class="form-control" type="text" id="text" name="email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password">
      </div>
      <div class="form-group">
        <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
      </div>
    </form>
	<a href="create_user.php">Don't have an account? Create one now!</a><br><br>
	
</body>
</html>

<?php

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;
$_SESSION['status'] = 0;
$_SESSION['personnel_username'] = 'username';

if (!empty($_POST)) {
  if (isset($_POST['Submit'])) {
    $input_username = isset($_POST['email']) ? $_POST['email'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";

    $queryAdmin = "SELECT * FROM administrator WHERE email='$input_username' AND password='$input_password'";
    $queryPersonnel = "SELECT * FROM utep_personnel WHERE email='$input_username' AND password='$input_password'";
    $queryStudent = "SELECT * FROM utep_student WHERE email_address='$input_username' AND password='$input_password'";
	
	$resultAdmin = $conn->query($queryAdmin);
	$resultPersonnel = $conn->query($queryPersonnel);
	$resultStudent = $conn->query($queryStudent);

    if ($resultAdmin->num_rows > 0) {
		$_SESSION['status'] = 2;
		$_SESSION['logged_in'] = true;
		header("Location: main_menu.php");
    } else if ($resultPersonnel->num_rows > 0) {
		$_SESSION['status'] = 1;
		$_SESSION['logged_in'] = true;
		$_SESSION['personnel_username'] = $input_username;
		header("Location: main_menu.php");
	} else if ($resultStudent->num_rows > 0) {
		$_SESSION['logged_in'] = true;
		header("Location: opportunity/view_active_opportunities.php");
	} else {
      echo "User not found.";
    }
	
	die();
  }
}
?>