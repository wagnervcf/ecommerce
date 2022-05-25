<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ecommerce</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="index.php" data-bs-target="index.php">loja online</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="paginaproduto.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="contato.php">contato</a></li>
                    <li class="nav-item"><a class="nav-link"  href="carrinho.php">carrinho</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="entrar.php">entrar</a>
                
            </div>    
        </div>
    </nav>
    <div class="container">
        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="bg-light border rounded border-light hero-nature carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Nike</h1>
                        <p class="hero-subtitle">E é claro que a Loja Online, por ser uma revendedora Nike oficial, não ia deixar de trazer os melhores produtos da nossa grande Nike para você! Aqui você encontra as peças mais estilosas de roupas Nike além de uma variedade de tênis.</p>
                        <p><a class="btn btn-light action-button" role="button" href="#">Saiba Mais</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-light border rounded border-light hero-photography carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Vans</h1>
                        <p class="hero-subtitle">E é claro que a Loja Online, por ser uma revendedora Vans oficial, não ia deixar de trazer os melhores produtos da nossa grande Vans para você! Aqui você encontra as peças mais estilosas de roupas Vans além de uma variedade de tênis.</p>
                        <p><a class="btn btn-light action-button" role="button" href="#">Saiba Mais</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-light border rounded border-light hero-technology carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Adidas</h1>
                        <p class="hero-subtitle">E é claro que a Loja Online, por ser uma revendedora Adidas oficial, não ia deixar de trazer os melhores produtos da nossa grande Adidas para você! Aqui você encontra as peças mais estilosas de roupas Adidas além de uma variedade de tênis.</p>
                        <p><a class="btn btn-light action-button" role="button" href="#">Saiba Mais</a></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            </ol>
        </div>
    </div>
    </div>

    <footer class="footer-basic">
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Company Name © 2022</p>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>