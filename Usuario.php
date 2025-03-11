<?php
namespace PHP\Modelo;
require_once('Endereco.php');
use PHP\Modelo\Endereco;

class Usuario {
    protected string $nome;
    protected string $telefone;
    protected string $dataNascimento;
    protected string $login;
    protected string $senha;
    protected Endereco $endereco;

    public function __construct(string $nome, string $telefone, string $dataNascimento, string $login, string $senha, Endereco $endereco)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->login = $login;
        $this->senha = $senha;
        $this->endereco = $endereco;
    }

    public function __get(string $atributo): string {
        return $this->$atributo;
    }

    public function __set(string $atributo, string $valor): void {
        $this->$atributo = $valor;
    }

    public function imprimir(): string {
        return "<br>Nome: " . $this->nome .
               "<br>Telefone: " . $this->telefone .
               "<br>Data de Nascimento: " . $this->dataNascimento .
               "<br>Login: " . $this->login .
               "<br>Endereço: " . $this->endereco->imprimir();
    }
}
?>
