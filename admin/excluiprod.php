<?php
include 'conecta.php';
$idproduto = $_GET['idprodutos'];
$sql = "DELETE FROM tb_produtos WHERE idprodutos=$idproduto";
if(mysqli_query($conn, $sql)){
    echo "<script language='javascript' type/text='javascript'>window.location.href='produtos.php'</script>";
}
else {
    echo "<script language='javascript' type/text='javascript'>window.location.href='produtos.php'</script>";
}
?>