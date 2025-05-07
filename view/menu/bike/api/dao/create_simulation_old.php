<?php
require_once(__DIR__ . '/../tcpdf/tcpdf.php');
use setasign\Fpdi;
require_once(__DIR__ . '/../fpdi/src/autoload.php');

function pdf_simulation_old($sqlbuilder,$register_id,$kelas,$source,$water_mark){

// https://www.araksa.com/mks/entry/pdf_create_quotation_v3.php
  
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

        default:
            $email = '___@___.com';
            break;
    }

    return $email;
}

// Page footer
function Footer($mkg_group)
{
    $pdf= new PDF();
    // Position at 1.5 cm from bottom
    $pdf->SetY(-1);
    // helvetica italic 8
    $pdf->SetFont('helvetica','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$mkg_group,0,0,'L');
}


$sql_mst   = "
SELECT
  m.register_id, m.mkg_group, m.mkg_officer, m.sob_code, m.bus_code, m.wfh_group_wfh_id,
  d.unit_no, d.oleh_buat, d.tgl_buat, d.tgl_update, d.Policy_No, m.ex_polis_no, d.wilayah_unit AS wilayah,

  m.customer_name, m.customer_add, m.sob_code, m.kode_post, m.qq, m.qq2, m.id_aegis_customer_name,

  d.make, d.cate, d.model, d.no_polisi, d.no_mesin, d.no_rangka, d.warna, d.survey_no,
  d.tahun_buat, d.status_penggunaan, d.status_mobil, d.add_equipment, d.remark_cantik,

  m.tgl_awal, m.tgl_akhir, d.curr, d.sum_ins, d.remark,

  d.loading_01, d.rate_01, d.per_tgg_01, d.rscc_01, d.teroris_01, d.flood_01, d.eq_01,
  d.bengkel_01, d.si_driver_01, d.derek_01, d.komersil_01,
  d.si_pass_01, d.qty_pass_01, d.tpl_01, d.deduc_01, d.Depre_01, d.stnk_01,
  d.disc_debit, d.disc_credit, d.tax, d.ph21, d.tahun_cover,

  m.short_rate_metode, m.short_rate_value

FROM polis_agent_direct m JOIN polis_agent_direct_unit d
ON m.register_id = d.register_id
WHERE m.register_id = '$register_id'
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
WHERE register_id = '$register_id'
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
// if(!is_array($jsonData)){

//   $result =   [
//       "status"    => 400,
//       "message"   => 'gagal mengambil wfh project data',
//       "data"      => []
//     ];
//     return $result;  
//   }
$sob_name = $jsonData[code][0][FULL_NAME];

// INTERNAL
$mkg_group 	  = $row_mst[mkg_group];
$bus_code  	  = $row_mst[bus_code];
$register_id  = $row_mst[register_id];
$unit_no 	  = $row_mst[unit_no];
$oleh_buat 	  = $row_mst[oleh_buat];
$ext_polis 	  = $row_mst[ex_polis_no];
$bus_source	  = substr($row_mst[wfh_group_wfh_id],10);

$mkg_officer  = $row_mst[mkg_officer];

if ($ext_polis != null) {
$ext_polis 	  = $row_mst[ex_polis_no];
} else {
$ext_polis 	  = '-';
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
$mkg_full_name 		= $mks_data[PERSON_FULL_NAME] ;
// }
}

}

$tgl_order   = date('d-m-Y H:i:s');

$no_polis 	  = $row_mst[Policy_No];
if ($no_polis != null) {
$no_polis    	 	  = $row_mst[Policy_No];
$no_polis_corp_lokasi = substr($no_polis,0, 2);
} else if ($ext_polis){
$no_polis    	 	  = '-';
$no_polis_corp_lokasi = substr($ext_polis,0, 2);
}

// $daerah = corp_id_detail($no_polis_corp_lokasi);
// if ($daerah[1] == 'xxx') {
// 	$daerah[1] = mkg_group_detail($mkg_group);
// } else if ($daerah[0] == 'UNKNOWN') {	// NEW

$mkg_group_by_location = mkg_group_by_location($mkg_group);
$daerah  = corp_id_detail($mkg_group_by_location);
if ($daerah[1] == 'xxx') {
$daerah[1] = mkg_group_detail($mkg_group);
}

// }

// TERTANGGUNG
$tertanggung  	= trim($row_mst[customer_name]);

$customer_code  = $row_mst[id_aegis_customer_name];
if ($customer_code != null) {
$customer_code = $row_mst[id_aegis_customer_name];
} else {
$customer_code = '-';
}

