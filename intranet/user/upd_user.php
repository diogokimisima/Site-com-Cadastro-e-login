<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniTelecom - Painel/Cad. User</title>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Atualização de Usuários</h1>

        <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (file_exists("user.json")) {

            if (isset($dados['update'])) {

                unset($dados['update']);

                $arq = file_get_contents("user.json");
                $arq = json_decode($arq, true);

                //CASO A SENHA ESTEJA VAZIA...
                if(empty($dados['password'])){
                    $dados['password'] = $arq[$id]['password'];
                }
                else{// faz a criptografia
                    $dados['password'] = md5($dados['password']);
                }
                
                
                $arq[$id] = $dados;
                $arq = json_encode($arq);
                if(file_put_contents('user.json', $arq)){
                    echo "<h1 class='titulo'> Dados atualizados com sucesso! </h1>";
                    header("Refresh: 3, url=list_user.php");
                }

            }


            //LISTAR OS DADOS DO ARQUIVO...
            $arq = file_get_contents("user.json");
            $arq = json_decode($arq, true);
            $user = $arq[$id];
        }


        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $user['nome']; ?>" class="form-input">
            </div>

            <div class="form-group">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" id="login" value="<?php echo $user['login']; ?>" class="form-input">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>

            <div class="form-group">
                <label for="nivel" class="form-label">Nivel de Usuário</label>
                <select name="nivel" id="nivel" class="form-input">
                    <option value="0" selected disabled>Selecione um nível de usuário </option>
                    <option value="admin" <?php echo ($user['nivel'] == "admin" ? "selected" : ""); ?>> Admin </option>

                    <option value="gerente" <?php echo ($user['nivel'] == "gerente" ? "selected" : ""); ?>> Gerente </option>

                    <option value="usuario" <?php echo ($user['nivel'] == "usuario" ? "selected" : ""); ?>> Usuário </option>
                </select>
            </div>

            <input type="submit" value="Update" name="update" class="btn">
        </form>
    </div>
</body>

</html>