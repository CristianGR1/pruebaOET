<?php
include_once "header.php";
include_once "nav.php";
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Agregar nueva persona</h1>
    </div>
    <div class="col-12">
        <form action="person_save.php" method="POST">
            <div class="form-group">
                <label for="identificacion">Identificación</label>
                <input name="identificacion" placeholder="Número de identidad" maxlength="11"  type="text" id="identificacion" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="primer_nombre">Primer Nombre</label>
                <input name="primer_nombre" placeholder="Primer nombre" maxlength="10" type="text" id="primer_nombre" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre</label>
                <input name="segundo_nombre" placeholder="Segundo nombre" maxlength="10" type="text" id="segundo_nombre" class="form-control col-sm-5">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input name="apellidos" placeholder="Apellidos" type="text" maxlength="30" id="apellidos" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input name="direccion" placeholder="Dirección de residencia" type="text" maxlength="30" id="direccion" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input name="telefono" placeholder="Número de teléfono" type="number" maxlength="10" id="telefono" class="form-control col-sm-5">
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input name="ciudad" placeholder="Ciudad de residencia" type="text" maxlength="20" id="ciudad" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    Guardar <i class="fa fa-check"></i>
                </button>
            </div>
            <br>
        </form>
    </div>
</div>
<?php
include_once "footer.php";
