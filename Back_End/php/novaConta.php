<?php 
    session_start();



    
    function validateForm()
    {
        $errors = array();
    
        if (isset($_POST["submit"])) {
            // Verificação do nome
            if (empty($_POST['nome']) || strlen($_POST['nome']) < 15 || strlen($_POST['nome']) > 80) {
                $errors["nome"] = "O nome deve ter entre 15 e 80 caracteres.";
            }

            // Verificação do nome materno
            if (empty($_POST['nome_materno']) || strlen($_POST['nome_materno']) < 15 || strlen($_POST['nome_materno']) > 80) {
                $errors["nome_materno"] = "O nome materno deve ter entre 15 e 80 caracteres.";
            }
            // Verificação da data de nascimento
            if (empty($_POST['data_nascimento'])) {
                $errors["data_nascimento"] = "Data de nascimento é obrigatório.";
            } else {
                $dataNascimento = new DateTime($_POST['data_nascimento']);
                $dataAtual = new DateTime();

                if ($dataNascimento >= $dataAtual) {
                    $errors["data_nascimento"] = "Insira uma data de nascimento válida.";
                } else {
                    $idade = $dataAtual->diff($dataNascimento)->y;

                    if ($idade < 18) {
                        $errors["data_nascimento"] = "É necessário ter 18 anos ou mais..";
                    }
                }
            }

            if (empty($_POST['cpf']) || strlen($_POST['cpf']) !== 11 || !is_numeric($_POST['cpf']) || !validarCPF($_POST['cpf'])) {
                $errors["cpf"] = "CPF inválido.";
            }    

            if (empty($_POST['telefone_fixo']) || strlen($_POST['telefone_fixo']) !== 11 || !is_numeric($_POST['telefone_fixo'])) {
                $errors["telefone_fixo"] = "O Telefone deve ter 11 dígitos.";
            }

            if (empty($_POST['telefone_celular']) || strlen($_POST['telefone_celular']) !== 11 || !is_numeric($_POST['telefone_celular'])) {
                $errors["telefone_celular"] = "O Telefone deve ter 11 dígitos.";
            }
    

            if (empty($_POST['cep'])) {
                $errors["cep"] = "Campo CEP é obrigatório.";
            }

            if (empty($_POST['endereço'])) {
                $errors["endereço"] = "Campo Endereço é obrigatório.";
            }

            if (empty($_POST['bairro'])) {
                $errors["bairro"] = "Campo Bairro é obrigatório.";
            }

            if (empty($_POST['cidade'])) {
                $errors["cidade"] = "Campo Cidade é obrigatório.";
            }

            if (empty($_POST['uf'])) {
                $errors["uf"] = "Campo UF é obrigatório.";
            }

            if (empty($_POST['num'])) {
                $errors["num"] = "Campo Número é obrigatório.";
            }

            // Verificação do login
            if (!empty($_POST['login'])) {
                $login = $_POST['login'];
            } else {
                $errors['login'] = "O campo de login não pode estar vazio.";
            }
            if (empty($_POST['login']) || strlen($_POST['login']) !== 6) {
            $errors["login"] = "O campo de login deve ter 6 caracteres.";
            }

            // Verificação da senha
            if (empty($_POST['senha']) || strlen($_POST['senha']) !== 8) {
            $errors["senha"] = "A senha deve ter 8 caracteres.";
            }
    
    
            if ($_POST['senha'] !== $_POST['cpPassword']) {
                $errors["cpPassword"] = "Senhas não compatíveis.";
            }
        }
    
        return $errors;
    }


    function validarCPF($cpf) {
    
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }

