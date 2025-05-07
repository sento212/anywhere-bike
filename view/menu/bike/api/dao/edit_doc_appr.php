<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);

function edit_doc($sqlbuilder, $_no_regis, $doc_app_nomer, $doc_app_nomer_02, $doc_app_nomer_03, $doc_app_nomer_04)
{
    $table_use = $_SESSION['table_use'];
    $table_use_det = $_SESSION['table_use_det'];
    $table_foto = $_SESSION['table_foto'];
    $table_survey = $_SESSION['table_survey'];

    $sql_update_doc_app = " UPDATE $table_use
                              set reg_approval_web = '$doc_app_nomer',
                              reg_approval_web_02 = '$doc_app_nomer_02',
                              reg_approval_web_03 = '$doc_app_nomer_03',
                              reg_approval_web_04 = '$doc_app_nomer_04'
                            where register_id = '$_no_regis'
                          ";
    $data = $sqlbuilder->executeCommit('BIKE', $sql_update_doc_app);
    if ($data['status'] == 400) {
        return $data;
    }
    $result = [
        "status" => 200,
        "message" => 'insert data berhasil',
        "data" => []
    ];
    return $result;

}