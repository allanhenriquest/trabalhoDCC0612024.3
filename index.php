<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LabMaker System</title>
  <!-- Importação do Bootstrap 5 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    body {
      height: 100vh;
      display: flex;
    }

    .left-panel {
      background-color: #fff;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .left-panel img {
      width: 80%;
      max-width: 300px;
      border-radius: 10px;
    }

    .logo {
      margin-top: 20px;
      width: 100px;
    }

    .right-panel {
      background-color: #1e74f0;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .form-control {
      background-color: transparent;
      border: 2px solid white;
      color: white;
      border-radius: 25px;
      padding: 12px;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .form-control:focus {
      background-color: transparent;
      color: white;
      border-color: #b3d1ff;
      box-shadow: none;
    }

    .btn-login {
      background-color: white;
      color: #1e74f0;
      border-radius: 25px;
      padding: 12px;
      font-size: 1.2em;
      transition: background-color 0.3s;
    }

    .btn-login:hover {
      background-color: #d9e8ff;
    }

    a {
      color: #b3d1ff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row h-100">
      <!-- Painel esquerdo -->
      <div class="col-md-4 left-panel d-none d-md-flex flex-column">
        <img src="./vendor/images/globoImpressoIndex.png" alt="Impressora 3D" />
        <img src="./vendor/images/LogoUfjf.png" alt="Logo UFJF" class="logo" />
      </div>

      <!-- Painel direito -->
      <div class="col-md-8 right-panel">
        <div class="w-75">
          <div class="text-center mb-4">
            <img src="./vendor/images/LabMakerSystemIndex.png" alt="LabMaker Logo" width="500" />
          </div>

          <!-- Formulário de Login -->
          <form action="./login.php" method="get">
            <div class="mb-3">
              <input
                type="email"
                id="email"
                name ="email"
                class="form-control"
                placeholder="E-mail"
                required
              />
            </div>
            <div class="mb-3">
              <input
                type="password"
                id="password"
                name = "password"
                class="form-control"
                placeholder="Senha"
                required
              />
            </div>
            <button type="submit" class="btn btn-login w-100">Log In</button>
            <div class="mt-3 text-center">
              <a href="EMS.php">Esqueci minha Senha</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts do Bootstrap -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  ></script>
</body>
</html>
