<?php  return '$tipo = 1;
$dist = 0;
$finalin = 0;
$tipotransporte = "";
switch ($_GET[\'tipo\']) {
    case 0:
		if($_GET[\'unidad\'] == "Km"){
			$tipo = 3.1;
		}else{
			$tipo = 7.3;
		}
		$tipotransporte = "Rabon (10 TON)";
        break;
    case 1:
        if($_GET[\'unidad\'] == "Km"){
			$tipo = 2.8;
		}else{
			$tipo = 6.6;
		}
		$tipotransporte = "Thorton (15 TON)";
        break;
    case 2:
        if($_GET[\'unidad\'] == "Km"){
			$tipo = 2.55;
		}else{
			$tipo = 6;
		}
		$tipotransporte = "48FT/53FT (48/53 Dry Van)";
        break;
}
echo $tipotransporte;
return;
';