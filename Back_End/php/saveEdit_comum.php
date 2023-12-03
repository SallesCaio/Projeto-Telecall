<?php
    include_once("config.php");

    if(isset($_POST["update"])){
    $id =               $_POST['id'];
    $nome =             $_POST['nome'];
    $nomeMaterno =      $_POST['nome_materno'];
    $dataNascimento =   $_POST['data_nascimento'];
    $cpf =              $_POST['cpf'];
    $telefoneCel =      $_POST['telefone_celular'];
    $telefoneFixo =     $_POST['telefone_fixo'];
    $cep =              $_POST['cep'];
    $endereco =         $_POST['endereço'];
    $bairro =           $_POST['bairro']; 
    $cidade =           $_POST['cidade'];
    $uf =               $_POST['uf'];
    $num =              $_POST['num'];
    $login =            $_POST['login'];
    $senha =            $_POST['senha'];
    $sexo =             $_POST['sexo'];

    $sqlUpdate = "UPDATE usuario SET
    nome='$nome', nome_materno='$nomeMaterno', data_nascimento='$dataNascimento',
    cpf='$cpf', telefone_celular='$telefoneCel', telefone_fixo='$telefoneFixo',
    cep='$cep',  endereço='$endereco', bairro='$bairro', cidade='$cidade', uf='$uf', num='$num',
    login='$login', senha='$senha', sexo='$sexo' WHERE id = '$id'";

    $result = $conexao->query($sqlUpdate);

    
    }

    header("location: perfil_comum.php");

?>