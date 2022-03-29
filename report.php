<?php
include_once "header.php";
include_once "nav.php";
include_once "functions.php";
$start = date("Y-m-d");
$end = date("Y-m-d");
$conductor = '';
$propietario = '';
if (isset($_GET["start"])) {
    $start = $_GET["start"];
}
if (isset($_GET["end"])) {
    $end = $_GET["end"];
}
if (isset($_GET["conductor"])) {
    $conductor = $_GET["conductor"];
}
if (isset($_GET["propietario"])) {
    $propietario = $_GET["propietario"];
}
#$vehiculo=getVehiculo();
$combo = getPersonaCombo();
$vehiculo = getReport($start, $end, $conductor, $propietario);
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Reporte de vehículos</h1>
    </div>
    &nbsp;
    <div class="col-12">

        <form action="report.php" class="form-inline mb-2">
            <label for="start">Fecha inicial:&nbsp;</label>
            <input style="width:14%;" id="start" type="date" name="start" value="<?php echo $start ?>" class="form-control col-1.5">
            &nbsp;&nbsp;
            <label for="end">Fecha final:&nbsp;</label>
            <input style="width:14%;" id="end" type="date" name="end" value="<?php echo $end ?>" class="form-control col-1.5">

            <label for="conductor" class="col-1">Conductor:</label>
            <select style="width:14%;" class="form-control col-1.5" name="conductor"  autocomplete="off">
            <option value="">Seleccione</option>
                <?php foreach ($combo as $cmb) { ?>
                    <?php echo"<option value=\"$cmb->Dk\">  $cmb->nombre </option>"?>
                <?php } ?>
            </select>

            <label for="propietario" class="col-1">Propietario:</label>
            <select style="width:14%;" class="form-control col-1.5" name="propietario"  autocomplete="off">
            <option value="">Seleccione</option>
                <?php foreach ($combo as $cmb) { ?>
                    <?php echo"<option value=\"$cmb->Dk\">  $cmb->nombre </option>"?>
                <?php } ?>
            </select>

            <button style="width:5%;" class="btn btn-success ml-2">Filtrar <i class="fa fa-search"></i></button>
            &nbsp;
            <a class="btn btn-danger" href="print.php?start=<?php echo $start ?>&end=<?php echo $end ?>&conductor=<?php echo $conductor ?>&propietario=<?php echo $propietario ?>">
                                Imprimir <i class="fa fa-print"></i>
                                </a>
        </form>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Conductor</th>
                        <th>Propietario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehiculo as $vehiculos) { ?>
                        <tr>
                            <td>
                                <?php echo $vehiculos->placa ?>
                            </td>
                            <td>
                                <?php echo $vehiculos->marca ?>
                            </td>
                            <td>
                                <?php echo $vehiculos->conductor ?>
                            </td>
                            <td>
                                <?php echo $vehiculos->propietario ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
