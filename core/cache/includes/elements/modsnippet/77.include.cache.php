<?php
$query1 = "SELECT DISTINCT(`estado_origen`) as estado FROM `rutas` order by estado_origen";
$query = $modx->query($query1);
$rows = array();
if ($query) {
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		$tempvar = $row["estado"];
		$tempvar2 = $row["estado"];
		switch($row["estado"]){

		case "AG":
						$tempvar = "AGUASCALIENTES";
						break;
		case "BJ":
						$tempvar = "BAJA CALIFORNIA";
						break;
		case "BS":
						$tempvar = "BAJA CALIFORNIA SUR";
						break;
		case "CM":
						$tempvar = "CAMPECHE";
						break;
		case "CO":
						$tempvar = "COAHUILA";
						break;
		case "CL":
						$tempvar = "COLIMA";
						break;
		case "CS":
						$tempvar = "CHIAPAS";
						break;
		case "CH":
						$tempvar = "CHIHUAHUA";
						break;
		case "DF":
						$tempvar = "DF";
						break;
		case "DG":
						$tempvar = "DURANGO";
						break;
		case "EM":
						$tempvar = "ESTADO DE MÉXICO";
						break;
		case "GT":
						$tempvar = "GUANAJUATO";
						break;	
		case "GR":
						$tempvar = "GUERRERO";
						break;
		case "HG":
						$tempvar = "HIDALGO";
						break;
		case "JC":
						$tempvar = "JALISCO";
						break;
		case "MN":
						$tempvar = "MICHOACÁN";
						break;
		case "MS":
						$tempvar = "MORELOS";
						break;
		case "NT":
						$tempvar = "NAYARIT";
						break;
		case "NL":
						$tempvar = "NUEVO LEÓN";
						break;
		case "OC":
						$tempvar = "OAXACA";
						break;
		case "PL":
						$tempvar = "PUEBLA";
						break;
		case "QO":
						$tempvar = "QUERÉTARO";
						break;
		case "QR":
						$tempvar = "QUINTANA ROO";
						break;
		case "SP":
						$tempvar = "SAN LUIS POTOSÍ";
						break;
		case "SL":
						$tempvar = "SINALOA";
						break;
		case "SR":
						$tempvar = "SONORA";
						break;
		case "TC":
						$tempvar = "TABASCO";
						break;
		case "TM":
						$tempvar = "TAMAULIPAS";
						break;
		case "TL":
						$tempvar = "TLAXCALA";
						break;
		case "VZ":
						$tempvar = "VERACRUZ";
						break;
		case "YN":
						$tempvar = "YUCATÁN";
						break;
case "YC":
						$tempvar = "YUCATÁN";
						break;
		case "ZS":
						$tempvar = "ZACATECAS";
						break;						

		}
$selected1 = "";
$vgetdestino = str_replace("+", " ", $vgetdestino);
if($vgetdestino == $tempvar2){
$selected1 = "selected";
}

		echo "<option ".$selected1." value='".$tempvar2."'>".$tempvar."</option>";

	}
}
else{
	//echo 0;
}
return;
