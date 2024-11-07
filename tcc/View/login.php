<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="image">
            <img src="https://cdn.gencraft.com/prod/user/18520623-5951-43ff-8116-cd4b5d150085/933d90b9-898a-4715-9784-5f9a7a3a2cb4/image/image0_0.jpg?Expires=1723322767&Signature=iTfkNX34DCzVduTmngZa3t0ssns34oIFGvJItPLk4BwYqcB45ERXseO9kQVZaG7E-jU5DMUQ50HSZQyfKBPxpLW--GrbjZLtmlWq9YomXDJXVuxABvxoW6SfgEJUoA-Er6vvho9WH3kVAI475uW4maqaimayr7jbvkQ86avOg77vRlXG2dML64fx1Nh77sCWBC4Y9yu6Lzv1Donq6nntepd7uqNU9FE~JB5VPbHjmZeJ94N~eWAK7R5uMUdOFb6A3wwdrlBpV0f9R5wJ7tjWZ-TxbwGcCZ4vYbINc8D-m0LopqZc3CG074~72dsVtDSU-HPARmQCDUPcVyW2kI4MAA__&Key-Pair-Id=K3RDDB1TZ8BHT8"/>
        </div>
        <div class="login">
            <header>
                <h1>Login</h1>
            </header>
            <main>
                <form method="post" action="autenticador.php">
                    <label>Usuário
                        <input name="user" type="text"/>
                    </label>
                    <label>Senha
                        <input name="senha" type="password"/>
                    </label>
                    <button type="submit">Entrar</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>