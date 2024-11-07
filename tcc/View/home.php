<?php

// if(!isset($_SESSION['usuario_login'])){
//     header("Location: login.php");
// }
// if(isset($_GET['sair'])){
//     unset($_SESSION['usuario_login']);
//     header("Location: login.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS - Sistema de Gestão Para Transporte</title>
</head>
<body>
    <div class="content">
        <?php include 'includes/cabecalho.php' ?>
        <?php include 'includes/menu.php' ?>
        <main>
            Tela inicial
        </main>
        <?php include 'includes/rodape.php' ?>
    </div>
</body>
</html>