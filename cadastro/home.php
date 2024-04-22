<?php
include 'includes.php';
$titulo = 'Home';
?>

<div class="inicializador">
    <?php include 'menu.php'; ?>
    <div class="row mt-4">
        <div class="formulario">
            <div class="col-md-12" id="toast-menu-div">
                <?php
                $sqlTotalMembrosCidade = "SELECT cidades.cidade AS nome_cidade, COUNT(contatos.codcontato) AS total_membros FROM cidades LEFT JOIN contatos ON cidades.id = contatos.cidade GROUP BY cidades.id";
                $sqlMembros = "SELECT COUNT(codcontato) AS total FROM contatos";
                if ($resultadoMembros = $conexao->query($sqlMembros)) {
                    $total = $resultadoMembros->fetch_assoc()['total'];
                    echo "Total de membros: $total<br>";
                } else {
                    echo "Erro na consulta: " . $conexao->error;
                }

                $sqlGenero = "SELECT COUNT(codcontato) AS total, sexo FROM contatos GROUP BY sexo";
                if ($resultadoGenero = $conexao->query($sqlGenero)) {
                    while ($row = $resultadoGenero->fetch_assoc()) {
                        echo "Total de membros com sexo {$row['sexo']}: {$row['total']}<br>";
                    }
                } else {
                    echo "Erro na consulta: " . $conexao->error;
                }

                if ($resultadoTotalMembrosCidade = $conexao->query($sqlTotalMembrosCidade)) {
                    while ($row = $resultadoTotalMembrosCidade->fetch_assoc()) {
                        echo "Total de membros na cidade {$row['nome_cidade']}: {$row['total_membros']}<br>";
                    }
                } else {
                    echo "Erro na consulta: " . $conexao->error;
                }

                $conexao->query("SET lc_time_names = 'pt_BR'");
                $sqlCidades = "SELECT 
                                cidades.cidade AS nome_cidade, 
                                CONCAT(MONTHNAME(contatos.data), ' ', YEAR(contatos.data)) AS mes,
                                contatos.sexo,
                                COUNT(contatos.codcontato) AS total_registros 
                            FROM 
                                cidades 
                            LEFT JOIN 
                                contatos ON cidades.id = contatos.cidade 
                            GROUP BY 
                                nome_cidade, mes, contatos.sexo";
                if ($resultadoCidades = $conexao->query($sqlCidades)) {
                    while ($row = $resultadoCidades->fetch_assoc()) {
                        echo "Total de registros para a cidade {$row['nome_cidade']}, no mês de {$row['mes']}, sexo {$row['sexo']}: {$row['total_registros']}<br>";
                    }
                } else {
                    echo "Erro na consulta: " . $conexao->error;
                }
                ?>
            </div>
        </div>
    </div>
</div>