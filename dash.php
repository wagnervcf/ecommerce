<?php
    session_start();
    if(isset($_SESSION['inadmin'])){
        
    }else{
        header('Location: index.php');
    }
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
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="index.php" data-bs-target="index.php">loja online</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="paginaproduto.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="contato.php">contato</a></li>
                    <li class="nav-item"><a class="nav-link" href="carrinho.php">carrinho</a></li>
                    <li class="nav-item"><a class="nav-link" href="sair.php">sair</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="entrar.php">paineladmin</a>
            </div>
        </div>
    </nav>
</body>
</html>