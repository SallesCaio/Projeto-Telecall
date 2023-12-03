<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/442fedf347.js" crossorigin="anonymous"></script>
<script src="../js/index.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/meu_estilo.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
<title>Erro</title>
</head>
<body>

<header class="py-4">
    <div class="container px-4">
        <div class="row gx-2 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                <a href="home.php"><img src="../imagens/telecall_logo.png" width="300px" height="300px" alt=""></a>   
                    <h1 class='display-5 lead mb-2'>Erro de autenticação de usuário.</h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <?php
                    if (isset($_SESSION["message"])) {
                        echo '<p class="lead mb-4">' . $_SESSION["message"] . '</p>';
                        unset($_SESSION["message"]); // Limpa a mensagem da sessão após exibi-la
                    } else {
                        echo '<p class="lead mb-4">ALGO DEU ERRADO, VOLTE AO INICIO.</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<footer class="py-1 bg-dark">
    <div class="container px-4 col-12">
    <div class="m-4 text-center text-white">Copyright © 2023 | Telecall. Todos os direitos reservados.</div>
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