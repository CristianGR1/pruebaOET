<?php
if (
    !isset($_POST["id"]) or
    !isset($_POST["identificacion"]) or
    !isset($_POST["primer_nombre"]) or
    !isset($_POST["apellidos"]) or
    !isset($_POST["direccion"])
    ) {
    exit("Faltan parametros para ejecutar la acción");
}
include_once "functions.php";
$identificacion = $_POST["identificacion"];
$primer_nombre = $_POST["primer_nombre"];
$segundo_nombre = $_POST["segundo_nombre"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$ciudad = $_POST["ciudad"];
$id = $_POST["id"];
updatePersonal($identificacion,$primer_nombre,$segundo_nombre,$apellidos,$direccion,$telefono,$ciudad,$id);
header("Location: personal.php");

