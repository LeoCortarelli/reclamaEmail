<?php
    // SISTEMA DE PAGINAÇÃO DA TABELA

include('../../conexao/conexao.php');

$sql_usuario_count_query = "SELECT COUNT(*) as contador FROM usuario"; // Pegando a quantidade de usuarios
$sql_usuario_count_query_exec = $conn->query($sql_usuario_count_query) or die($mysqli->error); // executando o select acima

$sql_usuario_count = $sql_usuario_count_query_exec->fetch_assoc();
$usuario_count = $sql_usuario_count['contador']; // contador e o nome que demos para COUNT(*)

$page = $_GET['page'] ? intval($_GET['page']) : 1; // Sé existir (?) o page a pagina vai ser o proprio page se não existir (:) ela vai ser 1 
$limit = 20;
$intervalo_paginas = 1;
$offset = ($page - 1) * $limit;

$numero_paginas = ceil($usuario_count / $limit); // a função ceil()

$sql_usuario_query = "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT {$limit} OFFSET {$offset}";
$sql_usuario_query_exec = $conn->query($sql_usuario_count_query) or die($mysqli->error);
?>