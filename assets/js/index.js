import {
    useFecth,
    createRow,
    onDeleteCita,
    onSubmitRegister,
    onHandleClick,
    onHandleCancelClick
} from './modal.js';


document.addEventListener('DOMContentLoaded', () => {
    const btnRegistrar = document.querySelector('.btn_registrar');
    const btnCancelar = document.querySelector('.btn_cancelar');
    const modalContent = document.querySelector('.modal');


    //EVENTO PAR BOTON REGISTRAR
    btnRegistrar.onclick = () => onHandleClick(modalContent);
    btnCancelar.onclick = () => onHandleCancelClick(modalContent);


    //IMPRIMIR LOS DATOS DE LA BASE DE DATOS
    createRow();
    //REGISTRAR 
    onSubmitRegister();

});




