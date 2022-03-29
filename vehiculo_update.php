<?php
if (
    !isset($_POST["id"]) or
    !isset($_POST["placa"]) or
    !isset($_POST["marca"]) or
    !isset($_POST["tipovehiculo"]) or
    !isset($_POST["conductor"]) or
    !isset($_POST["propietario"])
    ) {
    exit("Faltan datos para actualizar el vehiculo");
}
include_once "functions.php";

$id = $_POST["id"];
$placa = $_POST["placa"];
$color = $_POST["color"];
$marca = $_POST["marca"];
$tipovehiculo = $_POST["tipovehiculo"];
$conductor = $_POST["conductor"];
$propietario = $_POST["propietario"];

updateVehiculo($placa,$color,$marca,$tipovehiculo,$conductor,$propietario,$id);
header("Location: vehiculo.php");