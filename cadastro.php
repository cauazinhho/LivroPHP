<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe dados do formulário de cadastro
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Aqui você deveria armazenar esses dados em um banco de dados
    // Para simplicidade, vamos simular o cadastro e redirecionar
    session_start();
    $_SESSION['usuario'] = $login;
    header("Location: livros.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Cadastro de Usuário</h1>
        <nav>
            <a href="index.php">Página Inicial</a>
        </nav>
    </header>

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>
