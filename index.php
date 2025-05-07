<?php
// error_reporting(E_ALL & ~E_DEPRECATED);
// ini_set('display_errors', 1);
session_start();


echo "
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Entry Polis Raksa</title>
</head>

<body>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap' rel='stylesheet' />

    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css' rel='stylesheet' crossorigin='anonymous'>

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js '></script>
    ";

    // <link rel='stylesheet' href='https://www.rks-m.com/mks/entry/settings/style/fa4.7.0/css/font-awesome.min.css'>
    // <!-- <link rel='stylesheet' href='Editor-2.3.0/css/editor.dataTables.css'> -->
    // <!-- <script src='Editor-2.3.0/js/dataTables.editor.js'></script> -->
    // <!-- datables-->
    echo"
    <link rel='stylesheet' href='https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.0/b-3.0.0/sl-2.0.0/datatables.min.css' />
    <link rel='stylesheet' href='https://www.rks-m.com/mks/entry/settings/jq/jquery-ui.css'>
    <script src='https://www.rks-m.com/mks/entry/settings/jq/jquery.js'></script>
    <script src='https://www.rks-m.com/mks/entry/settings/jq/jquery-ui.js'></script>

    <script src='https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.0/b-3.0.0/sl-2.0.0/datatables.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js'></script>
    <script src='https://cdn.datatables.net/v/bs5/jszip-3.10.1/af-2.7.0/b-3.0.0/b-colvis-3.0.0/b-html5-3.0.0/b-print-3.0.0/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.0/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.0/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js'></script>

    ";


require_once __DIR__ . '/controllers/main_controller.php';
require_once __DIR__ . '/model/main_model.php';
require_once __DIR__ . '/view/main_view.php';
require_once __DIR__ . '/settings/DAO_builder.php';


$controller = new Main_controller();
$controller->Show();

echo "
<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js' ></script>
<script src='https://code.jquery.com/jquery-3.7.1.js'></script>
";

// <!-- MDB -->
echo"
<link href='https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css' rel='stylesheet' />
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js'></script>
";



echo"
</body>
</html>
";
