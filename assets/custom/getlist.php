<?php

include "index.php";

$sql = "select * from rutas";
$resultarray = getArraySQL($sql);
//echo json_encode($resultarray);
$content .= '<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr class="">
            <td class="">
                <div class="" unselectable="on" style="">
                    Borrar Fila
                </div>
            </td>
            <td class="" style="display: none;">
                <div class="" unselectable="on" style="">
                    ID
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Mes
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Año
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Estado Origen
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Estado Destino
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Ciudad Origen
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Ciudad Destino
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Compañia Transportadora
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Tipo de Transporte
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Tipo de combustible usado
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Tipo de Movimiento
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Costo(Pesos)
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Carga Maxima(TON)
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Rendimiento por litro
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Costo del diesel
                </div>
            </td>
            <td class="">
                <div class="" unselectable="on" style="">
                    Tiempo en Transito
                </div>
            </td>
        </tr>
    </thead>
    <tbody>
';

foreach ($resultarray as $clave => $valor){
    $content .= '<tr>';
    $content .= '<td><a href="#" class="delrow" data-rowid="'.$valor['id'].'">X</a></td>';
    $content .= '<td style="display: none;">'.$valor['id'].'</td>';
    $content .= '<td>'.$valor['mes'].'</td>';
    $content .= '<td>'.$valor['anio'].'</td>';
    $content .= '<td>'.$valor['estado_origen'].'</td>';
    $content .= '<td>'.$valor['estado_destino'].'</td>';
    $content .= '<td>'.$valor['ciudad_origen'].'</td>';
    $content .= '<td>'.$valor['ciudad_destino'].'</td>';
    $content .= '<td>'.$valor['transportadora'].'</td>';
    $content .= '<td>'.$valor['tipo_transporte'].'</td>';
    $content .= '<td>'.$valor['tipo_combustible'].'</td>';
    $content .= '<td>'.$valor['tipo_movimiento'].'</td>';
    $content .= '<td>'.$valor['costo'].'</td>';
    $content .= '<td>'.$valor['carga'].'</td>';
    $content .= '<td>'.$valor['rendimiento'].'</td>';
    $content .= '<td>'.$valor['diesel'].'</td>';
    $content .= '<td>'.$valor['tiempo'].'</td>';    
    $content .= '</tr>';
    //echo $valor['mes'];
    //echo $valor['anio'];
}
$content .= '    </tbody>
</table>';
echo $content;
?>
