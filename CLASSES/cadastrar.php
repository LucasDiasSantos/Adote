<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<html Lang ="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Tela de Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">

</head>
<body>
    <div id ="corpo-form-Cad">
    <h1>Cadastrar</h1>
        <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength = "30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength ="30">
        <input type="text" name="Endereço" placeholder="Endereco" maxlength = "50">
        <input type="text" name="Cpf" placeholder="Cpf" maxlength = "20">
        <input type="email" name= "email" placeholder="Usuario" maxlength = "40">
        <input type="password" name="senha" placeholder="Senha" maxlength = "15">
        <input type="password" name="confSenha"placeholder="Confirmar Senha"  maxlength = "15">
        <input type="submit" value="Cadastrar">
       </form>
    </div>
<?php

    if isset ($_POST['nome']);
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $endereco = addslashes($_POST['Endereço']);
        $cpf = addslashes($_POST['Cpf']);
        $usuario = addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        $confirmarSenha= addslashes($_POST['confSenha']);
        
        if (!empty($nome) && !empty($telefone) && !empty($endereco) && !empty($cpf) && !empty($usuario) && !empty($senha) && !empty($confSenha))
        
        {
                $u->conectar("projeto_login","localhost","root","");
                if($u->msgErro=="")
                {
                    if ($senha == $confirmarSenha)

                 {
                     if($u->cadastrar ($nome,$telefone,$endereco,$cpf,$usuario,$senha))
                    echo "Cadastrado com Sucesso!";
                }
                else
                {
                    echo "Email ja cadastrado!"
                }

                }
             else
        {
            echo "Senha e confirmar senha não correspondem";
        }

    }
        else 
        {

            echo "Erro: ".$u->msgErro;
        }
    } else
     {
         echo "Preencha todos os campos!";
     }
    }


?>




</body> 
</html>