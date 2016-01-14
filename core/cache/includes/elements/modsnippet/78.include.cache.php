<?php
$wser = $_POST["wser"];
$thisone = $_POST["esorigen"];
$esorigen = $_POST["esorigen"];
$cdorigen = $_POST["cdorigen"];
$esdestino = $_POST["esdestino"];
$cddestino = $_POST["cddestino"];
$anio = $_POST["anio"];
$tipot = $_POST["tipot"];

switch($wser){

case 1:
		$query1 = "SELECT DISTINCT(`ciudad_origen`) as cdorigen FROM `rutas` where estado_origen = '".$esorigen."'";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["cdorigen"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $cdorigen);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value='".$tempvar."'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 2:
		$query1 = "SELECT DISTINCT(`estado_destino`) as esdestino FROM `rutas` where estado_origen = '".$esorigen."' and ciudad_origen ='".$cdorigen."' order by estado_destino";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["esdestino"];
				$tempvarraw = $row["esdestino"];

				switch($row["esdestino"]){

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
		case "PU":
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
				$thisone = str_replace("+", " ", $esdestino);
				if($thisone == $tempvarraw){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value='".$tempvarraw."'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 3:
		$query1 = "SELECT DISTINCT(`ciudad_destino`) as cddestino FROM `rutas` where estado_origen = '".$esorigen."' and ciudad_origen ='".$cdorigen."' and estado_destino = '".$esdestino."'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["cddestino"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $cddestino);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value='".$tempvar."'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 4:
		$query1 = "SELECT DISTINCT(`anio`) as anio FROM `rutas` where estado_origen = '".$esorigen."' and ciudad_origen ='".$cdorigen."' and estado_destino = '".$esdestino."' and ciudad_destino = '".$cddestino."'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["anio"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $anio);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value='".$tempvar."'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 5:
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo_transporte FROM `rutas` where estado_origen = '".$esorigen."' and ciudad_origen ='".$cdorigen."' and estado_destino = '".$esdestino."' and ciudad_destino = '".$cddestino."' and anio = '".$anio."'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["tipo_transporte"];
				$tempvarused = ""; 

				switch($tempvar){

				case "RABON": $tempvarused = 0;
				break;

				case "THORTON": $tempvarused = 1;
				break;

				case "48FT/53FT": $tempvarused = 2;
				break;

				case "3.5 TON": $tempvarused = "3.5 TON";
				break;

				}

				$selected1 = "";
				$thisone = str_replace("+", " ", $tipot);
				if($thisone == $tempvarused){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value='".$tempvarused."'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
}
return;
