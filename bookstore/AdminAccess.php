<?php
include 'DBConn.php';

session_start();

$user_id = $_SESSION['user'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
    <style>
        body {
            font-family: monospace;
			background:#fffff;
			overflow-x: hidden;
			width: 100%;
			height: 100vh;

        }
        .container{

            justify-content: flex-start;
        }
		input {
         font-size: 20px;
        }
		p{
			font-size:20px;
		}

        .input{
            width: 50%;
        }
		
		  .input-group {
            margin-bottom: 20px 0;
        }

        h4 {
            text-align: center;
        }
		nav {
		  width: 100vw;
		  background: #fffff;
		  display: flex;
		  justify-content: space-around;
		  align-items: center;
		  height: 10vh;
		  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
		  margin-bottom: 30px;
		}
		nav h1 {
		  font-size: 2em;
		  font-weight: 400;
		  color: #d8ffc3;
		}
		.logo {
		  width: 20%;
		}
		.nav-links {
		  width: 50%;
		  display: flex;
		  justify-content: space-around;
		  flex-direction: row;
		}
		.nav-links a {
		  color: black;
		  text-decoration: none;
		  transition: 0.3s;
		  font-weight: 400;
		}

		.nav-links a:hover {
		  color: #efefef;
		  font-weight: 600;
		}
		.nav-links .current {
		  color: #e6e6e6;
		  font-weight: 600;
		}
		.heading {
		  text-align: center;
		  margin-bottom: 20px;
		  font-size: 40px;
		  font-weight: 600;
		  text-transform: uppercase;
		  color: red;
		}
		.container {
	
		  display: flex;
		  flex-direction: column;
		  align-items: center;
		  justify-content: center;
		}
		.message {
		  text-align: center;
		  background: #f9eded;
		  padding: 15px 0px;
		  border: 1px solid #699053;
		  border-radius: 5px;
		  margin-bottom: 10px;
		  color: red;
		}
		.btn {
		  height: 35px;
		  background: red;
		  border: 0;
		  border-radius: 5px;
		  color: white;
		  cursor: pointer;
		  transition: all 0.3s;
		  margin-top: 10px;
		  padding: 0px 10px;
		}

		.btn:hover:hover {
		  opacity: 0.82;
		}
		.container-home {
		  display: flex;
		  flex-wrap: wrap;
		  gap: 15px;
		  justify-content: center;
		  height: 90vh;
		}
		.book a:hover {
		  color: #699053;
		}
		.textbook-box{
			background: #ccc;
			z-index: 1;
            width: 50%;
            display: flex;
            flex-direction: column;
            text-align: center;
            border-radius: 20px;
            backdrop-filter: blur(50px);
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);

			
		}
    </style>
</head>

<nav>

    <div class="logo">
        <h1></h1>
    </div>
    <div class="nav-links">

        <h3><a href="home.php"><i class="fa fa-home"></i></a></h3>
        <h3><a class="current" href="addproduct.php">Add Book</a></h3>
        <h3><a href="aboutus.php">About Us</a></h3>

        <?php
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($conn, $sql);
        $total_cart_items = mysqli_num_rows($result);
        ?>
        <h3><a href="cart.php"><i class="fas fa-shopping-cart"></i>Cart <span>(<?= $total_cart_items ?>)</span></a></h3>
        <h3><a href="index.php" name='Logout'>Logout </a></h3>

    </div>

	</nav>

	<body>
        <!-- Admin add product -->

        <div class="container">
            <div class="textbook-box ">
			
				 <h1 class="heading"> Pending books: </h1>

							<h4>
								<?php
								$sql = "SELECT * FROM tblbooks WHERE Ulevel = 'pending'";
								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<hr>Title: " . $row['title'] . "<br>" . " Author:   " . $row['author'] . "<br>" . "ISBN: " . $row['isbn'] . "<br>";
									}
								}
								?>
							</h4>
							
				<h1 class="heading">Accept Book Request:</h1>
				<div>
					<form action="" method="post">
                    <input type="text" name="accept_books" placeholder="Enter ISBN number to Add Book"><br>
                    <input type="submit" name="accept" value="Accept" class="btn">
					</form>
					</div>

                <h1 class="heading"> Add textbooks: </h1>

                <form action="" method="post" enctype="multipart/form-data">
                    
                    <p>Title: <span>*</span></p>

                    <input type="text" name="title" required maxlength="100" placeholder="enter book title" class="input">

                    <p>Author: <span>*</span></p>
                    <input type="text" name="author" required maxlength="100" placeholder="enter authour" class="input">

                    <p>Price: <span>*</span></p>

                    <input type="number" name="price" required maxlength="100" placeholder="enter book Price" min="0" max="9999999999" class="input">


                    <p>ISBN number:<span>*</span></p>
                    <input type="text" name="isbn" required maxlength="13" placeholder="enter ISBN number" min="0" max="13" class="input">

                    <p>Stock: <span>*</span></p>
                    <input type="number" name="stock" required maxlength="10" placeholder="enter stock " min="0" max="9999999999" class="input">

                    <p>Book Image: <span>*</span></p>
                    <input type="file" name="image" required accept="image/*" class="input input-img">
                    <br>
                    <input type="submit" value="Add book" name="add_book" class="btn">

                </form>
				
				<h1 class="heading">Delete Book:</h1>
				<div>
					<form action="" method="post">
                    <input type="text" name="book_delete" placeholder="Enter isbn to delete book">
					<input type="submit" name="button_delete" value="Delete" class="btn">
					</form>
					</div>

            </div>
        </div>
    </body>
	
