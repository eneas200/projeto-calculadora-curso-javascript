 

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
