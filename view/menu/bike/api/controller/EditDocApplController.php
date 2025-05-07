<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/edit_doc_appr.php');



class EditDocApplController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'dewanyarikerjadewanyarikerja') {
                $no_regis = $_POST['_no_regis'];
                $doc_app_nomer = str_replace(" ", "", $_POST['val_reg_doc_app']);
                $doc_app_nomer_02 = str_replace(" ", "", $_POST['val_reg_doc_app_02']);
                $doc_app_nomer_03 = str_replace(" ", "", $_POST['val_reg_doc_app_03']);
                $doc_app_nomer_04 = str_replace(" ", "", $_POST['val_reg_doc_app_04']);
                $sqlbuilder = new DAO_builder(['BIKE']);
                if ($sqlbuilder->cheker['status'] == 400) {
                    throw new Exception($sqlbuilder->cheker['message']);
                }
                $data_ambil = edit_doc($sqlbuilder, $no_regis, $doc_app_nomer, $doc_app_nomer_02, $doc_app_nomer_03, $doc_app_nomer_04);
                if ($data_ambil['status'] == 200) {
                    header('Content-Type: application/json');
                    return $data_ambil;
                } else {
                    throw new Exception("$data_ambil[message]");
                }


            } else {
                throw new Exception("gagal mengakses api");
            }

        } catch (Exception $e) {
            // Handle the exception
            header('Content-Type: application/json');
            $result = [
                "status" => 400,
                "message" => 'API Error : ' . $e->getMessage(),
                "data" => []
            ];
            return $result;
        }
    }
}