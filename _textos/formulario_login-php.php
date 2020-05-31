PHP
ETAPA - VALIDAÇÃO E ARMAZENA DADOS DO FORMULARIO:
    1: - obter as informaçao do formulario
    2: verificar se o campo dos input existi e se nao esta vasio
    3:-  se verdadeiro: usar a função para limpar os dados conta atack hacker
    4: - se falso: nao faça nada ou emita na tela um alerta de campos vasio
    função:
        1: - test_input($valor);
    função do PHP
        1: - trim($valor);
        2: - htmlspecialchars($valor);
        3: - stripslashes($valor);
        4: - strcmp($string1,$string2);
        5: - strlen(string);
        6: - count($array); 
        

ETAPA - BANCO DE DADOS :
    1: - ABRI CONEXAO COM BANCO DE dados
    2: - REALIZA UMA CONSULTA NO BANCO DE TODOS OS CAMPOS DE REGISTRO
    3: - TENDO AS INFORMAÇÕES DO FORMULARIO login/senha NAS VARIAVEIS
         E TENDO OS REGISTROS DA TABELA USUARIO/SENHA FAZ A COMPARAÇÕA
         SE SÃO IGUAIS SE VERDADEIRO redireciona PARA PAGINA INICIAR
         SE FALSO EMITE MSG DADOS INVALIDO
        
--------------------------------------------------------------------------------------------------
HTML
menu-padrao

[AQUI ENTRA UMA FOTO]

Menu Principal
- ?
- ?
- ?
- ?
- ?

Acesse a pagina Principal do usuario
Formulário de login
por Enéas sena
Atualizado em 01/Fevereiro/2020

Identificação do Usuário
    usuario:
    Senha:
[AQUI ENTRA UM LINK PARA A PAGINA DE CADASTRO]
[BOTÃO ENVIAR]

Copyright 2020 - by Enéas sena
Facebook | Instagram
--------------------------------------------------------------------------------------------------

JAVASCRIPT:
ETAPA1 :
    1: - obter os campos de input do formulario v
    2: - armazena todos dados do inptu nas variaveis v
    3: - verificar se tem algum campo esta vasio
    4: - se verdadeiro: emite um alerta, preencha todos os campo corretamente
    5: - se falso: nao faça nada ou emita um alerta com msg dados preenchido corretamente
    6: - apos todos campos estiver preenchido corretamente redireciona para lado-servidor
    Funções:
        1: - validacaoDdados();
    Função interna javaScript:
        1: - location.href = "nome-do-arquivo.extenção"

--------------------------------------------------------------------------------------------------

<?php
    $servername = "localhost";
    $username = "root";
    $senha = "";
    $dbname = "cadastro";
    echo "<pre>";
    // // print_r(conexao($servername,$username,$senha,$dbname));
    // // var_dump(conexao($servername,$username,$senha,$dbname));
    // print_r(obteminfor(conexao($servername,$username,$senha,$dbname)));
    echo "</pre>";
    // var_dump(conexao($servername,$username,$senha,$dbname));
    obteminfor(conexao());
    function obteminfor($connect)
    {
        $username = $password = "";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        { // se estiver dados na suberglobal post obtem e armazena na variavel
            if(!empty($_POST["cUser"]) && !empty($_POST["senha"]))
            { // se os dados nao for vasio armazena na variavel
                $username = test_input($_POST["cUser"]); // armazena login - usuario
                $password = test_input($_POST["senha"]); // armazena senha - usuario
                echo "<p>campos preenchidos</p>";
                echo "<p>".$username."</p>";
                echo "<p>".$password."</p>";  
                
                $sql = "SELECT * FROM usuarios;# WHERE usuario = '$username'";     // consulta registro da tabela	
                $result = mysqli_query($connect, $sql); // e execulta a query sql

                // verifica se foi encontrado algum registro na tabela
                if (mysqli_num_rows($result) > 0) 
                {
                    while($row = mysqli_fetch_assoc($result))
                    { 

                        if(strcmp($row['usuario'],$username) == 0 && strcmp($row['senha'],$password) == 0) 
                        {
                            echo "<script>location.href='home.php'</script>";
                            echo "<pre>";
                            var_dump($connect);
                            echo "</pre>";
                            echo "<p>".$row["id"]."</p>";
                            echo "<p>".$row["nome"]."</p>";
                            echo "<p>".$row["email"]."</p>";
                            echo "<p>".$row["usuario"]."</p>";
                            echo "<p>".$row["senha"]."</p>";
                        }
                    }
                }
            }
        }
        return $connect;
    }

  
    function verifica($data) {
        if(isset($data) && !empty($data)){
            return true;
        } else {
            return false;
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>formulario de login</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="xEmail">User:</label><br> 
        <input autofocus type="text" id="xUser" name="cUser"><br> <!-- INPUT LOGIN-->
        
        <label for="senha">Senha</label><br>
        <input type="password" id="senha" name="senha"><br> <!-- INPUT SENHA -->
        
        <a href="formulario_cadastro.php">cadastre-se</a> <!-- LINK PARA PAG-CADASTRO-->
        <input type="submit" name="btn-logar" value="logar"/> <!-- BOTOA ENVIAR-->
        
    </form>
</body>
</html> 
