<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/list.css">
    <link rel="stylesheet" href="../../css/pagina-principal">
    <title>UniTelecon - Painel/Usuários</title>
</head>

<body>
    <?php

    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['nivel'] === 'admin') {
        $isAdmin = true;
    } else {
        $isAdmin = false;
    }
    ?>
    <header id="topo">
        <nav class="container limitar-secao">
            <div class="topo-logo">
                <img src="../../assets/logo-icone.png" alt="logotipo" />
                <div>
                    <h1>AlfaTech</h1>
                    <p>Soluções em hospedagem</p>
                </div>
            </div>
            <div class="topo-links">
                <?php if ($isAdmin): ?>
                    <a href="../../index.php">INICIO</a>
                    <a href="../../tabela.php">PREÇOS</a>
                    <a href="./list_user.php">USUÁRIOS</a>
                    <a href="../sobre/cad_sobre.php">EDITAR</a>
                <?php endif; ?>

                <a href="../index.php"> LOGIN</a>
                <a href="./cad_user.php?new=1<?php if ($isAdmin)
                    echo '&admin=true'; ?>"> CADASTRO</a>

            </div>
        </nav>
    </header>

    <div class="container">
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
                                <a href="upd_user.php?id=<?php echo $key ?>"> <span class="uptade">Update</span> </a>
                                ||
                                <a href=""  onclick="confirmDelete(<?php echo $key ?>, '<?php echo $user['nome'] ?>')"> <span class="delete">Delete</span> </a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>

    </div>

    <script>
        
    </script>

<?php
        if (isset($_GET['delete'])) {
            $id = filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT);

            $arquivo = "user.json";
            if (file_exists($arquivo)) {
                $arq = file_get_contents($arquivo);
                $arq = json_decode($arq, true);

                if (isset($arq[$id])) {
                    unset($arq[$id]);

                    $arq = json_encode($arq);
                    file_put_contents($arquivo, $arq);

                    echo '<h3>Usuário excluído com sucesso!</h3>';
                    header("Refresh: 3, url=list_user.php");
                }
            }
        }
        ?>

        
    <script src="../../script/script.js"></script>
</body>

</html>