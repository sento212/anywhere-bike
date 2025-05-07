<?php
include __DIR__ . '/bike_model/UserModel.php';
class Main_model
{
    protected $conn;
    public $araksa, $bike;
    private $user_id, $mkg_group, $pilih, $full_dept;

    public function __construct()
    {
        $this->conn = new DAO_builder(['LITE', 'BIKE', 'REACT']);
        $this->araksa = $this->conn->conn['ARAKSA'];
        $this->bike = $this->conn->conn['BIKE'];
    }

    public function mkg_list()
    {
        $q_departemen = " SELECT cabang, cabang_label, status_cabang
                             FROM react_native.underwriting_approval_uwd_dept
                             WHERE
                             status_cabang='VALID'
                             ORDER BY cabang_label ASC
                         ";
        $list_marketing = $this->conn->select('BIKE', $q_departemen);
        return $list_marketing;
    }

    public function iklan_menu()
    {
        $iklan_ye = " SELECT rowid,judul,url_image
                            FROM underwriting_approval_list_slide_show
                            WHERE upper(STATUS) = 'VALID' AND now() BETWEEN eff_date and exp_date
                            ORDER BY no_urut
                         ";
        $hasil_iklan = $this->conn->select('REACT', $iklan_ye);
        return $hasil_iklan;
    }

    public function cek_user_pass_login($User_Id, $Pass_Md5)
    {
        $User_Id_md = md5(md5($User_Id));
        $data_api = ["upMD" => $User_Id_md, "up" => $User_Id, "pp" => $Pass_Md5];
        $header = ['Content-Type: multipart/form-data'];
        $cek_login = $this->conn->api('POST', 'https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh', $data_api, $header);
        return $cek_login;
    }

    public function cek_grant_login($User_Id, $Grant_Name)
    {
        $cek_user = strtoupper($User_Id);
        $cek_hak = strtoupper($Grant_Name);
        $data_api = ["user_id" => $cek_user, "roles" => $cek_hak];
        $header = ['Content-Type: multipart/form-data'];
        $grand_login = $this->conn->api('POST', 'https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh_role', $data_api, $header);
        return $grand_login;
    }

    public function car_type_generator($dat_wfh_id, $makes, $cates)
    {
        $sqlbuilder = $this->conn;

        $url_api = "https://www.raksa-service.com/raksa.general/api/general/LookupVehicleByMake";
        $data_api = array("Username" => 'ROL_SIMUL', "Password" => 'RoL_@@##!!', "BodyType" => "$dat_wfh_id");
        $data_api = json_encode($data_api);
        $header = array('Content-Type: application/json', 'cache-control:no-cache');
        $make = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        $url_api = "https://www.raksa-service.com/raksa.general/api/general/LookupVehicleByCategory";
        $data_api = array("Username" => 'ROL_SIMUL', "Password" => 'RoL_@@##!!', "Make" => "$makes", "BodyType" => "$dat_wfh_id");
        $data_api = json_encode($data_api);
        $header = array('Content-Type: application/json', 'cache-control:no-cache');
        $cate = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        $url_api = "https://www.raksa-service.com/raksa.general/api/general/LookupVehicleByModel";
        $data_api = array("Username" => 'ROL_SIMUL', "Password" => 'RoL_@@##!!', "Make" => "$makes", "Category" => "$cates", "BodyType" => "$dat_wfh_id");
        $data_api = json_encode($data_api);
        $header = array('Content-Type: application/json', 'cache-control:no-cache');
        $model = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        return [$make, $cate, $model];
    }

    public function lov_list()
    {
        $sqlbuilder = $this->conn;

        $mkg_group = $this->mkg_group;
        $data_api = array("input_group_head" => $mkg_group);
        $header = array('Content-Type: multipart/form-data');
        $data2 = $sqlbuilder->api('POST', 'https://www.raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/list_branch', $data_api, $header);

        $_api_joson = 'mks_work_to_b';        // production
        //$_api_joson   = 'mks_test_only';      // test

        $url_api = "https://www.raksa-service.com/" . $_api_joson . "/index.php/mks_api_person_name_mst/person_name_master_gh";
        $data_api = array("input_group_head" => $mkg_group);
        $header = array('Content-Type: multipart/form-data');
        $data3 = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        $url_api = "https://www.raksa-service.com/" . $_api_joson . "/index.php/mks_api_person_name_mst/person_name_master_gh_ao";
        $data_api = array("input_group_head" => $mkg_group);
        $header = array('Content-Type: multipart/form-data');
        $data4 = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        $url_api = "http://www.raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/list_agent_id_data";
        $data_api = array('input_agent_id' => '', 'key_id' => 'EI4YMSPyso1xRFCkOhvgqxH2IOoHgN');
        $header = array('Content-Type: multipart/form-data');
        $data5 = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        $url_api = "https://www.raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/general_table_data";
        $data_api = array("input_gt_code" => 'RGC');
        $header = array('Content-Type: multipart/form-data');
        $data6 = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        $url_api = "https://www.raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/list_province";
        $data_api = array("input_group_head" => $mkg_group);
        $header = array('Content-Type: multipart/form-data');
        $data7 = $sqlbuilder->api('POST', $url_api, $data_api, $header);

        return [$data2, $data3, $data4, $data5, $data6, $data7];
    }
}