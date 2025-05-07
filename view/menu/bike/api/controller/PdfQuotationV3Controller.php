<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/create_quotation_v3.php');
include (__DIR__ . '/../dao/create_quotation_old.php');
include (__DIR__ . '/../dao/create_simulation_old.php');
include (__DIR__ . '/../dao/create_simulation_v3.php');

class PdfQuotationV3Controller implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'ASkasjd1238941#*2dasllzzzz') {
                $register_id = $_POST['register_id'];
                $kelas = $_POST['kelas']; // required
                $source = $_POST['source']; // not required
                $water_mark = $_POST['watermark']; // not required Yes and NO output
                $type = $_POST['type'];
                $pdf_type = $_POST['pdf_type'];
                if ($type == '') {
                    throw new Exception('type kosong tolong di isi');
                }
                if ($pdf_type == '') {
                    throw new Exception('tipe pdf kosong tolong di isi');
                }
                $sqlbuilder = new DAO_builder(['BIKE', 'LITE']);
                if ($sqlbuilder->cheker[status] == 400) {
                    throw new Exception($sqlbuilder->cheker[message]);
                }
                if ($pdf_type == 'Q') {
                    if ($type == 'new') {
                        $data_ambil = pdf_generate($sqlbuilder, $register_id, $kelas, $source, $water_mark);
                    } elseif ($type == 'old') {
                        $data_ambil = pdf_generate_old($sqlbuilder, $register_id, $kelas, $source, $water_mark);
                    }
                } elseif ($pdf_type == 'S') {
                    if ($type == 'new') {
                        $data_ambil = pdf_simulation($sqlbuilder, $register_id, $kelas, $source, $water_mark);
                    } elseif ($type == 'old') {
                        $data_ambil = pdf_simulation_old($sqlbuilder, $register_id, $kelas, $source, $water_mark);
                    }
                }

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
                "message" => $e->getMessage(),
                "data" => []
            ];
            return $result;
        }
    }
}
?>