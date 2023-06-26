
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

export async function useFecth(context) {
    const option = {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    };
    const URL_API = `http://localhost/citas/home/${context}`;
    const statement = await fetch(URL_API, option);
    const response = statement.json();
    return response;
}



export class CitasDao {
    tableBody = document.createElement("tbody");
    formRegister = document.getElementById('formRegister');

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
        let accionesValue = "<div class='btn-group' role='group' aria-label='Button group'> <button class='btn_edit' type = 'button'><span class='material-symbols-outlined'>edit</></> <button class='btn_delete' type='button'><span class='material-symbols-outlined'>delete</span></button></div>";
        list.push(["acciones", accionesValue])
        list.map(row => {
            let element = document.createElement('td');
            if (row[0] === "estatus") {
                row[1] = row[1] === 0 ? "<pan class='pending'>Pendiente</pan>" : "<span class ='fullize'>Realizado</span>";
            }
            element.innerHTML = row[1];
            tableRow.appendChild(element);
        });
        this.tableBody.appendChild(tableRow);
    }


    onSubmitRegister = () => {
        formRegister.addEventListener('submit', (event) => {
            event.preventDefault();
            let formData = new FormData(event.target);
            if (!formData.get('nombres') || !formData.get('apellidos') || !formData.get('descripcion')) {
                console.log("not found");
            }
            let xhr = new XMLHttpRequest();
            let url = URL_BASE + "home/register";
            xhr.open("POST", url, true);
            xhr.send(formData);

            xhr.onreadystatechange = () => {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.type === 'ok') {
                        window.location.reload();
                    }
                }
            };
        });
    };

    onDeleteCita = (idCita) => {
        if (!idCita) return;
        const strData = 'id=' + idCita;
        const xhr = new XMLHttpRequest();

        let url = URL_BASE + "home/remove";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(strData);

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.type === "ok") {
                    window.location.reload();
                    
                }
            }
        }
    };



}


