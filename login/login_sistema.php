<?php
session_start();
if((!isset($_SESSION['nickname']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['nickname']);
    unset($_SESSION['senha']);
    header('Location: login_view.php');
}
    $logado = $_SESSION['nickname'];
    header("Location: ../cadastro/cadastro_gerenciador_cidade.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregando...</title>
</head>

<body>
</body>

</html>