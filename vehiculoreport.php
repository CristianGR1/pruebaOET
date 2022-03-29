<?php
include_once "header.php";
include_once "nav.php";
include_once "functions.php";
$vehiculos = getVehiculo();
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Vehículos</h1>
    </div>
    <div class="col-12">
        <a href="vehiculo_add.php" class="btn btn-info mb-2">Agregar vehículo <i class="fa fa-plus"></i></a>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Placa</th>
                        <th scope="col">Color</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Tipo de vehículo</th>
                        <th scope="col">Conductor</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehiculos as $vehiculo) { ?>
                        <tr>
                            <td>
                                <?php echo $vehiculo->placa ?>
                            </td>
                            <td>
                                <?php echo $vehiculo->color ?>
                            </td>
                            <td>
                                <?php echo $vehiculo->marca ?>
                            </td>
                            <td>
                                <?php echo $vehiculo->tipovehiculo ?>
                            </td>
                            <td>
                                <?php echo $vehiculo->conductor ?>
                            </td>
                            <td>
                                <?php echo $vehiculo->propietario ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="vehiculo_edit.php?id=<?php echo $vehiculo->id ?>">
                                Editar <i class="fa fa-edit"></i>
                                </a>
                                &nbsp
                                <a class="btn btn-danger" href="vehiculo_delete.php?id=<?php echo $vehiculo->id ?>">
                                Borrar <i class="fa fa-trash"></i>
                                </a>
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