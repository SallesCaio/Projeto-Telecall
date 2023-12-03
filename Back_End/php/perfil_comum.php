<?php
session_start();
include_once("config.php");
    // Validação de login.
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['$senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: erro.php');
    } 
    

    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $nomeMaterno = $_SESSION['nome_materno'];
    $dataNascimento = $_SESSION['data_nascimento'];
    $cpf = $_SESSION['cpf'];
    $sexo = $_SESSION['sexo'];
    $telefoneFixo = $_SESSION['telefone_fixo'];  
    $telefoneCel = $_SESSION['telefone_celular'];
    $cep = $_SESSION['cep'];
    $endereco = $_SESSION['endereço'];
    $cidade = $_SESSION['cidade'];
    $bairro = $_SESSION['bairro'];
    $uf = $_SESSION['uf'];
    $num = $_SESSION['num'];
    $login = $_SESSION['login'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style> 
    .box-search {
    display: flex;
    justify-content: center;
    gap: .1%;
    }
    </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/442fedf347.js" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Meu Perfil</title>
</head>
<body>

<nav id="navbar1">
    <div id="navbar-container1">
        <a href="home_comum.php"><img src="../imagens/logo-hdr.png" alt="telecall" width="200px" maxwidht="200px"></a>
        <div id="navbar-items1">
            <div class="btn-group">
            <a href="perfil_comum.php" class="btn btn sm btn-danger "><i class="bi bi-person-fill"></i><?php echo "$login" ?></a>
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="home_comum.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="log_comum.php">Painel de LOG</a></li>
            </li> 
                    
            <body data-bs-theme="light">
                        
                    <div class="form-check form-switch mx-4">
                    <input class="btn-dark form-check-input p-2" type="checkbox" role="switch" id="flexSwitchCheckChecked"onclick="myFunction()" checked/><i class="bi bi-brightness-alt-high"></i></i></i>
                </div>
            </ul>  
        </div>
    </div>
</nav>

<div class="card md-12 mx-auto" style="max-width: 1000px;">
  <div class="row g-6">
    <div class="col-md-4">
      <img src="../imagens/COMUM.png" class="img-fluid rounded-start" alt="..." >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title danger-text-emphasis"><?php echo $nome?></h5>
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><h6>ID:</h6> <?php echo $id?></li>
        <li class="list-group-item"><h6>CPF:</h6> <?php echo $cpf?></li>
        <li class="list-group-item"><h6>NOME MATERNO:</h6> <?php echo $nomeMaterno?></li>
        <li class="list-group-item"><h6>DATA DE NASCIMENTO:</h6> <?php echo $dataNascimento?></li>
        <li class="list-group-item"><h6>SEXO:</h6> <?php echo $sexo?></li>
        <li class="list-group-item"><h6>TEL. CELULAR:</h6> <?php echo $telefoneCel?></li>
        <li class="list-group-item"><h6>TEL. FIXO:</h6> <?php echo $telefoneFixo?></li>
        <li class="list-group-item"><h6>CEP:</h6> <?php echo $cep?></li>
        <li class="list-group-item"><h6>ENDEREÇO:</h6> <?php echo $endereco?></li>
        <li class="list-group-item"><h6>BAIRRO:</h6> <?php echo $bairro?></li>
        <li class="list-group-item"><h6>CIDADE:</h6> <?php echo $cidade?></li>
        <li class="list-group-item"><h6>UF:</h6> <?php echo $uf?></li>
        <li class="list-group-item"><h6>N°:</h6> <?php echo $num?></li>
        <li class="list-group-item"><h6>LOGIN:</h6> <?php echo $login?></li>

        </ul>
      </div>
    </div>
  </div>
    <a class='btn btn-danger m-1' href='edit_comum.php?id=<?php echo $id; ?>'>Editar Cadastro</a>
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
