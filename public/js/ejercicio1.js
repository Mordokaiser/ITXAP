function rut() {

    //conseguir cuerpo del rut con limites razonables
    const numeroRandom = Math.floor(Math.random() * (99999999 - 1000000 + 1)) + 1000000;
    const cuerpo = String(numeroRandom);
    const dv = digitoVerificador(cuerpo);
    const rutCompleto = formatearRut(cuerpo + dv);

    document.getElementById('rut').textContent = rutCompleto;
}
//funcion que calcula el digito verificador del rut
function digitoVerificador(rut) {
    let suma = 0;
    let factor = 2;
    
    for (let i = rut.length - 1; i >= 0; i--) {
        suma += parseInt(rut.charAt(i)) * factor;
        factor = factor === 7 ? 2 : factor + 1;
    }
    
    const dv = 11 - (suma % 11);
    return dv === 11 ? '0' : dv === 10 ? 'K' : dv.toString();
}
//funcion que añade puntos y el guion del rut
function formatearRut(rut) {
    const rutParte1 = rut.substring(0, rut.length - 1);
    const rutParte2 = rut.charAt(rut.length - 1);
    /*
    buscar grupos de 3 elementos que no sean al inicio o al final de la variable
    rutParte1 y añadir puntos, luego el guion y el digito verificador
    */
    return rutParte1.replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "-" + rutParte2;
}