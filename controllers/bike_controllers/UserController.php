<?php
// controller/UserController.php
require_once (__DIR__ . '/CloudController.php');
require_once (__DIR__ . '/NewController.php');
require_once (__DIR__ . '/DataController.php');

class UserController
{
    private $model, $user_id, $mkg_group, $pilih, $full_dept, $menu, $conn, $butt_off_view, $no_regis, $unit_no;
    private $view;

    public function __construct($user_id, $mkg_group, $pilihan, $menu, $full_dept, $butt_off_view)
    {
        $this->model = new UserModel($user_id, $mkg_group, $pilihan, $menu, $full_dept);
        $this->view = new UserView();
        $this->pilih = $pilihan;
        $this->user_id = $user_id;
        $this->mkg_group = $mkg_group;
        $this->full_dept = $full_dept;
        $this->butt_off_view = $butt_off_view;
        $this->menu = $menu;
    }

    public function cheking($data)
    {
        $view = $this->view;
        if ($data['status'] == 400) {
            $view->pesan_pop_up('Gagal Akses Data', 'Terdapat masalah dengan server', 'error');
        }
        else {
            return $data;
        }
    }

    public function cheking_luar($data)
    {
        $view = $this->view;
        if (strval($data['status']) == '0') {
            $view->pesan_pop_up('Gagal Akses Data Aegis', 'Terdapat masalah dengan server', 'error');
        }
        else {
            return $data;
        }
    }
    public function cheking_luar2($data)
    {
        $view = $this->view;
        if (strval($data['messagecode']) != '0') {
            $view->pesan_pop_up('Gagal Akses Data Aegis', 'Terdapat masalah dengan server', 'error');
        }
        elseif (strval($data['messagecode']) != '00') {
            $view->pesan_pop_up('Gagal Akses Data Aegis', 'Terdapat masalah dengan server', 'error');
        }
        else {
            return $data;
        }
    }

    protected function Action()
    {
        $view = $this->view;
        $model = $this->model;
        if ($_SESSION['menu'] == 'NEW' && $_SESSION['menu_key'] == 'dewarajajudidewarajajudi') {
            // print_r($_POST);
            $datahasil = $model->save_main_data();
            if($datahasil['status'] == 200){
                $this->no_regis = $datahasil['data'][0];
                $this->unit_no = $datahasil['data'][1];
                $_SESSION['BIKE_no_regis'] = $this->no_regis;
                $_SESSION['BIKE_no_unit'] = $this->unit_no;
            }else{
                $view->pesan_pop_up('Save Data gagal', "$datahasil[message]", 'error');
                $_SESSION['BIKE_no_regis'] = '';
                $_SESSION['BIKE_no_unit'] = '';
                $this->no_regis = '';
                $this->unit_no = '';
            }
        }
        elseif ($_SESSION['menu'] == 'NEW' && $_SESSION['menu_key'] == 'dewaditinggalindewaditinggalin') {
            $reg_approval_web = $_POST['reg_approval_web'];
            $reg_approval_web_02 = $_POST['reg_approval_web_02'];
            $reg_approval_web_03 = $_POST['reg_approval_web_03'];
            $reg_approval_web_04 = $_POST['reg_approval_web_04'];
            if (($_POST['reg_approval_web_but'] ?? '') == 'clear_doc_app') {
                $reg_approval_web = '';
            }
            elseif (($_POST['reg_approval_web_but_02'] ?? '') == 'clear_doc_app') {
                $reg_approval_web_02 = '';
            }
            elseif (($_POST['reg_approval_web_but_03'] ?? '') == 'clear_doc_app') {
                $reg_approval_web_03 = '';
            }
            elseif (($_POST['reg_approval_web_but_04'] ?? '') == 'clear_doc_app') {
                $reg_approval_web_04 = '';
            }
            $no_regis = $_POST['no_regis'];
            $datahasil = $model->save_doc_appl($no_regis, $reg_approval_web, $reg_approval_web_02, $reg_approval_web_03, $reg_approval_web_04);
        }
        elseif ($_SESSION['menu'] == 'DATA' && $_SESSION['menu_key'] == 'tidakherutidurtidakherutidur') {
            print_r($_POST);
        }
        return $datahasil;
    }

