
<?php 
class Usuario {
    private $nome;
    private $endereco;
    private $telefone;
    private $dataNascimento;
    private $login;
    private $senha;

    public function __construct($nome, $endereco, $telefone, $dataNascimento, $login, $senha) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function cadastrar() {
        
        $_SESSION['usuario'] = [
            'login' => $this->login,
            'nome' => $this->nome
        ];
    }

    public function validarLogin($login, $senha) {
         if ($this->login == $login && $this->senha == $senha) {
            return true;
        }
        return false;
    }
}
 
?>
