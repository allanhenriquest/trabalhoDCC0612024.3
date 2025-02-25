<?php
include("conexao.php");

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
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #007bff;
            color: white;
            height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 15px 0;
            text-decoration: none;
        }
        .btn-dashboard {
            background-color: #0056b3;
            color: white;
        }
        .main-content {
            padding: 30px;
        }
        .card {
            border-radius: 15px;
            background-color: #f1f1f1;
        }
        .btn-cadastrar {
            background-color: #007bff;
            color: white;
        }
        .impressora-info p {
            margin: 5px 0;
        }
        .destaque {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div>
                    <h5>Bem-vindo,</h5>
                    <a href="#" class="btn btn-dashboard">Dashboard</a>
                </div>
                <a href="#" class="btn btn-danger mt-4">Log Out | Sair</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <h2>
                    <i class="fas fa-print"></i> Lista de Impressoras
                    <a href="cadastrarImpressora.php" class="btn btn-cadastrar">+ Cadastrar Impressora</a>
                </h2>
                <input type="text" class="form-control my-3" placeholder="Procure Pelo Modelo">

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
