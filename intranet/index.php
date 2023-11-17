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
                            <input type="password" name="password" id="password" placeholder="Digite sua senha">
                        </label>
                        <input type="submit" value="Logar" name="cadastrar" class="btn">
                        <?php

                        session_start(); 
                        
                        // Verifica se o formulário foi enviado
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
                            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                            // Verifica se os campos de login e senha estão preenchidos
                            if (!empty($login) && !empty($password)) {
                                // Lógica para verificar as credenciais
                                $arquivo = "user/user.json";

                                if (file_exists($arquivo)) {
                                    $arq = file_get_contents($arquivo);
                                    $arq = json_decode($arq, true);

                                    foreach ($arq as $user) {
                                        if ($user['login'] == $login && md5($password) == $user['password']) {
                                            // Credenciais válidas
                                            if ($user['nivel'] == 'admin') {
                                                $_SESSION['user'] = $user;
                                                echo "<h1 style='color: green'> Login como ADMIN</h1>";
                                                header("Refresh: 2, url=../index.php"); 
                                                exit();

                                            } else if($user['nivel'] == 'usuario'){
                                                $_SESSION['user'] = $user;
                                                echo "<h1 style='color: green'> Login como USUÁRIO</h1>";
                                                header("Refresh: 2, url=../index.php"); 
                                                exit();

                                            } else {
                                                $_SESSION['user'] = $user;
                                                echo "<h1 style='color: green'> Login como GERENTE</h1>";
                                                header("Refresh: 2, url=../index.php"); 
                                                exit();

                                            }
                                        }
                                    }
                                    // Se chegou aqui, as credenciais são inválidas
                                    echo "<p style='color: red;'>Credenciais inválidas. Tente novamente.</p>";
                                } else {
                                    echo "<p style='color: red;'>Erro ao verificar as credenciais.</p>";
                                }
                            } else {
                                echo "<p style='color: red;'>Preencha todos os campos.</p>";
                            }
                        }
                        ?>


                    </form>
                </div>
            </div>
        </section>
    </main>

</body>

</html>