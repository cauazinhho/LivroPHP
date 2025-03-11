<?php
require_once('Endereco.php');
require_once('Usuario.php');
require_once('Livro.php');
require_once('Carrinho.php');
require_once('Pagamento.php');
require_once('Sistema.php');

use PHP\Modelo\Endereco;
use PHP\Modelo\Usuario;
use PHP\Modelo\Livro;
use PHP\Modelo\Carrinho;
use PHP\Modelo\Pagamento;
use PHP\Modelo\Sistema;

$endereco = new Endereco("Rua A", "Cidade B", "Estado C", "12345-678");

// sistema de vendas
$sistema = new Sistema();

// Cadastrar um usuário
$sistema->cadastrarUsuario("João", "123456789", "1990-05-15", "joao123", "senha123", $endereco);

// Logar o usuário
if ($sistema->fazerLogin("joao123", "senha123")) {
    echo "Usuário logado com sucesso!<br>";
} else {
    echo "Falha no login.<br>";
}

// Adicionar livros ao carrinho
$carrinho = new Carrinho();
$livro1 = new Livro("Livro 1", "Autor A", 29.90);
$livro2 = new Livro("Livro 2", "Autor B", 39.90);

$sistema->adicionarLivroCarrinho($carrinho, $livro1);
$sistema->adicionarLivroCarrinho($carrinho, $livro2);

// Mostra os livros no carrinho
echo "Livros no Carrinho:<br>";
echo $carrinho->listar();

$pagamento = new Pagamento("1234567812345678", "12/24", "123", $carrinho->calcularTotal());


echo $sistema->finalizarCompra($carrinho, $pagamento);
?>
