<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniTelecon - Painel/Usuários</title>
</head>

<body>
    <?php
    // Inicie a sessão
    session_start();

    // Verifique se o usuário está logado e tem o nível de administrador
    if (isset($_SESSION['user']) && $_SESSION['user']['nivel'] === 'admin') {
        $isAdmin = true;
    } else {
        $isAdmin = false;
    }
    ?>
    <div class="container">
        <a href="cad_user.php?new=1<?php if ($isAdmin)
            echo '&admin=true'; ?>"> Cadastrar </a>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Nível</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (file_exists('user.json')) {
                    $arq = file_get_contents('user.json');
                    $arq = json_decode($arq, true);
                    foreach ($arq as $key => $user):
                        ?>
                        <tr>
                            <td>
                                <?php echo $user['nome'] ?>
                            </td>
                            <td>
                                <?php echo $user['login'] ?>
                            </td>
                            <td>
                                <?php echo $user['nivel'] ?>
                            </td>
                            <td>
                                <a href="upd_user.php?id=<?php echo $key ?>"> Update </a>
                                ||
                                <a href="del_user.php?id=<?php echo $key ?>"> Delete </a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>