$alamat   		= $row_mst[customer_add];
if ($alamat != null) {
$alamat    	 = $row_mst[customer_add];
} else {
$alamat    	 = '-';
}
// $sob_code  		= $row_mst[sob_code];
$kode_post  	= $row_mst[kode_post];

if ($kode_post != null) {
$kode_post    	 = $row_mst[kode_post];
} else {
$kode_post    	 = '-';
}

$qq1  			= $row_mst[qq];
$qq2  			= $row_mst[qq2];
if ($qq1) {
$qq1    	 = $row_mst[qq];
} else {
$qq1    	 = '-';
}

if ($qq2) {
$qq2    	 = $row_mst[qq2];
} else {
$qq2    	 = '-';
}

// KENDARAAN
$make  		 	   = $row_mst[make];
$category 	 	   = $row_mst[cate];
$model 	  	 	   = $row_mst[model];
$no_polisi 	 	   = $row_mst[no_polisi];
$no_rangka 	 	   = $row_mst[no_rangka];
$no_mesin 	 	   = $row_mst[no_mesin];
$warna 	  	 	   = $row_mst[warna];
$survey_no 	  	   = $row_mst[survey_no];
$tahun_mobil 	   = $row_mst[tahun_buat];
$status_penggunaan = $row_mst[status_penggunaan];
$status_mobil 	   = $row_mst[status_mobil];

if ($survey_no != '' || $survey_no != null) {
$survey_no = $row_mst[survey_no];
} else {
$survey_no = '-';
}

$remark_cantik 	   = $row_mst[remark_cantik];
if ($remark_cantik) {
$remark_cantik = trim($row_mst[remark_cantik]);
} else {
$remark_cantik = '-';
}

$add_eq 	   	   = $row_mst[add_equipment];
if ($add_eq) {
$add_eq = trim($row_mst[add_equipment]);
} else {
$add_eq = '-';
}

$remark 		   = $row_mst[remark];
if ($remark) {
$remark = $row_mst[remark];
} else {
$remark = '-';
}

// PENUTUPAN
$tgl_awal 	  		= date('d-m-Y',strtotime($row_mst[tgl_awal]));
$tgl_akhir 	  		= date('d-m-Y',strtotime($row_mst[tgl_akhir]));
$short_rate_metode  = $row_mst[short_rate_metode];
$short_rate_value  	= $row_mst[short_rate_value];
$tahun_cover  		= $row_mst[tahun_cover];

// $curr 	 		= $row_mst[curr];
$curr	="Rp.";

// $harga          = number_format($row_mst[sum_ins] , 0, ',', '.');
$harga          = $row_mst[sum_ins];
$harga_show   	= number_format($row_mst[sum_ins], 0, ',', '.');
$eqs 			= '-';
$eqs_p 			= '';

$disc_debit 	= $row_mst[disc_debit];
$disc_credit 	= $row_mst[disc_credit];
$tax 			= $row_mst[tax];
$biaya_admin	= number_format(60000 , 0, ',', '.');
$biaya_admin_polos	= 60000 ;

$rate_01 		= $row_mst[rate_01];
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
} else {
$per_tgg_01 = 'TLO';
}
// $per_tgg_01 = $row_mst[per_tgg_01];
} else {
$per_tgg_01 = '-';
}

$rscc_01 		= $row_mst[rscc_01];
if ($rscc_01 > 0) {
$rscc_01 = $row_mst[rscc_01].' %';
$rscc_01_polos = $row_mst[rscc_01];
} else {
$rscc_01 = '-';
}

$teroris_01 	= $row_mst[teroris_01];
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
$rate_driver_01_polos_2 = '0.50000 %';
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
$rumus_pass_01		 = $row_mst[qty_pass_01] * 0.1;
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


// if ($register_id = 'Q-00184-09-2021') {
//  $tpl_01 = 15000000;
// }

// START GET RATE TPL
$kereta_api   = substr($row_mst[wfh_group_wfh_id],5,4);
// $make            = $row_mst[make];
// $category        = $row_mst[cate];
// $model           = $row_mst[model];
$no_wilayah      = $row_mst[wilayah];

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

$jenis_pertanggungan = $row_mst[per_tgg_01];
if ($jenis_pertanggungan == 'ARK') {
$type_ass = 'ALL';
} else if ($jenis_pertanggungan == 'TLO') {
$type_ass = 'TLO';
}

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

