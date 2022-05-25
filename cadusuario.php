<?php 
    include 'conecta.php';
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $cripto = base64_encode($senha);
    
    $query = $conn->query("SELECT * FROM tb_usuarios WHERE login='$login'");
    if(mysqli_num_rows($query)>0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário já existe na base de dados!');
        window.location.href='cadusuario.php'
        </script>";
        exit();
    }
    else {
    $sql= "INSERT INTO tb_pessoas(nome,data_nascimento,telefone) VALUES ('$nome','$data_nascimento','$telefone')";
    if(mysqli_query($conn,$sql)){
        $ultimo = mysqli_query($conn,"SELECT MAX(idpessoa) AS maior FROM tb_pessoas");
        $row = mysqli_fetch_array($ultimo); 
        $maior = $row['maior'];
        $usuario = mysqli_query($conn,"INSERT INTO tb_usuarios(tb_pessoas_idpessoa,login,senha,inadmin) VALUES ('$maior','$login','$cripto',0)");
        echo "<script language='javascript' type='text/javascript'> 
          alert('Registro inserido com sucesso!');
          window.location.href='index.php';
          </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'> 
          alert('Não foi possível inserir este registro!');
          window.location.href='index.php'
          </script>";
    }
}
    mysqli_close($conn);
?>