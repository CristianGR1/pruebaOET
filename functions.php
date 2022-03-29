<?php
function getReport($start, $end, $conductor, $propietario)
{
    $where = "";
    if($start == $end){
        $where .= "DATE(v.fechacreacion) >= '$start'";
    }else{
        $where .= "DATE(v.fechacreacion) BETWEEN '$start' AND '$end'";
    }
    if($conductor != ''){
        $where .= "AND v.conductor_fk IN ('$conductor')";
    }
    if($propietario != ''){
        $where .= "AND v.propietario_fk IN ('$propietario')";
    }
    $query = "SELECT v.Dk as id,v.placa,v.color,v.marca, tv.tipovehiculo, CONCAT_WS(' ',p.primer_nombre,p.segundo_nombre,p.apellidos) AS conductor, CONCAT_WS(' ',ps.primer_nombre,ps.segundo_nombre,ps.apellidos) AS propietario,v.conductor_fk AS cond,v.tipovehiculo_fk AS tipv,v.propietario_fk AS prop
        FROM vehiculo v 
        LEFT JOIN tipovehiculo tv ON tv.Dk = v.tipovehiculo_fk 
        LEFT JOIN persona p ON p.Dk = v.conductor_fk 
        LEFT JOIN persona ps ON ps.Dk =  v.propietario_fk 
        WHERE  $where
        GROUP BY p.Dk;";
    $db = getDatabase();
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}

function saveAttendanceData($date, $persona)
{
    deleteAttendanceDataByDate($date);
    $db = getDatabase();
    $db->beginTransaction();
    $statement = $db->prepare("INSERT INTO employee_attendance(employee_id, date, status) VALUES (?, ?, ?)");
    foreach ($persona as $employee) {
        $statement->execute([$employee->id, $date, $employee->status]);
    }
    $db->commit();
    return true;
}

function deleteAttendanceDataByDate($date)
{
    $db = getDatabase();
    $statement = $db->prepare("DELETE FROM employee_attendance WHERE date = ?");
    return $statement->execute([$date]);
}
function getAttendanceDataByDate($date)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT employee_id, status FROM employee_attendance WHERE date = ?");
    $statement->execute([$date]);
    return $statement->fetchAll();
}


function deletePersonal($id)
{
    $db = getDatabase();
    $statement = $db->prepare("DELETE FROM persona WHERE Dk = ?");
    return $statement->execute([$id]);
}

function updatePersonal($identificacion,$primer_nombre,$segundo_nombre,$apellidos,$direccion,$telefono,$ciudad, $id)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE persona SET numdoc = '$identificacion',primer_nombre = '$primer_nombre',segundo_nombre = '$segundo_nombre',apellidos = '$apellidos',direccion = '$direccion',telefono = '$telefono',ciudad = '$ciudad' WHERE Dk = '$id'");
    return $statement->execute();
}
function getPersonalById($id)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT *, Dk as id FROM persona WHERE Dk = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function savePersonal($identificacion,$primer_nombre,$segundo_nombre,$apellidos,$direccion,$telefono,$ciudad)
{
    $db = getDatabase();
    $statement = $db->prepare("INSERT INTO persona(numdoc,primer_nombre,segundo_nombre,apellidos,direccion,telefono,ciudad) VALUES ('$identificacion','$primer_nombre','$segundo_nombre','$apellidos','$direccion','$telefono','$ciudad')");
    return $statement->execute();
    
}

function getPersonal()
{
    $db = getDatabase();
    $statement = $db->query("SELECT *, Dk as id FROM persona");
    return $statement->fetchAll();
}

function getPersonaCombo()
{
    $db = getDatabase();
    $statement = $db->query("SELECT Dk, CONCAT_WS(' ',primer_nombre,segundo_nombre,apellidos) as nombre FROM persona");
    return $statement->fetchAll();
}
function getTipoCombo()
{
    $db = getDatabase();
    $statement = $db->query("SELECT Dk, tipovehiculo as nombre FROM tipovehiculo");
    return $statement->fetchAll();
}

function deleteVehiculo($id)
{
    $db = getDatabase();
    $statement = $db->prepare("DELETE FROM vehiculo WHERE Dk = ?");
    return $statement->execute([$id]);
}

function updateVehiculo($placa,$color,$marca,$tipovehiculo,$conductor,$propietario,$id)
{
    $db = getDatabase();
    $statement = $db->prepare("UPDATE vehiculo SET placa='$placa',color='$color',marca='$marca',tipovehiculo_fk='$tipovehiculo',conductor_fk='$conductor',propietario_fk='$propietario' WHERE Dk='$id'");
    return $statement->execute();
}
function getVehiculoById($id)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT v.Dk as id,v.placa,v.color,v.marca, tv.tipovehiculo, CONCAT_WS(' ',p.primer_nombre,p.segundo_nombre,p.apellidos) AS conductor, CONCAT_WS(' ',ps.primer_nombre,ps.segundo_nombre,ps.apellidos) AS propietario,v.conductor_fk AS cond,v.tipovehiculo_fk AS tipv,v.propietario_fk AS prop
    FROM vehiculo v 
    LEFT JOIN tipovehiculo tv ON tv.Dk = v.tipovehiculo_fk 
    LEFT JOIN persona p ON p.Dk = v.conductor_fk 
    LEFT JOIN persona ps ON ps.Dk =  v.propietario_fk 
    WHERE v.Dk = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function saveVehiculo($placa,$color,$marca,$tipovehiculo,$conductor,$propietario)
{
    $db = getDatabase();
    $statement = $db->prepare("INSERT INTO vehiculo(placa,color,marca,tipovehiculo_fk,conductor_fk,propietario_fk) VALUES ('$placa','$color','$marca','$tipovehiculo','$conductor','$propietario')");
    return $statement->execute();
    
}

function getVehiculo()
{
    $db = getDatabase();
    $statement = $db->query("SELECT v.Dk as id,v.placa,v.color,v.marca, tv.tipovehiculo, CONCAT_WS(' ',p.primer_nombre,p.segundo_nombre,p.apellidos) AS conductor, CONCAT_WS(' ',ps.primer_nombre,ps.segundo_nombre,ps.apellidos) AS propietario
    FROM vehiculo v 
    LEFT JOIN tipovehiculo tv ON tv.Dk = v.tipovehiculo_fk 
    LEFT JOIN persona p ON p.Dk = v.conductor_fk 
    LEFT JOIN persona ps ON ps.Dk =  v.propietario_fk");
    return $statement->fetchAll();
}

function getVarFromEnvironmentVariables($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("The environment file ($file) does not exists. Please create it");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("The specified key (" . $key . ") does not exist in the environment file");
    }
}

function getDatabase()
{
    $password = getVarFromEnvironmentVariables("MYSQL_PASSWORD");
    $user = getVarFromEnvironmentVariables("MYSQL_USER");
    $dbName = getVarFromEnvironmentVariables("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
