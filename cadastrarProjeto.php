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
    height: 150vh;
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
            <h2 class="title">Cadastrar projeto</h2>
            <div class="form-container mt-4">
                <form action="insertprojeto.php" method="GET">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Digite o nome do projeto">
                    </div>
                    <div>
                        <label for="prioridade" class="form-label">Prioridade do projeto :</label>
                        <select class="form-select" name="prioridade" id="prioridade">
                            <option value="Baixa">Baixa</option>
                            <option value="Media">Media</option>
                            <option value="Alta">Alta</option>
                        </select>
                        <br>
                    </div>
                    <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente:</label>
                        <input type="text" class="form-control" id="cliente" name="cliente" required placeholder="Digite o cliente atendido">
                    </div>
                    <div class="mb-3">
                        <label for="peca" class="form-label">Peça a ser fabricada:</label>
                        <input type="text" class="form-control" id="peca" name="peca" required placeholder="Digite o nome da peça a ser fabricada">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link de referencia:</label>
                        <input type="text" class="form-control" id="link" name="link" required placeholder="Insira o link da peça a ser fabricada">
                    </div>
                    <div class="mb-3">
                        <label for="prazo" class="form-label">Prazo:</label>
                        <input type="text" class="form-control" id="prazo" name="prazo" required placeholder="Insira o prazo de fabricação da peça">
                    </div>
                    <div class="mb-3">
                        <label for="numfatiass" class="form-label">Numero de fatias da peça:</label>
                        <input type="text" class="form-control" id="numfatiass" name="numfatiass" required placeholder="Digite o numero de fatias da peça a ser fabricada">
                    </div>
                    <div class="mb-3">
                        <label for="durestima" class="form-label">Duração estimada:</label>
                        <input type="text" class="form-control" id="durestima" name="durestima" required placeholder="Digite o nome da peça a ser fabricada">
                    </div>
                    <div class="mb-3">
                        <label for="quanfila" class="form-label">Quantidade de filamento a ser usado:</label>
                        <input type="text" class="form-control" id="quanfila" name="quanfila" required placeholder="Digite o quatidade de filamento da peça a ser fabricada">
                    </div>
                    <div>
                        <label for="status" class="form-label">Status do projeto:</label>
                        <select class="form-select" name="status" id="status">
                            <option value="A inicia">A iniciar</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                        <br>
                    </div>
                    <div>
                        <label for="impre" class="form-label">Impressoora utilizada na peça:</label>
                        <select class="form-select" name="impre" id="impre">
                            <option value="Bambu P1s">Bambu P1s</option>
                            <option value="Ender 3 V3 KE">Ender 3 V3 KE</option>
                            <option value="Prusa Xl">Prusa XL</option>
                        </select>
                        <br>
                    </div>
                    <div>
                        <label for="corfila" class="form-label">Cor do filamento:</label>
                        <select class="form-select" name="corfila" id="corfila">
                            <option value="A">Azul</option>
                            <option value="P">Preto</option>
                            <option value="N">Natural</option>
                        </select>
                        <br>
                    </div>
                    <div class="mb-3">
                        <label for="pesofila" class="form-label">Peso total de filamento utilizado:</label>
                        <input type="text" class="form-control" id="pesofila" name="pesofila" required placeholder="Digite o peso de filamento da peça a ser fabricada">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </main>
    </div>
</div>

</body>
</html>
