
function desabilita(estado){
    var input = document.querySelector("#date");
    input.disabled =  estado;
}

function limparSelect(campo){
    while(campo.length > 1){
        campo.remove(1);
    }
}

function preencherBancos(data){

    let bancos = document.getElementById("bancos");
    limparSelect(bancos);

    for( let index in data){
        const {ispb, name, code, fullName} = data[index];

        let option = document.createElement("option");
        option.value = fullName;
        option.innerHTML = `${code}-${name}`;

        bancos.appendChild(option);
    }
}

function carregarBancos(){

    fetch("api.js")
        .then(response => response.json())
        .then(data => preencherBancos(data))
        .catch(error => console.error(error))
}


function registra(){
    const TipoDeChave = document.querySelector('select[name="TipoDeChave"]').value;
    const ValorDaChave = document.querySelector('input[name="chave"]').value;
    const ValorReais = document.querySelector('input[name="valor"]').value;
    var ValorData = document.querySelector('input[name="data"]:checked').value;
    

    if(ValorData == "Agendar"){
        ValorData = document.querySelector('input[type="date"]').value;
    }
    
    
    const Banco = document.querySelector('select[name="bancos"]').value;

    alert(  "Resumo do Envio:"+
            "\nChave Selecionada: "+TipoDeChave+
            "\nChave: "+ValorDaChave+
            "\nQuantia Transferida: R$"+ValorReais+
            "\nData da transferencia: "+ValorData+
            "\nBanco: "+Banco)
}

var saldoInicial = 1000;

function saldo(){

    Resumo.visor.value = "R$" + saldoInicial;
}

function mostraChave(value){

    if(value == "cpf"){
        Visor_da_chave.visor.value = "32258740126";
    }if (value == "cnpj") {
        Visor_da_chave.visor.value = "54951723000199";
    }if (value == "email") {
        Visor_da_chave.visor.value = "henrique.almeida@aluno.ufop.edu.br"
    }if (value == "celular") {
        Visor_da_chave.visor.value = "011962093870";
    }if (value == "chave aleatoria") {
        Visor_da_chave.visor.value = randomString(32, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
    }
}

function randomString(length, chars) {
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}
