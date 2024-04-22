<?php
include_once('../config.php');

$dados_requisicao = $_REQUEST;

$pagina = isset($dados_requisicao['start']) ? $dados_requisicao['start'] / $dados_requisicao['length'] + 1 : 1;
$tamanho_pagina = isset($dados_requisicao['length']) ? $dados_requisicao['length'] : 10;

$ordenacao = isset($dados_requisicao['order'][0]['column']) ? $dados_requisicao['columns'][$dados_requisicao['order'][0]['column']]['data'] : 'id';
$direcao = isset($dados_requisicao['order'][0]['dir']) ? $dados_requisicao['order'][0]['dir'] : 'DESC';
$termo = isset($dados_requisicao['search']['value']) ? $dados_requisicao['search']['value'] : '';

$sql_total = "SELECT COUNT(codcontato) AS total FROM contatos";
$resultado_total = $conexao->query($sql_total);
$total_registros = $resultado_total->fetch_assoc()['total'];

$query_usuarios = "SELECT
                        c.codcontato,
                        c.nome,
                        c.sexo,
                        c.data,
                        c.cidade,
                        ci.id,
                        ci.cidade AS nomeCidade
                    FROM
                        contatos c
                    LEFT JOIN
                        cidades ci  ON c.cidade = ci.id
                    WHERE
                        CONCAT_WS(' ', c.codcontato, c.nome, c.sexo, c.data, c.cidade, ci.id, ci.cidade) LIKE '%$termo%'
                        ORDER BY
                            c.nome $direcao
                    LIMIT
                        $tamanho_pagina OFFSET " . (($pagina - 1) * $tamanho_pagina);

$resultado_usuarios = $conexao->query($query_usuarios);

if (!$resultado_usuarios) {
    die("Erro na query: " . $conexao->error);
}

$dados = array();
while ($row = $resultado_usuarios->fetch_assoc()) {
    $registro = array();
    $registro[] = $row['codcontato'];
    $registro[] = $row['nome'];
    $data_formatada = date('d/m/Y', strtotime($row['data']));
    $registro[] = $data_formatada;
    $registro[] = $row['nomeCidade'];
    $registro[] = $row['sexo'];

    $dados[] = $registro;
}

$resposta = array(
    "draw" => intval($dados_requisicao['draw']),
    "recordsTotal" => intval($total_registros),
    "recordsFiltered" => intval($total_registros),
    "data" => $dados
);

header('Content-Type: application/json');

echo json_encode($resposta);

$conexao->close();
