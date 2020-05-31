<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagina de teste:</title>
</head>
<body>
    <h1>Seja bem-vindo(a).</h1>
    <h2>voce esta logado!</h2>
    <?php
        // INCLUINDO PAG-CRUD.PHP(1)
        include("crud.php");
        msg();
    ?>

    <p><a href="formulario_login.php">Sair</a></p>
    <p><a href="formulario_login.php">logar</a></p>
    <p><a href="formulario_cadastro.php">cadastrar</a></p>
    <p><a href="#">alterar dados</a></p>
    <p><a href="#">deletar dados</a></p>
    

</body>
</html>
