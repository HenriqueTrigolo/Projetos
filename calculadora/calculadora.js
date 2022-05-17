function calculo(numero){
    Calculator.visor.value = Calculator.visor.value + numero;
}

function remover(){
    Calculator.visor.value = Calculator.visor.value.slice(0, -1);
}