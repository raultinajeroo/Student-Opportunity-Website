<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CS4342 Manage Opportunities</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
	<h2>All Opportunities</h2>
    <?php $sql = "SELECT * FROM Opportunity";
    if ($result = $conn->query($sql)) {
    ?>
        <table class="table" width=50%>
            <thead>
                <td> ID</td>
                <td> Vacancy Number</td>
                <td> Start Date</td>
                <td> Deadline Date</td>
                <td> Type</td>
                <td> Status</td>
                <td> Phone Number</td>
                <td> Fax Number</td>
                <td> Email</td>
                <td> Link</td>
                <td> Flyer</td>
                <td> Times Visited</td>
                <td> Personnel ID</td>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_row()) {
                ?>
                    <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                        <td><?php printf("%s", $row[1]); ?></td>
                        <td><?php printf("%s", $row[2]); ?></td>
                        <td><?php printf("%s", $row[3]); ?></td>
                        <td><?php printf("%s", $row[4]); ?></td>
                        <td><?php printf("%s", $row[5]); ?></td>
                        <td><?php printf("%s", $row[6]); ?></td>
                        <td><?php printf("%s", $row[7]); ?></td>
                        <td><?php printf("%s", $row[8]); ?></td>
                        <td><?php printf("%s", $row[9]); ?></td>
                        <td><?php printf("%s", $row[10]); ?></td>
                        <td><?php printf("%s", $row[11]); ?></td>
                        <td><?php printf("%s", $row[12]); ?></td>
                        <td><a href="update_opportunity_interface.php?id=<?php echo $row[0] ?>">Update</a></td>
                        <?php
						if ($_SESSION['status'] > 1) {
						?>
						<td><a href="delete_opportunity.php?id=<?php echo $row[0] ?>">Delete</a></td>
						<?php
						}
						?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
	
	<a href="../sign_out.php">Sign Out</a><br>
    <a href="../main_menu.php">Back to Main Menu</a><br>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>