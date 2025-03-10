<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $cartao = $_POST['cartao'];
    if (strlen($cartao) == 16) {
        echo "Compra realizada com sucesso!";  
        unset($_SESSION['carrinho']);  
    }

}
?>