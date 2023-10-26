<?php
session_start();
include_once("ligacoesConexao.php");

$data = filter_input (INPUT_POST, 'data', FILTER_SANITIZE_ENCODED);
$filial = filter_input (INPUT_POST, 'filial', FILTER_SANITIZE_ADD_SLASHES);
$precisa = filter_input (INPUT_POST, 'precisa', FILTER_SANITIZE_ADD_SLASHES);
$quem = filter_input (INPUT_POST, 'quem', FILTER_SANITIZE_ADD_SLASHES);

//echo "Data: $data <br>";
//echo "Filial: $filial <br>";
//echo "Precisa: $precisa <br>";
//echo "Quem: $quem <br>";

$resultado_usuario = "INSERT INTO ligacoesdb (data, filial, precisa, quem) VALUES ('$data', '$filial', '$precisa', '$quem')";
$result_usuario  = mysqli_query($link, $resultado_usuario);

if(mysqli_insert_id($link)){
    $_SESSION['msg'] = "<p style='color:red;'>:(</p>";
    header("Location: ligacoesCod.php");
}else{
    $_SESSION['msg'] = "<p style='color:green;'>:)</p>";
    header("Location: ligacoesCod.php");
}
?>