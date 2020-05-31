<!--  -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Usuario</title>
    <style>
        .principal  {
            width: 50%;
            margin: 0 auto;
            background-color: #FFF;
            border: 1px solid black;
            border-radius: 52px;
        }
        body {
            background: #eaeaea;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }
        label{ display: block; font-weight: bold; }
        .espaco{ height: 15px; display: block; }
        input{ font-size: 16px; border: 5px solid black; }
    
        .titulo {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class=principal>
        
    <?php 
    echo "ok";
    include("cadastrar.php");
    $t = isset($_GET['p']);
    var_dump($t);
    if(isset($_GET['p'])) {
        $pagina = $_GET['p'].".php";

    }
    //  else 
        // include("404.php");


?>

    </div>
</body>
</html>
