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

    $userQuery = "SELECT id FROM accounts WHERE email='$email'";
    $userResult = $conn->query($userQuery);
    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $user_id = $userRow['id'];

        $item_id = $_POST['item_id'];

        $deleteQuery = "DELETE FROM basket WHERE id='$item_id' AND userID='$user_id'";
        if ($conn->query($deleteQuery) === TRUE) {

            echo "success";
        } else {
            echo "eroare " . $conn->error;
        }
    } else {
        echo "Utilizator negăsit.";
    }
} else {
    echo "Trebuie să fi conectat pentru a șterge produse din coș.";
}

$conn->close();
?>