<?php
include_once "header.php";
include_once "nav.php";
include_once "functions.php";
$personal = getPersonal();
?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Personal</h1>
    </div>
    <div class="col-12">
        <a href="person_add.php" class="btn btn-info mb-2">Crear persona <i class="fa fa-plus"></i></a>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Primer Nombre</th>
                        <th scope="col">Segundo Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personal as $person) { ?>
                        <tr>
                            <td>
                                <?php echo $person->numdoc ?>
                            </td>
                            <td>
                                <?php echo $person->primer_nombre ?>
                            </td>
                            <td>
                                <?php echo $person->segundo_nombre ?>
                            </td>
                            <td>
                                <?php echo $person->apellidos ?>
                            </td>
                            <td>
                                <?php echo $person->direccion ?>
                            </td>
                            <td>
                                <?php echo $person->telefono ?>
                            </td>
                            <td>
                                <?php echo $person->ciudad ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="person_edit.php?id=<?php echo $person->id ?>">
                                Editar <i class="fa fa-edit"></i>
                                </a>
                                &nbsp
                                <a class="btn btn-danger" href="person_delete.php?id=<?php echo $person->id ?>">
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