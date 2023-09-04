<?php

require_once('class.view.php');

$view = new View('/tpl/');
$view->set('title', 'MAIN');
$view->set('contentHome', 'Home');
$view->set('contentAbout', 'About');
$view->set('contentPurchases', 'Purchases');
$view->set('contentGACHI_FOOD', 'GACHI FOOD');
$view->set('contentEVERYTHING', 'EVERYTHING FOR NAKED MUSCULAR MEN');
$view->set('contentCssStyle', 'css/style.css');
$view->display('index.tpl');
?>