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

    $login = $_SESSION['login'];
    
    // Campo para busca de usuário.
    if(!empty($_GET['search']))
    {
       $data = $_GET['search'];
       $sql = "SELECT * FROM usuario WHERE id LIKE '%$data%' or nome LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuario ORDER BY id DESC";  
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

        #navbar1, .navbar, .box-search, .btn, .nav, .container {
            display: none !important;
        }
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
    <title>Painel de Controle</title>
</head>
<body>

<nav id="navbar1">
    <div id="navbar-container1">
        <a href="home_log.php"><img src="../imagens/logo-hdr.png" alt="telecall" width="200px" maxwidht="200px"></a>
        <div id="navbar-items1">
            <div class="btn-group">
            <a href="perfil_master.php" class="btn btn sm btn-danger "><i class="bi bi-person-fill"></i><?php echo "$login" ?></a>
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="log.php">Painel de LOG</a></li>
            </li> 
                    
            <body data-bs-theme="light">
                        
                    <div class="form-check form-switch mx-4">
                    <input class="btn-dark form-check-input p-2" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="myFunction()" checked/><i class="bi bi-brightness-alt-high"></i></i></i>
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
                    <?php
                    echo "<h1 class='display-5 fw-bolder mb-2'>Seja Bem-Vindo $login</h1>"
                    ?>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <div style="color: red;">
                    <?php
                    if (isset($_SESSION["message"])) {
                        echo '<p class="lead mb-4">' . $_SESSION["message"] . '</p>';
                        unset($_SESSION["message"]); // Limpa a mensagem da sessão após exibi-la
                    } else {
                    }
                    ?>
                    </div>
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
        <th scope="col">CPF</th>
        <th scope="col">NOME</th>
        <th scope="col">LOGIN</th>
        <th scope="col">TIPO USUARIO</th>
        <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
    <?php
            while ($userData = mysqli_fetch_assoc($result)) {
                // Gere um ID único para cada modal
                $modalId = 'exampleModal' . $userData["id"];
                echo "<tr>";
                echo "<td>" . $userData["id"];
                echo "<td>" . $userData["cpf"] . "</td>";
                echo "<td>" . $userData["nome"] . "</td>";
                echo "<td>" . $userData["login"] . "</td>";
                echo "<td>" . $userData["role"] . "</td>";
                echo "<td>
                    <!-- Botão Modal para exibir mais informações -->
                    <button type='button' class='btn btn-secondary btn-sm' data-bs-toggle='modal' data-bs-target='#$modalId'><i class='bi bi-person-fill'></i></button>
                    <div class='modal fade' id='$modalId' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>$userData[nome]</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>     
                            Data de Nascimento:  $userData[data_nascimento].<br>
                            Sexo:                $userData[sexo].<br>
                            Nome Materno:        $userData[nome_materno].<br>
                            Telefone Celular:    $userData[telefone_celular].<br>
                            Telefone Fixo:       $userData[telefone_fixo].<br>
                            CEP:                 $userData[cep].<br>
                            Endereço:            $userData[endereço].<br>
                            Bairro:              $userData[bairro].<br> 
                            Cidade:              $userData[cidade].<br>
                            UF:                  $userData[uf].<br>
                            N°:                  $userData[num].<br>
                            Tipo de Usuário:     $userData[role].<br>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Fechar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <!-- Botão para editar cadastro -->
                    <a class='btn btn-primary btn-sm m-1' href='edit.php?id=$userData[id]'><i class='bi bi-pencil-fill'></i></a>

                    <!-- Botão para excluir cadastro (usuários master não podem ser excluidos) -->
                    <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal$modalId'>
                    <i class='bi bi-trash'></i>
                    </button>
                    <div class='modal fade' id='deleteModal$modalId' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Exclusão de Usuário</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            Deseja realmente excluir esse usuário?
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                            <a type='button' class='btn btn-danger' href='delete.php?id=$userData[id]'>Excluir</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </td>";
                echo "</tr>";
            }
            //
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
  function searchData(){
      var search = document.getElementById('pesquisar');
      window.location = 'sistema.php?search='+search.value;
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
