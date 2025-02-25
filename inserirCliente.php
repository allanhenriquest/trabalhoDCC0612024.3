<?php
if (!isset($_SESSION)){
    session_start();
}
include("conexao.php");
ini_set('default_charset','UTF-8');

if(isset($_GET['nome'])){
    $nome = $_GET['nome'];
} else {
    $nomee = 0;
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
} else {
    $email = 0;
}

if(isset($_GET['telefone'])){
    $telefone = $_GET['telefone'];
} else {
    $telefone = 0;
}

if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
} else {
    $tipo = 0;
}

$queryCadastro = "INSERT INTO clientes (nome , email , telefone, tipo) VALUES ('$nome','$email','$telefone', '$tipo')";
mysqli_query($conn, $queryCadastro);

header("Location: ./clientes.php");