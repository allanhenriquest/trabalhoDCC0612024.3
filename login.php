<?php
if (!isset($_SESSION)){
    session_start();
}
include("conexao.php");
ini_set('default_charset','UTF-8');

if(isset($_GET['email'])){
    $email = $_GET['email'];
} else {
    $email = 0;
}

if(isset($_GET['password'])){
    $password = $_GET['password'];
} else {
    $password = 0;
}

$consUsuario = "SELECT *  FROM dadoscadastrais WHERE email = '$email' AND senha = '$password'"; 
$consultaUsuario = mysqli_query($conn , $consUsuario);
$resultadoConsultaUsuario = mysqli_fetch_assoc($consultaUsuario);

if($consultaUsuario->num_rows == 0) {
    header("Location: ./index.php");
   }

if($consultaUsuario->num_rows > 0 and $resultadoConsultaUsuario['tipo'] == 'A' ) {
    $GLOBALS["tipo"] == $resultadoConsultaUsuario['tipo'];    
    header("location: ./mainAluno.php");
   }

if($consultaUsuario->num_rows > 0 and $resultadoConsultaUsuario['tipo'] == 'P' ) {
    $GLOBALS["tipo"] == $resultadoConsultaUsuario['tipo'];
    header("location: ./mainProf.php");
   }
   