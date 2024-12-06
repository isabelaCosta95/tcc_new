<?php 

// Verifica se o usuário clicou no link de sair
if(isset($_GET['sair'])){
    unset($_SESSION['usuario_login']);
    header("Location: /tcc/login");
    exit;
}

// Verifica se o usuário está logado
if(isset($_SESSION['usuario_login'])){
    try {
        $mysql = new MySQL();
        // Prepara a consulta para buscar o nome do usuário
        $stmt = $mysql->prepare("SELECT nome FROM usuario WHERE id=:marcador_id");
        $stmt->execute(array('marcador_id' => $_SESSION['usuario_login']));
        $dados_do_usuario = $stmt->fetchObject();

        if ($dados_do_usuario) {
            $nome_usuario = $dados_do_usuario->nome; // Nome do usuário
        } else {
            // Se não encontrar o usuário, redireciona para login
            header("Location: /tcc/login");
            exit;
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
} else {
    // Se não estiver logado, redireciona para o login
    header("Location: /tcc/login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cabeçalho</title>
</head>
<body>
    <header>
        <nav>
            <p>Bem-vindo, <?php echo $nome_usuario; ?>!</p> <!-- Exibe o nome do usuário -->
            <a href="?sair=true">Sair</a> <!-- Link para sair -->
        </nav>
    </header>
</body>
</html>
