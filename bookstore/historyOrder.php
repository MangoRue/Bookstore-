<?php
include 'DBConn.php';

session_start();

$user_id = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Order History</title>
</head>
<style>
        body {
            background-color: #C0C0C0;
        }
		
		.heading {
		  text-align: center;
		  margin-bottom: 20px;
		  font-size: 40px;
		  font-weight: 600;
		  text-transform: uppercase;
		  color: #000000b8;
		}

        .field {
            display: flex;
            width: 100%;
            margin-top: 20px;
        }

        .field .btn {
            width: 11%;
            font-size: 20px;
        }

        .btn {

            margin: auto;
        }
		
		.nav-links {
		  display: flex;
		  justify-content: space-between;
		  align-items: center;
		}

		.nav-links a {
		  margin: 0 10px;
		  color: #000;
		  text-decoration: none;
		  font-weight: bold;
		}

		.nav-links a:hover {
		  color: red;
		}	
		
		.shopping-cart {
		  align-items: center;
		  border: 1px solid #ccc;
		  padding: 20px;
		  background-color: white;
		  justify-content: space-between;
		  display: block;
		}

		.table {
		  width: 500%;
		  border-collapse: collapse;
		  justify-content: space-between; 
		}

		.table th,
		.table td {
		  padding: 10px;
		  text-align: center;
		  border-bottom: 1px solid #ccc;
		}

		.table th {
		  font-weight: bold;
		}

		.total {
		  margin-top: 10px;
		  font-weight: bold;
		  border: 1px solid #ccc;
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
		  color: red;
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
<nav>

    <div class="logo">
        <h1>IIE BOOKSHELF</h1>
    </div>
    <div class="nav-links">

        <h3><a href="home.php"><i class="fa fa-home"></i></a></h3>
        <h3><a href="addproduct.php">Add Book</a></h3>
        <h3><a href="aboutus.php">About Us</a></h3>
        <h3><a class="current" href="historyorder.php">Order History</a></h3>


        <?php
        $sql = "SELECT * FROM cart";
        $result = mysqli_query($conn, $sql);
        $total_cart_items = mysqli_num_rows($result);
        ?>
        <h3 ><a href="cart.php"><i class="fas fa-shopping-cart "></i>Cart <span>(<?= $total_cart_items ?>)</span></a></h3>

        <h3><a href="index.php" name='Logout'>Logout </a></h3>

    </div>

</nav>
<body>
<div class="shopping-cart">
        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>Email</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>ISBN</th>
            </thead>
            <tbody>
                <?php

                $cart_query = mysqli_query($conn, "SELECT * FROM tblorder WHERE user_email = '$user_id'") or die('query failed');
                $grand_total = 0;

                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {

                ?>
                        <tr>
                            <td><img src="Images/<?php echo $fetch_cart['image']; ?>" alt="" height="200"></td>
                            <td><?php echo $fetch_cart['title']; ?></td>
                            <td><?php echo $fetch_cart['user_email']; ?></td>
                            <td>R<?php echo $fetch_cart['price']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                    <input type="hidden" name="cart_title" value="<?php echo $fetch_cart['title']; ?>">

                                    <input type="number" min='1' name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                    


                                </form>
                            </td>
                            <td>R<?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?></td>
                            <td><?php echo $fetch_cart['isbn']; ?></td>
                            
                        </tr>
                <?php
                        $grand_total += intval($sub_total);
                    };
                } else {
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                }
                ?>

                <tr class="table-bottom">

                    <td colspan="4">Grand Total :</td>

                    <td>R<?php echo $grand_total; ?></td>
                    


                </tr>
            </tbody>
        </table>
        

        

    </div>
    <!-- Shopping cart end -->
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
<!-- PopUp message End -->
</html>
