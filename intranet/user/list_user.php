<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniTelecon - Painel/Usuários</title>
</head>

<body>
    <div class="container">
        <a href="cad_user.php"> Cadastrar </a>
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

                    foreach ($arq as $key => $user) :
                ?>
                        <tr>
                            <td><?php echo $user['nome'] ?></td>
                            <td><?php echo $user['login'] ?></td>
                            <td><?php echo $user['nivel'] ?></td>
                            <td>
                                <a href="upd_user.php?id=<?php echo $key?>"> Update </a> 
                                || 
                                <a href="del_user.php?id=<?php echo $key?>"> Delete </a> 
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