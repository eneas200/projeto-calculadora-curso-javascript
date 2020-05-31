<?php  // INICIO DO PHP - PRINCIPAL(3)
	include("crud.php");
	include("classe.php");
	$obj = new TarefasServidor();
	$classes = new Manipulacao();
	obtemInformacoesForm($obj, $classes);

	

	

	function obtemInformacoesForm(TarefasServidor $obj, Manipulacao $classes) {
		$cliente = $gmai = $use = $password  = "";
		if($_SERVER["REQUEST_METHOD"] == "POST") // OBTENDO INFORMAÇÕES DOS INPUT
		{ // ARMAZENANDO NAS VARIAVEIS
			echo "<p style='margin-left:75%'><bold>SENA</bold> - Método:obtemInformacoesForm()</p>";
			$cliente = $classes->test_input($_POST["nome"]);
			$gmai = $classes->test_input($_POST["email"]);
			$use = $classes->test_input($_POST["usuario"]);
			$password = $classes->test_input($_POST["pass"]);

			// SE TODOS DADOS FORAM PREENCHIDO ÊXITO MOSTRA NA TELA, E INSERE NA TABELA
			if($classes->verifica($cliente) && $classes->verifica($gmai) && 
			   $classes->verifica($use)     && $classes->verifica($password))
			{ 
		  		// VERIFICAR SE O GMAIL LIDO, JA ESTA NA TABELA DO, DB - CADASTRO, STATUS: NÃO CONCLUIDO

				// chamada do metodo insere(); PARA SALVA O RIGISTRO NA TABELA
				$obj->insere($cliente, $gmai, $use, $password); 
				echo("<a href='formulario_login.php'>ja é cadastrado? acesse sua conta aqui<a/>");
				// echo "<script>location.href='formulario_login.php'</script>";
			} else 
			{ // SAIDA DE ERRO
				echo "<p><b>informações insuficiente\n não foi possivel enviar dados</b></p>";
			}
		}	
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>formulario - Cadastro</title> <!-- TITULO DA PAGINA -->
	<link rel="stylesheet" type="Text/CSS" href="css/bootstrap.css">
</head>
<body>
<!-- TITULO -->
<h5 style="margin-left:3%;color:green;font:normal 13pt Arial"><strong>SENA - <i>Cadastro</i></strong></h5>
<!-- FORMULARIO - CADASTRO (P1)--> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="myForm" onsubmit="return saida()">

	<label style="color:red;margin-left:1.3%;" for="nome">User:</label> <!--  este campo de nome-->
	<input autofocus autocomplete="off" type="text" name="nome"
	id="nome" maxlenght="2"/><br/><br/> <!-- ENTRA DO INPUT NOME -->

	<label style="color:red;margin-left:0.5%;" for="email">e-mail:</label> <!-- este e o campo de email -->
	<input type="Text" autocomplete="off" name="email" 
	id="email" maxlenght="3"/><br/></br/> <!-- ENTRADA DO INPUT E-MAIL -->

	<label style="color:red;margin-left:0.01%;" for="usuario">usuario:</label> <!-- este e o campo de usuario -->
	<input type="Text" name="usuario" autocomplete="off" 
	id="usuario" maxlenght="3" /><br/></br/> <!--ENTRADA DO INPUT USUARIO -->

	<label style="color:red;margin-left:0.8%" for="pass">senha:</label> <!-- este e o campo de senha -->
	<input style="width:13%" type="password" name="pass" 
	id="pass" maxlenght="3" /><br/></br/> <!-- ENTRADA DO INPUT SENHA-->

	<button style="padding:10px;margin-left:4.5%;width:13%" class="btn btn-primary" type="submit">click aqui</button><br/><br/><br/>
	 
	<!-- SAIDA DE MENSAGEM DA PAGINA --> 
	<p id="demo">saida:</p>
	<?php msg();?>

</form>
		<script src="js/bootstrap.js"></script>
</body>
</html>


<script> /* VALIDAÇÃO DE FORMULARIO - CADASTRO COM JAVASCRIPT (2)*/

		function saida() {
		// obtendo os dados do formulario
		var nome1 = document.forms["myForm"]["nome"].value
		var email1 = document.forms["myForm"]["email"].value
		var user1 = document.forms["myForm"]["usuario"].value
		var senha1 = document.forms["myForm"]["pass"].value
		
		// converte todas entrada dos input em string
		var nome2 = String(nome1)
		var email2 = String(email1)
		var user2 = String(user1)
		var senha2 = String(senha1)
		var teste = false
		
		// função que é chamada quando o usuario click no botão no evento onsubmit="saida()"
		if(nome2 != "" || email2 != "" || user2 != "" || senha2 != "") { 	//L.155 = filtra os dados vasios.
																			//L.156 = se todos input for preenchido,
																			//L.157 = imprima no console todos dados.
			console.log(nome2)
			console.log(email2)
			console.log(user2)
			console.log(senha2)
			return !teste 													//L.162 = e retorne true.
		} else { 															//L.163 = senao.
			alert("preencha todos os campos para avançar!") 				//L.164 = emite saida de erro.
			return teste 													//L.165 = e retorne false.
		}
		}
</script>

