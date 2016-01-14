<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 84,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'webservice',
    'longtitle' => '',
    'description' => '',
    'alias' => 'webservice',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '[[!getTiposRH? &vgettipo = `[[!GET?v=`tipo`]]`]]',
    'richtext' => 1,
    'template' => 0,
    'menuindex' => 25,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1444829966,
    'editedby' => 1,
    'editedon' => 1444832922,
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
    'uri' => 'webservice.html',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => '{"stercseo":{"index":"1","follow":"1","sitemap":"1","priority":"0.5","changefreq":"weekly","urls":""}}',
    '_content' => '[[!getTiposRH? &vgettipo = `[[!GET?v=`tipo`]]`]]',
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
      'GET' => 
      array (
        'fields' => 
        array (
          'id' => 23,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'GET',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '// Getting variable from _GET
// Usage example: [ [ GET?v=`yourGetVariable` ] ]
// By: Piotr Matysiak / pm-fx.com
$output = $_GET[$v];
if(!$_GET[$v]){$output = \'none\';}
return $output;',
          'locked' => false,
          'properties' => NULL,
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '// Getting variable from _GET
// Usage example: [ [ GET?v=`yourGetVariable` ] ]
// By: Piotr Matysiak / pm-fx.com
$output = $_GET[$v];
if(!$_GET[$v]){$output = \'none\';}
return $output;',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
      'getTiposRH' => 
      array (
        'fields' => 
        array (
          'id' => 74,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'getTiposRH',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '$wser = $_POST["wser"];
$thisone = $_POST["esorigen"];
$esorigen = $_POST["esorigen"];
$esdestino = $_POST["esdestino"];
$anio = $_POST["anio"];
$tipot = $_POST["tipot"];
switch($wser){

case 1:
		$query1 = "SELECT DISTINCT(`estado_destino`) as esdestino FROM `rutas` where estado_origen = \'".$esorigen."\' order by estado_destino";
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
case 2:
		$query1 = "SELECT DISTINCT(`anio`) as anio FROM `rutas` where estado_origen = \'".$esorigen."\' and estado_destino = \'".$esdestino."\'";
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
case 3:
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo_transporte FROM `rutas` where estado_origen = \'".$esorigen."\' and estado_destino = \'".$esdestino."\' and anio = \'".$anio."\'";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
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
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
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
		echo "<option value=\'\'>Seleccione...</option>";
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
		
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
		
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
$esdestino = $_POST["esdestino"];
$anio = $_POST["anio"];
$tipot = $_POST["tipot"];
switch($wser){

case 1:
		$query1 = "SELECT DISTINCT(`estado_destino`) as esdestino FROM `rutas` where estado_origen = \'".$esorigen."\' order by estado_destino";
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
case 2:
		$query1 = "SELECT DISTINCT(`anio`) as anio FROM `rutas` where estado_origen = \'".$esorigen."\' and estado_destino = \'".$esdestino."\'";
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
case 3:
		$query1 = "SELECT DISTINCT(`tipo_transporte`) as tipo_transporte FROM `rutas` where estado_origen = \'".$esorigen."\' and estado_destino = \'".$esdestino."\' and anio = \'".$anio."\'";
		$query = $modx->query($query1);
		$rows = array();
		echo "<option value=\'\'>Seleccione...</option>";
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
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
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
		echo "<option value=\'\'>Seleccione...</option>";
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
		
				echo "<option ".$selected1." value=\'".$tempvar."\'>".$tempvar."</option>";
		
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