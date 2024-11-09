<?php
include 'DBConn.php';

session_start();

$user_id = $_SESSION['user'];

?>

<?php include "DbConn.php";


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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>AddProduct</title>
    <style>
        body {
            font-family: monospace;
           	  background: #C0C0C0;

        }
        .container{
            justify-content: flex-start;
        }
        .input{
            width: 50%;
        }
        p{
            font-size: 20px;
        }
        .input-img{
            background-color: #d3d3d3;
        }
        p span{
            color: red;
        }
		nav {
		  width: 100vw;
		  display: flex;
		  justify-content: space-around;
		  align-items: center;
		  height: 10vh;
		  background-color: #ffffff;
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

		body {
		  background: #ffffff;
		  overflow-x: hidden;
		  width: 100%;
		  height: 100vh;
		}
		.heading {
		  text-align: center;
		  margin-bottom: 20px;
		  font-size: 40px;
		  font-weight: 600;
		  text-transform: uppercase;
		  color: #000000b8;
		}
		.container {
		  display: flex;
		  flex-direction: column;
		  align-items: center;
		  justify-content: center;

		  min-height: 100vh;
		  min-width: 100%;
		}
		.login_details {
		  display: flex;
		  flex-direction: column;
		}
		input {
		  border: 1px solid #ccc;
		  padding: 10px;
		  margin-bottom: 15px;
		  border-radius: 5px;
		}
		p a {
		  text-decoration: none;
		  color: black;
		  transition: 0.4s;
		}
		p a:hover {
		  color: lime;
		}
		.box {
		  background: #fdfdfd;
		  display: flex;
		  flex-direction: column;
		  padding: 25px 25px;
		  border-radius: 20px;
		  box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
			0 32px 64px -48px rgba(0, 0, 0, 0.5);
		}
		.from {
		  margin: auto;
		}
		.form-box {
		  width: 450px;
		  margin: 0px 10px;
		  z-index: 1;
		  background: rgba(255, 255, 255, 0.2);
		  backdrop-filter: blur(50px);
		}
		.form-box header {
		  font-size: 25px;
		  font-weight: 600;
		  padding-bottom: 10px;
		  border-bottom: 1px solid #e6e6e6;
		  margin-bottom: 10px;
		  border-bottom-color: rgba(255, 255, 255, 0.2);
		  color: white;
		}
		.form-box form .field {
		  display: flex;
		  margin-bottom: 10px;
		  flex-direction: column;
		  width: 100%;
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
		  background: #0c4a3c;
		  border: 0;
		  border-radius: 5px;
		  color: #fff;
		  cursor: pointer;
		  transition: all 0.3s;
		  margin-top: 10px;
		  padding: 0px 10px;
		}
		.btnDel {
		  height: 35px;
		  background: red;
		  border: 0;
		  border-radius: 5px;
		  color: #fff;
		  cursor: pointer;
		  transition: all 0.3s;
		  margin-top: 10px;
		  padding: 7px;
		}
		.btnCheck {
		  height: 40px;
		  background: rgb(8, 138, 182);
		  border: 0;
		  border-radius: 5px;
		  color: #fff;
		  cursor: pointer;
		  transition: all 0.3s;
		  margin-top: 10px;
		  padding: 10px;
		  text-decoration: none;
		}
		.btnDel {
		  text-decoration: none;
		}

		.btn:hover .btnDel:hover {
		  opacity: 0.82;
		}
		.container-home {
		  display: flex;
		  flex-wrap: wrap;
		  gap: 15px;
		  justify-content: center;
		  height: 90vh;
		}
		.container-home .boxx {
		  z-index: 1;

		  width: 440px;
		  border-radius: 10px;
		  position: relative;
		  padding: 20px;
		  backdrop-filter: blur(50px);
		  box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
			0 32px 64px -48px rgba(0, 0, 0, 0.5);
		}
		.boxx img {
		  text-align: center;
		}

		.container-home .boxx img {
		  height: 500px;
		  border-radius: 10px;
		  text-align: center;
		}

		.container-home .boxx .title {
		  font-size: 20px;
		  padding: 5px 0;
		  font-weight: 500;
		}
		.container-home .boxx .price {
		  margin-top: 30px;
		  font-weight: 500;
		  font-size: 20px;
		  font-style: italic;
		}
		.shopping-cart {
		  padding: 20px;
		}

		.shopping-cart table {
		  width: 80%;
		  margin: auto;
		  text-align: center;
		  border-radius: 10px;
		  backdrop-filter: blur(50px);
		  box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
			0 32px 64px -48px rgba(0, 0, 0, 0.5);
		  padding: 20px;
		}

		.shopping-cart table thead th {
		  padding: 10px;
		  text-transform: capitalize;
		  font-size: 20px;
		}
		.shopping-cart table tr td {
		  padding: 10px;
		  font-size: 20px;
		}

		.shopping-cart table tr td:nth-child(1) {
		  font-weight: 700;
		  font-size: 30px;
		  color: #0c4a3c;
		}

		.shopping-cart table tr td input[type="number"] {
		  width: 50px;
		  border: #fdfdfd;
		}
		.cart-btn {
		  display: flex;
		  flex-direction: column;
		  align-items: center;
		}
		.shopping-cart .cart-btn .disabled {
		  pointer-events: none;
		  background-color: red;
		  opacity: 0.5;
		  user-select: none;
		}

		.book a:hover {
		  color: #699053;
		}
		.textbook-box{
		  z-index: 1;
		  min-width: 50%;
		  display: flex;
		  flex-direction: column;
		  text-align: center;
		  padding: 25px 25px;
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
        <!-- Admin add product -->

        <div class="container">
            <div class="textbook-box ">

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
                    <input type="submit" value="Add Book" name="add_book" class="btn">

                </form>
            </div>
        </div>
    </body>

<!-- PopUp message Start -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
global $conn;
$empty = "full";

if (isset($_POST["add_book"])) {
	$Img = $_POST['image'];
    $Title = $_POST['title'];
    $Author = $_POST["author"];
    $Price = $_POST["price"];
    $Isbn = $_POST["isbn"];
	$Quantity = $_POST["stock"];

    if (empty($_POST['image']) || empty($_POST['title']) || empty($_POST['author']) || empty($_POST['price']) || empty($_POST['isbn']) || empty($_POST['stock'])) {
        $empty = "empty";
    }
    if ($empty == "full") {
        $query = "INSERT INTO tblbooks(img, title, author, price, isbn, quantity, Ulevel) VALUES( '$Img', '$Title', '$Author', '$Price', '$Isbn', '$Quantity', 'pending')";

        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $_SESSION['success'] = "New user successfully created!";
        header('location: AdminAccess.php');
    } else {
        echo "<p style='color: red;'>Enter all the fields first.</p>";
    }
}
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
