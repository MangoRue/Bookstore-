<?php
$host = 'localhost';
$user = 'root';
$pass = 'Rue_10186913';
$db = 'bookstore';

try {
    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn) {
        echo "Connection Success";
    } else {
        echo "Connection Error";
    }
} catch (mysqli_sql_exception $e) {
    echo "Connection Error: " . $e->getMessage();
}
?>
