<?php include('./conexao/connPdo.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style-index.css">
    <title>Reclama mail</title>
</head>
<body>
    
    <div class="header">
        <a href="#" class="logo"><img src="./img/logo_reclama.png" alt="" width="6%"><h2 style="padding-left: 8px; display:inline;">Reclamações Email</h2></a>
        <div class="header-right">
          <a class="active" href="index.php">Home</a>
          <a href="./php/grarficos/graficos.php">Graficos</a>
          <a href="./php/Tabela/tabela.php">Tabela</a>
        </div>
      </div>
      
      <div style="padding-left:20px">

        <form class="formulario" method="post" action="./php/cadastroBD.php">
        
            <h2 class="titulo">Anotar Reclamações de Email</h2>
        
            
            <label class="label">
                <input type="text" name="nome" class="input-bordas" placeholder="Nome" required>
                <span class="focus-border"> <i></i> </span>
            </label>
    
            <label class="label">
                <input type="email" name="email" class="input-bordas" placeholder="E-mail" required>
                <span class="focus-border"> <i></i> </span>
            </label>

            <select name="tipoUsuario" class="label input-bordas" required>
            <option selected disabled>Qual e o Usuario</option>
                    <?php
                        $query = $conn->query("SELECT id_user, user_col_franq FROM usuario_col_franq ORDER BY user_col_franq ASC");    
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach($registros as $option){
                            ?>
                                <option value ="<?php echo $option['user_col_franq']; ?>">
                                    <?php echo $option['user_col_franq']; ?>
                                </option>
                            <?php
                        }
                    ?>
                    <span class="focus-border"> <i></i> </span>
            </select>
    
            <select name="problema" class="label input-bordas" required>
            <option selected disabled>Selecione o problema</option>
                    <?php
                        $query = $conn->query("SELECT id_problema, tipo_problema FROM problema ORDER BY tipo_problema ASC");    
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach($registros as $option){
                            ?>
                                <option value ="<?php echo $option['tipo_problema']; ?>">
                                    <?php echo $option['tipo_problema']; ?>
                                </option>
                            <?php
                        }
                    ?>
                    <span class="focus-border"> <i></i> </span>
                </select>

                <select name="regiao" class="label input-bordas" required>
                <option selected disabled>Selecione o estado</option>
                    <?php
                        $query = $conn->query("SELECT id_regiao, estado, sigla FROM regiao_br ORDER BY estado ASC");     
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach($registros as $option){
                            ?>
                                <option value ="<?php echo $option['sigla']; ?>">
                                    <?php echo $option['sigla']; ?>
                                </option>
                            <?php
                        }
                    ?>
                </select>


                <label class="label">
                <textarea class="input-bordas" name="desc" rows="3" placeholder="Descrição"></textarea required>
                <span class="focus-border"> <i></i> </span>
                </label>


                <label class="label">
                <input type="date" class="input-bordas" name="date" placeholder="Data" required>
                <span class="focus-border"> <i></i></span>
                </label>
    
            <button class="button-form borda-inversa">Enviar</button>
        </form>  

      </div>



                <!-- FOOTER -->
      <div>
      <div class="footer-basic">
        <footer>
            <div class="social" style="margin-left: 45%;">
                <a href="https://www.instagram.com/leo.cortarelli/"><img src="./img/instagram.png" width="5%"></a>
                <a href="https://www.linkedin.com/in/leonardocortarelli/" style="padding-left: 20px;"><img src="./img/linkedin.png" width="5%"></a>
                <a href="https://github.com/LeoCortarelli" style="padding-left: 20px;"><img src="./img/github.png" width="5%"></a>   
            </div>
            <br>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="./opcoes/telaService.html">Services</a></li>
                <li class="list-inline-item"><a href="./opcoes/telaSobre.html">About</a></li>
                <li class="list-inline-item"><a href="./opcoes/telaTermos.html">Terms</a></li>
                <li class="list-inline-item"><a href="./opcoes/telaPoliticaPrivacy.html">Privacy Policy</a></li>
            </ul>
            <p class="copyright">Company LeoCortarelli © 2023</p>
        </footer>
    </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>