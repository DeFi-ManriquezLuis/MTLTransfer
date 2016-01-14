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
if(isset($_GET['files']))
{
    $error = false;
    $files = array();
    $uploaddir = './uploads/';
    $random = substr(md5(rand()), 0, 4);
    substr(basename($file['name']), -3);
    foreach($_FILES as $file)
    {
        if (substr(basename($file['name']), -3) == "csv") {
            if(move_uploaded_file($file['tmp_name'], $uploaddir .$random."_".basename($file['name'])))
            {            
                $files[] = $uploaddir .$random."_".$file['name'];
                $filename = $uploaddir .$random."_".$file['name'];
                
                ///////////
                $handle = fopen($filename,"r");
                fgetcsv($handle,100000,",","'");
                //loop through the csv file and insert into database
                do {
                    if ($data[0]) {
                        exeSQL("INSERT INTO rutas (mes, anio, estado_origen, estado_destino, ciudad_origen, ciudad_destino, transportadora, tipo_transporte, tipo_combustible, tipo_movimiento, costo, carga, rendimiento, diesel, tiempo) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    '".addslashes($data[4])."',
                    '".addslashes($data[5])."',
                    '".addslashes($data[6])."',
                    '".addslashes($data[7])."',
                    '".addslashes($data[8])."',
                    '".addslashes($data[9])."',
                    '".addslashes($data[10])."',
                    '".addslashes($data[11])."',
                    '".addslashes($data[12])."',
                    '".addslashes($data[13])."',
                    '".addslashes($data[14])."'
                )
            ");
                    }
                } while ($data = fgetcsv($handle,100000,",","'")); 
                //////////
            }
            else
            {
                $error = true;
            }
        }
    }
    $data = ($error) ? array('error' => 'Ocurrio un error al subir el archivo, por favor verifique que el archivo tenga una extension .csv') : array('files' => $files);
}
else
{
    $data = array('success' => 'El archivo ha sido importado correctamente, recarge esta pagina para reflejar los cambios.', 'formData' => $_POST);
}
echo json_encode($data);
?>