<?php


if (isset($_POST['add_book'])) {

    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);

    $author = $_POST['author'];
    $author = filter_var($author, FILTER_SANITIZE_STRING);

    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $isbn = $_POST['isbn'];
    $isbn = filter_var($isbn, FILTER_SANITIZE_STRING);

    $stock = $_POST['stock'];
    $stock = filter_var($stock, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $rename = $user_id;
    $image_size = $_FILES['image']['size'];
   



    if ($image_size > 2000000) { // Adjust the image size limit as per your requirement
        $warning_msg[] = 'Image size is too big';
    } else {

        $sql = "INSERT INTO tblbooks (img,title, author, price, isbn,quantity, Ulevel)
            VALUES ('$image','$title','$author',$price,'$isbn','$stock', 'pending');";
        $conn->query($sql);

        $success_msg[] = "Book Added!";
    }
}

if (isset($_POST['button_delete'])) {
    if (empty($_POST['book_delete'])) {
        $warning_msg[] = 'Enter ISBN to delete';
    } else {
        $book_delete = $_POST['book_delete'];
        // Create an SQL query to select the book from the database
        $sql = "SELECT * FROM tblbooks WHERE ISBN = '$book_delete'";
        // Execute the query
        $result = $conn->query($sql);
        // Check if the book exists in the database
        if ($result->num_rows === 0) {
        } else {
            // Delete the book from the database
            $sql = "DELETE FROM tblbooks WHERE ISBN = '$book_delete'";
            $result = $conn->query($sql);
            $success_msg[] = 'ISBN ' . $book_delete . ' has been removed';
        }
    }
}
if (isset($_POST['accept'])) {
    // Check if the "accept_books" POST request is empty
    if (empty($_POST['accept_books'])) {
        // Display a warning message
        $warning_msg[] = 'Enter isbn number';
    } else {
        // Get the books isbn from the POST request
        $accept_books = $_POST['accept_books'];
        // Create an SQL query to select the user from the database
        $sql = "SELECT * FROM tblbooks WHERE isbn = '$accept_books'";
        // Execute the query
        $result = $conn->query($sql);
        // Check if the user exists in the database
        if ($result->num_rows === 0) {
            // Display a warning message
            $warning_msg[] = 'Book does not exist!';
        } else {
            // Create an SQL query to update the book's level
            $sql = "UPDATE tblbooks SET Ulevel = 'added' WHERE isbn = '$accept_books'";
            // Execute the query
            $result = $conn->query($sql);
            $success_msg[] = 'Book has been added!';
        }
    }
}
?>	
	

<!-- PopUp message Start -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
// ACCEPT USER START
// Check if the "accept" POST request is set
// Close the database connection
$conn = null;

// UPDATE BOOKS END
if (isset($success_msg)) {
    foreach ($success_msg as $success_msg) {
        echo '<script>swal("' . $success_msg . '", "", "success");</script>';
    }
}
if (isset($warning_msg)) {
    foreach ($warning_msg as $warning_msg) {
        echo '<script>swal("' . $warning_msg . '", "", "warning");</script>';
    }
}
if (isset($info_msg)) {
    foreach ($info_msg as $info_msg) {
        echo '<script>swal("' . $info_msg . '", "", "info");</script>';
    }
}
if (isset($error_msg)) {
    foreach ($error_msg as $error_msg) {
        echo '<script>swal("' . $error_msg . '", "", "error");</script>';
    }
}

?>
<!-- PopUp message End -->
</html>
