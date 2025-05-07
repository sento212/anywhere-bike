<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/periode_polis.php');

class PeriodPolisController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'rianbotakrianbotakrianbotakrianbotak') {
                $register_id = $_POST['register_id'];
                $sqlbuilder = new DAO_builder(['LITE']);
                if ($sqlbuilder->cheker[status] == 400) {
                    throw new Exception($sqlbuilder->cheker[message]);
                }
                $data_ambil = data_periode_polis($sqlbuilder, $register_id);
                if ($data_ambil[status] == 200) {
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
?>