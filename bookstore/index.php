<?php
include("DBConn.php");

// Connect to the database
global $conn;

session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the username and password from the POST request
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Check if the username and password are correct
    $sql = "SELECT * FROM tbluser WHERE Email = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $logged_in_user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $logged_in_user['Email'];

        if (password_verify($password, $logged_in_user['Password'])) {
            if ($logged_in_user['ULevel'] == "user") {
                header("location: home.php");
            }
            if ($logged_in_user['ULevel'] == "admin") {
                header("location: about.php");
            }
            if ($logged_in_user['ULevel'] == "pending") {
                header("location: AdminValidate.php");
            }
        }
    } else {
        echo "<p class='error-message'>Invalid username or password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
        background-color: #f2f2f2; /* Light gray background color */
		font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: #cdcdcd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-box {
            width: 300px;
        }

        .field {
            margin: 10px 0;
        }

        .field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ff0000; /* Red border */
            border-radius: 5px;
        }

        .btn {
			width: 50%;
            background-color: #ff0000; /* Red button background color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #cc0000; /* Darker red on hover */
        }

        .h {
            color: #ff0000; /* Red heading color */
        }

        .error-message {
            color: #cc0000; /* Red error message color */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <h1 class="heading h">Login</h1>
            
            <form class="login_details" action="index.php" method="post">
                <div class="field">
                    <input type="text" name="username" placeholder="Email" required>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="field">
                    <input type="submit" value="Login Student" name="submit" class="btn">
                </div>
                <p>Don't have an account? <a href="Register.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>

</html>
