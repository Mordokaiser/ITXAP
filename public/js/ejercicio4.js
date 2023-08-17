
let matrizGenerada = []; // Matriz para almacenar los valores iniciales
let matrizTemp = [];// Matriz para almacenar los valores modificados
document.addEventListener('DOMContentLoaded', function () {
    const generarBtn = document.getElementById('generarBtn');
    generarBtn.addEventListener('click', generarTabla);
});

function generarTabla() {
    // Ocultar botón guardar
    document.getElementById('guardarBtn').style.display = 'none';  // No mostrar el botón "Ordenar"
    const ordenarBtn = document.getElementById('ordenarBtn');
    const invertirBtn = document.getElementById('invertirBtn');
    const filasInput = document.getElementById('filas');
    const columnasInput = document.getElementById('columnas');
    const tablaContainer = document.getElementById('tablaContainer');

    const filasStr = filasInput.value.toString();
    const columnasStr = columnasInput.value.toString();

    let errorMessage = '';

    // Validar que los valores ingresados sean números enteros positivos
    if (filasStr.indexOf('.') !== -1 || filasStr.indexOf(',') !== -1 || isNaN(filasStr) || parseInt(filasStr) <= 0) {
        errorMessage += 'Ingresa un número entero positivo válido en el campo de filas.\n';
    }

    if (columnasStr.indexOf('.') !== -1 || columnasStr.indexOf(',') !== -1 || isNaN(columnasStr) || parseInt(columnasStr) <= 0) {
        errorMessage += 'Ingresa un número entero positivo válido en el campo de columnas.\n';
    }

    if (errorMessage) {
        alert(errorMessage);
        return;
    }

    const filas = parseInt(filasStr);
    const columnas = parseInt(columnasStr);
    matrizGenerada = []; // Limpiar la matriz generada previamente

    let tablaHTML = '<table>';
    for (let i = 0; i < filas; i++) {
        const fila = [];
        tablaHTML += '<tr>';
        for (let j = 0; j < columnas; j++) {
            const valor = Math.floor(Math.random() * 1000) + 1;
            fila.push(valor); // Agregar el valor a la fila de la matriz
            tablaHTML += `<td>${valor}</td>`;
        }
        matrizGenerada.push(fila); // Agregar la fila a la matriz generada
        tablaHTML += '</tr>';
    }
    tablaHTML += '</table>';

    tablaContainer.innerHTML = tablaHTML;
    //Vaciar matriz temporal
    matrizTemp = [];
    //Ver si mostrar el botón o no
    if (matrizGenerada.length > 0) {
        ordenarBtn.style.display = 'block'; // Mostrar el botón "Ordenar"
    } else {
        ordenarBtn.style.display = 'none'; // No mostrar el botón "Ordenar"
        invertirBtn.style.display = 'none'; // No mostrar el botón "Ordenar"
        
    }
}

function ordenarMatriz() {
    // Crear una copia plana de todos los elementos de la matrizGenerada
    const elementos = [].concat(...matrizGenerada);

    let ordenada = false;
    while (!ordenada) {
        let cont = 0;
        for (let i = 0; i < elementos.length - 1; i++) {
            if (elementos[i] > elementos[i + 1]) {
                // Intercambiar elementos si el elemento actual es mayor que el siguiente
                const temp = elementos[i];
                elementos[i] = elementos[i + 1];
                elementos[i + 1] = temp;
            } else {
                cont++;
            }
        }
        if (cont === elementos.length - 1) {
            ordenada = true;
        }
    }

    // Distribuir los elementos ordenados nuevamente en la matriz temporal
    let elementoIndex = 0;
    for (let i = 0; i < matrizGenerada.length; i++) {
        const filaTemp = [];
        for (let j = 0; j < matrizGenerada[i].length; j++) {
            filaTemp.push(elementos[elementoIndex]);
            elementoIndex++;
        }
        matrizTemp.push(filaTemp);
    }

    // Actualizar la tabla en la página con la matriz temporal ordenada
    const tablaContainer = document.getElementById('tablaContainer');
    let tablaHTML = '<table>';
    matrizTemp.forEach(fila => {
        tablaHTML += '<tr>';
        fila.forEach(valor => {
            tablaHTML += `<td>${valor}</td>`;
        });
        tablaHTML += '</tr>';
    });
    tablaHTML += '</table>';
    tablaContainer.innerHTML = tablaHTML;

    // Mostrar el botón "Invertir" después de ordenar
    document.getElementById('invertirBtn').style.display = 'block';
    // Ocultar el botón "Ordenar"
    document.getElementById('ordenarBtn').style.display = 'none';
}


//Esta funcion es igual a la de ordenar solo que de mayor a menor
function invertirMatriz() {
    // Limpiar matrizTemp
    matrizTemp = [];
    // Crear una copia plana de todos los elementos de la matrizGenerada
    const elementos = [].concat(...matrizGenerada);

    let ordenada = false;
    while (!ordenada) {
        let cont = 0;
        for (let i = 0; i < elementos.length - 1; i++) {
            if (elementos[i] < elementos[i + 1]) { // Cambio la condición aquí
                // Intercambiar elementos si el elemento actual es menor que el siguiente
                const temp = elementos[i];
                elementos[i] = elementos[i + 1];
                elementos[i + 1] = temp;
            } else {
                cont++;
            }
        }
        if (cont === elementos.length - 1) {
            ordenada = true;
        }
    }

    // Distribuir los elementos ordenados nuevamente en la matriz temporal
    let elementoIndex = 0;
    for (let i = 0; i < matrizGenerada.length; i++) {
        const filaTemp = [];
        for (let j = 0; j < matrizGenerada[i].length; j++) {
            filaTemp.push(elementos[elementoIndex]);
            elementoIndex++;
        }
        matrizTemp.push(filaTemp);
    }

    // Crear la nueva tabla con la matriz invertida
    let tablaHTML = '<table>';
    matrizTemp.forEach(fila => {
        tablaHTML += '<tr>';
        fila.forEach(valor => {
            tablaHTML += `<td>${valor}</td>`;
        });
        tablaHTML += '</tr>';
    });
    tablaHTML += '</table>';

    // Obtener el cuerpo de la tabla existente
    const tablaContainer = document.getElementById('tablaContainer');
    const tablaBody = tablaContainer.querySelector('tbody');

    // Vaciar el contenido del cuerpo de la tabla
    tablaBody.innerHTML = '';

    // Insertar la nueva tabla invertida en el cuerpo
    tablaBody.innerHTML = tablaHTML;
    document.getElementById('ordenarBtn').style.display = 'none';
    document.getElementById('invertirBtn').style.display = 'none';
    document.getElementById('guardarBtn').style.display = 'block';
}

//Funcion que guarda las 2 matrices y las envia al controlador de matrices
function guardarMatrices() {
    const data = {
        matrizGenerada: matrizGenerada,
        matrizTemp: matrizTemp
    };

    fetch('/matriz', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'true') {
            window.location.href = 'http://itxap.test/matriz-2';
        }else{
            console.log(data); 
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}




