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
        <div class="container"><a class="navbar-brand" href="index.php">loja online</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="paginaproduto.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="contato.php">contato</a></li>
                    <li class="nav-item"><a class="nav-link active" href="carrinho.php">carrinho</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="entrar.php">entrar</a>
            </div>
        </div>
    </nav>
    <div class="container">
    <?php
	session_start();
	if(!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();
	} //adiciona produto 

	if(isset($_GET['acao'])){
		//ADICIONAR CARRINHO
		if($_GET['acao'] == 'add'){
			$id = intval($_GET['idprodutos']);
			if(!isset($_SESSION['carrinho'][$id])){
				$_SESSION['carrinho'][$id] = 1;
			} else {
				$_SESSION['carrinho'][$id] += 1;
			}
		} //REMOVER CARRINHO 

		if($_GET['acao'] == 'remove'){
			$id = intval($_GET['idprodutos']);
			if(isset($_SESSION['carrinho'][$id])){
				unset($_SESSION['carrinho'][$id]);
			}
		} //ALTERAR QUANTIDADE
		if($_GET['acao'] == 'up'){
			if(is_array($_POST['prod'])){
				foreach($_POST['prod'] as $id => $qtd){
						$id  = intval($id);
						$qtd = intval($qtd);
						if(!empty($qtd) || $qtd <> 0){
							$_SESSION['carrinho'][$id] = $qtd;
						}else{
							unset($_SESSION['carrinho'][$id]);
						}
				}
			}
		}

   }

    ?>
	<table>
		<caption>Carrinho de Compras</caption>
		<thead>
			<tr>
				<th width="125">Produto</th>
				<th width="145">Quantidade</th>
				<th width="125">Preço</th>
				<th width="125">SubTotal</th>
				<th width="125">Remover</th>
			</tr>
		</thead>
		<form action="?acao=up" method="post">
		<tfoot>
			<tr>
				<td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
			<tr>
			<td colspan="5"><a href="index.php">Continuar Comprando</a></td>
		</tfoot>
		<tbody>
     <?php
        if(count($_SESSION['carrinho']) == 0){
          echo '
                <tr>
					<td colspan="5">Não há produto no carrinho</td>
				</tr>
			';
          } else {
                require("conecta.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                    $sql = "SELECT tb_produtos.*, tb_arquivos.* from tb_produtos,tb_arquivos where tb_produtos.idprodutos = tb_arquivos.id_produtos and idprodutos=$id";
                        $qr    = mysqli_query($conn,$sql);
                        $ln    = mysqli_fetch_assoc($qr);
                        $nome  = $ln['nome'];
                        @$preco = number_format($ln['valor'], 2, ',', '.');
                        $sub   = number_format($ln['valor'] * $qtd, 2, ',', '.');
                        $total += $ln['valor'] * $qtd;
                         echo '
							<tr>
								<td>'.$nome.'</td>
								<td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
								<td>R$ '.$preco.'</td>
								<td>R$ '.$sub.'</td>
								<td><a href="?acao=remove&idprodutos='.$id.'">Remove</a></td>
                            </tr>';
                }
                $total = number_format($total, 2, ',', '.');
                echo '<tr>
							<td colspan="4">Total</td>
							<td>R$ '.$total.'</td>
                    </tr>';
          }
                   ?>

         </tbody>
    </form>
 </table>
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
    <script src="https://cdn.reflowhq.com/v1/toolkit.min.js" data-reflow-store="267418190"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>