$errors = validateForm();

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
    // Se a validação for bem-sucedida, prossiga com a inserção no banco de dados
    include_once('config.php');
}

    if(isset($_POST['submit']) && empty($errors)) {

    include_once('config.php');

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
    $role =             $_POST['role'];

    $result = mysqli_query($conexao,"INSERT INTO usuario (cpf,nome,data_nascimento,sexo,nome_materno,telefone_celular,telefone_fixo,endereço,login,senha,cep,bairro,cidade,uf,num,role)
    VALUES ('$cpf','$nome','$dataNascimento','$sexo','$nomeMaterno','$telefoneCel','$telefoneFixo','$endereco','$login','$senha','$cep','$bairro','$cidade','$uf','$num','$role')");

    header("Location: login.php");
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
    <style>
        .error{
            color: red;
            font-size: 0.75rem;
            margin: 1px 0 0 2px;
        }
    </style>
</head>
<body>
 <div class="container">
        <div class="form-image">
            <a href="login.php"><img src="../imagens/TELA DE CADASTRO.png" alt="" srcset=""></a>
        </div>
        <div class="form">
        <form action="novaConta.php" id="form" method="post">
                <div class="form-header">
                    <div class="img-mob">
                       <img src="../imagens/telecall_logo.png">
                    </div>
                    <div class="login-btn">
                        <button><a href="login.php">Voltar</a></button>
                    </div> 
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="name">Nome Completo*</label>
                        <input id="name" type="text" name="nome" placeholder="Digite seu nome completo" class="required" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>">
                        <?php if (isset($errors["nome"])) {echo '<p class="error">' . $errors["nome"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="momname">Nome Materno*</label>
                        <input id="momname" type="text" name="nome_materno" placeholder="Digite o nome Materno" class="required" value="<?php echo isset($_POST['nome_materno']) ? $_POST['nome_materno'] : ''; ?>">
                        <?php if (isset($errors["nome_materno"])) {echo '<p class="error">' . $errors["nome_materno"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="date">Data de Nascimento*</label>
                        <input id="date" type="date" name="data_nascimento" class="required" value="<?php echo isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : ''; ?>">
                        <?php if (isset($errors["data_nascimento"])) {echo '<p class="error">' . $errors["data_nascimento"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="cpf">CPF*</label>
                        <input id="cpf" type="text" name="cpf" placeholder="000.000.000-00" class="required" maxlength="11" value="<?php echo isset($_POST['cpf']) ? $_POST['cpf'] : ''; ?>">
                        <?php if (isset($errors["cpf"])) {echo '<p class="error">' . $errors["cpf"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="tel">Telefone Celular*</label>
                        <input id="telc" type="tel" name="telefone_celular" placeholder="XX-XXXXXXXX." class="required" maxlength="11" value="<?php echo isset($_POST['telefone_celular']) ? $_POST['telefone_celular'] : ''; ?>">
                        <?php if (isset($errors["telefone_celular"])) {echo '<p class="error">' . $errors["telefone_celular"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="telf">Telefone Fixo*</label>
                        <input id="telf" type="tel" name="telefone_fixo" placeholder="XX-XXXXXXXX." class="required" maxlength="11" value="<?php echo isset($_POST['telefone_celular']) ? $_POST['telefone_celular'] : ''; ?>">
                        <?php if (isset($errors["telefone_fixo"])) {echo '<p class="error">' . $errors["telefone_fixo"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="adress">CEP*</label>
                        <input type="text" name="cep" id="cep" placeholder="Digite o CEP" class="required" maxlength="8" value="<?php echo isset($_POST['cep']) ? $_POST['cep'] : ''; ?>">
                        <?php if (isset($errors["cep"])) {echo '<p class="error">' . $errors["cep"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="adress">Endereço*</label>
                        <input type="text" name="endereço" id="endereço" placeholder="Digite o endereço" class="required" value="<?php echo isset($_POST['endereço']) ? $_POST['endereço'] : ''; ?>">
                        <?php if (isset($errors["endereço"])) {echo '<p class="error">' . $errors["endereço"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="adress">Bairro*</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro" class="required" value="<?php echo isset($_POST['bairro']) ? $_POST['bairro'] : ''; ?>">
                        <?php if (isset($errors["bairro"])) {echo '<p class="error">' . $errors["bairro"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="adress">Cidade*</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade" class="required" value="<?php echo isset($_POST['cidade']) ? $_POST['cidade'] : ''; ?>">
                        <?php if (isset($errors["cidade"])) {echo '<p class="error">' . $errors["cidade"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="adress">UF*</label>
                        <input type="text" name="uf" id="uf" placeholder="Digite o estado" class="required">
                        <?php if (isset($errors["uf"])) {echo '<p class="error">' . $errors["uf"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="adress">N°*</label>
                        <input type="text" name="num" id="num" placeholder="Digite o número da casa" class="required" value="<?php echo isset($_POST['num']) ? $_POST['num'] : ''; ?>">
                        <?php if (isset($errors["num"])) {echo '<p class="error">' . $errors["num"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="login">Login*</label>
                        <input id="login" type="text" name="login" placeholder="Digite seu Login" maxlength="6" class="required" value="<?php echo isset($_POST['login']) ? $_POST['login'] : ''; ?>">
                        <?php if (isset($errors["login"])) {echo '<p class="error">' . $errors["login"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="password">Senha*</label>
                        <input id="password" type="password" name="senha" placeholder="Crie uma nova senha"  maxlength="8" class="required">
                        <?php if (isset($errors["senha"])) {echo '<p class="error">' . $errors["senha"] . '</p>';} ?>
                    </div>
                    <div class="input-box">
                        <label for="cpassword">Confirme a Senha*</label>
                        <input id="cpassword" type="password" name="cpPassword" placeholder="Confirme a senha"  maxlength="8" class="required">  
                        <?php if (isset($errors["cpPassword"])) {echo '<p class="error">' . $errors["cpPassword"] . '</p>';} ?>
                    </div>
                </div>
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                        <?php if (isset($errors["sexo"])) {echo '<p class="error">' . $errors["sexo"] . '</p>';} ?>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="female" value="Feminino" name="sexo">
                            <label for="female">Feminino</label>

                        </div>
                        <div class="gender-input">
                            <input type="radio" id="male" value="Masculino" name="sexo">
                            <label for="male">Masculino</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="other" value="Outros" name="sexo">
                            <label for="other">Outros</label>
                        </div>
                        <div class="gender-input">
                            <input type="radio" id="none" value="Não Definido" name="sexo">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>
                    <input type="hidden" name="role" value="comum">
					<button type='submit' class ="continue-btn" name="submit">Enviar</button>
					<button type='reset' class ="continue-btn">Limpar</button>
        </form>
    </div>
 </div>
</body>
</html>