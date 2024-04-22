<?php
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'auesoftware';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// echo $conexao->connect_errno ? "Banco não está em operação" : "Banco está operando";
?>
