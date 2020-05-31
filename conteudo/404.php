<h1>erro 404</h1>
<h5>pagina nao encontrada!</h5>
<?php  

    $msg1 = "nome1";
    $msg2 = "nome1";
    $arr[] = $msg1;
    $arr[] = $msg2;
    echo "resultado da comparação de string :";
    var_dump(strcmp($msg1,$msg2)); // compara dua string
    if(strcmp($msg1,$msg2) == 0) {
        echo "verdadeiro</br>";
        echo $arr[0]."</br>";
        echo $arr[1]."</br>";

    } else 
    echo "falso";
    echo "<p>tamanho da string: " . strlen($msg1)."</p>"; // retorna o tamanho de uma var/string
    echo "<p>tamanho do array: " . count($arr)."</p>"; // retorna o tamanho de um array
    echo substr_count($msg2,"."); // verifica se existe o nome na variavel
    $ret = substr_count("eneas@gmail.com","@"); // reconmendado usar em validação de email de formularios
    echo "<pre>";
    print_r($ret);
    echo "</pre>";
?>

<input type="color" name="cor">