<?php ?>
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

        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f3f3f3;
        }

        img{
            width: 180px;
            height: auto;
        }

        .login{
            display:flex;
            flex-direction:row;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

        .informacoes{
            background-color: #28a745;
            width: 350px;
            border-radius: 15px 0 0 15px;
            text-align: center;
        }

        .formulario{
            border-radius: 0 15px 15px 0;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 500px;
            height: 500px;
        }

        .login-form{
            text-align: center;
        }

        h2{
            margin-left: -80px;
            color: white;
        }

        .conta{
            margin: 0;
            color: #28a745;
        }

        .volta{
            margin-left: -100px;
        }

        p{
            margin-top: 5px;
            margin-left: -10px;

        }

        p, a{
            text-decoration: none;
            font-size: 12px;
            color: white;
        }

        .txt-conta{
            color:#a19e9e;
            margin:  0 0 50px 0;

        }

        .campos{
            margin: 15px;
        }

        input[type="text"], input[type="password"]{
            padding: 10px;
            width: 400px;
            border:none;
            background-color: #f3f3f3;
        }

        button{
            margin-top: 10px;
            border-radius: 35px;
            width: 180px;
            padding: 10px;
            color: white;
            font-weight: bold;
            background-color: #28a745;
            border: none;
        }

        .button-entrar{
            margin: 40px 0 20px 0;
            border-width: 3px;
            border-style: solid; 
            border-color: black;
            border-color: white;

        }

        .button-cadastrar{
            border-width: 3px;
            border-style: solid; 
        }

    </style>
</head>

<body>
<section class="login">
<div class="informacoes">
            <img src="logo.png">
            <h2>Bem vindo</h2>
            <h2 class="volta">de volta!</h2>
            <p>Acesse sua conta agora mesmo</p>
            <button class="button-entrar" type="submit">Entrar</button>
            <br>
            <a href="#">Esqueci minha senha</a>
        </div>
        <div class="formulario">
            <form class="login-form">
                
            </form>

        </div>

</section>





    <div class="container">
        <div class="image">
            <img src="https://cdn.gencraft.com/prod/user/18520623-5951-43ff-8116-cd4b5d150085/933d90b9-898a-4715-9784-5f9a7a3a2cb4/image/image0_0.jpg?Expires=1723322767&Signature=iTfkNX34DCzVduTmngZa3t0ssns34oIFGvJItPLk4BwYqcB45ERXseO9kQVZaG7E-jU5DMUQ50HSZQyfKBPxpLW--GrbjZLtmlWq9YomXDJXVuxABvxoW6SfgEJUoA-Er6vvho9WH3kVAI475uW4maqaimayr7jbvkQ86avOg77vRlXG2dML64fx1Nh77sCWBC4Y9yu6Lzv1Donq6nntepd7uqNU9FE~JB5VPbHjmZeJ94N~eWAK7R5uMUdOFb6A3wwdrlBpV0f9R5wJ7tjWZ-TxbwGcCZ4vYbINc8D-m0LopqZc3CG074~72dsVtDSU-HPARmQCDUPcVyW2kI4MAA__&Key-Pair-Id=K3RDDB1TZ8BHT8" />
        </div>
        <div class="login">
            <header>
                <h1>Login</h1>
            </header>
            <main>
                <form method="post" action="/tcc/autenticador">
                    <label>Usuário
                        <input name="user" type="text" required />
                    </label>
                    <label>Senha
                        <input name="senha" type="password" required />
                    </label>
                    <button type="submit">Entrar</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>