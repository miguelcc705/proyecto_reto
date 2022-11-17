<?php
/* 
TAKEN FORM: https://github.com/oscaruhp/empleados
AUTHOR: Oscar Uh

MODIFIED AND ADAPTED BY: Angelower Santana-Velásquez

*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/* Conecta con la base de datos en el servidor local 
usando las credenciales de usuario y contraseña */
$servidor = "localhost"; 
$usuario = "root"; 
$passwd = ""; 
$nombreBaseDatos = "Quiroefficient";
$conexionBD = new mysqli($servidor, $usuario, $passwd, $nombreBaseDatos);


/////////// SECCIÓN  pacientes.
//Insertar paciente
if(isset($_GET["insertar_pac"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $documento=$data->documento;
    $eps=$data->eps;
    $edad=$data->edad;
    $sexo=$data->sexo;
    
        if(($nombres!="")&&($documento!="")&&($apellidos!="")&&($eps!="")&&($edad!="")&&($sexo!="")){        
            $sqlPaciente_ = mysqli_query($conexionBD,"INSERT INTO pacientes(nombres,apellidos,documento,eps,edad,sexo) VALUES('$nombres','$apellidos','$documento','$eps','$edad','$sexo') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}

// Leer pacientes
if(isset($_GET["pacientes"])){
    $sqlPaciente_  = mysqli_query($conexionBD,"SELECT * FROM pacientes ");
    if(mysqli_num_rows($sqlPaciente_ ) > 0){
        $Paciente_  = mysqli_fetch_all($sqlPaciente_ ,MYSQLI_ASSOC);
        echo json_encode($Paciente_ );
    }
    else{ echo json_encode([["success"=>0]]); }
}

// Borra un registro de la tabla pacientes Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["borrar_pac"] 
   
if (isset($_GET["borrar_pac"])){
    $sqlPaciente_  = mysqli_query($conexionBD,"DELETE FROM pacientes WHERE idpacientes=".$_GET["borrar_pac"]);
    if($sqlPaciente_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla pacientes teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar_pac"]
   
if(isset($_GET["actualizar_pac"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $idpacientes=(isset($data->idpacientes))?$data->idpacientes:$_GET["actualizar_pac"];
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $documento=$data->documento;
    $eps=$data->eps;
    $edad=$data->edad;
    $sexo=$data->sexo;
    $sqlPaciente_ = mysqli_query($conexionBD,"UPDATE pacientes SET nombres='$nombres',apellidos='$apellidos',documento='$documento',eps='$eps',edad='$edad',sexo='$sexo' WHERE idpacientes='$idpacientes'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de paciente de la tabla pacientes teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["consultar_pac"] 
   
if (isset($_GET["consultar_pac"])){
    $sqlPaciente_ = mysqli_query($conexionBD,"SELECT * FROM pacientes WHERE idpacientes=".$_GET["consultar_pac"]);
    if(mysqli_num_rows($sqlPaciente_) > 0){
        $Paciente_ = mysqli_fetch_all($sqlPaciente_,MYSQLI_ASSOC);
        echo json_encode($Paciente_);
        exit();
    } else{  echo json_encode(["success"=>0]); }
}

/////////// SECCIÓN  cirujanos.
//Insertar cirujano
if(isset($_GET["insertar_cir"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $documento=$data->documento;
    $especialidad=$data->especialidad;
        if(($nombres!="")&&($documento!="")&&($apellidos!="")&&($especialidad!="")){        
            $sqlCirujano_ = mysqli_query($conexionBD,"INSERT INTO cirujanos(nombres,apellidos,documento,especialidad) VALUES('$nombres','$apellidos','$documento','$especialidad') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}

// Leer Cirujanos
if(isset($_GET["cirujanos"])){
    $sqlCirujano_  = mysqli_query($conexionBD,"SELECT * FROM cirujanos");
    if(mysqli_num_rows($sqlCirujano_ ) > 0){
        $Cirujano_  = mysqli_fetch_all($sqlCirujano_ ,MYSQLI_ASSOC);
        echo json_encode($Cirujano_ );
    }
    else{ echo json_encode([["success"=>0]]); }
}

// Borra un registro de la tabla cirujanos Teniendo como criterio de búsqueda la variable 'idcirujanos' que viene en el $_GET["borrar_cir"] 
   
if (isset($_GET["borrar_cir"])){
    $sqlCirujano_  = mysqli_query($conexionBD,"DELETE FROM cirujanos WHERE idcirujanos=".$_GET["borrar_cir"]);
    if($sqlCirujano_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla cirujanos teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar_cir"]
   
if(isset($_GET["actualizar_cir"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $idcirujanos=(isset($data->idcirujanos))?$data->idcirujanos:$_GET["actualizar_cir"];
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $documento=$data->documento;
    $especialidad=$data->especialidad;
    $sqlCirujano_ = mysqli_query($conexionBD,"UPDATE cirujanos SET nombres='$nombres',apellidos='$apellidos',documento='$documento',especialidad='$especialidad' WHERE idcirujanos='$idcirujanos'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de cirujano de la tabla cirujanos teniendo como criterio de búsqueda la variable 'idcirujanos' que viene en el $_GET["consultar_cir"] 
   
if (isset($_GET["consultar_cir"])){
    $sqlCirujano_ = mysqli_query($conexionBD,"SELECT * FROM cirujanos WHERE idcirujanos=".$_GET["consultar_cir"]);
    if(mysqli_num_rows($sqlCirujano_) > 0){
        $Cirujano_ = mysqli_fetch_all($sqlCirujano_,MYSQLI_ASSOC);
        echo json_encode($Cirujano_);
        exit();
    } else{  echo json_encode(["success"=>0]); }
}


/////////// SECCIÓN  Equipos.
//Insertar equipo
if(isset($_GET["insertar_eq"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->nombre;
    $cantidad=$data->cantidad;
        if(($nombre!="")&&($cantidad!="")){        
            $sqlEquipo_ = mysqli_query($conexionBD,"INSERT INTO equipos(nombre, cantidad) VALUES('$nombre','$cantidad') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}

// Leer Equipos
if(isset($_GET["equipos"])){
    $sqlEquipo_  = mysqli_query($conexionBD,"SELECT * FROM equipos ");
    if(mysqli_num_rows($sqlEquipo_ ) > 0){
        $Equipo_  = mysqli_fetch_all($sqlEquipo_ ,MYSQLI_ASSOC);
        echo json_encode($Equipo_ );
    }
    else{ echo json_encode([["success"=>0]]); }
}

// Borra un registro de la tabla equipos Teniendo como criterio de búsqueda la variable 'idequipos' que viene en el $_GET["borrar_eq"] 
   
if (isset($_GET["borrar_eq"])){
    $sqlEquipo_  = mysqli_query($conexionBD,"DELETE FROM equipos WHERE idequipos=".$_GET["borrar_eq"]);
    if($sqlEquipo_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla equipos teniendo como criterio de búsqueda la variable 'idequipos' que viene en el $_GET["actualizar_eq"]
   
if(isset($_GET["actualizar_eq"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $idequipos=(isset($data->idequipos))?$data->idequipos:$_GET["actualizar_eq"];
    $nombre=$data->nombre;
    $cantidad=$data->cantidad;
    $sqlEquipo_ = mysqli_query($conexionBD,"UPDATE equipos SET nombre='$nombre',cantidad='$cantidad' WHERE idequipos='$idequipos'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de equipo de la tabla equipos teniendo como criterio de búsqueda la variable 'idequipos' que viene en el $_GET["consultar_eq"] 
   
if (isset($_GET["consultar_eq"])){
    $sqlEquipo_ = mysqli_query($conexionBD,"SELECT * FROM equipos WHERE idequipos=".$_GET["consultar_eq"]);
    if(mysqli_num_rows($sqlEquipo_) > 0){
        $Equipo_ = mysqli_fetch_all($sqlEquipo_,MYSQLI_ASSOC);
        echo json_encode($Equipo_);
        exit();
    } else{  echo json_encode(["success"=>0]); }
}

/////////// SECCIÓN  Quirofanos.
//Insertar quirofano
if(isset($_GET["insertar_quirofanos"])){
    $data = json_decode(file_get_contents("php://input"));
    $sala=$data->sala;
    $tipo=$data->tipo;
        if(($sala!="")&&($tipo!="")){        
            $sqlQuirofano_ = mysqli_query($conexionBD,"INSERT INTO quirofanos(sala,tipo) VALUES('$sala','$tipo') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}

// Leer quirofanos
if(isset($_GET["quirofanos"])){
    $sqlQuirofano_  = mysqli_query($conexionBD,"SELECT * FROM quirofanos");
    if(mysqli_num_rows($sqlQuirofano_ ) > 0){
        $Quirofano_  = mysqli_fetch_all($sqlQuirofano_ ,MYSQLI_ASSOC);
        echo json_encode($Quirofano_ );
    }
    else{ echo json_encode([["success"=>0]]); }
}

// Borra un registro de la tabla quirofanos

/////////// SECCIÓN  cirugias.
//Insertar cirugia
if(isset($_GET["insertar_cirugia"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->nombre;
    $fecha=$data->fecha;
    $horaInicio=$data->horaInicio;
    $horaFinal=$data->horaFinal;
    $horaInicioReal=$data->horaInicioReal;
    $horaFinalReal=$data->horaFinalReal;
    $duracionEstimada=$data->duracionEstimada;
    $duracionReal=$data->duracionReal;
    $detalles=$data->detalles;
    $cancelacion=$data->cancelacion;
    $motivoCancelacion=$data->motivoCancelacion;
    $idquirofanos=$data->idquirofanos;
    $idpacientes=$data->idpacientes;
    $idcirujanos=$data->idcirujanos;
                
    $sqlCirujano_ = mysqli_query($conexionBD,"INSERT INTO cirugias(nombre,fecha,horaInicio,horaFinal,horaInicioReal,horaFinalReal,duracionEstimada,duracionReal,detalles,cancelacion,motivoCancelacion,idquirofanos,idpacientes,idcirujanos)
    VALUES('$nombre','$fecha','$horaInicio','$horaFinal','$horaInicioReal','$horaFinalReal','$duracionEstimada','$duracionReal','$detalles','$cancelacion','$motivoCancelacion','$idquirofanos','$idpacientes','$idcirujanos') ");
    echo json_encode(["success"=>1]);
    exit();
}

// Leer cirugias
if(isset($_GET["cirugias"])){
    $sqlCirugia_  = mysqli_query($conexionBD,"SELECT * FROM cirugias");
    if(mysqli_num_rows($sqlCirugia_ ) > 0){
        $Cirugia_  = mysqli_fetch_all($sqlCirujano_ ,MYSQLI_ASSOC);
        echo json_encode($Cirugia_ );
    }
    else{ echo json_encode([["success"=>0]]); }
}

// Borra un registro de la tabla cirugias Teniendo como criterio de búsqueda la variable 'idcirugias' que viene en el $_GET["borrar_cirugia"] 
   
if (isset($_GET["borrar_cirugia"])){
    $sqlCirugia_  = mysqli_query($conexionBD,"DELETE FROM cirugias WHERE idcirugias=".$_GET["borrar_cirugia"]);
    if($sqlCirugia_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla cirugias teniendo como criterio de búsqueda la variable 'idcirugia' que viene en el $_GET["actualizar_cirugia"]
   
if(isset($_GET["actualizar_cirugia"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $idcirugias=(isset($data->idcirugias))?$data->idcirugias:$_GET["actualizar_cirugia"];
    $nombre=$data->nombre;
    $fecha=$data->fecha;
    $horaInicio=$data->horaInicio;
    $horaFinal=$data->horaFinal;
    $horaInicioReal=$data->horaInicioReal;
    $horaFinalReal=$data->horaFinalReal;
    $duracionEstimada=$data->duracionEstimada;
    $duracionReal=$data->duracionReal;
    $detalles=$data->detalles;
    $cancelacion=$data->cancelacion;
    $motivoCancelacion=$data->motivoCancelacion;
    $idquirofanos=$data->idquirofanos;
    $idpacientes=$data->idpacientes;
    $idcirujanos=$data->idcirujanos;
    $sqlCirugia_ = mysqli_query($conexionBD,"UPDATE cirugias SET nombre='$nombre',fecha='$fecha',horaInicio='$horaInicio',horaFinal='$horaFinal',
                    horaInicioReal='$horaInicioReal',horaFinalReal='$horaFinalReal',duracionEstimada='$duracionEstimada',duracionReal='$duracionReal',
                    detalles='$detalles',cancelacion='$cancelacion',motivoCancelacion='$motivoCancelacion',idquirofanos='$idquirofanos',
                    idpacientes='$idpacientes',idcirujanos='$idcirujanos', WHERE idcirugias='$idcirugias'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de cirugia de la tabla cirugias teniendo como criterio de búsqueda la variable 'idcirugias' que viene en el $_GET["consultar_cirugia"] 
   
if (isset($_GET["consultar_cirugia"])){
    $sqlCirugia_ = mysqli_query($conexionBD,"SELECT * FROM cirugias WHERE idcirugias=".$_GET["consultar_cirugia"]);
    if(mysqli_num_rows($sqlCirugia_) > 0){
        $Cirugia_ = mysqli_fetch_all($sqlCirugia_,MYSQLI_ASSOC);
        echo json_encode($Cirugia_);
        exit();
    } else{  echo json_encode(["success"=>0]); }
}




// Leer email and passwd para users login/logout
if (isset($_GET["email"] , $_GET["passwd"])){
    $sqlUser = mysqli_query($conexionBD,"SELECT * FROM users WHERE email LIKE '".$_GET['email']."' AND passwd LIKE '".$_GET['passwd']."'");
    if(mysqli_num_rows($sqlUser) > 0){
        $user = mysqli_fetch_all($sqlUser,MYSQLI_ASSOC);
        echo json_encode($user);
        exit();
    }
    else{ echo json_encode([["success"=>0]]); }
}

/* $sqlActivos_ = mysqli_query($conexionBD,"SELECT * FROM activos ");
    if(mysqli_num_rows($sqlActivos_) > 0){
        $activos_ = mysqli_fetch_all($sqlActivos_,MYSQLI_ASSOC);
        echo json_encode($activos_);
    }
    else{ echo json_encode([["success"=>0]]); }  */

?>