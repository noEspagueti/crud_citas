
//Interactuar con el modal
export default class Modal {

    onHandleClick(elementTarget) {
        elementTarget.style.display = 'block';
        document.querySelector('.container').style.filter = 'blur(10px)';
    }

    onHandleCancelClick(elementTarget) {
        elementTarget.style.display = 'none';
        document.querySelector('.container').style.filter = ''
    }

}


//consumir servicio web


export async function useFecth() {
    const option = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    };
    const URL_API = "http://localhost/citas/home/data";
    const statement = await fetch(URL_API, option);
    const response = statement.json();
    return response;
}




//agregar filas de registro

export class AddCita {

    tableBody = document.createElement("tbody");


    //convertir un objeto a un array
    objectToArray = (object = {}) => {
        let array = [];
        for (let item in object) {
            array.push([item, object[item]]);
        }
        return array;
    }

    createRow(data) {
        let tableRow = document.createElement("tr");
        let list = this.objectToArray(data);
        list.map(row => {
            let element = document.createElement('td');
            element.innerHTML = row[1];
            tableRow.appendChild(element);
        });
        this.tableBody.appendChild(tableRow);
    }

}



