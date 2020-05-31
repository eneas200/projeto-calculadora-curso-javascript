<?php 

    includ("classe/conexao.php");
    if(isset($_POST["confirmar"]))
    {
        //p1 registro dos dados
        if(!isset($_SESSION))
        {
            session_start();

            foreach($_POST as $chaves=>$valor)
            {
                $_SESSION[$chave] = $mysqli->real_escape_string($valor);
            }
        }

        //p2 validação do dados
        if(strlen($_SESSION["nome"] == 0)) {
            $erro[] = "preencha o nome";
        }

        if(strlen($_SESSION["sobre"] == 0)) 
        {
            $erro[] = "preencha o sobrenome";
        }

        if(substr_count($_SESSION["email"], "@") != 1 || 
           substr_count($_SESSION["email"] , ".") < 1 || 
           substr_count($_SESSION["email"] , ".")  > 2)
        {
            $erro[] = "preencha o email corretamente";
        }

        if(strlen($_SESSION["niveldaceso"] == 0)) 
        {
            $erro[] = "preencha o nivel de acesso";
        }

        if(strlen($_SESSION["senha"] < 8 || strlen($_SESSION["senha"] > 16)) 
        { //strcmp(); // retornos desse metodo r1: retorna 0 se as string forem iguais, r2: retorna < 0, se a str1 < str2, e r3: retorna > 0 se a str1 > str2
            $erro[] = "preencha a senha corretamente";
            if(strcmp($_SESSION["senha"] == $_SESSION["rsenha"]) != 0)
            {
                $erro[] = "as senha confere";
            }
        }

        //p3 inserção no banco e redirecionamento
        if(count($erro) == 0){
            $sql_code = "insert into cliente (
                nome,
                sobrenome,
                sexo,
                email,
                senha,
                niveldeacesso,
                datacadastro)
                VALUES  
                (
                    '$_SESSION[nome]',
                    '$_SESSION[sobrenome]',
                    '$_SESSION[sexo]',
                    '$_SESSION[email]',
                    '$_SESSION[senha]',
                    '$_SESSION[niveldeacesso]',
                    '$_SESSION[datacadastro]'
                )"
            $confirma = $mysqli->(query($sql_code)) or die($mysqli->$error);
            if($confirma){
                unset($_SESSION['nome'],
                    $_SESSION['sobrenome'],
                    $_SESSION['sexo'],
                    $_SESSION['email'],
                    $_SESSION['senha'],
                    $_SESSION['niveldaceso'],
                    $_SESSION['datacadastro']);

                    echo "<script>location.href='404.php/index.php?p=index'</script>";
            } else {
                $erro[] = $confirma;
            }

        } else 


    }

?>


<h1>Cadastrar Usuario</h1>
<?php 
    if(count($erro) > 0)
    {
        echo "<div class='erro'>";
        foreach($erro as $valor) 
        {
            echo  $valor."</br>"; 
        }
        echo "</div>";
    }

?>
<!-- <link rel="styleshhet" href="index.html"/> -->
<a href="index.php?p=iniciar">Voltar</a>
<form action="index.php?p=cadastrar" method="POST">
    <label for="nome">nome </label>
    <input type="text" name="nome" require>
    <p class=espaco></p>

    <label for="sobre">sobrenome </label>
    <input type="text" name="sobre" require>
    <p class=espaco></p>

    <label for="email">e-mail </label>
    <input type="email" name="email" require>
    <p class=espaco></p>

    <label for="sexo">sexo</label>
    <select name="sexo">
        <option value="">selecione</option>
        <option value="1">Masculino</option>
        <option value="2">Feminino</option>
    </select>
    <p class=espaco></p>


    <label for="niveldaceso">nivel de acesso</label>
    <select name="niveldaceso">
        <option value="">selecione</option>
        <option value="1">basico</option>
        <option value="2">admin</option>
    </select>
    <p class=espaco></p>


    <label for="senha">senha</label>
    A senha deve ter entre 8 e 16 caracteres.
    <input type="password" name="senha" require>
    <p class=espaco></p>

    <label for="rsenha">repita senha</label>
    <input type="password" name="rsenha" require>
    <p class=espaco></p>
    <input type="submit" value="salvar" name="confirmar"/>


</form>