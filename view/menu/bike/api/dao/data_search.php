<?php
function data_all($sqlbuilder, $mkg_group, $where_data_uwd, $_where_mkg, $where_data, $cari_tgl_awal, $cari_tgl_akhir, $user_id, $where_Count)
{
  $table_use = $_SESSION['table_use'];
  $table_use_det = $_SESSION['table_use_det'];
  $table_foto = $_SESSION['table_foto'];
  $table_survey = $_SESSION['table_survey'];
  $sqlawal = "
    SELECT
    m.rowid, m.oleh_buat, date_format(m.tgl_buat,'%d-%m-%Y') tgl_buat,m.tgl_buat tgl_buat_asli, m.corp_id,
    m.register_id, m.no_kontrak, m.quotation_no, u.tahun_cover, m.quotation_uwd_status,
    u.make, u.cate, u.model, u.unit_no, m.type_api,
      ( CASE WHEN m.type_api = 'E' THEN 'Express' ELSE 'Regular' END) as type_api_desc,
      ( select count(rowid) from $table_use_det where register_id =  m.register_id ) total_unit,
    m.customer_name, m.qq, u.wilayah_unit,
    u.status_penggunaan,
    date_format(m.tgl_awal,'%d-%m-%Y') tgl_awal, date_format(m.tgl_akhir,'%d-%m-%Y') tgl_akhir,
    tgl_awal tgl_awal_asli, tgl_akhir tgl_akhir_asli,
    m.tgl_conf_spp tgl_conf_spp_asli ,m.bukti_conf_sppa,
    date_format(m.uwd_tgl_send,'%d-%m-%Y %H:%i:%s') uwd_tgl_send,
    date_format(m.uwd_tgl_done,'%d-%m-%Y %H:%i:%s') uwd_tgl_done,
    date_format(u.jam_survey,'%Y-%m-%d')jam_survey,
    m.uwd_status,m.uwd_status_no,m.uwd_file_pdf,
    m.ex_polis_no,
    u.no_rangka, u.no_mesin,u.no_polisi,
    m.sob_code,u.sum_ins,u.warna,u.tahun_buat,
    u.rowid rowid_unit, u.body_type_ojk,u.survey_tsi_temp,
    m.bus_code,

    u.per_tgg_01,u.rate_01,u.loading_01,u.deduc_01,u.Depre_01,
    u.per_tgg_02,u.rate_02,u.loading_02,u.deduc_02,u.Depre_02,
    u.per_tgg_03,u.rate_03,u.loading_03,u.deduc_03,u.Depre_03,
    u.per_tgg_04,u.rate_04,u.loading_04,u.deduc_04,u.Depre_04,
    u.per_tgg_05,u.rate_05,u.loading_05,u.deduc_05,u.Depre_05,

    u.si_pass_01, u.qty_pass_01,
    u.bengkel_01,u.flood_01,u.eq_01,u.derek_01,

    u.rscc_01, u.rscc_02, u.rscc_03, u.rscc_04, u.rscc_05,
    u.teroris_01, u.teroris_02, u.teroris_03, u.teroris_04, u.teroris_05,

    u.disc_credit,u.disc_debit,
    u.add_equipment,m.admin_cost,m.wfh_group_wfh_id,
    m.wfh_id,u.tahun_cover,m.mobile_phone,
    m.reg_approval_web,m.reg_approval_web_02,m.reg_approval_web_03,m.reg_approval_web_04,
    m.short_rate_metode, m.short_rate_value, m.code_short_rate,
    m.customer_add,m.wording_no,
    u.tpl_01,u.tpl_02,u.tpl_03,u.tpl_04,u.tpl_05,
    m.agent_no_request,m.agent_code,m.agent_name,m.agent_sob_code,m.agent_sob_name,m.agent_upload_file,
    date_format(m.agent_upload_file_date,'%d-%m-%Y %H:%i:%s') agent_upload_file_date,
    m.nik,m.nik_pt_person,m.email,
    m.nik_qq,m.qq_pt_person,
    m.nik_qq2,m.qq2_pt_person,
    m.ren_option,m.ren_insured_id,m.ren_insured_id_loc,
    m.kabupaten,
    u.survey_no, u.survey_report,u.status_mobil,u.subject_non_claim,
    u.ex_polis_unit_no,
    m.mkg_group,
    m.membership, m.membership_remark,
    m.mkg_member,m.mkg_officer,

    u.tax,m.ren_sob_code, m.source_api,u.value_ph21,u.value_tax23,

    ( SELECT IFNULL(Harga_mobil,0) Harga_mobil
      FROM polis_agent_direct_foto
      WHERE     register_id  = m.register_id
            and unit_no      = u.unit_no
            and status       = 'USE'
            and type_foto    = 'H_PASAR'
      order by urut
      limit 1
    )Harga_mobil,
    ( SELECT count(type_foto)Count_Harga_mobil
      FROM polis_agent_direct_foto
      WHERE     register_id  = m.register_id
            and unit_no      = u.unit_no
            and status       = 'USE'
            and type_foto    = 'H_PASAR'
    )Count_Harga_mobil,
    ( SELECT  url_foto
        FROM polis_agent_direct_foto
        WHERE     register_id  = m.register_id
              and unit_no      = u.unit_no
              and status       = 'USE'
              and type_foto    = 'URL'
        order by urut
        limit 1
    )url_foto,
    ( SELECT count(type_foto)Count_URL
      FROM polis_agent_direct_foto
      WHERE     register_id  = m.register_id
            and unit_no      = u.unit_no
            and status       = 'USE'
            and type_foto    = 'URL'
    )Count_URL,
    ( SELECT count(type_foto)
         FROM polis_agent_direct_foto
         WHERE     register_id  = m.register_id
               and unit_no      = u.unit_no
               and status       = 'USE'
               and type_foto    = 'BAST'
    )BAST_COUNT

from $table_use m,
    $table_use_det u
where     u.upload_status is null
     and m.register_id = u.register_id
     and m.mkg_group   = '$mkg_group'
     $where_data_uwd
     $_where_mkg
     and date_format(m.tgl_buat,'%Y-%m-%d')
              between DATE(STR_TO_DATE('$cari_tgl_awal', '%d-%m-%Y')) and DATE(STR_TO_DATE('$cari_tgl_akhir', '%d-%m-%Y'))
     $where_data
order by m.tgl_buat DESC,
        u.unit_no  
    ";
  $data = $sqlbuilder->select('BIKE', $sqlawal);
  if ($data['status'] == 400) {
    return $data;
  }

  if ($data['data'] != []) {
    foreach ($data['data'] as $key => $d) {
      $total_unit = $d['total_unit'];
      if ($total_unit < 2) {
        $ins_grade = " SELECT rowid,  no_register,unit,
          vehicle_make,vehicle_score,vehicle_bobot,
          bodytype,bodytype_score,bodytype_bobot,
          coverage,coverage_score,coverage_bobot,
          vehicle_age,
          vehicle_age_score,
          vehicle_age_bobot,
          corp_id,
          corp_id_score,
          corp_id_bobot,
          tsi,
          tsi_score,
          tsi_bobot,
          total_score,
          grade
          FROM polis_agent_direct_grade
          WHERE no_register = '$d[register_id]' 
          AND unit  = '$d[unit_no]'";
        $hasil_ins_grade = $sqlbuilder->select('BIKE', $ins_grade);
        if ($hasil_ins_grade['status'] == 400) {
          return $hasil_ins_grade;
        }
        if ($hasil_ins_grade['data'] != []) {
          $data_grade = $hasil_ins_grade['data'][0];

          $data['data'][$key]['VEHICLE_MAKE'] = $data_grade['vehicle_make'];
          $data['data'][$key]['VEHICLE_SCORE'] = $data_grade['vehicle_score'];
          $data['data'][$key]['VEHICLE_BOBOT'] = $data_grade['vehicle_bobot'];

          $data['data'][$key]['BODYTYPE'] = $data_grade['bodytype'];
          $data['data'][$key]['BODYTYPE_SCORE'] = $data_grade['bodytype_score'];
          $data['data'][$key]['BODYTYPE_BOBOT'] = $data_grade['bodytype_bobot'];

          $data['data'][$key]['COVERAGE'] = $data_grade['coverage'];
          $data['data'][$key]['COVERAGE_SCORE'] = $data_grade['coverage_score'];
          $data['data'][$key]['COVERAGE_BOBOT'] = $data_grade['vehicle_age'];

          $data['data'][$key]['VEHICLE_AGE'] = $data_grade['vehicle_age_score'];
          $data['data'][$key]['VEHICLE_AGE_SCORE'] = $data_grade['vehicle_age_score'];
          $data['data'][$key]['VEHICLE_AGE_BOBOT'] = $data_grade['vehicle_age_bobot'];

          $data['data'][$key]['CORP_ID'] = $data_grade['corp_id'];
          $data['data'][$key]['CORP_ID_SCORE'] = $data_grade['corp_id_score'];
          $data['data'][$key]['CORP_ID_BOBOT'] = $data_grade['corp_id_bobot'];

          $data['data'][$key]['TSI'] = $data_grade['tsi'];
          $data['data'][$key]['TSI_SCORE'] = $data_grade['tsi_score'];
          $data['data'][$key]['TSI_BOBOT'] = $data_grade['tsi_bobot'];

          $data['data'][$key]['TOTAL_SCORE'] = $data_grade['total_score'];
          $data['data'][$key]['GRADE'] = $data_grade['grade'];

        } else {
          if (
            $d['make'] <> '' and $d['cate'] <> '' and $d['model'] <> '' and
            $d['sum_ins'] <> '' and $d['per_tgg_01'] <> '' and $d['tahun_buat'] <> '' and $d['mkg_group'] <> ''
          ) {
            $usia_mobil = substr(date("d-m-Y"), 6, 4) - $d['tahun_buat'];
            if ($d['per_tgg_01'] == 'ARK') {
              $covernya = 'ALL';
            } else {
              $covernya = 'TLO';
            }

            $data_api = array(
              "input_make" => $d['make'],   // honda
              "input_cate" => $d['cate'],   // crv
              "input_model" => $d['model'],  //
              "input_tsi" => $d['sum_ins'],
              "input_cover" => $covernya,  // ALL \\ TLO
              "input_usia" => $usia_mobil,
              "input_mkg_group" => $d['mkg_group'],
              "input_corp_id" => $d['corp_id'],
              "input_class" => 'AUTO',
              "key_id" => 'zfBk5uwr9nFJ2fBycFCJqHxmNyrQRe'
            );
            $url_api = "https://www.raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/select_uw_scoring";
            $header = array('Content-Type: multipart/form-data');
            $res_scoring = $sqlbuilder->api('POST', $url_api, $data_api, $header);

            $data['data'][$key]['VEHICLE_MAKE'] = $res_scoring['code'][0]['VEHICLE_MAKE'];
            $data['data'][$key]['VEHICLE_SCORE'] = $res_scoring['code'][0]['VEHICLE_SCORE'];
            $data['data'][$key]['VEHICLE_BOBOT'] = $res_scoring['code'][0]['VEHICLE_BOBOT'];

            $data['data'][$key]['BODYTYPE'] = $res_scoring['code'][0]['BODYTYPE'];
            $data['data'][$key]['BODYTYPE_SCORE'] = $res_scoring['code'][0]['BODYTYPE_SCORE'];
            $data['data'][$key]['BODYTYPE_BOBOT'] = $res_scoring['code'][0]['BODYTYPE_BOBOT'];

            $data['data'][$key]['COVERAGE'] = $res_scoring['code'][0]['COVERAGE'];
            $data['data'][$key]['COVERAGE_SCORE'] = $res_scoring['code'][0]['COVERAGE_SCORE'];
            $data['data'][$key]['COVERAGE_BOBOT'] = $res_scoring['code'][0]['COVERAGE_BOBOT'];

            $data['data'][$key]['VEHICLE_AGE'] = $res_scoring['code'][0]['VEHICLE_AGE'];
            $data['data'][$key]['VEHICLE_AGE_SCORE'] = $res_scoring['code'][0]['VEHICLE_AGE_SCORE'];
            $data['data'][$key]['VEHICLE_AGE_BOBOT'] = $res_scoring['code'][0]['VEHICLE_AGE_BOBOT'];

            $data['data'][$key]['CORP_ID'] = $res_scoring['code'][0]['CORP_ID'];
            $data['data'][$key]['CORP_ID_SCORE'] = $res_scoring['code'][0]['CORP_ID_SCORE'];
            $data['data'][$key]['CORP_ID_BOBOT'] = $res_scoring['code'][0]['CORP_ID_BOBOT'];

            $data['data'][$key]['TSI'] = $res_scoring['code'][0]['TSI'];
            $data['data'][$key]['TSI_SCORE'] = $res_scoring['code'][0]['TSI_SCORE'];
            $data['data'][$key]['TSI_BOBOT'] = $res_scoring['code'][0]['TSI_BOBOT'];

            $data['data'][$key]['TOTAL_SCORE'] = $res_scoring['code'][0]['TOTAL_SCORE'] / 100;
            $data['data'][$key]['GRADE'] = $res_scoring['code'][0]['GRADE'];



            $VEHICLE_MAKE = $res_scoring['code'][0]['VEHICLE_MAKE'];
            $VEHICLE_SCORE = $res_scoring['code'][0]['VEHICLE_SCORE'];
            $VEHICLE_BOBOT = $res_scoring['code'][0]['VEHICLE_BOBOT'];

            $BODYTYPE = $res_scoring['code'][0]['BODYTYPE'];
            $BODYTYPE_SCORE = $res_scoring['code'][0]['BODYTYPE_SCORE'];
            $BODYTYPE_BOBOT = $res_scoring['code'][0]['BODYTYPE_BOBOT'];

            $COVERAGE = $res_scoring['code'][0]['COVERAGE'];
            $COVERAGE_SCORE = $res_scoring['code'][0]['COVERAGE_SCORE'];
            $COVERAGE_BOBOT = $res_scoring['code'][0]['COVERAGE_BOBOT'];

            $VEHICLE_AGE = $res_scoring['code'][0]['VEHICLE_AGE'];
            $VEHICLE_AGE_SCORE = $res_scoring['code'][0]['VEHICLE_AGE_SCORE'];
            $VEHICLE_AGE_BOBOT = $res_scoring['code'][0]['VEHICLE_AGE_BOBOT'];

            $CORP_ID = $res_scoring['code'][0]['CORP_ID'];
            $CORP_ID_SCORE = $res_scoring['code'][0]['CORP_ID_SCORE'];
            $CORP_ID_BOBOT = $res_scoring['code'][0]['CORP_ID_BOBOT'];

            $TSI = $res_scoring['code'][0]['TSI'];
            $TSI_SCORE = $res_scoring['code'][0]['TSI_SCORE'];
            $TSI_BOBOT = $res_scoring['code'][0]['TSI_BOBOT'];

            $TOTAL_SCORE = $res_scoring['code'][0]['TOTAL_SCORE'] / 100;
            $GRADE = $res_scoring['code'][0]['GRADE'];
            $ins_grade = "INSERT INTO polis_agent_direct_grade
                  (
                      no_register,
                      unit,
                      vehicle_make,
                      vehicle_score,
                      vehicle_bobot,
                      bodytype,
                      bodytype_score,
                      bodytype_bobot,
                      coverage,
                      coverage_score,
                      coverage_bobot,
                      vehicle_age,
                      vehicle_age_score,
                      vehicle_age_bobot,
                      corp_id,
                      corp_id_score,
                      corp_id_bobot,
                      tsi,
                      tsi_score,
                      tsi_bobot,
                      total_score,
                      grade,
                      Entry_date,
                      user_id,
                      sumber
                  )
                  VALUES
                  (
                      '$d[register_id]',
                      '$d[unit_no]',
                      '$VEHICLE_MAKE',
                      '$VEHICLE_SCORE',
                      '$VEHICLE_BOBOT',
                      '$BODYTYPE',
                      '$BODYTYPE_SCORE',
                      '$BODYTYPE_BOBOT',
                      '$COVERAGE',
                      '$COVERAGE_SCORE',
                      '$COVERAGE_BOBOT',
                      '$VEHICLE_AGE',
                      '$VEHICLE_AGE_SCORE',
                      '$VEHICLE_AGE_BOBOT',
                      '$CORP_ID',
                      '$CORP_ID_SCORE',
                      '$CORP_ID_BOBOT',
                      '$TSI',
                      '$TSI_SCORE',
                      '$TSI_BOBOT',
                      '$TOTAL_SCORE',
                      '$GRADE',
                      now(),
                      '$user_id',
                      'LIST'
                   )";
            $hsl_grade = $sqlbuilder->executeNoCommit('BIKE', $ins_grade);
            if ($hsl_grade['status'] == 400) {
              return $hsl_grade;
            }
          }
        }
      }

    }
  }

  $url_api = "https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/person_name_master_gh";
  $data_api = array("input_group_head" => $mkg_group);
  $header = array('Content-Type: multipart/form-data');
  $person_name = $sqlbuilder->api('POST', $url_api, $data_api, $header);

  $hasil_akhir['data_search'] = $data['data'];
  $valuess = [];
  foreach ($person_name['code'] as $mks_data) {
    $value = $mks_data['PERSON_SHORT_NAME'];
    $value_desc = $mks_data['PERSON_FULL_NAME'];

    $sql_mkgnya = "SELECT  COUNT( m.mkg_member) count_mkg_group
                      FROM polis_agent_direct m, polis_agent_direct_unit u
                      WHERE     m.mkg_group       = '$mkg_group'
                            and m.mkg_member      = '$value'
                            $where_Count
                            and m.register_id     =  u.register_id
                            -- and u.upload_api_code <> ''
                            and u.upload_status is null
                            AND date_format(m.tgl_buat,'%Y-%m-%d') between
                                     DATE(STR_TO_DATE('$cari_tgl_awal', '%d-%m-%Y'))
                                 and DATE(STR_TO_DATE('$cari_tgl_akhir', '%d-%m-%Y'))  ";

    $C_mkg = $sqlbuilder->select('BIKE', $sql_mkgnya);
    if ($C_mkg['status'] == 400) {
      return $C_mkg;
    }
    $all['value'] = $value;
    $all['value_desc'] = $value_desc;
    $all['count_mkg_group'] = $C_mkg['data'][0]['count_mkg_group'];
    array_push($valuess, $all);
  }
  $hasil_akhir['mkg_member'] = $valuess;

  $sqlbuilder->commit('BIKE');
  $result = [
    "status" => 200,
    "message" => "ambil data berhasil",
    "data" => $hasil_akhir
  ];
  return $result;
}

?>