<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci Minha Senha</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 20px;
        }
        .btn-back {
            margin-top: 20px;
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="card">
        
        <h3>Esqueci Minha Senha</h3>
        
        <!-- Aviso -->
        <div class="alert alert-warning" role="alert">
            Para redefinir sua senha entre em contato com o professor responsável. Caso queiraa agilizar o processo insira seu email abaixo.
        </div>
        <form>
            <input type="email" class="form-control mb-3" placeholder="Digite seu e-mail" required>
        </form>
        <!-- Botão de voltar -->
        <a href="index.php" class="btn btn-back btn-block">Voltar</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
