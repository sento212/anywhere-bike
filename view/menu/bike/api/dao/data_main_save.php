<?php

error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);

function save_main($sqlbuilder, $dt)
{
  $table_use = $_SESSION['table_use'];
  $table_use_det = $_SESSION['table_use_det'];
  $table_foto = $_SESSION['table_foto'];
  $table_survey = $_SESSION['table_survey'];
  function acak_kode()
  {
    date_default_timezone_set("Asia/Jakarta");
    $dateObj = DateTime::createFromFormat('U.u', microtime(TRUE));
    $dateObj->setTimeZone(new DateTimeZone('Asia/Jakarta'));
    usleep(2 * 1000);
    $acak_kode = md5(md5(md5($dateObj->format('Ymd_His_u'))));
    return $acak_kode;
  }

  $user_id = $dt['user_id'];
  $web_menu = $dt['web_menu'];

  $_no_regis = $dt['no_regis'];
  $mkg_group = $dt['mk_group'];
  $_jml_foto = $dt['jml_foto'];
  $_unit_no = $dt['unit_no'];

  // buat insert / update semua foto table polis_agent_direct_foto
  // START UPLOAD FOTO
  if ($_no_regis != '' and $_jml_foto != 'none') {

    $max_file_upload = 10;
    $info_upload_file = "";
    $info_file = "";
    $dirUpload = __DIR__ . "/../files/images/foto_rus/";
    if ($_jml_foto == '') {
      $_jml_foto = 0;
    }

    for ($Z = 1; $Z <= $_jml_foto; $Z++) {
      $_del_foto_[$Z] = $dt['multi_foto'][$Z - 1]['del_foto_'];
      $_type_foto_[$Z] = $dt['multi_foto'][$Z - 1]['type_foto_'];
      $_nama_file_[$Z] = $dt['multi_foto'][$Z - 1]['nama_file_'];
      $_url_foto_[$Z] = $dt['multi_foto'][$Z - 1]['url_foto_'];

      $_Harga_mobil = $dt['multi_foto'][$Z - 1]['Harga_mobil_'];
      // echo "--->$_Harga_mobil <br>";
      if ($_Harga_mobil == NULL) {
        $_Harga_mobil = 'null';
      }
      else {
        $_Harga_mobil = str_replace(',', '', $_Harga_mobil);
      }
      $_Harga_mobil_[$Z] = $_Harga_mobil;


      $_Upload_nama_asli_[$Z] = $dt['multi_foto'][$Z - 1]['Upload_nama_asli_'];
      $_Upload_nama_temp_[$Z] = $dt['multi_foto'][$Z - 1]['Upload_nama_temp_'];
      $_Upload_nama_temp_[$Z] = base64_decode($_Upload_nama_temp_[$Z]);
      $_Upload_file_size_[$Z] = $dt['multi_foto'][$Z - 1]['Upload_file_size_'];
      $explodeing = explode('.', $_Upload_nama_asli_[$Z]);
      $_Upload_file_ext_[$Z] = strtolower(end($explodeing));
      if ($_Upload_nama_temp_[$Z] != '') {
        $_Upload_Nama_File_[$Z] = $_no_regis . '_' . $Z . acak_kode() . '.' . $_Upload_file_ext_[$Z];
      }


    }
    // START cek ada data di DATABASE dan insert or update
    {
      $jumlah_kurang = 0;
      for ($Z = 1; $Z <= $max_file_upload; $Z++) {

        if ($_del_foto_[$Z] == '1') {
          $jumlah_kurang++;
        }

        if (($Z > $_jml_foto) or ($_del_foto_[$Z] == '1')) {
          // delete FOTO-FOTO
          $sql_foto_de = " UPDATE $table_foto
                                    set  status = 'unuse'
                                    where     register_id = '$_no_regis'
                                          and unit_no     = '$_unit_no'
                                          and urut        = $Z
                                          and status      = 'use'
                                          ";
          $hasil_foto_de = $sqlbuilder->executeNoCommit('BIKE', $sql_foto_de);
          if ($hasil_foto_de['status'] == 400) {
            $sqlbuilder->rollback('BIKE');
            return $hasil_foto_de;
          }
        }
        else {
          $sql_foto = " SELECT rowid,register_id,Nama_foto,url_foto,Harga_mobil
                                    from $table_foto
                                    where     register_id = '$_no_regis'
                                          and unit_no     = '$_unit_no'
                                          and urut        = $Z
                                          and status      = 'use'
                                          ";
          $hasil_foto = $sqlbuilder->select('BIKE', $sql_foto);
          if ($hasil_foto['status'] == 400) {
            $sqlbuilder->rollback('BIKE');
            return $hasil_foto;
          }
          $count_foto = count($hasil_foto['data']);
          $cek_foto = $hasil_foto['data'][0]['Nama_foto'];
          $cek_url = $hasil_foto['data'][0]['url_foto'];
          $cek_harga = $hasil_foto['data'][0]['Harga_mobil'];

          $extensions = array("JPEG", "JPG");
          if ((in_array(strtoupper($_Upload_file_ext_[$Z]), $extensions) === true) and ($_Upload_file_size_[$Z] <= 512000)) {
            $result = file_put_contents($dirUpload . $_Upload_Nama_File_[$Z], $_Upload_nama_temp_[$Z]);
          }
          else {
            if ($_nama_file_[$Z] != '' and $_Upload_file_ext_[$Z] != '' and $_Upload_file_size_[$Z] != '') {
              $sqlbuilder->rollback('BIKE');
              $result = [
                "status" => 400,
                "message" => "File ke $Z dengan Ext $_Upload_file_ext_[$Z] dan Size $_Upload_file_size_[$Z] KB tidak sesuai dengan Ext file or Size > 512 KB",
                "data" => []
              ];
              return $result;
            }


            if ($cek_foto != '') {
              $_Upload_Nama_File_[$Z] = $cek_foto;
            }
          }



          if ($count_foto >= 1) {
            $sql_foto_up = "UPDATE $table_foto
                                          set tgl_update  = now(),
                                              type_foto   = '$_type_foto_[$Z]',
                                              Nama_foto   = '$_Upload_Nama_File_[$Z]',
                                              url_foto    = '$_url_foto_[$Z]',
                                              Harga_mobil = $_Harga_mobil_[$Z]
                                          where     register_id = '$_no_regis'
                                                and unit_no     = '$_unit_no'
                                                and urut        = $Z
                                                and status      = 'use'";

            $hasil_foto_up = $sqlbuilder->executeNoCommit('BIKE', $sql_foto_up);
            if ($hasil_foto_up['status'] == 400) {
              $sqlbuilder->rollback('BIKE');
              return $hasil_foto_up;
            }
          }

          if ($count_foto == 0) {
            $sql_foto_in = " INSERT into  $table_foto
                                            ( register_id, unit_no, urut, tgl_buat,type_foto,Nama_foto,status,
                                              url_foto,Harga_mobil
                                            )
                                            values
                                            ( '$_no_regis','$_unit_no',$Z , now(),'$_type_foto_[$Z]','$_Upload_Nama_File_[$Z]','use',
                                              '$_url_foto_[$Z]',$_Harga_mobil_[$Z]
                                            ) ";

            $hasil_foto_in = $sqlbuilder->executeNoCommit('BIKE', $sql_foto_in);
            if ($hasil_foto_in['status'] == 400) {
              $sqlbuilder->rollback('BIKE');
              return $hasil_foto_in;
            }
          }


        } // end if yg ELSE

      } // end for

      $_jml_foto = $_jml_foto - $jumlah_kurang;
    }

    $sqlset = "
          SET @nomor = 0;  
          ";
    $setsql = $sqlbuilder->select('BIKE', $sqlset, true);
    if ($setsql['status'] == 400) {
      return $setsql;
    }

    $unit_update = "
          UPDATE $table_foto u
          LEFT JOIN(
          SELECT u.rowid, @nomor := @nomor + 1 unit_urutan
              FROM 
              $table_foto u
              WHERE u.register_id = '$_no_regis'
              AND u.unit_no 		= '$_unit_no'
              and STATUS      		= 'use'
              ORDER BY u.rowid ASC )us ON
                      u.rowid = us.rowid
                  SET
                      u.urut  = us.unit_urutan
              WHERE u.register_id = '$_no_regis'
              AND u.unit_no 		= '$_unit_no'
              and STATUS      		= 'use'
          ";
    $unit_hasil = $sqlbuilder->executeNoCommit('BIKE', $unit_update);
    if ($unit_hasil['status'] == 400) {
      $sqlbuilder->rollback('BIKE');
      return $unit_hasil;
    }
    // END cek ada data di DATABASE dan insert or update


  }// end no regis != '' upload foto

  // END UPLOAD FOTO

  // START UPLOAD FOTO BUKTI CONFIRMASI SPPA
  if ($dt['bukti_conf_sppa'] <> '') {
    $dirUpload_foto_bukti_sppa = __DIR__ . "/../files/images/foto_bukti_sppa/";
    $conf_sppa = $dt['bukti_conf_sppa'];
    $_bukti_conf_sppa_name = $conf_sppa['_bukti_conf_sppa_name'];
    $_bukti_conf_sppa_tmp_name = $conf_sppa['_bukti_conf_sppa_tmp_name'];
    $_bukti_conf_sppa_tmp_name = base64_decode($_bukti_conf_sppa_tmp_name);
    $_bukti_conf_sppa_size = $conf_sppa['_bukti_conf_sppa_size'];
    $list_name_sppa = explode('.', $_bukti_conf_sppa_name);
    $_bukti_conf_sppa_file_ext = strtolower(end($list_name_sppa));
    $_bukti_conf_sppa_Nama_File = $_no_regis . '_' . acak_kode() . '.' . $_bukti_conf_sppa_file_ext;

    //echo "$_bukti_conf_sppa_name  || $_bukti_conf_sppa_tmp_name  ||  $_bukti_conf_sppa_size || $_bukti_conf_sppa_file_ext || $_bukti_conf_sppa_Nama_File ";

    $extensions = array("JPEG", "JPG");
    if ((in_array(strtoupper($_bukti_conf_sppa_file_ext), $extensions) === true) and ($_bukti_conf_sppa_size <= 512000)) {
      $result = file_put_contents($dirUpload_foto_bukti_sppa . $_bukti_conf_sppa_Nama_File, $_bukti_conf_sppa_tmp_name);
      if ($result !== false) {
        $error_Upload_bukti_conf_sppa = "<span style='color:blue;'>File Sudah Di Upload</span>";
      }
      else {
        $error_Upload_bukti_conf_sppa = "<span style='color:red;'>File Gagal Di Save</span>";
      }
    }
    else {
      $error_Upload_bukti_conf_sppa = "<span style='color:red;'><b>SIZE FILE LEBIH DARI 512 KB ATAU EXT FILE SALAH </b></span>";
    }

  }
  else {
    $_bukti_conf_sppa_Nama_File = $dt['bukti_conf_sppa_backup'];
  }
  // END UPLOAD FOTO BUKTI CONFIRMASI SPPA

  $_no_regis_asli = $dt['no_regis'];
  $_no_regis_old = $dt['register_id_old'];
  $_quo_no = $dt['quotation_no'];
  $_quo_no_asli = $dt['quotation_no'];
  $_uw_status_asli = $dt['uwd_status'];

  $panel_roles = $dt['panel_roles'];  // array panel roles
  $panel_roles_SA = $dt['panel_roles_SA'];  // array panel roles


  $web_engine_class = $dt['web_engine_class'];
  $wfh_id = $dt['wfh_id'];
  $wfh_group = $dt['wfh_group'];
  $wfh_group_wfh_id = $dt['wfh_group_wfh_id'];

  $wfh_group_ext = $dt['wfh_id_ext'];
  $ref_person = $dt['ref_person'];

  $ex_polis_no = $dt['ex_polis_no'];

  ///   AGENT-->0010 || DIRECT-->0011 ||  DIALER-->0012 || ROL-->0017 || ROL SA-->0036
  if ($wfh_id != '0017' or $wfh_id != '0036') {
    $wfh_group_ext = null;
    $ref_person = null;
  }

  $type_api = $dt['type_api'];
  $email = $dt['email'];

  // ambil data yg di post
  $_sob_code = $dt['sob_code'];
  $_no_wa = $dt['no_wa'];
  $_no_kontrak = $dt['no_kontrak']; // mks wajib uniq di API

  $corp = $dt['corp'];
  // $wilayah      = $dt['wilayah'];
  $wilayah_unit = $dt['wilayah_unit'];
  $bus_code = $dt['bus_code'];

  $mkg_member = $dt['mkg_member'];
  $acc_officer = $dt['acc_officer'];
  $nik = $dt['nik'];
  //$cus_name   = $dt['cus_name'];
  $cus_name = str_replace("'", "\'", $dt['cus_name']);

  $nik_qq = $dt['nik_qq'];
  //$qq   = $dt['qq'];
  $qq = str_replace("'", "\'", $dt['qq']);
  //$qq2  = $dt['qq2'];
  $qq2 = str_replace("'", "\'", $dt['qq2']);

  //$cust_add  = $dt['cust_add'];
  $cust_add = str_replace("'", "\'", $dt['cust_add']);
  $cust_add = str_replace(";", ",", $cust_add);
  // $cust_add_02 = str_replace("'","\'", $dt['cust_add_02'] );
  // $cust_add_02 = str_replace(";",",", $cust_add_02 );
  // $cust_add_03 = str_replace("'","\'", $dt['cust_add_03'] );
  // $cust_add_03 = str_replace(";",",", $cust_add_03 );

  $kelurah = $dt['kelurah'];
  $kecamat = $dt['kecamat'];
  $kabupaten = $dt['kabupaten'];
  $province = $dt['province'];

  $kodepos = $dt['kodepos'];
  $cust_hp = $dt['cust_hp'];
  $_tgl_awal = $dt['tgl_awal'];  //mks
  $_tgl_akhir = $dt['tgl_akhir']; //mks

  // The Short Rate
  $_short_rate_metode = $dt['short_rate_metode'];
  if ($dt['short_rate_value'] == null) {
    $_short_rate_value = 'null';
  }
  else {
    $_short_rate_value = str_replace(',', '', $dt['short_rate_value']);
  }
  $_code_short_rate = $dt['code_short_rate'];

  $tgl_akhir_asli_ar = explode("-", $_tgl_akhir);
  $tgl_akhir_asli = $tgl_akhir_asli_ar[2] . "-" . $tgl_akhir_asli_ar[1] . "-" . $tgl_akhir_asli_ar[0];

  $tgl_awal_asli_ar = explode("-", $_tgl_awal);
  $tgl_awal_asli = $tgl_awal_asli_ar[2] . "-" . $tgl_awal_asli_ar[1] . "-" . $tgl_awal_asli_ar[0];

  $diff = abs(strtotime($tgl_akhir_asli) - strtotime($tgl_awal_asli));
  $years = floor($diff / (365 * 60 * 60 * 24));
  if ($years == 1) {
    $_short_rate_metode = '';
    $_short_rate_value = 'null';
    $_code_short_rate = '';
  }



  $_membership = $dt['membership'];
  $_membership_remark = $dt['membership_remark'];


  $body_type_ojk = $dt['body_type_ojk']; //mks
  $or_ctl_tlo = $dt['or_ctl_tlo'];
  $_make = $dt['make']; //mks
  $_cate = $dt['cate']; //mks
  $_moda = $dt['moda']; //mks

  $warna = $dt['warna'];
  $use_new = $dt['use_new'];  //PRIBADI, KOMERSIL
  $status = $dt['status'];   //NEW, USED

  $survey_no = strtoupper($dt['survey_no']);
  $survey_report = $dt['survey_report'];
  $jam_survey = $dt['jam_survey'];  // STR_TO_DATE('$jam_survey', '%d-%m-%Y %H:%i:%s')


  $tahun = $dt['tahun'];
  $no_rangka = $dt['no_rangka'];
  $no_mesin = $dt['no_mesin'];
  $plat = $dt['plat'];

  $curr = $dt['curr'];
  $sum_ins = $dt['sum_ins'];
  if ($sum_ins == null) {
    $sum_ins = 'null';
  }
  else {
    $sum_ins = str_replace(',', '', $sum_ins);
  }

  $adm_cost = $dt['adm_cost'];
  if ($adm_cost == null) {
    $adm_cost = 'null';
  }
  else {
    $adm_cost = str_replace(',', '', $adm_cost);
  }

  $wording_no = $dt['wording_no'];


  $thn_ttg = $dt['thn_pertanggunan'];

  // cek special jika pilihthn_pertanggunan /   $thn_ttg     = $dt['thn_pertanggunan'];
  // harus di hapus semua data data sampah nya yg tidak seusai dengan tahun pertangguannya biar tidak bocor di api
  {
    if ($thn_ttg == '0') {
      $thn_ke_1 = 'OFF';
      $thn_ke_2 = 'OFF';
      $thn_ke_3 = 'OFF';
      $thn_ke_4 = 'OFF';
      $thn_ke_5 = 'OFF';
    }
    if ($thn_ttg == '1') {
      $thn_ke_1 = 'ON';
      $thn_ke_2 = 'OFF';
      $thn_ke_3 = 'OFF';
      $thn_ke_4 = 'OFF';
      $thn_ke_5 = 'OFF';
    }
    if ($thn_ttg == '2') {
      $thn_ke_1 = 'ON';
      $thn_ke_2 = 'ON';
      $thn_ke_3 = 'OFF';
      $thn_ke_4 = 'OFF';
      $thn_ke_5 = 'OFF';
    }
    if ($thn_ttg == '3') {
      $thn_ke_1 = 'ON';
      $thn_ke_2 = 'ON';
      $thn_ke_3 = 'ON';
      $thn_ke_4 = 'OFF';
      $thn_ke_5 = 'OFF';
    }
    if ($thn_ttg == '4') {
      $thn_ke_1 = 'ON';
      $thn_ke_2 = 'ON';
      $thn_ke_3 = 'ON';
      $thn_ke_4 = 'ON';
      $thn_ke_5 = 'OFF';
    }
    if ($thn_ttg == '5') {
      $thn_ke_1 = 'ON';
      $thn_ke_2 = 'ON';
      $thn_ke_3 = 'ON';
      $thn_ke_4 = 'ON';
      $thn_ke_5 = 'ON';
    }


    // START 01 //
    if ($thn_ke_1 == 'ON') {
      $_p_01 = $dt['ptg_'][1];
      if ($dt['Rate_'][1] == null) {
        $_rate_01 = 'null';
      }
      else {
        $_rate_01 = str_replace(',', '', $dt['Rate_'][1]);
      }
      if ($dt['loading_'][1] == null) {
        $_loading_01 = 'null';
      }
      else {
        $_loading_01 = str_replace(',', '', $dt['loading_'][1]);
      }
      if ($dt['RSCC_'][1] == null) {
        $_rscc_01 = 'null';
      }
      else {
        $_rscc_01 = str_replace(',', '', $dt['RSCC_'][1]);
      }
      if ($dt['teroris_'][1] == null) {
        $_teroris_01 = 'null';
      }
      else {
        $_teroris_01 = str_replace(',', '', $dt['teroris_'][1]);
      }
      if ($dt['Flood_'][1] == null) {
        $_flood_01 = 'null';
      }
      else {
        $_flood_01 = str_replace(',', '', $dt['Flood_'][1]);
      }
      if ($dt['Eq_'][1] == null) {
        $_eq_01 = 'null';
      }
      else {
        $_eq_01 = str_replace(',', '', $dt['Eq_'][1]);
      }
      if ($dt['bkl_'][1] == null) {
        $_bkl_01 = 'null';
      }
      else {
        $_bkl_01 = str_replace(',', '', $dt['bkl_'][1]);
      }
      if ($dt['derek_'][1] == null) {
        $_derek_01 = 'null';
      }
      else {
        $_derek_01 = str_replace(',', '', $dt['derek_'][1]);
      }
      if ($dt['komersil_'][1] == null) {
        $_komersil_01 = 'null';
      }
      else {
        $_komersil_01 = str_replace(',', '', $dt['komersil_'][1]);
      }
      // if ( $dt['stnk_'][1]     == null ) { $_stnk_01     = 'null'; } else { $_stnk_01     = str_replace(',','',$dt['stnk_'][1]);     }


      $qty_pass_01 = $dt['qty_pass_'][1];
      $si_driv_01 = $dt['si_driv'][1];
      $si_pass_01 = $dt['si_pass'][1];
      $tpl_01 = $dt['tpl_'][1];
      $deduc_01 = $dt['deduc_'][1];
      $Depre_01 = $dt['Depre_'][1];
      $_stnk_01 = $dt['stnk_'][1];


      if ($qty_pass_01 == null) {
        $qty_pass_01 = 'null';
      }
      else {
        $qty_pass_01 = str_replace(',', '', $qty_pass_01);
      }
      if ($si_driv_01 == null) {
        $si_driv_01 = 'null';
      }
      else {
        $si_driv_01 = str_replace(',', '', $si_driv_01);
      }
      if ($si_pass_01 == null) {
        $si_pass_01 = 'null';
      }
      else {
        $si_pass_01 = str_replace(',', '', $si_pass_01);
      }
      if ($tpl_01 == null) {
        $tpl_01 = 'null';
      }
      else {
        $tpl_01 = str_replace(',', '', $tpl_01);
      }
      if ($deduc_01 == null) {
        $deduc_01 = 'null';
      }
      else {
        $deduc_01 = str_replace(',', '', $deduc_01);
      }
      if ($Depre_01 == null) {
        $Depre_01 = 'null';
      }
      else {
        $Depre_01 = str_replace(',', '', $Depre_01);
      }
      if ($_stnk_01 == null) {
        $_stnk_01 = 'null';
      }
      else {
        $_stnk_01 = str_replace(',', '', $_stnk_01);
      }
    }
    else {
      $_p_01 = null;
      $_rate_01 = 'null';
      $_loading_01 = 'null';
      $_rscc_01 = 'null';
      $_teroris_01 = 'null';
      $_flood_01 = 'null';
      $_eq_01 = 'null';
      $_bkl_01 = 'null';
      $_derek_01 = 'null';
      $_komersil_01 = 'null';
      $_stnk_01 = 'null';

      $qty_pass_01 = 'null';
      $si_driv_01 = 'null';
      $si_pass_01 = 'null';
      $tpl_01 = 'null';
      $deduc_01 = 'null';
      $Depre_01 = 'null';
    }
    // END 01 //

    // START 02 //
    if ($thn_ke_2 == 'ON') {
      $_p_02 = $dt['ptg_'][2];
      if ($dt['Rate_'][2] == null) {
        $_rate_02 = 'null';
      }
      else {
        $_rate_02 = str_replace(',', '', $dt['Rate_'][2]);
      }
      if ($dt['loading_'][2] == null) {
        $_loading_02 = 'null';
      }
      else {
        $_loading_02 = str_replace(',', '', $dt['loading_'][2]);
      }
      if ($dt['RSCC_'][2] == null) {
        $_rscc_02 = 'null';
      }
      else {
        $_rscc_02 = str_replace(',', '', $dt['RSCC_'][2]);
      }
      if ($dt['teroris_'][2] == null) {
        $_teroris_02 = 'null';
      }
      else {
        $_teroris_02 = str_replace(',', '', $dt['teroris_'][2]);
      }
      if ($dt['Flood_'][2] == null) {
        $_flood_02 = 'null';
      }
      else {
        $_flood_02 = str_replace(',', '', $dt['Flood_'][2]);
      }
      if ($dt['Eq_'][2] == null) {
        $_eq_02 = 'null';
      }
      else {
        $_eq_02 = str_replace(',', '', $dt['Eq_'][2]);
      }
      if ($dt['bkl_'][2] == null) {
        $_bkl_02 = 'null';
      }
      else {
        $_bkl_02 = str_replace(',', '', $dt['bkl_'][2]);
      }
      if ($dt['derek_'][2] == null) {
        $_derek_02 = 'null';
      }
      else {
        $_derek_02 = str_replace(',', '', $dt['derek_'][2]);
      }
      if ($dt['komersil_'][2] == null) {
        $_komersil_02 = 'null';
      }
      else {
        $_komersil_02 = str_replace(',', '', $dt['komersil_'][2]);
      }
      // if ( $dt['stnk_'][2]     == null ) { $_stnk_02     = 'null'; } else { $_stnk_02     = str_replace(',','',$dt['stnk_'][2]);     }

      $qty_pass_02 = $dt['qty_pass_'][2];
      $si_driv_02 = $dt['si_driv'][2];
      $si_pass_02 = $dt['si_pass'][2];
      $tpl_02 = $dt['tpl_'][2];
      $deduc_02 = $dt['deduc_'][2];
      $Depre_02 = $dt['Depre_'][2];
      $_stnk_02 = $dt['stnk_'][2];

      if ($qty_pass_02 == null) {
        $qty_pass_02 = 'null';
      }
      else {
        $qty_pass_02 = str_replace(',', '', $qty_pass_02);
      }
      if ($si_driv_02 == null) {
        $si_driv_02 = 'null';
      }
      else {
        $si_driv_02 = str_replace(',', '', $si_driv_02);
      }
      if ($si_pass_02 == null) {
        $si_pass_02 = 'null';
      }
      else {
        $si_pass_02 = str_replace(',', '', $si_pass_02);
      }
      if ($tpl_02 == null) {
        $tpl_02 = 'null';
      }
      else {
        $tpl_02 = str_replace(',', '', $tpl_02);
      }
      if ($deduc_02 == null) {
        $deduc_02 = 'null';
      }
      else {
        $deduc_02 = str_replace(',', '', $deduc_02);
      }
      if ($Depre_02 == null) {
        $Depre_02 = 'null';
      }
      else {
        $Depre_02 = str_replace(',', '', $Depre_02);
      }
      if ($_stnk_02 == null) {
        $_stnk_02 = 'null';
      }
      else {
        $_stnk_02 = str_replace(',', '', $_stnk_02);
      }
    }
    else {
      $_p_02 = null;
      $_rate_02 = 'null';
      $_loading_02 = 'null';
      $_rscc_02 = 'null';
      $_teroris_02 = 'null';
      $_flood_02 = 'null';
      $_eq_02 = 'null';
      $_bkl_02 = 'null';
      $_derek_02 = 'null';
      $_komersil_02 = 'null';
      $_stnk_02 = 'null';

      $qty_pass_02 = 'null';
      $si_driv_02 = 'null';
      $si_pass_02 = 'null';
      $tpl_02 = 'null';
      $deduc_02 = 'null';
      $Depre_02 = 'null';
    }
    // END 02 //

    // START 03 //
    if ($thn_ke_3 == 'ON') {
      $_p_03 = $dt['ptg_'][3];
      if ($dt['Rate_'][3] == null) {
        $_rate_03 = 'null';
      }
      else {
        $_rate_03 = str_replace(',', '', $dt['Rate_'][3]);
      }
      if ($dt['loading_'][3] == null) {
        $_loading_03 = 'null';
      }
      else {
        $_loading_03 = str_replace(',', '', $dt['loading_'][3]);
      }
      if ($dt['RSCC_'][3] == null) {
        $_rscc_03 = 'null';
      }
      else {
        $_rscc_03 = str_replace(',', '', $dt['RSCC_'][3]);
      }
      if ($dt['teroris_'][3] == null) {
        $_teroris_03 = 'null';
      }
      else {
        $_teroris_03 = str_replace(',', '', $dt['teroris_'][3]);
      }
      if ($dt['Flood_'][3] == null) {
        $_flood_03 = 'null';
      }
      else {
        $_flood_03 = str_replace(',', '', $dt['Flood_'][3]);
      }
      if ($dt['Eq_'][3] == null) {
        $_eq_03 = 'null';
      }
      else {
        $_eq_03 = str_replace(',', '', $dt['Eq_'][3]);
      }
      if ($dt['bkl_'][3] == null) {
        $_bkl_03 = 'null';
      }
      else {
        $_bkl_03 = str_replace(',', '', $dt['bkl_'][3]);
      }
      if ($dt['derek_'][3] == null) {
        $_derek_03 = 'null';
      }
      else {
        $_derek_03 = str_replace(',', '', $dt['derek_'][3]);
      }
      if ($dt['komersil_'][3] == null) {
        $_komersil_03 = 'null';
      }
      else {
        $_komersil_03 = str_replace(',', '', $dt['komersil_'][3]);
      }
      // if ( $dt['stnk_'][3]     == null ) { $_stnk_03     = 'null'; } else { $_stnk_03     = str_replace(',','',$dt['stnk_'][3]);     }

      $qty_pass_03 = $dt['qty_pass_'][3];
      $si_driv_03 = $dt['si_driv'][3];
      $si_pass_03 = $dt['si_pass'][3];
      $tpl_03 = $dt['tpl_'][3];
      $deduc_03 = $dt['deduc_'][3];
      $Depre_03 = $dt['Depre_'][3];
      $_stnk_03 = $dt['stnk_'][3];

      if ($qty_pass_03 == null) {
        $qty_pass_03 = 'null';
      }
      else {
        $qty_pass_03 = str_replace(',', '', $qty_pass_03);
      }
      if ($si_driv_03 == null) {
        $si_driv_03 = 'null';
      }
      else {
        $si_driv_03 = str_replace(',', '', $si_driv_03);
      }
      if ($si_pass_03 == null) {
        $si_pass_03 = 'null';
      }
      else {
        $si_pass_03 = str_replace(',', '', $si_pass_03);
      }
      if ($tpl_03 == null) {
        $tpl_03 = 'null';
      }
      else {
        $tpl_03 = str_replace(',', '', $tpl_03);
      }
      if ($deduc_03 == null) {
        $deduc_03 = 'null';
      }
      else {
        $deduc_03 = str_replace(',', '', $deduc_03);
      }
      if ($Depre_03 == null) {
        $Depre_03 = 'null';
      }
      else {
        $Depre_03 = str_replace(',', '', $Depre_03);
      }
      if ($_stnk_03 == null) {
        $_stnk_03 = 'null';
      }
      else {
        $_stnk_03 = str_replace(',', '', $_stnk_03);
      }

    }
    else {
      $_p_03 = null;
      $_rate_03 = 'null';
      $_loading_03 = 'null';
      $_rscc_03 = 'null';
      $_teroris_03 = 'null';
      $_flood_03 = 'null';
      $_eq_03 = 'null';
      $_bkl_03 = 'null';
      $_derek_03 = 'null';
      $_komersil_03 = 'null';
      $_stnk_03 = 'null';

      $qty_pass_03 = 'null';
      $si_driv_03 = 'null';
      $si_pass_03 = 'null';
      $tpl_03 = 'null';
      $deduc_03 = 'null';
      $Depre_03 = 'null';
    }
    // END 03 //

    // START 04 //
    if ($thn_ke_4 == 'ON') {
      $_p_04 = $dt['ptg_'][4];
      if ($dt['Rate_'][4] == null) {
        $_rate_04 = 'null';
      }
      else {
        $_rate_04 = str_replace(',', '', $dt['Rate_'][4]);
      }
      if ($dt['loading_'][4] == null) {
        $_loading_04 = 'null';
      }
      else {
        $_loading_04 = str_replace(',', '', $dt['loading_'][4]);
      }
      if ($dt['RSCC_'][4] == null) {
        $_rscc_04 = 'null';
      }
      else {
        $_rscc_04 = str_replace(',', '', $dt['RSCC_'][4]);
      }
      if ($dt['teroris_'][4] == null) {
        $_teroris_04 = 'null';
      }
      else {
        $_teroris_04 = str_replace(',', '', $dt['teroris_'][4]);
      }
      if ($dt['Flood_'][4] == null) {
        $_flood_04 = 'null';
      }
      else {
        $_flood_04 = str_replace(',', '', $dt['Flood_'][4]);
      }
      if ($dt['Eq_'][4] == null) {
        $_eq_04 = 'null';
      }
      else {
        $_eq_04 = str_replace(',', '', $dt['Eq_'][4]);
      }
      if ($dt['bkl_'][4] == null) {
        $_bkl_04 = 'null';
      }
      else {
        $_bkl_04 = str_replace(',', '', $dt['bkl_'][4]);
      }
      if ($dt['derek_'][4] == null) {
        $_derek_04 = 'null';
      }
      else {
        $_derek_04 = str_replace(',', '', $dt['derek_'][4]);
      }
      if ($dt['komersil_'][4] == null) {
        $_komersil_04 = 'null';
      }
      else {
        $_komersil_04 = str_replace(',', '', $dt['komersil_'][4]);
      }
      // if ( $dt['stnk_'][4]     == null ) { $_stnk_04     = 'null'; } else { $_stnk_04     = str_replace(',','',$dt['stnk_'][4]);     }

      $qty_pass_04 = $dt['qty_pass_'][4];
      $si_driv_04 = $dt['si_driv'][4];
      $si_pass_04 = $dt['si_pass'][4];
      $tpl_04 = $dt['tpl_'][4];
      $deduc_04 = $dt['deduc_'][4];
      $Depre_04 = $dt['Depre_'][4];
      $_stnk_04 = $dt['stnk_'][4];

      if ($qty_pass_04 == null) {
        $qty_pass_04 = 'null';
      }
      else {
        $qty_pass_04 = str_replace(',', '', $qty_pass_04);
      }
      if ($si_driv_04 == null) {
        $si_driv_04 = 'null';
      }
      else {
        $si_driv_04 = str_replace(',', '', $si_driv_04);
      }
      if ($si_pass_04 == null) {
        $si_pass_04 = 'null';
      }
      else {
        $si_pass_04 = str_replace(',', '', $si_pass_04);
      }
      if ($tpl_04 == null) {
        $tpl_04 = 'null';
      }
      else {
        $tpl_04 = str_replace(',', '', $tpl_04);
      }
      if ($deduc_04 == null) {
        $deduc_04 = 'null';
      }
      else {
        $deduc_04 = str_replace(',', '', $deduc_04);
      }
      if ($Depre_04 == null) {
        $Depre_04 = 'null';
      }
      else {
        $Depre_04 = str_replace(',', '', $Depre_04);
      }
      if ($_stnk_04 == null) {
        $_stnk_04 = 'null';
      }
      else {
        $_stnk_04 = str_replace(',', '', $_stnk_04);
      }
    }
    else {
      $_p_04 = null;
      $_rate_04 = 'null';
      $_loading_04 = 'null';
      $_rscc_04 = 'null';
      $_teroris_04 = 'null';
      $_flood_04 = 'null';
      $_eq_04 = 'null';
      $_bkl_04 = 'null';
      $_derek_04 = 'null';
      $_komersil_04 = 'null';
      $_stnk_04 = 'null';

      $qty_pass_04 = 'null';
      $si_driv_04 = 'null';
      $si_pass_04 = 'null';
      $tpl_04 = 'null';
      $deduc_04 = 'null';
      $Depre_04 = 'null';
    }
    // END 04 //

    // START 05 //
    if ($thn_ke_5 == 'ON') {
      $_p_05 = $dt['ptg_'][5];
      if ($dt['Rate_'][5] == null) {
        $_rate_05 = 'null';
      }
      else {
        $_rate_05 = str_replace(',', '', $dt['Rate_'][5]);
      }
      if ($dt['loading_'][5] == null) {
        $_loading_05 = 'null';
      }
      else {
        $_loading_05 = str_replace(',', '', $dt['loading_'][5]);
      }
      if ($dt['RSCC_'][5] == null) {
        $_rscc_05 = 'null';
      }
      else {
        $_rscc_05 = str_replace(',', '', $dt['RSCC_'][5]);
      }
      if ($dt['teroris_'][5] == null) {
        $_teroris_05 = 'null';
      }
      else {
        $_teroris_05 = str_replace(',', '', $dt['teroris_'][5]);
      }
      if ($dt['Flood_'][5] == null) {
        $_flood_05 = 'null';
      }
      else {
        $_flood_05 = str_replace(',', '', $dt['Flood_'][5]);
      }
      if ($dt['Eq_'][5] == null) {
        $_eq_05 = 'null';
      }
      else {
        $_eq_05 = str_replace(',', '', $dt['Eq_'][5]);
      }
      if ($dt['bkl_'][5] == null) {
        $_bkl_05 = 'null';
      }
      else {
        $_bkl_05 = str_replace(',', '', $dt['bkl_'][5]);
      }
      if ($dt['derek_'][5] == null) {
        $_derek_05 = 'null';
      }
      else {
        $_derek_05 = str_replace(',', '', $dt['derek_'][5]);
      }
      if ($dt['komersil_'][5] == null) {
        $_komersil_05 = 'null';
      }
      else {
        $_komersil_05 = str_replace(',', '', $dt['komersil_'][5]);
      }
      // if ( $dt['stnk_'][5]     == null ) { $_stnk_05     = 'null'; } else { $_stnk_05     = str_replace(',','',$dt['stnk_'][5]);     }

      $qty_pass_05 = $dt['qty_pass_'][5];
      $si_driv_05 = $dt['si_driv'][5];
      $si_pass_05 = $dt['si_pass'][5];
      $tpl_05 = $dt['tpl_'][5];
      $deduc_05 = $dt['deduc_'][5];
      $Depre_05 = $dt['Depre_'][5];
      $_stnk_05 = $dt['stnk_'][5];

      if ($qty_pass_05 == null) {
        $qty_pass_05 = 'null';
      }
      else {
        $qty_pass_05 = str_replace(',', '', $qty_pass_05);
      }
      if ($si_driv_05 == null) {
        $si_driv_05 = 'null';
      }
      else {
        $si_driv_05 = str_replace(',', '', $si_driv_05);
      }
      if ($si_pass_05 == null) {
        $si_pass_05 = 'null';
      }
      else {
        $si_pass_05 = str_replace(',', '', $si_pass_05);
      }
      if ($tpl_05 == null) {
        $tpl_05 = 'null';
      }
      else {
        $tpl_05 = str_replace(',', '', $tpl_05);
      }
      if ($deduc_05 == null) {
        $deduc_05 = 'null';
      }
      else {
        $deduc_05 = str_replace(',', '', $deduc_05);
      }
      if ($Depre_05 == null) {
        $Depre_05 = 'null';
      }
      else {
        $Depre_05 = str_replace(',', '', $Depre_05);
      }
      if ($_stnk_05 == null) {
        $_stnk_05 = 'null';
      }
      else {
        $_stnk_05 = str_replace(',', '', $_stnk_05);
      }

    }
    else {
      $_p_05 = null;
      $_rate_05 = 'null';
      $_loading_05 = 'null';
      $_rscc_05 = 'null';
      $_teroris_05 = 'null';
      $_flood_05 = 'null';
      $_eq_05 = 'null';
      $_bkl_05 = 'null';
      $_derek_05 = 'null';
      $_komersil_05 = 'null';
      $_stnk_05 = 'null';

      $qty_pass_05 = 'null';
      $si_driv_05 = 'null';
      $si_pass_05 = 'null';
      $tpl_05 = 'null';
      $deduc_05 = 'null';
      $Depre_05 = 'null';
    }
    // END 05 //
  }
  // END cek special jika pilihthn_pertanggunan /   $thn_ttg     = $dt['thn_pertanggunan'];

  $d_debit = $dt['d_debit'];
  $d_credit = $dt['d_credit'];
  $tax = $dt['tax'];
  $ph21 = $dt['ph21'];
  if ($d_debit == null) {
    $d_debit = 'null';
  }
  else {
    $d_debit = str_replace(',', '', $d_debit);
  }
  if ($d_credit == null) {
    $d_credit = 'null';
  }
  else {
    $d_credit = str_replace(',', '', $d_credit);
  }
  if ($tax == null) {
    $tax = 'null';
  }
  else {
    $tax = str_replace(',', '', $tax);
  }
  if ($ph21 == null) {
    $ph21 = 'null';
  }
  else {
    $ph21 = str_replace(',', '', $ph21);
  }


  if ($dt['get_pt_or_private'] == 'COMPANY' and ($d_credit <> '' and $d_credit <> 'null')) {
    $tax23 = 2;
  }
  if ($dt['get_pt_or_private'] == 'PRIVATE' and ($d_credit <> '' and $d_credit <> 'null')) {
    $pph21 = 2.5;
  }
  if ($dt['get_pt_or_private'] == 'COMPANY' and ($d_credit == '' and $d_credit == 'null')) {
    $pph21 = null;
    $tax23 = null;
  }
  if ($dt['get_pt_or_private'] == 'PRIVATE' and ($d_credit == '' and $d_credit == "null")) {
    $pph21 = null;
    $tax23 = null;
  }


  if ($tax23 == null) {
    $tax23 = 'null';
  }
  else {
    $tax23 = str_replace(',', '', $tax23);
  }
  if ($pph21 == null) {
    $pph21 = 'null';
  }
  else {
    $pph21 = str_replace(',', '', $pph21);
  }

  $premi = $dt['premi'];
  $auto_premi = $dt['auto_premi'];
  if ($premi == null) {
    $premi = 'null';
  }
  else {
    $premi = str_replace(',', '', $premi);
  }
  if ($auto_premi == null) {
    $auto_premi = 'null';
  }
  else {
    $auto_premi = str_replace(',', '', $auto_premi);
  }

  $add_equip = $dt['add_equip'];
  $add_equip = str_replace("'", "\'", $dt['add_equip']);
  $add_equip = str_replace(";", ",", $add_equip);
  $non_std = $dt['non_std'];
  $remark = $dt['remark'];
  $remark = str_replace(";", ",", $remark);

  $subject_non_claim = $dt['subject_non_claim'];

  $R_G = substr($_no_regis, 0, 1);

  // echo $dt['tgl_conf_spp'];
  if ($dt['tgl_conf_spp'] <> '00-00-0000' and $R_G == 'P') {
    $date_awal = date("Y-m-d", strtotime($_tgl_awal));
    $date_sppa = date("Y-m-d", strtotime($dt['tgl_conf_spp']));
    $d1 = strtotime($date_sppa);
    $d2 = strtotime($date_awal);
    $get_stnc = ($d1 - $d2) / (60 * 60 * 24);
    // echo $get_stnc;

    if ($d1 > $d2) {
      if ($get_stnc < 3) {
        $subject_non_claim = 'Y';
      }
      // else                  { $subject_non_claim = '' ; }
    }
    // echo $subject_non_claim.'xxxx' ;
  }


  // echo $subject_non_claim;

  $stnk_beda_nama = $dt['stnk_beda_nama'];
  //$nama_stnk_beda   = $dt['nama_stnk_beda'];
  $nama_stnk_beda = str_replace("'", "\'", $dt['nama_stnk_beda']);


  if (empty($dt['nik_pt_person'])) {
    $_nik_pt_person = 'N';
  }
  else {
    $_nik_pt_person = 'Y';
  }

  $_agent_code = $dt['agent_code'];


  $_no_req_agen_apps = $dt['no_req_agen_apps'];
  $_agent_code_apps = $dt['agent_code_apps'];
  $_agent_name_apps = $dt['agent_name_apps'];

  $_info_for_uwd_app = $dt['info_for_uwd_app'];


  $_tgl_conf_spp = $dt['tgl_conf_spp'];  // yyyy-mm-dd
  $_p_orig = $dt['p_orig'];
  $_p_copy = $dt['p_copy'];
  $_p_duplicate = $dt['p_duplicate'];
  $_konf_tertulis = $dt['konf_tertulis'];
  $_note_uwd = $dt['note_uwd'];
  $_note_uwd_oth = $dt['note_uwd_oth'];

  $_fetch_company = $dt['fetch_company'];
  $_fetch_company_loc = $dt['fetch_company_loc'];
  $_ren_option = $dt['ren_option'];
  $_ren_insured_id = $dt['ren_insured_id'];
  $_ren_insured_id_loc = $dt['ren_insured_id_loc'];

  $qq_add = $dt['qq_add'];
  $qq_mobile_phone = $dt['qq_mobile_phone'];
  $qq2_add = $dt['qq2_add'];
  $qq2_mobile_phone = $dt['qq2_mobile_phone'];
  $nik_qq2 = $dt['nik_qq2'];

  //ren sob code
  $ren_sob_code = $dt['ren_sob_code'];

  $fetch_qq = $dt['fetch_qq'];
  $fetch_qq_loc = $dt['fetch_qq_loc'];

  $fetch_qq2 = $dt['fetch_qq2'];

  if (empty($dt['qq_pt_person'])) {
    $qq_pt_person = 'N';
  }
  else {
    $qq_pt_person = 'Y';
  }

  if (empty($dt['qq2_pt_person'])) {
    $qq2_pt_person = 'N';
  }
  else {
    $qq2_pt_person = 'Y';
  }

  // insert
  //=========
  if ($_no_regis == '') {
    // echo"$_no_regis";
    $tgl = date("d-m-Y");
    $dd1 = substr($tgl, 0, 2);
    $mm1 = substr($tgl, 3, 2);
    $yy1 = substr($tgl, 6, 4);

    if ($dt["insert_data_pol"]) {
      $perintah = "SELECT count(rowid) total from $table_use where date_format(tgl_buat,'%Y-%m') = '$yy1-$mm1' and SUBSTRING(register_id, 1, 1) = 'P' ";
    }

    if ($dt["insert_data_quo"]) {
      $perintah = "SELECT count(rowid) total from $table_use where date_format(tgl_buat,'%Y-%m') = '$yy1-$mm1' and SUBSTRING(register_id, 1, 1) = 'Q' ";
    }

    if ($dt["insert_data_simul"]) {
      $perintah = "SELECT count(rowid) total from $table_use where date_format(tgl_buat,'%Y-%m') = '$yy1-$mm1' and SUBSTRING(register_id, 1, 1) = 'S' ";
    }


    $rcount = $sqlbuilder->select('BIKE', $perintah);
    if ($rcount['status'] == 400) {
      return $rcount;
    }
    // $rcount = count($rcount['data']);
    $rowcount = str_pad($rcount['data'][0]['total'] + 1, 5, "0", STR_PAD_LEFT);

    // if  ($dt["insert_data_pol"])  //  INSERT_POLIS
    // {  $requestno = "P-$rowcount-$mm1-$yy1";  }
    //
    // if  ($dt["insert_data_quo"])  // INSERT_QUOTATION'
    // {  $requestno = "Q-$rowcount-$mm1-$yy1"; }
    //
    // if  ($dt["insert_data_simul"])  // INSERT_SIMULATION'
    // {  $requestno = "S-$rowcount-$mm1-$yy1"; }


    if ($dt["insert_data_pol"])  //  INSERT_POLIS
    {
      $requestno = "P-$rowcount-$mm1-$yy1-MCL";
    }

    if ($dt["insert_data_quo"])  // INSERT_QUOTATION'
    {
      $requestno = "Q-$rowcount-$mm1-$yy1-MCL";
    }

    if ($dt["insert_data_simul"])  // INSERT_SIMULATION'
    {
      $requestno = "S-$rowcount-$mm1-$yy1-MCL";
    }

    $datasa = [$requestno, $_unit_no];

    // insert ke table main data_polis
    $sql_enrty_m = "INSERT into $table_use
                    ( oleh_buat, tgl_buat, register_id, register_id_old, no_kontrak,
                      sob_code,corp_id,bus_code,
                      web_engine_class,wfh_id,wfh_group,wfh_id_ext,type_api,

                      mkg_group,mkg_member,mkg_officer,nik,customer_name,
                      nik_qq,qq,qq2,
                      customer_add,
                      kelurahan,kecamatan,kabupaten,province,

                      kode_post,mobile_phone,
                      tgl_awal,tgl_akhir,
                      ref_person,uwd_status,email,

                      wfh_group_wfh_id,ex_polis_no,
                      short_rate_metode,short_rate_value,code_short_rate,
                      nik_pt_person,code_agent,

                      admin_cost,wording_no,

                      agent_no_request, agent_code, agent_name, info_for_uwd_app,
                      tgl_conf_spp,
                      p_orig,p_copy,p_duplicate,konf_tertulis,note_uwd,note_uwd_oth,
                      fetch_company,fetch_company_loc,ren_option,ren_insured_id,ren_insured_id_loc,

                      qq_add,qq_mobile_phone,qq2_add,qq2_mobile_phone,nik_qq2,
                      fetch_qq,fetch_qq_loc,fetch_qq2, qq_pt_person, qq2_pt_person,
                      membership,membership_remark,
                      bukti_conf_sppa,uwclass, ren_sob_code,no_wa
                    )
                values
                    ( '$user_id', now(), '$requestno', '$_no_regis_old', '$_no_kontrak',
                      '$_sob_code','$corp','$bus_code',
                      '$web_engine_class','$wfh_id','$wfh_group','$wfh_group_ext','$type_api',

                      '$mkg_group','$mkg_member','$acc_officer','$nik','$cus_name',
                      '$nik_qq','$qq','$qq2',
                      '$cust_add',
                      '$kelurah','$kecamat','$kabupaten','$province',

                      '$kodepos','$cust_hp',
                      DATE(STR_TO_DATE('$_tgl_awal', '%d-%m-%Y')),DATE(STR_TO_DATE('$_tgl_akhir', '%d-%m-%Y')),
                      '$ref_person','APPL','$email',

                      '$wfh_group_wfh_id','$ex_polis_no',
                      '$_short_rate_metode', $_short_rate_value, '$_code_short_rate',
                      '$_nik_pt_person','$_agent_code',

                      '$adm_cost','$wording_no',

                      '$_no_req_agen_apps', '$_agent_code_apps', '$_agent_name_apps', '$_info_for_uwd_app',
                      DATE(STR_TO_DATE('$_tgl_conf_spp', '%d-%m-%Y')),
                      '$_p_orig','$_p_copy','$_p_duplicate','$_konf_tertulis','$_note_uwd','$_note_uwd_oth',
                      '$_fetch_company','$_fetch_company_loc','$_ren_option','$_ren_insured_id','$_ren_insured_id_loc',

                      '$qq_add','$qq_mobile_phone','$qq2_add','$qq2_mobile_phone','$nik_qq2',
                      '$fetch_qq', '$fetch_qq_loc', '$fetch_qq2', '$qq_pt_person', '$qq2_pt_person',
                      '$_membership','$_membership_remark',
                      '$_bukti_conf_sppa_Nama_File','AUTO','$ren_sob_code','$_no_wa'
                    )";
    //  ECHO "<br> $sql_enrty_m <br>";

    $hasil_enrty_m = $sqlbuilder->executeNoCommit('BIKE', $sql_enrty_m);
    if ($hasil_enrty_m['status'] == 400) {
      $sqlbuilder->rollback('BIKE');
      return $hasil_enrty_m;
    }


    // insert ke table detail unit data polis
    $sql_enrty_det = "INSERT into $table_use_det
                    ( oleh_buat, tgl_buat, register_id,jml_foto,

                      warna,
                      status_mobil,status_penggunaan,
                      survey_no,survey_report,tahun_buat,jam_survey,

                      no_mesin,no_rangka,no_polisi,
                      curr,sum_ins,tahun_cover,

                      disc_debit,disc_credit,tax,ph21,value_ph21,value_tax23,
                      total_premi,total_auto_premi,
                      add_equipment,non_standart,remark,

                      unit_no,make,cate,model,body_type_ojk,or_ctl_tlo,

                      per_tgg_01,rate_01,loading_01,rscc_01,teroris_01,flood_01,eq_01,bengkel_01,
                      si_driver_01,derek_01,komersil_01,si_pass_01,qty_pass_01,tpl_01,deduc_01,stnk_01,

                      per_tgg_02,rate_02,loading_02,rscc_02,teroris_02,flood_02,eq_02,bengkel_02,
                      si_driver_02,derek_02,komersil_02,si_pass_02,qty_pass_02,tpl_02,deduc_02,stnk_02,

                      per_tgg_03,rate_03,loading_03,rscc_03,teroris_03,flood_03,eq_03,bengkel_03,
                      si_driver_03,derek_03,komersil_03,si_pass_03,qty_pass_03,tpl_03,deduc_03,stnk_03,

                      per_tgg_04,rate_04,loading_04,rscc_04,teroris_04,flood_04,eq_04,bengkel_04,
                      si_driver_04,derek_04,komersil_04,si_pass_04,qty_pass_04,tpl_04,deduc_04,stnk_04,

                      per_tgg_05,rate_05,loading_05,rscc_05,teroris_05,flood_05,eq_05,bengkel_05,
                      si_driver_05,derek_05,komersil_05,si_pass_05,qty_pass_05,tpl_05,deduc_05,stnk_05,

                      subject_non_claim, stnk_beda_nama, nama_stnk_beda,

                      Depre_01,Depre_02,Depre_03,Depre_04,Depre_05,
                      wilayah_unit

                    )

                      values
                    ( '$user_id', now(), '$requestno','$_jml_foto',

                      '$warna',
                      '$status','$use_new',
                      '$survey_no','$survey_report','$tahun',STR_TO_DATE('$jam_survey', '%d-%m-%Y %H:%i:%s'),

                      '$no_mesin','$no_rangka','$plat',
                      '$curr',$sum_ins,'$thn_ttg',

                      $d_debit,$d_credit,$tax,$ph21,$pph21,$tax23,
                      $premi,$auto_premi,
                      '$add_equip','$non_std','$remark',

                      '$_unit_no', '$_make', '$_cate', '$_moda','$body_type_ojk', '$or_ctl_tlo',

                      '$_p_01', $_rate_01, $_loading_01, $_rscc_01, $_teroris_01, $_flood_01, $_eq_01, $_bkl_01,
                      $si_driv_01,$_derek_01, $_komersil_01, $si_pass_01, $qty_pass_01, $tpl_01, $deduc_01, $_stnk_01,

                      '$_p_02', $_rate_02, $_loading_02, $_rscc_02, $_teroris_02, $_flood_02, $_eq_02, $_bkl_02,
                      $si_driv_02,$_derek_02, $_komersil_02, $si_pass_02, $qty_pass_02, $tpl_02, $deduc_02, $_stnk_02,

                      '$_p_03', $_rate_03, $_loading_03, $_rscc_03, $_teroris_03, $_flood_03, $_eq_03, $_bkl_03,
                      $si_driv_03,$_derek_03, $_komersil_03, $si_pass_03, $qty_pass_03, $tpl_03, $deduc_03, $_stnk_03,

                      '$_p_04', $_rate_04, $_loading_04, $_rscc_04, $_teroris_04, $_flood_04, $_eq_04, $_bkl_04,
                      $si_driv_04,$_derek_04, $_komersil_04, $si_pass_04, $qty_pass_04, $tpl_04, $deduc_04, $_stnk_04,

                      '$_p_05', $_rate_05, $_loading_05, $_rscc_05, $_teroris_05, $_flood_05, $_eq_05, $_bkl_05,
                      $si_driv_05,$_derek_05, $_komersil_05, $si_pass_05, $qty_pass_05, $tpl_05, $deduc_05, $_stnk_05,

                      '$subject_non_claim', '$stnk_beda_nama', '$nama_stnk_beda',
                      $Depre_01,$Depre_02,$Depre_03,$Depre_04,$Depre_05,
                      '$wilayah_unit'
                    )";
    //ECHO "<br> $sql_enrty_det <br>";
    $hasil_enrty_det = $sqlbuilder->executeNoCommit('BIKE', $sql_enrty_det);
    if ($hasil_enrty_det['status'] == 400) {
      $sqlbuilder->rollback('BIKE');
      return $hasil_enrty_det;
    }

    // khusus ReEntry foto kesurakan khusus 1 unit
    {
      if (($_jml_foto != '0' or $_jml_foto != '') and $_no_regis_old != '') {
        $sql_foto_kerusakan =
          "INSERT INTO polis_agent_direct_foto
                     ( register_id, unit_no, urut,
                       type_foto,Nama_foto,tgl_buat,status
                     )
                 SELECT  '$requestno',unit_no, urut,
                         type_foto,Nama_foto,now(),'use'
                 FROM polis_agent_direct_foto
                 WHERE     register_id = '$_no_regis_old'
                       and status = 'use'
                 order by  urut ";

        //echo " <br> sql_foto_rusak --> $sql_foto_kerusakan <br>";
        $hasil_foto_kerusakan = $sqlbuilder->executeNoCommit('BIKE', $sql_foto_kerusakan);
        if ($hasil_foto_kerusakan['status'] == 400) {
          $sqlbuilder->rollback('BIKE');
          return $hasil_foto_kerusakan;
        }

      }
    }

    $_no_regis = $requestno;
  }
  // end insert yg pertama x
  else {
    $datasa = [$_no_regis, $_unit_no];
    // Update ke table data_polis main
    $sql_update = "UPDATE $table_use
                        set
                            oleh_update = '$user_id',
                            tgl_update  = now(),
                            no_kontrak  = '$_no_kontrak',

                            admin_cost = '$adm_cost',
                            wording_no = '$wording_no',

                            sob_code = '$_sob_code',
                            corp_id  = '$corp',

                            bus_code = '$bus_code',

                            web_engine_class  = '$web_engine_class',
                            wfh_id            = '$wfh_id',
                            wfh_group         = '$wfh_group',
                            wfh_group_wfh_id  = '$wfh_group_wfh_id',

                            wfh_id_ext  = '$wfh_group_ext',
                            ref_person  = '$ref_person',
                            ex_polis_no = '$ex_polis_no',
                            type_api    = '$type_api',

                            mkg_group     = '$mkg_group',
                            mkg_member    = '$mkg_member',
                            mkg_officer   = '$acc_officer',
                            nik           = '$nik',
                            customer_name = '$cus_name',

                            nik_qq = '$nik_qq',
                            qq     = '$qq',
                            qq2    = '$qq2',

                            customer_add    = '$cust_add',
                            kelurahan       = '$kelurah',
                            kecamatan       = '$kecamat',
                            kabupaten       = '$kabupaten',
                            province        = '$province',

                            kode_post    = '$kodepos',
                            mobile_phone = '$cust_hp',

                            tgl_awal     = DATE(STR_TO_DATE('$_tgl_awal', '%d-%m-%Y')),
                            tgl_akhir    = DATE(STR_TO_DATE('$_tgl_akhir', '%d-%m-%Y')),
                            email        = '$email',

                            short_rate_metode = '$_short_rate_metode',
                            short_rate_value  = $_short_rate_value,
                            code_short_rate   = '$_code_short_rate',
                            nik_pt_person     = '$_nik_pt_person',

                            code_agent        = '$_agent_code',
                            info_for_uwd_app  = '$_info_for_uwd_app',

                            tgl_conf_spp        = DATE(STR_TO_DATE('$_tgl_conf_spp', '%d-%m-%Y')),
                            p_orig              = '$_p_orig',
                            p_copy              = '$_p_copy',
                            p_duplicate         = '$_p_duplicate',
                            konf_tertulis       = '$_konf_tertulis',
                            note_uwd            = '$_note_uwd',
                            note_uwd_oth        = '$_note_uwd_oth',
                            fetch_company       = '$_fetch_company',
                            fetch_company_loc   = '$_fetch_company_loc',
                            ren_option          = '$_ren_option',
                            ren_insured_id      = '$_ren_insured_id',
                            ren_insured_id_loc  = '$_ren_insured_id_loc',

                            qq_add           = '$qq_add',
                            qq_mobile_phone  = '$qq_mobile_phone',
                            qq2_add          = '$qq2_add',
                            qq2_mobile_phone = '$qq2_mobile_phone',
                            nik_qq2          = '$nik_qq2',

                            fetch_qq            = '$fetch_qq',
                            fetch_qq_loc        = '$fetch_qq_loc',
                            fetch_qq2           = '$fetch_qq2',
                            qq_pt_person        = '$qq_pt_person',
                            qq2_pt_person       = '$qq2_pt_person',
                            membership          = '$_membership',
                            membership_remark   = '$_membership_remark',
                            bukti_conf_sppa     = '$_bukti_conf_sppa_Nama_File',
                            uwclass             = 'AUTO',
                            no_wa               = '$_no_wa'



                    where register_id = '$_no_regis' ";

    //echo"<br> update header -->$sql_update <br>";;
    $hasil_update = $sqlbuilder->executeNoCommit('BIKE', $sql_update);
    if ($hasil_update['status'] == 400) {
      $sqlbuilder->rollback('BIKE');
      return $hasil_update;
    }


    // cek unit nya ada brp ? utk pilih insert or update [ tobatt akalin krn berubah terus maunya, biar kagak recoding]
    //=================================================================================================================
    $perintah = "SELECT m.rowid,m.register_id register_id_mst,
                          u.register_id register_id_det, u.unit_no
                   from $table_use m,
                        $table_use_det u
                   where     m.register_id = '$_no_regis'
                         AND m.register_id = u.register_id   ";
    //echo"<br> update header -->$sql_update <br>";;
    $perintah_hasil = $sqlbuilder->select('BIKE', $perintah);
    if ($perintah_hasil['status'] == 400) {
      $sqlbuilder->rollback('BIKE');
      return $perintah_hasil;
    }
    $rcount = $perintah_hasil['data'];
    $rcount = count($perintah_hasil['data']);
    $rowcount = str_pad($rcount + 1, 3, "0", STR_PAD_LEFT);
    $unit_ins = $rowcount;

    // echo "<br>$_unit_no == $unit_ins <br> ";
    if ($_unit_no == $unit_ins) {
      // insert ke table data_polis_detail
      $sql_enrty_det = "INSERT into $table_use_det
                        ( oleh_buat, tgl_buat, register_id,jml_foto,

                          warna,
                          status_mobil,status_penggunaan,
                          survey_no,survey_report,tahun_buat,jam_survey,

                          no_mesin,no_rangka,no_polisi,
                          curr,sum_ins,tahun_cover,

                          disc_debit,disc_credit,tax,ph21,value_ph21,value_tax23,
                          total_premi,total_auto_premi,
                          add_equipment,non_standart,remark,

                          unit_no,make,cate,model,body_type_ojk,or_ctl_tlo,

                          per_tgg_01,rate_01,loading_01,rscc_01,teroris_01,flood_01,eq_01,bengkel_01,
                          si_driver_01,derek_01,komersil_01,si_pass_01,qty_pass_01,tpl_01,deduc_01,stnk_01,

                          per_tgg_02,rate_02,loading_02,rscc_02,teroris_02,flood_02,eq_02,bengkel_02,
                          si_driver_02,derek_02,komersil_02,si_pass_02,qty_pass_02,tpl_02,deduc_02,stnk_02,

                          per_tgg_03,rate_03,loading_03,rscc_03,teroris_03,flood_03,eq_03,bengkel_03,
                          si_driver_03,derek_03,komersil_03,si_pass_03,qty_pass_03,tpl_03,deduc_03,stnk_03,

                          per_tgg_04,rate_04,loading_04,rscc_04,teroris_04,flood_04,eq_04,bengkel_04,
                          si_driver_04,derek_04,komersil_04,si_pass_04,qty_pass_04,tpl_04,deduc_04,stnk_04,

                          per_tgg_05,rate_05,loading_05,rscc_05,teroris_05,flood_05,eq_05,bengkel_05,
                          si_driver_05,derek_05,komersil_05,si_pass_05,qty_pass_05,tpl_05,deduc_05,stnk_05,

                          subject_non_claim, stnk_beda_nama, nama_stnk_beda,
                          Depre_01,Depre_02,Depre_03,Depre_04,Depre_05,
                          wilayah_unit
                        )

                          values
                        ( '$user_id', now(), '$_no_regis','$_jml_foto',

                          '$warna',
                          '$status','$use_new',
                          '$survey_no','$survey_report','$tahun',STR_TO_DATE('$jam_survey', '%d-%m-%Y %H:%i:%s'),

                          '$no_mesin','$no_rangka','$plat',
                          '$curr',$sum_ins,'$thn_ttg',

                          $d_debit,$d_credit,$tax,$ph21,$pph21, $tax23,
                          $premi,$auto_premi,
                          '$add_equip','$non_std','$remark',

                          '$_unit_no', '$_make', '$_cate', '$_moda','$body_type_ojk','$or_ctl_tlo',

                          '$_p_01', $_rate_01, $_loading_01, $_rscc_01, $_teroris_01, $_flood_01, $_eq_01, $_bkl_01,
                          $si_driv_01,$_derek_01, $_komersil_01, $si_pass_01, $qty_pass_01, $tpl_01, $deduc_01, $_stnk_01,

                          '$_p_02', $_rate_02, $_loading_02, $_rscc_02, $_teroris_02, $_flood_02, $_eq_02, $_bkl_02,
                          $si_driv_02,$_derek_02, $_komersil_02, $si_pass_02, $qty_pass_02, $tpl_02, $deduc_02, $_stnk_02,

                          '$_p_03', $_rate_03, $_loading_03, $_rscc_03, $_teroris_03, $_flood_03, $_eq_03, $_bkl_03,
                          $si_driv_03,$_derek_03, $_komersil_03, $si_pass_03, $qty_pass_03, $tpl_03, $deduc_03, $_stnk_03,

                          '$_p_04', $_rate_04, $_loading_04, $_rscc_04, $_teroris_04, $_flood_04, $_eq_04, $_bkl_04,
                          $si_driv_04,$_derek_04, $_komersil_04, $si_pass_04, $qty_pass_04, $tpl_04, $deduc_04, $_stnk_04,

                          '$_p_05', $_rate_05, $_loading_05, $_rscc_05, $_teroris_05, $_flood_05, $_eq_05, $_bkl_05,
                          $si_driv_05,$_derek_05, $_komersil_05, $si_pass_05, $qty_pass_05, $tpl_05, $deduc_05, $_stnk_05,

                          '$subject_non_claim', '$stnk_beda_nama', '$nama_stnk_beda',
                          $Depre_01,$Depre_02,$Depre_03,$Depre_04,$Depre_05,
                          '$wilayah_unit'

                        )";
      // "<br>insert unit ke ? --> $sql_enrty_det <br>";
      $hasil_enrty_det = $sqlbuilder->executeNoCommit('BIKE', $sql_enrty_det);
      if ($hasil_enrty_det['status'] == 400) {
        $sqlbuilder->rollback('BIKE');
        return $hasil_enrty_det;
      }

    }
    else
    // update unit nya ( normal save / update ) aja krn tidak ada tambah unit
    {
      $sql_update_det = "UPDATE $table_use_det
                            set
                                oleh_update = '$user_id',
                                tgl_update  = now(),
                                jml_foto    = '$_jml_foto',

                                warna        = '$warna',

                                status_mobil      = '$status',
                                status_penggunaan = '$use_new',

                                survey_no     = '$survey_no',
                                survey_report = '$survey_report',
                                tahun_buat    = '$tahun',
                                jam_survey    = STR_TO_DATE('$jam_survey', '%d-%m-%Y %H:%i:%s'),

                                no_mesin  = '$no_mesin',
                                no_rangka = '$no_rangka',
                                no_polisi = '$plat',

                                curr        = '$curr',
                                sum_ins     = $sum_ins,
                                tahun_cover = '$thn_ttg',

                                disc_debit  = $d_debit,
                                disc_credit = $d_credit,
                                tax         = $tax,
                                ph21        = $ph21,
                                value_ph21  = $pph21,
                                value_tax23 = $tax23,

                                total_premi      = $premi,
                                total_auto_premi = $auto_premi,

                                add_equipment = '$add_equip',
                                non_standart  = '$non_std',
                                remark        = '$remark',

                                unit_no      = '$_unit_no',
                                make         = '$_make',
                                cate         = '$_cate',
                                model        = '$_moda',
                                body_type_ojk= '$body_type_ojk',
                                or_ctl_tlo   = '$or_ctl_tlo',

                                per_tgg_01   = '$_p_01',
                                rate_01      = $_rate_01,
                                loading_01   = $_loading_01,
                                rscc_01      = $_rscc_01,
                                teroris_01   = $_teroris_01,
                                flood_01     = $_flood_01,
                                eq_01        = $_eq_01,
                                bengkel_01   = $_bkl_01,
                                si_driver_01 = $si_driv_01,
                                derek_01     = $_derek_01,
                                komersil_01  = $_komersil_01,
                                si_pass_01   = $si_pass_01,
                                qty_pass_01  = $qty_pass_01,
                                tpl_01       = $tpl_01,
                                deduc_01     = $deduc_01,
                                stnk_01      = $_stnk_01,

                                per_tgg_02   = '$_p_02',
                                rate_02      = $_rate_02,
                                loading_02   = $_loading_02,
                                rscc_02      = $_rscc_02,
                                teroris_02   = $_teroris_02,
                                flood_02     = $_flood_02,
                                eq_02        = $_eq_02,
                                bengkel_02   = $_bkl_02,
                                si_driver_02 = $si_driv_02,
                                derek_02     = $_derek_02,
                                komersil_02  = $_komersil_02,
                                si_pass_02   = $si_pass_02,
                                qty_pass_02  = $qty_pass_02,
                                tpl_02       = $tpl_02,
                                deduc_02     = $deduc_02,
                                stnk_02      = $_stnk_02,

                                per_tgg_03   = '$_p_03',
                                rate_03      = $_rate_03,
                                loading_03   = $_loading_03,
                                rscc_03      = $_rscc_03,
                                teroris_03   = $_teroris_03,
                                flood_03     = $_flood_03,
                                eq_03        = $_eq_03,
                                bengkel_03   = $_bkl_03,
                                si_driver_03 = $si_driv_03,
                                derek_03     = $_derek_03,
                                komersil_03  = $_komersil_03,
                                si_pass_03   = $si_pass_03,
                                qty_pass_03  = $qty_pass_03,
                                tpl_03       = $tpl_03,
                                deduc_03     = $deduc_03,
                                stnk_03      = $_stnk_03,

                                per_tgg_04   = '$_p_04',
                                rate_04      = $_rate_04,
                                loading_04   = $_loading_04,
                                rscc_04      = $_rscc_04,
                                teroris_04   = $_teroris_04,
                                flood_04     = $_flood_04,
                                eq_04        = $_eq_04,
                                bengkel_04   = $_bkl_04,
                                si_driver_04 = $si_driv_04,
                                derek_04     = $_derek_04,
                                komersil_04  = $_komersil_04,
                                si_pass_04   = $si_pass_04,
                                qty_pass_04  = $qty_pass_04,
                                tpl_04       = $tpl_04,
                                deduc_04     = $deduc_04,
                                stnk_04      = $_stnk_04,

                                per_tgg_05   = '$_p_05',
                                rate_05      = $_rate_05,
                                loading_05   = $_loading_05,
                                rscc_05      = $_rscc_05,
                                teroris_05   = $_teroris_05,
                                flood_05     = $_flood_05,
                                eq_05        = $_eq_05,
                                bengkel_05   = $_bkl_05,
                                si_driver_05 = $si_driv_05,
                                derek_05     = $_derek_05,
                                komersil_05  = $_komersil_05,
                                si_pass_05   = $si_pass_05,
                                qty_pass_05  = $qty_pass_05,
                                tpl_05       = $tpl_05,
                                deduc_05     = $deduc_05,
                                stnk_05      = $_stnk_05,

                                subject_non_claim = '$subject_non_claim',
                                stnk_beda_nama    = '$stnk_beda_nama',
                                nama_stnk_beda    = '$nama_stnk_beda',

                                Depre_01 = $Depre_01,
                                Depre_02 = $Depre_02,
                                Depre_03 = $Depre_03,
                                Depre_04 = $Depre_04,
                                Depre_05 = $Depre_05,

                                wilayah_unit= '$wilayah_unit'

                            where     register_id = '$_no_regis'
                                  and unit_no     = '$_unit_no' ";

      //echo"<br> update detail unit sama --> $sql_update_det <br>";
      $hasil_update_det = $sqlbuilder->executeNoCommit('BIKE', $sql_update_det);
      if ($hasil_update_det['status'] == 400) {
        $sqlbuilder->rollback('BIKE');
        return $hasil_update_det;
      }

      // update detail survey_no
      $C_total_panel_role = $dt['total_panel_role'];
      //echo "xount --> ".   $C_total_panel_role ;
      for ($x = 1; $x <= $C_total_panel_role; $x++) {
        $sql_update_sur = "UPDATE $table_survey
                                      set
                                          panel_roles_sa = '$panel_roles_SA[$x]',
                                          oleh_update    = '$user_id',
                                          tgl_update     = now()
                                where     register_id       = '$_no_regis_asli'
                                      and unit_no           = '$_unit_no'
                                      and unit_hasil_survey = $x
                                      and survey_no         = '$survey_no'  ";
        //echo "xxxxxxxxxxxxxxxxxxx" . $sql_update_sur . "<br>";
        $hasil_update_sur = $sqlbuilder->executeNoCommit('BIKE', $sql_update_sur);
        if ($hasil_update_sur['status'] == 400) {
          $sqlbuilder->rollback('BIKE');
          return $hasil_update_sur;
        }
      }
    } //if ( $_unit_no == $unit_ins )  update detail unit sama


  } // end if insert

  $sqlbuilder->commit('BIKE');
  $result = [
    "status" => 200,
    "message" => 'simpan data berhasil',
    "data" => $datasa
  ];
  return $result;
}

?>