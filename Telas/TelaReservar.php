<?php  
    namespace PHP\Modelo\Telas;
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Inserir.php');
    use PHP\Modelo\DAO\Inserir;
    use PHP\Modelo\DAO\Conexao;

    $conexao = new Conexao();
    $inserir = new Inserir();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Bookstore - Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #F3A50D;">
        <div class="container">
            <a class="navbar-brand" href="home.php">The Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="store.php">Loja</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Carrinho</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservations.php">Reservas</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h1 class="text-center">Faça sua Reserva</h1>
        <form class="card p-4 mx-auto" style="max-width: 500px;" method="POST">
            <div class="mb-3">
                <label class="form-label">Livro</label>
                <select class="form-select" name="livros" required>
                    <option value="">Selecione o livro desejado</option>
                    <option value="O Familiar">O Familiar</option>
                    <option value="Hey, Vovô Jude!">Hey, Vovô Jude!</option>
                    <option value="As Aventuras de Mike">As Aventuras de Mike</option>
                    <option value="Feras do Futebol: Bellingham">Feras do Futebol: Bellingham</option>
                    <option value="Graciliano: Retrato Fragmentado">Graciliano: Retrato Fragmentado</option>
                    <option value="Sabores do Vinho: da Uva À Taça">Sabores do Vinho: da Uva À Taça</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reservar</button>
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $livro = htmlspecialchars($_POST['livros']);
            $quantidade = intval($_POST['quantidade']);
            
            echo '<div class="alert alert-success mt-3 text-center">Reserva do livro <strong>'.$livro.'</strong> realizada com sucesso!</div>';
        }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
