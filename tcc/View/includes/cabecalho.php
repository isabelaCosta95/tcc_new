<?php 
if(isset($_GET['sair'])){
    unset($_SESSION['usuario_login']);
    header("Location: login.php");
}

try {
    $mysql = new MySQL();
    $stmt = $mysql->prepare("SELECT nome FROM usuario WHERE id=:marcador_id");
    $stmt->execute(array('marcador_id' => $_SESSION['usuario_login']));
    $dados_do_usuario = $stmt->fetchObject();
} catch(Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Transportes</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .user-info {
            font-size: 0.9rem;
        }
        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <small>Sistema de Gerenciamento de Transportes</small>
            <div class="user-info">
                <a href="?sair=true" class="logout-btn">Sair</a>
            </div>
        </div>
    </header>
</body>
</html>
