<?php
include("conexao.php");

// Simulação de sessão de usuário
session_start();
$usuario = $_SESSION['usuario'] ?? 'Usuário';

// Consulta ao banco de dados para obter projetos em andamento
$sql = "SELECT * FROM projetos WHERE status = 'Em andamento'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Momento</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        .card {
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }
    
    </style>
</head>
<body>
<div class="sidebar">
        <h4>Bem-vindo,</h4>
        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
        <p><?php echo $usuario; ?></p>
        <a href="./mainAluno.php" class="btn btn-light"> <i class="bi bi-house-door"></i> Dashboard </a>
        <a href="logout.php" class="btn btn-light logout-btn">Log Out</a>
    </div>
    <div class="dashboard-container">
        <h2 class="text-primary">No Momento</h2>
        
        <?php while ($projeto = $result->fetch_assoc()) { ?>
            <div class='card'>
                <p><strong>Impressora:</strong> <?php echo $projeto['impressora']; ?></p>
                <p><strong>Projeto:</strong> <?php echo $projeto['nome']; ?></p>
                <p><strong>Prioridade:</strong> <?php echo $projeto['prazo']; ?></p>
                <p><strong>Duração estimada:</strong> <?php echo $projeto['duracaoEstimada']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
