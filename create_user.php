<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file creates the user for the DB, that can create students, e.g., the admin creating student records in the system.
 */



-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create User Account</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create User</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_user.php" method="post">
            <div class="form-group">
                <label for="username">ID</label>
                <input class="form-control" type="number" id="id" name="id">
            </div>
			<div class="form-group">
                <label for="username">Name</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
			<div class="form-group">
                <label for="username">Email</label>
                <input class="form-control" type="email" id="email" name="email">
            </div>
			<div class="form-group">
                <label for="username">Phone Number</label>
                <input class="form-control" type="number" id="phone_number" name="phone_number">
            </div>
			<div class="form-group">
                <label for="username">Fax Number</label>
                <input class="form-control" type="number" id="fax_number" name="fax_number">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="index.php">Back to User Login Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- PhP code starts here -->
    <?php
        require_once('config.php');
        
        if (isset($_POST['Submit'])){

    
    /**
     * Grab information from the form submission and store values into variables.
     */
    $id = isset($_POST['id']) ? $_POST['id'] : " ";
    $name = isset($_POST['name']) ? $_POST['name'] : " ";
    $email = isset($_POST['email']) ? $_POST['email'] : " ";
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : " ";
    $fax_number = isset($_POST['fax_number']) ? $_POST['fax_number'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";

    //Insert into Student table;
    $queryUser  = "INSERT INTO utep_personnel (id, name, email, phone_number, fax_number, password)
				VALUES ('".$id."', '".$name."', '".$email."', '".$phone_number."', '".$fax_number."', '".$password."');";
    if ($conn->query($queryUser) === TRUE) {
       echo "New user created successfully with the username: ".$username."</p>";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
    // If you want to redirect without seeing messages printed, uncomment the following line:
    //header("Location: index.php");
}
?>


</body>

</html>