<?php
    namespace PHP\Modelo;
    require_once('Endereco.php');
    require_once('Usuario.php');
    require_once('Livro.php');
    require_once('Carrinho.php');
    require_once('Pagamento.php');
    require_once('Reserva.php');
    require_once('Sistema.php');

    use PHP\Modelo\Endereco;
    use PHP\Modelo\Usuario;
    use PHP\Modelo\Livro;
    use PHP\Modelo\Carrinho;
    use PHP\Modelo\Pagamento;
    use PHP\Modelo\Sistema;

    // Criar um endereço
    $endereco = new Endereco("Rua A", "Cidade B", "Estado C", "12345-678");

    // Criar um sistema de vendas
    $sistema = new Sistema();

    // Cadastrar um usuário
    $sistema->cadastrarUsuario("João", "123456789", "1990-05-15", "joao123", "senha123", $endereco);

    // Cadastrar livros no sistema
    $livro1 = new Livro("Livro 1", "Autor A", 29.90, 0); // Livro sem estoque
    $livro2 = new Livro("Livro 2", "Autor B", 39.90, 5); // Livro com estoque disponível

    $sistema->cadastrarLivro($livro1);
    $sistema->cadastrarLivro($livro2);

    // Logar o usuário
    if ($sistema->fazerLogin("joao123", "senha123")) {
        echo "Usuário logado com sucesso!<br>";
    } else {
        echo "Falha no login.<br>";
    }

    // Tentar comprar ou reservar livros
    echo "Tentando comprar Livro 1 (indisponível):<br>";
    $carrinho = new Carrinho();
    echo $sistema->adicionarLivroCarrinho($carrinho, $livro1) . "<br>";

    echo "Tentando comprar Livro 2 (disponível):<br>";
    echo $sistema->adicionarLivroCarrinho($carrinho, $livro2) . "<br>";

?>