// //OLD TPL
// $tpl_01_stage1 = 0;
// $tpl_01_stage2 = 0;
// $tpl_01_stage3 = 0;
// $tpl_100jt = 100000000;
// $tpl_50jt  = 50000000;
// $tpl_25jt  = 25000000;
// if ($tpl_01 > $tpl_50jt && $tpl_01 <= $tpl_100jt) {
// 	$tpl_01_stage1 = $tpl_25jt * 0.01;
// 	$tpl_01_stage2 = $tpl_25jt * 0.005;
// 	$tpl_01_stage3 = ($tpl_01 - $tpl_50jt) * 0.0025;
// }
// if ($tpl_01 > $tpl_25jt && $tpl_01 <= $tpl_50jt) {
// 	$tpl_01_stage1 = $tpl_25jt * 0.01;
// 	$tpl_01_stage2 = ($tpl_01 - $tpl_25jt) * 0.005;
// }
// if ($tpl_01 > 0 && $tpl_01 <= $tpl_25jt) {
// 	$tpl_01_stage1 = $tpl_01 * 0.01;
// }
// $tpl_01_total_stage = $tpl_01_stage1 + $tpl_01_stage2 + $tpl_01_stage3;
// //END OLD TPL

if ($tpl_01 > 0) {
$tpl_01 			= $curr.' '.number_format($row_mst[tpl_01] , 0, ',', '.');
$tpl_01_polos		= $row_mst[tpl_01];
$tpl_01_rumus_polos	= $tpl_01_total_stage;
// $tpl_01_rate_persen	= '0.10000 %';
$tpl_01_rumus_hasil	= $curr.' '.number_format($tpl_01_rumus_polos , 0, ',', '.');
} else {
$tpl_01 		= '-';
}

$deduc_01 		= $curr.' '.number_format($row_mst[deduc_01] , 0, ',', '.');
$Depre_01 		= $row_mst[Depre_01];

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

// // require_once('tcpdf_include.php');
// require('fpdf/fpdf_protection.php');
// $pdf = new FPDF_Protection();
// $pdf->SetProtection(array('print'),'','mks');  // di password mks dan hanya bisa cetak aja

// require('fpdf/fpdf_protection.php');
// $pdf = new FPDF_Protection();
// //$pdf->SetProtection(array('print'),'','mks');  // 40bit RC4 di password mks dan hanya bisa cetak aja
// //$pdf->SetProtection(array('print'),'','mks_mks123','ARCFOUR',40);  // 128bit RC4 di password mks dan hanya bisa cetak aja
// $pdf->SetProtection(array('print'),'','mks_mks123-MK$1122','ARCFOUR',128);  // 128bit RC4 di password mks dan hanya bisa cetak aja


$pdf = new TCPDF();
// ( 'print','print-high','modify','copy','annot-forms','fill-forms','extract','assemble')
$pdf->SetProtection(array( 'modify','copy','annot-forms','fill-forms','extract','assemble'), '','mks_mks123-MK$1122',3);
$pdf->SetAuthor("PT Asuransi Raksa Pratikara");
// $pdf->SetCreator($this->creator);
$pdf->SetTitle("Simulasi $register_id");
$pdf->SetSubject("Perhitungan Simulasi");
$pdf->SetKeywords("Raksa, Asuransi, Simulasi");

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

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

// $nama_foto2 = 'image/kop_surat.jpg';
// // $pdf->Image($nama_foto2,0,0,-150); // 1275 x 1651
// // $this->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// $pdf->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// $pdf->Ln(18);
$nama_foto2 = __DIR__ .'/../pdf_compenent/logo_raksa_only.png';
// $pdf->Image($nama_foto2,0,0,-150); // 1275 x 1651
// $this->Image($nama_foto2, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->Image($nama_foto2, 10, 3, 80, 20, '', '', '', false, 300, '', false, false, 0);
$pdf->Ln(18);

