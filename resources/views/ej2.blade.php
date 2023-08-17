@extends('templates.principal')
@section('cabeza')
    <title>Ejercicio 2 </title>
@endsection
@section('cuerpo')
    <h1>EJERCICIO Nº2 </h1>
    <p>Utilizando el lenguaje que estime conveniente, generar una función que ordene una matriz de textos
        de forma alfabética, descendente y sin repeticiones pero contabilizando las repeticiones de cada texto.
        La salida debe ser un array de objetos, y cada objeto debe tener 2 atributos: comuna y cantidad, en el
        primero se guardará el texto y en el segundo las repeticiones de ese texto.</p>
    <p>Considerar para el ejercicio el siguiente listado :
    </p>
    <pre>
        const datos_entrada = ["Yungay",
                       "Calbuco",
                       "Taltal",
                       "Iquique",
                       "Los Vilos",
                       "Algarrobo",
                       "Iquique",
                       "Yungay",
                       "Calbuco",
                       "Palena",
                       "Yungay"];
    </pre>
    <p id="anotacion">**Esta forma de instanciar el listado dependerá del lenguaje, favor implementarlo según el lenguaje
        seleccionado.</p>
    <p id="anotacion">
        **Para este ejercicio no se deberá utilizar funciones preexistentes por el lenguaje</p>
    <br>
    <h1>Resultado</h1>
    <pre>
        Comuna: Yungay, Cantidad: 3
        Comuna: Taltal, Cantidad: 1
        Comuna: Palena, Cantidad: 1
        Comuna: Los Vilos, Cantidad: 1
        Comuna: Iquique, Cantidad: 2
        Comuna: Calbuco, Cantidad: 2
        Comuna: Algarrobo, Cantidad: 1
    </pre>
    <h1>Solución (JavaScript)</h1>
    <pre>
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

    </pre>
    <br>
    <h1>logica usada</h1>
    <p>1) Como no puedo usar funciones, puedo recurrir a algoritmos de ordenamiento que no ocupen funciones. </p>
    <p>2) Una vez que tengo los datos ordenados, si comparo el primer dato con el segundo sabre si esta repetido y así ir creando una lista de elementos únicos.</p>
    <p>3) Ahora que tengo una lista de elementos únicos y una de repetidos, puedo comparar cuantas veces se repite un elemento único en la lista de repetidos y guardar la cantidad de repeticiones en una lista, la cual al final tendrá el mismo orden y dimensión que la de mis elementos únicos.</p>
    <p>4) Si la lista de elementos únicos esta relacionada 1 a 1 con la de contadores puedo obtener el resultado que me pide el ejercicio uniéndolas.</p>
@endsection
