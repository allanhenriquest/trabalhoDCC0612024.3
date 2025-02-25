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

if(isset($_GET['cor'])){
    $cor = $_GET['cor'];
} else {
    $cor = 0;
}

if(isset($_GET['diametro'])){
    $diametro = $_GET['diametro'];
} else {
    $diametro = 0;
}

if(isset($_GET['densidade'])){
    $densidade = $_GET['densidade'];
} else {
    $densidade = 0;
}

if(isset($_GET['valor_kilo'])){
    $valor_kilo = $_GET['valor_kilo'];
} else {
    $valor_kilo = 0;
}

$queryCadastro = "INSERT INTO filamentos (nome , cor , diametro, densidade, valor_kilo) VALUES ('$nome','$cor','$diametro', '$densidade', '$valor_kilo')";
mysqli_query($conn, $queryCadastro);

header("Location: ./cadastrarFilamento.php");