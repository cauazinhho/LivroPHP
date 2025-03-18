<?php
    namespace PHP\Modelo;
  
    class Compra{
        
        private int $codigo;
        private string $livro;
        private int $quantidade;
        private float $precoUnit;
        private float $precoFinal;
       
       

        public function __construct(int $codigo, string $livro, int $quantidade, float $precoUnit, float $precoFinal){

            $this->codigo = $codigo;
            $this->livro = $livro;
            $this->quantidade = $quantidade;
            $this->precoUnit = $precoUnit;
            $this->precoFinal = $precoFinal;
           
        
        }//fim do método

        //Método de acesso e modificadores
        //get e set

    public function __get(string $dados):mixed{
        return $this->$dados;
    }//Fim do método

    public function __set(string $variavel, string $dados):void{
        $this->variavel = $dados;
    }//Fim do método

    public function imprimir():string{
        return "<br>Código: ". $this->codigo.
               "<br>Livro: ". $this->placa.
               "<br>Quantidade: " . $this->cliente.
               "<br>Preço Unit: ". $this->cor.
               "<br>Preço Final: ". $this->modelo;

             
    }//Fim do método

    }//Fim da classe Pessoa
?>