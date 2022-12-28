<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['id'])) {
	$id = isset($_POST['id']) ? $_POST['id'] : ' ';
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
	$number_visits = isset($_POST['number_visits']) ? $_POST['number_visits'] : ' ';
	$personnel_id = isset($_POST['personnel_id']) ? $_POST['personnel_id'] : ' ';
	
	// This subquery is to update everything
	# $query = "UPDATE Opportunity SET id=$id, vacancy_number=$vacancy_number, start_date='$start_date', deadline_date='$deadline_date', type='$type', status='$status', phone_number=$phone_number, fax_number=$fax_number, email='$email', flyer='$flyer', number_visits=$number_visits, PerID=$personnel_id WHERE id=$id";
	
	// This subquery just allows certain fields of the opportunity to be changed
	$query = "UPDATE opportunity SET vacancy_number=$vacancy_number, deadline_date='$deadline_date', phone_number=$phone_number, fax_number=$fax_number, email='$email', flyer='$flyer' WHERE id=$id";
	$status = "UPDATE opportunity SET status='$status' WHERE id=$id";
	# echo $query;

	if (mysqli_query($conn, $query) and mysqli_query($conn, $status)) {
		echo 'Record updated successfully!';
		header('Location: view_opportunities.php');
	} else {
		echo 'Error updating record: ' . mysqli_error($conn);
	}
} else {
	echo 'Could not find record with id: ' . $id;
	die();
}
?>