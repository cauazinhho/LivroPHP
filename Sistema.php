<?php
namespace PHP\Modelo;
use PHP\Modelo\Usuario;
use PHP\Modelo\Livro;
use PHP\Modelo\Carrinho;

// Oq vai faze o gerenciamento do login e do cadastro
class Sistema {
    private array $usuarios = [];
    private ?Usuario $usuarioAtual = null;

    public function cadastrarUsuario(string $nome, string $telefone, string $dataNascimento, string $login, string $senha, Endereco $endereco): void {
        $usuario = new Usuario($nome, $telefone, $dataNascimento, $login, $senha, $endereco);
        $this->usuarios[$login] = $usuario;
    }

    public function fazerLogin(string $login, string $senha): bool {
        if (isset($this->usuarios[$login]) && $this->usuarios[$login]->senha === $senha) {
            $this->usuarioAtual = $this->usuarios[$login];
            return true;
        }
        return false;
    }

//////////////////////////////////////////

    public function adicionarLivroCarrinho(Carrinho $carrinho, Livro $livro): void {
        $carrinho->adicionar($livro);
    }

    public function finalizarCompra(Carrinho $carrinho): string {
        if ($this->usuarioAtual === null) {
            return "Você precisa estar logado para finalizar a compra!";
        }
        return "Compra finalizada com sucesso! Total: R$ " . number_format($carrinho->calcularTotal(), 2, ',', '.');
    }
}
?>
