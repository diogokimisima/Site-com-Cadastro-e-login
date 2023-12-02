<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/pagina-principal.css">
  <title>AlfaTech</title>

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
        <img src="./assets/logo-icone.png" alt="logotipo" />
        <div>
          <h1>AlfaTech</h1>
          <p>Soluções em hospedagem</p>
        </div>
      </div>
      <div class="topo-links">
        <a href="./index.php">INICIO</a>
        <!-- <a href="#informacoes">INFORMAÇÕES</a>
        <a href="#planos">PLANOS</a> -->
        <a href="tabela.php">PREÇOS</a>
        <!-- <a href="#contato">CONTATO</a> -->
        <?php if ($isAdmin): ?>
          <a href="intranet/user/list_user.php">USUÁRIOS</a>
          <a href="intranet/sobre/cad_sobre.php">EDITAR</a>
        <?php endif; ?>

        <a href="intranet/index.php"> LOGIN</a>
        <a href="intranet/user/cad_user.php?new=1<?php if ($isAdmin)
          echo '&admin=true'; ?>"> CADASTRO</a>

      </div>
    </nav>
  </header>

  <main id="conteudo-principal">
    <section id="banner" class="secao-banner">
      <div class="container-banner">
        <div class="container-texto-banner">
          <p>Simples - Fácil de usar - 10x mais rápido!</p>
          <h2>O melhor serviço de hospedagem na web para o seu site.</h2>
          <p>
            Obtenha a melhor velocidade para o seu site. Não perca mais clientes
            por causa de lentidão na sua hospedagem.
          </p>
        </div>
        <img src="./assets/imagem-banner.png" alt="banner" />
      </div>
    </section>

    <section id="primeiro-anuncio" class="secao-primeiro-anuncio">
      <div class="container limitar-secao">
        <div>
          <h2>Hospede o seu site por apenas R$29 por mês</h2>
          <p>
            Também temos planos gratuitos. Adquira já o seu.
          </p>
        </div>
        <a href="tabela.php">
          TABELA DE PREÇOS
        </a>
      </div>
    </section>

    <section id="informacoes" class="secao-informacoes">
      <h2>
        Existem diversos serviços de hospedagem de sites. Porque você deve <span>nos escolher?</span>
      </h2>
      <div class="container-informacoes limitar-secao">
      <?php
                $arquivo = "intranet/sobre/sobre.json";
                if(file_exists($arquivo)){
                    $arq = file_get_contents($arquivo);
                    $arq = json_decode($arq, true);
                }
            ?>
        <div>
          <img src="./assets/icone-engrenagens.png" alt="ícone" />
          <h3>Facilmente configurável em plataformas CMS populares - Wordpress,
            Joomia...</h3>
        </div>
        <div>
          <img src="./assets/cloud-icone.png" alt="ícone" />
          <h3>Serviços que operam 100% do tempo para manter o seu site online...</h3>
        </div>
        <div>
          <!-- <img src="./assets/icone-suporte.png" alt="ícone" />
          <h3>Suporte 24/7</h3>
          <p>
            Suporte altamente treinado e especializado em soluções de Cloud...
          </p> -->
          <img src="assets/<?php echo $arq['sobre_img'] ?>" alt="ícone" />
          <h3>
          <?php echo $arq['sobre_desc'] ?>
          </h3>
        </div>
      </div>
    </section>

    <section id="planos" class="secao-tabela-de-planos">
      <h2 class="limitar-secao">Pague <span>somente</span> pelo que for usar. Sem cobranças adicionais!</h2>
      <table class="tabela">
        <thead>
          <tr>
            <th>
              <div class="celula-cabeçalho">
                <h3>PESSOAL</h3>
                <img src="./assets/pessoal-icone.png" alt="ícone">
                <small>Indicado para uso pessoal</small>
              </div>
            </th>
            <th>
              <div class="celula-cabeçalho">
                <h3>PROFISSIONAL</h3>
                <img src="./assets/equipe-icone.png" alt="ícone">
                <small>Indicado para profissionais de T.I</small>
              </div>
            </th>
            <th>
              <div class="celula-cabeçalho">
                <h3>EMPRESARIAL</h3>
                <img src="./assets/empresa-icone.png" alt="ícone">
                <small>Indicado para empresas</small>
              </div>
            </th>
            <th>
              <div class="celula-cabeçalho">
                <h3>BIG TECHS</h3>
                <img src="./assets/big-tech.png" alt="ícone">
                <small>Indicado para grandes empresas</small>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="linhas-da-tabela">
            <td>1 usuário</td>
            <td>10 usuários</td>
            <td>25 usuários</td>
            <td>50 usuários</td>
          </tr>
          <tr class="linhas-da-tabela">
            <td>1 domínio grátis</td>
            <td>2 domínios grátis</td>
            <td>2 domínios gratis</td>
            <td>3 domínios grátis</td>
          </tr>
          <tr class="linhas-da-tabela">
            <td>200GB SSD espaço</td>
            <td>500GB SSD espaço</td>
            <td>1TB SSD espaço</td>
            <td>2TB SSD espaço</td>
          </tr>
          <tr class="linhas-da-tabela">
            <td>Ofertas especiais</td>
            <td>Ofertas especiais</td>
            <td>Ofertas especiais</td>
            <td>Ofertas especiais</td>
          </tr>
          <tr class="linhas-da-tabela">
            <td>Suporte limitado</td>
            <td>Suporte ilimitado</td>
            <td>Suporte ilimitado</td>
            <td>Suporte ilimitado</td>
          </tr>
        </tbody>
      </table>
    </section>

    <section id="segundo-anuncio" class="secao-segundo-anuncio">
      <div class="container limitar-secao">
        <h2>Mais de 20.000 pessoas confiam na Spark! Seja um deles você também!</h2>
        <a href="tabela.php">
          TABELA DE PREÇOS
        </a>
      </div>
    </section>

    <footer id="rodape">
      <div class="rodape-logo">
        <img src="./assets/logo-icone.png" alt="logotipo" />
        <div>
          <h1>AlfaTech</h1>
          <p>Soluções em hospedagem</p>
        </div>
      </div>
      <div id="contato" class="container-texto-rodape">
        <p>Telefone & Whatsapp: (21) 99999-5555</p>
        <p>E-mail: suporte@alfatech.com</p>
        <p>Endereço: Av Ayrton Senna, 3000 - Barra da Tijuca - Rio de Janeiro</p>
        <p>&copy; AlfaTech - Soluções em hospedagem - Todos os direitos reservados</p>
      </div>
    </footer>

    <div class="container-copyright">
      <p>Desenvolvido por <span>Diogo kimisima</span></p>
    </div>

  </main>

 
</body>

</html>