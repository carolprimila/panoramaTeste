<?php
session_start();
include_once("envioConexao.php");

$data = filter_input (INPUT_POST, 'data', FILTER_SANITIZE_ENCODED);
$filial = filter_input (INPUT_POST, 'filial', FILTER_SANITIZE_ADD_SLASHES);
$modelo = filter_input (INPUT_POST, 'modelo', FILTER_SANITIZE_ADD_SLASHES);
$quantia = filter_input (INPUT_POST, 'quantia', FILTER_SANITIZE_NUMBER_INT);
$solicitante = filter_input (INPUT_POST, 'solicitante', FILTER_SANITIZE_ADD_SLASHES);
$setor = filter_input (INPUT_POST, 'setor', FILTER_SANITIZE_ADD_SLASHES);

//echo "Data: $data <br>";
//echo "Filial: $filial <br>";
//echo "Modelo: $modelo <br>";
//echo "Quantia: $quantia <br>";
//echo "Quem pediu: $solicitante <br>";
//echo "Setor: $setor <br>";


$resultado_usuario = "INSERT INTO enviodb (data, filial, modelo, quantia, solicitante, setor) VALUES ('$data', '$filial', '$modelo', '$quantia', '$solicitante', '$setor')";
$result_usuario  = mysqli_query($link, $resultado_usuario);

if(mysqli_insert_id($link)){
    $_SESSION['msg'] = "<p style='color:red;'>:(</p>";
    header("Location: envioCod.php");
}else{
    $_SESSION['msg'] = "<p style='color:green;'>:)</p>";
    header("Location: envioCod.php");
}
?>