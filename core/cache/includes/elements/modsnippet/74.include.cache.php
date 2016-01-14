<?php
$wser = $_POST["wser"];
$thisone = $_POST["esorigen"];
$esorigen = $_POST["esorigen"];
$esdestino = $_POST["esdestino"];
$anio = $_POST["anio"];
$tipot = $_POST["tipot"];
switch($wser){

case 1:
		$query1 = "SELECT DISTINCT(`estado_destino`) as esdestino FROM `rutas` where estado_origen = '".$esorigen."' order by estado_destino";
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
case 2:
		$query1 = "SELECT DISTINCT(`anio`) as anio FROM `rutas` where estado_origen = '".$esorigen."' and estado_destino = '".$esdestino."'";
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
case 3:
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo_transporte FROM `rutas` where estado_origen = '".$esorigen."' and estado_destino = '".$esdestino."' and anio = '".$anio."'";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["tipo_transporte"];
				$tempvarused = $row["tipo_transporte"];

				switch($row["tipo_transporte"]){
		
				case "48FT/53FT":
								$tempvar = "48FT/53FT (48/53 Dry Van)";
								break;
				case "THORTON":
								$tempvar = "Thorton (15 TON)";
								break;
				case "3.5 TON":
								$tempvar = "3.5 TON";
								break;
				case "RABON":
								$tempvar = "Rabon (10 TON)";
								break;
		
				}

				$selected1 = "";
				$thisone = str_replace("+", " ", $tipot);
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
default:
		$vgettipo = $_POST["vgettipo"];
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo FROM `rutas` where anio = ".$_POST["year"];
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=''>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["tipo"];
				switch($row["tipo"]){
		
				case "48FT/53FT":
								$tempvar = "48FT/53FT (48/53 Dry Van)";
								break;
				case "THORTON":
								$tempvar = "Thorton (15 TON)";
								break;
				case "3.5 TON":
								$tempvar = "3.5 TON";
								break;
				case "RABON":
								$tempvar = "Rabon (10 TON)";
								break;
		
				}
		$selected1 = "";
		$vgettipo = str_replace("+", " ", $vgettipo);
		if($vgettipo == $tempvar){
		$selected1 = "selected";
		}
		
				echo "<option ".$selected1." value='".$tempvar."'>".$tempvar."</option>";
		
			}
		}
		else{
			//echo 0;
		}
break;

}
return;
