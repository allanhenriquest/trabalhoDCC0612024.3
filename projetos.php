<?php
include("conexao.php");

// Simulação de sessão de usuário
session_start();
$usuario = $_SESSION['usuario'] ?? 'Usuário';

// Consulta ao banco de dados para buscar os projetos
try {
    $stmt = $pdo->prepare("SELECT * FROM projetos");
    $stmt->execute();
    $projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar projetos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Projetos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            height: flex;
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
            justify-content: center;
        }
        .btn-cadastrar {
            background-color: #1e64c8;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            float: right;
        }
        .main-content {
            flex-grow: 1;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .card {
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>Bem-vindo,</h4>
    <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
    <p><?php echo htmlspecialchars($usuario); ?></p>
    <a href="./mainAluno.php" class="btn btn-light"><i class="bi bi-house-door"></i> Dashboard</a>
    <a href="logout.php" class="btn btn-light logout-btn">Log Out</a>
</div>

<div class="dashboard-container">
    <div class="col-md-10 main-content">
        <h2>
            <i class="fas fa-users"></i> Lista de Projetos
            <a href="./cadastrarProjeto.php"><button class="btn btn-cadastrar">+ Cadastrar Projeto</button></a>
        </h2>
    </div>

    <!-- Lista de Projetos -->
    <?php if (!empty($projetos)): ?>
        <?php foreach ($projetos as $projeto): ?>
            <div class="card">
                <p><strong>Nome do Projeto:</strong> <?php echo htmlspecialchars($projeto['nome']); ?></p>
                <p><strong>Prioridade:</strong> <?php echo htmlspecialchars($projeto['prioridade']); ?></p>
                <p><strong>Cliente:</strong> <?php echo htmlspecialchars($projeto['cliente']); ?></p>
                <p><strong>Peça:</strong> <?php echo htmlspecialchars($projeto['peca']); ?></p>
                <p><strong>Link do Modelo:</strong> <?php echo htmlspecialchars($projeto['linkmodelo']); ?></p>
                <p><strong>Prazo:</strong> <?php echo htmlspecialchars($projeto['prazo']); ?></p>
                <p><strong>Número de Fatias:</strong> <?php echo htmlspecialchars($projeto['numFatias']); ?></p>
                <p><strong>Duração Total:</strong> <?php echo htmlspecialchars($projeto['duracaoEstimada']); ?></p>
                <p><strong>Quantidade de Filamento Usado (gramas):</strong> <?php echo htmlspecialchars($projeto['filamento']); ?></p>
                <p><strong>Cor de Filamento Usado:</strong> <?php echo htmlspecialchars($projeto['corfilamento']); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($projeto['status']); ?></p>
                <p><strong>Impressora:</strong> <?php echo htmlspecialchars($projeto['impressora']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum projeto cadastrado.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
