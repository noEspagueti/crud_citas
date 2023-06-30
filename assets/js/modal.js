
//Interactuar con el modal

export function onHandleClick(elementTarget) {
    elementTarget.style.display = 'block';
    document.querySelector('.container').style.filter = 'blur(10px)';
}

export function onHandleCancelClick(elementTarget) {
    elementTarget.style.display = 'none';
    document.querySelector('.container').style.filter = ''
}



//consumir servicio web

export async function useFecth(context, contentType) {
    const option = {
        method: "GET",
        headers: {
            "Content-Type": contentType
        }
    };
    const URL_API = `http://localhost/citas/home/${context}`;
    const statement = await fetch(URL_API, option);
    return statement;
}


export function createRow() {
    useFecth('data').then(result => result.text()).then(response => {
        document.querySelector(".tbody").innerHTML = response;
    });
}




export function onSubmitRegister() {
    const formRegister = document.getElementById('formRegister');
    formRegister.addEventListener('submit', (event) => {
        event.preventDefault();
        let formData = new FormData(event.target);
        if (!formData.get('nombres') || !formData.get('apellidos') || !formData.get('descripcion') || !formData.get('fecha')) {
            return;
        }
        let xhr = new XMLHttpRequest();
        let url = URL_BASE + "home/register";
        xhr.open("POST", url, true);
        xhr.send(formData);
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.type === 'ok') {
                    createRow();
                    document.querySelector('.alert p').textContent = "Se ha resgistrado correctamente";
                    document.querySelector('.alert').style.display = "flex";
                    document.querySelector('.modal').style.display = "none";
                    document.querySelector('.container').style.filter = '';
                }
            }
        };
    });
};

export function onDeleteCita(idCita) {
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
                window.location.href = "/citas";
            }
        }
    }
};


export function onEditCita(idCita) {
    if (!idCita) return;

}


