 
    <title>Pagina De classes PHP</title>
 
<?php

    $obj = new Manipulacao();
    $obj->msgClasse();
    // $obj->mostraNtela();


    class Manipulacao {
        // atributos privados da classe Manipulação
        private $nome = "carlinhos";
        private $sobrenome = "silva";
        private $email = "carlinho23@gmail.com";
        private $senha = "carlos$$$";
        private $usuario = "carlinhos12";
        
        function msgClasse(){
            echo "<h5 style='margin-left:70%'><i>(classe.msgClasse()):bem vindo a pagina</i> <bold>classe.php<bold>&copy;</h5>";
        }

        // metodos de acesso SET
        function setNome($nome){ $this->nome = $nome; }
        function setSobreNome($sobrenome){ $this->sobrenome = $sobrenome; }
        function setEmail($email){ $this->email = $email; }
        function setSenha($senha){ $this->senha = md5($senha); }
        function setUsuario($usuario){ $this->usuario = $usuario; }

        // metodos de acesso GET
        function getNome(){ return $this->nome; }
        function getSobrenome(){ return $this->sobrenome; }
        function getEmail(){ return $this->email; }
        function getSenha(){ return $this->senha; }
        function getUsiario(){ return $this->usuario; }

        function teste_logico(){
            // varifica se o usuario e valido se verdadeiro redireciona a uma nova pagina
            if(strcmp($row['usuario'],$username) == 0 && strcmp($row['senha'],$password) == 0) 
            {
                return true;
                // echo "<script>alert('voce esta logado com sucesso!')</script>";
                // echo "<script>location.href='home.php'</script>";
            } else {
                return false;
            }
        }

        function buscaNinput($data){
            $informacao_input = "";
            if($_SERVER["REQUEST_METHOD"] == "POST")
            { // se estiver dados na suberglobal post obtem e armazena na variavel
                if($this->verifica($_POST["$data"]) )
                { // se os dados nao for vasio armazena na variavel
                    $informacao_input = $this->test_input($_POST["$data"]);
                    // echo "<p><i>dados armazenado </i> - <b>" . $informacao_input ."</b></p>";
                } // a linha 37 emite na tela o valor da variavel $informacao_input
                else {
                    echo "<p>preencha todos campos corretamente!</p>";
                }
            }
            
            return $informacao_input ;
        }    
        
        // esta função emite a saida com os valores dos atributos          
        function mostraNtela(){
            echo "<ul>";
            echo "<li><i>Nome </i> - <b>" . md5($this->getNome()) ."</b></li>";
            echo "<li><i>Sobrenome </i> - <b>" . md5($this->getSobrenome()) ."</b></li>";
            echo "<li><i>E-mail </i> - <b>" . md5($this->getEmail()) ."</b></li>"; 
            echo "<li><i>Senha </i> - <b>" . md5($this->getSenha()) ."</b></li>";
            echo "<li><i>Usuario </i> - <b>" . md5($this->getUsiario()) ."</b></li>";
            echo "</ul>";
        }
        
        function verifica($data) {
            if(isset($data) && !empty($data)){
                return true;
            } else {
                return false;
            }
        }
    
        function test_input($data){
            $data = trim($data);			// tira espaços do inicio e fim 
            $data = stripslashes($data);     // converte dados para string
            $data = htmlspecialchars($data); // converte dados para string
            $data = addslashes($data);       // converte dados para string
            return $data;
        }

    }


?>
<!-- grupo de linguagens operantes nesse projeto o sql tambem se inclui -->
<?php 
	// comentario php
	/** lado-servidor
	 * comentario para documentação em bloco
	 */
    // METODOS QUE NAO TO USANDO NAS LINHAS ABAIXO


    // FUNCAO QUE LIMPA AS VARIAVEIS
	function limpandoform()
	{ 
		$cliente = $gmai = $use = $password  = "";
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			echo "<p style='margin-left:75%'><bold>SENA</bold> - Método:obtemInformacoesForm()</p>";
			$cliente = test_input($_POST["nome"]);
			$gmai = test_input($_POST["email"]);
			$use = test_input($_POST["usuario"]);
			$password = test_input($_POST["pass"]);

			if(verifica($cliente) && verifica($gmai) && verifica($use) && verifica($password))
			{ // FUNÇÃO INTERNA QUE LIMPA INPUTS
				limpa_variavel($cliente);
				limpa_variavel($gmai);
				limpa_variavel($use);
				limpa_variavel($password);
			}
		}
    }
    
    function obtemInformacoeseImprime()
	{ // FUNCAO QUE ACESSA E GERA SAIDA DE INPUTS, DE FORMA DETALHADA
		$cliente = $gmai = $use = $password  = "";
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			echo "<p style='margin-left:75%'><bold>SENA</bold> - Método:obtemInformacoesForm()</p>";
			$cliente = test_input($_POST["nome"]);
			$gmai = test_input($_POST["email"]);
			$use = test_input($_POST["usuario"]);
			$password = test_input($_POST["pass"]);

			if(verifica($cliente) && verifica($gmai) && verifica($use) && verifica($password))
			{
				var_dump($cliente);
				var_dump($gmai);
				var_dump($use);
				var_dump($password);
			}
		}
	}


?>
<style>
	/* lado-cliente */
	/* comentario css em bloco*/
	/** comentario para 
	documentar o codigo 
	em bloco*/
</style>

<script>
	// lado-cliente
</script>

<html>
	<!-- lado-cliente -->
</html>


