<?php
namespace PHP\Modelo;

class Reserva {
    protected Livro $livro;
    protected Usuario $usuario;
    protected \DateTime $dataReserva;

    public function __construct(Livro $livro, Usuario $usuario)
    {
        $this->livro = $livro;
        $this->usuario = $usuario;
        $this->dataReserva = new \DateTime();
    }

    public function imprimir(): string {
        return "Livro: " . $this->livro->titulo . "<br>Usuário: " . $this->usuario->nome . "<br>Data da Reserva: " . $this->dataReserva->format('d/m/Y H:i:s');
    }
}
?>
