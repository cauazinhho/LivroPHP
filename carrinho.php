<?php
namespace PHP\Modelo;
use PHP\Modelo\Livro;

class Carrinho {
    protected array $livros = [];

    public function adicionar(Livro $livro): void {
        $this->livros[] = $livro;
    }

    public function listar(): string {
        $listaLivros = "";
        foreach ($this->livros as $livro) {
            $listaLivros .= $livro->imprimir() . "<br><br>";
        }
        return $listaLivros;
    }

    public function calcularTotal(): float {
        $total = 0;
        foreach ($this->livros as $livro) {
            $total += $livro->preco;
        }
        return $total;
    }
}
?>
