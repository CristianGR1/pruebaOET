<?php
if (!isset($_GET["id"])) exit("No id provided");
include_once "header.php";
include_once "nav.php";
$id = $_GET["id"];
include_once "functions.php";
$persona = getPersonalById($id);
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Editar persona</h1>
    </div>
    <div class="col-12">
        <form action="person_update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $persona->id ?>">
            <div class="form-group">
                <label for="identificacion">Identificación</label>
                <input value="<?php echo $persona->numdoc ?>" name="identificacion" placeholder="Número de identidad" maxlength="11"  type="text" id="identificacion" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="primer_nombre">Primer Nombre</label>
                <input value="<?php echo $persona->primer_nombre ?>" name="primer_nombre" placeholder="Primer nombre" maxlength="10" type="text" id="primer_nombre" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre</label>
                <input value="<?php echo $persona->segundo_nombre ?>" name="segundo_nombre" placeholder="Segundo nombre" maxlength="10" type="text" id="segundo_nombre" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input value="<?php echo $persona->apellidos ?>" name="apellidos" placeholder="Apellidos" type="text" maxlength="30" id="apellidos" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input value="<?php echo $persona->direccion ?>" name="direccion" placeholder="Dirección de residencia" type="text" maxlength="30" id="direccion" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input value="<?php echo $persona->telefono ?>" name="telefono" placeholder="Número de teléfono" type="number" maxlength="10" id="telefono" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input value="<?php echo $persona->ciudad ?>" name="ciudad" placeholder="Ciudad de residencia" type="text" maxlength="20" id="ciudad" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    Actualizar <i class="fa fa-check"></i>
                </button>
            </div>
            <br>
        </form>
    </div>
</div>
<?php
include_once "footer.php";
