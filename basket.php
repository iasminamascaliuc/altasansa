<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/body.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/basket.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Coșul tău - Altă șansă</title>
</head>
<body>
    <div id="navPlaceholder"></div>
    <script>
        $(function(){
          $("#navPlaceholder").load("navbar.html");
        });
    </script>
    <main>
        <h1 class="header">Coșul tău</h1>
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

                $basketQuery = "SELECT basket.id, basket.productID, produse.nume, produse.pret, basket.quantity FROM basket INNER JOIN produse ON basket.productID = produse.id WHERE basket.userID='$user_id'";
                $basketResult = $conn->query($basketQuery);
                if ($basketResult->num_rows > 0) {
                    echo "<table class=\"table\">";
                    echo "<tr><th>ID Produs</th><th>Nume produs</th><th>Preț</th><th>Cantitate</th><th>Subtotal</th><th>Acțiune</th></tr>";
                    $totalPrice = 0;
                    while ($row = $basketResult->fetch_assoc()) {
                        $itemID = $row['id'];
                        $productID = $row['productID'];
                        $productName = $row['nume'];
                        $productPrice = $row['pret'];
                        $quantity = $row['quantity'];
                        $subtotal = $productPrice * $quantity;

                        echo "<tr>";
                        echo "<td>$productID</td>";
                        echo "<td>$productName</td>";
                        echo "<td>$productPrice RON</td>";
                        echo "<td>$quantity</td>";
                        echo "<td>$subtotal RON</td>";
                        echo "<td><button class=\"deleteItem\" onclick=\"deleteItem($itemID)\">Elimină din coș</button></td>";
                        echo "</tr>";

                        $totalPrice += $subtotal;
                    }
                    echo "<tr><td colspan='4'></td><td>Total: $totalPrice RON</td><td></td></tr>";
                    echo "</table>";
                    echo "<button class=\"checkoutButton\" onclick=\"checkout()\">Checkout</button>";
                    echo "<div id=\"status\" style=\"display: none;\"></div>";
                } else {
                    echo "<div class=\"emptyBasket\">";
                    echo "<p>Coșul tău este gol.</p>";
                    echo "<p><a href=\"index.php\">Adaugă produse în coș</a>.</p>";
                    echo "</div>";
                }
            } else {
                echo "Utilizator negăsit.";
            }
        } else {
                    echo "<div class=\"userNotLoggedIn\">";
                    echo "<p>Trebuie să fii conectat pentru a vedea conținutul coșului.</p>";
                    echo "<p><a href=\"login.php\">Conectează-te</a>.</p>";
                    echo "</div>";
        }

        $conn->close();
        ?>
    </main>
    <script>
        function deleteItem(itemId) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'deleteFromBasket.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send('item_id=' + itemId);
        }
        function checkout() {
        var confirmCheckout = confirm("Ești sigur că vrei să continui?");
        if (confirmCheckout) {
            var table = document.querySelector(".table");
            table.innerHTML = "";
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "deleteItemsFromBasket.php", true);
            xhr.onload = function () {
                if (xhr.readyState === xhr.DONE) {
                    if (xhr.status === 200) {
                        var statusDiv = document.getElementById("status");
                        statusDiv.innerText = "Comanda a fost efectuată cu succes.";
                        statusDiv.style.display = "block";
                    } else {
                        var statusDiv = document.getElementById("status");
                        statusDiv.innerText = "Eroare la confirmarea comenzii.";
                        statusDiv.style.display = "block";
                    }
                }
            };
            xhr.send();
        }
    }
    </script>
</body>
</html>