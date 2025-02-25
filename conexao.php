<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "dadoscadastrais";

    $conn = mysqli_connect($servidor,$usuario,$senha,$dbname);


    try {
        $pdo = new PDO("mysql:host=localhost;dbname=dadoscadastrais", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }