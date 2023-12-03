<?php session_start();
include_once("config.php");
    //print_r($_SESSION);
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['$senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: erro.php');
    } 

    $logado = $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/442fedf347.js" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telecall</title>
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

</head>
<body>
<nav id="navbar1">
    <div id="navbar-container1">
        <a href="home_comum.php"><img src="../imagens/logo-hdr.png" alt="telecall" width="200px" maxwidht="200px"></a>
        <div id="navbar-items1">
            <div class="btn-group">
            <a href="perfil_comum.php" class="btn btn sm btn-danger "><i class="bi bi-person-fill"></i><?php echo "$logado" ?></a>
                <a href="logout.php" class="btn btn sm btn-danger ">Sair</a>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg fw-semibold">
    <div class="container-fluid navegacao1">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="perfil_comum.php">Meu Perfil</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="log_comum.php">Painel de Log</a></li>
            <body data-bs-theme="light">
                <div class="form-check form-switch mx-4">
                    <input class="btn-dark form-check-input p-2" type="checkbox" role="switch" id="flexSwitchCheckChecked"onclick="myFunction()" checked/><i class="bi bi-brightness-alt-high"></i></i></i>
                </div>
            </ul>  
        </div>
    </div>
</nav>





<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../imagens/1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../imagens/2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../imagens/3.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<header class="py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder mb-2">Soluções inteligentes para sua empresa.</h1>
                    <p class="lead mb-4">Internet, Telefonia, Mobilidade e Mais!</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#quemsomos">Veja Mais</a>
                        <a class="btn btn-outline-danger btn-lg px-4" href="novaconta.php">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<a name="quemsomos">
    <section class="card">
        <div class="form-header"><h1>Quem Somos</h1></div>
        <p>A Telecall é uma operadora de telecomunicações brasileira que 
        oferece a seus clientes o mais alto padrão de qualidade, 
        velocidade e acessibilidade em soluções de comunicação. 
        Serviços que incluem uma ampla gama de valores agregados, 
        oferecendo aos clientes operações mais produtivas, inovadoras e eficazes. 
        Com mais de 20 anos de experiência na indústria global,
         a Telecall hoje é sinônimo de qualidade e eficiência.</p>
         <div class="cardtell"><img src="../imagens/telecall_logo.png" alt="" width="300px" height="300px"></div>
    </section>
        </a>
    <br><br><br>

        <!-- Serviços -->
