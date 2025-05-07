<?php

class UserModel extends Main_model
{
    private $user_id, $mkg_group, $pilih, $full_dept;
    public $menu;

    public function __construct($user_id, $mkg_group, $pilihan, $menu, $full_dept)
    {
        parent::__construct();
        $this->pilih = $pilihan;
        $this->user_id = $user_id;
        $this->mkg_group = $mkg_group;
        $this->full_dept = $full_dept;
        $this->menu = $menu;
    }

    public function location_data($dat)
    {
        $sqlbuilder = $this->conn;
        $url_api = "https://www.raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/location_data";
        $data_api = array("input_company_code" => $dat, "input_location_code" => '');
        $header = array('Content-Type: multipart/form-data');
        $location = $sqlbuilder->api('POST', $url_api, $data_api, $header);
        return $location;
    }

    public function count_unit($_no_regis)
    {
        $sqlbuilder = $this->conn;
        $url_api = "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/count_unit";
        $data_api = array("_no_regis" => $_no_regis);
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: hidupwibuhidupwibuhidupwibuhidupwibu');
        $count_unit = $sqlbuilder->api('POST', $url_api, $data_api, $header);
        return $count_unit;
    }

    public function foto_unit($_no_regis, $unit_number)
    {
        $sqlbuilder = $this->conn;
        $url_api = "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/foto_unit";
        $data_api = array("register_id" => $_no_regis, "unit_number" => $unit_number);
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: mamamamamamamamamamamamamamama');
        $count_unit = $sqlbuilder->api('POST', $url_api, $data_api, $header);
        return $count_unit;
    }

    public function data_model($_no_regis, $_unit_no)
    {
        $sqlbuilder = $this->conn;
        $send = array('_no_regis' => $_no_regis, '_unit_no' => $_unit_no);
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: dewawibudewawibudewawibudewawibu');
        $data = $sqlbuilder->api('POST', 'https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/data', $send, $header);
        return $data;
    }

    public function list_data_model($stat_uwd_stat, $list_mkg_nya, $list_Q_P, $show_data_list, $cari_tgl_awal, $cari_tgl_khir)
    {
        $sqlbuilder = $this->conn;
        $mkg_group = $this->mkg_group;
        $user_id = $this->user_id;
        $send = array(
            'mk_group' => $mkg_group,
            'stat_uwd_stat' => $stat_uwd_stat,
            'list_mkg_nya' => $list_mkg_nya,
            'list_Q_P' => $list_Q_P,
            'show_data_list' => $show_data_list,
            'cari_tgl_awal' => $cari_tgl_awal,
            'cari_tgl_khir' => $cari_tgl_khir,
            'user_id' => $user_id
        );
        // print_r($send);
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: naninaninaninaninaninaninani');
        $data = $sqlbuilder->api('POST', 'https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/data_search', $send, $header);
        return $data;
    }

