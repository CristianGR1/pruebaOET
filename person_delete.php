<?php
if (!isset($_GET["id"])) {
    exit("No se ha proporcionado información");
}
include_once "functions.php";
$id = $_GET["id"];
deletePersonal($id);
header("Location: personal.php");
