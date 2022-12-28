<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else {
    echo "No user id received on request at update_student_interface get";
    die();
}

if (isset($id)) {
    #$query = "DELETE FROM opportunity WHERE id='$id'";
    $query = "UPDATE opportunity SET status='expired' WHERE id=$id";
	# echo $query;

    if (mysqli_query($conn, $query)) {
        echo 'Record deleted successfully!';
        header('Location: view_opportunities.php');
    } else {
        echo 'Error updating record: ' . mysqli_error($conn);
    }
} else {
    echo 'Could not find record with id: ' . $_POST['id'];
    die();
}

?>