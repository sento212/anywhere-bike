<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/add_button.php');


class AddbuttonController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'hidupwibuhidupwibuhidupwibuhidupwibu') {
                $no_regis = $_POST['_no_regis'];
                $sqlbuilder = new DAO_builder(['LITE', 'BIKE']);
                $conn = isset($sqlbuilder->cheker['status']) ? $sqlbuilder->cheker['status'] : '';
                if ($conn == 400) {
                    throw new Exception($sqlbuilder->cheker['message']);
                }
                $data_ambil = addbutton($sqlbuilder, $no_regis);
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
                "status" => 0,
                "message" => 'API Error : ' . $e->getMessage(),
                "data" => []
            ];
            return $result;
        }
    }
}