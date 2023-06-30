    <?php include "./view/templates/head.php" ?>

    <div class="container">


        <h2>Citas</h2>
        <!-- botón para registrar -->
        <div class="registro_container">
            <input type="button" value="Registrar" class="btn_registrar">
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Persona</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody class="tbody">

            </tbody>
        </table>
    </div>

    <!-- modal -->
    <div class="modal">
        <div class="container_modal">
            <div class="container_description">
                <form id="formRegister">
                    <input type="text" placeholder="Ingrese nombre" name="nombres" />
                    <input type="text" placeholder="Ingrese apellido" name="apellidos" />
                    <input type="date" name="fecha" />
                    <textarea id="my-textarea" class="form-control" name="descripcion" rows="3" placeholder="Breve descripción"></textarea>
                    <div class="btn_container">
                        <button class="btn_register" type="submit">Registrar</button>
                        <input type="button" class="btn_cancelar" value="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- alert -->

    <div class="alert">
        <span class="material-symbols-outlined">
            campaign
        </span>
        <p></p>
    </div>


    <?php include "./view/templates/foot.php" ?>