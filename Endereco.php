<?php
namespace PHP\Modelo;

class Endereco {
    protected string $rua;
    protected string $cidade;
    protected string $estado;
    protected string $cep;

    public function __construct(string $rua, string $cidade, string $estado, string $cep)
    {
        $this->rua = $rua;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function __get(string $atributo): string {
        return $this->$atributo;
    }

    public function __set(string $atributo, string $valor): void {
        $this->$atributo = $valor;
    }

    public function imprimir(): string {
        return $this->rua . ", " . $this->cidade . ", " . $this->estado . " - " . $this->cep;
    }
}
?>
