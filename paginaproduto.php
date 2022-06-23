<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ecommerce</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.reflowhq.com/v1/toolkit.min.css">
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
                    <li class="nav-item"><a class="nav-link active" href="paginaproduto.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="contato.php">contato</a></li>
                    <li class="nav-item"><a class="nav-link" href="carrinho.php">carrinho</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="entrar.php">entrar</a>
            </div>
        </div>
    </nav>
    <div class="container">
    <h1 style="margin-bottom: 50px;margin-top: 30px;">Produtos</h1> 
        <div class="containerprod">
                <?php   include 'conecta.php';
                    $pesquisa = mysqli_query($conn, "select tb_produtos.*, tb_arquivos.* from tb_produtos,tb_arquivos where tb_produtos.idprodutos = tb_arquivos.id_produtos");
                    $row = mysqli_num_rows($pesquisa);
                    if($row > 0){
                        while($registro = $pesquisa->fetch_array()){
                            $imagem = $registro['path'];
                            $id = $registro['idprodutos'];
                            echo '<div class="prod"><a href="produto.php?idprodutos='.$registro['idprodutos'].'"><tr>';
                            echo '<div class="img"><td><center><img src="admin/'.$imagem.'"></center></td></div>';
                            echo '<div class="name"><td><center>Valor: '.$registro['valor'].'</td></a></center></div>';
                            echo '<div class="btnprod"><td><center><a href="produto.php?idprodutos='.$registro['idprodutos'].'" class="btn btn-primary action-button" role="button" >Comprar</a></td><center></div>';
                            echo '</tr></div>';
                        }
                    } else {
                        echo "Não há registros!";
                    }
                ?> 
            
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
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.reflowhq.com/v1/toolkit.min.js" data-reflow-store="267418190"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>