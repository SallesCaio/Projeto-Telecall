<?php
session_start();

function validateForm()
{
    //Function de validação para o campo vazio.
    $errors = array();

    if (isset($_POST["submit"])) {
        if (empty($_POST['resposta'])) {
            $errors["resposta"] = "Insira a resposta.";
        }
    }

    return $errors;
}

$errors = validateForm();


if (isset($_POST["submit"]) && empty($errors)) {
    include_once('config.php');

    $id = $_SESSION["id"];
    $pergunta = $_SESSION["pergunta"];
    $resposta = $_POST["resposta"];


    function fetchUserInfo($conexao, $id)
    {
        //Function de validação.
        $query = "SELECT * FROM usuario WHERE id = '$id'";
        $result = $conexao->execute_query($query);
        return ($result->num_rows == 1) ? $result->fetch_assoc() : false;
    }

    function verificarResposta($resposta, $pergunta, $id, $conexao)
    {
        //Function de verificação de respostas de acordo com a pergunta.
        if ($pergunta == "nome_materno") {
            $query = "SELECT id FROM usuario WHERE nome_materno = '$resposta' AND id = '$id'";
        } else {
            $query = "SELECT id FROM usuario WHERE $pergunta = '$resposta' AND id = '$id'";
        }
        $result = $conexao->execute_query($query);
        if ($result->num_rows == 1) {
            return fetchUserInfo($conexao, $id);
        } else {
            $_SESSION["role"] = "erro";
            header("Location: erro.php");
        }
    }


    $userInfo = verificarResposta($resposta, $pergunta, $id, $conexao);
    if ($userInfo) {
        //Aqui está colhendo as informações do usuário.
        $_SESSION["id"] =               $userInfo["id"];
        $_SESSION["cpf"] =              $userInfo["cpf"];
        $_SESSION["nome"] =             $userInfo["nome"];
        $_SESSION["sexo"] =             $userInfo["sexo"];
        $_SESSION["data_nascimento"] =  $userInfo["data_nascimento"];
        $_SESSION["nome_materno"] =     $userInfo["nome_materno"];
        $_SESSION["telefone_celular"] = $userInfo["telefone_celular"];
        $_SESSION["telefone_fixo"] =    $userInfo["telefone_fixo"];
        $_SESSION["login"] =            $userInfo["login"];
        $_SESSION["cep"] =              $userInfo["cep"];
        $_SESSION["endereço"] =         $userInfo["endereço"];
        $_SESSION["bairro"] =           $userInfo["bairro"];
        $_SESSION["cidade"] =           $userInfo["cidade"];
        $_SESSION["uf"] =               $userInfo["uf"];
        $_SESSION["num"] =              $userInfo["num"];
        $_SESSION["role"] =             $userInfo["role"];




        if ($_SESSION["role"] == "comum"){
            //Inserção de dados ao log caso seja do tipo usuário "comum".
            $idUsuario = $userInfo ['id'];
            $data = date('d/m/Y H:i:s', strtotime('now'));
            $nome = $userInfo['nome'];
            $logMessage = "logou no sistema como usuário comum.";
            $logQuery = "INSERT INTO `log` (`data_hora`, `log_mensagem`, `nome`,`id_usuario`) VALUES ('$data', '$logMessage', '$nome', '$idUsuario')";
            $conexao->execute_query($logQuery);
            $conexao->commit();
            $conexao->close();
            header("Location: home_comum.php");
        }
        if ($_SESSION["role"] == "master"){
            //Inserção de dados ao log caso seja do tipo usuário "master".
            $idUsuario = $userInfo ['id'];
            $data = date('d/m/Y H:i:s', strtotime('now'));
            $nome = $userInfo['nome'];
            $logMessage = "logou no sistema como usuário master.";
            $logQuery = "INSERT INTO `log` (`data_hora`, `log_mensagem`, `nome`,`id_usuario`) VALUES ('$data', '$logMessage', '$nome', '$idUsuario')";
            $conexao->execute_query($logQuery);
            $conexao->commit();
            $conexao->close();
            header("Location: home_log.php");
        }
    } 
        else {
        //Inserção de dados ao log caso o usuário errar a resposta.
        $idUsuario = $userInfo ['id'];
        $data = date('d/m/Y H:i:s', strtotime('now'));
        $logMessage = "O usuário do ID $id tentou responder a pergunta sobre $pergunta e errou.";
        $logQuery = "INSERT INTO `log` (`data_hora`, `log_mensagem`, `nome`,`id_usuario`) VALUES ('$data', '$logMessage', '$nome', '$id')";
        $conexao->execute_query($logQuery);
        $conexao->commit();
        $conexao->close();
        $_SESSION["role"] = "erro";
        header("Location: erro.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .error {
    color: #ca0800;
    font-size: 1rem;
    margin: 3px 1px 1px 2px;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilo_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="main-login">
            <form action="pergunta2fa3.php" id="form" class="right-login" method="post">
            <div class="card">
            <a href="login.php"><img src=../imagens/telecall_logo.png width="100rem"></a>
                <h1>Pergunta de Segurança</h1>
                <div class="texto">
                    <label for="resposta" class ="texto">Qual o nome da sua mãe?</label>
                    <input type="text" name="resposta" class="required" placeholder="Informe o Nome Materno.">
                    <?php if (isset($errors["resposta"])) {echo '<p class="error">' . $errors["resposta"] . '</p>';}?>
                </div>    
                <input type="submit" name="submit" class="btn btn-danger" value="ENVIAR"></input>
        </form>
        </div>
    </div>

</body>
</html>