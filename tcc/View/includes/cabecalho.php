<?php 
if (isset($_GET['sair'])) {
    unset($_SESSION['usuario_login']);
    header("Location: login.php");
}

try {
    $mysql = new MySQL();
    $stmt = $mysql->prepare("SELECT nome FROM usuario WHERE id=:marcador_id");
    $stmt->execute(array('marcador_id' => $_SESSION['usuario_login']));
    $dados_do_usuario = $stmt->fetchObject();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .header {
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
        }

        .header .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .header .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header class="header">
        <small>Sistema de Gerenciamento de Transportes</small>
        <div class="user-info">
            <a href="?sair=true" class="logout-btn">Sair</a>
        </div>
    </header>
</body>
</html>
