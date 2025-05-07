<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
include (__DIR__ . '/router.php');
include (__DIR__ . '/../../../../settings/DAO_builder.php');
include (__DIR__ . '/setting/config.php');
$route = new router();

$route->addroute('/data', 'DataController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/count_unit', 'AddbuttonController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/survey_test', 'CeksurveyController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/foto_unit', 'FotoUnitController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/data_search', 'DataSearchController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/data_save_main', 'SaveMainController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/edit_doc_appr', 'EditDocApplController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/hapus_unit', 'HapusUnitController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/pdf_any_generator', 'PdfQuotationV3Controller', $_SERVER['REQUEST_METHOD']);

$route->addroute('/perhitungan_premi', 'PerhitunganPremiController', $_SERVER['REQUEST_METHOD']);

$route->addroute('/aprov_uwd', 'UwdApprovController', $_SERVER['REQUEST_METHOD']);


//buat demo dengan testing silahkan di pakai
$route->addroute('/testing', 'testingController', $_SERVER['REQUEST_METHOD']);

$position = strrpos($_SERVER['REQUEST_URI'], "anywhere_bike");

$hasil = $route->running($_SERVER['QUERY_STRING']);
session_unset();
session_destroy();
echo json_encode($hasil);

// ini_set('display_errors', 0);


