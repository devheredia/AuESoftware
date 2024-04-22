<?php
include_once('../config.php');
session_start();
$user_ID = $_SESSION['usuario']['id'];

if (isset($_POST['submitInserirCidades'])) {
    $nomeCidade = $_POST['cidade'];
    $check_query = "SELECT COUNT(*) AS total FROM cidades WHERE cidade = '$nomeCidade'";
    $check_result = mysqli_query($conexao, $check_query);
    $check_data = mysqli_fetch_assoc($check_result);

    if ($check_data['total'] > 0) {
        header("Location: cadastro_gerenciador_cidade.php?error=error");
        exit(); 
    }
    $result = mysqli_query($conexao, "INSERT INTO cidades(cidade, insersor) VALUES ('$nomeCidade', '$user_ID')");
    if ($result) {
        header("Location: cadastro_gerenciador_cidade.php?sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitDesativarCidade'])) {
    $idCidade = $_POST['identificadorCidade'];
    $cidade = $_POST['cidade'];
    $result = mysqli_query($conexao, "UPDATE cidades SET cidade = '$cidade', status = '2' WHERE id = '$idCidade'");
    echo $result;
    if ($result) {
        header("Location: cadastro_gerenciador_cidade.php?atualizado=atualizado");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitAtivarCidade'])) {
    $idCidade = $_POST['identificadorCidade'];
    $cidade = $_POST['cidade'];
    $result = mysqli_query($conexao, "UPDATE cidades SET cidade = '$cidade', status = '1' WHERE id = '$idCidade'");
    if ($result) {
        header("Location: cadastro_gerenciador_cidade.php?desativado=desativado");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitFormulario'])) {
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $cidade = $_POST['cidade'];
    $genero = $_POST['genero'];
    $result = mysqli_query($conexao, "INSERT INTO contatos(nome, sexo, data, cidade) VALUES ('$nome', '$genero', '$data', '$cidade')");
    if ($result) {
        header("Location: cadastro_view.php?sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitAtualizarContato'])) {
    $identificadorContato = $_POST['identificadorContato'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $cidade = $_POST['cidade'];
    $genero = $_POST['genero'];
    $cidade = $_POST['cidade'];
    $result = mysqli_query($conexao, "UPDATE contatos SET nome = '$nome', sexo = '$genero', data = '$data', cidade = '$cidade'  WHERE codcontato = '$identificadorContato'");
    if ($result) {
        header("Location: cadastro_view.php?sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}

if (isset($_POST['submitExcluirContato'])) {
    $identificadorContato = $_POST['identificadorContato'];
    $result = mysqli_query($conexao, "DELETE FROM contatos WHERE codcontato = '$identificadorContato'");
    if ($result) {
        header("Location: cadastro_view.php?sucesso=sucesso");
    } else {
        echo "Erro ao inserir dados no banco de dados.";
    }
}