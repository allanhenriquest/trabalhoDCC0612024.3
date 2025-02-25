<?php
session_start();
require_once('./vendor/tcpdf/tcpdf.php'); // Certifique-se de ter a biblioteca TCPDF

$usuario = $_SESSION['usuario'] ?? 'Usuário';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar dados do formulário
    $nome_projeto = $_POST['nome_projeto'] ?? '';
    $prazo = $_POST['prazo'] ?? '';
    $cliente = $_POST['cliente'] ?? '';
    $peca = $_POST['peca'] ?? '';
    $tipo_filamento = $_POST['tipo_filamento'] ?? '';
    $quantidade_filamento = $_POST['quantidade_filamento'] ?? '';
    $impressora = $_POST['impressora'] ?? '';
    $responsavel = 'Aline';
    $orcamento = $quantidade_filamento * 1.4;    
    // Criando um novo PDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Sistema de Orçamentos');
    $pdf->SetTitle('Orçamento de Impressão 3D');
    $pdf->SetMargins(15, 15, 15);
    $pdf->AddPage();
    
    // Conteúdo do PDF
    $html = "<h1>Orçamento de Impressão 3D</h1>";
    $html .= "<p><strong>Nome do Projeto:</strong> $nome_projeto</p>";
    $html .= "<p><strong>Prazo:</strong> $prazo</p>";
    $html .= "<p><strong>Cliente:</strong> $cliente</p>";
    $html .= "<p><strong>Responsável:</strong> $responsavel</p>";
    $html .= "<p><strong>Peça:</strong> $peca</p>";
    $html .= "<p><strong>Tipo de Filamento:</strong> $tipo_filamento</p>";
    $html .= "<p><strong>Quantidade de Filamento:</strong> $quantidade_filamento g</p>";
    $html .= "<p><strong>Impressora:</strong> $impressora</p>";
    $html .= "<p><strong>Orçamento base:</strong> $orcamento reais</p>";
    
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // Nome do arquivo PDF
    $pdfFileName = "orcamento_$nome_projeto.pdf";
    
    // Saída do PDF para download
    $pdf->Output($pdfFileName, 'D'); // 'D' força o download
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fazer Orçamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <h2 class="text-primary">Fazer Orçamento</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nome do Projeto:</label>
                <input type="text" name="nome_projeto" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prazo:</label>
                <input type="date" name="prazo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cliente:</label>
                <select name="cliente" class="form-select" required>
                    <option value="Cliente A">Cliente A</option>
                    <option value="Cliente B">Cliente B</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Peça:</label>
                <input type="text" name="peca" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de Filamento:</label>
                <select name="tipo_filamento" class="form-select" required>
                    <option value="PLA">PLA</option>
                    <option value="ABS">ABS</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantidade de Filamento (g):</label>
                <input type="number" step="0.01" name="quantidade_filamento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Impressora:</label>
                <select name="impressora" class="form-select" required>
                    <option value="Impressora 1">Impressora 1</option>
                    <option value="Impressora 2">Impressora 2</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Gerar PDF</button>
        </form>
    </div>
</body>
</html>
