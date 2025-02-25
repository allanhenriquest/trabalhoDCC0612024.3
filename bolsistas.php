<?php
session_start();
include("conexao.php"); // Certifique-se de que este arquivo define corretamente a variável $pdo

$usuario = $_SESSION['usuario'] ?? 'Usuário';

// Consulta ao banco de dados para buscar os bolsistas (apenas os do tipo 'A')
try {
    $stmt = $pdo->prepare("SELECT nome, email FROM dadoscadastrais WHERE tipo = 'A'");
    $stmt->execute();
    $bolsistas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar bolsistas: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bolsistas</title>
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
            justify-content: center;
        }
        .btn-save {
            background-color: #0d6efd;
            color: white;
            border-radius: 20px;
            padding: 10px 30px;
            border: none;
        }
        .btn-save:hover {
            background-color: #0b5ed7;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
            border-radius: 20px;
            padding: 10px 30px;
            border: none;
            margin-right: 10px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <div class="sidebar">
        <h4>Bem-vindo,</h4>
        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
        <p><?php echo htmlspecialchars($usuario); ?></p>
        <a href="./mainAluno.php" class="btn btn-light"> <i class="bi bi-house-door"></i> Dashboard </a>
        <a href="logout.php" class="btn btn-light logout-btn">Log Out</a>
    </div>
    
    <div class="dashboard-container">
        <h2>Lista de Bolsistas</h2> 
        <a href="./cadastroBolsista.php"><button class="btn btn-primary">+ Cadastrar Bolsista</button></a>
        <br><br>
        
        <!-- Lista de Bolsistas -->
        <?php if (!empty($bolsistas)): ?>
            <?php foreach($bolsistas as $bolsista): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>Nome:</strong> <?php echo htmlspecialchars($bolsista['nome']); ?></p>
                        <p><strong>E-mail:</strong> <?php echo htmlspecialchars($bolsista['email']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum bolsista encontrado.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
