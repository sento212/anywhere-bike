<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/perhitungan_premi_bike.php');

class PerhitunganPremiController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'kdwaklwhkjq@#$3123DDLWDL') {
                $dt = json_decode(file_get_contents("php://input"), true);
                $register_id = $dt['register_id'];
                $class = $dt['class'];

                $sqlbuilder = new DAO_builder(['LITE', 'BIKE']);
                $conn = isset($sqlbuilder->cheker['status']) ? $sqlbuilder->cheker['status'] : '';
                if ($conn == 400) {
                    throw new Exception($sqlbuilder->cheker['message']);
                }
                $data_ambil = perhitungan_premi($sqlbuilder, $register_id);
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
?>