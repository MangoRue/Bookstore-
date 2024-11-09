<?php

include 'DBConn.php';

session_start();

$user_id = $_SESSION['user'];

// Button clicks

if (isset($_POST['add_to_cart'])) {

    $product_title = $_POST['product_title'];
    $product_author = $_POST['product_author'];
    $product_price = $_POST['product_price'];
    $product_isbn = $_POST['product_isbn'];
    $product_image = $_POST['product_image'];
    $product_quanttity = $_POST['product_quantity'];

    


    // This code selects all columns from the `tblBooks` table
    $sql = "SELECT * FROM tblBooks WHERE title = '$product_title'";
    // This code executes the SQL statemtnt and stores the results in a variable called `$result`
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $total_stock = ($row['quantity'] - $product_quanttity);

    if ($product_quanttity > $row['quantity']) {
        // Add a warning message to the array.
        $info_msg[] = 'Only ' . $row['quantity'] . ' stock is left ';
    } else {

        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE title ='$product_title' AND user_email = '$user_id'") or die('query failed');
        //If product is already in the cart
        if (mysqli_num_rows($select_cart) > 0) {

            $warning_msg[] = "Product already added to cart!";
        } else {
            //If not add product to the cart
            mysqli_query($conn, "INSERT INTO `cart`(user_email,title,price,image,quantity,author,isbn) VALUES ('$user_id','$product_title','$product_price','$product_image','$product_quanttity','$product_author','$product_isbn')") or die('query failed');


            $update_quantity = mysqli_query($conn, "UPDATE `tblBooks` SET quantity = '$total_stock' where title = '$product_title' ");
            $success_msg[] = "Product added to cart!";
        }
    }
}

if (isset($_POST['Logout'])) {
    unset($user);
    session_destroy();
}

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
    <title>HomePage</title>
    <style>
       <style>
    body {
        background-color: white;
    }

    .btn-quantity {
        color: white;
        width: 25%;
        border-radius: 5px;
        text-align: center;
        background: red;
        border: 0;
        color: #fff;
        padding: 5px;
    }

    .nav-links a {
        color: red;
    }

    .btn {
        background: red;
        color: white;

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
	  background: #C0C0C0;
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
	  background: 	white;
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
	  background-color: white;
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
    <div class="nav-links">

        <h3><a class="current" href="home.php"><i class="fa fa-home"></i> </a></h3>
        <h3><a class="book" href="addproduct.php"> Add Book</a></h3>
        <h3><a href="aboutus.php">About Us</a></h3>
        <h3><a href="historyorder.php">Order History</a></h3>
        <?php
        $sql = "SELECT * FROM `cart`";
        $result = mysqli_query($conn, $sql);
        $total_cart_items = mysqli_num_rows($result);
        ?>
        <h3><a href="cart.php"><i class="fas fa-shopping-cart"></i>Cart <span>(<?= $total_cart_items ?>)</span></a></h3>
        <h3><a href="index.php" name='Logout'>Logout </a></h3>

    </div>

</nav>

<body>
    <h1 class="heading">Textbooks </h1>

    <div class="container-home contain">

        <?php
        // Check if the books table exists
        $sql = "SHOW TABLES LIKE 'tblBooks'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // This code selects all columns from the `tblBooks` table
            $sql = "SELECT * FROM tblBooks ";
            // This code executes the SQL statemtnt and stores the results in a variable called `$resul`
            $result = mysqli_query($conn, $sql);
            //Checks to see if the `tblBooks` table contains any rows
            if (mysqli_num_rows($result) > 0) {
                // This code enters the `while` loop if the `tblBooks` table contains any rows.
                while ($row = mysqli_fetch_assoc($result)) {

        ?>
                    <form method="post" class="boxx" action="">
                        <img src="Images/<?php echo $row['img']; ?>">
                        <div class="title"><?php echo $row['title']; ?></div>
                        <div class="author"><?php echo $row['author']; ?></div>
                        <div class="isbn"><?php echo $row['isbn']; ?></div>
                        <div class="price">R<?php echo $row['price']; ?></div>
                        <input type="number" min="1" name="product_quantity" value="1">

                        <input type="hidden" name="product_image" value="<?php echo $row['img']; ?>">
                        <input type="hidden" name="product_title" value="<?php echo $row['title']; ?>">
                        <input type="hidden" name="product_author" value="<?php echo $row['author']; ?>">
                        <input type="hidden" name="product_isbn" value="<?php echo $row['isbn']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['price'] ?>">
                        

                        
                        <?php if($row['quantity'] <= 0){   ?>
                        <input style="user-select: none; opacity: 0.5;pointer-events: none;" type="submit" value="Add To Cart" name="add_to_cart" class="btn" >
                        <?php }else{?>
                            <input type="submit" value="Add To Cart" name="add_to_cart" class="btn" >
                            <?php } ?>   
                        <br>
                        <?php if ($row['quantity'] >= 5) { ?>
                            <span class="btn-quantity"><i class="fas fa-check"></i> in stock</span>
                        <?php } elseif ($row['quantity'] <= 0 ) { ?>
                            <span class="btn-quantity" style="color: white; background-color: orange;"><i class="fas fa-times"></i> out of stock</span>
                        <?php } else { ?>
                            <span class="btn-quantity" style="color: white; background-color: red;">hurry, only <?= $row['quantity']; ?> left</span>
                        <?php } ?>
                        
                    </form>
        <?php
                }
            } else {
                echo "There are currently no books available";
            }
        } else {

            // The books table does not exist, so we can't query it
            echo "The books table does not exist";
        }
        ?>
    </div>
</body>
<!-- PopUp message Start -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
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
<!-- PopUp message End -->





</html>