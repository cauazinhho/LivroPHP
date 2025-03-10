<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
    $login = $_POST['login'];
    $senha = $_POST['senha'];

     
    if ($login == 'admin' && $senha == '1234') {
        $_SESSION['usuario'] = $login;
        header("Location: livros.php");
        exit();
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
        <nav>
            <a href="index.php">Página Inicial</a>
        </nav>
    </header>

    <main>
        <?php if (isset($erro)) { echo "<p class='erro'>$erro</p>"; } ?>
        <form method="POST">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
