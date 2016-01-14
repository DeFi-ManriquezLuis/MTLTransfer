<?php
$query1 = "select distinct(anio) as anio from rutas";

$query = $modx->query($query1);

$rows = array();

if ($query) {
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['anio']."'>".$row['anio']."</option>";
    }
}
return;
