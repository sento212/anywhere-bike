<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/data_main_save.php');

class SaveMainController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'inimainsaveinimainsaveinimainsave') {
                $dt = json_decode(file_get_contents("php://input"), true);
                $sqlbuilder = new DAO_builder(['LITE', 'BIKE']);
                $conn = isset($sqlbuilder->cheker['status']) ? $sqlbuilder->cheker['status'] : '';
                if ($conn == 400) {
                    throw new Exception($sqlbuilder->cheker['message']);
                }

                $data_ambil = save_main($sqlbuilder, $dt);
                if ($data_ambil['status'] == 200) {
                    header('Content-Type: application/json');
                    return $data_ambil;
                }
                else {
                    throw new Exception("$data_ambil[message]");
                }

            }
            else {
                throw new Exception("gagal mengakses api");
            }
        } catch (Exception $e) {
            // Handle the exception
            header('Content-Type: application/json');
            $dt = json_decode(file_get_contents("php://input"), true);
            $result = [
                "status" => 400,
                "message" => $e->getMessage(),
                "data" => [$dt['no_regis'], $dt['unit_no']]
            ];
            return $result;
        }
    }
}
?>