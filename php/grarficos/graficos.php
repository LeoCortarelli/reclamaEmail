<?php include('../../conexao/conexao.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../../css/style-tela-grafico.css">
    <title>Graficos Reclama mail</title>
</head>
<body>
    
    <div class="header">
        <a href="../../index.php" class="logo"><img src="../../img/logo_reclama.png" alt="" width="6%"><h2 style="padding-left: 8px; display:inline;">Reclamações Email</h2></a>
        <div class="header-right">
          <a href="../../index.php">Home</a>
          <a class="active" href="graficos.php">Graficos</a>
          <a href="../Tabela/tabela.php">Tabela</a>
        </div>
    </div>

    <h2 class="tituloStyle" style="text-align: center; font-weight: bold; margin-top: 20px; font-size: 50px; width: 100%; margin-left: 30px;">Gráficos</h2>
    <div style="display: inline-flex; margin-left: 15%;">
        <?php
            #$sql = "SELECT regiao, COUNT(*) as total FROM usuario GROUP BY regiao";
            $sql = "SELECT problema, COUNT(*) as total FROM usuario GROUP BY problema";
            $result = $conn->query($sql);
        ?>
        <div style="display: block; margin-top: 50px;">
            <h2>Gráfico de Reclamações</h2>
            <br>
            <div style="width: 80%; margin: auto;">
                <canvas id="graficoPizza"></canvas>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var ctx = document.getElementById('graficoPizza').getContext('2d');
                    var data = {
                        labels: [<?php while($dados = mysqli_fetch_assoc($result)) { echo "'".$dados['problema']."',"; } ?>],
                        datasets: [{
                            data: [<?php mysqli_data_seek($result, 0); 
                                    while($dados = mysqli_fetch_assoc($result)) { 
                                        echo $dados['total'].",";
                                    } ?>],
                            backgroundColor: [
                                'rgba(0, 0, 255)', 
                                'rgba(0, 255, 255)', 
                                'rgba(124, 252, 0)' 
                            ],
                        }]
                    };
                    var options = {
                        responsive: true,
                        maintainAspectRatio: false
                    };
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: options
                    });
                });
            </script>
        </div>
        

        <div class="styleTabela">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ["Element", "Titulos", { role: "style" } ], // Topo da tabela

                <?php

                    #$sql = "SELECT problema, COUNT(*) as total FROM usuario GROUP BY problema";
                    $sql = "SELECT regiao, COUNT(*) as total FROM usuario GROUP BY regiao";
                    $busca = mysqli_query($conn, $sql);

                    while($dados = mysqli_fetch_array($busca)){
                        $nomeClube = $dados['regiao'];
                        $titulosChampions = $dados['total'];
                    

                ?>

                ["<?php echo $nomeClube ?>", <?php echo $titulosChampions ?>, "orange"], 
                

                <?php } ?> // fechando as chaves do while

                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                                { calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation" },
                                2]);

                var options = {
                    title: "Grafico de Reclamações por Região",
                    width: 750,    
                    height: 500,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                chart.draw(view, options); 
            }
            </script>
            <div id="columnchart_values" style="width: 100px; height: 500px;"></div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>