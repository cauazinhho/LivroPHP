    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Bookstore</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="CSS/style.css">
    
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <img src="img/bookstore.jpg">
                <a class="navbar-brand" href="home.php">The Bookstore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">Faça seu login!</a></li>
                            <li class="nav-item"><a class="nav-link" href="cadastro.php">Cadastra-se</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="banner">
           <img src="">
        </div>

        <div class="sobre-nos">
            <h2>Conheça um pouco sobre a nossa loja</h2>
            <div class="caixaSobreNos">
                <h3>Sobre Nós</h3>
                <p>A The Bookstore nasceu da paixão por boas histórias e do desejo de compartilhá-las com você. Somos mais do que uma livraria, somos um ponto de encontro para leitores que acreditam no poder das palavras.
                            <br>
                    Mais do que vender livros, queremos criar uma comunidade onde a literatura seja celebrada, discutida e vivida.</p>
            </div>
        </div>

        <div class="container-cards">
            <div class="card">
                <img src="img/">
                <h3>O Familiar</h3>
                <p>Leigh Bardugo</p><br><br><br>
                <p>R$ 79,90</p><br><br>

                <button>Comprar</button>
                <button>Reservar</button>
            </div>    

            <div class="card">
                <img src="img/">
                <h3>Hey, Vovô Jude!</h3>
                <p>Paul McCartney</p><br><br><br>
                <p>R$ 69,90</p><br><br>

                <button>Comprar</button>
                <button>Reservar</button>
            </div>                    

            <div class="card">
                <img src="img/">
                <h3>As Aventuras de Mike</h3>
                <p>Gabriel Dearo</p><br><br><br>
                <p>R$ 129,90</p><br><br>

                <button>Comprar</button>
                <button>Reservar</button>
            </div>             
            
            <div class="card">
                <img src="img/">
                <h3>Feras do Futebol: Bellingham</h3>
                <p>Simon Mugford</p><br><br><br>
                <p>R$ 49,90</p><br><br>

                <button>Comprar</button>
                <button>Reservar</button>
            </div>     
            
            <div class="card">
                <img src="img/">
                <h3>Graciliano: Retrato Fragmentado</h3>
                <p>Ricardo Ramos</p><br><br><br>
                <p>R$ 159,90</p><br><br>

                <button>Comprar</button>
                <button>Reservar</button>
            </div>            
            
            <div class="card">
                <img src="img/">
                <h3>Sabores do Vinho: da Uva À Taça</h3>
                <p>Cristina Yamagami</p><br><br><br>
                <p>R$ 99,90</p><br><br>

                <button>Comprar</button>
                <button>Reservar</button>
            </div>                    
        </div>

        <a href=""><button>Acesse mais Livros</button></a>

        <footer>
            <div>
                <h2>Atendimento</h2>
                <p>De Segunda a Sexta das 08h às 18h.</p>

            </div>

        </footer>
       
    </body>
    </html>
