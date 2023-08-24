<?php
session_start();
include_once("recebimentoConexao.php");

$data = filter_input (INPUT_POST, 'data', FILTER_SANITIZE_ENCODED);
$filial = filter_input (INPUT_POST, 'filial', FILTER_SANITIZE_ADD_SLASHES);
$modelo = filter_input (INPUT_POST, 'modelo', FILTER_SANITIZE_ADD_SLASHES);
$reenvio = filter_input (INPUT_POST, 'reenvio', FILTER_SANITIZE_ADD_SLASHES);
$setor = filter_input (INPUT_POST, 'setor', FILTER_SANITIZE_ADD_SLASHES);

//echo "Data: $data <br>";
//echo "Filial: $filial <br>";
//echo "Modelo: $modelo <br>";
//echo "Reenvio: $reenvio <br>";
//echo "Setor: $setor <br>";


$resultado_usuario = "INSERT INTO recebimentodb (data, filial, modelo, reenvio, setor) VALUES ('$data', '$filial', '$modelo', '$reenvio', '$setor')";
$result_usuario = mysqli_query($link, $resultado_usuario);

if(mysqli_insert_id($link)){
    $_SESSION['msg'] = "<p style='color:red;'>:(</p>";
    header("Location: recebimentoCod.php");
}else{
    $_SESSION['msg'] = "<p style='color:green;'>:)</p>";
    header("Location: recebimentoCod.php");
}
?>