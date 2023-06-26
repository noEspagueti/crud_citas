import Modal, { useFecth, CitasDao } from './modal.js';


document.addEventListener('DOMContentLoaded', () => {
    const btnRegistrar = document.querySelector('.btn_registrar');
    const btnCancelar = document.querySelector('.btn_cancelar');
    const modalContent = document.querySelector('.modal');

    let modal = new Modal();
    btnRegistrar.onclick = () => modal.onHandleClick(modalContent);
    btnCancelar.onclick = () => modal.onHandleCancelClick(modalContent);





    let citas = new CitasDao();

    useFecth('data')
        .then(response => {
            response.map(item => {
                citas.createRow(item);
            });
        })
        .finally(() => {
            let btnDelete = document.querySelectorAll('.btn_delete');
            btnDelete.forEach(item => {
                item.addEventListener('click', () => {
                    const idCita = item.parentNode.parentNode.parentNode.firstChild.textContent;
                    citas.onDeleteCita(idCita);
                });
            });
        });

    document.querySelector(".table").appendChild(citas.tableBody);

    citas.onSubmitRegister();




});




