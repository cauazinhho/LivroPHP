<?php
namespace PHP\Modelo;

class Livro {
    protected string $titulo;
    protected string $autor;
    protected float $preco;
    protected int $estoque;

    public function __construct(string $titulo, string $autor, float $preco, int $estoque)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function __get(string $atributo): string {
        return $this->$atributo;
    }

    public function __set(string $atributo, string $valor): void {
        $this->$atributo = $valor;
    }

    public function imprimir(): string {
        return "Título: " . $this->titulo . "<br>Autor: " . $this->autor . "<br>Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>Estoque: " . $this->estoque;
    }

    // Verifica se o livro
    public function isDisponivel(): bool {
        return $this->estoque > 0;
    }

   
    public function consultarDisponibilidade(): string {
        if ($this->isDisponivel()) {
            return "O livro '{$this->titulo}' está disponível para compra.";
        } else {
            return "O livro '{$this->titulo}' está indisponível para compra, mas pode ser reservado.";
        }
    }

    // Reservar um livro
    public function reservar(): void {
        if ($this->isDisponivel()) {
            $this->estoque -= 1;
        }
    }
}
?>
