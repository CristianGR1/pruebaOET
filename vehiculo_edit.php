<?php
if (!isset($_GET["id"])) exit("No id provided");
include_once "header.php";
include_once "nav.php";
$id = $_GET["id"];
include_once "functions.php";
$vehiculos = getVehiculoById($id);
$combo = getPersonaCombo();
$tipo = getTipoCombo();
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Editar vehículo</h1>
    </div>
    <div class="col-12">
        <form action="vehiculo_update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $vehiculos->id ?>">
            <div class="form-group">
                <label for="placa">Placa</label>
                <input value="<?php echo $vehiculos->placa ?>" name="placa" placeholder="Placa del vehículo" maxlength="11"  type="text" id="placa" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="color">Color del vehículo</label>
                <input value="<?php echo $vehiculos->color ?>" name="color" placeholder="Color del vehículo" maxlength="10" type="text" id="color" class="form-control col-sm-5" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca del vehículo</label>
                <input value="<?php echo $vehiculos->marca ?>" name="marca" placeholder="Marca del vehículo" maxlength="10" type="text" id="marca" class="form-control col-sm-5">
            </div>
            <div class="form-group">
                <label for="tipo_vehiculo">Tipo de vehículo</label>
                <select class="form-control col-sm-5 chosen-select" name="tipovehiculo" autocomplete="off" required>
                <option value="<?php echo $vehiculos->tipv?>"><?php echo $vehiculos->tipovehiculo?></option>
                    <?php foreach ($tipo as $tv) { ?>
                        <?php if($tv->Dk != $vehiculos->tipv) echo"<option value=\"$tv->Dk\">  $tv->nombre </option>"?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="conductor">Conductor</label>
                <select class="form-control col-sm-5 chosen-select" name="conductor"  autocomplete="off" required>
                <option value="<?php echo $vehiculos->cond?>"><?php echo $vehiculos->conductor?></option>
                    <?php foreach ($combo as $cmb) { ?>
                        <?php if($cmb->Dk != $vehiculos->cond) echo"<option value=\"$cmb->Dk\">  $cmb->nombre </option>"?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="propietario">Propietario</label>
                <select class="form-control col-sm-5 chosen-select" name="propietario"  autocomplete="off" required>
                    <option value="<?php echo $vehiculos->prop?>"><?php echo $vehiculos->propietario?></option>
                    <?php foreach ($combo as $cmb) { ?>
                        <?php if($cmb->Dk != $vehiculos->prop) echo"<option value=\"$cmb->Dk\">  $cmb->nombre </option>"?>
                    <?php } ?>
                </select>
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
