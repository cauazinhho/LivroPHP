<?php 
    namespace PHP\Modelo\DAO;

    class Conexao{
        function conectar(){
        try {
            $conn = mysqli_connect('localhost','root','','TI21');

            if ($conn) {
                echo "<br>Conectado com sucesso!";
                return $conn;
            }

        } 
        catch (Exception $erro) 
        {
           return "Algo deu errado!.$erro<br><br>";
        }
        }//fim do método
    }//fim da classe

?>