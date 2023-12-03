<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "altasansa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $userQuery = "SELECT id FROM accounts WHERE email='$email'";
    $userResult = $conn->query($userQuery);
    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $user_id = $userRow['id'];

        $productQuery = "SELECT nume FROM produse WHERE id='$product_id'";
        $productResult = $conn->query($productQuery);
        if ($productResult->num_rows > 0) {
            $productRow = $productResult->fetch_assoc();
            $product_name = $productRow['nume'];

            $insertQuery = "INSERT INTO basket (productID, productName, userID, quantity) VALUES ('$product_id', '$product_name', '$user_id', '$quantity')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "productNotFound";
        }
    } else {
        echo "userNotFound";
    }
} else {
    echo "userNotLoggedIn";
}

$conn->close();
?>