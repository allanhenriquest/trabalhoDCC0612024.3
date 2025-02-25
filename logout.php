<?php
// Inicia a sessão
include("conexao.php");
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Se a sessão usa cookies, remove o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroi a sessão
session_destroy();

// Limpa variáveis globais
foreach ($_REQUEST as $key => $value) {
    unset($_REQUEST[$key]);
}
foreach ($_GET as $key => $value) {
    unset($_GET[$key]);
}
foreach ($_POST as $key => $value) {
    unset($_POST[$key]);
}
foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', time() - 3600, '/');
}
foreach ($_FILES as $key => $value) {
    unset($_FILES[$key]);
}

// Redireciona para a página inicial
header("Location: ./index.php");
exit();
?>
