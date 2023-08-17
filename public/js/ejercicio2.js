//algoritmo de ordenamiento recursivo
function quickSortDescending(arr, left, right) {
    if (left < right) {
        const pivotIndex = partitionDescending(arr, left, right);
        quickSortDescending(arr, left, pivotIndex - 1);
        quickSortDescending(arr, pivotIndex + 1, right);
    }
    return arr; 
}
 
function partitionDescending(arr, left, right) {
    const pivotValue = arr[right];
    let pivotIndex = left;

    for (let i = left; i < right; i++) {
        if (arr[i] > pivotValue) {
            swap(arr, i, pivotIndex);
            pivotIndex++;
        }
    }

    swap(arr, right, pivotIndex);
    return pivotIndex;
}
//intercambiar valores de variables
function swap(arr, i, j) {
    const temp = arr[i];
    arr[i] = arr[j];
    arr[j] = temp;
}
//eliminar duplicados por comparacion
function removeDuplicates(arr) {
    const uniqueArr = [];
    for (let i = 0; i < arr.length; i++) {
        let isUnique = true;
        for (let j = 0; j < uniqueArr.length; j++) {
            if (arr[i] === uniqueArr[j]) {
                isUnique = false;
                break;
            }
        }
        if (isUnique) {
            uniqueArr.push(arr[i]);
        }
    }
    return uniqueArr;
}
//buscando repeticiones comparando la lista ordenada con la de elementos unicos
function countRepetitions(orderedList, uniqueList) {
    const repeatedData = [];

    uniqueList.forEach(uniqueItem => {
        let count = 0;

        orderedList.forEach(orderedItem => {
            if (orderedItem === uniqueItem) {
                count++;
            }
        });

        repeatedData.push(count);
    });

    return repeatedData;
}
//convinar resultados
function combineData(uniqueList, repetitionList) {
    const combinedData = [];

    for (let i = 0; i < uniqueList.length; i++) {
        const comuna = uniqueList[i];
        const cantidad = repetitionList[i];
        combinedData.push({ comuna, cantidad });
    }

    return combinedData;
}
//lista entregada por el problema
const datos_entrada = [
    "Yungay",
    "Calbuco",
    "Taltal",
    "Iquique",
    "Los Vilos",
    "Algarrobo",
    "Iquique",
    "Yungay",
    "Calbuco",
    "Palena",
    "Yungay"
];
//ordenar
const datos_ordenados = quickSortDescending(datos_entrada, 0, datos_entrada.length - 1);
console.log(datos_ordenados);
//limpiar
const datos_sin_duplicados = removeDuplicates(datos_ordenados);
console.log(datos_sin_duplicados);
//comparar y contar
const datos_repetidos = countRepetitions(datos_ordenados, datos_sin_duplicados);
console.log(datos_repetidos);
//unir y entregar
const datos_combinados = combineData(datos_sin_duplicados, datos_repetidos);
console.log(datos_combinados);