<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transportes ACME S.A.</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            body {
                padding-top: 80px;
            }
        </style>
    </head>
    <body>
        <?php
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
        <main class="container-fluid">
        <div class="row">
            <div class="col-10">
                <h1 class="text-center"><img class="img-fluid" style="max-width: 80px;" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/pruebaOET/img/acme.png" loading="lazy"> &nbsp; Transportes ACME S.A.</h1>
            </div>
            &nbsp;
            <div class="col-11">
                <h3 class="text-center">Reporte de vehículos</h1>
            </div>
            &nbsp;
            <div class="col-11">
                <div class="table-responsive-md">
                    <table class="table table-bordered text-center" >
                        <thead>
                            <tr>
                                <th scope="col" width="40px">Placa</th>
                                <th scope="col" width="90px">Marca</th>
                                <th scope="col" >Conductor</th>
                                <th scope="col" >Propietario</th>
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
    </body>
</html>
<?php
    $html = ob_get_clean();
    //echo $html;

    require_once 'packages/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');
    //$dompdf->setPaper('A4', 'landscape');

    $dompdf->render();
    $dompdf->stream("Reporte.pdf",array("Attachment"=>false));
?>
