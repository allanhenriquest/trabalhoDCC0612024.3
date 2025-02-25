<?php
include("conexao.php");
// Simulação de sessão de usuário
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Impressora</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

/* Sidebar */
.sidebar {
    background-color: #2563eb;
    color: white;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
}

/* Ícone de usuário */
.user-icon {
    width: 80px;
    height: 80px;
    background-color: white;
    border-radius: 50%;
}

/* Botão Dashboard */
.btn-dashboard {
    background-color: white;
    color: #2563eb;
    font-weight: bold;
    border-radius: 10px;
    padding: 10px;
}

/* Botão de Logout */
.btn-logout {
    background-color: white;
    color: #2563eb;
    font-weight: bold;
    border-radius: 10px;
    padding: 10px;
}

/* Ícone de robô */
.robot-icon {
    width: 60px;
    height: 60px;
    background-color: white;
    border-radius: 50%;
    margin-top: 10px;
}

/* Conteúdo principal */
.title {
    color: #2563eb;
    font-weight: bold;
    font-size: 2rem;
}

.form-container {
    background-color: #f1f1f1;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
}

.btn-primary {
    background-color: #2563eb;
    border: none;
    width: 100%;
}

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-flex flex-column align-items-center justify-content-between sidebar p-3">
            <div class="w-100 text-center">
                <div class="user-section mb-4">
                    <div class="user-icon mx-auto"></div>
                    <p class="text-white mt-2">Bem-vindo,</p>
                </div>
                <a href="mainAluno.php"><button  class="btn btn-dashboard w-100 mb-4">🏠 Dashboard</button></a>
            </div>

            <div class="logout-section w-100 text-center">
                <button class="btn btn-logout w-100 mb-3">🚪 Log Out (Sair)</button>
                <div class="robot-icon mx-auto"></div>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 col-lg-10 p-5">
            <h2 class="title">Cadastrar Impressora</h2>
            <div class="form-container mt-4">
                <form action="insertimpressora.php" method="GET">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Marca:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite a marca da impressora">
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" required placeholder="Digite o modelo da impressora">
                    </div>
                    <div class="mb-3">
                        <label for="consumo" class="form-label">Consumo:</label>
                        <input type="text" class="form-control" id="consumo" name="consumo" required placeholder="Digite o consumo da impressora">
                    </div>
                    <div class="mb-3">
                        <label for="perfalha" class="form-label">Percentual de falha:</label>
                        <input type="text" class="form-control" id="perfalha" name="perfalha" required placeholder="Digite o percentual de falhas da impressora">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </main>
    </div>
</div>

</body>
</html>
