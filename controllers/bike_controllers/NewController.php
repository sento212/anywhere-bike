<?php
class NewController extends UserController
{
    public function executeWithTimeLimit($function, $arguments, $timeLimit)
    {
        $startTime = microtime(true);

        $wrappedFunction = function () use ($function, $arguments) {

            call_user_func_array($function, $arguments);
        };

        declare(ticks=1) {
            set_time_limit($timeLimit);

            $wrappedFunction();
        }


        $endTime = microtime(true);

        $executionTime = $endTime - $startTime;

        // echo "Function execution time: " . number_format($executionTime, 4) . " seconds\n";
    }

    public function setlov($data = [], $NewView, $model)
    {
        $isi = $model->lov_list();

        $list_branch              = $this->cheking_luar($isi[0]);
        $person_name_master_gh    = $this->cheking_luar($isi[1]);
        $person_name_master_gh_ao = $this->cheking_luar($isi[2]);
        $list_agent_id_data       = $this->cheking_luar2($isi[3]);
        $general_table_data       = $this->cheking_luar2($isi[4]);
        $list_province            = $this->cheking_luar($isi[5]);

        $NewView->list_branch              = $list_branch;
        $NewView->person_name_master_gh    = $person_name_master_gh;
        $NewView->person_name_master_gh_ao = $person_name_master_gh_ao;
        $NewView->list_agent_id_data       = $list_agent_id_data;
        $NewView->general_table_data       = $general_table_data;
        $NewView->list_province            = $list_province;


        $dat = $data['data'][0];
        if (strlen($dat['fetch_company']) >= 7)
        {
            $location_data = $model->location_data($dat['fetch_company']);
            $location_data = $this->cheking_luar2($location_data);
        }
        else {
            $location_data = [];
        }
        if (strlen($dat['fetch_qq']) >= 7)
        {
            $location_qq = $model->location_data($dat['fetch_qq']);
            $qq_location = $this->cheking_luar2($location_qq);
        }
        else
        {
            $qq_location = [];
        }

        if (strlen($dat['fetch_qq2']) >= 7)
        {
            $qq_location2 = $model->location_data($dat['fetch_qq2']);
            $qq_location2 = $this->cheking_luar2($qq_location2);
        }
        else
        {
            $qq_location2 = [];
        }
        if (strlen($dat['ren_insured_id']) >= 7)
        {
            $insurend = $model->location_data($dat['ren_insured_id']);
            $insurend = $this->cheking_luar2($insurend);
        }
        else
        {
            $insurend = [];
        }

        $NewView->location_data = $location_data;
        $NewView->qq_location   = $qq_location;
        $NewView->qq_location2  = $qq_location2;
        $NewView->insurend      = $insurend;
        $dat_wfh_id = '';

        if ($dat["wfh_id"] == "0010" or $dat["wfh_id"] == "0011" or $dat["wfh_id"] == "0012" or $dat["wfh_id"] == "0017" or $dat["wfh_id"] == "0036") {
            $dat_wfh_id = "";
        }
        if ($dat["wfh_id"] == "9999" or $dat["wfh_id"] == "8888") {
            $dat_wfh_id = "MOTOR";
        }

        $kendaraan = $model->car_type_generator($dat_wfh_id, $dat['make'], $dat['cate']);
        $make      = $kendaraan[0];
        $cate      = $kendaraan[1];
        $modeler   = $kendaraan[2];
        // $make = $this->cheking_luar($make);
        // $cate = $this->cheking_luar($cate);
        // $modeler = $this->cheking_luar($modeler);
        $NewView->make = $make;
        $NewView->cate = $cate;
        $NewView->modeler = $modeler;
    }

    public function __construct($user_id, $mkg_group, $pilihan, $menu, $full_dept, $butt_off_view, $hasilModel, $hasilAction, $model, $_no_regis, $_unit_no)
    {
        $NewView = new NewView();
        $NewView->setcoreval($user_id, $mkg_group, $pilihan, $menu, $full_dept, $butt_off_view);
        $result_Simul_to_pol_quo = '';

        if (isset($_POST["copy_simul_pol_quo"]))
        {
            $result_Simul_to_pol_quo = $_POST['pilih_Simul_KE_P_Q'];  // --> P or Q next targetnya
            $next_target             = $result_Simul_to_pol_quo;
            $id_insert               = '_insert_copy_';
            $from_copy_one_AnyWhere  = 'YES';
            // include 'idx_agen_direct_insert_copy_quo.php';
            // $_no_regis = $_POST[register_id];
            // $_unit_no = $_POST[unit_no];
        }
        //  print_r($_POST);

        //  if($hasilModel){
        //     $_no_regis = $hasilModel[0];
        //     $_unit_no = $hasilModel[1];
        //  }else{
        //     $_no_regis = $_POST[no_regis];
        //     $_unit_no = $_POST[unit_no];
        //  }

        if (isset($hasilAction['status']))
        {
            if ($hasilAction['status'] == 200 && $_POST['menu_key'] == 'dewarajajudidewarajajudi')
            {
                $NewView->pesan_pop_up('Update Data Berhasil', 'update data berhasil', 'success');
            }
            elseif ($hasilAction['status'] == 400 && $_POST['menu_key'] == 'dewarajajudidewarajajudi')
            {
                $pesan = str_replace("'", "", $hasilAction['message']);
                $NewView->pesan_pop_up('Update Data gagal', "$pesan", 'error');
            }
        }

        $datamodel  = $model->data_model($_no_regis, $_unit_no);
        $data_model = $this->cheking($datamodel);

        $foto_unit = $model->foto_unit($_no_regis, $_unit_no);
        $foto_unit = $this->cheking($foto_unit);
        $NewView->foto_unit = $foto_unit;

        $count_unit = $model->count_unit($_no_regis);
        $count = $this->cheking($count_unit);

        $data1 = $data_model;
        $count_unit = $count;
        // $this->executeWithTimeLimit('setlov', [$data1, $NewView, $model], 1);
        $this->setlov($data1, $NewView, $model);
        $NewView->data = $data1;

        if ($data1['data'][0]['uwd_status'] == 'HOLD')
        {
            $NewView->sethold();
        }

        $NewView->header($menu);
        $NewView->main($pilihan);
        $NewView->general();
        $NewView->source();
        $NewView->Doc();
        $NewView->List_in();
        $NewView->qq_name();
        $NewView->renewal($result_Simul_to_pol_quo);
        $NewView->policy($count_unit);
        $NewView->other($result_Simul_to_pol_quo);
        $NewView->footer();
    }
}
