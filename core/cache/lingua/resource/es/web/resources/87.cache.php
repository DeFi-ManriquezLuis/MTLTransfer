<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 87,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'webservice3',
    'longtitle' => '',
    'description' => '',
    'alias' => 'webservice3',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '[[!marketrateSelectors]]',
    'richtext' => 1,
    'template' => 0,
    'menuindex' => 28,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1444916177,
    'editedby' => 1,
    'editedon' => 1444916596,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1444829940,
    'publishedby' => 1,
    'menutitle' => '',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 1,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'webservice3.html',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => '{"stercseo":{"index":"1","follow":"1","sitemap":"1","priority":"0.5","changefreq":"weekly","urls":""}}',
    '_content' => '[[!marketrateSelectors]]',
    '_isForward' => false,
    '_sjscripts' => 
    array (
      0 => '<!-- This site is optimized with the Sterc seoPro plugin 1.0.3 - http://www.sterc.nl/modx/seopro -->',
    ),
    '_jscripts' => 
    array (
      0 => '
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://wsidevelopment.com.mx/playground/stats/" : "http://wsidevelopment.com.mx/playground/stats/");
document.write(unescape("%3Cscript src=\'" + pkBaseURL + "piwik.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 82);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://wsidevelopment.com.mx/playground/stats/piwik.php?idsite=82" style="border:0" alt="" /></p></noscript>',
    ),
    '_loadedjscripts' => 
    array (
      '<!-- This site is optimized with the Sterc seoPro plugin 1.0.3 - http://www.sterc.nl/modx/seopro -->' => true,
      '
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://wsidevelopment.com.mx/playground/stats/" : "http://wsidevelopment.com.mx/playground/stats/");
document.write(unescape("%3Cscript src=\'" + pkBaseURL + "piwik.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 82);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://wsidevelopment.com.mx/playground/stats/piwik.php?idsite=82" style="border:0" alt="" /></p></noscript>' => true,
    ),
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
    ),
    'modSnippet' => 
    array (
      'marketrateSelectors' => 
      array (
        'fields' => 
        array (
          'id' => 78,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'marketrateSelectors',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '$wser = $_POST["wser"];
$thisone = $_POST["esorigen"];
$esorigen = $_POST["esorigen"];
$cdorigen = $_POST["cdorigen"];
$esdestino = $_POST["esdestino"];
$cddestino = $_POST["cddestino"];
$anio = $_POST["anio"];
$tipot = $_POST["tipot"];

switch($wser){

case 1:
		$query1 = "SELECT DISTINCT(`ciudad_origen`) as cdorigen FROM `rutas` where estado_origen = \'".$esorigen."\'";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["cdorigen"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $cdorigen);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 2:
		$query1 = "SELECT DISTINCT(`estado_destino`) as esdestino FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' order by estado_destino";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
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
				echo "<option ".$selected1." value=\'".$tempvarraw."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 3:
		$query1 = "SELECT DISTINCT(`ciudad_destino`) as cddestino FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' and estado_destino = \'".$esdestino."\'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["cddestino"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $cddestino);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 4:
		$query1 = "SELECT DISTINCT(`anio`) as anio FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' and estado_destino = \'".$esdestino."\' and ciudad_destino = \'".$cddestino."\'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["anio"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $anio);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 5:
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo_transporte FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' and estado_destino = \'".$esdestino."\' and ciudad_destino = \'".$cddestino."\' and anio = \'".$anio."\'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
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
				echo "<option ".$selected1." value=\'".$tempvarused."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
}',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '$wser = $_POST["wser"];
$thisone = $_POST["esorigen"];
$esorigen = $_POST["esorigen"];
$cdorigen = $_POST["cdorigen"];
$esdestino = $_POST["esdestino"];
$cddestino = $_POST["cddestino"];
$anio = $_POST["anio"];
$tipot = $_POST["tipot"];

switch($wser){

case 1:
		$query1 = "SELECT DISTINCT(`ciudad_origen`) as cdorigen FROM `rutas` where estado_origen = \'".$esorigen."\'";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["cdorigen"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $cdorigen);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 2:
		$query1 = "SELECT DISTINCT(`estado_destino`) as esdestino FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' order by estado_destino";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
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
				echo "<option ".$selected1." value=\'".$tempvarraw."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 3:
		$query1 = "SELECT DISTINCT(`ciudad_destino`) as cddestino FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' and estado_destino = \'".$esdestino."\'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["cddestino"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $cddestino);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 4:
		$query1 = "SELECT DISTINCT(`anio`) as anio FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' and estado_destino = \'".$esdestino."\' and ciudad_destino = \'".$cddestino."\'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
		if ($query) {
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$tempvar = $row["anio"];
				$selected1 = "";
				$thisone = str_replace("+", " ", $anio);
				if($thisone == $tempvar){
				$selected1 = "selected";
				}
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
case 5:
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo_transporte FROM `rutas` where estado_origen = \'".$esorigen."\' and ciudad_origen =\'".$cdorigen."\' and estado_destino = \'".$esdestino."\' and ciudad_destino = \'".$cddestino."\' and anio = \'".$anio."\'";
		echo $query1;
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
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
				echo "<option ".$selected1." value=\'".$tempvarused."\'>".$tempvar."</option>";
			}
		}
		else{
			//echo 0;
		}
break;
}',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
    ),
  ),
);