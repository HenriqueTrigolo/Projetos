function limparSelect(campo){
    while(campo.length > 1){
        campo.remove(1);
    }
}

function preencherMarca(data){

    let marca = document.getElementById("marca");
    limparSelect(marca);

    for( let index in data){
        const {nome, codigo} = data[index];

        let option = document.createElement("option");
        option.value = codigo;
        option.innerHTML = `${nome}`;
        marca.appendChild(option);
    }
}

function carregarMarca(){

    fetch("https://parallelum.com.br/fipe/api/v1/carros/marcas")
        .then(response => response.json())
        .then(data => preencherMarca(data))
        .catch(error => console.error(error))
}

function preencherModelo(data){
    let modelo = document.getElementById("modelo");
    limparSelect(modelo);

    for( let index in data["modelos"]){
        const {nome} = data["modelos"][index];

        let option = document.createElement("option");
        option.value = nome;
        option.innerHTML = `${nome}`;
        modelo.appendChild(option);
    }
}

function carregarModelo(valor){
    fetch("https://parallelum.com.br/fipe/api/v1/carros/marcas/"+valor+"/modelos")
        .then(response => response.json())
        .then(data => preencherModelo(data))
        .catch(error => console.error(error))
}

function iniciaRelogio(){
    var data = new Date;      
    var hora = data.getHours(); 
    var min = data.getMinutes();       
    var seg = data.getSeconds();      
    document.querySelector('.timer').value = hora+"h"+min+":"+seg;
    t=setTimeout('iniciaRelogio()',500);
}