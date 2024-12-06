<?php
try {
    // Supondo que você tenha uma classe MySQL para conexão ao banco de dados
    $mysql = new MySQL();

    // A consulta SQL para verificar o usuário e senha
    $sql = "SELECT id, nome FROM usuario WHERE usuario=? AND senha=sha1(?)";

    $stmt = $mysql->prepare($sql);
    $stmt->bindValue(1, $_POST['user']);
    $stmt->bindValue(2, $_POST['senha']);

    // Executa a consulta
    $stmt->execute();

    // Obtém os dados do usuário
    $dados_do_usuario = $stmt->fetchObject();

    if ($dados_do_usuario) {
        // Se o usuário for encontrado, armazena o ID na sessão
        $_SESSION["usuario_login"] = $dados_do_usuario->id;

        // Redireciona para a página inicial
        header('Location: /tcc/'); // A página inicial
        exit;  // Garante que o código após o redirecionamento não seja executado
    } else {
        // Caso o login falhe, redireciona para a tela de login com a flag falhou=true
        header('Location: /tcc/login?falhou=true');
        exit;
    }
} catch (Exception $e) {
    // Caso ocorra algum erro durante a execução, exibe a mensagem de erro
    echo "Erro: " . $e->getMessage();
}
?>
