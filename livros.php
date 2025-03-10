<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

 
$livros = [
    ['id' => 1, 'titulo' => 'PHP para Iniciantes', 'autor' => 'José Almeida', 'preco' => 49.90],
    ['id' => 2, 'titulo' => 'Avançado em PHP', 'autor' => 'Maria Oliveira', 'preco' => 89.90],
    ['id' => 3, 'titulo' => 'JavaScript Essencial', 'autor' => 'Carlos Souza', 'preco' => 69.90]
];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seus Livros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Escolha seus Livros</h1>
        <nav>
            <a href="index.php">Página Inicial</a>
            <a href="carrinho.php">Carrinho</a>
        </nav>
    </header>

    <main>
        <h2>Livros Disponíveis</h2>
        <ul>
            <?php foreach ($livros as $livro): ?>
                <li>
                    <p><strong><?php echo $livro['titulo']; ?></strong> por <?php echo $livro['autor']; ?></p>
                    <p>Preço: R$ <?php echo number_format($livro['preco'], 2, ',', '.'); ?></p>
                    <form method="POST" action="carrinho.php">
                        <input type="hidden" name="livro_id" value="<?php echo $livro['id']; ?>">
                        <button type="submit">Adicionar ao Carrinho</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>
