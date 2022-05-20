<?php
include 'conecta.php';


$login = $_POST['login'];
$senha = $_POST['senha'];

$logar = mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE login='$login' AND senha='$senha'");
$num = mysqli_num_rows($logar);
       

if ($num == 1) {
    while ($percorrer = mysqli_fetch_array($logar)){
        $inadmin = $percorrer['inadmin'];
        
        
        session_start();

        if ($inadmin == 1) {
            $_SESSION['inadmin'] = $inadmin;
            
            header('Location: admin/index.php');
        } else {
            $_SESSION['normal'] = $percorrer['idusuario'];
            header('Location: index.php');
        }
    }
} else {
    echo ("<script>alert('Login ou senha incorreto! Tente novamente!');</script>");
    echo ("<script>window.location.replace('index.php');</script>");
}
mysqli_close($conn);
?>