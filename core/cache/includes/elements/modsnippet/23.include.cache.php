<?php
// Getting variable from _GET
// Usage example: [ [ GET?v=`yourGetVariable` ] ]
// By: Piotr Matysiak / pm-fx.com
$output = $_GET[$v];
if(!$_GET[$v]){$output = 'none';}
return $output;
return;
