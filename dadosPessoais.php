<?php
include("conexao.php");
// Simulação de sessão de usuário
session_start();
$usuario = $_SESSION['usuario'] ?? 'Usuário';

// Processar envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novaSenha = $_POST['nova_senha'];
    
    // Aqui você deve salvar a nova senha no banco de dados
    // Exemplo fictício: salvarSenhaNoBanco($usuario, $novaSenha);
    
    $mensagem = 'Senha alterada com sucesso!';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
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
            justify-content: center;
        }
        .form-group label {
            font-weight: bold;
            color: #0d6efd;
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
        <p><?php echo $usuario; ?></p>
        <a href="./mainAluno.php" class="btn btn-light"> <i class="bi bi-house-door"></i> Dashboard </a>
        <a href="logout.php" class="btn btn-light logout-btn">Log Out</a>
    </div>
    <div class="dashboard-container">
        <div class="dashboard-title">Alterar Senha</div>
        <?php if (!empty($mensagem)) : ?>
            <div class="alert alert-success"> <?php echo $mensagem; ?> </div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3 form-group">
                <label for="novaSenha">Digite sua nova senha:</label>
                <input type="password" class="form-control" id="novaSenha" name="nova_senha" placeholder="Digite a senha" required>
            </div>
            <div class="button-container">
                <a href="./mainAluno.php" class="btn btn-back">Voltar</a>
                <button type="submit" class="btn btn-save">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
