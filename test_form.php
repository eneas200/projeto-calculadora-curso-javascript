<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    Name: <input type="text" name="name" id="nome">
    E-mail: <input type="text" name="email" id="email">
    Website: <input type="text" name="website" id="website">

    <input type="submit" value="click aqui"/>

</form>

<?php

    $nom = $ema = $web = "tudo ok";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom = test_input1($_POST["name"]);
        $ema = test_input1($_POST["email"]);
        $web = test_input1($_POST["website"]);
        echo "<p><b>Nome: </b>".$nom."</p>";
        echo "<p><b>Email: </b>".$ema."</p>";
        echo "<p><b>Website: </b>".$web."</p>";

    }

    function msg(){
        echo "<p>a pagina test_form.php foi incluida com sucesso!</p>";
    }

    function test_input1($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
    

?>