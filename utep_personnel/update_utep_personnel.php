
<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['id'])){

    $id = isset($_POST['id']) ? $_POST['id'] : " ";
    $name = isset($_POST['name']) ? $_POST['name'] : " ";
    $email = isset($_POST['email']) ? $_POST['email'] : " ";
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : " ";
    $fax_number = isset($_POST['fax_number']) ? $_POST['fax_number'] : " ";

    $query = "UPDATE utep_personnel SET name='$name', email='$email', phone_number='$phone_number' , fax_number='$fax_number' WHERE id = $id";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
		if ($_SESSION['status'] > 1) {
			header("Location: view_utep_personnel.php");
		} else {
			header("Location: ../main_menu.php");
        }
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No student id received on request at update student";
  die();
}

?>
