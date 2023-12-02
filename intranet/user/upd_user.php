<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <title>UniTelecom - Painel/Cad. User</title>
</head>

<body>


    <main>
        <section class="limitar-secao">
            <div class="area-login">
                <div class="area-imagem">
                    <img src="../../assets/imagem-banner.png" alt="fundo-image">
                </div>

                <div class="login">
                    <?php
                    session_start();

                    if (isset($_GET['admin']) && $_GET['admin'] === 'true') {
                        $isAdmin = true;
                    } else {
                        $isAdmin = false;
                    }
                    ?>

                    <?php

                    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if (file_exists("user.json")) {

                        if (isset($dados['update'])) {

                            unset($dados['update']);

                            $arq = file_get_contents("user.json");
                            $arq = json_decode($arq, true);

                            //CASO A SENHA ESTEJA VAZIA...
                            if (empty($dados['password'])) {
                                $dados['password'] = $arq[$id]['password'];
                            } else { // faz a criptografia
                                $dados['password'] = md5($dados['password']);
                            }


                            $arq[$id] = $dados;
                            $arq = json_encode($arq);
                            if (file_put_contents('user.json', $arq)) {
                                echo "<h1 class='titulo' style='color: green'> Dados atualizados com sucesso! </h1>";
                                header("Refresh: 3, url=list_user.php");
                            }

                        }


                        //LISTAR OS DADOS DO ARQUIVO...
                        $arq = file_get_contents("user.json");
                        $arq = json_decode($arq, true);
                        $user = $arq[$id];
                    }


                    ?>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <label for="nome">
                            Nome <br>
                            <input type="text" name="nome" id="nome" value="<?php echo $user['nome']; ?>">
                            <span id="nome-error" class="error-message"></span>
                        </label>
                        <br>
                        <label for="login">
                            Login <br>
                            <input type="text" name="login" id="login" value="<?php echo $user['login']; ?>">
                            <span id="login-error" class="error-message"></span>
                        </label>
                        <br>
                        <label for="password">
                            Password <br>
                            <input type="password" name="password" id="password" placeholder="Digite sua senha"
                                data-rules="required">
                            <span id="password-error" class="error-message"></span>
                        </label>
                        <br>
                        <label for="nivel" class="form-label">Nível de Usuário</label>
                        <select name="nivel" id="nivel" class="form-input">
                            <option value="0" selected disabled>Selecione um nível de usuário</option>
                            <option value="admin" <?php echo ($user['nivel'] == "usuario" ? "selected" : ""); ?>>Admin
                            </option>
                            <option value="gerente" <?php echo ($user['nivel'] == "gerente" ? "selected" : ""); ?>>
                                Gerente
                            </option>
                            <option value="usuario" <?php echo ($user['nivel'] == "usuario" ? "selected" : ""); ?>>
                                Usuário
                            </option>
                        </select>
                        <span id="nivel-error" class="error-message"></span>
                        <br>
                        <input type="submit" value="Update" name="update" class="btn">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../../script/script.js"></script>
</body>

</html>