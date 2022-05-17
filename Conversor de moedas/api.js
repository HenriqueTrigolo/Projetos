function preencherMoedas1(data){

    let moedas = document.getElementById("moeda1");

    for(let index in data.value){
        
        const {simbolo, nomeFormatado, tipoMoeda} = data.value[index];
        let option = document.createElement("option");
        option.value = `${simbolo}-${tipoMoeda}`;
        option.id = tipoMoeda;
        option.innerHTML = nomeFormatado;

        moedas.appendChild(option);
    }
}

function carregarMoedas1(){
    fetch("https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$skip=0&$format=json&$select=simbolo,nomeFormatado,tipoMoeda")
        .then(response => response.json())
        .then(data => preencherMoedas1(data))
        .catch(error => console.error(error))
}

function preencherMoedas2(data){

    let moedas = document.getElementById("moeda2");

    for(let index in data.value){
        const {simbolo, nomeFormatado, tipoMoeda} = data.value[index];
        let option = document.createElement("option");
        option.value = `${simbolo}-${tipoMoeda}`;
        option.id = tipoMoeda;
        option.innerHTML = nomeFormatado;

        moedas.appendChild(option);
    }
}

function carregarMoedas2(){
    fetch("https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$skip=0&$format=json&$select=simbolo,nomeFormatado,tipoMoeda")
        .then(response => response.json())
        .then(data => preencherMoedas2(data))
        .catch(error => console.error(error))
}

async function pegaValor1(link){
    const response = await fetch("https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda='"+link+"'&@dataCotacao='05-12-2022'&$top=100&$format=json&$select=paridadeCompra")
        .then(response => response.json())
        .then(data => {
            return data.value[0].paridadeCompra;
        })
        .catch(error => console.error(error))
    return response
}

async function converter(){
    const m1 = document.getElementById('moeda1').value.split("-");
    const m2 = document.getElementById('moeda2').value.split("-");
    let valorEntrada = document.getElementById("entrada").value;
    let valorMoeda1 = await Promise.resolve(pegaValor1(m1[0]));
    let valorMoeda2 = await Promise.resolve(pegaValor1(m2[0]));
    
    if(m1[1] == 'A' && m2[1] == 'A'){
        document.getElementById("saida").value = (valorMoeda2/valorMoeda1)*valorEntrada;
    }
    if(m1[1] == 'A' && m2[1] == 'B'){
        document.getElementById("saida").value = ((1/valorMoeda2)/valorMoeda1)*valorEntrada;
    }
    if(m1[1] == 'B' && m2[1] == 'A'){
       document.getElementById("saida").value = (valorMoeda2/(1/valorMoeda1))*valorEntrada;
    }
    if(m1[1] == 'B' && m2[1] == 'B'){
        document.getElementById("saida").value = (valorMoeda1/valorMoeda2)*valorEntrada;
    }
}