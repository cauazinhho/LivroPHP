<?php
namespace PHP\Modelo;
use PHP\Modelo\Usuario;
use PHP\Modelo\Livro;
use PHP\Modelo\Carrinho;
use PHP\Modelo\Pagamento;
use PHP\Modelo\Reserva;

class Sistema {
    private array $usuarios = [];
    private array $livros = [];
    private ?Usuario $usuarioAtual = null;
    private array $reservas = [];

    public function cadastrarUsuario(string $nome, string $telefone, string $dataNascimento, string $login, string $senha, Endereco $endereco): void {
        $usuario = new Usuario($nome, $telefone, $dataNascimento, $login, $senha, $endereco);
        $this->usuarios[$login] = $usuario;
    }

    public function cadastrarLivro(Livro $livro): void {
        $this->livros[] = $livro;
    }

    public function fazerLogin(string $login, string $senha): bool {
        if (isset($this->usuarios[$login]) && $this->usuarios[$login]->senha === $senha) {
            $this->usuarioAtual = $this->usuarios[$login];
            return true;
        }
        return false;
    }

    public function adicionarLivroCarrinho(Carrinho $carrinho, Livro $livro): string {
       
        $disponibilidade = $livro->consultarDisponibilidade();

       
        if (!$livro->isDisponivel()) {
            $disponibilidade .= "<br>Deseja reservar o livro?";
        }

        $carrinho->adicionar($livro);
        return $disponibilidade;
    }

    public function finalizarCompra(Carrinho $carrinho, Pagamento $pagamento): string {
        if ($this->usuarioAtual === null) {
            return "Você precisa estar logado para finalizar a compra!";
        }

        
        if ($this->validarCartao($pagamento->numeroCartao)) {
            if ($pagamento->processarPagamento()) {
                return "Compra finalizada com sucesso! Total: R$ " . number_format($carrinho->calcularTotal(), 2, ',', '.') . "<br>Pagamento processado com sucesso!";
            } else {
                return "Erro no pagamento. Verifique os dados do cartão e tente novamente.";
            }
        } else {
            return "Número de cartão inválido. A compra não foi processada.";
        }
    }

   
    private function validarCartao(string $numeroCartao): bool {
        
        return strlen($numeroCartao) === 16;
    }

   
    public function realizarReserva(Livro $livro): string {
        if (!$livro->isDisponivel()) {
           
            if ($this->usuarioAtual === null) {
                return "Você precisa estar logado para realizar a reserva!";
            }

            $reserva = new Reserva($livro, $this->usuarioAtual);
            $this->reservas[] = $reserva;
            $livro->reservar();  
            return "Reserva realizada com sucesso para o livro: " . $livro->titulo . "<br>" . $reserva->imprimir();
        }

        return "O livro está disponível para compra!";
    }

    public function listarReservas(): string {
        $reservasListadas = "";
        foreach ($this->reservas as $reserva) {
            $reservasListadas .= $reserva->imprimir() . "<br><br>";
        }
        return $reservasListadas;
    }
}
?>
