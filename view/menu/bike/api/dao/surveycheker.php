<?php
function survey_all($sqlbuilder, $fceksurveyno, $SI_survey, $user_id, $mk_group, $no_regis, $unit_no, $fsurveyno)
{
  $table_use = $_SESSION['table_use'];
  $table_use_det = $_SESSION['table_use_det'];
  $table_foto = $_SESSION['table_foto'];
  $table_survey = $_SESSION['table_survey'];

  $_no_regis = $no_regis;
  $_unit_no = $unit_no;
  $_tsi_temp_survey = $SI_survey;

  $_cek_no_survey = strtoupper($fceksurveyno);
  $arr_param_in = array(
    "register_id" => $_no_regis,
    "unit_no" => $_unit_no,
    "TSI" => $_tsi_temp_survey
  );
  $cek_tsi_survey = cek_tsi_utk_survey($sqlbuilder, $arr_param_in);
  if ($cek_tsi_survey['status'] == 400) {
    return $cek_tsi_survey;
  }
  $cek_tsi_survey = $cek_tsi_survey['data'];

  $sql_del_survey = " DELETE from $table_survey where register_id ='$_no_regis' and unit_no = '$_unit_no' ";
  $del_hasil = $sqlbuilder->executeNoCommit('BIKE', $sql_del_survey);
  if ($del_hasil['status'] == 400) {
    $sqlbuilder->rollback('BIKE');
    return $del_hasil;
  }

  $sql_del_survey = " UPDATE $table_use_det
                        set jam_survey      = null,
                            survey_no       = null,
                            survey_report   = null,
                            survey_tsi_temp = null
                        where  register_id ='$_no_regis' and unit_no = '$_unit_no' ";
  $del_hasil = $sqlbuilder->executeNoCommit('BIKE', $sql_del_survey);
  if ($del_hasil['status'] == 400) {
    $sqlbuilder->rollback('BIKE');
    return $del_hasil;
  }

  if ($cek_tsi_survey == "TSI_TIDAK_ADA") {
    $sqlbuilder->commit('BIKE');
    $result = [
      "status" => 200,
      "message" => 'ambil data berhasil',
      "data" => "TSI WAJIB DIINPUT DAHULU SEBELUM MASUKAN NOMOR SURVEY"
    ];
  }
  $sqlbuilder->commit('BIKE');
  if (substr($_cek_no_survey, 0, 2) != 'RM')  // 01-00074-11-2020-0001
  {
    if ($SI_survey == null) {
      $_TSI_survey = 'null';
    }
    else {
      $_TSI_survey = str_replace(',', '', $SI_survey);
    }

    $_sur_corp = substr($_cek_no_survey, 0, 2);
    $_sur_sequ = substr($_cek_no_survey, 3, 5);
    $_sur_mth = substr($_cek_no_survey, 9, 2);
    $_sur_year = substr($_cek_no_survey, 12, 4);
    $_sur_unit = substr($_cek_no_survey, 17, 4);


    if ($cek_tsi_survey == "TSI_ADA") {
      // CALL API SURVEY   production 01-00065-08-2020-0001   test 01-00056-05-2016-0001
      // 01-00131-11-2020-0001  01-00074-11-2020-0001
      // ================================================================================ */




      $data_api = array(
        "input_corp_id" => $_sur_corp,
        "input_sequ" => $_sur_sequ,
        "input_month" => $_sur_mth,
        "input_year" => $_sur_year,
        "input_unit_no" => $_sur_unit
      );
      $url_api = "https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh_survey";
      $header = array('Content-Type: multipart/form-data');
      $data_unit = $sqlbuilder->api('POST', $url_api, $data_api, $header);
      $_svr_message = $data_unit['message'];

      // mabil semua data survey utk masuk ketable ( krn data sebelumnya udh di save, jadi bisa masuk table )
      if ($_svr_message == 'Successful') {

        if ($_cek_no_survey != '-') {
          $_cek_no_survey = substr($_cek_no_survey, 0, 16) . '-' . substr($_cek_no_survey, 17, 4);
        }

        //---------------> ADDITIONAL EQUIPMENT SURVEY
        {
          $data_api = array("input_no_survey" => $_cek_no_survey);
          $web_url = 'https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh_addtional_equipment';
          $header = array('Content-Type: multipart/form-data');
          $result_unit = $sqlbuilder->api('POST', $web_url, $data_api, $header);
          $Add_Equip = $result_unit;

          if ($Add_Equip['message'] == 'Success') {
            $Add_Equip_survey = '';
            $on_klausula_non_std = '';
            foreach ($Add_Equip['code'] as $mks_data) {
              if ($mks_data['STATUS'] == 'NON STANDARD') {
                $Add_Equip_survey = $Add_Equip_survey . '- ' . $mks_data['ADDTIONAL_EQUIPMENT'] . "\n";
                $on_klausula_non_std = 'Y';
              }
              if (($mks_data['STATUS'] == 'STANDARD') && ($mks_data['MEREK'] != '')) {
                $Add_Equip_survey = $Add_Equip_survey . '- ' . $mks_data['ADDTIONAL_EQUIPMENT'] . "\n";
              }
            }
          }

        }

        //---------------> REMARK SURVEY
        {
          $data_api = array("input_no_survey" => $_cek_no_survey);
          $url_api = "https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/wfh_remarks";
          $header = array('Content-Type: multipart/form-data');
          $result_unit = $sqlbuilder->api('POST', $url_api, $data_api, $header);
          $remark_survey = $result_unit;
          // echo "<br>wfh_remarks<br> "; printf($result_unit);


          $nomer_urut = 0;

          if ($remark_survey['message'] == 'Success') {

            foreach ($remark_survey['code'] as $mks_data) {
              $status_yg_ignore = array(
                "BARETHALUS,BISADICOMPOUND",
                "LECETHALUS,BISADICOMPOUND",
                "CATMENEMPEL,BISADICOMPOUND"
              );

              if ($_TSI_survey < 100000000)  // seratus juta
              {
                $TSI_survey_temp = "$_TSI_survey##0##100000000";
                if (in_array(str_replace(" ", "", $mks_data['STATUS']), $status_yg_ignore)) {
                  $tagihan_survey = 'Ignore';
                }
                else {
                  $tagihan_survey = 'Exclude';
                }
              }


              if ($_TSI_survey > 800000000)  // delapan ratu juta
              {
                $TSI_survey_temp = "$_TSI_survey##800000000##999999999999";
                if (in_array(str_replace(" ", "", $mks_data['STATUS']), $status_yg_ignore)) {
                  $tagihan_survey = 'Ignore';
                }
                else {
                  $tagihan_survey = 'Exclude';
                }
              }


              if (($_TSI_survey >= 100000000) and ($_TSI_survey <= 800000000))  // 100 juta sd 800 juta
              {
                $TSI_survey_temp = "$_TSI_survey##99999999##800000001";
                $panel_yg_double_or = array(
                  "BEMPERBAGIANBELAKANG",
                  "BEMPERBAGIANDEPAN",
                  "SPAKBOARDKIRIBAGIANBELAKANG",
                  "SPAKBOARDKANANBAGIANBELAKANG",
                  "SPAKBOARDKIRIBAGIANDEPAN",
                  "SPAKBOARDKANANBAGIANDEPAN",
                  "COVERSPIONKIRIBAGIANDEPAN",
                  "COVERSPIONKANANBAGIANDEPAN",
                  "TRISPLANKKANANBAGIANBELAKANG",
                  "TRISPLANKKIRIBAGIANBELAKANG",
                  "PINTUKIRIBAGIANDEPAN",
                  "PINTUKANANBAGIANDEPAN",
                  "PINTUKIRIBAGIANBELAKANG",
                  "PINTUKANANBAGIANBELAKANG",
                  "KAPBAGASIBAGIANBELAKANG",
                  "KAPMESINBAGIANDEPAN"
                );
                if (in_array(str_replace(" ", "", $mks_data['PANEL_UNIT']), $panel_yg_double_or)) {
                  $status_yg_double_or = array(
                    "BARET,TIDAKBISADICOMPOUND",
                    "LECET,TIDAKBISADICOMPOUND"
                  );

                  if (in_array(str_replace(" ", "", $mks_data['STATUS']), $status_yg_double_or)) {
                    $tagihan_survey = 'Double OR';
                  }
                  else {
                    $tagihan_survey = 'Exclude';
                  }

                }
                else {
                  $tagihan_survey = 'Exclude';
                }

                // kondisi pasti wajib
                if (in_array(str_replace(" ", "", $mks_data['STATUS']), $status_yg_ignore)) {
                  $tagihan_survey = 'Ignore';
                }

              } // END untuk penentuan panel 100 - 800 juta



              if (($_TSI_survey == 'null') or ($_TSI_survey == '') or ($_TSI_survey === NULL)) {
                $tagihan_survey = 'Exclude';
              }

              // SANDRA 19-08-2021
              // no test survey 01-00040-08-2021-0001
              // minta untuk banjir tidak di cover
              if (str_replace(" ", "", $mks_data['PANEL']) != "KONDISIPENUTUPANBANJIR") {
                $nomer_urut++;
                $sql_insert_survey =
                  "INSERT INTO $table_survey
                                        ( register_id, unit_no, unit_hasil_survey,
                                          tgl_buat,oleh,
                                          survey_no,

                                          panel_name,
                                          Std_panel,

                                          panel_kondisi,
                                          panel_roles,
                                          panel_roles_asli,

                                          status_panel_asli
                                        )
                                    value
                                        ( '$_no_regis', '$_unit_no', $nomer_urut,
                                          now(),'$user_id',
                                          '$_cek_no_survey',

                                          '$mks_data[PANEL_UNIT]',
                                          '$mks_data[STD_NST]',

                                          '$mks_data[KONDISI]',
                                          '$tagihan_survey',
                                          '$tagihan_survey',

                                          '$mks_data[STATUS]'
                                        ) ";
                $hasil_insert_survey = $sqlbuilder->executeNoCommit('BIKE', $sql_insert_survey);
                if ($hasil_insert_survey['status'] == 400) {
                  $sqlbuilder->rollback('BIKE');
                  return $hasil_insert_survey;
                }

                // non $dat['non_standart' cek ???? jika ????
              }
              // END IF yang bukan banjir
            }

            // save bayangan TSI, siapa tahu diganti sama MKGnya
            $TSI_temp = "UPDATE $table_use_det
                                        set survey_tsi_temp  = '$TSI_survey_temp'
                                        where  register_id = '$_no_regis' and unit_no = '$_unit_no' ";
            $TSI_temp_hasil = $sqlbuilder->executeNoCommit('BIKE', $TSI_temp);
            if ($TSI_temp_hasil['status'] == 400) {
              $sqlbuilder->rollback('BIKE');
              return $TSI_temp_hasil;
            }

          }

        }

      }
      // end yg sukses
    }
    // end TSI ADA
    $sqlbuilder->commit('BIKE');
  }



  if (substr($_cek_no_survey, 0, 2) != 'RM') {
    if ($cek_tsi_survey == "TSI_ADA") {
      if ($_svr_message == 'Successful') {
        $dat['survey_no'] = $_cek_no_survey;
        $dat['make'] = $data_unit['code'][0]['VEHICLE_MAKE'];
        $dat['cate'] = $data_unit['code'][0]['VEHICLE_CATEGORY'];
        $dat['model'] = $data_unit['code'][0]['VEHICLE_MODEL'];
        $dat['warna'] = $data_unit['code'][0]['VEHICLE_COLOR'];
        $dat['tahun_buat'] = $data_unit['code'][0]['VEHICLE_YEAR'];
        $dat['no_rangka'] = $data_unit['code'][0]['VEHICLE_CHASIS_NO'];
        $dat['no_mesin'] = $data_unit['code'][0]['VEHICLE_ENGINE_NO'];
        $dat['no_polisi'] = $data_unit['code'][0]['VEHICLE_LICENSE_NO'];
        $jam_survey = $data_unit['code'][0]['SURVEY_DATE'];
        // $dat[tahun_cover]   = $data_unit->code[0]->TYPE_OF_COVER;

        /* sah by meeting MKS EDY RINI SANDRA at 17-11-2020
        $dat[customer_name]  = $data_unit->pic[0]->INSURED_NAME;
        $dat[customer_add]   = $data_unit->pic[0]->INSURED_ADDRESS;
        $dat[mobile_phone]   = $data_unit->pic[0]->INSURED_PHONE1;
        */
        $sum_ins = number_format($_TSI_survey);
        $dat['sum_ins'] = $sum_ins;
        $dat['add_equipment'] = $Add_Equip_survey;
        $dat['non_standart'] = $on_klausula_non_std;
        $dat['jam_survey'] = $jam_survey;
        $dat['survey_report'] = 'https://raksa-service.com/RESOURCE/IMAGES/SURVEY/' .
          $_sur_corp . $_sur_year . $_sur_mth . '-' . $_sur_sequ . '-' . $_sur_unit .
          '/SURVEY_REPORT.pdf';
        $sql_surv = " SELECT
                                register_id,
                            unit_no,
                                unit_hasil_survey,
                                survey_no,
                                panel_name,
                            Std_panel,
                                panel_kondisi,
                                panel_roles,
                            panel_roles_sa
                            from $table_survey
                            where     register_id = '$no_regis'
                                and unit_no     = '$unit_no'
                            order by unit_hasil_survey ";
        $hasil_surv = $sqlbuilder->select('BIKE', $sql_surv);
        if ($hasil_surv['status'] == 400) {
          return $hasil_surv;
        }
        $dat['hasil_surv'] = $hasil_surv['data'];
        $result = [
          "status" => 200,
          "message" => 'ambil data berhasil',
          "data" => $dat
        ];
      }

      if ($_svr_message == 'ERR0R') {
        $result = [
          "status" => 200,
          "message" => 'ambil data berhasil',
          "data" => "No survey salah / tidak di temukan"
        ];
      }
    }
  } // end if survey
  return $result;
  // if (  $_POST["cek_survey"]  &&  substr($_cek_no_survey,0,2) == 'RM' ) // RM-00074-11-2020-0001
  // {
  //   if($cek_tsi_survey=="TSI_ADA")
  //   {
  //     echo " NEW SYSTEM ( lage dibuat )";
  //   }
  // }
}

