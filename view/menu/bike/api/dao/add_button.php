<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);

function addbutton($sqlbuilder, $_no_regis)
{
    $table_use = $_SESSION['table_use'];
    $table_use_det = $_SESSION['table_use_det'];
    $table_foto = $_SESSION['table_foto'];
    $table_survey = $_SESSION['table_survey'];

    $perintah = "SELECT m.rowid,m.register_id register_id_mst,
                                        u.register_id register_id_det, u.unit_no
                                 from $table_use m,
                                      polis_agent_direct_unit u
                                 where     m.register_id = '$_no_regis'
                                       AND m.register_id = u.register_id  ";
    $data = $sqlbuilder->select('BIKE', $perintah);
    if ($data['status'] == 400) {
        return $data;
    }
    $result = [
        "status" => 200,
        "message" => 'select data berhasil',
        "data" => count($data['data'])
    ];
    return $result;

}