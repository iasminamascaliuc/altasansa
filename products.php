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

$sql = "SELECT * FROM produse";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productId = $row['id'];
        $productName = $row['nume'];
        $productPrice = $row['pret'];
        $productImage = $row['img'];

        echo "<div class=\"product\">";
        echo "<img src=\"$productImage\">";
        echo "<h2>$productName</h2>";
        echo "<p>$productPrice RON</p>";
        echo "<button class=\"addToCart\" data-product-id=\"$productId\">Adaugă în coș</button>";
        echo "</div>";
    }
} else {
    echo "Nu există produse.";
}
$conn->close();
?>