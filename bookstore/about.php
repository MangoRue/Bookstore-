<?php
include("DBConn.php");

include 'loadBookstore.php';
global $conn;
session_start();

$user_id = $_SESSION['user'];

if(isset($_POST['drop_books'])){
    mysqli_query($conn, "DROP TABLE tblbooks ") or die('Query failed');

    $success_msg[] = "All books have been removed!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN link -->
    <title>Admin Page</title>
    <style>
        .form-box {
            margin-top: 50px;
            width: 40%;
        }

        .box {
            align-items: center;
        }

        .admin_header {
            text-align: center;
            color: #FF0000; /* Red color */
        }

        .sub_heading {
            text-align: center;
            color: #FF0000; /* Red color */
            margin-top: 20px; /* Adjust the top margin for vertical alignment */
        }

        .input-group {
            margin-bottom: 20px; /* Adjust the bottom margin for vertical alignment */
        }

        h4 {
            text-align: center;
        }

        input {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            width: 100%;
        }

        input:hover {
            border-color: #aaa;
        }

        .log-out {
            position: left;
            top: 0;
            right: 22px;
            height: 25px;
        }

        .log-out:hover {
            opacity: 0.8;
        }

        body {
            background-color: #ccc;
            width: 100%;
        }

        .btn {
            text-decoration: none;
            background-color: #FF0000;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #CC0000;
        }
			
		
		#col-1 {
		  position: fixed;
		  width: 50%;
		  float: left;
		  height: 100%;
		  background-color: #282828;
		}

		#col-2 {
		  position: fixed;
		  width: 50%;
		  float: right;
		  height: 100%;
		  background-color: #0080ff;
		}
		
		.split {
		  height: 100%;
		  width: 50%;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  overflow-x: hidden;
		  padding-top: 20px;
		}

		.left {
		  left: 0;
		  background-color: #111;
		}

		.right {
		  right: 0;
		  background-color: #222;
		}

		.centered {
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
    </style>
</head>

<body>
    
    <div class="split left">
        <div class="centered">
            <form action="about.php" method="post" autocomplete="off">
                <h1 class="admin_header">ADMIN</h1>
                <a href="index.php" class="btn log-out">Logout</a><br><br>

                <h3 class="sub_heading" style="color: red;">Pending Users:</h3>
                <div class="input-group">
                    <h4 style="color:white;">
                        <?php
                        $sql = "SELECT * FROM tbluser WHERE ULevel = 'pending'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<hr>Name: " . $row['FName'] . "<br>" . " Surname:   " . $row['LName'] . "<br>" . "Email: " . $row['Email'] . "<br>";
                            }
                        }
                        ?>
                    </h4>
                </div>

                <h3 class="sub_heading">Update User:</h3>
                <div class="input-group">
                    <input type="text" name="user_update" placeholder="Enter User Email to Update"><br>
                    <input type="submit" name="update" value="Update" class="btn">
                </div>
				        </div>
    </div>
<div class="split right">
        <div class="centered">
                <h3 class="sub_heading">Add User:</h3>
                <div class="input-group">
                    <input type="text" name="name" placeholder="Name" autocomplete="off"><br>
                    <input type="text" name "surname" placeholder="Surname" autocomplete="off"><br>
                    <input type="email" name="email" placeholder="Email" autocomplete="off"><br>
                    <input type="password" name="password" placeholder="Password" autocomplete="off"><br>
                    <input type="submit" name="register" , value="Register" class="btn">
                </div>

                <h3 class="sub_heading">Delete User:</h3>
                <input type="text" name="user_delete" placeholder="Enter Email to delete user">
                <input type="submit" name="button_delete" value="Delete" class="btn">
                <h3 class="sub_heading">Load BookStore: </h3>
                <a href="AdminAccess.php" class="btn">Pending Book</a>
				<a href="AdminAccess.php" class="btn">Load Book</a>
				<a href="AdminAccess.php" class="btn">Drop Book</a>
                
				
				
				<!-- PopUp message Start -->
            </form>
        </div>
    </div>
</body>
</html>


<?php
// UPDATE USER START
// Check if the "update" POST request is set
if (isset($_POST['update'])) {
    // Check if the "user_update" POST request is empty
    if (empty($_POST['user_update'])) {
        // Display a warning message
        $warning_msg[] = 'Enter user email!';
    } else {
        // Get the user email from the POST request
        $user_update = $_POST['user_update'];
        // Create an SQL query to select the user from the database
        $sql = "SELECT * FROM tbluser WHERE Email = '$user_update'";
        // Execute the query
        $result = $conn->query($sql);
        // Check if the user exists in the database
        if ($result->num_rows === 0) {
            // Display a warning message
            $warning_msg[] = 'User does not exist!';
        } else {
            // Create an SQL query to update the user's level
            $sql = "UPDATE tbluser SET ULevel = 'user' WHERE Email = '$user_update'";
            // Execute the query
            $result = $conn->query($sql);
            $success_msg[] = 'User permission granted!';
        }
    }
}
// UPDATE USER END

// ADD USER START
// empty is true when the input is NOT empty
$empty = "full";
// Saving to the database
if (isset($_POST["register"])) {
    $fname = $_POST['name'];
    $lname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['password'])) {
        $warning_msg[] = 'Enter all information first!';
        // This is false if the inputs are empty
        $empty = "empty";
    }
    if ($empty == "full") {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO tbluser(FName,LName,Email,Password,ULevel) VALUES('$fname','$lname','$email','$hash','pending')";
        if ($conn->query($query) === TRUE) {
            $success_msg[] = 'New user created!';
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        $warning_msg[] = 'Enter all fields first!';
    }
}
// ADD USER END
// Delete USER START
if (isset($_POST['button_delete'])) {
    if (empty($_POST['user_delete'])) {
        $warning_msg[] = 'Enter email to delete';
    } else {
        $user_delete = $_POST['user_delete'];
        // Create an SQL query to select the user from the database
        $sql = "SELECT * FROM tbluser WHERE Email = '$user_delete'";
        // Execute the query
        $result = $conn->query($sql);
        // Check if the user exists in the database
        if ($result->num_rows === 0) {
        } else {
            // Delete the user from the database
            $sql = "DELETE FROM tbluser WHERE Email = '$user_delete'";
            $result = $conn->query($sql);
            $success_msg[] = 'User ' . $user_delete . ' has been removed';
        }
    }
}
// Delete USER END
// Close the database connection
$conn = null;
?>
<!-- PopUp message Start -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($success_msg)) {
    foreach ($success_msg as $success_msg) {
        echo '<script>swal("Success", "' . $success_msg . '", "success");</script>';
    }
}
if (isset($warning_msg)) {
    foreach ($warning_msg as $warning_msg) {
        echo '<script>swal("Warning", "' . $warning_msg . '", "warning");</script>';
    }
}
if (isset($info_msg)) {
    foreach ($info_msg as $info_msg) {
        echo '<script>swal("Info", "' . $info_msg . '", "info");</script>';
    }
}
if (isset($error_msg)) {
    foreach ($error_msg as $error_msg) {
        echo '<script>swal("Error", "' . $error_msg . '", "error");</script>';
    }
}
?>
<!-- PopUp message End -->
