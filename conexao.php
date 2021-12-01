<?php
// Declaração as variáveis necessárias para a conexão com o  
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "concessionariagp";

// Acesso ao banco de dados concessionariagp
try{
    $PDO = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
}
catch (PDOException $erroDeExcessaoPDO){
    // Mensagem de erro 
    echo "<script>alert('Erro Ao Conectar Com O Banco De Dados');</script>";
    // Redirecionamento para o index.php pelo JS
   echo "<script>window.location.assign('index.php');</script>";
}