<div class="services pt-5">
    <div class="row text-center text-body-emphasis">
                <h1>Nossos Serviços</h1>
    </div>
    <p class="lead mb-4 text-center">Temos o melhor para oferecer!</p>

        <div class="row justify-content-center p-3 mt-5 mb-5 gap-3">

            <!-- 2FA -->
            <div class="card card-hover bg-body d-flex flex-column justify-content-between col-lg-4 col-xxl-2 col-sm-12 p-3 rounded-5"
                    style="--bs-bg-opacity: .4;">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>2FA</h3>
                        <i class="bi bi-shield-lock-fill fa-2xl" style="color: #c91313;"></i>
                    </div>
                    <p class="fw-bold opacity-75">
                        Sua autenticação de dois fatores.
                    </p>
                    <!-- Botão de abertura do modal para 2FA -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal2fa">
                        VEJA MAIS
                    </button>

                    <!-- Modal para 2FA -->
                    <div class="modal fade" id="modal2fa" tabindex="-1" aria-labelledby="modal2faLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modal2faLabel">2FA</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <h4>Autenticação de Dois Fatores</h4><br>
                        <p>
                            O 2FA é um procedimento de segurança que garante que serão
                            necessários 2 fatores únicos para liberação de uma ação. O
                            primeiro fator é a senha que o usuário e o segundo pode ser
                            autenticado via token, via detecção de impressão digital,
                            reconhecimento facial, código enviado via sms, entre outros.
                        </p><br>
                        <h4>O 2FA permite que você:</h4>
                        <ul class="ul-cpas">
                            <li>Envie uma senha via SMS, voz ou e-mail para autenticação do usuário.</li>
                            <li>Adicione uma camada extra de segurança além da senha pessoal.</li>
                            <li>Ofereça maior segurança para usuários.</li><br>
                        </ul>
                        <h2>Fortaleça a estratégia de segurança de seu negócio.</h2><br>
                        <p>
                            Adicionar um número de telefone de recuperação a uma
                            conta individual pode bloquear até:
                        </p>
                        <ul class="ul-cpas">
                            <li><div class="num-perso">100%</div> dos bots automatizados,</li>
                            <li><div class="num-perso">99%</div> dos ataques de phishing em massa,</li>
                            <li>e <div class="num-perso">66%</div> dos ataques direcionados.</li>
                        </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Numero Máscara -->
                <div class="card card-hover bg-body d-flex flex-column justify-content-between col-lg-4 col-xxl-2 col-sm-12 p-3 rounded-5"
                    style="--bs-bg-opacity: .4;">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Número Máscara</h3>
                        <div class="modal-dialog modal-dialog-scrollable">
                    </div>      
                        <i class="fa-solid fa-user-ninja fa-2xl"style="color: #c91313;"></i>
                    </div>

                    <p class="fw-bold opacity-75">Garanta a sua segurança e privacidade.</p>
                    <!-- Botão de abertura do modal para Número Mascara -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNumask">
                        VEJA MAIS
                    </button>

                    <!-- Modal para Numero Mascara -->
                    <div class="modal fade" id="modalNumask" tabindex="-1" aria-labelledby="modalNumaskLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalNumask">Numero Máscara</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p>Garanta aos seus clientes a capacidade de fazer chamadas e enviar
                                mensagens sem expor seus números de telefone pessoais.</p><br>
                                <ul class="ul-cpas">
                                    <li><span class="bold">Mascare</span> um número de telefone para interações com mais
                                        privacidade.</li>
                                    <li><span class="bold">Permite</span> que empresas façam negócios usando menos
                                        números de telefone.</li>
                                    <li><span class="bold">Oferece</span> uma experiência mais segura e profissional.</li><br>
                                <h1>Como funciona?</h1><br>
                                    <section>
                                    <i class="fa-solid fa-mobile-screen-button fa-2xl" style="color: #c91313;"></i><br>
                                    Usuário faz uma<br>
                                    chamada através
                                    de <br>um aplicativo.</section>
                                    <i class="fa-solid fa-arrow-down fa-2xl"></i>
                                    <section>
                                    <i class="fa-solid fa-user-ninja fa-2xl"style="color: #c91313;"></i><br>
                                    Plataforma
                                    mascara o <br>número
                                    original.</section>
                                    <i class="fa-solid fa-arrow-down fa-2xl"></i>
                                    <section>
                                    <i class="fa-solid fa-headset fa-2xl"style="color: #c91313;"></i><br>
                                    Ambas as partes
                                    são conectadas.</section>
                                </ul><br>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SMS Programado -->
                <div class="card card-hover bg-body d-flex flex-column justify-content-between col-lg-4 col-xxl-2 col-sm-12 p-3 rounded-5"
                    style="--bs-bg-opacity: .4;">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>SMS Programado</h3>
                        <div class="modal-dialog modal-dialog-scrollable">
                        </div>
                        <i class="fa-solid fa-mobile-screen-button fa-2xl" style="color: #c91313;"></i>
                    </div>

                    <p class="fw-bold opacity-75">
                        Se conecte com seu cliente.
                    </p>
                    <div class="modal-dialog modal-dialog-scrollable">

                    </div>
                    <!-- Botão de abertura do modal para SMS Programado -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalSMS">
                        VEJA MAIS
                    </button>

                    <!-- Modal para SMS Programado -->
                    <div class="modal fade" id="modalSMS" tabindex="-1" aria-labelledby="modalSMSLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalSMS">SMS Programável</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <section class="card">
            <div class="subtitulo"><h2>O que é?</h2></div>
            <br>
            <h3>Conecte com seus clientes.</h3>
            <p>É muito provável que você já tenha recebido uma
                mensagem de texto de uma empresa ou organização.</p>
            <p>Com uma API, qualquer empresa pode enviar mensagens
                de texto e impactar clientes, prospects ou fornecedores
                como parte de seu processo comercial.   </p>
            <p>Com essa ferramenta você envia mensagens de SMS com
                as informações que o seu cliente precisa e com a
                segurança, a velocidade e a confiabilidade que você
                espera.</p></section><br>
                <div class="msgrande">
                    SMS é a forma mais rápida, eficiente e de baixo custo para se comunicar com seus clientes.
                </div><br>
                <ul class="ul-cpas card">
                    <li><div class="num-perso">98%</div> de taxa de abertura</li>
                    <li><div class="num-perso">90%</div> dos SMS são lidos em até 3 minutos.</li>
                    <li><div class="num-perso">80%</div> das pessoas interagem com SMS comerciais.</li>
                    <li><div class="num-perso">35x</div> maior a probabilidade de um cliente abrir um SMS do que um e-mail.</li>
                </ul><br>

                <div class="form-header"><h1>Quem usa?</h1></div><br>
                <h2>São muitos os caso de uso, mas veja alguns exemplos:</h2>

                <section class="card">
                    <h3>Divulgação</h3><i class="fa-solid fa-comment-sms"></i>
                    SMS:<br>
                    Rappi: Noite de cinema sem pipoca<br> NUNCA MAIS! compre com o código<br>
                    PIDEENTURBO e ganhe 27$off.<br> Entregamos em 10min.<br>
                    http//rappilink.app/PIDEENTURBO
                </section>
                

                <section class="card">
                    <h3>Segurança</h3><i class="fa-solid fa-comment-sms"></i>
                    SMS:<br>
                    Olá segue o código<br> de validação para<br>
                    o portal da VIVO: 88001<br>
                
                </section>

                <section class="card">
                    <h3>Transações</h3><i class="fa-solid fa-comment-sms"></i>
                    SMS:<br>
                    BRADESCO CARTÕES:<br> COMPRA APROVADA CARTAO<br>
                    FINAL 1234 EM 07/05 <br>ÁS 03:19 VALOR DE R$49,99<br> EM SEGREDO DA MAMAE<br>
                    RIO DE JANEIRO
                </section>

                <section class="card">
                    <h3>Notificação</h3><i class="fa-solid fa-comment-sms"></i>
                    SMS:<br>
                    Sua viagem Gol GG1234 está confirmada<br>
                    para o dia 08/05 ás 18:30<br>
                    Faça agora seu check-in.<br>
                    www.voudegol.com/checkin
                </section><br>

                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-hover bg-body d-flex flex-column justify-content-between col-lg-4 col-xxl-2 col-sm-12 p-3 rounded-5"
                    style="--bs-bg-opacity: .4;">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Google Verified Calls</h3>
                        <div class="modal-dialog modal-dialog-scrollable">
                        </div>
                        <i class="fa-solid fa-mobile-screen-button fa-2xl" style="color: #c91313;"></i>
                    </div>

                    <p class="fw-bold opacity-75">
                        Verificação de chamadas, método seguro e prático.
                    </p>
                    <div class="modal-dialog modal-dialog-scrollable">

                    </div>
                    <!-- Botão de abertura do modal para Google Verified Calls -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalGVC">
                        VEJA MAIS
                    </button>

                    <!-- Modal para Google Verified Calls -->
                    <div class="modal fade" id="modalGVC" tabindex="-1" aria-labelledby="modalGVCLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalGVC">GOOGLE VERIFIED CALLS</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                            <section class="card2"><h2>O problema</h2><br>
                            <h4>Ligações de spam</h4>
                            <ul>
                                <li>O Brasil é o país que mais sofre com ligações
                                    de spam <span class="bold">no mundo.</span></li>
                                <li>Desde 2017, as chamadas telefônicas de
                                    spam no Brasil <span class="bold">aumentaram 141%.</span></li>
                                <li>O brasileiro recebe em média <span class="bold">49,9 ligações</span>
                                    de spam por mês.</li>
                            </ul></section><br>
                            <div class="form-header"><h1>O que é?</h1></div>
                            <br>
                            <section class="card"><div class="subtitulo"><h2>Chamadas Verificadas</h2></div><br>
                            <p>Esse novo recurso do <span class="bold">Google</span>, exclusivo para
                                telefones <span class="bold">Android</span>, permite que empresas exibam
                                para o cliente na hora da chamada sua marca,
                                logotipo e até mesmo o motivo da chamada.</p><br>
                            <p>A Telecall é a <span class="bold">primeira operadora de telecom no
                                Brasil</span> a oferecer esse recurso do Google.</p></section><br>
                        
                            <section class="card"><div class="subtitulo"><h3>Compatibilidade</div></h3>
                            <br>
                            <ul class="ul-cpas">
                                <li>Exclusivo para sistema operacional <span class="bold">Android</span>
                                    através do aplicativo <span class="bold">Telefone</span>.</li>
                                <li>Pré-instalado em telefones mais recentes ou pode
                                    ser baixado do <span class="bold">Google Play Store</span> para a maioria
                                    dos dispositivos com Android 9.0.</li>
                                <li>Hoje no Brasil existem quase <span class="bold">239 milhões de
                                    celulares smartphone ativos</span>, sendo que o sistema
                                    <span class="bold">Android</span> detém uma participação de mais de <span class="bold">86%</span>
                                    do mercado de sistema operacional móvel no país.</li>
                            </ul></section><br>
                            <div class="form-header"><h1>Como funciona?</h1></div>
                            <br>
                            <ul class="ul-cpas">
                                <section class="card">
                                    <i class="fa-solid fa-headset fa-2xl" style="color: #c91313;"></i><br>
                                <li>Uma chamada telefônica
                                    de uma<br> empresa assinante
                                    é feita para<br> um cliente
                                    potencial ou existente.</li></section>
                                    <i class="fa-solid fa-arrow-down fa-2xl"></i>
                                <section class="card">
                                    <i class="fa-solid fa-gears fa-2xl" style="color: #c91313;" ></i>
                                <li>Em nanossegundos, a
                                    solicitação<br> é encaminhada
                                    para a plataforma da Telecall<br>
                                    que processa a chamada<br> e
                                    adiciona as informações<br>
                                    verificadas antes de<br>
                                    encaminhá-la ao destinatário.</li></section>
                                    <i class="fa-solid fa-arrow-down fa-2xl"></i>
                                <section class="card">
                                    <i class="fa-solid fa-mobile-screen-button fa-2xl" style="color: #c91313;"></i> 
                                <li>As informações aparecem
                                    na<br> tela do celular do
                                    recipiente que<br> atenderá a
                                    ligação com uma <br>chamada
                                    de voz normal.</li></section>
                            </ul><br>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br>
