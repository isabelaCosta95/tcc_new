<?php
try {
    $mysql = new MySQL();

    $sql = "SELECT id, nome FROM usuario WHERE usuario=? AND senha=sha1(?)";

    $stmt = $mysql->prepare($sql);
    $stmt->bindValue(1, $_POST['user']);
    $stmt->bindValue(2, $_POST['senha']);

    $stmt->execute();

    $dados_do_usuario = $stmt->fetchObject();

    if ($dados_do_usuario) {
        $_SESSION["usuario_login"] = $dados_do_usuario->id;

        header('Location: /tcc/');
        exit;
    } else {
        header('Location: /tcc/login?falhou=true');
        exit;
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
