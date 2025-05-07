<?php
require_once(__DIR__ . '/../tcpdf/tcpdf.php');
use setasign\Fpdi;
require_once(__DIR__ . '/../fpdi/src/autoload.php');

require_once(__DIR__ . '/../fpdf/fpdf_protection.php');

function pdf_generate_old($sqlbuilder,$pk_data,$kelas,$source,$water_mark){
function mkg_group_by_location($mkg_group){
switch ($mkg_group) {
        case 'ROL':
            $corp = '01';
            break;

        case 'MKGROUP1':
            $corp = '01';
            break;

        case 'MKGROUP2':
            $corp = '01';
            break;

        case 'MKGROUP3A':
            $corp = '01';
            break;

        case 'MKGROUP4':
            $corp = '01';
            break;

        case 'MKGROUP5':
            $corp = '01';
            break;

        case 'MKGROUP6':
            $corp = '01';
            break;

        case 'MKGROUP7':
            $corp = '01';
            break;

        case 'MKGROUP8':
            $corp = '01';
            break;

        case 'MKGROUP11':
            $corp = '01';
            break;

        case 'MKGROUP12':
            $corp = '01';
            break;

        case '02-MKG06': // PONDOK INDAH
            $corp = '02';
            break;

        // BANDUNG
        case '03-JAMBI':
            $corp = '03';
            break;

        case '03-MKG02':
            $corp = '03';
            break;

        case '03-BDG01':
            $corp = '03';
            break;

        case '03-BDG02':
            $corp = '03';
            break;

        case '03-CIREBON':
            $corp = '03';
            break;

        case '04-MKG03':
            $corp = '04';
            break;

        case '05-MKG02':
            $corp = '05';
            break;

        case '06-MKG04':
            $corp = '06';
            break;

        case '07-MKG02':
            $corp = '07';
            break;

        // SURABAYA
        case '08-MKG04':
            $corp = '08';
            break;

        case '08-SBY1':
            $corp = '08';
            break;

        case '08-SBY2':
            $corp = '08';
            break;

        case '09-MKG05':
            $corp = '09';
            break;

        case '10-MKG04':
            $corp = '10';
            break;

        case '11-MKG05':
            $corp = '11';
            break;

        case '12-MKG04':
            $corp = '12';
            break;

        case '13-MKG03':
            $corp = '13';
            break;

        case '14-MKG01':
            $corp = '14';
            break;

        case '15-MKG03':
            $corp = '15';
            break;

        case '16-MKG01':
            $corp = '16';
            break;

        case '17-MKG01':
            $corp = '17';
            break;

        case '18-MKG01':
            $corp = '18';
            break;

        case '19-MKG01':
            $corp = '19';
            break;

        default:
            $corp = 'UNKNOWN_CORP';
            break;
        }

    return $corp;
}
function corp_id_detail($corp_id){
    switch ($corp_id) {
        case '01':
            $ket = 'Jakarta';
            $email = 'xxx';
            break;

        case '02':
            $ket = 'Jakarta';
            $email = 'jaksel@araksa.com';
            break;

        case '03':
            $ket = 'Bandung';
            $email = 'bandung@araksa.com';
            break;

        case '04':
            $ket = 'Palembang';
            $email = 'palembang@araksa.com';
            break;

        case '05':
            $ket = 'Medan';
            $email = 'medan@araksa.com';
            break;

        case '06':
            $ket = 'Semarang';
            $email = 'semarang@araksa.com';
            break;

        case '07':
            $ket = 'Pekanbaru';
            $email = 'pekanbaru@araksa.com';
            break;

        case '08':
            $ket = 'Surabaya';
            $email = 'surabaya@araksa.com';
            break;

        case '09':
            $ket = 'Malang';
            $email = 'malang@araksa.com';
            break;

        case '10':
            $ket = 'Bogor';
            $email = 'bogor@araksa.com';
            break;

        case '11':
            $ket = 'Solo';
            $email = 'solo@araksa.com';
            break;

        case '12':
            $ket = 'Denpasar';
            $email = 'denpasar@araksa.com';
            break;

        case '13':
            $ket = 'Tangerang';
            $email = 'tangerang@araksa.com';
            break;

        case '14':
            $ket = 'Lampung';
            $email = 'lampung@araksa.com';
            break;

        case '15':
            $ket = 'Balikpapan';
            $email = 'balikpapan@araksa.com';
            break;

        case '16':
            $ket = 'Makassar';
            $email = 'makassar@araksa.com';
            break;

        case '17':
            $ket = 'Banjarmasin';
            $email = 'banjarmasin@araksa.com';
            break;

        case '18':
            $ket = 'Yogyakarta';
            $email = 'yogyakarta@araksa.com';
            break;

        case '19':
            $ket = 'Bekasi';
            $email = 'bekasi@araksa.com';
            break;

        default:
            $ket = 'UNKNOWN';
            $email = 'UNKNOWN@UNKNOWN.com';
            break;
    }

    return array($ket,$email);
}
function mkg_group_detail($mkg_group){
    switch ($mkg_group) {
        case 'ROL':
            $email = 'raksaonline@araksa.com';
            break;

        case 'MKGROUP1':
            $email = 'Marketing1@araksa.com';
            break;

        case 'MKGROUP2':
            $email = 'Marketing2@araksa.com';
            break;

        case 'MKGROUP3A':
            $email = 'Marketing3@araksa.com';
            break;

        case 'MKGROUP4':
            $email = 'Marketing4@araksa.com';
            break;

        case 'MKGROUP5':
            $email = 'Marketing5@araksa.com';
            break;

        case 'MKGROUP6':
            $email = 'Marketing6@araksa.com';
            break;

        case 'MKGROUP7':
            $email = 'Marketing7@araksa.com';
            break;

        case 'MKGROUP8':
            $email = 'Marketing8@araksa.com';
            break;

        case 'MKGROUP11':
            $email = 'Marketing11@araksa.com';
            break;

        case 'MKGROUP12':
            $email = 'palem@araksa.com';
            break;

        default:
            $email = '___@___.com';
            break;
    }

    return $email;
}


$sql_mst   = "
                SELECT
                    m.register_id, m.mkg_group, m.mkg_officer, m.sob_code, m.bus_code, m.wfh_group_wfh_id,
                    d.unit_no, d.oleh_buat, d.tgl_buat, d.tgl_update, d.Policy_No, m.ex_polis_no,

                    m.customer_name, m.customer_add, m.sob_code, m.kode_post, m.qq, m.qq2, m.id_aegis_customer_name,

                    d.make, d.cate, d.model, d.no_polisi, d.no_mesin, d.no_rangka, d.warna, d.survey_no,
                    d.tahun_buat, d.status_penggunaan, d.status_mobil, d.add_equipment, d.remark_cantik,

                    m.tgl_awal, m.tgl_akhir, d.curr, d.sum_ins, d.remark,

                    d.loading_01, d.rate_01, d.per_tgg_01, d.rscc_01, d.teroris_01, d.flood_01, d.eq_01,
                    d.bengkel_01, d.si_driver_01, d.derek_01, d.komersil_01,
                    d.si_pass_01, d.qty_pass_01, d.tpl_01, d.deduc_01, d.Depre_01, d.stnk_01,
                    d.disc_debit, d.disc_credit, d.tax, d.ph21, d.tahun_cover,

                    m.short_rate_metode, m.short_rate_value, d.wilayah_unit AS wilayah

                FROM polis_agent_direct m JOIN polis_agent_direct_unit d
                ON m.register_id = d.register_id
                WHERE m.register_id = '$pk_data'
            ";
  $hasil_mst = $sqlbuilder->select('BIKE',$sql_mst);
  if($hasil_mst[status] == 400){
      $result =   [
          "status"    => 400,
          "message"   => $hasil_mst[message],
          "data"      => []
        ];
        return $result;  
  }
  $row_mst = $hasil_mst[data][0];

    $sql_sub   = "
                    SELECT type_foto, Nama_foto
                    FROM polis_agent_direct_foto
                    WHERE register_id = '$pk_data'
                ";

    $hasil_sub = $sqlbuilder->select('BIKE',$sql_sub);
    if($hasil_sub[status] == 400){
        $result =   [
            "status"    => 400,
            "message"   => $hasil_sub[message],
            "data"      => []
          ];
          return $result;  
    }
    $row_sub = $hasil_sub[data][0];

// --> GET SOB NAME
$sob_code = $row_mst[sob_code];

    $raw_data = array(
    "input_company_code"  =>  "$sob_code"
    );
  $url_api = "https://www.araksa.com/mks/entry/api/index.php/Wfh_Project/Wfh_Project_raw_data";
  $header = array('Content-Type: application/json');
  $jsonData = $sqlbuilder->api('POST',$url_api,json_encode($raw_data), $header);

  $sob_name = $jsonData[code][0][FULL_NAME];

// INTERNAL
$mkg_group    = $row_mst[mkg_group];
$bus_code     = $row_mst[bus_code];
$register_id  = $row_mst[register_id];
$unit_no      = $row_mst[unit_no];
$oleh_buat    = $row_mst[oleh_buat];
$ext_polis    = $row_mst[ex_polis_no];
$bus_source   = substr($row_mst[wfh_group_wfh_id],10);

$mkg_officer  = $row_mst[mkg_officer];

// if ($ext_polis != null) {
//     $ext_polis    = $row_mst[ex_polis_no];
// } else {
//     $ext_polis    = '-';
// }

if (strlen($ext_polis)>4) {
    $ext_polis    = $row_mst[ex_polis_no];
} else {
    $ext_polis    = '-';
}

$_api_joson   = 'mks_work_to_b';        // production
$data_api = array( "input_group_head" => $mkg_group );
$url_api = "https://raksa-service.com/" . $_api_joson . "/index.php/mks_api_person_name_mst/person_name_master_gh";
$header = array('Content-Type: multipart/form-data');
$data_unit = $sqlbuilder->api('POST',$url_api, $data_api, $header);


foreach ($data_unit[code] as $mks_data){

    if ($mkg_officer == $mks_data[PERSON_SHORT_NAME]) {
    // if ($mks_data->PERSON_SHORT_NAME == '') {
        # code...
        $mkg_short_name     = $mks_data[PERSON_SHORT_NAME] ;
        $mkg_full_name      = $mks_data[PERSON_FULL_NAME] ;
    // }
    }

}

// $tgl_order   = date('d-m-Y H:i:s');

$no_polis     = $row_mst[Policy_No];
if ($no_polis != null) {
    $no_polis             = $row_mst[Policy_No];
    $no_polis_corp_lokasi = substr($no_polis,0, 2);
} else if ($ext_polis){
    $no_polis             = '-';
    $no_polis_corp_lokasi = substr($ext_polis,0, 2);
}

// $daerah = corp_id_detail($no_polis_corp_lokasi);
// if ($daerah[1] == 'xxx') {
//  $daerah[1] = mkg_group_detail($mkg_group);
// } else if ($daerah[0] == 'UNKNOWN') {    // NEW

    $mkg_group_by_location = mkg_group_by_location($mkg_group);
    $daerah  = corp_id_detail($mkg_group_by_location);
    if ($daerah[1] == 'xxx') {
        $daerah[1] = mkg_group_detail($mkg_group);
    }

// }

// TERTANGGUNG
$tertanggung    = trim($row_mst[customer_name]);

$customer_code  = $row_mst[id_aegis_customer_name];
if ($customer_code != null) {
    $customer_code = $row_mst[id_aegis_customer_name];
} else {
    $customer_code = '-';
}

$alamat         = $row_mst[customer_add];
if ($alamat != null) {
    $alamat      = $row_mst[customer_add];
} else {
    $alamat      = '-';
}
// $sob_code        = $row_mst[sob_code];
$kode_post      = $row_mst[kode_post];

if ($kode_post != null) {
    $kode_post       = $row_mst[kode_post];
} else {
    $kode_post       = '-';
}

$qq1            = $row_mst[qq];
$qq2            = $row_mst[qq2];
if ($qq1) {
    $qq1         = $row_mst[qq];
} else {
    $qq1         = '-';
}

if ($qq2) {
    $qq2         = $row_mst[qq2];
} else {
    $qq2         = '-';
}

// KENDARAAN
$make              = $row_mst[make];
$category          = $row_mst[cate];
$model             = $row_mst[model];
$no_wilayah        = $row_mst[wilayah];
$no_polisi         = $row_mst[no_polisi];
$no_rangka         = $row_mst[no_rangka];
$no_mesin          = $row_mst[no_mesin];
$warna             = $row_mst[warna];
$survey_no         = $row_mst[survey_no];
$tahun_mobil       = $row_mst[tahun_buat];
$status_penggunaan = $row_mst[status_penggunaan];
$status_mobil      = $row_mst[status_mobil];
$loading_01	      =$row_mst['loading_01']." %";
$loading_01_polos	=$row_mst['loading_01'];

if ($survey_no != '' || $survey_no != null) {
    $survey_no = $row_mst[survey_no];
} else {
    $survey_no = '-';
}

$remark_cantik     = $row_mst[remark_cantik];
if ($remark_cantik) {
    $remark_cantik = trim($row_mst[remark_cantik]);
} else {
    $remark_cantik = '-';
}

$add_eq            = $row_mst[add_equipment];
if ($add_eq) {
    $add_eq = trim($row_mst[add_equipment]);
} else {
    $add_eq = '-';
}

$remark            = $row_mst[remark];
if ($remark) {
    $remark = $row_mst[remark];
} else {
    $remark = '-';
}

// PENUTUPAN
$tgl_awal           = date('d-m-Y',strtotime($row_mst[tgl_awal]));
$tgl_akhir          = date('d-m-Y',strtotime($row_mst[tgl_akhir]));
$short_rate_metode  = $row_mst[short_rate_metode];
$short_rate_value   = $row_mst[short_rate_value];
$tahun_cover        = $row_mst[tahun_cover];

$curr           = $row_mst[curr];
// $harga          = number_format($row_mst[sum_ins] , 0, ',', '.');
$harga          = $row_mst[sum_ins];
$harga_show     = number_format($row_mst[sum_ins], 0, ',', '.');
$eqs            = '-';
$eqs_p          = '';

$disc_debit     = $row_mst[disc_debit];
$disc_credit    = $row_mst[disc_credit];
$tax            = $row_mst[tax];
$biaya_admin    = number_format(60000 , 0, ',', '.');
$biaya_admin_polos  = 60000 ;

$rate_01        = $row_mst[rate_01];
if ($rate_01 > 0) {
    $rate_01 = $row_mst[rate_01]. ' %';
    $rate_01_polos = $row_mst[rate_01];
} else {
    $rate_01 = '-';
}

$per_tgg_01   = $row_mst[per_tgg_01];
if ($per_tgg_01 != null ) {
    if ($per_tgg_01 == 'ARK') {
        // $per_tgg_01 = 'COMPREHENSIVE';
        $per_tgg_01 = 'Comprehensive';
    $type_ass = 'ALL';

    } else {
        $per_tgg_01 = 'TLO';
    $type_ass = 'TLO';
    }
    // $per_tgg_01 = $row_mst[per_tgg_01];
} else {
    $per_tgg_01 = '-';
}

$rscc_01        = $row_mst[rscc_01];
if ($rscc_01 > 0) {
    $rscc_01 = $row_mst[rscc_01].' %';
    $rscc_01_polos = $row_mst[rscc_01];
} else {
    $rscc_01 = '-';
}

$teroris_01     = $row_mst[teroris_01];
if ($teroris_01 != null) {
    $teroris_01 = $row_mst[teroris_01].' %';
    $teroris_01_polos = $row_mst[teroris_01];
} else {
    $teroris_01 = '-';
}

$flood_01 = $row_mst[flood_01];
if ($flood_01 != null) {
    $flood_01 = $row_mst[flood_01].' %';
    $flood_01_polos = $row_mst[flood_01];
} else {
    $flood_01 = '-';
}

$eq_01 = $row_mst[eq_01];
if ($eq_01 != null) {
    $eq_01 = $row_mst[eq_01].' %';
    $eq_01_polos = $row_mst[eq_01];
} else {
    $eq_01 = '-';
}

$bengkel_01 = $row_mst[bengkel_01];
if ($bengkel_01 > 0) {
    $bengkel_01 = $row_mst[bengkel_01].' %';
    $bengkel_01_polos = $row_mst[bengkel_01];
} else {
    $bengkel_01 = '-';
}

$si_driver_01   = $row_mst[si_driver_01];
$rate_driver_01 = '';
if ($si_driver_01 != null) { // INT
    $si_driver_01 = $curr.' '. number_format($row_mst[si_driver_01] , 0, ',', '.');
    $si_driver_01_polos = $row_mst[si_driver_01];
    $rate_driver_01 = ' [ '.'0.5'.' % ]';
    $rate_driver_01_polos = 0.005;
    $rate_driver_01_polos_2 = '0.5 %';
} else {
    $si_driver_01 = '-';
    $rate_driver_01 = '';
}

$derek_01 = $row_mst[derek_01];
if ($derek_01 != null) {
    $derek_01 = $row_mst[derek_01].' %';
    $derek_01_polos = $row_mst[derek_01];
} else {
    $derek_01 = '-';
}

$komersil_01 = $row_mst[komersil_01];
if ($komersil_01 != null) {
    $komersil_01 = $row_mst[komersil_01].' %';
    $komersil_01_polos = $row_mst[komersil_01];
} else {
    $komersil_01 = '-';
}

$si_pass_01   = $row_mst[si_pass_01];
$qty_pass_01  = $row_mst[qty_pass_01];
$rate_pass_01 = '';

if ($si_pass_01 != null) {
    $si_pass_01 = $curr.' '.number_format($row_mst[si_driver_01] , 0, ',', '.');
    $si_pass_01_polos = $row_mst[si_pass_01];

    if ($qty_pass_01 != null) {
            $qty_pass_01 = ' [ '.$row_mst[qty_pass_01].' Orang ]';
            $rumus_pass_01       = $row_mst[qty_pass_01] * 0.1;
            $rumus_pass_01_persen = $row_mst[qty_pass_01] * 0.1. ' %';
            $rate_pass_01 = ' [ '.$rumus_pass_01.' % ]';
        } else {
            $qty_pass_01  = '';
            $rate_pass_01 = '';
        }

} else {
    $si_pass_01 = '-';
}

if ($tax != null) {
    $tax = $row_mst[tax].' %';
} else {
    $tax = '-';
}

if ($ph21 != null) {
    $ph21 = $row_mst[ph21].' %';
} else {
    $ph21 = '-';
}

if ($disc_debit > 0) {
    $disc_debit = $row_mst[disc_debit]. ' %';
} else {
    $disc_debit = 0;
}

if ($disc_credit > 0) {
    $disc_credit = $row_mst[disc_credit]. ' %';
} else {
    $disc_credit = '-';
}

// xxxx
$tpl_01 = $row_mst[tpl_01];


//STNK
  $stnk_01    = $row_mst[stnk_01];
  if ($stnk_01 > 0) {
    $stnk_01_polos = $row_mst[stnk_01];
  } else {
    $stnk_01 = '-';
  }
// if ($pk_data = 'Q-00184-09-2021') {
//  $tpl_01 = 15000000;
// }




// START GET RATE TPL
$kereta_api   = substr($row_mst[wfh_group_wfh_id],5,4);
// $make            = $row_mst[make];
// $category        = $row_mst[cate];
// $model           = $row_mst[model];
// $no_wilayah      = $row_mst[wilayah];

if ($no_wilayah == '01') {
    $wilayah = 'WILAYAH 1';
} else if ($no_wilayah == '02') {
    $wilayah = 'WILAYAH 2';
} else if ($no_wilayah == '03') {
    $wilayah = 'WILAYAH 3';
}

// $status_penggunaan    = $row_mst[status_penggunaan];

if ($status_penggunaan == 'PRIBADI') {
    $usage = 'PRIVATE';
} else if ($status_penggunaan == 'KOMERSIL') {
    $usage = 'COMMERCIAL';
}

// $per_tgg_01 = $row_mst[per_tgg_01];

// if ($per_tgg_01 == 'ARK') {
//     $type_ass = 'ALL';
// } else if ($per_tgg_01 == 'TLO') {
//     $type_ass = 'TLO';
// }

$usia_kendaraan = date('Y') - $row_mst[tahun_buat];

// $no_kereta_api         = '0010'; //  agent'0010', direct '0011', dealer '0012', rol '0017'
// $no_make             = 'SUZUKI';
// $no_cate             = 'CARRY';
// $no_model                = 'PICK UP 1.0 I';
// $no_wilayah          = 'WILAYAH 1';  // WILAYAH 1, WILAYAH 2, WILAYAH 3
// $no_usage                = 'PRIVATE';    // BUSINESS, COMMERCIAL, PRIVATE
// $no_type_ass       = 'ALL';        // ALL, TLO
// $no_usia_kendaraan   = '2';          // now() - tahun mobil


$data_api_rate = array(  "input_no_kereta" => $kereta_api,
                        "input_make"      => $make,
                        "input_cate"      => $category,
                        "input_model"     => $model,
                        "input_wilayah"   => $wilayah,
                        "input_usage"     => $usage,
                        "input_type_ass"  => $type_ass,
                        "input_usia_ken"  => $usia_kendaraan
                      );

$data_api = array( "input_group_head" => $mkg_group );
$url_api = "https://raksa-service.com/mks_work_to_b/index.php/mks_api_person_name_mst/data_rate_wfh";
$header = array('Content-Type: multipart/form-data');
$data_unit_rate = $sqlbuilder->api('POST',$url_api, $data_api_rate, $header);



$ojk_code = $data_unit_rate[rate][0][OJK_CODE];

// echo $ojk_code;
// exit;

if ($ojk_code == '001') {
    $rate_tpl_stage_1  =  0.01;
    $rate_tpl_stage_2  =  0.005;
    $rate_tpl_stage_3  =  0.0025;
}

if ($ojk_code == '002') {
    $rate_tpl_stage_1  =  0.015;
    $rate_tpl_stage_2  =  0.0075;
    $rate_tpl_stage_3  =  0.00375;
}

if ($ojk_code == '003') {
    $rate_tpl_stage_1  =  0.015;
    $rate_tpl_stage_2  =  0.0075;
    $rate_tpl_stage_3  =  0.00375;
}

$tpl_01_stage1 = 0;
$tpl_01_stage2 = 0;
$tpl_01_stage3 = 0;
$tpl_100jt       = 100000000;
$tpl_50jt        = 50000000;
$tpl_25jt        = 25000000;

if ($tpl_01 > $tpl_50jt && $tpl_01 <= $tpl_100jt) {
    $tpl_01_stage1 = $tpl_25jt * $rate_tpl_stage_1;
    $tpl_01_stage2 = $tpl_25jt * $rate_tpl_stage_2;
    $tpl_01_stage3 = ($tpl_01 - $tpl_50jt) * $rate_tpl_stage_3;
}
if ($tpl_01 > $tpl_25jt && $tpl_01 <= $tpl_50jt) {
    $tpl_01_stage1 = $tpl_25jt * $rate_tpl_stage_1;
    $tpl_01_stage2 = ($tpl_01 - $tpl_25jt) * $rate_tpl_stage_2;
}
if ($tpl_01 > 0 && $tpl_01 <= $tpl_25jt) {
    $tpl_01_stage1 = $tpl_01 * $rate_tpl_stage_1;
}

$tpl_01_total_stage = $tpl_01_stage1 + $tpl_01_stage2 + $tpl_01_stage3;

// END GET RATE TPL



// // START OLD TPL
// $tpl_01_stage1 = 0;
// $tpl_01_stage2 = 0;
// $tpl_01_stage3 = 0;
// $tpl_100jt = 100000000;
// $tpl_50jt  = 50000000;
// $tpl_25jt  = 25000000;
// if ($tpl_01 > $tpl_50jt && $tpl_01 <= $tpl_100jt) {
//  $tpl_01_stage1 = $tpl_25jt * 0.01;
//  $tpl_01_stage2 = $tpl_25jt * 0.005;
//  $tpl_01_stage3 = ($tpl_01 - $tpl_50jt) * 0.0025;
// }
// if ($tpl_01 > $tpl_25jt && $tpl_01 <= $tpl_50jt) {
//  $tpl_01_stage1 = $tpl_25jt * 0.01;
//  $tpl_01_stage2 = ($tpl_01 - $tpl_25jt) * 0.005;
// }
// if ($tpl_01 > 0 && $tpl_01 <= $tpl_25jt) {
//  $tpl_01_stage1 = $tpl_01 * 0.01;
// }

// $tpl_01_total_stage = $tpl_01_stage1 + $tpl_01_stage2 + $tpl_01_stage3;
// // END OLD TPL




if ($tpl_01 > 0) {
    $tpl_01             = $curr.' '.number_format($row_mst[tpl_01] , 0, ',', '.');
    $tpl_01_polos       = $row_mst[tpl_01];
    $tpl_01_rumus_polos = $tpl_01_total_stage;
    // $tpl_01_rate_persen  = '0.10000 %';
    $tpl_01_rumus_hasil = $curr.' '.number_format($tpl_01_rumus_polos , 0, ',', '.');
} else {
    $tpl_01         = '-';
}

$deduc_01       = $curr.' '.number_format($row_mst[deduc_01] , 0, ',', '.');
$Depre_01       = $row_mst[Depre_01];

$bulan = array ('Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
                );

$bln_default = date('m');
$digit_bln   = substr($bln_default, 0,1);

if ($digit_bln == 0) {
    $digit_bln = str_replace('0', '' ,$bln_default);
} else {
    $digit_bln = $bln_default;
}

$digit_bln_array = $digit_bln - 1;
$bulan_indo = $bulan[$digit_bln_array];

$tgl_default = date('d');
$digit_tgl   = substr($tgl_default, 0,1);

if ($digit_tgl == 0) {
    $digit_tgl = str_replace('0', '' ,$tgl_default);
} else {
    $digit_tgl = $tgl_default;
}

// require_once('tcpdf_include.php');

$pdf = new FPDF_Protection();
// $pdf->SetProtection(array('print'),'','mks');  // di password mks dan hanya bisa cetak aja

$pdf->SetProtection(array('print'),'','mks_mks123-MK$1122','ARCFOUR',128);  // 128bit RC4 di password mks dan hanya bisa cetak aja

$pdf->SetAuthor("PT Asuransi Raksa Pratikara");
$pdf->SetTitle("Quotation $pk_data");
$pdf->SetSubject("Perhitungan Quotation");
$pdf->SetKeywords("Raksa, Asuransi, Simulasi");


// class MYPDF extends TCPDF {
//     //Page header
//     public function Header() {
//         // get the current page break margin
//         $bMargin = $this->getBreakMargin();
//         // get current auto-page-break mode
//         $auto_page_break = $this->AutoPageBreak;
//         // disable auto-page-break
//         $this->SetAutoPageBreak(false, 0);
//         // set bacground image
//         $img_file = K_PATH_IMAGES.'image_demo.jpg';
//         $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
//         // restore auto-page-break status
//         $this->SetAutoPageBreak($auto_page_break, $bMargin);
//         // set the starting point for the page content
//         $this->setPageMark();
//     }
// }
// $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // ============================================================================================================== //
    // START PAGE 1 //
    $pdf->AddPage();
    $pdf->SetFont('Arial','',9);

    $nama_foto2 = __DIR__ .'/../pdf_compenent/kop_surat.jpg';
    // $pdf->Image($nama_foto2,0,0,-150); // 1275 x 1651
    // $this->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    $pdf->Ln(18);

    // $pdf->SetFont('Arial','B',12);
    // $pdf->Cell(0,5,'DATA TERTANGGUNG ',0,0,'');
    // $pdf->ln(5);
    // $pdf->Cell(190,0,'',1,0,'C');
    // $pdf->ln(3);

    $pdf->Cell(160,5,'Kepada Yth, ',0,0,'L');
    $pdf->Cell(30,5,$daerah[0].', '.$digit_tgl.' '.$bulan_indo.date(' Y'),0,0,'R');
    // $pdf->Cell(25,5,strftime('%d %B %Y',strtotime($tgl_order)),0,0,'R');
    $pdf->ln();
    $pdf->Cell(50,5,$tertanggung,0,0,'L');
    $pdf->ln();
    $pdf->MultiCell(130,5,$alamat,0,'J');
    $pdf->ln(4);

    if ($ext_polis != '-') {
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,5,'Perihal : Penawaran Perpanjangan Polis Asuransi No '.$ext_polis,0,0,'L');
        // $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(10,5,$ext_polis,0,0,'R');
        $pdf->ln(8);
    } else {
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,5,'Perihal : Penawaran Penutupan Asuransi Kendaraan Bermotor',0,0,'L');
        $pdf->ln(8);
    }

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(31,5,'Dengan hormat, ',0,0,'L');
    $pdf->ln(8);

    // $pdf->Cell(31,5,'Dengan ini kami ',0,0,'L');
    $pdf->MultiCell(180,5,'Dengan ini kami sampaikan Penawaran Asuransi Kendaraan Bermotor dengan syarat dan ketentuan sebagai berikut :',0,'J');
    $pdf->ln(4);

    $pdf->Cell(35,5,'Nama Tertanggung ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->Cell(70,5,$tertanggung,0,0,'L');
    $pdf->ln();

    if ($qq1 != '-') {
        $pdf->Cell(35,6,' ',0,0,'L');
        $pdf->Cell(3,6,'',0,0,'L');
        $pdf->Cell(20,6,'QQ',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(3,5,$qq1,0,0,'L');
        $pdf->ln();
    }

    if ($qq2 != '-') {
        $pdf->Cell(35,6,' ',0,0,'L');
        $pdf->Cell(3,6,'',0,0,'L');
        $pdf->Cell(20,6,'QQ',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(3,5,$qq2,0,0,'L');
        $pdf->ln();
    }


    $pdf->Cell(35,5,'Alamat ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    // $pdf->Cell(70,5,$alamat,0,0,'L');
    $pdf->MultiCell(150,5,$alamat,0,'J');
    // $pdf->ln(4);
    // $pdf->ln();

    $pdf->Cell(35,5,'Periode Asuransi',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');

    // if ($ext_polis == '-') {
    //     $pdf->Cell(70,5,'TBA',0,0,'L');
    // } else {
    //     $pdf->Cell(70,5,$tgl_awal.' s/d '.$tgl_akhir,0,0,'L');
    //     $pdf->ln();
    //     $pdf->Cell(38,5,'',0,0,'L');
    //     $pdf->Cell(70,5,'(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)',0,0,'L');
    // }

    $pdf->Cell(70,5,$tgl_awal.' s/d '.$tgl_akhir,0,0,'L');
    $pdf->ln();
    $pdf->Cell(38,5,'',0,0,'L');
    $pdf->Cell(70,5,'(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)',0,0,'L');

    // $pdf->Cell(70,5,$tgl_awal.' s/d '.$tgl_akhir,0,0,'L');
    // $pdf->MultiCell(140,5,$tgl_awal.' s/d '.$tgl_akhir,0,'J');

    // $pdf->ln();
    // $pdf->Cell(38,5,'',0,0,'L');
    // $pdf->Cell(70,5,'(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)',0,0,'L');

    $pdf->ln();

    $pdf->Cell(35,6,'Objek Pertanggungan ',0,0,'L');
    $pdf->Cell(3,6,': ',0,0,'L');
    $pdf->Cell(60,6,$make.'  '.$category.' '.$model.' , TAHUN '. $tahun_mobil. ' , '.$no_polisi ,0,0,'L');
    $pdf->ln();

    $pdf->Cell(35,6,' ',0,0,'L');
    $pdf->Cell(3,6,'',0,0,'L');
    $pdf->Cell(20,6,'No Rangka ',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->Cell(3,5,$no_rangka,0,0,'L');
    $pdf->ln();

    $pdf->Cell(35,6,' ',0,0,'L');
    $pdf->Cell(3,6,'',0,0,'L');
    $pdf->Cell(20,6,'No Mesin ',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->Cell(3,5,$no_mesin,0,0,'L');
    $pdf->ln();

    $pdf->Cell(35,6,' ',0,0,'L');
    $pdf->Cell(3,6,'',0,0,'L');
    $pdf->Cell(20,6,'Warna ',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->Cell(3,5,$warna,0,0,'L');
    $pdf->ln();

    $pdf->Cell(35,6,' ',0,0,'L');
    $pdf->Cell(3,6,'',0,0,'L');
    $pdf->Cell(20,6,'Penggunaan ',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->Cell(3,5,$status_penggunaan,0,0,'L');
    $pdf->ln(7);

    $pdf->Cell(35,5,'Harga Pertanggungan ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->Cell(60,5,$curr.' '.$harga_show,0,0,'L');
    $pdf->ln(7);

    $pdf->Cell(35,5,'Lingkup Jaminan',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->ln();

    $pdf->Cell(15,5,' ',0,0,'L');
    $pdf->Cell(3,5,'#',0,0,'L');
    $pdf->Cell(35,5,$per_tgg_01,0,0,'L');
    $pdf->ln();

    $pdf->Cell(18,5,' ',0,0,'L');
    $pdf->Cell(35,5,'Suku Premi',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->Cell(35,5,$rate_01,0,0,'L');
    $pdf->ln();

    //14 JULI 2022 => REQUEST BU SANDRA TAMPILKAN LOADING RATE DI BAWAH SUKU PREMI
    if($mkg_group=='DEMO') {
      $pdf->Cell(18,5,' ',0,0,'L');
      $pdf->Cell(35,5,'Loading Rate',0,0,'L');
      $pdf->Cell(3,5,':',0,0,'L');
      $pdf->Cell(35,5,$loading_01,0,0,'L');
      $pdf->ln();
    }


    $pdf->Cell(18,5,' ',0,0,'L');
    $pdf->Cell(35,5,'Resiko sendiri',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->Cell(60,5,$deduc_01. ' setiap kejadian ',0,0,'L');
    $pdf->ln(6);

    // START KONDISI PENUTUPAN//

    if ($derek_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Derek & Hotline Service 24 jam ',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$derek_01,0,0,'L');
        $pdf->ln(6);
    } else {
        $note_derek = 'Derek & Hotline Service 24 jam ';
    }

    if ($bengkel_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Bengkel Authorized',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$bengkel_01,0,0,'L');
        $pdf->ln(6);
    } else {
        $note_bengkel = 'Bengkel Authorized ';
    }

    if ($si_driver_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'PA Driver limit '.$curr.' '.number_format($si_driver_01_polos , 0, ',', '.'),0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$rate_driver_01_polos_2,0,0,'L');
        $pdf->ln(6);
    } else {
        $note_si_driver = 'PA Driver ';
    }

    if ($si_pass_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'PA Passanger limit '.$curr.' '.number_format(($si_pass_01_polos) , 0, ',', '.'). ' (per orang/ maksimum 4 orang)',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$rumus_pass_01_persen,0,0,'L');
        $pdf->ln(6);
    } else {
        $note_pa_pass = 'PA Passanger ';
    }


    if ($rscc_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Huru-Hara, Kerusuhan',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$rscc_01,0,0,'L');
        $pdf->ln(6);

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Resiko sendiri',0,0,'L');
        $pdf->Cell(3,5,': ',0,0,'L');
        $pdf->Cell(60,5,'10% dari nilai klaim yang disetujui, minimum '.' IDR 500.000 '.' setiap kejadian ',0,0,'L');
        $pdf->ln(6);
    } else {
        $note_rscc = 'RSCC ';
    }

    if ($flood_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Banjir, Angin Topan dan Badai ',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$flood_01,0,0,'L');
        $pdf->ln(6);

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Resiko sendiri',0,0,'L');
        $pdf->Cell(3,5,': ',0,0,'L');
        $pdf->Cell(60,5,'10% dari nilai klaim yang disetujui, minimum '.' IDR 500.000 '.' setiap kejadian ',0,0,'L');
        $pdf->ln(6);
    } else {
        $note_flood = 'Banjir ';
    }

    if ($eq_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Gempa Bumi, Letusan Gunung Berapi dan Tsunami ',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$eq_01,0,0,'L');
        $pdf->ln(6);

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Resiko sendiri',0,0,'L');
        $pdf->Cell(3,5,': ',0,0,'L');
        $pdf->Cell(60,5,'10% dari nilai klaim yang disetujui, minimum '.' IDR 500.000 '.' setiap kejadian ',0,0,'L');
        $pdf->ln(6);
    } else {
        $note_eq = 'Gempa Bumi ';
    }

    if ($teroris_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Terrorisme dan Sabotase',0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$teroris_01,0,0,'L');
        $pdf->ln(6);

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Resiko sendiri',0,0,'L');
        $pdf->Cell(3,5,': ',0,0,'L');
        $pdf->Cell(60,5,'10% dari nilai klaim yang disetujui, minimum '.' IDR 500.000 '.' setiap kejadian ',0,0,'L');
        $pdf->ln(6);
    } else {
        $note_terroris = 'Terrorisme, ';
    }


    if ($tpl_01 != '-') {
        $pdf->Cell(15,5,' ',0,0,'L');
        $pdf->Cell(3,5,'#',0,0,'L');
        $pdf->Cell(35,5,'Tanggung Jawab Hukum terhadap Pihak Ketiga limit s/d '.$curr.' '.number_format(($row_mst[tpl_01]) , 0, ',', '.'),0,0,'L');
        $pdf->ln();

        $pdf->Cell(18,5,' ',0,0,'L');
        $pdf->Cell(35,5,'Suku Premi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(35,5,$tpl_01_rumus_hasil,0,0,'L');
        $pdf->ln(6);
    } else {
        $note_tpl = 'TJH';
    }

        $pdf->ln(3);

    // END KONDISI PENUTUPAN//

    // $pdf->AddPage();
    $pdf->AddPage();

    $nama_foto2 = __DIR__ .'/../pdf_compenent/kop_surat.jpg';
    // $pdf->Image($nama_foto2,0,0,-150); // 1275 x 1651
    // $this->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    $pdf->Ln(20);

    $pdf->Cell(35,5,'Perhitungan Premi ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    // $pdf->Cell(60,5,,0,0,'L');
    $pdf->ln(8);

    // if ($per_tgg_01 == 'ARK') {
    //  $coverage = 'COMPREHENSIVE';
    // } else {
    //  $coverage = 'TLO';
    // }

    if ($short_rate_metode == 'Short_Rate') {
        $pembilang = round($row_mst[short_rate_value],2);
        $penyebut  = 100;
        $short_rate_value = $pembilang / $penyebut;
        $x = 'a';
    } else if ($short_rate_metode == 'Pro_Rate') {
        // // $hari = (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400;
        // $pembilang = round($row_mst[short_rate_value],2);
        // $penyebut  = round(( (strtotime($row_mst[tgl_akhir]. "+ ".$tahun_cover ."year") - strtotime($row_mst[tgl_awal])) / 86400),2);
        // $short_rate_value = $pembilang / $penyebut;
        // $x = 'b';
        
        $pembilang              = round($row_mst[short_rate_value],2);
        $tahun_default      = 365;
        $tgl_awal           = date("Y-m-d",     strtotime($row_mst['tgl_awal']));
        $tgl_awal_thn       = date("Y",         strtotime($tgl_awal));
        $tgl_awal_bln       = intval(date("m",  strtotime($tgl_awal)));
        if($tgl_awal_thn%400 == 0) {
          $tahun_default      = 366;
        }
        else if($tgl_awal_thn%100 == 0) {
          $tahun_default      = 365;
        }
        else if($tgl_awal_thn%4 == 0) {
          $tahun_default      = 366;
        }
        else {
          $tahun_default      = 365;
        }

        $start_date = date("d", strtotime($tgl_awal_thn));
        $one_year   = date("d", strtotime($tgl_awal_thn. '+365 days'));
        if($start_date <> $one_year) 
        {
            $tahun_default = 366;
        }
        else 
        {
            $tahun_default  = 365;
        }
        
        $short_rate_value = $pembilang / $tahun_default;
        $x = 'b';
    } else {
        $pembilang = round(( (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400),2);
        $penyebut  = round(( (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400),2);
        $short_rate_value = 1;
        $x = 'c';
    }

    //4 JULI 2022 => TAMBAH LOADING RATE
    {
      if($row_mst['loading_01']!=null && $row_mst['per_tgg_01']=="ARK") {
        $hasil_loading_01_polos									=$harga*($rate_01_polos/100 * $loading_01_polos/100);
        $tampilan_rumus_hasil_loading_01_polos	=($rate_01_polos+($rate_01_polos/100*$loading_01_polos/100)*100);
        // $tampilan_rumus_hasil_loading_01				=$tampilan_rumus_hasil_loading_01_polos." %";
        $tampilan_rumus_hasil_loading_01				=number_format((float)$tampilan_rumus_hasil_loading_01_polos, 5, '.', '')." %";
      }
      else {
        $hasil_loading_01_polos									=0;
        $tampilan_rumus_hasil_loading_01_polos	=0;
      }
      
      // // $hasil_rate_01 = number_format(($harga * $rate_01_polos * $short_rate_value * 100 * 100) , 0, ',', '.');
      // // $hasil_rate_01_polos = $harga * $rate_01_polos * $short_rate_value * 100 * 100;
      // $hasil_rate_01 = number_format(($hasil_loading_01_polos)+($harga * $rate_01_polos * $short_rate_value / 100 ) , 0, ',', '.');
      // $hasil_rate_01_polos = $hasil_loading_01_polos+($harga * $rate_01_polos * $short_rate_value / 100);

      // $hasil_rate_01 = number_format(($harga * $rate_01_polos * $short_rate_value * 100 * 100) , 0, ',', '.');
      // $hasil_rate_01_polos = $harga * $rate_01_polos * $short_rate_value * 100 * 100;
      $hasil_rate_01 = number_format(($hasil_loading_01_polos)+($harga * $rate_01_polos * $short_rate_value / 100 ) , 0, ',', '.');
      // $hasil_rate_01_polos = $hasil_loading_01_polos+($harga * $rate_01_polos * $short_rate_value / 100);
      $a = ($harga * $rate_01_polos  / 100);
      $b = ($a+$hasil_loading_01_polos)*$short_rate_value;
      // $hasil_rate_01_polos = $hasil_loading_01_polos+($harga * $rate_01_polos * $short_rate_value / 100);
      $hasil_rate_01_polos = $b;
      $hasil_rate_01 = number_format($hasil_rate_01_polos , 0, ',', '.');
    }


    // $test = 1000000000 * 0.0105 ;
    // echo $test."<br><br>";

    // echo $harga."<br>";
    // echo $rate_01_polos."<br>";
    // echo $short_rate_value."<br>";
    // echo $hasil_rate_01_polos."<br>";
    // exit;

    // 4 JULI 2022 => TAMPILAN JIKA LOADING RATE
    if($row_mst['loading_01']!= null && $row_mst['per_tgg_01']=="ARK") {
      // $pdf->SetFont("Helvetica","",9);
      // $pdf->Cell(24,5,$per_tgg_01,0,0,'R');
      // $pdf->Cell(3,6,' ',0,0,'R');
      // $pdf->Cell(46,5,$harga_show,0,0,'R');
      // $pdf->Cell(10,5,'X ',0,0,'R');
      // $pdf->Cell(5,5,' ',0,0,'R');
      // // $pdf->Cell(53,5,"($rate_01+($rate_01*$loading_01))",0,0,'R');
      // $pdf->Cell(15,5,$tampilan_rumus_hasil_loading_01,0,0,'R');
      // // // // $pdf->Cell(5,5,'X ',0,0,'L');
      // // // // $pdf->Cell(3,5,' ',0,0,'L');
      // // // // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');
      // $pdf->Cell(5,5,' ',0,0,'R');
      // $pdf->Cell(3,5,' ',0,0,'R');
      // $pdf->Cell(30,5,' ',0,0,'R');
      // $pdf->Cell(15,5,'= ',0,0,'R');
      // $pdf->Cell(3,5,' ',0,0,'R');
      // $pdf->Cell(8,5,$curr,0,0,'R');
      // $pdf->Cell(20,5,$hasil_rate_01,0,0,'R');
      // $pdf->ln(6);

      $pdf->Cell(24,5,$per_tgg_01,0,0,'R');
      $pdf->Cell(3,6,' ',0,0,'R');
      $pdf->Cell(46,5,$harga_show,0,0,'R');
      $pdf->Cell(10,5,'X ',0,0,'R');
      $pdf->Cell(5,5,' ',0,0,'R');
      $pdf->Cell(15,5,$tampilan_rumus_hasil_loading_01,0,0,'R');
      // $pdf->Cell(5,5,'X ',0,0,'L');
      // $pdf->Cell(3,5,' ',0,0,'L');
      // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');
      $pdf->Cell(5,5,' ',0,0,'R');
      $pdf->Cell(3,5,' ',0,0,'R');
      $pdf->Cell(30,5,' ',0,0,'R');
      $pdf->Cell(5,5,'= ',0,0,'R');
      $pdf->Cell(3,5,' ',0,0,'R');
      $pdf->Cell(8,5,$curr,0,0,'R');
      $pdf->Cell(20,5,$hasil_rate_01,0,0,'R');
      $pdf->ln(6);
    }
    else {
      $pdf->Cell(24,5,$per_tgg_01,0,0,'R');
      $pdf->Cell(3,6,' ',0,0,'R');
      $pdf->Cell(46,5,$harga_show,0,0,'R');
      $pdf->Cell(10,5,'X ',0,0,'R');
      $pdf->Cell(5,5,' ',0,0,'R');
      $pdf->Cell(15,5,$rate_01,0,0,'R');
      // $pdf->Cell(5,5,'X ',0,0,'L');
      // $pdf->Cell(3,5,' ',0,0,'L');
      // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');
      $pdf->Cell(5,5,' ',0,0,'R');
      $pdf->Cell(3,5,' ',0,0,'R');
      $pdf->Cell(30,5,' ',0,0,'R');
      $pdf->Cell(5,5,'= ',0,0,'R');
      $pdf->Cell(3,5,' ',0,0,'R');
      $pdf->Cell(8,5,$curr,0,0,'R');
      $pdf->Cell(20,5,$hasil_rate_01,0,0,'R');
      $pdf->ln(6);
    }

    $hasil_derek_01_polos       = 0;
    $hasil_bengkel_01_polos     = 0;
    $hasil_eqs_01_polos         = 0;
    $hasil_komersil_01_polos    = 0;
    $hasil_rscc_01_polos        = 0;
    $hasil_flood_01_polos       = 0;
    $hasil_eq_01_polos          = 0;
    $hasil_teroris_01_polos     = 0;
    $hasil_rate_tpl_01_polos    = 0;
    $hasil_rate_driver_01_polos = 0;
    $hasil_rate_pass_01_polos   = 0;

    if ($derek_01 != '-') {
        // $hasil_derek_01         =  number_format(($harga * $derek_01_polos / 100) , 0, ',', '.');
        // $hasil_derek_01_polos = $harga * $derek_01_polos / 100;
        
        $hasil_derek_01 =  number_format(($harga * $derek_01_polos * $short_rate_value / 100) , 0, ',', '.');
        $hasil_derek_01_polos =  $harga * $derek_01_polos * $short_rate_value / 100;

        // $pdf->Cell(50,5,'DRK',0,0,'L');
        $pdf->Cell(24,5,'Derek & Hotline Service',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$derek_01,0,0,'R');

        // $pdf->Cell(5,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_derek_01,0,0,'R');
        $pdf->ln(6);
    }

    if ($bengkel_01 != '-') {
        $hasil_bengkel_01 =  number_format(($harga * $bengkel_01_polos * $short_rate_value / 100) , 0, ',', '.');
        $hasil_bengkel_01_polos =  $harga * $bengkel_01_polos * $short_rate_value / 100;

        // $pdf->Cell(50,5,'BKL',0,0,'L');
        $pdf->Cell(24,5,'Bengkel Authorized',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$bengkel_01,0,0,'R');

        // $pdf->Cell(5,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_bengkel_01,0,0,'R');
        $pdf->ln(6);
    }

    if ($eqs_p != null) {
        $hasil_eqs_01 =  number_format(($harga * $eqs_p * $short_rate_value / 100) , 0, ',', '.');
        $hasil_eqs_01_polos = $harga * $eqs_p * $short_rate_value / 100;

        $pdf->Cell(24,5,'EQS',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$eqs_p,0,0,'R');

        // $pdf->Cell(10,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_eqs_01,0,0,'R');

        // $pdf->Cell(8,5,$curr,0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(3,5,$hasil_eqs_01,0,0,'L');
        $pdf->ln(6);
    }

    // if ($komersil_01 != '-') {
    //  $hasil_komersil_01 =  number_format(($harga * $komersil_01_polos * $short_rate_value * 100 * 100) , 0, ',', '.');
    //  $hasil_komersil_01_polos = $harga * $komersil_01_polos * $short_rate_value * 100 * 100;

    //  $pdf->Cell(50,5,'KOM',0,0,'L');
    //  $pdf->Cell(3,6,' ',0,0,'L');
    //  $pdf->Cell(25,5,$harga,0,0,'L');
    //  $pdf->Cell(5,5,'X ',0,0,'L');
    //  $pdf->Cell(3,5,' ',0,0,'L');
    //  $pdf->Cell(22,5,$komersil_01,0,0,'L');

    //  // $pdf->Cell(5,5,'X ',0,0,'L');
    //  // $pdf->Cell(3,5,' ',0,0,'L');
    //  // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

    //  $pdf->Cell(5,5,' ',0,0,'L');
    //  $pdf->Cell(3,5,' ',0,0,'L');
    //  $pdf->Cell(25,5,' ',0,0,'L');

    //  $pdf->Cell(5,5,'= ',0,0,'L');
    //  $pdf->Cell(3,5,' ',0,0,'L');
    //  $pdf->Cell(17,5,$curr,0,0,'L');
    //  $pdf->Cell(10,5,$hasil_komersil_01,0,0,'R');

    //  // $pdf->Cell(8,5,$curr,0,0,'L');
    //  // $pdf->Cell(3,5,' ',0,0,'L');
    //  // $pdf->Cell(15,5,$hasil_komersil_01,0,0,'L');
    //  $pdf->ln(6);
    // }

    if ($rscc_01 != '-') {
        $hasil_rscc_01 =  number_format(($harga * $rscc_01_polos * $short_rate_value / 100) , 0, ',', '.');
        $hasil_rscc_01_polos = $harga * $rscc_01_polos * $short_rate_value / 100;

        $pdf->Cell(24,5,'Huru hara',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$rscc_01,0,0,'R');

        // $pdf->Cell(10,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_rscc_01,0,0,'R');



        // $pdf->Cell(8,5,$curr,0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(15,5,$hasil_rscc_01,0,0,'R');
        $pdf->ln(6);
    }

    if ($flood_01 != '-') {
        $hasil_flood_01 = number_format(($harga * $flood_01_polos * $short_rate_value / 100) , 0, ',', '.');
        $hasil_flood_01_polos = $harga * $flood_01_polos * $short_rate_value / 100;


        $pdf->Cell(24,5,'Banjir',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$flood_01,0,0,'R');

        // $pdf->Cell(10,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_flood_01,0,0,'R');


        $pdf->ln(6);
    }

    if ($eq_01 != '-') {
        $hasil_eq_01 =  number_format(($harga * $eq_01_polos * $short_rate_value / 100) , 0, ',', '.');
        $hasil_eq_01_polos =  $harga * $eq_01_polos * $short_rate_value / 100;

        $pdf->Cell(24,5,'Gempa Bumi',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$eq_01,0,0,'R');

        // $pdf->Cell(10,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_eq_01,0,0,'R');


        $pdf->ln(6);
    }

    if ($teroris_01 != '-') {
        $hasil_teroris_01 =  number_format(($harga * $teroris_01_polos * $short_rate_value / 100) , 0, ',', '.');
        $hasil_teroris_01_polos =  $harga * $teroris_01_polos * $short_rate_value / 100;

        $pdf->Cell(24,5,'Terrorisme',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(46,5,$harga_show,0,0,'R');
        $pdf->Cell(10,5,'X ',0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(15,5,$teroris_01,0,0,'R');

        // $pdf->Cell(10,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(30,5,' ',0,0,'R');

        $pdf->Cell(5,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_teroris_01,0,0,'R');

        $pdf->ln(6);
    }

    if ($tpl_01 != '-') {
        $hasil_rate_tpl_01 = number_format(($tpl_01_total_stage * $short_rate_value) , 0, ',', '.');
        $hasil_rate_tpl_01_polos =  $tpl_01_total_stage * $short_rate_value  ;

        // $pdf->Cell(50,5,'TPL',0,0,'L');
        $pdf->Cell(50,5,'TJH Pihak Ketiga',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'R');
        $pdf->Cell(20,5,number_format($tpl_01_polos , 0, ',', '.'),0,0,'R');
        $pdf->Cell(50,5,' ',0,0,'R');

        $pdf->Cell(23,5,'= ',0,0,'R');
        $pdf->Cell(3,5,' ',0,0,'R');
        $pdf->Cell(8,5,$curr,0,0,'R');
        $pdf->Cell(20,5,$hasil_rate_tpl_01,0,0,'R');
        $pdf->ln(6);
    }

    if ($si_driver_01 != '-') {
        $hasil_rate_driver_01 = number_format(($si_driver_01_polos * $rate_driver_01_polos * $short_rate_value  ) , 0, ',', '.');
        $hasil_rate_driver_01_polos =  $si_driver_01_polos * $rate_driver_01_polos * $short_rate_value  ;


        $pdf->Cell(50,5,'PA Driver',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'L');
        $pdf->Cell(20,5,number_format($si_driver_01_polos , 0, ',', '.'),0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(5,5,'X ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(22,5,$rate_driver_01_polos_2,0,0,'L');

        // $pdf->Cell(5,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,' ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(25,5,' ',0,0,'L');

        $pdf->Cell(5,5,'= ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(17,5,$curr,0,0,'L');
        $pdf->Cell(11,5,$hasil_rate_driver_01,0,0,'R');
        $pdf->ln(6);
    }

    if ($si_pass_01 != '-') {
        $hasil_rate_pass_01 = number_format(($si_pass_01_polos * $rumus_pass_01 * $short_rate_value / 100) , 0, ',', '.');
        $hasil_rate_pass_01_polos =  $si_pass_01_polos * $rumus_pass_01 * $short_rate_value / 100 ;



        $pdf->Cell(50,5,'PA Pass',0,0,'L');
        $pdf->Cell(3,6,' ',0,0,'L');
        $pdf->Cell(20,5,number_format($si_pass_01_polos , 0, ',', '.'),0,0,'R');
        $pdf->Cell(5,5,' ',0,0,'R');
        $pdf->Cell(5,5,'X ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(22,5,$rumus_pass_01_persen,0,0,'L');
        $pdf->Cell(22,5,'0.1 %',0,0,'L');


        // $pdf->Cell(5,5,'X ',0,0,'L');
        // $pdf->Cell(3,5,' ',0,0,'L');
        // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

        $pdf->Cell(5,5,'X ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(25,5,$row_mst[qty_pass_01],0,0,'L');

        $pdf->Cell(5,5,'= ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(17,5,$curr,0,0,'L');
        $pdf->Cell(11,5,$hasil_rate_pass_01,0,0,'R');
        $pdf->ln(6);
    }

    if ($stnk_01 != '-') {
      $stnk_01_format = number_format(($stnk_01) , 0, ',', '.');
     
      $pdf->Cell(50,5,'STNK/BPKB',0,0,'L');
      $pdf->Cell(3,6,' ',0,0,'R');
      $pdf->Cell(20,5,number_format($stnk_01 , 0, ',', '.'),0,0,'R');
      $pdf->Cell(50,5,' ',0,0,'R');

      $pdf->Cell(23,5,'= ',0,0,'R');
      $pdf->Cell(3,5,' ',0,0,'R');
      $pdf->Cell(8,5,$curr,0,0,'R');
      $pdf->Cell(20,5,$stnk_01_format,0,0,'R');
      $pdf->ln(6);
    }

        $pdf->Cell(180,0,'',1,0,'C');
        $pdf->ln(2);

        $premi_polos =  $hasil_rate_01_polos + $hasil_derek_01_polos + $hasil_bengkel_01_polos + $hasil_eqs_01_polos +
                        $hasil_komersil_01_polos + $hasil_rscc_01_polos + $hasil_flood_01_polos + $hasil_eq_01_polos +
                        $hasil_teroris_01_polos +  $hasil_rate_driver_01_polos + $hasil_rate_pass_01_polos + $hasil_rate_tpl_01_polos + $stnk_01_polos;
        $premi =    number_format($premi_polos , 0, ',', '.');
        $pdf->Cell(141,5,'Premi',0,0,'L');
        $pdf->Cell(5,5,'= ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(17,5,$curr,0,0,'L');
        $pdf->Cell(11,5,$premi,0,0,'R');
        $pdf->ln();

        if ($disc_debit != null) {
            $hasil_diskon =  number_format(($premi_polos * $disc_debit / 100 ) , 0, ',', '.');
            $hasil_diskon_polos = $premi_polos * $disc_debit / 100;
            $pdf->Cell(50,5,'Diskon',0,0,'L');
            $pdf->Cell(3,6,' ',0,0,'L');
            $pdf->Cell(25,5,' ',0,0,'L');
            $pdf->Cell(5,5,' ',0,0,'L');
            $pdf->Cell(3,5,' ',0,0,'L');
            $pdf->Cell(22,5,number_format($disc_debit, 2).' %',0,0,'L');

            $pdf->Cell(10,5,' ',0,0,'L');
            $pdf->Cell(3,5,' ',0,0,'L');
            $pdf->Cell(20,5,'',0,0,'L');

            $pdf->Cell(5,5,'= ',0,0,'L');
            $pdf->Cell(3,5,' ',0,0,'L');
            $pdf->Cell(17,5,$curr,0,0,'L');
            $pdf->Cell(11,5,'- '.$hasil_diskon,0,0,'R');
            $pdf->ln();
        }

        $pdf->Cell(141,5,'Biaya Administrasi',0,0,'L');
        $pdf->Cell(5,5,'= ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(17,5,$curr,0,0,'L');
        $pdf->Cell(11,5,$biaya_admin,0,0,'R');
        $pdf->ln();

        $pdf->Cell(180,0,'',1,0,'C');
        $pdf->ln(2);

        $total_premi_polos = $premi_polos - $hasil_diskon_polos + $biaya_admin_polos;
        $total_premi = number_format($total_premi_polos , 0, ',', '.');
        $pdf->Cell(141,5,'Total Premi yang harus dibayar',0,0,'L');
        $pdf->Cell(5,5,'= ',0,0,'L');
        $pdf->Cell(3,5,' ',0,0,'L');
        $pdf->Cell(17,5,$curr,0,0,'L');
        $pdf->Cell(11,5,$total_premi,0,0,'R');
        $pdf->ln(10);

        if ($per_tgg_01 == 'Comprehensive') {

            $pdf->Cell(14,5,'Note',0,0,'L');
            $pdf->Cell(3,5,': ',0,0,'L');
            $pdf->Cell(3,5,'- ',0,'L');
            $pdf->MultiCell(167,5,'Kendaraan Tidak Disewakan atau Digunakan Sebagai Taxi Online atau Penggunaan Lain yang Mendapatkan Imbalan Jasa.',0,'J');

            // $pdf->Cell(14,5,'',0,0,'L');
            // $pdf->Cell(3,5,' ',0,0,'L');
            // $pdf->Cell(3,5,'- ',0,'L');
            // $pdf->MultiCell(167,5,'Penawaran ini tidak menjamin kerugian akibat : '.$note_rscc.$note_flood.$note_eq,0,'J');
            // $pdf->ln();

            if ($ext_polis == '-') {
                $pdf->Cell(14,5,'',0,0,'L');
                $pdf->Cell(3,5,' ',0,0,'L');
                $pdf->Cell(3,5,'- ',0,'L');
                $pdf->Cell(167,5,'Kendaraan Wajib Disurvey.',0,'L');
            }
                $pdf->ln(8);


        } else if ($per_tgg_01 == 'TLO'){

            $pdf->Cell(14,5,'Note',0,0,'L');
            $pdf->Cell(3,5,': ',0,0,'L');
            $pdf->Cell(3,5,'- ',0,'L');
            $pdf->MultiCell(167,5,'Kendaraan Tidak Disewakan atau Digunakan Sebagai Taxi Online atau Penggunaan Lain yang Mendapatkan Imbalan Jasa.',0,'J');
            // $pdf->ln();

            if ($ext_polis == '-') {
                $pdf->Cell(14,5,'',0,0,'L');
                $pdf->Cell(3,5,' ',0,0,'L');
                $pdf->Cell(3,5,'- ',0,'L');
                $pdf->Cell(167,5,'Kendaraan Wajib Disurvey.',0,'L');
            }

                $pdf->ln(8);

        }

        // $pdf->Cell(14,5,'Note',0,0,'L');
        // $pdf->Cell(3,5,': ',0,0,'L');
        // $pdf->MultiCell(170,5,'Kendaraan Tidak Disewakan atau Digunakan Sebagai Taxi Online atau Penggunaan Lain yang Mendapatkan Imbal Jasa. ',0,'J');
        // $pdf->ln(5);


        // $pdf->MultiCell(187,5,'Pembayaran premi dapat dilakukan melalui Transfer ke Rekening A/N PT. Asuransi Raksa Pratikara pada: BCA Cab. Suryopranoto A/C No. 261.300.983.3 (IDR) atau Bank Mandiri A/C No. 103.0099.610.871 (USD).',0,'J');
        // $pdf->ln(1);

        $pdf->MultiCell(187,5,'Kami informasikan bahwa Ringkasan Informasi Produk Asuransi Kendaraan Bermotor dapat Bapak/Ibu Unduh di www.araksa.com Ringkasan Produk.',0,'J');
        $pdf->ln(1);


        // $_user_id   = 'araksa.com';
        // $_user_pwd  = 'R@ks@!!##@@..';

        // $data_api_cabang  = array("in_user_id"    =>  $_user_id,
        //                           "in_user_pwd"   =>  $_user_pwd);

        // $web_unit = curl_init('https://raksa-service.com/mks_work_to_b/index.php/mks_api_list_cabang_mks/list_data_cabang');
        // curl_setopt($web_unit, CURLOPT_CUSTOMREQUEST , "POST");
        // curl_setopt($web_unit, CURLOPT_POSTFIELDS    , $data_api_cabang);
        // curl_setopt($web_unit, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($web_unit, CURLOPT_SSL_VERIFYPEER, false);
        // $result_unit  = curl_exec($web_unit);
        // $info_unit    = curl_getinfo($web_unit);
        // curl_close($web_unit);

        // $show = json_decode($result_unit);

        // foreach($show->list_cabang as $item)
        // {
        //    $_unit_01 = $item->ADDRESS;
        //    $_unit_02 = $item->PHONE_NO1;
        //    $_unit_03 = $item->LONGITUDE;
        //    $_unit_04 = $item->LATITUDE;
        //    $_unit_05 = $item->FAX;
        //    $_unit_06 = $item->EMAIL;
        //    $_unit_07 = $item->WA;
        //    $_unit_08 = $item->BRANCH_DESCRIPTION;

        //    $_unit_01 = str_replace(","," ",$_unit_01);
        //    $_unit_02 = str_replace(","," ",$_unit_02);
        //   // echo "<option value='$_unit_01,$_unit_02,$_unit_03,$_unit_04,$_unit_05,$_unit_06,$_unit_07'>$_unit_08 </option>";
        // }

        $_user_id   = 'araksa.com';
        $_user_pwd  = 'R@ks@!!##@@..';


        $data_api_cabang  = array("in_user_id"    =>  $_user_id,
                                  "in_user_pwd"   =>  $_user_pwd
                                );

        $web_unit = curl_init('https://202.152.50.222/mks_work_to_b/index.php/mks_api_list_cabang_mks/list_data_cabang');
        $header = array('Content-Type: multipart/form-data');
        $data_unit = $sqlbuilder->api('POST',$web_unit, $data_api_cabang, $header);

        // echo $data_unit;
        // exit;

        foreach ($data_unit[list_cabang] as $mks_cabang) {

            $corp_api = $mks_cabang[BRANCH_CODE];

            // echo  $mkg_group_by_location."<br>";
            // echo  $corp_api;
            // exit;

            if ($corp_api == $mkg_group_by_location) {
                $hp1      = $mks_cabang[PHONE_NO1];
                $hp2      = $mks_cabang[PHONE_NO2];
            }
            //  else {
            //  $hp1      = 'UNKNOWN NO HP';
            //  $hp2      = 'UNKNOWN NO HP';
            // }
        }

        $pdf->MultiCell(187,5,'Demikian surat penawaran ini kami sampaikan, apabila Bapak/Ibu ingin menanyakan lebih lanjut terkait penawaran ini atau telah menyetujui penawaran kami, Bapak/Ibu bisa menghubungi kami di '. $hp1 .' / '. $daerah[1].' untuk proses lebih lanjut.',0,'J');
        $pdf->ln(1);

        $pdf->MultiCell(180,5,'Kami ucapkan terima kasih atas kesempatan yang diberikan.',0,'J');
        $pdf->ln(3);
    // END PAGE 1 //


    // START PAGE 2 //
    // $pdf->AddPage();

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(31,5,'Hormat kami, ',0,0,'L');
    $pdf->ln(20);

    // $pdf->Cell(60,5,$oleh_buat,0,0,'L');
    $pdf->Cell(60,5,$mkg_full_name,0,0,'L');
    $pdf->ln(7);

    // $pdf->Cell(60,5,$mkg_group,0,0,'L');
    $pdf->Cell(60,5,'ACCOUNT OFFICER',0,0,'L');
    $pdf->ln(10);


    $pdf->Cell(31,5,'Catatan Penting',0,0,'L');
    $pdf->ln();


    $pdf->Cell(2,5,'-',0,0,'L');
    $pdf->Cell(5,5,' ',0,0,'L');
    // $pdf->Cell(150,5,' ',0,0,'J');
    // $pdf->MultiCell(180,5,'PT. Asuransi Raksa Pratikara terdaftar dan diawasi oleh OJK (Otoritas Jasa Keuangan).',0,'J');
    $pdf->MultiCell(180,5,'PT Asuransi Raksa Pratikara telah berizin dan diawasi oleh Otoritas Jasa Keuangan.',0,'J');
    

    $pdf->Cell(2,5,'-',0,0,'L');
    $pdf->Cell(5,5,' ',0,0,'L');
    // $pdf->Cell(150,5,' ',0,0,'J');
    $pdf->MultiCell(180,5,'Produk Asuransi Kendaraan Bermotor PT. Asuransi Raksa Pratikara telah disetujui oleh dan tercatat oleh OJK (Otoritas Jasa Keuangan).',0,'J');

        $pdf->Cell(2,5,'-',0,0,'L');
    $pdf->Cell(5,5,' ',0,0,'L');
    // $pdf->Cell(150,5,' ',0,0,'J');
    $pdf->MultiCell(180,5,'PT. Asuransi Raksa Pratikara akan merahasiakan setiap data / informasi yang diberikan oleh Pemohon baik yang diberikan atau disampaikan secara lisan, tertulis, atau yang disampaikan melalui media elektronik atau data / informasi dalam bentuk lainnya kecuali data-data atau informasi yang sudah merupakan informasi umum yang diperoleh dari media massa atau cetak maupun elektronik.',0,'J');
    // END PAGE 2 //


    // START PAGE 3 //
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);

    $nama_foto2 = __DIR__ .'/../pdf_compenent/kop_surat.jpg';
    // $pdf->Image($nama_foto2,0,0,-150); // 1275 x 1651
    $pdf->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

    $pdf->Ln(20);

    $pdf->SetDrawColor(0,0,0);          //buat border
    $pdf->SetFillColor(212, 218, 221);  //isi dalam border
    $pdf->SetTextColor(0,0,0);      //warna textnya
    $pdf->SetLineWidth(0.5);
    $pdf->Cell(0,8,'SURAT PERNYATAAN PENUTUPAN ASURANSI',0,0,'C');
    $pdf->Ln(15);


    $pdf->SetFont('Arial','',9);
    $pdf->Cell(35,6,'Objek Pertanggungan ',0,0,'L');
    $pdf->Cell(3,6,': ',0,0,'L');
    $pdf->Cell(60,6,$make.'  '.$category.' '.$model.',  TAHUN '. $tahun_mobil. ',  '.$no_polisi ,0,0,'L');
    $pdf->ln(8);

    $pdf->Cell(35,5,'Harga Pertanggungan ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->Cell(60,5,$curr.' '.$harga_show,0,0,'L');
    $pdf->ln(8);

    $pdf->Cell(35,5,'Anywhere ID ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->Cell(60,5,$pk_data,0,0,'L');
    $pdf->ln(8);

    $pdf->Cell(35,5,'Yang bertandatangan dibawah ini ',0,0,'L');
    $pdf->ln(10);

    $pdf->Cell(40,5,'Nama ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->ln(8);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,'No. KTP ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');;
    $pdf->ln(3);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(31,5,'(diisi untuk asuransi individu)',0,0,'L');
    $pdf->ln();

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,'Jabatan ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->ln(3);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(31,5,'(diisi untuk asuransi individu)',0,0,'L');
    $pdf->ln();

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,'Perusahaan ',0,0,'L');
    $pdf->Cell(3,5,': ',0,0,'L');
    $pdf->Cell(60,5,'',0,0,'L');
    $pdf->ln(3);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(31,5,'(diisi untuk asuransi individu)',0,0,'L');
    $pdf->ln(10);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(2,5,'1. ',0,0,'L');
    $pdf->Cell(5,5,' ',0,0,'L');
    $pdf->MultiCell(180,5,'Saya/Kami telah membaca, mengerti dan menyetujui penawaran yang diajukan oleh PT. Asuransi Raksa Pratikara selaku Penanggung untuk penutupan risiko tersebut diatas.',0,'J');

    $pdf->Cell(2,5,'2. ',0,0,'L');
    $pdf->Cell(5,5,' ',0,0,'L');
    $pdf->MultiCell(180,5,'Saya/Kami telah membaca dan memahami produk yang dipilih termasuk biaya, manfaat, pengecualian dan ketentuan tambahan lainnya.',0,'J');

    $pdf->Cell(2,5,'3. ',0,0,'L');
    $pdf->Cell(5,5,' ',0,0,'L');
    // $pdf->Cell(150,5,' ',0,0,'J');
    $pdf->MultiCell(180,5,'Saya/Kami menetapkan Nilai Pertanggungan (Sum Insured) sebagaimana di atas atau terlampir dan menyatakan telah mengerti mengenai ketentuan penetapan Nilai Pertanggungan pada polis dan konsekwensi bila nilai pertanggungan tersebut lebih rendah dari yang disyaratkan polis.',0,'J');
    $pdf->ln(8);

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(150,5,'Demikian surat pernyataan ini Saya/Kami buat dengan sebenar-benarnya dan dengan keadaan sadar tanpa paksaan.',0,0,'J');
    $pdf->ln(8);
    $pdf->Cell(27,5,'Tempat / Tanggal',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->Cell(20,5,'____________________ / ____________________',0,0,'L');
    $pdf->ln(12);

    $pdf->Cell(4,5,' ',0,0,'L');
    $pdf->Cell(3,5,'Yang Membuat Pernyataan ',0,0,'L');
    $pdf->ln();
    $pdf->Cell(15,5,'',0,0,'L');
    $pdf->Cell(23,5,'TTD & Cap',0,0,'L');
    $pdf->ln(20);
    $pdf->Cell(20,5,'. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .',0,0,'L');
    $pdf->ln();
    $pdf->Cell(23,5,'Nama Jelas',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->ln();
    $pdf->Cell(23,5,'Jabatan',0,0,'L');
    $pdf->Cell(3,5,':',0,0,'L');
    $pdf->ln(20);
    // END PAGE 3 //


    // SETUP NAMA FILE NYA
    //-------------------------------

    date_default_timezone_set("Asia/Jakarta");
    $dateObj = DateTime::createFromFormat('U.u', microtime(TRUE));
    $dateObj->setTimeZone(new DateTimeZone('Asia/Jakarta'));
    $file_pdf  = md5(md5(md5($dateObj->format('YmdHisu'))));


    $file_qou      = $pk_data . "_" . $file_pdf  . ".pdf";
    $folder_qou     = $_SERVER['DOCUMENT_ROOT'] . 'mks/entry/bike/api/files/pdf/Quo_pdf/';
    $file_name_pdf = $folder_qou . $file_qou;
    $pdf->Output( $file_name_pdf ,'F');

    $q_sel= "   SELECT a.uwd_file_pdf
                FROM
                    polis_agent_direct a
                WHERE
                    a.register_id    = '$pk_data' 
            ";
      $hasil_sel = $sqlbuilder->select('BIKE',$q_sel);
      if($hasil_sel[status] == 400){
          $result =   [
              "status"    => 400,
              "message"   => $hasil_sel[message],
              "data"      => []
            ];
            return $result;  
      }
    $result_q_sel   = $hasil_sel[data][0];
    $uwd_file_pdf   =$result_q_sel['uwd_file_pdf'];

    if(strlen($uwd_file_pdf)>0) 
    {
        unlink($uwd_file_pdf);
    }
    // unlink('image/Auto/Quo_pdf/Q-00011-07-2022_147950a180ef86ebb9867cbee6f03341.pdf');
    
    $sql_update  = "UPDATE polis_agent_direct m
                        set
                            m.uwd_file_pdf   = '$file_name_pdf'
                    where m.register_id    = '$pk_data'        ";
    $hasil_update = $sqlbuilder->executeCommit('BIKE',$sql_update);
    if($hasil_update[status] == 400){
      $result =   [
          "status"    => 400,
          "message"   => $hasil_update[message],
          "data"      => []
        ];
        return $result;  
      }
    $link         ='https://'.$_SERVER['SERVER_NAME'].'/mks/entry/bike/api/files/pdf/Quo_pdf/'.$file_qou;
    $b64Doc       = chunk_split(base64_encode(file_get_contents($file_name_pdf)));

      $return_quot = array(
        "status"  =>  200,
        "message"  =>  "Sukses",
        "link"    =>   $link, 
        "encode"  =>   $b64Doc
        );

    return $return_quot;

    
}