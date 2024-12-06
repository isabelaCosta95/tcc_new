<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>LOGIN</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #d3eed5;
        }

        img {
            width: 180px;
            height: auto;
        }

        .login {
            display: flex;
            flex-direction: row;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

        .informacoes {
            background-color: #28a745;
            width: 350px;
            border-radius: 15px 0 0 15px;
            text-align: center;
        }

        .formulario {
            border-radius: 0 15px 15px 0;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 500px;
            height: 500px;
        }

        .login-form {
            text-align: center;
        }

        h2 {
            margin-left: -80px;
            color: white;
        }

        .conta {
            margin: 0;
            color: #28a745;
        }

        .volta {
            margin-left: -100px;
        }

        p {
            margin-top: 5px;
            margin-left: -10px;
        }

        p,
        a {
            text-decoration: none;
            font-size: 12px;
            color: white;
        }

        .txt-conta {
            color: #a19e9e;
            margin: 0 0 50px 0;
        }

        .campos {
            margin: 15px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            width: 400px;
            border: none;
            background-color: #f3f3f3;
        }

        button {
            margin-top: 10px;
            border-radius: 35px;
            width: 180px;
            padding: 10px;
            color: white;
            font-weight: bold;
            background-color: #28a745;
            border: none;
        }

        .button-entrar {
            margin: 40px 0 20px 0;
            border-width: 3px;
            border-style: solid;
            border-color: white;
        }

        .button-cadastrar {
            border-width: 3px;
            border-style: solid;
        }
    </style>
</head>

<body>
    <section class="login" id="login-section">
        <div class="informacoes">
            <img src="/tcc/logo.png">
            <h2>Bem vindo</h2>
            <h2 class="volta">de volta!</h2>
            <p>Acesse sua conta agora mesmo</p>
            <button class="button-entrar" onclick="showLogin()">Entrar</button>
            <br>
            <a href="#">Esqueci minha senha</a>
        </div>
        <div class="formulario">
            <form class="login-form" action="/tcc/novo">
                <h2 class="conta">Crie sua Conta</h2>
                <p class="txt-conta">Preencha seus dados</p>
                <div class="campos">
                    <input type="text" id="username" name="username" placeholder="Email" required>
                </div>
                <div class="campos">
                    <input type="text" id="username" name="username" placeholder="Usuário" required>
                </div>
                <div class="campos">
                    <input type="password" id="password" name="password" placeholder="Senha" required>
                </div>
                <button class="button-cadastrar" type="submit">Cadastrar</button>
            </form>
        </div>
    </section>

    <script>
        function showLogin() {
            const loginSection = document.getElementById('login-section');
            loginSection.innerHTML = `
                <div class="informacoes">
                    <form method="post" action="/tcc/autenticador" style="margin-top: 150px;" autocomplete="off">
    <h2 style="color: white; margin-bottom: 10px; margin-left: 8px; text-align: center;">Login</h2>
    <div class="campo">
        <input type="text" id="user" name="user" placeholder="Usuário" required style="width: 250px; border-radius: 8px;" autocomplete="off">
    </div>
    <div class="campos">
        <input type="password" id="senha" name="senha" placeholder="Senha" required style="width: 250px; border-radius: 8px;" autocomplete="off">
    </div>
    <button class="button-entrar" type="submit">Entrar</button>
</form>

                    <br>
                    <a href="#">Esqueci minha senha</a>
                </div>
                <div class="formulario">
                    <img src="/tcc/logo.png">
                    <h2 class="conta">Bem vindo de volta!</h2>
                    <p class="txt-conta">Acesse sua conta agora mesmo</p>
                </div>
            `;
        }
    </script>
</body>

</html>