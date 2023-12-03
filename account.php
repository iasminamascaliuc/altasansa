    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/navbar.css">
        <link rel="stylesheet" href="styles/body.css">
        <link rel="stylesheet" href="styles/account.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <title>Cont - Altă șansă</title>
    </head>
<body>
    <div id="navPlaceholder"></div>
        <script>
            $(function(){
            $("#navPlaceholder").load("navbar.html");
            });
        </script>
    <div class="accountContainer">
    <div class="container">
        <?php
            session_start();
            if(isset($_SESSION['email'])) 
            {
                $email = $_SESSION['email'];

                $conn = mysqli_connect('localhost', 'root', '', 'altasansa');

                if(!$conn) 
                {
                    die('Failed to connect to MySQL: ' . mysqli_connect_error());
                }

                $query = "SELECT nume, prenume FROM accounts WHERE email='$email'";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result) == 1) 
                {
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['nume'];
                    $surname = $row['prenume'];
                
                echo '<h2>Bine ai venit, ' . $surname . '!</h2>';
                echo '<p>Nume: ' . $name . '</p>';
                echo '<p>Prenume: ' . $surname . '</p>';
                echo '<p>Email: ' . $email . '</p>';
                echo '<button class="logout-button" onclick="location.href=\'logout.php\'">Deconectare</button>';
                }
            } 
            else 
            {
                header("Location: login.html");
                exit();
            }
        ?>
    </div>
</body>
</html>