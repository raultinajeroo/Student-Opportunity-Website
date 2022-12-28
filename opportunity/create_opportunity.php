<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');


$username = $_SESSION['personnel_username'];
$sql = "SELECT * FROM utep_personnel WHERE email='$username';";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$PerID = $row['id'];

echo $PerID;

if (isset($PerID)) {
	$vacancy_number = isset($_POST['vacancy_number']) ? $_POST['vacancy_number'] : ' ';
	$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : ' ';
	$deadline_date = isset($_POST['deadline_date']) ? $_POST['deadline_date'] : ' ';
	$type = isset($_POST['type']) ? $_POST['type'] : ' ';
	$status = isset($_POST['status']) ? $_POST['status'] : ' ';
	$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : ' ';
	$fax_number = isset($_POST['fax_number']) ? $_POST['fax_number'] : ' ';
	$email = isset($_POST['email']) ? $_POST['email'] : ' ';
	$link = isset($_POST['link']) ? $_POST['link'] : ' ';
	$flyer = isset($_POST['flyer']) ? $_POST['flyer'] : ' ';

	# CONTAINING ALL ATTRIBUTES : $query = "INSERT INTO opporunity VALUES (id, vacancy_number, start_date, deadline_date, type, status, phone_number, fax_number, email, link, flyer, number_visits, personnel_id);")
	$sql = "INSERT INTO opportunity(vacancy_number, start_date, deadline_date, type, phone_number, fax_number, email, link, flyer, number_visits, PerID) VALUES ($vacancy_number, '$start_date', '$deadline_date', '$type', $phone_number, $fax_number, '$email', '$link', '$flyer', 0, $PerID);";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		header('Location: view_opportunities.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	echo 'Error creating record with id: ' . $_POST['id'];
	die();
}
?>