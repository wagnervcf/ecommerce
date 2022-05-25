<?php

session_start();
if(isset($_SESSION['inadmin'])){
    
}else{
    header('Location: index.php');
}

include 'conecta.php';
$idproduto = $_GET['idprodutos'];
$sql = "DELETE tb_produtos.*,tb_arquivos.* FROM tb_produtos,tb_arquivos WHERE tb_produtos.idprodutos = $idproduto AND tb_arquivos.id_produtos = $idproduto";
if(mysqli_query($conn, $sql)){
    echo  "<script language='javascript' type='text/javascript'>
    alert('Produto Excluido com sucesso!');
    window.location.href='produtos.php'
    </script>";
}
else {
    echo  "<script language='javascript' type='text/javascript'>
    alert('Não Conseguimos Excluir Produto!');
    window.location.href='produtos.php'
    </script>";
}
?>