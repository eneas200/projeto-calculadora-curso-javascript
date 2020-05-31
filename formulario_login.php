
<?php

	// INCLUINDO PAG-CRUD.PHP(1)
	include("crud.php");
	include("classe.php");
	msg();


?>
<DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Pagina - Formulario Login</title>
		<link type="Text/CSS" rel="stylesheet" href="css/bootstrap.css"/> <!-- ARQUIVO DE CLASSES/CSS/BOOTSTRAP-->
	</head>
	<body>
		<h3 id="demo"><b>Pagina</b> - <i>Login</i></h3>
		
		<div id="formulario"> <!-- FORMULARIO - LOGIN (2)-->
	 
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validaLog()" >
                <label for="xEmail">User:</label><br> 
				<input autofocus type="text" id="xUser" name="cUser"><br> <!-- INPUT LOGIN-->
                
				<label for="senha">Senha</label><br>
                <input type="password" id="senha" name="senha"><br> <!-- INPUT SENHA -->
				
				
				<a href="formulario_cadastro.php">cadastre-se</a> <!-- LINK PARA PAG-CADASTRO-->
				<input type="submit" class="btn btn-primary"  value="logar"/> <!-- BOTOA ENVIAR-->
			</form>
		<?php // php
			$connection = new TarefasServidor();
			


			$obj = new Manipulacao();
			$v1 = $obj->buscaNinput("cUser");
			$v2 = $obj->buscaNinput("senha");
			echo("<p>".$v1."</p>");
			echo("<p>".$v2."</p>");
			$connection->consultaDados($v1,$v2);
		 
			// if(strcmp($v1, "admin") == 0 && strcmp($v2, "admin") == 0) {
			// 	echo("<p>campos valido no db</p>");

			// } else {
			// 	echo("<p>campos invalido no db</p>");
			// }
		?>
			<p id="erroLog"></p>
			<p id="erroPass"></p>
        </div>
		
		<script type="js/bootstrap" scr="/js/bootstrap.js"></script><!-- ARQUIVO DE CLASSES/JS/BOOTSTRAP-->
	
</body>
</html>	

<script>
	/* VALIDAÇÃO JAVASCRIPT(3)*/
	function validaLog() {

	// obtem as informação vinda do formulario e armazena nas variaveis log, pss;
	var log = document.forms["validaDados"]["xUser"].value
	var pss = document.forms["validaDados"]["senha"].value
	var cLog = String(log) // converção de dados para string e armazena na variavel cLog
	var cPss = String(pss) // converção de dados para string e armazena na variavel cPss
	var teste = false // variavel de retorno true/false
	var erroL = document.getElementById("erroLog") // obtem o elemento de saida com id erroLog;
	var erroP = document.getElementById("erroPass") // obtem o elemento de saida com id erroPass;
	alert("ok")
	// veriicação do campo usuario
	if(cLog != ""){
		console.log(cLog)
		teste = true
	} else {
		erroL.style.color = "red"
		erroL.innerHTML = "Campo login vasio"
		console.log("Campo login vasio")
		teste = false
	}

	// veriicação do campo password
	if(cPss != "") {
		console.log(cPss)
		teste = true
	} else {
		erroP.style.color = "#fff"
		erroP.innerHTML = "campo senha vasio"
		console.log("campo senha vasio")
		teste = false
	}

	// resultado da leitura dos dados, e confirmação se os dados forão lidos com êxito;
	if(teste){
		alert("informações contidas com êxito")
		erroP.innerHTML = "informações contidas con Êxito"
		teste = true
	} else {
		alert("Erro na obtençã das informação de login")
		teste = false
	}
	// retorno da variavel logica, teste, true/false;
	return teste
	}


</script>