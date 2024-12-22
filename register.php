<?php
// Handle form submission
include("connection.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $phnum = $_POST['phnum'];

    if ($password !== $confirmpassword) {
        // echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        $query = "INSERT INTO registerinfo (uname, fname, mname, lname, password, confirmpassword, email, phnum)
                  VALUES ('$uname', '$fname', '$mname', '$lname', '$password', '$confirmpassword', '$email', '$phnum')";

        $data = mysqli_query($conn, $query);
        if ($data) {
            echo "<script>alert('You have been registered successfully!');</script>";
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path_to_your_stylesheet.css"> <!-- Update this path -->
    <title>User Registration</title>
</head>
<body>
    <div class="qc-card">
        <form method="POST" class="uk-grid-small" uk-grid>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="text" placeholder="Username" name="uname" required />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="text" placeholder="First Name" name="fname" required />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="text" placeholder="Middle Name" name="mname" />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="text" placeholder="Last Name" name="lname" required />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="password" placeholder="Password" name="password" required />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="password" placeholder="Confirm Password" name="confirmpassword" required />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="email" placeholder="Email" name="email" required />
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input form-text uk-form-large" type="text" placeholder="Phone Number" name="phnum" required />
            </div>
            <div class="uk-width-1-1 uk-text-center">
                <button type="submit" name="register" style="background-color: #8c3838;" class="btn-transparent hvr-sweep-to-top">Register</button>
            </div>
        </form>
    </div>
</body>
</html>