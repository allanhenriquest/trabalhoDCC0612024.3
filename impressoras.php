<?php
include("conexao.php");
$usuario = $_SESSION['usuario'] ?? 'Usuário';
// Consulta ao banco de dados para buscar as impressoras
try {
    $stmt = $pdo->prepare("SELECT * FROM impressoras");
    $stmt->execute();
    $impressoras = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar impressoras: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Impressoras</title>
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
            border-radius: 15px;
            background-color: #f1f1f1;
        }
        .btn-cadastrar {
            background-color: #007bff;
            color: white;
        }
        .cliente-info p {
            margin: 5px 0;
        }
        .tipo-fisica {
            color: blue;
        }
        .tipo-juridica {
            color: green;
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
            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <h2>
                    <br> 
                    <i class="fas fa-print"></i> Lista de Impressoras
                    <a href="cadastrarImpressora.php" class="btn btn-cadastrar">+ Cadastrar Impressora</a>
                </h2>
               

                <!-- Lista de Impressoras -->
                <?php if (!empty($impressoras)): ?>
                    <?php foreach ($impressoras as $impressora): ?>
                        <div class="card mb-3 p-3">
                            <div class="impressora-info">
                                <p><strong class="destaque">Modelo:</strong> <?php echo htmlspecialchars($impressora['modelo']); ?></p>
                                <p><strong class="destaque">Marca:</strong> <?php echo htmlspecialchars($impressora['marca']); ?></p>
                                <p><strong class="destaque">Consumo:</strong> <?php echo htmlspecialchars($impressora['consumo']); ?></p>
                                <p><strong class="destaque">Média de Falha:</strong> <?php echo htmlspecialchars($impressora['percentFalha']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma impressora cadastrada.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
