<?php
if (!isset($_SESSION)){
    session_start();
}
include("conexao.php");
ini_set('default_charset','UTF-8');

if(isset($_GET['nome'])){
    $nome = $_GET['nome'];
} else {
    $nome = 0;
}

if(isset($_GET['modelo'])){
    $modelo = $_GET['modelo'];
} else {
    $modelo = 0;
}

if(isset($_GET['consumo'])){
    $consumo = $_GET['consumo'];
} else {
    $consumo = 0;
}

if(isset($_GET['perfalha'])){
    $perfalha = $_GET['perfalha'];
} else {
    $perfalha = 0;
}

$queryCadastro = "INSERT INTO impressoras (marca , modelo , consumo, percentFalha) VALUES ('$nome','$modelo','$consumo', '$perfalha')";
mysqli_query($conn, $queryCadastro);

header("Location: ./cadastrarimpressora.php");