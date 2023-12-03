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

    $logado = $_SESSION['login'];
    // Campo para busca de usuário.
    if(!empty($_GET['search']))
    {
       $data = $_GET['search'];
       $sql = "SELECT * FROM log WHERE id_log LIKE '%$data%' or nome LIKE '%$data%' ORDER BY id_log DESC";
    }
    else
    {
        $sql = "SELECT * FROM log ORDER BY id_log DESC";  
    }
    

    $result = $conexao->query($sql);
    
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
    .btn-pdf{
    display: flex;
    padding: 10px 0 0 10px;
    justify-content: center;
    }
    @media print {
        body {
            padding-top: 0 !important;
        }

        #navbar1, .navbar, .box-search, .btn, .nav {
            display: none !important;
        }
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/442fedf347.js" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <script src="caminho/para/html2pdf.bundle.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Sistema</title>
</head>
<body>

<nav id="navbar1">
    <div id="navbar-container1">
        <a href="home_log.php"><img src="../imagens/logo-hdr.png" alt="telecall" width="200px" maxwidht="200px"></a>
        <div id="navbar-items1">
            <div class="btn-group">
            <a href="perfil_master.php" class="btn btn sm btn-danger "><i class="bi bi-person-fill"></i><?php echo "$logado" ?></a>
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
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="home_log.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="perfil_master.php">Meu Perfil</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="sistema.php">Painel de Controle</a></li>
            </li> 
                    
            <body data-bs-theme="light">
                        
                    <div class="form-check form-switch mx-4">
                    <input class="btn-dark form-check-input p-2" type="checkbox" role="switch" id="flexSwitchCheckChecked"onclick="myFunction()" checked/><i class="bi bi-brightness-alt-high"></i></i></i>
                </div>
            </ul>  
        </div>
    </div>
</nav>


<header class="py-4">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                     <h1 class='display-5 fw-bolder mb-2'>Painel de LOG</h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="box-search">
    <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
    <button class="btn btn-primary" onclick="searchData()"><i class="bi bi-search"></i></button>
</div>


<div class="btn-pdf">
<button class="btn btn-primary" onclick="imprimirOuGerarPDF()">Gerar PDF</button>
</div>



<div id= "table" class="m-4 log-area">
    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
        <th scope="col">DATA</th>
        <th scope="col">MENSAGEM</th>
        </tr>
    </thead>
    <tbody>
    <?php
        while($userData = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$userData["id_usuario"]."</td>";
            echo "<td>".$userData["nome"]."</td>";
            echo "<td>".$userData["data_hora"]."</td>";
            echo "<td>".$userData["log_mensagem"]."</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
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
<script>
var search = document.getElementById('pesquisar');
function searchData(){
    window.location = 'log.php?search='+search.value;
}
function imprimirOuGerarPDF() {
    // Opção para imprimir a página
    var element = document.querySelector('.log-area');
        window.print();
    

    // Opção para gerar um PDF usando html2pdf.js
    // Descomente as linhas abaixo se deseja usar esta opção
    // var element = document.getElementById('table');
    // html2pdf(element);
}
</script>
</html>
