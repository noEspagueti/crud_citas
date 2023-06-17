    <?php include "./view/templates/head.php" ?>

    <div class="container">

        <!-- botón para registrar -->
        <div class="registro_container">
            <input type="button" value="Registrar" class="btn_registrar">
        </div>
        <table class="table">
            <thead>
                <th>Persona</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
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
                        <input type="button" class="btn_cancelar" value="Cancelar" />
                        <button class="btn_register" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php include "./view/templates/foot.php" ?>