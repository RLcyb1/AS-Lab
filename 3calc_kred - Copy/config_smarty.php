<?php
require_once __DIR__ . '/libs/smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

$smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
$smarty->assign('app_name', 'Calc Kred Project');

return $smarty;
?>