function convert_string_to_int($string_with_commas) {
  // Remove commas from the string
  $string_without_commas = str_replace(",", "", $string_with_commas);

  // Convert the string to an integer
  $integer_value = intval($string_without_commas);

  return $integer_value;
}

function cek_tsi_utk_survey($sqlbuilder, $param_input)
{
  $table_use = $_SESSION['table_use'];
  $table_use_det = $_SESSION['table_use_det'];
  $table_foto = $_SESSION['table_foto'];
  $table_survey = $_SESSION['table_survey'];

  $register_id = $param_input['register_id'];
  $unit_no = $param_input['unit_no'];
  $TSI = $param_input['TSI'];
  $TSI = convert_string_to_int($TSI);

  $q_pad = " SELECT a.sum_ins
              FROM
                entry_polis.$table_use_det a
              WHERE
                    a.register_id = '$register_id'
                AND a.unit_no     = '$unit_no'
            ";
  $run_q_pad = $sqlbuilder->select('BIKE', $q_pad);
  if ($run_q_pad['status'] == 400) {
    $sqlbuilder->rollback('BIKE');
    return $run_q_pad;
  }
  $result_q_pad = $run_q_pad['data'][0];

  if ($result_q_pad['sum_ins'] == "" || $result_q_pad['sum_ins'] == null) {
    if ($TSI > 0) {
      $up_TSI_survey = " UPDATE $table_use_det
                            set sum_ins  = $TSI
                            where  register_id ='$register_id' and unit_no = '$unit_no' ";
      $up_TSI_final = $sqlbuilder->executeNoCommit('BIKE', $up_TSI_survey);
      if ($up_TSI_final['status'] == 400) {
        $sqlbuilder->rollback('BIKE');
        return $up_TSI_final;
      }
      $result = [
        "status" => 200,
        "message" => 'ambil data berhasil',
        "data" => "TSI_ADA"
      ];
      return $result;
    }
    else {
      $result = [
        "status" => 200,
        "message" => 'ambil data berhasil',
        "data" => "TSI_TIDAK_ADA"
      ];
      return $result;
    }


  }
  else {
    $result = [
      "status" => 200,
      "message" => 'ambil data berhasil',
      "data" => "TSI_ADA"
    ];
    return $result;
  }
}
