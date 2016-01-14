<?php  return '//return date(\'l jS \\of F Y\');

if($modx->cultureKey == "es"){
	setlocale(LC_ALL, \'es_MX.UTF-8\');
	echo strftime("%A %e de %B de %Y");
}
else{
	setlocale(LC_ALL, \'en_US.UTF-8\');
	echo strftime("%A %e of %B of %Y");
}
setlocale(LC_ALL, \'es_MX.UTF-8\');
return;
';