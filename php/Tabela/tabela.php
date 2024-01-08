<?php 
    include('../../conexao/conexao.php'); 
    mysqli_set_charset($conn, "utf8");

    // SISTEMA DE PAGINAÇÃO DA TABELA
    include ('../paginacao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-tabela4.css">
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
                $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT {$limit} OFFSET {$offset}";
                #$sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
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
            
        <div class="style-div-button-download">
            <form action="../process.php" method="post">
                <button type="submit" class="button-download" name="submit">
                    <img src="../../img/download_black.png" alt="png_download" width="12%"><div class="div-button-espacamento"></div>Download</button>
            </form>
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
                            
                            // Formatar a data para o padrão brasileiro
                            $dataFormatada = date("d/m/Y", strtotime($dados['data_reclama']));
                            echo "<td>". $dataFormatada. "</td>";
                            echo "<tr>";
                        }
                    ?>
                </tbody>
            </table>
            <div>
                <nav aria-label="Navegação de página exemplo" class="style-nav">
                    <ul class="pagination justify-content-end style-ul">
                        <li class="page-item"><a class="page-link style-prim" href="?page=1"><<</a></li>
                        <?php 
                            $primeira_pag = max($page - $intervalo_paginas, 1);
                            $ultima_pag = min($numero_paginas, $page + $intervalo_paginas);

                            for($pagina = $primeira_pag; $pagina <= $ultima_pag; $pagina++){ ?>
                                <li class="page-item"><a class="page-link style-li-a" href="?page=<?php echo "{$pagina}"; ?>"><?php echo "{$pagina}"; ?></a></li>
                        <?php } // Fechando o for ?>
                        <li class="page-item"><a class="page-link style-prim" href="?page=<?php echo $ultima_pag; ?>">>></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- FOOTER -->
    <div class="footer-basic">
        <footer>
            <div class="social" style="margin-left: 45%;">
                <a href="https://www.instagram.com/leo.cortarelli/"><img src="../../img/instagram.png" width="5%"></a>
                <a href="https://www.linkedin.com/in/leonardocortarelli/" style="padding-left: 20px;"><img src="../../img/linkedin.png" width="5%"></a>
                <a href="https://github.com/LeoCortarelli" style="padding-left: 20px;"><img src="../../img/github.png" width="5%"></a>   
            </div>
            <br>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="../../index.php">Home</a></li>
                <li class="list-inline-item"><a href="../../opcoes/telaService.html">Services</a></li>
                <li class="list-inline-item"><a href="../../opcoes/telaSobre.html">About</a></li>
                <li class="list-inline-item"><a href="../../opcoes/telaTermos.html">Terms</a></li>
                <li class="list-inline-item"><a href="../../opcoes/telaPoliticaPrivacy.html">Privacy Policy</a></li>
            </ul>
            <p class="copyright">Company LeoCortarelli © 2023</p>
        </footer>
    </div>
      

<script src="../../js/pesquisa.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>                  