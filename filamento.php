<?php
include("conexao.php");

// Simulação de sessão de usuário
session_start();
$usuario = $_SESSION['usuario'] ?? 'Usuário';

// Consulta ao banco de dados para buscar os filamentos
try {
    $stmt = $pdo->prepare("SELECT * FROM filamentos");
    $stmt->execute();
    $filamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar filamentos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt">
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
        .card {
            border-radius: 15px;
            background-color: #f1f1f1;
        }
        .btn-cadastrar {
            background-color: #007bff;
            color: white;
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
        <h2 class="text-primary">Lista de Filamentos</h2>
        <div class="d-flex justify-content-between">
            <a href="cadastrarFilamento.php" class="btn btn-primary">+ Cadastrar Filamento</a>
        </div>

        <!-- Lista de Filamentos -->
        <div class="mt-4">
            <?php if (!empty($filamentos)): ?>
                <?php foreach ($filamentos as $filamento): ?>
                    <div class="card mb-3 p-3">
                        <div class="impressora-info">
                            <p><strong class="destaque">Nome:</strong> <?php echo htmlspecialchars($filamento['nome']); ?></p>
                            <p><strong class="destaque">Cor:</strong> <?php echo htmlspecialchars($filamento['cor']); ?></p>
                            <p><strong class="destaque">Diâmetro:</strong> <?php echo htmlspecialchars($filamento['diametro']); ?></p>
                            <p><strong class="destaque">Densidade:</strong> <?php echo htmlspecialchars($filamento['densidade']); ?></p>
                            <p><strong class="destaque">Valor do Kilo:</strong> R$<?php echo htmlspecialchars($filamento['valor_kilo']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum filamento encontrado.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