$tgl_buat_source=date("d-m-Y",strtotime($row_mst['tgl_buat']));
$pdf->SetFont("Helvetica","B",9);
$pdf->Cell(35,5,"Tanggal Simulasi",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
$pdf->Cell(50,5,$tgl_buat_source,0,0,"L");
$pdf->ln(10);

$pdf->SetFont("Helvetica","",9);
$pdf->Cell(35,5,"Nomor Register",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
$pdf->Cell(50,5,"$register_id",0,0,"L");
$pdf->ln(6);

// $pdf->Cell(35,5,"Bus Source",0,0,"L");
// $pdf->Cell(3,5,": ",0,0,"L");
// $pdf->Cell(50,5,"$bus_source",0,0,"L");
// $pdf->ln(6);

$pdf->Cell(35,5,"Nama Tertanggung",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
$pdf->Cell(50,5,"$tertanggung",0,0,"L");
$pdf->ln(6);

$pdf->Cell(35,5,"Objek Pertanggungan",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
$pdf->Cell(60,6,$make."  ".$category." ".$model." , TAHUN ". $tahun_mobil. " , ".$no_polisi ,0,0,"L");
$pdf->ln(6);

$pdf->Cell(35,5,"Periode Pertanggungan",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
// if ($ext_polis == '-') {
// 	$pdf->Cell(70,5,'TBA',0,0,'L');
// }
// else {
// 	$pdf->Cell(70,5,$tgl_awal.' s/d '.$tgl_akhir,0,0,'L');
// 	$pdf->ln();
// 	$pdf->Cell(38,5,'',0,0,'L');
// 	$pdf->Cell(70,5,'(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)',0,0,'L');
// }

// $tgl_awal_converted=strtotime(date("Y-m-d", strtotime($tgl_awal)));
// $tgl_akhir_converted=strtotime(date("Y-m-d", strtotime($tgl_akhir)));
// $periode_angka= floor(($tgl_akhir_converted-$tgl_awal_converted)/ (60*60*24*30*12));
// if($periode_angka>0) {
// 	$pdf->Cell(60,5,"$tgl_awal s/d $tgl_akhir ($periode_angka tahun)",0,0,'L');
// 	$pdf->ln();
// 	$pdf->Cell(38,5,'',0,0,'L');
// 	$pdf->Cell(70,5,'(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)',0,0,'L');
// }
// else {
// 	$pdf->Cell(60,5,"$tgl_awal s/d $tgl_akhir",0,0,'L');
// 	$pdf->ln();
// 	$pdf->Cell(38,5,'',0,0,'L');
// 	$pdf->Cell(70,5,'(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)',0,0,'L');
// }
if($tgl_awal==""|| $tgl_akhir=="" || $tgl_awal=='30-11--0001' || $tgl_akhir=='30-11--0001') {
$pdf->Cell(60,5,"TBA",0,0,'L');
}
else {
$pdf->Cell(60,5,"$tgl_awal s/d $tgl_akhir",0,0,'L');
$pdf->ln();
$pdf->Cell(38,5,'',0,0,'L');
$pdf->Cell(70,5,'(Pada jam 12.00 siang waktu setempat)',0,0,'L');
}
$pdf->ln(6);

$pdf->Cell(35,5,"Harga Pertanggungan",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
$pdf->Cell(50,5,"Rp. $harga_show",0,0,"L");
$pdf->ln(8);

$pdf->SetFont("Helvetica","B",9);
$pdf->Cell(35,5,'PERHITUNGAN SIMULASI PREMI',0,0,'L');
// $pdf->Cell(60,5,,0,0,'L');
$pdf->ln(8);
if ($short_rate_metode == 'Short_Rate') {
$pembilang = round($row_mst[short_rate_value],2);
$penyebut  = 100;
$short_rate_value = $pembilang / $penyebut;
$x = 'a';
}
else if ($short_rate_metode == 'Pro_Rate') {
//BACKUP 10 JUNI 2022
{
// // $hari = (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400;
// $pembilang = round($row_mst[short_rate_value],2);
// $penyebut  = round(( (strtotime($row_mst[tgl_akhir]. "+ ".$tahun_cover ."year") - strtotime($row_mst[tgl_awal])) / 86400),2);
// $short_rate_value = $pembilang / $penyebut;
// $x = 'b';
}

//10 JUNE 2022 => GANTI CARA PERHITUNGAN PENYEBUT PADA SAAT PRORATE
{
// $hari = (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400;
$pembilang = round($row_mst[short_rate_value],2);
if($pembilang<365) {
$penyebut=365;
}
else {
$penyebut  = round(( (strtotime($row_mst[tgl_akhir]. "+ ".$tahun_cover ."year") - strtotime($row_mst[tgl_awal])) / 86400),2);
}
$short_rate_value = $pembilang / $penyebut;
$x = 'b';
}
}
else {
$pembilang = round(( (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400),2);
$penyebut  = round(( (strtotime($row_mst[tgl_akhir]) - strtotime($row_mst[tgl_awal])) / 86400),2);
$short_rate_value = 1;
$x = 'c';
}

//4 JULI 2022 => TAMBAH LOADING RATE
{
$loading_01				=$row_mst['loading_01']." %";
$loading_01_polos	=$row_mst['loading_01'];
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

// $hasil_rate_01 = number_format(($harga * $rate_01_polos * $short_rate_value * 100 * 100) , 0, ',', '.');
// $hasil_rate_01_polos = $harga * $rate_01_polos * $short_rate_value * 100 * 100;

// $hasil_rate_01 = number_format(($hasil_loading_01_polos)+($harga * $rate_01_polos * $short_rate_value / 100 ) , 0, ',', '.');
// $hasil_rate_01_polos = $hasil_loading_01_polos+($harga * $rate_01_polos * $short_rate_value / 100);

$hasil_rate_01_polos  = ($hasil_loading_01_polos+($harga * $rate_01_polos/100)) * $short_rate_value;
$hasil_rate_01        = number_format($hasil_rate_01_polos , 0, ',', '.');
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
$pdf->SetFont("Helvetica","",9);
$pdf->Cell(24,5,$per_tgg_01,0,0,'R');
$pdf->Cell(3,6,' ',0,0,'R');
$pdf->Cell(46,5,$harga_show,0,0,'R');
$pdf->Cell(10,5,'X ',0,0,'R');
$pdf->Cell(5,5,' ',0,0,'R');
// $pdf->Cell(53,5,"($rate_01+($rate_01*$loading_01))",0,0,'R');
$pdf->Cell(15,5,$tampilan_rumus_hasil_loading_01,0,0,'R');
// // // $pdf->Cell(5,5,'X ',0,0,'L');
// // // $pdf->Cell(3,5,' ',0,0,'L');
// // // $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');
$pdf->Cell(5,5,' ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(30,5,' ',0,0,'R');
$pdf->Cell(15,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$hasil_rate_01,0,0,'R');
$pdf->ln(6);
}
else {
$pdf->SetFont("Helvetica","",9);
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
$pdf->Cell(15,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$hasil_rate_01,0,0,'R');
$pdf->ln(6);
}

$hasil_derek_01_polos 			= 0;
$hasil_bengkel_01_polos 		= 0;
$hasil_eqs_01_polos 				= 0;
$hasil_komersil_01_polos 		= 0;
$hasil_rscc_01_polos 	 			= 0;
$hasil_flood_01_polos 	 		= 0;
$hasil_eq_01_polos 		 			= 0;
$hasil_teroris_01_polos  		= 0;
$hasil_rate_tpl_01_polos 		= 0;
$hasil_rate_driver_01_polos = 0;
$hasil_rate_pass_01_polos 	= 0;

if ($derek_01 != '-') {
// $hasil_derek_01 		  =  number_format(($harga * $derek_01_polos / 100) , 0, ',', '.');
// $hasil_derek_01_polos = $harga * $derek_01_polos / 100;

$hasil_derek_01 		  =  number_format(($harga * $derek_01_polos / 100 * $short_rate_value) , 0, ',', '.');
$hasil_derek_01_polos = $harga * $derek_01_polos / 100 * $short_rate_value;

// $pdf->Cell(50,5,'DRK',0,0,'L');
$pdf->Cell(24,5,'Derek & Hotline 24 Jam',0,0,'L');
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

$pdf->Cell(15,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$hasil_derek_01,0,0,'R');
$pdf->ln(6);
}

if ($bengkel_01 != '-') {
$hasil_bengkel_01 =  number_format(($harga * $bengkel_01_polos * $short_rate_value / 100) , 0, ',', '.');
$hasil_bengkel_01_polos =  $harga * $bengkel_01_polos * $short_rate_value / 100;

// $pdf->Cell(50,5,'BKL',0,0,'L');
$pdf->Cell(24,5,'Bengkel Resmi',0,0,'L');
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

$pdf->Cell(15,5,'= ',0,0,'R');
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

$pdf->Cell(15,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$hasil_eqs_01,0,0,'R');

// $pdf->Cell(8,5,$curr,0,0,'L');
// $pdf->Cell(3,5,' ',0,0,'L');
// $pdf->Cell(3,5,$hasil_eqs_01,0,0,'L');
$pdf->ln(6);
}

// if ($komersil_01 != '-') {
// 	$hasil_komersil_01 =  number_format(($harga * $komersil_01_polos * $short_rate_value * 100 * 100) , 0, ',', '.');
// 	$hasil_komersil_01_polos = $harga * $komersil_01_polos * $short_rate_value * 100 * 100;

// 	$pdf->Cell(50,5,'KOM',0,0,'L');
// 	$pdf->Cell(3,6,' ',0,0,'L');
// 	$pdf->Cell(25,5,$harga,0,0,'L');
// 	$pdf->Cell(5,5,'X ',0,0,'L');
// 	$pdf->Cell(3,5,' ',0,0,'L');
// 	$pdf->Cell(22,5,$komersil_01,0,0,'L');

// 	// $pdf->Cell(5,5,'X ',0,0,'L');
// 	// $pdf->Cell(3,5,' ',0,0,'L');
// 	// $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

// 	$pdf->Cell(5,5,' ',0,0,'L');
// 	$pdf->Cell(3,5,' ',0,0,'L');
// 	$pdf->Cell(25,5,' ',0,0,'L');

// 	$pdf->Cell(5,5,'= ',0,0,'L');
// 	$pdf->Cell(3,5,' ',0,0,'L');
// 	$pdf->Cell(17,5,$curr,0,0,'L');
// 	$pdf->Cell(10,5,$hasil_komersil_01,0,0,'R');

// 	// $pdf->Cell(8,5,$curr,0,0,'L');
// 	// $pdf->Cell(3,5,' ',0,0,'L');
// 	// $pdf->Cell(15,5,$hasil_komersil_01,0,0,'L');
// 	$pdf->ln(6);
// }

if ($rscc_01 != '-') {
$hasil_rscc_01 =  number_format(($harga * $rscc_01_polos * $short_rate_value / 100) , 0, ',', '.');
$hasil_rscc_01_polos = $harga * $rscc_01_polos * $short_rate_value / 100;

$pdf->Cell(24,5,'Huru Hara',0,0,'L');
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

$pdf->Cell(15,5,'= ',0,0,'R');
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

$pdf->Cell(15,5,'= ',0,0,'R');
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

$pdf->Cell(15,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$hasil_eq_01,0,0,'R');


$pdf->ln(6);
}

if ($teroris_01 != '-') {
$hasil_teroris_01 =  number_format(($harga * $teroris_01_polos * $short_rate_value / 100) , 0, ',', '.');
$hasil_teroris_01_polos =  $harga * $teroris_01_polos * $short_rate_value / 100;

$pdf->Cell(24,5,'Terorisme & Sabotase',0,0,'L');
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

$pdf->Cell(15,5,'= ',0,0,'R');
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

$pdf->Cell(33,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$hasil_rate_tpl_01,0,0,'R');
$pdf->ln(6);
}

if ($si_driver_01 != '-') {
$hasil_rate_driver_01 = number_format(($si_driver_01_polos * $rate_driver_01_polos * $short_rate_value  ) , 0, ',', '.');
$hasil_rate_driver_01_polos =  $si_driver_01_polos * $rate_driver_01_polos * $short_rate_value  ;


$pdf->Cell(50,5,'Kecelakaan Diri Pengemudi',0,0,'L');
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
$pdf->Cell(35,5,' ',0,0,'L');

$pdf->Cell(5,5,'= ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(17,5," $curr",0,0,'L');
$pdf->Cell(11,5,$hasil_rate_driver_01,0,0,'R');
$pdf->ln(6);
}

if ($si_pass_01 != '-') {
$hasil_rate_pass_01 = number_format(($si_pass_01_polos * $rumus_pass_01 * $short_rate_value / 100) , 0, ',', '.');
$hasil_rate_pass_01_polos =  $si_pass_01_polos * $rumus_pass_01 * $short_rate_value / 100 ;

$pdf->Cell(50,5,'Kecelakaan Diri Penumpang',0,0,'L');
$pdf->Cell(3,6,' ',0,0,'L');
$pdf->Cell(20,5,number_format($si_pass_01_polos , 0, ',', '.'),0,0,'R');
$pdf->Cell(5,5,' ',0,0,'R');
$pdf->Cell(5,5,'X ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
// $pdf->Cell(22,5,$rumus_pass_01_persen,0,0,'L');
$pdf->Cell(22,5,'0.10000 %',0,0,'L');


// $pdf->Cell(5,5,'X ',0,0,'L');
// $pdf->Cell(3,5,' ',0,0,'L');
// $pdf->Cell(25,5,' [ '.$pembilang.' / '.$penyebut.' ] ',0,0,'L');

$pdf->Cell(5,5,'X ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(35,5,$row_mst[qty_pass_01],0,0,'L');

$pdf->Cell(5,5,'= ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(17,5," $curr",0,0,'L');
$pdf->Cell(11,5,$hasil_rate_pass_01,0,0,'R');
$pdf->ln(6);
}

if ($stnk_01 != '-') {
$stnk_01_format = number_format(($stnk_01) , 0, ',', '.');

$pdf->Cell(50,5,'STNK/BPKB',0,0,'L');
$pdf->Cell(3,6,' ',0,0,'R');
$pdf->Cell(20,5,number_format($stnk_01 , 0, ',', '.'),0,0,'R');
$pdf->Cell(50,5,' ',0,0,'R');

$pdf->Cell(33,5,'= ',0,0,'R');
$pdf->Cell(3,5,' ',0,0,'R');
$pdf->Cell(8,5,$curr,0,0,'R');
$pdf->Cell(20,5,$stnk_01_format,0,0,'R');
$pdf->ln(6);
}

// $pdf->Cell(180,0,'',1,0,'C');
$pdf->writeHTML("<hr>", true, false, true, false, '');
// $pdf->ln(2);

$premi_polos =  $hasil_rate_01_polos + $hasil_derek_01_polos + $hasil_bengkel_01_polos + $hasil_eqs_01_polos +
  $hasil_komersil_01_polos + $hasil_rscc_01_polos + $hasil_flood_01_polos + $hasil_eq_01_polos +
  $hasil_teroris_01_polos +  $hasil_rate_driver_01_polos + $hasil_rate_pass_01_polos + $hasil_rate_tpl_01_polos + $stnk_01_polos;
$premi =	number_format($premi_polos , 0, ',', '.');
$pdf->Cell(151,5,'Premi',0,0,'L');
$pdf->Cell(5,5,'= ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(17,5," $curr",0,0,'L');
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
$pdf->Cell(30,5,'',0,0,'L');

$pdf->Cell(5,5,'= ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(17,5," $curr",0,0,'L');
$pdf->Cell(11,5,'- '.$hasil_diskon,0,0,'R');
$pdf->ln();
}

$pdf->Cell(151,5,'Biaya Administrasi',0,0,'L');
$pdf->Cell(5,5,'= ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(17,5," $curr",0,0,'L');
$pdf->Cell(11,5,$biaya_admin,0,0,'R');
$pdf->ln();

// $pdf->Cell(180,0,'',1,0,'C');
// $pdf->ln(2);
$pdf->writeHTML("<hr>", true, false, true, false, '');

$total_premi_polos = $premi_polos - $hasil_diskon_polos + $biaya_admin_polos;
$total_premi = number_format($total_premi_polos , 0, ',', '.');
$pdf->SetFont("Helvetica","B",9);
$pdf->Cell(151,5,'Total Premi yang harus dibayar',0,0,'L');
$pdf->Cell(5,5,'= ',0,0,'L');
$pdf->Cell(3,5,' ',0,0,'L');
$pdf->Cell(17,5," $curr",0,0,'L');
$pdf->Cell(11,5,$total_premi,0,0,'R');
$pdf->ln(10);
$pdf->SetFont("Helvetica","",9);

$pdf->Cell(35,5,"Resiko Sendiri",0,0,"L");
$pdf->Cell(3,5,": ",0,0,"L");
$pdf->Cell(3,5,"- ",0,0,"L");
$pdf->Cell(60,5,$deduc_01. " per kejadian untuk $per_tgg_01",0,0,'L');
$pdf->ln(6);

$perluasan_array=array();
if($rscc_01!="-") {
array_push($perluasan_array, "huru hara");
}
if($flood_01!="-") {
array_push($perluasan_array, "banjir");
}
if($eq_01!="-") {
array_push($perluasan_array, "gempa bumi");
}
if($teroris_01!="-") {
array_push($perluasan_array, "terorisme & sabotase");
}
if($rscc_01=="-" && $flood_01=="-" && $eq_01== "-" && $teroris_01=="-") {
// DO NOTHING
}
else {
$pdf->Cell(35,5,"",0,0,"L");
$pdf->Cell(3,5,"",0,0,"L");
$pdf->Cell(3,5,"- ",0,0,"L");
$pdf->Cell(60,5,"10% dari klaim, minimum $curr 500.000 per kejadian untuk ",0,0,'L');
$pdf->ln();
$pdf->Cell(35,5,"",0,0,"L");
$pdf->Cell(3,5,"",0,0,"L");
$pdf->Cell(3,5,"",0,0,"L");
for ($a=0; $a<count($perluasan_array); $a++) {
if($a==0) {
$perluasan=$perluasan."$perluasan_array[$a]";
}
else if ($a==count($perluasan_array)-1) {
$perluasan=$perluasan." dan $perluasan_array[$a].";
}
else {
$perluasan=$perluasan.", $perluasan_array[$a]";
}
}
$pdf->Cell(60,5,$perluasan,0,0,'L');
$pdf->ln();
}

$pdf->Cell(177,5,'Okupasi kendaraan digunakan untuk keperluan pribadi (kendaraan tidak disewakan atau digunakan sebagai taxi online',0,0,'L');
$pdf->ln();
$pdf->Cell(140,5,'atau penggunaan lain yang mendapatkan imbal jasa)',0,0,'L');
$pdf->ln();

$pdf->Cell(15,5,'*) Catatan',0,0,'L');
$pdf->Cell(3,5,' : ',0,0,'L');
$pdf->Cell(2,5,'- ',0,0,'L');
$pdf->Cell(50,5,'Suku Premi, Resiko Sendiri atau syarat ketentuan lainnya bisa berubah jika',0,0,'L');
$pdf->ln();
$pdf->Cell(15,5,'',0,0,'L');
$pdf->Cell(3,5,'',0,0,'L');
$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(50,5,'terjadi klaim sebelum jatuh tempo polis berakhir.',0,0,'L');
$pdf->ln();

$pdf->Cell(15,5,'',0,0,'L');
$pdf->Cell(3,5,'',0,0,'L');
$pdf->Cell(2,5,'- ',0,0,'L');
$pdf->Cell(50,5,'Penutupan asuransi baru dan atau perluasan banjir Wajib dilakukan Survey',0,0,'L');
$pdf->ln();

$pdf->Cell(15,5,'',0,0,'L');
$pdf->Cell(3,5,'',0,0,'L');
$pdf->Cell(2,5,'- ',0,0,'L');
$pdf->Cell(50,5,'Hasil simulasi perhitungan premi bukan merupakan konfirmasi persetujuan penutupan asuransi',0,0,'L');
$pdf->ln();

$pdf->Cell(15,5,'',0,0,'L');
$pdf->Cell(3,5,'',0,0,'L');
$pdf->Cell(2,5,'- ',0,0,'L');
$tgl_buat_convert=date("d-m-Y", strtotime($tgl_buat_source. '+14 days'));
$pdf->Cell(50,5,"Simulasi perhitungan premi hanya berlaku sampai dengan tanggal $tgl_buat_convert",0,0,'L');
$pdf->ln();
$pdf->Cell(15,5,'',0,0,'L');
$pdf->Cell(3,5,'',0,0,'L');
$pdf->Cell(2,5,'',0,0,'L');
$pdf->Cell(50,5,'atau dinyatakan tidak berlaku jika sudah ada penerbitan polis',0,0,'L');
$pdf->ln();

//HEADER
$pdf->SetFont("helvetica","",9);
$pdf->SetY(1);
$pdf->Cell(0,10,$mkg_group,0,0,"R");
$pdf->ln();
          
  date_default_timezone_set("Asia/Jakarta");
  $dateObj = DateTime::createFromFormat('U.u', microtime(TRUE));
  $dateObj->setTimeZone(new DateTimeZone('Asia/Jakarta'));
  $file_pdf  = md5(md5(md5($dateObj->format('YmdHisu'))));

  
  $file_qou      = "$register_id" . "_" . $file_pdf  . ".pdf";
  $path_epol     = $_SERVER['DOCUMENT_ROOT'] . 'mks/entry/bike/api/files/pdf/Sim_pdf/';
  $file_name_pdf = $path_epol . $file_qou;
  $pdf->Output( $file_name_pdf ,'F');

    $q_sel= "   SELECT a.uwd_file_pdf
    FROM
        polis_agent_direct a
    WHERE
        a.register_id    = '$register_id' 
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

    if(strlen($uwd_file_pdf)>0) {
      unlink($uwd_file_pdf);
  }

    $sql_update  = "UPDATE polis_agent_direct m
                    set
                        m.uwd_file_pdf   = '$file_name_pdf'
                  where m.register_id    = '$register_id'        ";
    $hasil_update = $sqlbuilder->executeCommit('BIKE',$sql_update);
    if($hasil_update[status] == 400){
      $result =   [
          "status"    => 400,
          "message"   => $hasil_update[message],
          "data"      => []
        ];
        return $result;  
      }


  $link         ='https://'.$_SERVER['SERVER_NAME'].'/mks/entry/bike/api/files/pdf/Sim_pdf/'.$file_qou;
  $b64Doc       = chunk_split(base64_encode(file_get_contents($file_name_pdf)));

  // unlink($file_qou);

  $return_quot = array(
    "status"  =>  200,
    "message"  =>  "Sukses",
    "link"    =>   $link, 
    "encode"  =>   $b64Doc
    );

    return $return_quot;
  
    
}