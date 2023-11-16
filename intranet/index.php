<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>AlfaTech - Login</title>
</head>

<body>
    <main>
        <section class="limitar-secao">
            <div class="area-login">
                <div class="area-imagem">
                    <img src="../assets/imagem-banner.png" alt="fundo-image">
                </div>
                <div class="login">
                    <h2>AlfaTech - Login</h2>
                    <p>Não tem uma conta? <a href="user/cad_user.php" title="Entrar">Cadastre-se</a></p>
                    <form action="" method="post">
                        <label for="login">
                            Login <br>
                            <input type="text" name="login" id="login" placeholder="Digite seu Login">
                        </label>
                        <label for="password">
                            Password <br>
                            <input type="password" name="password" id="password" placeholder="Digite sua senha"
                                data-rules="required/min=8">
                        </label>
                        <input type="submit" value="Logar" name="cadastrar" class="btn">
                    </form>
                </div>
            </div>
        </section>
    </main>

</body>

</html>