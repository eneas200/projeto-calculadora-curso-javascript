<?php
    function msg(){
        echo "<h5 style='margin-left:70%'><i>(crud.msg()):bem vindo a pagina</i> <bold>crud.php<bold>&copy;</h5>";
    }

    /*
    metodo de inserir dados
    $nm ="Dona betania";
    $email = "betania354@gmail.com";
    $use = "carneiro";
    $senha = "#asd23@#";
    $id = 3;
    insere($nm, $email,$use,$senha);
    updateDados($nm,$id);*/

    // funcao de conexao com banco de dados

    // session_start();
    $obj = new  TarefasServidor();
    // print_r($obj->conexao());
    // $obj->updateDados("32","2");
    // $obj->deletaDados("5");
    // $obj->insere("geovana","geovana@hotmal.com","geovan10","321654987");
    // $obj->consultaDados();


// $servername, $username, $password,$database
class TarefasServidor
{

    // function __construct() {      }
    
    // função de conexao
    function conexao()
    {
        try 
        {	
            // variaveis de servidor
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cadastro";
            // realiza conexão com o dbs
            $conn = mysqli_connect($servername, $username, $password,$database);

            // Checka a connection
            if (!$conn) 
            {
                die("Connection failed: " . mysqli_connect_error());
            } else 
            {
                echo "<h5>Conectado no banco de dados com sucesso!</h5>";
            }
        } // fim do try
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        // mysqli_close($conn);
        return $conn; // retorna ca conexao realizada
    }

    // função de consulta
    function consultaDados($data1,$data2)        
    {
        
        // // realiza conexão com o db
        try {
            
            $conn = $this->conexao();
            $dadouse = $data1;
            $dadopas = md5($data2);
           
            $sql = "SELECT * FROM usuarios WHERE usuario = '$dadouse'";
            $result = mysqli_query($conn, $sql);

            echo("<style>");
            echo(".cores{ color: rgb(139, 123, 255); }");
            echo("</style>");
            if (mysqli_num_rows($result) > 0) 
            {
                echo "<ul>";
                while($row = mysqli_fetch_assoc($result))
                {
                    if(strcmp($row["usuario"], $dadouse) == 0 && strcmp($row["senha"], $dadopas) == 0) {
                        echo("<p>campos valido no db</p>");
                        echo "<li><i class='.cores'>identificador</i>: <b>" . $row["id"] . "</b> </li>";
                        echo "<li><i class='.cores'>nome</i>: <b>" . $row["nome" ] . "</b></li>";
                        echo "<li><i class='.cores'>e-mail</i>: <b>" . $row["email"] . "</b></li>";
                        echo "<li><i class='.cores'>usuario</i>: <b>" . $row["usuario"] . "</b></li>";
                        echo "<li><i class='.cores'>senha</i>: <b>" . $row["senha"] . "</b></li>";
                        echo "<p></p>";
                    } 
                }
                echo "</ul>";
            } else {
                echo "0 results";
            }
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        mysqli_close($conn);
    } // fim do metodo consultaDados

    // função de update ta ok
    function updateDados($registro,$campo)
    {  // realixa conecção com o banco de dados
        try {
            // variaveis de servidor
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cadastro";
            // realiza conexão com o dbs
            $conn = mysqli_connect($servername, $username, $password,$database);

            // Checka a connection
            if (!$conn) 
            {
                die("Connection failed: " . mysqli_connect_error());
            } else 
            {
                echo "<h5>Conectado no banco de dados com sucesso!</h5>";
            }
            $cpt = md5($registro);
            $sql1 = "UPDATE usuarios SET senha = '$cpt' WHERE id = '$campo'";

            // execulta a query e emite uma saida de resultado 
            if (mysqli_query($conn, $sql1)) {
                echo "dados alterado com sucesso!";
            } else {
                echo "erro ao alterar um dado: " . mysqli_error($conn);
            } 
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        mysqli_close($conn);
    } // fim do metodo updateDados

    // função de delete
    function deletaDados($id){
        

        // realixa conecção com o banco de dados
        try {
        
                // variaveis de servidor
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cadastro";
            // realiza conexão com o dbs
            $conn = mysqli_connect($servername, $username, $password,$database);

            // Checka a connection
            if (!$conn) 
            {
                die("Connection failed: " . mysqli_connect_error());
            } else 
            {
                echo "<h5>Conectado no banco de dados com sucesso!</h5>";
            }

            echo "conxao feita";
            $sql = "DELETE FROM usuarios WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                echo "dados deletado com sucesso!";
            } else {
                echo "erro ao deleta um dado: " . mysqli_error($conn);
            }
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        mysqli_close($conn);
    } // fim do metodo deletaDados

    // função de ineserção ta ok
    function insere($cliente,$gmai,$use,$senha){
                
        // variaveis de servidor
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cadastro";

        // realixa conecção com o banco de dados
        try {

            // inicia uma conexão nova cp p db
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            
            // resultado da conexão com o db
            if (!$conn) {
                die("falha na conexão: " . mysqli_connect_error());
            } else {
                echo "<h5>Conectado com sucesso!</h5>";
            }

            $cpt = md5($senha);
            // aqui insere os dados na tabela ususarios
            $sql = "INSERT INTO usuarios (nome,email,usuario,senha)
            VALUES ('$cliente','$gmai','$use','$cpt')";
            // verifica se occorreu algum erro
            if (mysqli_query($conn, $sql))
            {
                echo "<p style='margin-left:75%'>Saida:(msg) dados inseridos con sucesso!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }            
            }
            catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        
            mysqli_close($conn);
    } // fim do metodo insere
}

// funcao de retorno de consulta
function mostrainfortabela($server,$name, $password,$dbname)
{
    $conect = conexao($server,$name, $password,$dbname);
    // $obtinf = ;#obtemdadoinput("cUser");
    $sql = "SELECT * FROM usuarios WHERE usuario = 'admin'";
    $result = mysqli_query($conect,$sql);
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
    if(mysqli_num_rows($result) > 0){
        echo "ok";
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['usuario'];
        }
    }
}

// metodo que retorna um campo do formulario
function obtemdadoinput($paran){
    $username = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = test_input($_POST["$paran"]);
        return $username;
    }
}


 
     

 
?>

