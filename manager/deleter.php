<?php

function connectDB(){
    $conexion = mysqli_connect("localhost", "mexicotr_sitex", "W5OQ%~9S_4(W", "mexicotr_sitex");
    return $conexion;
}
function disconnectDB($conexion){
    $close = mysqli_close($conexion);
    return $close;
}

function exeSQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();

    //generamos la consulta

    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa

    disconnectDB($conexion); //desconectamos la base de datos
}

$data = array();
if(isset($_GET['deleteidrow']))
{
    exeSQL("DELETE FROM rutas WHERE id = ".$_GET['deleteidrow']);
    $data = array('success' => 'Fila borrada correctamente, recarga la pagina para reflejar los resultados', 'formData' => $_POST);
}
else
{
    $data = array('success' => 'Error Borrando Fila', 'formData' => $_POST);
}
echo json_encode($data);
?>