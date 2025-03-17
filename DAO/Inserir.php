<?php 
    namespace PHP\Modelo\DAO;
    require_once('Conexao.php');
    use PHP\Modelo\DAO\Conexao;

    class Inserir{
        public function cadastrarEndereco(Conexao $conexao, string $logradouro, int $numero, string $bairro, string $cidade, string $estado, int $cep, string $pais){
            try {
                $conn = $conexao->conectar();//abrir a conexao
                $sql = "insert into endereco(codigo, logradouro, numero, bairro, cidade, estado, cep, pais)values('','$logradouro','$numero','$bairro','$cidade','$estado','$cep','$pais')";
                $result = mysqli_query($conn,$sql);//executa o comando. Agora precisa fechar a porta do banco de dados
                mysqli_close($conn);//fecha o banco de dados
                if ($result) {
                    return "<br><br>Inserido com sucesso!";
                }
                return "<br><br>Não inserido!";
            } catch (Exception $erro) {
                return "<br><br>Algo deu muito errado!<br><br>$erro";
            }//fim do catch
        }//fim do método

        public function cadastrarCliente(Conexao $conexao, string $cpf, string $nome, string $telefone, int $codigoEndereco, float $precoTotal){
            try {
                $conn = $conexao->conectar();//abrir conexao
                $sql = "insert into cliente(cpf, nome, telefone, codigoEndereco, precoTotal)values('$cpf','$nome','$telefone','$codigoEndereco','$precoTotal')";
                $result = mysqli_query($conn, $sql);//executa o comando
                mysqli_close($conn);//fecha o banco de dados
                if ($result) {
                    return "<br><br>Inserido com sucesso!";
                }
                return "<br><br>Não inserido!";
            } catch (Exception $erro) {
                return "<br><br>Algo deu muito errado!<br><br>$erro";
            }
        }//fim do método

    }//Fim da classe


?>