    protected function Model()
    {
        $view = $this->view;
        $model = $this->model;
        $datahasil = [];
        if ($_SESSION['menu'] == 'NEW' && $_SESSION['menu_key'] == 'rgtrgtrgtrgtrgtrgrtg') {
            if(isset($_POST['Edit_no_regis_unit'])){
                $Edit_no_regis_unit = $_POST['Edit_no_regis_unit'];
                $Edit_no_regis_unit = explode("#", $Edit_no_regis_unit);
                $_no_regis = $Edit_no_regis_unit[0];
                $_unit_no = $Edit_no_regis_unit[1];

                $datahasil = [$_no_regis, $_unit_no];
                $this->no_regis = $datahasil[0];
                $this->unit_no = $datahasil[1];
                $_SESSION['BIKE_no_regis'] = $this->no_regis;
                $_SESSION['BIKE_no_unit'] = $this->unit_no;
            }
        }
        elseif ($_SESSION['menu'] == 'DATA' && $_SESSION['menu_key'] == 'rgtbongekrgtbongekrgtbongek') {
            if(isset($_POST['submit_uwd'])){
                $quotation_list = $this->model->request_uwd($_POST['list_regis'] ?? []);
                if($quotation_list['status'] == 400){
                    $view->pesan_pop_up('Update Status Gagal', $quotation_list['message'], 'error');
                }else{
                    $view->pesan_pop_up('Update Berhasil', 'Status Berhasil Diganti', 'success');
                }
            }
            $stat_uwd_stat = $_POST['stat_uwd_stat'] ?? '';
            $list_mkg_nya = $_POST['list_mkg_nya'] ?? '';
            $list_Q_P = $_POST['list_Q_P'] ?? '';
            $show_data_list = $_POST['show_data_list'] ?? $_POST['submit_uwd'] ?? '';
            $cari_tgl_awal = $_POST['cari_tgl_awal'] ?? '';
            $cari_tgl_khir = $_POST['cari_tgl_khir'] ?? '';
            $quotation_list = $this->model->list_data_model($stat_uwd_stat, $list_mkg_nya, $list_Q_P, $show_data_list, $cari_tgl_awal, $cari_tgl_khir);
            $datahasil = $this->cheking($quotation_list);
        }
        elseif ($_SESSION['menu'] == 'NEW' && $_SESSION['menu_key'] == 'rianbabirianbabirianbabi') {
            if ($_POST['add_unit'] ?? '' == 'add_unit') {
                $register_id = $_POST['register_id'];
                $next_unit = $_POST['latersunit'];
                $this->no_regis = $register_id;
                $this->unit_no = $next_unit;
                $_SESSION['BIKE_no_regis'] = $this->no_regis;
                $_SESSION['BIKE_no_unit'] = $this->unit_no;
            }
            elseif ($_POST['prev_unit'] ?? '' == 'prev_unit') {
                $register_id = $_POST['register_id'];
                $unit_no = $_POST['unit_no'];
                $prev_unit = str_pad($unit_no - 1, 3, "0", STR_PAD_LEFT);
                $this->no_regis = $register_id;
                $this->unit_no = $prev_unit;
                $_SESSION['BIKE_no_regis'] = $this->no_regis;
                $_SESSION['BIKE_no_unit'] = $this->unit_no;
            }
            elseif ($_POST['next_unit'] ?? '' == 'next_unit') {
                $register_id = $_POST['register_id'];
                $unit_no = $_POST['unit_no'];
                $push_unit = str_pad($unit_no + 1, 3, "0", STR_PAD_LEFT);
                $this->no_regis = $register_id;
                $this->unit_no = $push_unit;
                $_SESSION['BIKE_no_regis'] = $this->no_regis;
                $_SESSION['BIKE_no_unit'] = $this->unit_no;
            }
            elseif ($_POST['del_unit'] ?? '' == 'del_unit') {
                $register_id = $_POST['register_id'];
                $unit_no = $_POST['unit_no'];
                $datahasil = $model->hapus_unit($register_id, $unit_no);
                $datahasil = $this->cheking($datahasil);
                if ($datahasil['status'] == 200) {
                    $this->no_regis = $datahasil['data'][0];
                    $this->unit_no = $datahasil['data'][1];
                    $_SESSION['BIKE_no_regis'] = $this->no_regis;
                    $_SESSION['BIKE_no_unit'] = $this->unit_no;
                    $view->pesan_pop_up('Delete Berhasil', 'Delete unit berhasil', 'success');
                }
                else {
                    $view->pesan_pop_up('Delete Data gagal', "$datahasil[message]", 'error');
                }

            }
        }
        elseif ($_SESSION['menu_key'] == 'rianasurianasurianasurianasu') {
            $hasil_button = $_POST['Perhit_simul_or_quotation'];
            $data = explode('##', $hasil_button);
            $regis = $data[0];
            $jml_unit = $data[1];
            $type = $data[2];
            $pdf_generate = $this->model->generate_pdf($regis, $jml_unit, $type);
            if ($pdf_generate['status'] == 400) {
                $view->pesan_pop_up_close('Import File gagal', "$pdf_generate[message]", 'error');
            }
            else {
                echo "<script>window.location.href = '$pdf_generate[link]';</script>";
            }
            exit();
        }
        return $datahasil;
    }

