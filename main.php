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

 
    $endereco = new Endereco("Rua A", "Cidade B", "Estado C", "12345-678");

    $sistema = new Sistema();

    $sistema->cadastrarUsuario("João", "123456789", "1990-05-15", "joao123", "senha123", $endereco);

    $livro1 = new Livro("Livro 1", "Autor A", 29.90, 0); 
    $livro2 = new Livro("Livro 2", "Autor B", 39.90, 5); 

    $sistema->cadastrarLivro($livro1);
    $sistema->cadastrarLivro($livro2);

    if ($sistema->fazerLogin("joao123", "senha123")) {
        echo "Usuário logado com sucesso!<br>";
    } else {
        echo "Falha no login.<br>";
    }

    echo "Tentando comprar Livro 1 (indisponível):<br>";
    $carrinho = new Carrinho();
    echo $sistema->adicionarLivroCarrinho($carrinho, $livro1) . "<br>";

    echo "Tentando comprar Livro 2 (disponível):<br>";
    echo $sistema->adicionarLivroCarrinho($carrinho, $livro2) . "<br>";

?>