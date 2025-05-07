<?php
include (__DIR__ . '/dao.php');
include (__DIR__ . '/../dao/data_search.php');

class DataSearchController implements DAO
{

    public function POST()
    {
        try {
            // $dt =  json_decode(file_get_contents("php://input")); metode ambil data raw JSON
            // $_POST metode ambil data tipe form
            if ($_SERVER['HTTP_ID'] == 'mks' and $_SERVER['HTTP_KEY'] == 'naninaninaninaninaninaninani') {
                $mkg_group = $_POST['mk_group'];
                $stat_uwd_stat = $_POST["stat_uwd_stat"];
                $list_mkg_nya = $_POST['list_mkg_nya'];
                $list_Q_P = $_POST["list_Q_P"];
                $tgl_awal = $_POST["cari_tgl_awal"];
                $tgl_akhir = $_POST["cari_tgl_khir"];
                $user_id = $_POST["user_id"];


                if ($stat_uwd_stat == '') {
                    $stat_uwd_stat = 'ALL';
                }
                if ($stat_uwd_stat == 'ALL') {
                    $where_data_uwd = "";
                }
                if ($stat_uwd_stat == 'APPL') {
                    $where_data_uwd = "and m.uwd_status = 'APPL' ";
                }
                if ($stat_uwd_stat == 'HOLD') {
                    $where_data_uwd = "and m.uwd_status = 'HOLD' ";
                }
                if ($stat_uwd_stat == 'INPROGRESS') {
                    $where_data_uwd = "and m.uwd_status = 'INPROGRESS' ";
                }
                if ($stat_uwd_stat == 'APPROVE') {
                    $where_data_uwd = "and m.uwd_status = 'APPROVE' ";
                }
                if ($stat_uwd_stat == 'REJECT') {
                    $where_data_uwd = "and m.uwd_status = 'REJECT' ";
                }


                if ($list_mkg_nya == 'ALL' or $list_mkg_nya == '') {
                    $_where_mkg = "";
                } else {
                    $_where_mkg = "and m.mkg_member = '$list_mkg_nya' ";
                }

                if ($list_Q_P == '' or $list_Q_P == null)
                    ($list_Q_P = 'Quotation');
                if ($list_Q_P == 'Polis' or $list_Q_P == 'P') {
                    $where_data = "and  SUBSTRING(m.register_id,1,1) = 'P'  ";
                }
                if ($list_Q_P == 'Quotation' or $list_Q_P == 'Q') {
                    $where_data = "and  SUBSTRING(m.register_id,1,1) = 'Q'  ";
                }
                if ($list_Q_P == 'Simulation' or $list_Q_P == 'S') {
                    $where_data = "and  SUBSTRING(m.register_id,1,1) = 'S'  ";
                }

                if ($list_Q_P == 'Polis' or $list_Q_P == 'P') {
                    $where_Count = "and  SUBSTRING(m.register_id,1,1) = 'P'  ";
                }
                if ($list_Q_P == 'Quotation' or $list_Q_P == 'Q') {
                    $where_Count = "and  SUBSTRING(m.register_id,1,1) = 'Q'  ";
                }
                if ($list_Q_P == 'Simulation' or $list_Q_P == 'S') {
                    $where_Count = "and  SUBSTRING(m.register_id,1,1) = 'S'  ";
                }

                if ($_POST["show_data_list"] == 'cari_tgl_di_list') {
                    $cari_tgl_awal = date("d-m-Y", strtotime($tgl_awal));
                    $cari_tgl_akhir = date("d-m-Y", strtotime($tgl_akhir));
                } else {
                    $cari_tgl_awal = date("d-m-Y", strtotime("-7 day"));
                    $cari_tgl_akhir = date("d-m-Y");
                }


                $sqlbuilder = new DAO_builder(['LITE', 'BIKE']);
                $conn = isset($sqlbuilder->cheker['status']) ? $sqlbuilder->cheker['status'] : '';
                if ($conn == 400) {
                    throw new Exception($sqlbuilder->cheker['message']);
                }
                $data_ambil = data_all($sqlbuilder, $mkg_group, $where_data_uwd, $_where_mkg, $where_data, $cari_tgl_awal, $cari_tgl_akhir, $user_id, $where_Count);
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