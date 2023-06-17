const formRegister = document.getElementById('formRegister');


export const onSubmitRegister = () => {
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
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.type === 'ok') {
                    window.location.reload();
                }
            }
        }
    });
}