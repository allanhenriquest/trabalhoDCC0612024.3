<?php
// Simulação de sessão de usuário
if (!isset($_SESSION)){
    session_start();
}
include("conexao.php");
ini_set('default_charset','UTF-8');
$usuario = $_SESSION['usuario'] ?? 'Usuário';
if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo'] == 'P'){
        header("location: ./mainProf.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #0d6efd;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .logout-btn {
            margin-top: auto;
            width: 100%;
        }
        .dashboard-container {
            flex-grow: 1;
            padding: 40px;
        }
        .dashboard-title {
            color: #0d6efd;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }
        .dashboard-title i {
            margin-right: 10px;
        }
        .btn-dashboard {
            width: 100%;
            padding: 20px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 10px;
        }
        .btn-dashboard i {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Bem-vindo,</h4>
        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
        <p><?php echo $usuario; ?></p>
        <a href="logout.php" class="btn btn-light logout-btn">Log Out</a>
    </div>
    <div class="dashboard-container">
        <div class="dashboard-title">
            <i class="bi bi-house-door-fill"></i> Meu Dashboard
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <a href="./clientes.php" class="btn btn-primary btn-dashboard"><i class="bi bi-people-fill"></i>Clientes</a>
            </div>
            <div class="col-md-4">
                <a href="./projetos.php" class="btn btn-info btn-dashboard"><i class="bi bi-gear-fill"></i>Projetos</a>
            </div>
            <div class="col-md-4">
                <a href="./dadosPessoais.php" class="btn btn-secondary btn-dashboard"><i class="bi bi-person-badge-fill"></i>Alterar Dados</a>
            </div>
            <div class="col-md-4">
                <a href="./nomomento.php" class="btn btn-dark btn-dashboard"><i class="bi bi-printer-fill"></i>Lista de Impressão</a>
            </div>
            <div class="col-md-4">
                <a href="./orcamento.php" class="btn btn-success btn-dashboard"><i class="bi bi-currency-dollar"></i>Elaborar Orçamento</a>
            </div>
            <div class="col-md-4">
                <a href="./impressoras.php" class="btn btn-warning btn-dashboard"><i class="bi bi-printer"></i>Impressoras</a>
            </div>
            <div class="col-md-4">
                <a href="./filamento" class="btn btn-danger btn-dashboard"><i class="bi bi-droplet-half"></i>Filamentos</a>
            </div>
        </div>
    </div>
</body>
</html>
