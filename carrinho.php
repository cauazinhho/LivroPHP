<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Adiciona o livro ao carrinho
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $livro_id = $_POST['livro_id'];

    // Dados fictícios dos livros
    $livros = [
        1 => ['titulo' => 'PHP para Iniciantes', 'preco' => 49.90],
        2 => ['titulo' => 'Avançado em PHP', 'preco' => 89.90],
        3 => ['titulo' => 'JavaScript Essencial', 'preco' => 69.90]
    ];

    // Verifica se o livro existe
    if (isset($livros[$livro_id])) {
        $_SESSION['carrinho'][] = $livros[$livro_id];
    }
}

// Verifica o carrinho de compras
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Seu Carrinho</h1>
        <nav>
            <a href="index.php">Página Inicial</a>
            <a href="compra.php">Finalizar Compra</a>
        </nav>
    </header>

    <main>
        <h2>Itens no Carrinho</h2>

        <?php if (empty($carrinho)): ?>
            <p>Seu carrinho está vazio.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($carrinho as $item): ?>
                    <li>
                        <?php echo htmlspecialchars($item['titulo']); ?> - 
                        R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?>
                    </li>
                    <?php $total += $item['preco']; ?>
                <?php endforeach; ?>
            </ul>

            <p><strong>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></p>
        <?php endif; ?>
    </main>
</body>
</html>
