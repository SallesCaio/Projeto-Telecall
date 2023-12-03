<?php
session_start();

function validateForm()
{
    // Função de validação para campos vazios.
    $errors = array();

    if (isset($_POST["submit"])) {
        if (empty($_POST['cpf'])) {
            $errors["cpf"] = "Insira o CPF.";
        }

        if (empty($_POST['resposta'])) {
            $errors["resposta"] = "Insira a resposta.";
        }

        if (empty($_POST['nova_senha']) || strlen($_POST['nova_senha']) !== 8) {
            $errors["nova_senha"] = "A senha deve ter 8 caracteres.";
        }
    }

    return $errors;
}

$errors = validateForm();

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
    // Se a validação for bem-sucedida, prossiga com a inserção no banco de dados
    include_once('config.php');

    $cpf = $_POST["cpf"];
    $resposta = $_POST["resposta"];
    $novaSenha = $_POST["nova_senha"];

    function fetchUserInfo($conexao, $cpf)
    {
        // Function de validação.
        $query = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $result = $conexao->execute_query($query);
        return ($result->num_rows == 1) ? $result->fetch_assoc() : false;
    }

    $usuario = fetchUserInfo($conexao, $cpf);

    function verificarResposta($resposta, $usuario, $cpf, $conexao, $novaSenha)
    {
        // Function de verificação de respostas de acordo com a pergunta.
        if ($usuario) {
            $pergunta = "data_nascimento"; // Defina a pergunta de acordo com sua lógica.
            $query = "SELECT cpf FROM usuario WHERE data_nascimento = '$resposta' AND cpf = '$cpf'";
        } else {
            $_SESSION["role"] = "erro";
            $_SESSION["message"] = "CPF não cadastrado.";
            header("Location: erro.php");
            exit();
        }

        $result = $conexao->execute_query($query);

        if ($result->num_rows == 1) {
            $updateQuery = "UPDATE usuario SET senha = '$novaSenha' WHERE cpf = '$cpf'";
            $updateResult = $conexao->query($updateQuery);

            if ($updateResult) {
                $_SESSION["role"] = "success";
                header("Location: sucesso.php");
                exit();
            } else {
                $_SESSION["role"] = "erro";
                $_SESSION["message"] = "Erro ao atualizar senha.";
                header("Location: erro.php");
                exit();
            }
        } else {
            $_SESSION["role"] = "erro";
            $_SESSION["message"] = "Resposta da pergunta de segurança inválida.";
            header("Location: erro.php");
            exit();
        }
    }

    verificarResposta($resposta, $usuario, $cpf, $conexao, $novaSenha);
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
        <form action="recuperarSenha.php" id="form" class="right-login" method="post">
            <div class="card">
                <a href="login.php"><img src=../imagens/telecall_logo.png width="100rem"></a>
                <h1>Recuperar Senha</h1>
                <div class="texto">
                    <label for="pergunta" class="texto">Qual o seu CPF?</label>
                    <input type="text" name="cpf" class="required" placeholder="Informe o CPF cadastrado." maxlength="11">
                    <?php if (isset($errors["cpf"])) {echo '<p class="error">' . $errors["cpf"] . '</p>';}?>
                </div>
                <div class="texto">
                    <label for="pergunta" class="texto">Qual a sua data de nascimento?</label>
                    <input type="text" name="resposta" class="required" placeholder="Informe a resposta.">
                    <?php if (isset($errors["resposta"])) {echo '<p class="error">' . $errors["resposta"] . '</p>';}?>
                </div>
                <div class="texto">
                    <label for="pergunta" class="texto">Nova Senha</label>
                    <input type="password" name="nova_senha" class="required" placeholder="Informe a nova senha." maxlength="8">
                    <?php if (isset($errors["nova_senha"])) {echo '<p class="error">' . $errors["nova_senha"] . '</p>';}?>
                </div>       
                <input type="submit" name="submit" class="btn btn-danger" value="ENVIAR"></input>
            </div>
        </form>
    </div>
</body>
</html>
