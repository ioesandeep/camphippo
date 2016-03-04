<?php
$lang = require_once dirname(__FILE__) . '/lang.php';

ksort($lang);

$h = fopen(dirname(__FILE__) . '/lang.php','w');
fwrite($h, '<?php' . "\n");
fwrite($h, 'return ' . var_export($lang, true).';');
fclose($h);