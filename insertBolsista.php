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

if(isset($_GET['email'])){
    $email = $_GET['email'];
} else {
    $email = 0;
}

if(isset($_GET['senha'])){
    $senha = $_GET['senha'];
} else {
    $senha = 0;
}

$queryCadastro = "INSERT INTO dadosCadastrais (nome , email , senha, tipo) VALUES ('$nome','$email','$senha', 'A')";
mysqli_query($conn, $queryCadastro);

header("Location: ./bolsistas.php");