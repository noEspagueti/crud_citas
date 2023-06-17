import Modal, { AddCita, useFecth } from './modal.js';
import { onSubmitRegister } from './register.js';


document.addEventListener('DOMContentLoaded', () => {
    const btnRegistrar = document.querySelector('.btn_registrar');
    const btnCancelar = document.querySelector('.btn_cancelar');
    const modalContent = document.querySelector('.modal');

    let modal = new Modal();
    btnRegistrar.onclick = () => modal.onHandleClick(modalContent);
    btnCancelar.onclick = () => modal.onHandleCancelClick(modalContent);



    let data = new AddCita();
    useFecth().then(response => {
        response.map(item => {
            data.createRow(item);
        });
    });


    document.querySelector(".table").appendChild(data.tableBody);

    //on submit
    onSubmitRegister();
});




