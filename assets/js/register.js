const formRegister = document.getElementById('formRegister');


export const onSubmitRegister = () => {
    formRegister.addEventListener('submit', (event) => {
        event.preventDefault();
        let form = new FormData(event.target);
        console.log(form.get('nombres'));
    });
}