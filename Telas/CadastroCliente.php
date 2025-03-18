<?php 
    namespace PHP\Modelo\Telas;
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Inserir.php');
    // require_once('../DAO/Consultar.php');
    // use PHP\Modelo\DAO\Consultar;
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
            <a class="navbar-brand" href="home.php">The Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="Home.php">Voltar para o Site</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="LoginCliente.php">Já tem conta? Clique aqui</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        
        <div class="h1-cadastro" style = "text-align: center;">
            <h1>Cadastro de Cliente</h1>
        </div>                
        <form class="form-control" method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="text" class="form-control" name="datanascimento" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" required>
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="text" class="form-control" name="senha" required>
            </div>
            
        </form><br><br><br>
        <div style = "text-align: center;">
            <button type="submit" class="btn btn-primary">Cadastre-se</button>
        </div>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'includes/Inserir.php';
            $inserir = new Inserir();
            $nome = $_POST['nome'];
            $datanascimento = $_POST['datanascimento'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            
            try {
                $inserir->cadastrarCliente($nome, $datanascimento, $endereco, $telefone, $email, $senha);
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
