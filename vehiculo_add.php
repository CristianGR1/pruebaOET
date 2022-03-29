<?php
include_once "header.php";
include_once "nav.php";
include_once "functions.php";
$combo = getPersonaCombo();
$tipo = getTipoCombo();
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Agregar nuevo vehiculo</h1>
    </div>
    <div class="col-12">
        <form action="vehiculo_save.php" method="POST">
            <div class="form-group">
                <label for="placa">Placa</label>
                <input name="placa" placeholder="Placa del vehículo" maxlength="11"  type="text" id="placa" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="color">Color del vehículo</label>
                <input name="color" placeholder="Color del vehículo" maxlength="10" type="text" id="color" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca del vehículo</label>
                <input name="marca" placeholder="Marca del vehículo" maxlength="10" type="text" id="marca" class="form-control col-sm-5">
            </div>
            <div class="form-group">
                <label for="tipo_vehiculo">Tipo de vehículo</label>
                <select class="form-control col-sm-5 chosen-select" name="tipovehiculo" autocomplete="off" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($tipo as $tv) { ?>
                        <?php echo"<option value=\"$tv->Dk\">  $tv->nombre </option>"?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="conductor">Conductor</label>
                <select class="form-control col-sm-5 chosen-select" name="conductor"  autocomplete="off" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($combo as $cmb) { ?>
                        <?php echo"<option value=\"$cmb->Dk\">  $cmb->nombre </option>"?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="propietario">Propietario</label>
                <select class="form-control col-sm-5 chosen-select" name="propietario"  autocomplete="off" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($combo as $cmb) { ?>
                        <?php echo"<option value=\"$cmb->Dk\">  $cmb->nombre </option>"?>
                    <?php } ?>
                </select>
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
