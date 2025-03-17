<?php 
    namespace PHP\Modelo\Telas;
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Inserir.php');
    require_once('../DAO/Consultar.php');
    use PHP\Modelo\DAO\Consultar;
    use PHP\Modelo\DAO\Inserir;
    use PHP\Modelo\DAO\Conexao;

    $conexao = new Conexao();//acessa a classe conexao
    $inserir = new Inserir();//Inserir 
  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Bookstore - Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">The Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="store.php">Loja</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Carrinho</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservations.php">Reservas</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Registrar</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Cadastro de Cliente</h1>
        <form class="form-control" method="POST">
            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cidade</label>
                <input type="text" class="form-control" name="cidade" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <input type="text" class="form-control" name="estado" required>
            </div>
            <div class="mb-3">
                <label class="form-label">CEP</label>
                <input type="text" class="form-control" name="cep" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'includes/Inserir.php';
            $inserir = new Inserir();
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];
            
            try {
                $inserir->cadastrarCliente($cpf, $nome, $telefone, $endereco, $cidade, $estado, $cep);
                echo '<div class="alert alert-success mt-3">Cliente cadastrado com sucesso!</div>';
            } catch (Exception $erro) {
                echo '<div class="alert alert-danger mt-3">Erro ao cadastrar cliente: ' . $erro->getMessage() . '</div>';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
