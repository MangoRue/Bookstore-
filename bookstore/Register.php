<?php
include("DBConn.php");
$fname = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<style>
    body {
        background-color: #f2f2f2; /* Light gray background color */
        font-family: Arial, sans-serif;
        overflow: hidden;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .box {
        background-color: white;
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
        background-color: #ff0000; /* Red button background color */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #cc0000; /* Darker red on hover */
    }

    .h {
        color: #ff0000; /* Red heading color */
    }
</style>

<body>
    <div class="container">
        <div class="box form-box">
            <h1 class="heading h">Register</h1>
            <form action="Register.php" method="post" class="form">
                <div class="field">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="field">
                    <input type="text" name="surname" placeholder="Surname" required>
                </div>
                <div class="field">
                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="field">
                    <input type="submit" name="register" value="Register" class="btn">
                </div>
                <p>Already registered? <a href="index.php">Sign in</a></p>
            </form>
        </div>
    </div>
</body>

</html>

<?php
global $conn;
$empty = "full";

if (isset($_POST["register"])) {
    $fname = $_POST['name'];
    $lname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['password'])) {
        $empty = "empty";
    }
    if ($empty == "full") {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO tbluser(FName, LName, Email, Password, ULevel) VALUES('$fname', '$lname', '$email', '$hash', 'pending')";

        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $_SESSION['success'] = "New user successfully created!";
        header('location: index.php');
    } else {
        echo "<p style='color: red;'>Enter all the fields first.</p>";
    }
}
?>
