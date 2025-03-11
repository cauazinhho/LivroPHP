<?php
namespace PHP\Modelo;

class Livro {
    protected string $titulo;
    protected string $autor;
    protected float $preco;

    public function __construct(string $titulo, string $autor, float $preco)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->preco = $preco;
    }

    public function __get(string $atributo): string {
        return $this->$atributo;
    }

    public function __set(string $atributo, string $valor): void {
        $this->$atributo = $valor;
    }

    public function imprimir(): string {
        return "Título: " . $this->titulo . "<br>Autor: " . $this->autor . "<br>Preço: R$ " . number_format($this->preco, 2, ',', '.');
    }
}
?>
