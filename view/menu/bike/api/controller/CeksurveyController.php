<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/surveycheker.php');

class CeksurveyController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'wibuselamanyawibuselamanyawibuselamanya') {
                $fceksurveyno = $_POST['fceksurveyno'];
                $fsurveyno = $_POST['fsurveyno'];
                $SI_survey = $_POST['SI_survey'];
                $user_id = $_POST['user_id'];
                $mk_group = $_POST['mk_group'];
                $no_regis = $_POST['no_regis'];
                $unit_no = $_POST['unit_no'];

                $sqlbuilder = new DAO_builder(['LITE', 'BIKE']);
                $conn = isset($sqlbuilder->cheker['status']) ? $sqlbuilder->cheker['status'] : '';
                if ($conn == 400) {
                    throw new Exception($sqlbuilder->cheker['message']);
                }
                $data_ambil = survey_all($sqlbuilder, $fceksurveyno, $SI_survey, $user_id, $mk_group, $no_regis, $unit_no, $fsurveyno);
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
                "message" => 'API Error : ' . $e->getMessage().' on line '.$e->getTrace()[1]['line'],
                "data" => []
            ];  
            return $result;
        }
    }
}
?>