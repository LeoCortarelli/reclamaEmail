<?php
include('../conexao/conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $problema = $_POST['problema'];
    $regiao = $_POST['regiao'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];

    $quey = "INSERT INTO usuario(nome,email,problema,regiao,descricao,data_reclama) VALUE('$nome','$email','$problema','$regiao','$desc','$date')";
    $result = mysqli_query($conn, $quey);

    if (!$result) {
        die('Erro ao inserir dados usuario: ' . mysqli_error($conn));
    }

    header('Location: ../index.php');
?>