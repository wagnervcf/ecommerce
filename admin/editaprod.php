<?php
session_start();
if (isset($_SESSION['inadmin'])) {
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cadastrar - Produto</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Administrador</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="cadastrar.php"><i class="fas fa-user"></i><span>Cadastrar</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="produtos.php"><i class="fas fa-table"></i><span>Produtos</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="relatorios.php"><i class="fas fa-table"></i><span>Relatórios</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Admin</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../sair.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Sair</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                <?php
    include 'conecta.php';
    $id = $_GET['idprodutos'];
    $sql = "SELECT * FROM tb_produtos WHERE idprodutos=$id";
    $query = $conn->query($sql);
    while ($dados = $query->fetch_assoc()) {
        $id = $dados['idprodutos'];
        $nome = $dados['nome'];
        $descricao = $dados['descricao'];
        $quantidade = $dados['quantidade'];
        $valor = $dados['valor'];
    }
    ?>

    <form action="editarprod.php?idprodutos=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">

            <div class="col">
                <div class="mb-3"><label class="form-label" for="descricao"><strong>Nome</strong></label>
                    <input class="form-control" type="text" placeholder="Descrição do produto" name="nome" value="<?php echo $nome; ?>">
                </div>
            </div>
            <div class="col">
                <div class="mb-3"><label class="form-label" for="quantidade"><strong>Descrição</strong></label>
                    <input class="form-control" type="text" placeholder="Quantidade do produto" name="descricao" value="<?php echo $descricao; ?>">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3"><label class="form-label" for="valor"><strong>Quantidade</strong></label>
                    <input class="form-control" type="text" placeholder="Valor" name="quantidade" value="<?php echo $quantidade; ?>">
                </div>
            </div>
            <div class="col">
                <div class="mb-3"><label class="form-label" for="produto"><strong>Valor</strong></label>
                    <input class="form-control" type="text" placeholder="Produto" name="valor" value="<?php echo $valor; ?>">
                </div>

            </div>
        </div>

        <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Atualizar</button></div>
        <div class="mb-3"><a href="produtos.php"><button type="button" class="btn btn-primary btn-sm">Voltar</button></a></div>
    </form>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>