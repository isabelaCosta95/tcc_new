<?php 
if(isset($_GET['sair'])){
    unset($_SESSION['usuario_login']);
    header("Location: /tcc/login");
    exit;
}


if(isset($_SESSION['usuario_login'])){
    try {
        $mysql = new MySQL();

        $stmt = $mysql->prepare("SELECT nome FROM usuario WHERE id=:marcador_id");
        $stmt->execute(array('marcador_id' => $_SESSION['usuario_login']));
        $dados_do_usuario = $stmt->fetchObject();

        if ($dados_do_usuario) {
            $nome_usuario = $dados_do_usuario->nome;
        } else {
            header("Location: /tcc/login");
            exit;
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
} else {
    header("Location: /tcc/login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/cabecalho.css">
    <title>Página de Cabeçalho</title>
</head>
<body>
    <header>
        <nav>
            <p>Bem-vindo, <?php echo $nome_usuario; ?>!</p>
            <a href="?sair=true">Sair</a>
        </nav>
    </header>
</body>
</html>
