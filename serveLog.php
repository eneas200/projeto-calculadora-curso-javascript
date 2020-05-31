<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Serve Login</title>
    
</head>
<body>
    <article id="corpo">
        <?php
        /*
            $login = "";
            $senha = "";

            if(isset($_POST["cUser"]) && isset($_POST["senha"])) {
                if(!empty($_POST["cUser"]) && !empty($_POST["senha"])){
                    $login = htmlspecialchars($_POST["cUser"]);
                    $senha = htmlspecialchars ($_POST["senha"]);
                }
                echo "<li>Usuario: " . $login . "</li>";
                echo "<li>Password: " . $senha . "</li>";
            } else {
                echo "<p>Estes dadso nao exite!</p>";
            }
            */
        ?>
<?php


        $servename = "localhost";
        $username = "root";
        $senha = "";
        $dbname = "cadastro";
            
        // Create connection
        $conn = mysqli_connect($servename, $username, $senha,$dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "<h5>Conectado com sucesso!</h5>";
        }

        $sql = "SELECT * FROM usuarios;# WHERE nome = 'eneas'";
        $result = mysqli_query($conn, $sql);
        $use_nome = $use_email = $use_senha = $use_usuario = "";

        if (mysqli_num_rows($result) > 0) 
        {
             
            while($row = mysqli_fetch_assoc($result)) 
            {
                if(strcmp($row["nome"], "pedro") == 0) 
                {
                    $use_id = $row["id"];
                    $use_nome = $row["nome"];
                    $use_email = $row["email"];
                    $use_senha = $row["senha"];
                    $use_usuario = $row["usuario"];
                     
                } else {
                        echo "";
                }

                echo "<ul>";
                
                echo "<li><strong>id: </strong>" . $row["id"]."</li>";
                echo "<li><strong>Nome: </strong>" . $row["nome"]."</li>";
                echo "<li><strong>e-mail: </strong>" . $row["email"]. "</li>";
                echo "<li><strong>User: </strong>" . $row["usuario"]. "</li>";
                echo "<li><strong>Password: </strong>" . $row["senha"]. "</li>";
                echo "</ul>";
                    // header("location: home.php");            
                // }else {
                //     header("location: formulario_login.php");
                // }
            }
            
        } else {
            echo "nenhum dados de usuario foi encontrado no banco de dados";
        }  
// Create database
/*
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
    }
*/

mysqli_close($conn);


?>
    <h1>formulario de alterar/deletar registro</h1>
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Nome: <input type="text" value="<?php echo $use_nome; ?>" name="nome"/><br><br>
            email: <input type="email" value="<?php echo $use_email; ?>" name="email"/><br><br>
            usuario: <input type="text" value="<?php echo $use_usuario; ?>" name="usuario"/><br><br>
            senha: <input type="password" value="<?php echo $use_senha; ?>" name="senha"/><br><br>

            <input type="submit" value="alterar"/>

        </form>
    </div>
    
<br>
<br>
<br>
        <a href="formulario_login.php">voltar click aqui</a>
    </article>
    <footer id="rodape">
        <p> &copy;Desenvolvido por - Enéas Senna. </p>
    </footer>
</body>
</html>
<?php
    
    function obteminputs($id){
        $n =  $e = $u = $p = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {   
            // echo "ta ok";
            $i = $id;
            $n = $_POST['nome'];
            $e = $_POST['email'];
            $u = $_POST['usuario'];
            $p = $_POST['senha'];
            echo "<p>".$n."</p>";
            echo "<p>".$n."</p>";
            echo "<p>".$e."</p>";
            echo "<p>".$u."</p>";
            echo "<p>".$p."</p>";
            alter_input_registro($i, $n, $e, $u, $p);
             
        }

    }

    function alter_input_registro($i,$n, $e, $u, $p)
    {
        try {
            $servename = "localhost";
            $username = "root";
            $senha = "";
            $dbname = "cadastro";
                
            // Create connection
            $conn = mysqli_connect($servename, $username, $senha,$dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                echo "<h5>Conectado com sucesso!</h5>";
            }
            $sql = "UPDATE usuarios 
                    SET nome = '$n', email = '$e', usuario = '$u', senha = '$p'
                    WHERE id = '$i'";
            if(mysqli_query($conn, $sql))    {
                echo "<li>registro alterdo</li>";
            } else {
                echo "<li>nao foi possivel altera registro</li>".mysqli_error($conn);
            }

        } catch (PDOException $th) {
            echo "erro " . $th;
        }
        

    }

















?>


