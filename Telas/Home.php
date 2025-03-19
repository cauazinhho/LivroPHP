<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner img {
            width: 100%;
            height: auto;
        }
        .container-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        footer {
            background: #F3A50D;
            color: black;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #F3A50D;">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="img/bookstore.jpg"> The Bookstore
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                
                        <li class="nav-item"><a class="nav-link" href="Carrinho.php">Carrinho</a></li>
                        <li class="nav-item"><a class="nav-link" href="Reservas.php">Reservas</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="LoginCliente.php">Faça seu login!</a></li>
                        <li class="nav-item"><a class="nav-link" href="CadastroCliente.php">Cadastra-se</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner">
        <img src="img/banner.png" alt="Banner da livraria">
    </div>

    <div class="container mt-5 text-center">
        <h2>Conheça um pouco sobre a nossa loja</h2>
        <div class="card p-4">
            <h3>Sobre Nós</h3>
            <p>A The Bookstore nasceu da paixão por boas histórias e do desejo de compartilhá-las com você...</p>
        </div>
    </div>

    <div class="container-cards">
        <?php $livros = [
            ["O Familiar", "Leigh Bardugo", "79,90"],
            ["Hey Vovo Jude", "Paul McCartney", "69,90"],
            ["As Aventuras de Mike", "Gabriel Dearo", "129,90"],
            ["Feras do Futebol", "Simon Mugford", "49,90"],
            ["Graciliano Retrato Fragmentado", "Ricardo Ramos", "159,90"],
            ["Sabores do Vinho", "Cristina Yamagami", "99,90"]
        ];
        foreach ($livros as $livro): ?>
        <div class="card p-3 text-center">
            <img src="img/<?php echo strtolower(str_replace(' ', '', $livro[0])); ?>.png" class="card-img-top" alt="<?php echo $livro[0]; ?>">

            <div class="card-body">
                <h3><?php echo $livro[0]; ?></h3>
                <p><?php echo $livro[1]; ?></p>
                <p><strong>R$ <?php echo $livro[2]; ?></strong></p>
               
                <?php if(isset($_SESSION['user_id'])): ?>
            <button><a class="btn btn-primary" href="TelaComprar.php">Comprar</a></button>
            <?php else: ?>
                <button><a class="btn btn-warning" href="LoginCliente.php">Faça login para comprar</a></button>
            <?php endif; ?>

                <button><a class="btn btn-secondary" href="TelaReservar.php">Reservar</a></button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <h2>Atendimento</h2>
        <p>De Segunda a Sexta das 08h às 18h.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
