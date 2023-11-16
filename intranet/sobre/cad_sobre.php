<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="titulo">Sobre</h1>

    <?php
    $arquivo = "sobre.json";
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (isset($dados['cadastrar'])) {
        $img = $_FILES['sobre_img'];
        // VALIDAÇÃO....
        $tipo_img = mime_content_type($img['tmp_name']);
        $valid_img = [
            "image/jpg", "image/jpeg",
            "image/png", "image/gif"
        ];

        if (!in_array($tipo_img, $valid_img)) {
            echo "tipo de imagem inválida!!!";
            header("Refresh: 2, url=painel.php");
            exit();
        }

        $ext = strtolower(substr($img['name'], -4));
        $img_nome = uniqid() . $ext;
        $dados['sobre_img'] = $img_nome;
        unset($dados['cadastrar']);

        

        $dados = json_encode($dados);
        if (file_put_contents($arquivo, $dados)) {
            move_uploaded_file($img['tmp_name'], "../../img/{$img_nome}");
            echo "<h3> Cadastro do sobre realizado com sucesso!</h3>";
            header("Refresh: 2, url=list_sobre.php");
        }

    }

    if(file_exists($arquivo)){
        $arq = file_get_contents($arquivo);
        $arq = json_decode($arq, true);
    }
    else{
        $arq = array(
            "sobre_desc" => "",
            "sobre_img" => "logotipo.png",
        );
    }
    
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="sobre_desc" class="form-label">Descrição</label>
            <textarea rows="5" cols="50" name="sobre_desc" id="sobre_desc" class="form-input">
                <?php echo $arq['sobre_desc'] ?>
            </textarea>
        </div>

        <div class="form-group">
            <label for="sobre_img" class="form-label">Imagem Sobre</label>
            <input type="file" name="sobre_img" id="sobre_img" class="form-input">
        </div>

        <div>
            <img src="../../img/<?php echo $arq['sobre_img'] ?>" alt="Imagem do sobre!" width=200>
        </div>

        <input type="submit" value="Cadastrar" name="cadastrar">
    </form>

</body>

</html>