    public function showUser()
    {
        $pilihan               = $this->pilih;
        $user_id               = $this->user_id;
        $mkg_group             = $this->mkg_group;
        $full_dept             = $this->full_dept;
        $butt_off_view         = $this->butt_off_view;
        $menu_key              = $_POST['menu_key']  ?? $_SESSION['menu_key']  ?? '';
        $menu_type             = $_POST['menu_type'] ?? $_SESSION['menu_type'] ?? '';
        $_SESSION['menu_key']  = $menu_key;
        $_SESSION['menu_type'] = $menu_type;
        $hasilModel  = '';
        $hasilAction = [];
        if(isset($_POST['on_track']))
        {
            $this->no_regis = '';
            $this->unit_no  = '';
        }
        else
        {
            $this->no_regis = $_SESSION['BIKE_no_regis'] ?? '';
            $this->unit_no  = $_SESSION['BIKE_no_unit']  ?? '';
        }
        // $_no_regis = 'P-01892-10-2022-M';
        // // P-00002-11-2020
        // // P-01892-10-2022-M
        // $_unit_no = '001';

        $this->view->setcoreval($user_id, $mkg_group, $pilihan, $this->menu, $full_dept, $butt_off_view);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' or isset($_SESSION['menu_key']))
        {
            if ($_SESSION['menu_type'] == 'MODEL')
            {
                $hasilModel = $this->Model();
            }
            elseif ($_SESSION['menu_type'] == 'ACTION')
            {
                $token = rand();
            }
            if (isset($_POST['token']))
            {
                if ($_POST['token'] == ($_SESSION['token'] ?? ''))
                {
                    $hasilAction = $this->Action();
                }
                $_SESSION['token'] = $token;
            }
        }
        switch ($this->menu)
        {
            case 'NEW':
                new NewController($user_id, $mkg_group, $pilihan, $this->menu, $full_dept, $butt_off_view, $hasilModel, $hasilAction, $this->model, $this->no_regis, $this->unit_no);
                break;

            case 'DATA':
                new DataController($user_id, $mkg_group, $pilihan, $this->menu, $full_dept, $butt_off_view, $hasilModel, $hasilAction);
                break;

            case 'CLOUD':
                new CloudController($user_id, $mkg_group, $pilihan, $this->menu, $full_dept, $butt_off_view, $hasilModel, $hasilAction);
                break;
        }
    }
}
?>
