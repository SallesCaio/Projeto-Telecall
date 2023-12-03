<?php

session_start();

if (!empty($_GET['id'])) {

    include_once('config.php');

    $id = $_GET['id'];

    // Obtém informações do usuário
    $sqlSelect = "SELECT * FROM usuario WHERE id=$id";
    $resultSelect = $conexao->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $userData = $resultSelect->fetch_assoc();
        
        // Verifica a função do usuário antes de excluir
        $role = $userData['role'];

        if ($role === 'comum') {
            // Pode excluir usuários com a função 'comum'
            $sqlDelete = "DELETE FROM usuario WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
            $_SESSION["role"] = "sucesso";
            $_SESSION["message"] = "Usuário excluído com sucesso!.";

            // Adicione verificações adicionais ou mensagens de sucesso conforme necessário
        } 
        else
         {
            // Usuários com a função 'master' não podem ser excluídos
            $_SESSION["role"] = "erro";
            $_SESSION["message"] = "Usuários com a função 'master' não podem ser excluídos.";
            header("location: sistema.php");
        }
    }

    header("Location: sistema.php");
} else {
    // Tratamento para o caso em que 'id' está ausente
    // Pode exibir uma mensagem de erro, redirecionar, etc.
}

?>
