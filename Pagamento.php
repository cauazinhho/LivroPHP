<?php
namespace PHP\Modelo;

class Pagamento {
    protected string $numeroCartao;
    protected string $validade;
    protected string $codigoSeguranca;
    protected float $valor;

    public function __construct(string $numeroCartao, string $validade, string $codigoSeguranca, float $valor)
    {
        $this->numeroCartao = $numeroCartao;
        $this->validade = $validade;
        $this->codigoSeguranca = $codigoSeguranca;
        $this->valor = $valor;
    }

    public function __get(string $atributo): string {
        return $this->$atributo;
    }

    public function __set(string $atributo, string $valor): void {
        $this->$atributo = $valor;
    }

    public function processarPagamento(): bool {
         
        if (strlen($this->numeroCartao) === 16 && strlen($this->codigoSeguranca) === 3) {
            
            return true;
        }
        return false;
    }

    public function imprimir(): string {
        return "Número do Cartão: " . $this->numeroCartao . "<br>Validade: " . $this->validade . "<br>Código de Segurança: " . $this->codigoSeguranca;
    }
}
?>
