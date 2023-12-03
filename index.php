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
    <title>Acasă - Altă șansă</title>
</head>
<body>
    <div id="navPlaceholder"></div>
    <script>
      $(function(){
        $("#navPlaceholder").load("navbar.html");
      });
    </script>
    <div class="slideshowContainer">
        <div class="slides fade">
            <img src="https://img01.ztat.net/article/spp-media-p1/dfb0640e0c2e47a78f6d7eedc2729665/47e1cf6376224a14bb514e60d2512cc3.jpg?imwidth=1800&filter=packshot" style="width:100%">
            <div class="text"> Șapcă Champion</div>
        </div>
        <div class="slides fade">
            <img src="https://img01.ztat.net/article/spp-media-p1/ec2df6d24857476e9c6d0e8d0f79b752/24cfbcecbe854ac6af4fe9b4fe531432.jpg?imwidth=1800&filter=packshot" style="width:100%">
            <div class="text">Tricou Champion</div>
        </div>
        <div class="slides fade">
            <img src="https://img01.ztat.net/article/spp-media-p1/ff13550baf7541f48134fe34e24c6cfc/a948a5dd8a9242e3aa9355d8623fcead.jpg?imwidth=1800&filter=packshot" style="width:100%">
            <div class="text">Tricou Nike</div>
        </div>
        <div class="slides fade">
            <img src="https://img01.ztat.net/article/spp-media-p1/553c19fae8d64ac4b5265f60c6a647de/f629fe4ccfae4690add39977931b6dd9.jpg?imwidth=1800&filter=packshot" style="width:100%">
            <div class="text">Rochie Calvin Klein</div>
        </div>
        <div class="slides fade">
            <img src="https://img01.ztat.net/article/spp-media-p1/da0ee648231f47479c9b90f483873a48/81f5969d17a04c21b4f281cea2a6faf4.jpg?imwidth=1800&filter=packshot" style="width:100%">
            <div class="text">Pantaloni Adidas</div>
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <script src="script/slideshow.js"></script>
    <br>
    <main>
      <div id="status" style="display: none;"></div>
        <section class="productList">
          <?php include 'products.php'; ?>
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
                        quantity: 1
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