<div class="form-header"><h1>Contatos</h1></div>
    <section class="card">
        <h1>Escritórios</h1>
        <h3 class="subtitulo">Brasil</h3>
        <p>Centro empresarial Mario Henrique Simonsen Av. das Américas, 3434<br>| Bloco 1, Sala 505 Barra da Tijuca <br>| Rio de Janeiro, RJ</p><br>
        <h3 class="subtitulo">Estados Unidos</h3>
        <p>848 Brickell Av - Suite 1235 - Miami FL - 33131</p><br>
        <h3 class="subtitulo">Portugal</h3>
        <p>Avenida da Liberdade nº 245<br>, 4º piso, sala 402 Lisboa, Portugal, 1250-143</p><br>
        <h3 class="subtitulo">Inglaterra</h3>
        <p>8 Devonshire Squae, Londom EC2M 4YJ</p>
    </section>
    <br>
    <div class="contatos">
        
    <section class="card">
        <h4>Ligue ou envie um Whatsapp para nós</h4><br>
        <i class="fa-brands fa-whatsapp fa-2xl" style="color: #1ac11d;"></i><br><span class="bold"> (21) 3030-1010</span>
    </section>
    <br>
    <section class="card2">
        <h2>Envie um Email:</h2>
        <h1>suporte@telecall.com</h1>
        <p>Respondemos em até 24h.</p>
    </section>
    </div>

  </div>

<footer class="py-5 bg-dark">
    <div class="container px-5">
    <div class="m-0 text-center text-white">Copyright © 2023 | Telecall. Todos os direitos reservados.</div>
    <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="https://www.instagram.com/telecallbr/"><i class="bi bi-instagram fa-2xl"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/TelecallBr"><i class="bi bi-facebook fa-2xl"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://www.linkedin.com/company/telecall/people/"><i class="bi bi-linkedin fa-2xl"></i></a>
          </li>
      </ul>
    </div>
</footer>
</body>

</html>