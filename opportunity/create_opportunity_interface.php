<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

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
        <h1>Create Opportunity</h1>

        <form action="create_opportunity.php" method="post">
            <!-- ------------------ vacancy_number ------------------ -->
            <input type="hidden" name="vacancy_number" id="" required>
            <div class="form-group">
                <label for="vacancy_number">Vacancy Number</label>
                <input class="form-control" type="number" id="vacancy_number" name="vacancy_number" required">
            </div>
            <!-- ------------------ start_date ------------------ -->
            <input type="hidden" name="start_date" id="" required>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input class="form-control" type="text" id="start_date" name="start_date" required">
            </div>
            <!-- ------------------ deadline_date ------------------ -->
            <input type="hidden" name="deadline_date" id="" required>
            <div class="form-group">
                <label for="deadline_date">Deadline</label>
                <input class="form-control" type="text" id="deadline_date" name="deadline_date" required">
            </div>
            <!-- ------------------ type ------------------ -->
            <input type="hidden" name="type" id="" required>
            <div class="form-group">
                <label for="type">Type</label>
                <input class="form-control" type="text" id="type" name="type" required">
            </div>
            <!-- ------------------ phone_number ------------------ -->
            <input type="hidden" name="phone_number" id="" required>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input class="form-control" type="number" id="phone_number" name="phone_number" required">
            </div>
            <!-- ------------------ fax_number ------------------ -->
            <input type="hidden" name="fax_number" id="" required>
            <div class="form-group">
                <label for="fax_number">Fax Number</label>
                <input class="form-control" type="number" id="fax_number" name="fax_number" required">
            </div>
            <!-- ------------------ email ------------------ -->
            <input type="hidden" name="email" id="" required>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" required">
            </div>
            <!-- ------------------ link ------------------ -->
            <input type="hidden" name="link" id="" required>
            <div class="form-group">
                <label for="link">Link</label>
                <input class="form-control" type="text" id="link" name="link" required">
            </div>
            <!-- ------------------ flyer ------------------ -->
            <input type="hidden" name="flyer" id="" required>
            <div class="form-group">
                <label for="flyer">Flyer</label>
                <input class="form-control" type="text" id="flyer" name="flyer" required">
            </div>
            <!-- ------------------ SUBMIT BUTTON ------------------ -->
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Create">
            </div>
        </form>
        <div>
            <a href="../main_menu.php">Back to Main Menu</a>
            <br></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>