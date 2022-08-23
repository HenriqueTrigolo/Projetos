function verifica(numero){
    var total_leds = 0;

    for(let i = 0; i < numero.length; i++){
        if(numero[i] == 1){
            total_leds += 2;
        }
        if(numero[i] == 2){
            total_leds += 5;
        }
        if(numero[i] == 3){
            total_leds += 5;
        }
        if(numero[i] == 4){
            total_leds += 4;
        }
        if(numero[i] == 5){
            total_leds += 5;
        }
        if(numero[i] == 6){
            total_leds += 6;
        }
        if(numero[i] == 7){
            total_leds += 3;
        }
        if(numero[i] == 8){
            total_leds += 7;
        }
        if(numero[i] == 9){
            total_leds += 6;
        }
        if(numero[i] == 0){
            total_leds += 6;
        }
    }

    return total_leds
}