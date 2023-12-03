<?php 
    
if(!empty($_GET['id']))
{

    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0) 
    {   
        while($userData = mysqli_fetch_assoc($result))
        {
            $nome =            $userData['nome'];
            $nomeMaterno =     $userData['nome_materno'];
            $dataNascimento =  $userData['data_nascimento'];
            $cpf =             $userData['cpf'];
            $telefoneCel =     $userData['telefone_celular'];
            $telefoneFixo =    $userData['telefone_fixo'];
            $cep =             $userData['cep'];
            $endereco =        $userData['endereço'];
            $bairro =          $userData['bairro']; 
            $cidade =          $userData['cidade'];
            $uf =              $userData['uf'];
            $num =             $userData['num'];
            $login =           $userData['login'];
            $senha =           $userData['senha'];
            $sexo =            $userData['sexo'];
            $role =            $userData['role'];
        }
        
    }

    else
    {
     header('location: sistema.php');   
    }

}
else 
{
    header('location: sistema.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/estilo_novaconta.css">
    <link rel="stylesheet" href="../css/meu_estilo.css">


</head>
<body>
 <div class="container">
        <div class="form-image">
            <a href="home.php"><img src="../imagens/telecall_logo.png" alt="" srcset=""></a>
        </div>
        <div class="form">
            <form action="saveEdit.php" id="form" method="post">
                <div class="form-header">
                    <div class="img-mob">
                       <img src="../imagens/telecall_logo.png">
                    </div>
                    <div class="login-btn">

                        <button><a href="sistema.php">voltar</a></button>
                    </div> 
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="name">Nome Completo*</label>
                        <input id="name" type="text" name="nome" placeholder="Digite seu nome completo" class="required" value="<?php echo $nome ?>">
                        <span class="span-required">Insira o nome completo</span> 
                    </div>
                    <div class="input-box">
                        <label for="momname">Nome Materno*</label>
                        <input id="momname" type="text" name="nome_materno" placeholder="Digite o nome Materno" class="required" value="<?php echo $nomeMaterno ?>">
                        <span class="span-required">Insira o nome completo</span>
                    </div>
                    <div class="input-box">
                        <label for="date">Data de Nascimento*</label>
                        <input id="date" type="date" name="data_nascimento" class="required" value="<?php echo $dataNascimento ?>">
                        <span class="span-required">Insira a data de nascimento</span>
                    </div>
                    <div class="input-box">
                        <label for="cpf">CPF*</label>
                        <input id="cpf" type="text" name="cpf" placeholder="000.000.000-00" class="required" maxlength="11" value="<?php echo $cpf ?>">
                        <span class="span-required">Insira um CPF válido</span>
                    </div>
                    <div class="input-box">
                        <label for="tel">Telefone Celular*</label>
                        <input id="telc" type="tel" name="telefone_celular" placeholder="(+55)XX-XXXXXXXX." class="required" maxlength="11" value="<?php echo $telefoneCel ?>">
                        <span class="span-required">Insira um número válido</span>
                    </div>
                    <div class="input-box">
                        <label for="telf">Telefone Fixo*</label>
                        <input id="telf" type="tel" name="telefone_fixo" placeholder="(+55)XX-XXXXXXXX." class="required" maxlength="11" value="<?php echo $telefoneFixo ?>">
                        <span class="span-required">Insira um número válido</span>
                    </div>
                    <div class="input-box">
                        <label for="adress">CEP*</label>
                        <input type="text" name="cep" id="cep" placeholder="Digite o CEP" class="required" maxlength="8" value="<?php echo $cep ?>"></textarea>
                        <span class="span-required">Insira um CEP válido</span>
                    </div>
                    <div class="input-box">
                        <label for="adress">Endereço*</label>
                        <input type="text" name="endereço" id="endereço" placeholder="Digite o endereço" class="required" value="<?php echo $endereco ?>"></textarea>
                        <span class="span-required">Insira o endereço completo</span>
                    </div>
                    <div class="input-box">
                        <label for="adress">Bairro*</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro" class="required" value="<?php echo $bairro ?>"></textarea>
                        <span class="span-required">Insira o nome do bairro</span>
                    </div>
                    <div class="input-box">
                        <label for="adress">Cidade*</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade" class="required" value="<?php echo $cidade ?>"></textarea>
                        <span class="span-required">Insira a cidade</span>
                    </div>
                    <div class="input-box">
                        <label for="adress">UF*</label>
                        <input type="text" name="uf" id="uf" placeholder="Digite o estado" class="required" value="<?php echo $uf ?>"></textarea>
                        <span class="span-required">Insira a UF</span>
                    </div>
                    <div class="input-box">
                        <label for="adress">N°*</label>
                        <input type="text" name="num" id="num" placeholder="Digite o número da casa" class="required" value="<?php echo $num ?>"></textarea>
                        <span class="span-required">Insira o número da casa</span>
                    </div>
                    <div class="input-box">
                        <label for="login">Login*</label>
                        <input id="login" type="text" name="login" placeholder="Digite seu Login" maxlength="6" class="required" value="<?php echo $login ?>">
                        <span class="span-required">O login deve ter 6 caracteres.</span>
                    </div>
                    <div class="input-box">
                        <label for="password">Senha*</label>
                        <input id="password" type="text" name="senha" placeholder="Crie uma nova senha"  maxlength="8" class="required" value="<?php echo $senha ?>">
                        <span class="span-required">A senha deve ter 8 caracteres</span>
                    </div>
                    <div class="input-box">
                        <label for="cpassword">Confirme a Senha*</label>
                        <input id="cpassword" type="text" name="cpPassword" placeholder="Confirme a senha"  maxlength="8" class="required" value="<?php echo $senha ?>">  
                        <span class="span-required">Senhas não compatíveis.</span>
                    </div>
                    <div class="input-box">
                        <label for="role">Tipo de Usuário</label>
                        <select id="role" name="role" class="required" value="<?php echo $role ?>">
                        <option value="comum">Comum</option>
                        <option value="master">Master</option>
                        </select>
                    </div>  
                </div>
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                        <span id="gender-error" class="span-required">Escolha um gênero</span>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="female" value="Feminino" name="sexo" <?php echo ($sexo == 'Feminino') ? 'checked' : '' ?>>
                            <label for="female">Feminino</label>

                        </div>
                        <div class="gender-input">
                            <input type="radio" id="male" value="Masculino" name="sexo" <?php echo ($sexo == 'Masculino') ? 'checked' : '' ?>>
                            <label for="male">Masculino</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="other" value="Outros" name="sexo" <?php echo ($sexo == 'Outros') ? 'checked' : '' ?>>
                            <label for="other">Outros</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="none" value="Não Definido" name="sexo" <?php echo ($sexo == 'Não Definido') ? 'checked' : '' ?>>
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
					<button type='submit' class ="continue-btn" onclick='validate()' name="update" id="update">Enviar</button>
					<button type='reset' class ="continue-btn" >Limpar</button>
        </form>
    </div>
 </div>
</body>
</html>