<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "altasansa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

$checkQuery = "SELECT * FROM accounts WHERE email='$email'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) 
{
    echo "Eroare. Există deja un utilizator cu acest email.";
}   
else 
{
    $insertQuery = "INSERT INTO accounts (nume, prenume, email, password) VALUES ('$name', '$surname','$email', '$password')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Înregistrare cu succes."; 
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}


$conn->close();
?>