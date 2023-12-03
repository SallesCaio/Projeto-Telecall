<?php
session_start();

function validateForm()
{
    $errors = array();

    if (isset($_POST["submit"])) {
        if (empty($_POST['login'])) {
            $errors["login"] = "Campo de login é obrigatório.";
        }

        if (empty($_POST['senha'])) {
            $errors["senha"] = "Campo de senha é obrigatório.";
        }
    }

    return $errors;
}

function verificarPapelUsuario($role, $isMaster)
{
    if ($role === 'comum' && $isMaster) {
        // Usuário comum com switch master ligado
        return "Erro: Usuário master não encontrado.";
    } elseif ($role === 'master' && !$isMaster) {
        // Usuário master sem switch master ligado
        return "Erro: O switch de usuário master não está ligado.";
    } else {
        // Usuário válido
        return null;
    }
}

$errors = validateForm();

if (isset($_POST["submit"]) && empty($errors)) {
    include_once('config.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $Random = rand(1, 3);

    function verificarLogin($conexao, $login)
    {
        $query = "SELECT login FROM usuario WHERE login = '$login'";
        $result = mysqli_query($conexao, $query);
        
        if ($result && $result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    
    function verificarSenha($conexao, $login, $senha)
    {
        $loginReturn = verificarLogin($conexao, $login);
    
        if ($loginReturn) {
            $query = "SELECT id, role FROM usuario WHERE senha = '$senha' and login = '{$loginReturn['login']}'";
            $result = mysqli_query($conexao, $query);
    
            if ($result && $result->num_rows == 1) {
                return $result->fetch_assoc();
            }
        }
    
        return false;
    }

    $usuario = verificarSenha($conexao, $login, $senha);

    if ($usuario === false) {
        $_SESSION["role"] = "erro";
        $errors["login"] = "Usuário ou senha incorretos.";
    } else {
       
        if (is_array($usuario)) {
            $roleDoUsuario = $usuario["role"];
            $switchMasterLigado = isset($_POST['master']) && $_POST['master'] === 'on'; 

            
            $erro = verificarPapelUsuario($roleDoUsuario, $switchMasterLigado);

            if ($erro !== null) {
                $_SESSION["role"] = "erro";
                $errors["login"] = $erro;
            } else {
                $_SESSION["id"] = $usuario["id"];
                $_SESSION["role"] = "comum";

                switch ($Random) {
                    case 1:
                        $_SESSION['pergunta'] = "cep";
                        header("Location: pergunta2fa1.php");
                        break;
                    case 2:
                        $_SESSION['pergunta'] = "data_nascimento";
                        header("Location: pergunta2fa2.php");
                        break;
                    case 3:
                        $_SESSION['pergunta'] = "nome_materno";
                        header("Location: pergunta2fa3.php");
                        break;
                    default:
                        break;
                }
            }
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilo_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
    .error {
    color: #ca0800;
    font-size: 1rem;
    margin: 3px 1px 1px 2px;
    }
    </style>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Bem-Vindo<br>à Telecall</h1>
            <a href="home.php"><img src="../imagens/telecall_logo.png" widht ="300px" height="300px" alt=""></a>
        </div>
            <form action="login.php" id="form" class="right-login" method="post">
            <div class="card">
                <h1>Área do Cliente</h1>
                <div class="texto">
                    <label for="login" class ="texto">Usuário</label>
                    <input type="text" name="login" class="required" placeholder="Usuário" maxlength="6">
                    <?php if (isset($errors["login"])) {echo '<p class="error">' . $errors["login"] . '</p>';}?>
                </div>
                <div class="texto">
                    <label for="senha" class= "texto">Senha</label>
                    <input type="password" name="senha" class="required" placeholder="Senha">
                    <?php if (isset($errors["senha"])) {echo '<p class="error">' . $errors["senha"] . '</p>';} ?>
                </div>
                <div class="texto">
                    <a href="novaConta.php">Criar nova conta</a>
                    <a href="recuperarSenha.php">Esqueci minha senha</a>
                </div>
                <div class="form-check form-switch mx-4">
                    <input class="btn-dark form-check-input p-2" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="master" >Usuário Master</i></i>
                </div>
                <div class="submit">
                <input type="submit" name="submit" class="btn btn-danger" value="Entrar"></input>
                <input type="reset" name="reset" class="btn btn-danger" value="Limpar"></input>   
                </div>

        </form>
        </div>
    </div>

</body>
</html>