    public function save_main_data()
    {
        $sqlbuilder = $this->conn;
        $_bukti_conf_sppa_name = $_FILES['bukti_conf_sppa']['name'];
        $_bukti_conf_sppa_tmp_name = $_FILES['bukti_conf_sppa']['tmp_name'];
        $_bukti_conf_sppa_size = $_FILES['bukti_conf_sppa']['size'];
        $data_save = $_POST;
        $_jml_foto = $_POST['jml_foto'];
        $_no_regis = $_POST['no_regis'];
        if ($_no_regis != '' and $_jml_foto != 'none') {
            for ($Z = 1; $Z <= $_jml_foto; $Z++) {
                $_del_foto_[$Z] = $_POST['del_foto_' . $Z];
                $_type_foto_[$Z] = $_POST['type_foto_' . $Z];
                $_nama_file_[$Z] = $_POST['nama_file_' . $Z];
                $_url_foto_[$Z] = $_POST['url_foto_' . $Z];
                $_Harga_mobil = $_POST['Harga_mobil_' . $Z];
                $_Upload_nama_asli_[$Z] = $_FILES['file_wfh_' . $Z]['name'];
                $_Upload_nama_temp_[$Z] = $_FILES['file_wfh_' . $Z]['tmp_name'];
                $_Upload_file_size_[$Z] = $_FILES['file_wfh_' . $Z]['size'];
                if ($_Upload_nama_temp_[$Z] != '') {
                    $datong = file_get_contents($_Upload_nama_temp_[$Z]);
                    $_Upload_nama_temp = base64_encode($datong);
                }
                else {
                    $_Upload_nama_temp = '';
                }
                $multi_foto[] = array(
                    'del_foto_' => $_del_foto_[$Z],
                    'type_foto_' => $_type_foto_[$Z],
                    'nama_file_' => $_nama_file_[$Z],
                    'url_foto_' => $_url_foto_[$Z],
                    'Harga_mobil_' => $_Harga_mobil,
                    'Upload_nama_asli_' => $_Upload_nama_asli_[$Z],
                    'Upload_nama_temp_' => $_Upload_nama_temp,
                    'Upload_file_size_' => $_Upload_file_size_[$Z]
                );

            }
            $data_save['multi_foto'] = $multi_foto;
        }
        // print_r($multi_foto);

        if ($_FILES['bukti_conf_sppa']['tmp_name']) {
            $data = file_get_contents($_bukti_conf_sppa_tmp_name);
            $_bukti_conf_sppa_tmp_name = base64_encode($data);
            $data_save['bukti_conf_sppa'] = array(
                '_bukti_conf_sppa_name' => $_bukti_conf_sppa_name,
                '_bukti_conf_sppa_tmp_name' => $_bukti_conf_sppa_tmp_name,
                '_bukti_conf_sppa_size' => $_bukti_conf_sppa_size,
            );
        }

        $header = array('Content-Type: application/json', 'id: mks', 'key: inimainsaveinimainsaveinimainsave');
        $data_api = json_encode($data_save);
        $data = $sqlbuilder->api('POST', 'https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/data_save_main', $data_api, $header);
        return $data;
    }

    public function request_uwd($list_regis)
    {
        $sqlbuilder = $this->conn;
        $header = array('Content-Type: application/json', 'id: mks', 'key: heruplayboyheruplayboyheruplayboy');
        $data = [
            "no_regis" => $list_regis
        ];
        $data_api = json_encode($data);
        $data = $sqlbuilder->api('POST', 'https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/aprov_uwd', $data_api, $header);
        return $data;     
    }

    public function save_doc_appl($no_regis, $reg_approval_web, $reg_approval_web_02, $reg_approval_web_03, $reg_approval_web_04)
    {
        $sqlbuilder = $this->conn;
        $url_api = "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/edit_doc_appr";
        $data_api = array(
            "_no_regis" => $no_regis,
            "val_reg_doc_app" => $reg_approval_web,
            "val_reg_doc_app_02" => $reg_approval_web_02,
            "val_reg_doc_app_03" => $reg_approval_web_03,
            "val_reg_doc_app_04" => $reg_approval_web_04
        );
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: dewanyarikerjadewanyarikerja');
        $data = $sqlbuilder->api('POST', $url_api, $data_api, $header);
        return $data;
    }

    public function hapus_unit($no_regis, $no_unit)
    {
        $sqlbuilder = $this->conn;
        $url_api = "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/hapus_unit";
        $data_api = array("_no_regis" => $no_regis, "_unit_no" => $no_unit);
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: rianmapusrianmapusrianmapus');
        $data = $sqlbuilder->api('POST', $url_api, $data_api, $header);
        return $data;
    }

    public function generate_pdf($regis, $jml_unit, $type_data)
    {
        $sqlbuilder = $this->conn;
        if ($jml_unit > 1) {
            $type = 'new';
        }
        else {
            $type = 'old';
        }
        if ($type_data == 'Quotation') {
            $pdf_type = 'Q';
        }
        else {
            $pdf_type = 'S';
        }
        $url_api = "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/pdf_any_generator";
        $data_api = array("register_id" => $regis, "type" => $type, "pdf_type" => $pdf_type);
        $header = array('Content-Type: multipart/form-data', 'id: mks', 'key: ASkasjd1238941#*2dasllzzzz');
        $data = $sqlbuilder->api('POST', $url_api, $data_api, $header);
        return $data;
    }
}
// $header = array('Content-Type: application/json','id: mks','key: dewawibudewawibudewawibudewawibu'); set value content type at curl header api to send out type request
// 'Content-Type: application/json' for json type of data / raw data
// 'Content-Type: multipart/form-data' for form type of data
// mostly api request need to set up the type request of the data

?>