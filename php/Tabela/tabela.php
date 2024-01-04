<?php include('../../conexao/conexao.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style -tabela2.css">
    <title>Tabela Reclama mail</title>
</head>
<body>
    
    <div class="header">
        <a href="../index.php" class="logo"><img src="../../img/logo_reclama.png" alt="" width="6%"><h2 style="padding-left: 8px; display:inline">Reclamações Email</h2></a>
        <div class="header-right">
          <a href="../../index.php">Home</a>
          <a href="../grarficos/graficos.php">Graficos</a>
          <a class="active" href="./tabela.php">Tabela</a>
        </div>
    </div>

    <h2 class="tituloStyle">Tabela Reclamações de emails</h2>

        <?php
            if(!empty($_GET['pesquisa'])){
                $data = $_GET['pesquisa'];
                $sql = "SELECT * FROM usuario WHERE email LIKE '%$data%' ORDER BY id_usuario DESC";
            }else{
                $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
            }

            $result = $conn->query($sql);
        ?>

        <br>
        <div class="imput-button">
            <label class="label">
                <input type="text" name="busca" class="input-bordas" placeholder="Pesquise o EMAIL" id="pesquisa">
                <span class="focus-border"> <i></i> </span>
            </label>
            <button class="btn" onclick="pesquisaData()"><img src="../../img/incon_pesquisar_black.png" alt="pesquisa" width="95%"></button>
        </div>
            

        <div class="m-5">
            <table class="table tabela table-bg">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Problema</th>
                    <th scope="col">Região</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($dados = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>". $dados['nome']. "</td>";
                            echo "<td>". $dados['email']. "</td>";
                            echo "<td>". $dados['usuario']. "</td>";
                            echo "<td>". $dados['problema']. "</td>";
                            echo "<td>". $dados['regiao']. "</td>";
                            echo "<td>". $dados['descricao']. "</td>";
                            echo "<td>". $dados['data_reclama']. "</td>";
                            echo "<tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

      

<script src="../../js/pesquisa.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>                    