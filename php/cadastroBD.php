<?php
include('../conexao/conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipoUser = $_POST['tipoUsuario'];
    $problema = $_POST['problema'];
    $regiao = $_POST['regiao'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];

    $quey = "INSERT INTO usuario(nome,email,usuario,problema,regiao,descricao,data_reclama) VALUE('$nome','$email','$tipoUser','$problema','$regiao','$desc','$date')";
    $result = mysqli_query($conn, $quey);

    if (!$result) {
        die('Erro ao inserir dados usuario: ' . mysqli_error($conn));
    }

    header('Location: ../index.php');
?>