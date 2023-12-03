<?php
    $conn = mysqli_connect('localhost', 'root', '', 'altasansa');
    if(!$conn) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $email = $_GET['email'];
    $password = $_GET['password'];

    $query = "SELECT * FROM accounts WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {

        session_start();
        $_SESSION['email'] = $email;
        header("Location: account.php");
        exit();
    } else {
        header("Location: account.php");
        exit();
    }
    mysqli_close($conn);
?>