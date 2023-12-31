<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/tabela.css"/>
    <title>AlfaTech - Tabela</title>
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

    <div id="conteudo-principal" class="limitar-secao">

      <table>
        <thead>
          <tr class="cabeçalho-da-tabela">
            <th></th>
            <th class="celula-cabeçalho">
              <p>PESSOAL</p>
              <h3>GRÁTIS</h3>
            </th>
            <th class="celula-cabeçalho">
              <p>PROFISSIONAL</p>
              <h3>R$29</h3>
            </th>
            <th class="celula-cabeçalho">
              <p>EMPRESARIAL</p>
              <h3>R$59</h3>
            </th>
            <th class="celula-cabeçalho">
              <p>BIG TECHS</p>
              <h3>R$99</h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="linhasDaTabela">
            <td>MONITORAMENTO DE REDE</td>
            <td>3 REDES</td>
            <td>10 REDES</td>
            <td>20 REDES</td>
            <td>50 REDES</td>
          </tr>
          <tr class="linhasDaTabela">
            <td>DASHBOARD</td>
            <td>1 DASHBOARD</td>
            <td>5 DASHBOARDs</td>
            <td>10 DASHBOARDS</td>
            <td>25 DASHBOARDS</td>
          </tr>
          <tr class="linhasDaTabela">
            <td>USUÁRIOS</td>
            <td>1 USUÁRIO</td>
            <td>5 USUÁRIOS</td>
            <td>10 USUÁRIOS</td>
            <td>25 USUÁRIOS</td>
          </tr>
          <tr class="linhasDaTabela">
            <td>RELATÓRIO DE ATUALIZAÇÃO</td>
            <td>TODA HORA</td>
            <td>A CADA 30 MINUTOS</td>
            <td>QUASE EM TEMPO REAL</td>
            <td>TEMPO REAL*</td>
          </tr>
          <tr class="linhasDaTabela">
            <td>RELATÓRIOS DE EMAILS</td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>TRANSAÇÕES ILIMITADAS</td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>RASTREADOR DE PAGAMENTO</td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>EXPORTAÇÃO DE DADOS</td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>CONVERSOR DE MOEDA</td>
            <td></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>ACESSO A API</td>
            <td></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>RESTRIÇÃO DE IP</td>
            <td></td>
            <td></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>FEED PERSONALIZADO</td>
            <td></td>
            <td></td>
            <td class="marcador-azul"></td>
            <td class="marcador-azul"></td>
          </tr>
          <tr class="linhasDaTabela">
            <td>LIMITE DE IMPORTAÇÃO DE DADOS</td>
            <td>ÚLTIMO ANO</td>
            <td>ÚLTIMOS 2 ANOS</td>
            <td>ÚLTIMOS 3 ANOS</td>
            <td>ÚLTIMOS 3 ANOS</td>
          </tr>
          <tr class="linhasDaTabela">
            <td>RETENÇÃO DE DADOS</td>
            <td>TEMPO DE VIDA</td>
            <td>TEMPO DE VIDA</td>
            <td>TEMPO DE VIDA</td>
            <td>TEMPO DE VIDA</td>
          </tr>
          <tr class="linhasDaTabela">
            <td>SUPORTE</td>
            <td>EMAIL</td>
            <td>EMAIL & CHAT</td>
            <td>EMAIL & CHAT</td>
            <td>EMAIL, CHAT & VOICE</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="rodape">
      <div class="rodape-logo">
        <img src="./assets/logo-icone-escuro.png" alt="logotipo" />
        <div>
          <h1>AlfaTech</h1>
          <p>Soluções em hospedagem</p>
        </div>
      </div>
      <div class="container-texto-rodape">
        <p>&copy; AlfaTech - Soluções em hospedagem - Todos os direitos reservados</p>
      </div>
    </div id="rodape">

    <div class="container-copyright">
      <p>Desenvolvido por <span>"nome do aluno"</span></p>
    </div>


</body>
</html>