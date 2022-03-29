<?php
if (
    !isset($_POST["placa"]) or
    !isset($_POST["marca"]) or
    !isset($_POST["tipovehiculo"]) or
    !isset($_POST["conductor"]) or
    !isset($_POST["propietario"])
    ) {
    exit("Faltan datos para registrar el vehiculo");
}
include_once "functions.php";
$placa = $_POST["placa"];
$color = $_POST["color"];
$marca = $_POST["marca"];
$tipovehiculo = $_POST["tipovehiculo"];
$conductor = $_POST["conductor"];
$propietario = $_POST["propietario"];

saveVehiculo($placa,$color,$marca,$tipovehiculo,$conductor,$propietario);
header("Location: vehiculo.php");
