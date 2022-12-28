<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Opportunity WHERE id=$id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No user id received on request at update_student_interface get";
    die();
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Update Opportunity</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Opportunity</h1>
		
        <form action="update_opportunity.php" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
			<div class="form-group">
                <label for="name">Vacancy Number</label>
                <input class="form-control" type="text" id="vacancy_number" name="vacancy_number" value="<?php echo $row['vacancy_number'] ?>">
            </div>
			<div class="form-group">
                <label for="name">Deadline Date</label>
                <input class="form-control" type="text" id="deadline_date" name="deadline_date" value="<?php echo $row['deadline_date'] ?>">
            </div>
			<div class="form-group">
                <label for="name">Deadline Date</label>
                <input class="form-control" type="text" id="deadline_date" name="deadline_date" value="<?php echo $row['deadline_date'] ?>">
            </div>
			<?php 
			if ($_SESSION['status'] > 1) { ?>
			<div class="form-group">
                <label for="name">Status</label>
                <input class="form-control" type="text" id="status" name="status" value="<?php echo $row['status'] ?>">
            </div>
			<?php 
			}
			?>
			<div class="form-group">
                <label for="name">Phone Number</label>
                <input class="form-control" type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number'] ?>">
            </div>
			<div class="form-group">
                <label for="name">Fax Number</label>
                <input class="form-control" type="text" id="fax_number" name="fax_number" value="<?php echo $row['fax_number'] ?>">
            </div>
			<div class="form-group">
                <label for="name">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $row['email'] ?>">
            </div>
			<div class="form-group">
                <label for="name">Link</label>
                <input class="form-control" type="text" id="link" name="link" value="<?php echo $row['link'] ?>">
            </div>
			<div class="form-group">
                <label for="name">Flyer</label>
                <input class="form-control" type="text" id="flyer" name="flyer" value="<?php echo $row['flyer'] ?>">
            </div>
			<div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
			<a href="../sign_out.php">Sign Out</a><br>
            <a href="view_opportunities.php">Back to Managing Opportunities</a>
			<br></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>