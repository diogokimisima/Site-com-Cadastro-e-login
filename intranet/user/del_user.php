<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exclusão de Usuários</h1>
    <?php
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $op = filter_input(INPUT_GET, 'op', FILTER_DEFAULT);
    // var_dump($id, $op);

    $arquivo = "user.json";
    if (file_exists($arquivo)) {
        $arq = file_get_contents($arquivo);
        $arq = json_decode($arq, true);
        $nome = $arq[$id]['nome'];
    }

    if ($op == 's') {
       unset($arq[$id]);
       if( !in_array($id, $arq) ){
            $arq = json_encode($arq);
            file_put_contents($arquivo, $arq);

            echo '<h3>Usuário excluído com sucesso!</h3>';
            header("Refresh: 3, url=list_user.php");

       }
       
    }

    if ($op == 'n') {
        header("Location: list_user.php");
    }

    ?>

    <h3>Você deseja excluir o usuário <?php echo $nome?> ?</h3>
    <a href="del_user.php?id=<?php echo $id ?>&op=s"> Sim </a>
    <a href="del_user.php?id=<?php echo $id ?>&op=n"> Não </a>



</body>

</html>