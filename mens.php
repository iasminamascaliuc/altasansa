<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/body.css">
    <link rel="stylesheet" href="styles/slideshow.css">
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.addToCart').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                type: 'POST',
                url: 'addToBasket.php',
                data: {
                    product_id: productId,
                    quantity: 1
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });
    </script>
    <title>Spirtoase - Altă șansă</title>
</head>
<body>
    <div id="navPlaceholder"></div>
    <script>
        $(function(){
          $("#navPlaceholder").load("navbar.html");
        });
    </script>
    <main>
      <br>
    <div id="status" style="display: none;"></div>
      <section class="productList">
        <?php include 'mensClothes.php'; ?>
      </section>
    </main>
    <footer>
      <span><p>&copy; 2023 Altă șansă. Toate drepturile rezervate.</p></span>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.addToCart').on('click', function() {
                var productId = $(this).data('product-id');

                $.ajax({
                    type: 'POST',
                    url: 'addToBasket.php',
                    data: {
                        product_id: productId,
                        quantity: 1 //
                    },
                    success: function(response) {
                        if (response === 'success') {
                            $('#status').text('Produs adăugat în coș cu succes.').show().delay(2000).fadeOut();
                        } else if (response === 'userNotLoggedIn'){
                            $('#status').text('Eroare la adăugarea produsului în coș. Trebuie să fi conectat pentru a adăuga produse în coș.').show().delay(2000).fadeOut();
                        }
                    },
                    error: function() {
                        $('#status').text('Eroare la adăugarea produsului în coș.').show().delay(2000).fadeOut();
                    }
                });
            });
        });
    </script>
    </script>
</body>
</html>