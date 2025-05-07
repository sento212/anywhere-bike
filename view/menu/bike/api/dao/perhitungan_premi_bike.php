<?php

function perhitungan_premi($sqlbuilder, $register_id)
{

  $table_use = $_SESSION['table_use'];
  $table_use_det = $_SESSION['table_use_det'];
  $table_foto = $_SESSION['table_foto'];
  $table_survey = $_SESSION['table_survey'];

  $q = " SELECT
                  a.ex_polis_no, a.mkg_group, a.mkg_officer,
                  a.wfh_id, a.customer_name, a.customer_add, a.qq, a.qq2,
                  UPPER(a.short_rate_metode)  AS short_rate_metode,
                  a.short_rate_value,
                  a.tgl_awal, a.tgl_akhir, a.tgl_buat,
                  a.admin_cost,
                  b.wilayah_unit AS wilayah,
                  b.status_penggunaan,
  
                  b.Policy_No,b.unit_no, b.no_rangka,b.no_mesin,b.no_polisi,
                  b.make, b.cate, b.model,
                  b.body_type_ojk, b.warna, b.status_mobil, b.tahun_buat,
                  b.status_penggunaan, b.tahun_buat, b.sum_ins,
  
                  b.per_tgg_01, b.rate_01, b.loading_01,
                  b.rscc_01, b.teroris_01, b.flood_01,
                  b.eq_01, b.bengkel_01, b.si_driver_01,
                  b.derek_01, b.komersil_01, b.si_pass_01,
                  b.qty_pass_01, b.tpl_01, b.deduc_01, b.depre_01, b.stnk_01,
  
                  b.per_tgg_02, b.rate_02, b.loading_02,
                  b.rscc_02, b.teroris_02, b.flood_02,
                  b.eq_02, b.bengkel_02, b.si_driver_02,
                  b.derek_02, b.komersil_02, b.si_pass_02,
                  b.qty_pass_02, b.tpl_02, b.deduc_02, b.depre_02, b.stnk_02,
  
                  b.per_tgg_03, b.rate_03, b.loading_03,
                  b.rscc_03, b.teroris_03, b.flood_03,
                  b.eq_03, b.bengkel_03, b.si_driver_03,
                  b.derek_03, b.komersil_03, b.si_pass_03,
                  b.qty_pass_03, b.tpl_03, b.deduc_03, b.depre_03, b.stnk_03,
  
                  b.per_tgg_04, b.rate_04, b.loading_04,
                  b.rscc_04, b.teroris_04, b.flood_04,
                  b.eq_04, b.bengkel_04, b.si_driver_04,
                  b.derek_04, b.komersil_04, b.si_pass_04,
                  b.qty_pass_04, b.tpl_04, b.deduc_04, b.depre_04, b.stnk_04,
  
                  b.per_tgg_05, b.rate_05, b.loading_05,
                  b.rscc_05, b.teroris_05, b.flood_05,
                  b.eq_05, b.bengkel_05, b.si_driver_05,
                  b.derek_05, b.komersil_05, b.si_pass_05,
                  b.qty_pass_05, b.tpl_05, b.deduc_05, b.depre_05, b.stnk_05,
  
                  b.disc_debit, b.disc_credit,
                  b.tax, b.total_premi, b.total_auto_premi,
                  b.tahun_cover
                FROM
                    $table_use a,
                    $table_use_det b
                WHERE
                  a.register_id='$register_id'
                  AND a.register_id=b.register_id
              ";
  $hasil_q = $sqlbuilder->select('BIKE', $q);
  if ($hasil_q['status'] == 400) {
    $result = [
      "status" => 400,
      "message" => $hasil_q['message'],
      "data" => []
    ];
    return $result;
  } elseif ($hasil_q['data'] == []) {
    $result = [
      "status" => 400,
      "message" => 'Data Nomor Polis Tidak Ada',
      "data" => []
    ];
    return $result;
  }
  $unit_detail = $hasil_q['data'];

  $arr_premi = array();
  foreach ($unit_detail as $unit) {
    $tmp_arr = array();

    $tmp_arr['ex_polis'] = $unit['ex_polis_no'];
    $tmp_arr['mkg_group'] = $unit['mkg_group'];
    $tmp_arr['mkg_officer'] = $unit['mkg_officer'];
    $tmp_arr['no_polis'] = $unit['Policy_No'];
    $tmp_arr['unit_no'] = $unit['unit_no'];
    $tmp_arr['cust_name'] = $unit['customer_name'];
    $tmp_arr['cust_add'] = $unit['customer_add'];
    $tmp_arr['tgl_awal'] = $unit['tgl_awal'];
    $tmp_arr['tgl_akhir'] = $unit['tgl_akhir'];
    $tmp_arr['tgl_buat'] = $unit['tgl_buat'];
    $tmp_arr['make'] = $unit['make'];
    $tmp_arr['cate'] = $unit['cate'];
    $tmp_arr['model'] = $unit['model'];

    // $tmp_arr['qq1'] = $unit['qq1'];
    $tmp_arr['qq2'] = $unit['qq2'];


    $tmp_arr['warna'] = $unit['warna'];
    $tmp_arr['status_penggunaan'] = $unit['status_penggunaan'];
    $tmp_arr['tahun_buat'] = $unit['tahun_buat'];
    $tmp_arr['sum_ins'] = $unit['sum_ins'];

    $tmp_arr['disc_debt'] = $unit['disc_debit'];
    $tmp_arr['disc_cred'] = $unit['disc_credit'];



    $tmp_arr['no_rangka'] = $unit['no_rangka'];
    $tmp_arr['no_mesin'] = $unit['no_mesin'];
    $tmp_arr['no_polisi'] = $unit['no_polisi'];



    $tmp_arr['admin_cost'] = $unit['admin_cost'];
    $tmp_arr['deduct_01'] = $unit['deduc_01'];
    $tmp_arr['si_driver_01'] = $unit['si_driver_01'];
    $tmp_arr['tpl_01'] = $unit['tpl_01'];
    $tmp_arr['derek_01'] = $unit['derek_01'];
    $tmp_arr['stnk_01'] = $unit['stnk_01'];
    $tmp_arr['rate_01'] = $unit['rate_01'];
    $tmp_arr['per_tgg_01'] = $unit['per_tgg_01'];
    $tmp_arr['rscc_01'] = $unit['rscc_01'];
    $tmp_arr['teroris_01'] = $unit['teroris_01'];
    $tmp_arr['flood_01'] = $unit['flood_01'];
    $tmp_arr['eq_01'] = $unit['eq_01'];
    $tmp_arr['bengkel_01'] = $unit['bengkel_01'];
    $tmp_arr['komersil_01'] = $unit['komersil_01'];
    $tmp_arr['si_pass_01'] = $unit['si_pass_01'];
    $tmp_arr['qty_pass_01'] = $unit['qty_pass_01'];
    $tmp_arr['tpl_01'] = $unit['tpl_01'];


    $tmp_arr['si_driver_02'] = $unit['si_driver_02'];
    $tmp_arr['tpl_02'] = $unit['tpl_02'];
    $tmp_arr['derek_02'] = $unit['derek_02'];
    $tmp_arr['stnk_02'] = $unit['stnk_02'];
    $tmp_arr['rate_02'] = $unit['rate_02'];
    $tmp_arr['per_tgg_02'] = $unit['per_tgg_02'];
    $tmp_arr['rscc_02'] = $unit['rscc_02'];
    $tmp_arr['teroris_02'] = $unit['teroris_02'];
    $tmp_arr['flood_02'] = $unit['flood_02'];
    $tmp_arr['eq_02'] = $unit['eq_02'];
    $tmp_arr['bengkel_02'] = $unit['bengkel_02'];
    $tmp_arr['komersil_02'] = $unit['komersil_02'];
    $tmp_arr['si_pass_02'] = $unit['si_pass_02'];
    $tmp_arr['qty_pass_02'] = $unit['qty_pass_02'];
    $tmp_arr['tpl_02'] = $unit['tpl_02'];


    $tmp_arr['si_driver_03'] = $unit['si_driver_03'];
    $tmp_arr['tpl_03'] = $unit['tpl_03'];
    $tmp_arr['derek_03'] = $unit['derek_03'];
    $tmp_arr['stnk_03'] = $unit['stnk_03'];
    $tmp_arr['rate_03'] = $unit['rate_03'];
    $tmp_arr['per_tgg_03'] = $unit['per_tgg_03'];
    $tmp_arr['rscc_03'] = $unit['rscc_03'];
    $tmp_arr['teroris_03'] = $unit['teroris_03'];
    $tmp_arr['flood_03'] = $unit['flood_03'];
    $tmp_arr['eq_03'] = $unit['eq_03'];
    $tmp_arr['bengkel_03'] = $unit['bengkel_03'];
    $tmp_arr['komersil_03'] = $unit['komersil_03'];
    $tmp_arr['si_pass_03'] = $unit['si_pass_03'];
    $tmp_arr['qty_pass_03'] = $unit['qty_pass_03'];
    $tmp_arr['tpl_03'] = $unit['tpl_03'];

    $tmp_arr['si_driver_04'] = $unit['si_driver_04'];
    $tmp_arr['tpl_04'] = $unit['tpl_04'];
    $tmp_arr['derek_04'] = $unit['derek_04'];
    $tmp_arr['stnk_04'] = $unit['stnk_04'];
    $tmp_arr['rate_04'] = $unit['rate_04'];
    $tmp_arr['per_tgg_04'] = $unit['per_tgg_04'];
    $tmp_arr['rscc_04'] = $unit['rscc_04'];
    $tmp_arr['teroris_04'] = $unit['teroris_04'];
    $tmp_arr['flood_04'] = $unit['flood_04'];
    $tmp_arr['eq_04'] = $unit['eq_04'];
    $tmp_arr['bengkel_04'] = $unit['bengkel_04'];
    $tmp_arr['komersil_04'] = $unit['komersil_04'];
    $tmp_arr['si_pass_04'] = $unit['si_pass_04'];
    $tmp_arr['qty_pass_04'] = $unit['qty_pass_04'];
    $tmp_arr['tpl_04'] = $unit['tpl_04'];

    $tmp_arr['si_driver_05'] = $unit['si_driver_05'];
    $tmp_arr['tpl_05'] = $unit['tpl_05'];
    $tmp_arr['derek_05'] = $unit['derek_05'];
    $tmp_arr['stnk_05'] = $unit['stnk_05'];
    $tmp_arr['rate_05'] = $unit['rate_05'];
    $tmp_arr['per_tgg_05'] = $unit['per_tgg_05'];
    $tmp_arr['rscc_05'] = $unit['rscc_05'];
    $tmp_arr['teroris_05'] = $unit['teroris_05'];
    $tmp_arr['flood_05'] = $unit['flood_05'];
    $tmp_arr['eq_05'] = $unit['eq_05'];
    $tmp_arr['bengkel_05'] = $unit['bengkel_05'];
    $tmp_arr['komersil_05'] = $unit['komersil_05'];
    $tmp_arr['si_pass_05'] = $unit['si_pass_05'];
    $tmp_arr['qty_pass_05'] = $unit['qty_pass_05'];
    $tmp_arr['tpl_05'] = $unit['tpl_05'];

    $sum_ins = $unit['sum_ins'];
    $depre_01 = $unit['depre_01'];
    $depre_02 = $unit['depre_02'];
    $depre_03 = $unit['depre_03'];
    $depre_04 = $unit['depre_04'];
    $depre_05 = $unit['depre_05'];


    $si_01 = $sum_ins * $depre_01 / 100;
    $si_02 = $sum_ins * $depre_02 / 100;
    $si_03 = $sum_ins * $depre_03 / 100;
    $si_04 = $sum_ins * $depre_04 / 100;
    $si_05 = $sum_ins * $depre_05 / 100;

    // PERHIT HULL
    {
      $dec_rate_01 = $unit['rate_01'] / 100;     //NILAI SESUDAH BAGI 100
      $dec_loading_01 = $unit['loading_01'] / 100;     //NILAI SESUDAH BAGI 100
      if (($unit['loading_01'] != null || $unit['loading_01'] != "") && strtoupper($unit['per_tgg_01']) != "TLO") {
        $prem_rate_01 = ($dec_rate_01 + ($dec_rate_01 * $dec_loading_01)) * $si_01;
        $rate_comp_01 = ($dec_rate_01 + ($dec_rate_01 * $dec_loading_01)) * 100;
        // $prem_rate_01   = $dec_rate_01 * $si_01;

      } else {

        $rate_comp_01 = $unit['rate_01'];
        $prem_rate_01 = $dec_rate_01 * $si_01;
      }
      $tmp_arr['loading_rate_01'] = $unit['loading_01']; //$dec_loading_01;

      $dec_rate_02 = $unit['rate_02'] / 100;     //NILAI SESUDAH BAGI 100
      $dec_loading_02 = $unit['loading_02'] / 100;     //NILAI SESUDAH BAGI 100
      if (($unit['loading_02'] != null || $unit['loading_02'] != "") && strtoupper($unit['per_tgg_02']) != "TLO") {

        $rate_comp_02 = $dec_rate_02 + ($dec_rate_02 * $dec_loading_02) * 100;
        $prem_rate_02 = ($dec_rate_02 + ($dec_rate_02 * $dec_loading_02)) * $si_02;

      } else {
        $prem_rate_02 = $dec_rate_02 * $si_02;
        $rate_comp_02 = $unit['rate_02'];
      }
      $tmp_arr['loading_rate_02'] = $unit['loading_02']; //$dec_loading_02;

      $dec_rate_03 = $unit['rate_03'] / 100;     //NILAI SESUDAH BAGI 100
      $dec_loading_03 = $unit['loading_03'] / 100;     //NILAI SESUDAH BAGI 100
      if (($unit['loading_03'] != null || $unit['loading_03'] != "") && strtoupper($unit['per_tgg_03']) != "TLO") {
        $rate_comp_03 = $dec_rate_03 + ($dec_rate_03 * $dec_loading_03) * 100;
        $prem_rate_03 = ($dec_rate_03 + ($dec_rate_03 * $dec_loading_03)) * $si_03;
      } else {

        $rate_comp_03 = $unit['rate_03'];
        $prem_rate_03 = $dec_rate_03 * $si_03;


      }
      $tmp_arr['loading_rate_03'] = $unit['loading_03'];

      $dec_rate_04 = $unit['rate_04'] / 100;     //NILAI SESUDAH BAGI 100
      $dec_loading_04 = $unit['loading_04'] / 100;     //NILAI SESUDAH BAGI 100
      if (($unit['loading_04'] != null || $unit['loading_04'] != "") && strtoupper($unit['per_tgg_04']) != "TLO") {
        $rate_comp_04 = $dec_rate_04 + ($dec_rate_04 * $dec_loading_04) * 100;
        $prem_rate_04 = ($dec_rate_04 + ($dec_rate_04 * $dec_loading_04)) * $si_04;
      } else {
        $rate_comp_04 = $unit['rate_04'];
        $prem_rate_04 = $dec_rate_04 * $si_04;
      }
      $tmp_arr['loading_rate_04'] = $unit['loading_04'];

      $dec_rate_05 = $unit['rate_05'] / 100;     //NILAI SESUDAH BAGI 100
      $dec_loading_05 = $unit['loading_05'] / 100;     //NILAI SESUDAH BAGI 100
      if (($unit['loading_05'] != null || $unit['loading_05'] != "") && strtoupper($unit['per_tgg_05']) != "TLO") {

        $rate_comp_05 = $dec_rate_05 + ($dec_rate_05 * $dec_loading_05) * 100;
        $prem_rate_05 = ($dec_rate_05 + ($dec_rate_05 * $dec_loading_05)) * $si_05;
      } else {
        $rate_comp_05 = $unit['rate_05'];
        $prem_rate_05 = $dec_rate_05 * $si_05;
      }
      $tmp_arr['loading_rate_05'] = $unit['loading_05'];

      $tmp_arr['prem_rate_01'] = $prem_rate_01;
      $tmp_arr['prem_rate_02'] = $prem_rate_02;
      $tmp_arr['prem_rate_03'] = $prem_rate_03;
      $tmp_arr['prem_rate_04'] = $prem_rate_04;
      $tmp_arr['prem_rate_05'] = $prem_rate_05;


      $tmp_arr['rate_01_comp'] = $rate_comp_01;
      $tmp_arr['rate_02_comp'] = $rate_comp_02;
      $tmp_arr['rate_03_comp'] = $rate_comp_03;
      $tmp_arr['rate_04_comp'] = $rate_comp_04;
      $tmp_arr['rate_05_comp'] = $rate_comp_05;
    }

    // PERHIT RSCC
    {
      $prem_rscc_01 = $unit['rscc_01'] * $si_01 / 100;
      $prem_rscc_02 = $unit['rscc_02'] * $si_02 / 100;
      $prem_rscc_03 = $unit['rscc_03'] * $si_03 / 100;
      $prem_rscc_04 = $unit['rscc_04'] * $si_04 / 100;
      $prem_rscc_05 = $unit['rscc_05'] * $si_05 / 100;

      $tmp_arr['prem_rscc_01'] = $prem_rscc_01;
      $tmp_arr['prem_rscc_02'] = $prem_rscc_02;
      $tmp_arr['prem_rscc_03'] = $prem_rscc_03;
      $tmp_arr['prem_rscc_04'] = $prem_rscc_04;
      $tmp_arr['prem_rscc_05'] = $prem_rscc_05;
    }

    // PERHIT TERORISM
    {
      $prem_teroris_01 = $unit['teroris_01'] * $si_01 / 100;
      $prem_teroris_02 = $unit['teroris_02'] * $si_02 / 100;
      $prem_teroris_03 = $unit['teroris_03'] * $si_03 / 100;
      $prem_teroris_04 = $unit['teroris_04'] * $si_04 / 100;
      $prem_teroris_05 = $unit['teroris_05'] * $si_05 / 100;

      $tmp_arr['prem_teroris_01'] = $prem_teroris_01;
      $tmp_arr['prem_teroris_02'] = $prem_teroris_02;
      $tmp_arr['prem_teroris_03'] = $prem_teroris_03;
      $tmp_arr['prem_teroris_04'] = $prem_teroris_04;
      $tmp_arr['prem_teroris_05'] = $prem_teroris_05;
    }

    // PERHIT FLOOD
    {
      $prem_flood_01 = $unit['flood_01'] * $si_01 / 100;
      $prem_flood_02 = $unit['flood_02'] * $si_02 / 100;
      $prem_flood_03 = $unit['flood_03'] * $si_03 / 100;
      $prem_flood_04 = $unit['flood_04'] * $si_04 / 100;
      $prem_flood_05 = $unit['flood_05'] * $si_05 / 100;

      $tmp_arr['prem_flood_01'] = $prem_flood_01;
      $tmp_arr['prem_flood_02'] = $prem_flood_02;
      $tmp_arr['prem_flood_03'] = $prem_flood_03;
      $tmp_arr['prem_flood_04'] = $prem_flood_04;
      $tmp_arr['prem_flood_05'] = $prem_flood_05;
    }

    // PERHIT EQ
    {
      $prem_eq_01 = $unit['eq_01'] * $si_01 / 100;
      $prem_eq_02 = $unit['eq_02'] * $si_02 / 100;
      $prem_eq_03 = $unit['eq_03'] * $si_03 / 100;
      $prem_eq_04 = $unit['eq_04'] * $si_04 / 100;
      $prem_eq_05 = $unit['eq_05'] * $si_05 / 100;

      $tmp_arr['prem_eq_01'] = $prem_eq_01;
      $tmp_arr['prem_eq_02'] = $prem_eq_02;
      $tmp_arr['prem_eq_03'] = $prem_eq_03;
      $tmp_arr['prem_eq_04'] = $prem_eq_04;
      $tmp_arr['prem_eq_05'] = $prem_eq_05;
    }

    // PERHIT BKL RESMI
    {
      $prem_bengkel_01 = $unit['bengkel_01'] * $si_01 / 100;
      $prem_bengkel_02 = $unit['bengkel_02'] * $si_02 / 100;
      $prem_bengkel_03 = $unit['bengkel_03'] * $si_03 / 100;
      $prem_bengkel_04 = $unit['bengkel_04'] * $si_04 / 100;
      $prem_bengkel_05 = $unit['bengkel_05'] * $si_05 / 100;

      $tmp_arr['prem_bengkel_01'] = $prem_bengkel_01;
      $tmp_arr['prem_bengkel_02'] = $prem_bengkel_02;
      $tmp_arr['prem_bengkel_03'] = $prem_bengkel_03;
      $tmp_arr['prem_bengkel_04'] = $prem_bengkel_04;
      $tmp_arr['prem_bengkel_05'] = $prem_bengkel_05;
    }

    // PERHIT DEREK
    {
      $prem_derek_01 = $unit['derek_01'] * $si_01 / 100;
      $prem_derek_02 = $unit['derek_02'] * $si_02 / 100;
      $prem_derek_03 = $unit['derek_03'] * $si_03 / 100;
      $prem_derek_04 = $unit['derek_04'] * $si_04 / 100;
      $prem_derek_05 = $unit['derek_05'] * $si_05 / 100;

      $tmp_arr['prem_derek_01'] = $prem_derek_01;
      $tmp_arr['prem_derek_02'] = $prem_derek_02;
      $tmp_arr['prem_derek_03'] = $prem_derek_03;
      $tmp_arr['prem_derek_04'] = $prem_derek_04;
      $tmp_arr['prem_derek_05'] = $prem_derek_05;
    }

    // PERHIT PA DRIVER
    {
      $prem_pa_si_driver_01 = (0.5) * $unit['si_driver_01'] / 100;
      $prem_pa_si_driver_02 = (0.5) * $unit['si_driver_02'] / 100;
      $prem_pa_si_driver_03 = (0.5) * $unit['si_driver_03'] / 100;
      $prem_pa_si_driver_04 = (0.5) * $unit['si_driver_04'] / 100;
      $prem_pa_si_driver_05 = (0.5) * $unit['si_driver_05'] / 100;

      $tmp_arr['pa_si_driver_01'] = $prem_pa_si_driver_01;
      $tmp_arr['pa_si_driver_02'] = $prem_pa_si_driver_02;
      $tmp_arr['pa_si_driver_03'] = $prem_pa_si_driver_03;
      $tmp_arr['pa_si_driver_04'] = $prem_pa_si_driver_04;
      $tmp_arr['pa_si_driver_05'] = $prem_pa_si_driver_05;
    }

    // PERHIT PA_PASSENGER
    {
      $prem_pa_pass_01 = (0.1) * $unit['si_pass_01'] * $unit['qty_pass_01'] / 100;
      $prem_pa_pass_02 = (0.1) * $unit['si_pass_02'] * $unit['qty_pass_02'] / 100;
      $prem_pa_pass_03 = (0.1) * $unit['si_pass_03'] * $unit['qty_pass_03'] / 100;
      $prem_pa_pass_04 = (0.1) * $unit['si_pass_04'] * $unit['qty_pass_04'] / 100;
      $prem_pa_pass_05 = (0.1) * $unit['si_pass_05'] * $unit['qty_pass_05'] / 100;

      $tmp_arr['prem_pa_pass_01'] = $prem_pa_pass_01;
      $tmp_arr['prem_pa_pass_02'] = $prem_pa_pass_02;
      $tmp_arr['prem_pa_pass_03'] = $prem_pa_pass_03;
      $tmp_arr['prem_pa_pass_04'] = $prem_pa_pass_04;
      $tmp_arr['prem_pa_pass_05'] = $prem_pa_pass_05;
    }

    // PERHIT TPL
    {
      $v_tpl_01 = $unit['tpl_01'];
      $v_tpl_02 = $unit['tpl_02'];
      $v_tpl_03 = $unit['tpl_03'];
      $v_tpl_04 = $unit['tpl_04'];
      $v_tpl_05 = $unit['tpl_05'];

      $tpl_01_stage1 = 0;
      $tpl_01_stage2 = 0;
      $tpl_01_stage3 = 0;
      $m25 = 25000000;
      $m50 = 50000000;
      $m100 = 100000000;

      $rate_tpl_stage_1 = 1 / 100;
      $rate_tpl_stage_2 = 0.5 / 100;
      $rate_tpl_stage_3 = 0.25 / 100;
      //AMBIL OJK CODE
      {
        //INISIAL VARIABEL
        $no_kereta_api = $unit['wfh_id'];
        $no_make = $unit['make'];
        $no_cate = $unit['cate'];
        $no_model = $unit['model'];
        $no_wilayah = $unit['wilayah'];
        $no_usage = $unit['status_penggunaan'];
        $no_type_ass = $unit['per_tgg_01'];
        $no_usia_kendaraan = $unit['tahun_buat'];

        //RULES
        if ($no_kereta_api == '0010') {
          $nama_kereta = 'AGENT';
        }
        if ($no_kereta_api == '0011') {
          $nama_kereta = 'DIRECT';
        }
        if ($no_kereta_api == '0012') {
          $nama_kereta = 'DEALER';
        }
        if ($no_kereta_api == '0017') {
          $nama_kereta = 'ROL';
        }

        if ($no_wilayah == '01') {
          $no_wilayah = 'WILAYAH 1';
        }
        if ($no_wilayah == '02') {
          $no_wilayah = 'WILAYAH 2';
        }
        if ($no_wilayah == '03') {
          $no_wilayah = 'WILAYAH 3';
        }

        if ($no_usage == 'PRIBADI') {
          $no_usage = 'PRIVATE';
        }
        if ($no_usage == 'KOMERSIL') {
          $no_usage = 'COMMERCIAL';
        }

        if ($no_type_ass == '') {
          $no_type_ass = '';
        }
        if ($no_type_ass == 'Comprehensive' || $no_type_ass = 'ARK') {
          $no_type_ass = 'ALL';
        }
        if ($no_type_ass == 'TLO' || $no_type_ass == 'Total Loss Only') {
          $no_type_ass = 'TLO';
        }

        //   $json_send=array( 'input_no_kereta' => $no_kereta_api,
        //                     'input_make'      => $no_make,
        //                     'input_cate'      => $no_cate,
        //                     'input_model'     => $no_model,
        //                     'input_wilayah'   => $no_wilayah,
        //                     'input_usage'     => $no_usage,
        //                     'input_type_ass'  => $no_type_ass,
        //                     'input_usia_ken'  => $no_usia_kendaraan,
        //                     'no_Key_Id'       => 'Project_rate_dasdSDAKSDJKJMKOKWEWADBJSDAAAASDCMKSAOOZ'
        //               );
        //   $url_api = "https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/data_rate_wfh";
        //   $header = array('Content-Type: multipart/form-data');
        //   $arr_result_data = $sqlbuilder->api('POST',$url_api,$json_send, $header);
        //   if($arr_result_data['messagecode']==00) {
        //     // BOLEH D HARDCODE DL UNTUK OJK CODE 001

        //     // $OJK_CODE=$arr_result_data['rate'][0]['OJK_CODE'];
        //     // $OJK_DESC=$arr_result_data['rate'][0]['OJK_DESC'];
        //   }

        $OJK_CODE = '001';
        // $arr_master['LOG_RECEIVE']  = $arr_result_data;
        // $arr_master['LOG_SEND']     = $json_send;
      }
      if ($OJK_CODE == '002') {
        $rate_tpl_stage_1 = 1.5 / 100;
        $rate_tpl_stage_2 = 0.75 / 100;
        $rate_tpl_stage_3 = 0.375 / 100;
      }
      if ($OJK_CODE == '003') {
        $rate_tpl_stage_1 = 1.5 / 100;
        $rate_tpl_stage_2 = 0.75 / 100;
        $rate_tpl_stage_3 = 0.375 / 100;
      }

      if (($v_tpl_01 > $m50) && ($v_tpl_01 <= $m100)) {
        $tpl_01_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_01_stage2 = $m25 * $rate_tpl_stage_2;
        $tpl_01_stage3 = ($v_tpl_01 - $m50) * $rate_tpl_stage_3;
      }
      if (($v_tpl_01 > $m25) && ($v_tpl_01 <= $m50)) {
        $tpl_01_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_01_stage2 = ($v_tpl_01 - $m25) * $rate_tpl_stage_2;
      }
      if (($v_tpl_01 > 0) && ($v_tpl_01 <= $m25)) {
        $tpl_01_stage1 = $v_tpl_01 * $rate_tpl_stage_1;
      }
      $prem_tpl_01 = $tpl_01_stage1 + $tpl_01_stage2 + $tpl_01_stage3;

      $tpl_02_stage1 = 0;
      $tpl_02_stage2 = 0;
      $tpl_02_stage3 = 0;

      if (($v_tpl_02 > $m50) && ($v_tpl_02 <= $m100)) {
        $tpl_02_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_02_stage2 = $m25 * $rate_tpl_stage_2;
        $tpl_02_stage3 = ($v_tpl_02 - $m50) * $rate_tpl_stage_3;
      }
      if (($v_tpl_02 > $m25) && ($v_tpl_02 <= $m50)) {
        $tpl_02_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_02_stage2 = ($v_tpl_02 - $m25) * $rate_tpl_stage_2;
      }
      if (($v_tpl_02 > 0) && ($v_tpl_02 <= $m25)) {
        $tpl_02_stage1 = $v_tpl_02 * $rate_tpl_stage_1;
      }
      $prem_tpl_02 = $tpl_02_stage1 + $tpl_02_stage2 + $tpl_02_stage3;

      $tpl_03_stage1 = 0;
      $tpl_03_stage2 = 0;
      $tpl_03_stage3 = 0;

      if (($v_tpl_03 > $m50) && ($v_tpl_03 <= $m100)) {
        $tpl_03_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_03_stage2 = $m25 * $rate_tpl_stage_2;
        $tpl_03_stage3 = ($v_tpl_03 - $m50) * $rate_tpl_stage_3;
      }
      if (($v_tpl_03 > $m25) && ($v_tpl_03 <= $m50)) {
        $tpl_03_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_03_stage2 = ($v_tpl_03 - $m25) * $rate_tpl_stage_2;
      }
      if (($v_tpl_03 > 0) && ($v_tpl_03 <= $m25)) {
        $tpl_03_stage1 = $v_tpl_03 * $rate_tpl_stage_1;
      }
      $prem_tpl_03 = $tpl_03_stage1 + $tpl_03_stage2 + $tpl_03_stage3;

      $tpl_04_stage1 = 0;
      $tpl_04_stage2 = 0;
      $tpl_04_stage3 = 0;

      if (($v_tpl_04 > $m50) && ($v_tpl_04 <= $m100)) {
        $tpl_04_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_04_stage2 = $m25 * $rate_tpl_stage_2;
        $tpl_04_stage3 = ($v_tpl_04 - $m50) * $rate_tpl_stage_3;
      }
      if (($v_tpl_04 > $m25) && ($v_tpl_04 <= $m50)) {
        $tpl_04_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_04_stage2 = ($v_tpl_04 - $m25) * $rate_tpl_stage_2;
      }
      if (($v_tpl_04 > 0) && ($v_tpl_04 <= $m25)) {
        $tpl_04_stage1 = $v_tpl_04 * $rate_tpl_stage_1;
      }
      $prem_tpl_04 = $tpl_04_stage1 + $tpl_04_stage2 + $tpl_04_stage3;

      $tpl_05_stage1 = 0;
      $tpl_05_stage2 = 0;
      $tpl_05_stage3 = 0;

      if (($v_tpl_05 > $m50) && ($v_tpl_05 <= $m100)) {
        $tpl_05_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_05_stage2 = $m25 * $rate_tpl_stage_2;
        $tpl_05_stage3 = ($v_tpl_05 - $m50) * $rate_tpl_stage_3;
      }
      if (($v_tpl_05 > $m25) && ($v_tpl_05 <= $m50)) {
        $tpl_05_stage1 = $m25 * $rate_tpl_stage_1;
        $tpl_05_stage2 = ($v_tpl_05 - $m25) * $rate_tpl_stage_2;
      }
      if (($v_tpl_05 > 0) && ($v_tpl_05 <= $m25)) {
        $tpl_05_stage1 = $v_tpl_05 * $rate_tpl_stage_1;
      }
      $prem_tpl_05 = $tpl_05_stage1 + $tpl_05_stage2 + $tpl_05_stage3;

      $tmp_arr['prem_tpl_01'] = $prem_tpl_01;
      $tmp_arr['prem_tpl_02'] = $prem_tpl_02;
      $tmp_arr['prem_tpl_03'] = $prem_tpl_03;
      $tmp_arr['prem_tpl_04'] = $prem_tpl_04;
      $tmp_arr['prem_tpl_05'] = $prem_tpl_05;
    }

    // PERHIT STNK
    {
      $stnk_01 = $unit['stnk_01'];
      $stnk_02 = $unit['stnk_02'];
      $stnk_03 = $unit['stnk_03'];
      $stnk_04 = $unit['stnk_04'];
      $stnk_05 = $unit['stnk_05'];

      $tmp_arr['prem_stnk_01'] = $stnk_01;
      $tmp_arr['prem_stnk_02'] = $stnk_02;
      $tmp_arr['prem_stnk_03'] = $stnk_03;
      $tmp_arr['prem_stnk_04'] = $stnk_04;
      $tmp_arr['prem_stnk_05'] = $stnk_05;
    }

    //PREMI PER TAHUN
    {
      $prem_total_tahun_01 = $prem_rate_01 + $prem_rscc_01 + $prem_flood_01 + $prem_eq_01
        + $prem_bengkel_01 + $prem_derek_01 + $prem_pa_si_driver_01 + $prem_teroris_01 + $prem_pa_pass_01 + $prem_tpl_01 + $stnk_01;
      $prem_total_tahun_02 = $prem_rate_02 + $prem_rscc_02 + $prem_flood_02 + $prem_eq_02
        + $prem_bengkel_02 + $prem_derek_02 + $prem_pa_si_driver_02 + $prem_teroris_02 + $prem_pa_pass_02 + $prem_tpl_02 + $stnk_02;
      $prem_total_tahun_03 = $prem_rate_03 + $prem_rscc_03 + $prem_flood_03 + $prem_eq_03
        + $prem_bengkel_03 + $prem_derek_03 + $prem_pa_si_driver_03 + $prem_teroris_03 + $prem_pa_pass_03 + $prem_tpl_03 + $stnk_03;
      $prem_total_tahun_04 = $prem_rate_04 + $prem_rscc_04 + $prem_flood_04 + $prem_eq_04
        + $prem_bengkel_04 + $prem_derek_04 + $prem_pa_si_driver_04 + $prem_teroris_04 + $prem_pa_pass_04 + $prem_tpl_04 + $stnk_04;
      $prem_total_tahun_05 = $prem_rate_05 + $prem_rscc_05 + $prem_flood_05 + $prem_eq_05
        + $prem_bengkel_05 + $prem_derek_05 + $prem_pa_si_driver_05 + $prem_teroris_05 + $prem_pa_pass_05 + $prem_tpl_05 + $stnk_05;

      $tmp_arr['prem_total_tahun_01'] = $prem_total_tahun_01;
      $tmp_arr['prem_total_tahun_02'] = $prem_total_tahun_02;
      $tmp_arr['prem_total_tahun_03'] = $prem_total_tahun_03;
      $tmp_arr['prem_total_tahun_04'] = $prem_total_tahun_04;
      $tmp_arr['prem_total_tahun_05'] = $prem_total_tahun_05;
    }






    //TOTAL PREMI
    {
      $short_rate_metode = $unit['short_rate_metode'];
      $short_rate_value = $unit['short_rate_value'];
      $admin_cost = $unit['admin_cost'];
      $disc_debit = $unit['disc_debit'];
      $disc_credit = $unit['disc_credit'];

      if ($unit['tahun_cover'] == 1) {
        $total_premi = $prem_total_tahun_01;
      } elseif ($unit['tahun_cover'] == 2) {
        $total_premi = $prem_total_tahun_01 + $prem_total_tahun_02;
      } elseif ($unit['tahun_cover'] == 3) {
        $total_premi = $prem_total_tahun_01 + $prem_total_tahun_02 + $prem_total_tahun_03;
      } elseif ($unit['tahun_cover'] == 4) {
        $total_premi = $prem_total_tahun_01 + $prem_total_tahun_02 + $prem_total_tahun_03 + $prem_total_tahun_04;
      } elseif ($unit['tahun_cover'] == 5) {
        $total_premi = $prem_total_tahun_01 + $prem_total_tahun_02 + $prem_total_tahun_03 + $prem_total_tahun_04 + $prem_total_tahun_05;
      } else {
        $total_premi = 0;
      }

      $tahun_default = 365;
      $tgl_awal = date("Y-m-d", strtotime($unit['tgl_awal']));
      $tgl_awal_thn = date("Y", strtotime($tgl_awal));
      $tgl_awal_bln = intval(date("m", strtotime($tgl_awal)));

      if ($tgl_awal_thn % 400 == 0) {
        $tahun_default = 366;
      } else if ($tgl_awal_thn % 100 == 0) {
        $tahun_default = 365;
      } else if ($tgl_awal_thn % 4 == 0) {
        $tahun_default = 366;
      } else {
        $tahun_default = 365;
      }




      $start_date = date("d", strtotime($tgl_awal_thn));
      $one_year = date("d", strtotime($tgl_awal_thn . '+365 days'));

      // echo '<br>'.date("d", strtotime($tgl_awal_thn. '+365 days')).'<br>';

      if ($start_date <> $one_year) {
        $tahun_default = 366;
      } else {
        $tahun_default = 365;
      }



      $tmp_arr['short_rate_value'] = intval($short_rate_value);
      $tmp_arr['tahun_total'] = $tahun_default;
      $tmp_arr['short_rate'] = $short_rate_metode;
      $tmp_arr['total_premi_prev'] = $total_premi;

      $tmp_arr['total_premi_test'] = $tahun_default;

      if ($short_rate_metode == "PRO_RATE") {
        $total_premi = $total_premi * $short_rate_value / $tahun_default;
      } else if ($short_rate_metode == "SHORT_RATE") {
        $total_premi = $total_premi * $short_rate_value / 100;
      }
      $tmp_arr['total_premi'] = $total_premi;
    }

    //GRAND TOTAL
    {
      $grand_total = $total_premi;
      $nilai_disc_debit = "";
      $nilai_disc_credit = "";
      if ($disc_debit != "") {
        $nilai_disc_debit = $total_premi * $disc_debit / 100;
        $grand_total = $grand_total - ($total_premi * $disc_debit / 100);
      }

      $grand_total_new = $grand_total;
      $tmp_arr['grand_total_new'] = $grand_total_new;

      if ($disc_credit != "") {
        $nilai_disc_credit = $total_premi * $disc_credit / 100;
        $grand_total = $grand_total - ($total_premi * $disc_credit / 100);
      }


      $grand_total_new = $grand_total;
      $tmp_arr['grand_total_new'] = $grand_total_new;

      $grand_total = $grand_total + $admin_cost;

      $tmp_arr['nilai_disc_debit'] = $nilai_disc_debit;
      $tmp_arr['nilai_disc_credit'] = $nilai_disc_credit;
      $tmp_arr['grand_total'] = $grand_total;




    }

    array_push($arr_premi, $tmp_arr);
  }

  // total seluruh perhitungan
  $arr_total = array(); {
    $multi_disc_debit = 0;
    $multi_disc_credit = 0;
    $multi_total_premi = 0;
    $grand_multi = 0;

    foreach ($arr_premi as $sum_disc) {
      $disc_debit_multi = intval($sum_disc['nilai_disc_debit']);
      $disc_credit_multi = intval($sum_disc['nilai_disc_credit']);
      $total_premi_multi = intval($sum_disc['total_premi']);
      $grand_total_multi = intval($sum_disc['grand_total_new']);

      $multi_disc_debit += $disc_debit_multi;
      $multi_disc_credit += $disc_credit_multi;
      $multi_total_premi += $total_premi_multi;
      $grand_multi += $grand_total_multi;
    }

    $tmp_total['sum_disc_debit'] = $multi_disc_debit;
    $tmp_total['sum_disc_credit'] = $multi_disc_credit;

    $tmp_total['sum_total_premi'] = $multi_total_premi;
    $tmp_total['admin_cost'] = intval($sum_disc['admin_cost']);

    $grand_final_multi = $multi_total_premi - ($multi_disc_debit + $multi_disc_credit);

    $grand_final_multi_debt = $multi_total_premi - ($multi_disc_debit);

    $tmp_total['grand_total_multi_debt'] = $grand_final_multi_debt;


    $net_multi = $grand_final_multi_debt + intval($sum_disc['admin_cost']);

    $tmp_total['grand_total_multi'] = $grand_final_multi;
    $tmp_total['net_total_multi'] = $net_multi;


    array_push($arr_total, $tmp_total);

  }


  $arr_master['status'] = 200;
  $arr_master['message'] = "SUCCESS";
  $arr_master['data'] = $arr_premi;
  $arr_master['total'] = $arr_total;
  $arr_master['PARAM_INPUT'] = $unit_detail;

  return $arr_master;

}