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
    $sqlPaciente_  = mysqli_query($conexionBD,"DELETE FROM pacientes WHERE id=".$_GET["borrar_pac"]);
    if($sqlPaciente_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla pacientes teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar_pac"]
   
if(isset($_GET["actualizar_pac"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["actualizar_pac"];
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $documento=$data->documento;
    $eps=$data->eps;
    $edad=$data->edad;
    $sexo=$data->sexo;
    $sqlPaciente_ = mysqli_query($conexionBD,"UPDATE pacientes SET nombres='$nombres',apellidos='$apellidos',documento='$documento',eps='$eps',edad='$edad',sexo='$sexo' WHERE id='$id'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de paciente de la tabla pacientes teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["consultar_pac"] 
   
if (isset($_GET["consultar_pac"])){
    $sqlPaciente_ = mysqli_query($conexionBD,"SELECT * FROM pacientes WHERE id=".$_GET["consultar_pac"]);
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

// Borra un registro de la tabla cirujanos Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["borrar_cir"] 
   
if (isset($_GET["borrar_cir"])){
    $sqlCirujano_  = mysqli_query($conexionBD,"DELETE FROM cirujanos WHERE id=".$_GET["borrar_cir"]);
    if($sqlCirujano_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla cirujanos teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar_cir"]
   
if(isset($_GET["actualizar_cir"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["actualizar_cir"];
    $nombres=$data->nombres;
    $apellidos=$data->apellidos;
    $documento=$data->documento;
    $especialidad=$data->especialidad;
    $sqlCirujano_ = mysqli_query($conexionBD,"UPDATE cirujanos SET nombres='$nombres',apellidos='$apellidos',documento='$documento',especialidad='$especialidad' WHERE id='$id'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de cirujano de la tabla cirujanos teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["consultar_cir"] 
   
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
    $modelo=$data->modelo;
    $codserial=$data->codserial;
    $cantidad=$data->cantidad;
        if(($nombre!="")&&($modelo!="")&&($codserial!="")&&($cantidad!="")){        
            $sqlEquipo_ = mysqli_query($conexionBD,"INSERT INTO equipos(nombre,modelo,codserial,cantidad) VALUES('$nombre','$modelo','$codserial','$cantidad') ");
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

// Borra un registro de la tabla equipos Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["borrar_eq"] 
   
if (isset($_GET["borrar_eq"])){
    $sqlEquipo_  = mysqli_query($conexionBD,"DELETE FROM equipos WHERE id=".$_GET["borrar_eq"]);
    if($sqlEquipo_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla equipos teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar_eq"]
   
if(isset($_GET["actualizar_eq"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["actualizar_eq"];
    $nombre=$data->nombre;
    $modelo=$data->modelo;
    $codserial=$data->codserial;
    $cantidad=$data->cantidad;
    $sqlEquipo_ = mysqli_query($conexionBD,"UPDATE equipos SET nombre='$nombre',modelo='$modelo',codserial='$codserial',cantidad='$cantidad' WHERE id='$id'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de equipo de la tabla equipos teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["consultar_eq"] 
   
if (isset($_GET["consultar_eq"])){
    $sqlEquipo_ = mysqli_query($conexionBD,"SELECT * FROM equipos WHERE id=".$_GET["consultar_eq"]);
    if(mysqli_num_rows($sqlEquipo_) > 0){
        $Equipo_ = mysqli_fetch_all($sqlEquipo_,MYSQLI_ASSOC);
        echo json_encode($Equipo_);
        exit();
    } else{  echo json_encode(["success"=>0]); }
}


/////////// SECCIÓN  Indicadores.
//Insertar Indicador
if(isset($_GET["insertar_ind"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->nombre;
    $valor=$data->valor;
    $periodo=$data->periodo;
        if(($nombre!="")&&($valor!="")&&($periodo!="")){        
            $sqlIndicador_ = mysqli_query($conexionBD,"INSERT INTO indicadores(nombre,valor,periodo) VALUES('$nombre','$valor','$periodo') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}

// Leer Indicadores
if(isset($_GET["indicadores"])){
    $sqlIndicador_  = mysqli_query($conexionBD,"SELECT * FROM indicadores ");
    if(mysqli_num_rows($sqlIndicador_ ) > 0){
        $Indicador_  = mysqli_fetch_all($sqlIndicador_ ,MYSQLI_ASSOC);
        echo json_encode($Indicador_ );
    }
    else{ echo json_encode([["success"=>0]]); }
}

// Borra un registro de la tabla indicadores Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["borrar_ind"] 
   
if (isset($_GET["borrar_ind"])){
    $sqlIndicador_  = mysqli_query($conexionBD,"DELETE FROM indicadores WHERE id=".$_GET["borrar_ind"]);
    if($sqlIndicador_ ){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

// Actualiza todos los campos de la tabla indicadores teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar_ind"]
   
if(isset($_GET["actualizar_ind"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["actualizar_ind"];
    $nombre=$data->nombre;
    $valor=$data->valor;
    $periodo=$data->periodo;
    $sqlIndicador_ = mysqli_query($conexionBD,"UPDATE indicadores SET nombre='$nombre',valor='$valor',periodo='$periodo' WHERE id='$id'");
    echo json_encode(["success"=>1 ]);
    exit();   
}
// Consulta UN registro de indicador de la tabla indicadores teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["consultar_ind"] 
   
if (isset($_GET["consultar_ind"])){
    $sqlIndicador_ = mysqli_query($conexionBD,"SELECT * FROM indicadores WHERE id=".$_GET["consultar_ind"]);
    if(mysqli_num_rows($sqlIndicador_) > 0){
        $Indicador_ = mysqli_fetch_all($sqlIndicador_,MYSQLI_ASSOC);
        echo json_encode($Indicador_);
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