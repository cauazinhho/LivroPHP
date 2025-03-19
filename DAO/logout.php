<?php
session_start();
session_destroy();
header("Location: LoginCliente.php");
exit();
?>
