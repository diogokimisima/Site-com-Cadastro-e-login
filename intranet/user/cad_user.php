<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <title>AlfaTech - Cadastrar</title>
</head>

<body>
    <main>
        <section class="limitar-secao">
            <div class="area-login">
                <div class="area-imagem">
                    <img src="../../assets/imagem-banner.png" alt="fundo-image">
                </div>
                <div class="login">
                    <h2>AlfaTech - Cadastrar</h2>
                    <p>Já tem uma conta? <a href="../index.php" title="Entrar">Logar</a></p>

                    <?php
                    $new = filter_input(INPUT_GET, 'new', FILTER_VALIDATE_INT);
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if (isset($dados['cadastrar'])):

                        if (in_array("", $dados)) {
                            echo "<h1> Todos os campos devem ser preenchidos!</h1>";
                            header("Refresh: 2,  url=cad_user.php");
                            exit();
                        }

                        $dados['password'] = md5($dados['password']);
                        unset($dados['cadastrar']);

                        $arquivo = "user.json";

                        if (file_exists($arquivo)) {
                            $arq = file_get_contents($arquivo);
                            $arq = json_decode($arq, true);
                            array_push($arq, $dados);

                            $arq = json_encode($arq);
                            if (file_put_contents($arquivo, $arq)) {
                                echo "<h1 class='titulo'> Cadastro realizado com sucesso!</h1>";
                                if (isset($new)) {
                                    header("Refresh: 2, url=../index.php");
                                } else {
                                    header("Refresh: 2, url=list_user.php");
                                }
                            }
                        } else {
                            $dados = array($dados);
                            $dados = json_encode($dados);
                            if (file_put_contents($arquivo, $dados)) {
                                echo "<h1 class='titulo'> Cadastro realizado com sucesso!</h1>";
                                if (isset($new)) {
                                    header("Refresh: 2, url=../index.php");
                                } else {
                                    header("Refresh: 2, url=list_user.php");
                                }
                            }
                        }
                    endif;

                    ?>

                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <label for="nome">
                            Nome <br>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu Nome">
                            <span id="nome-error" class="error-message"></span>
                        </label>
                        <br>
                        <label for="login">
                            Login <br>
                            <input type="text" name="login" id="login" placeholder="Digite seu Login">
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
                            <option value="0" selected disabled>Selecione um nível de usuário </option>
                            <option value="admin"> Admin </option>
                            <option value="gerente"> Gerente </option>
                            <option value="usuario"> Usuário </option>
                        </select>
                        <span id="nivel-error" class="error-message"></span>
                        <br>
                        <input type="submit" value="Cadastrar" name="cadastrar" class="btn">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../../script/script.js"></script>
</body>

</html>