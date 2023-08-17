


function buscarMatriz() {
    const matrizId = document.getElementById('matrizId').value;

    fetch(`/matriz/${matrizId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        // Aquí puedes procesar la información recibida
        mostrarMatrices(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function mostrarMatrices(data) {
    const matrizContainer = document.getElementById('matriz');
    const matrizFinalContainer = document.getElementById('matrizFinal');

    // Obtener las variables "x" e "y" de data.matriz
    const matrizX = data.matriz.x;
    const matrizY = data.matriz.y;

    // Crear y llenar la tabla de la matriz
    const tablaMatriz = document.createElement('table');
    for (let i = 0; i < matrizY; i++) {
        const fila = document.createElement('tr');
        for (let j = 0; j < matrizX; j++) {
            const celda = document.createElement('td');
            celda.textContent = data.datosMatriz[i * matrizX + j].valor;
            fila.appendChild(celda);
        }
        tablaMatriz.appendChild(fila);
    }
    matrizContainer.innerHTML = '';
    const tituloMatriz = document.createElement('p');
    tituloMatriz.textContent = 'Tabla inicial';
    matrizContainer.appendChild(tituloMatriz);
    matrizContainer.appendChild(tablaMatriz);

    // Obtener las variables "x" e "y" de data.matrizFinal
    const matrizFinalX = data.matrizFinal.x;
    const matrizFinalY = data.matrizFinal.y;

    // Crear y llenar la tabla de la matriz final
    const tablaMatrizFinal = document.createElement('table');
    for (let i = 0; i < matrizFinalY; i++) {
        const fila = document.createElement('tr');
        for (let j = 0; j < matrizFinalX; j++) {
            const celda = document.createElement('td');
            celda.textContent = data.datosMatrizFinal[i * matrizFinalX + j].valor;
            fila.appendChild(celda);
        }
        tablaMatrizFinal.appendChild(fila);
    }
    matrizFinalContainer.innerHTML = '';
    const tituloMatrizFinal = document.createElement('p');
    tituloMatrizFinal.textContent = 'Tabla final';
    matrizFinalContainer.appendChild(tituloMatrizFinal);
    matrizFinalContainer.appendChild(tablaMatrizFinal);
}


