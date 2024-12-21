<?php include("connection.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>User Registration</title>
</head>
<body>
    <div>
        <form action="#" method="POST">
            <h1>Register</h1>
            <div class="form">
                <div class="input field">
                    <label>UserName:</label>
                    <input type="text" class="input" name="uname"  placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <label>First Name:</label>
                    <input type="text" class="input" name="fname"  placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <label>Middle Name:</label>
                    <input type="text" class="input" name="mname">
                </div>
                <br>
                <div class="input field">
                    <label>Last Name:</label>
                    <input type="text" class="input" name="lname" placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <label>Password:</label>
                    <input type="password" class="input" name="password" placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <label>Confirm Password:</label>
                    <input type="password" class="input" name="confirmpassword" placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <label>Email:</label>
                    <input type="text" class="input" name="email" placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <label>Phone Number:</label>
                    <input type="text" class="input" name="phnum" placeholder="*" required>
                </div>
                <br>
                <div class="input field">
                    <input type="submit" value="register" class="btn" name="register">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uname=$_POST['uname'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $email=$_POST['email'];
        $phnum=$_POST['phnum'];

        $query="INSERT INTO registerinfo values('','$uname','$fname','$mname','$lname','$password','$confirmpassword','$email','$phnum')";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo "You have  been registered successfully";
        }
        else
        {
            echo "Registration failed";
        }

    }
?>