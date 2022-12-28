<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file retrieves and displays the records of the table Student.
 */
-->


<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<?php $sql = "SELECT * FROM mostVisitedOpportunity";
    if ($result = $conn->query($sql)) {
    ?>
        <table class="table" width=50%>
        <h2>Most Visited Opportunity</h2>
            <thead>
                <td> ID </td>
                <td> Type of Opportunity</td>
                <td> Number of Visits</td>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_row()) {
                ?>
                    <tr>
                        <td><?php printf("%s", $row[0]); ?></td>
                        <td><?php printf("%s", $row[1]); ?></td>
                        <td><?php printf("%s", $row[2]); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>

</body>

<body>
    <?php $sql = "SELECT * FROM leastVisitedOpportunity";
    if ($result = $conn->query($sql)) {
    ?>
        <table class="table" width=50%>
        <h2>Least Visited Opportunity</h2>
            <thead>
                <td> ID </td>
                <td> Type of Opportunity</td>
                <td> Number of Visits</td>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_row()) {
                ?>
                    <tr>
                        <td><?php printf("%s", $row[0]); ?></td>
                        <td><?php printf("%s", $row[1]); ?></td>
                        <td><?php printf("%s", $row[2]); ?></td>
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
    <a href="../main_menu.php">Return to Main Menu</a><br>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>