<?php
include('../conexao/conexao.php');

$output = "";

if(isset($_POST['submit'])){
    $sql = 'SELECT * FROM usuario;';
    $result = $conn->query($sql);

    $output .= '
    <table class="table table-dark table-striped">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Usuario</th>
            <th scope="col">Problema</th>
            <th scope="col">Região</th>
            <th scope="col">Descricao</th>
            <th scope="col">Data</th>
        </tr>
    ';

    while($dados = mysqli_fetch_assoc($result)){
        $output .= '
            <tr>
            <td>'. $dados['nome'].'</td>
            <td>'. $dados['email'].'</td>
            <td>'. $dados['usuario'].'</td>
            <td>'. $dados['problema'].'</td>
            <td>'. $dados['regiao'].'</td>
            <td>'. $dados['descricao'].'</td>
            <td>'. $dados['data_reclama'].'</td>
            <tr>
        ';
    }
    $output .= '</table>';
    $output = "\xEF\xBB\xBF" . $output;

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=reports.xls');
    header('Cache-Control: max-age=0');
    echo $output;

}else{
    echo 'erro ao gerar Excel';
}



?>