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

if(isset($_GET['prioridade'])){
    $prioridade = $_GET['prioridade'];
} else {
    $prioridade = 0;
}

if(isset($_GET['cliente'])){
    $cliente = $_GET['cliente'];
} else {
    $cliente = 0;
}

if(isset($_GET['peca'])){
    $peca = $_GET['peca'];
} else {
    $peca = 0;
}
if(isset($_GET['link'])){
    $link = $_GET['link'];
} else {
    $link = 0;
}

if(isset($_GET['prazo'])){
    $prazo = $_GET['prazo'];
} else {
    $prazo = 0;
}


if(isset($_GET['numfatiass'])){
    $numfatiass = $_GET['numfatiass'];
} else {
    $numfatiass = 0;
}

if(isset($_GET['durestima'])){
    $durestima = $_GET['durestima'];
} else {
    $durestima = 0;
}

if(isset($_GET['quanfila'])){
    $quanfila = $_GET['quanfila'];
} else {
    $quanfila = 0;
}

if(isset($_GET['status'])){
    $status = $_GET['status'];
} else {
    $status = 0;
}

if(isset($_GET['impre'])){
    $impre = $_GET['impre'];
} else {
    $impre = 0;
}

if(isset($_GET['corfila'])){
    $corfila = $_GET['corfila'];
} else {
    $corfila = 0;
}

if(isset($_GET['pesousado'])){
    $pesousado = $_GET['pesousado'];
} else {
    $pesousado = 0;
}


$queryCadastro = "INSERT INTO projetos (nome , prioridade , cliente, peca,linkmodelo,prazo,numFatias,duracaoEstimada,filamento,status,impressora,corfilamento,pesousado) VALUES ('$nome','$prioridade','$cliente','$peca','$link','$prazo','$numfatiass','$durestima','$quanfila','$status','$impre','$corfila', '$pesousado')";
mysqli_query($conn, $queryCadastro);

header("Location: ./cadastrarProjeto.php");