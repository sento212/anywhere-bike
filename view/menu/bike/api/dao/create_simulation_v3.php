<?php
require_once(__DIR__ . '/../tcpdf/tcpdf.php');
use setasign\Fpdi;
require_once(__DIR__ . '/../fpdi/src/autoload.php');

function pdf_simulation($sqlbuilder,$register_id,$kelas,$source,$water_mark){

// https://www.araksa.com/mks/entry/pdf_create_quotation_v3.php
  
ob_end_clean();

  class Pdf extends Fpdi\Tcpdf\Fpdi
  {
      protected $tplId;
      public $register_id;
      public function Header()
      {
        global $register_id;
          // get the current page break margin
          $bMargin = $this->getBreakMargin();
          // get current auto-page-break mode
          $auto_page_break = $this->AutoPageBreak;
          // disable auto-page-break
          $this->SetAutoPageBreak(false, 0);
          // set bacground image


          $this->SetFont('times', 'B', 10);
          $ss = '('.$this->getPageNumGroupAlias().'/'.$this->getPageGroupAlias().')';
          $this->MultiCell(55, 5, $ss, 0, 'R', 0, 0, '158', '280',false);

          $this->SetFont('times', '', 8);
          $versi = 'V3';
          $this->MultiCell(55, 5, $versi, 0, 'L', 0, 0, '18', '280',false);


          $this->SetFont('times', 'B', 7);
          $this->MultiCell(55, 100, $register_id, 0, 'R', 0, 0, '144', '7', false);

        
          $img_file = __DIR__ .'/../pdf_compenent/logo_raksa_only.png';
          $this->Image($img_file, 10, 3, 80, 20, '', '', '', false, 300, '', false, false, 0);
          $this->SetAutoPageBreak($auto_page_break, $bMargin);
          // $this->SetFont('courier', '', 8);
          $this->setPageMark();
      }
  }


  // create new PDF document
  $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

  // set document information
  // $pdf->SetProtection(array( 'modify','copy','annot-forms','fill-forms','extract','assemble'), 'abc','mks',3);
  // $pdf->SetProtection(array('modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble'), '', 'mks', 3);
  $pdf->SetCreator('Araksa');
  $pdf->SetAuthor('Araksa');
  $pdf->SetSubject('Araksa');



  $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(35);
  $pdf->SetFooterMargin(0);

  // remove default footer
  $pdf->setPrintFooter(false);

  // set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  // set some language-dependent strings (optional)
  if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) 
  {
      require_once(dirname(__FILE__) . '/lang/eng.php');
      $pdf->setLanguageArray($l);
  }

  $pdf->StartPageGroup();
  $pdf->AddPage('P', 'A4');
  
  // Isi
  {
    
          // API  
        {
            $arr_in_p_premi = array(
            "key_id"          =>  "kdwaklwhkjq@#$3123DDLWDL",
            "register_id"     =>  $register_id,
            "class"           =>  "BIKE"
            );
            $url_api = "https://www.rks-w.com/mks/entry/bike/api/index.php?/perhitungan_premi";
            $header = array('Content-Type: application/json','id:mks','key:kdwaklwhkjq@#$3123DDLWDL');
            $arr_res_p_premi = $sqlbuilder->api('POST',$url_api,json_encode($arr_in_p_premi), $header);
            if($arr_res_p_premi[status] == 400)
            {
                $result =   [
                    "status"    => 400,
                    "message"   => $arr_res_p_premi[message],
                    "data"      => []
                  ];
                  return $result;
            }
        }

        // Function Data
        {
                                      
            function mkg_group_by_location($mkg_group)
            {
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

            function corp_id_detail($corp_id)
            {
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

            function mkg_group_detail($mkg_group)
            {
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
        }

        {
              // Pengambilan Data
              foreach ($arr_res_p_premi['data'] as $dat) 
              {

                $unit_no  = $dat[unit_no];

              
                    // Data
                  {

                    $deduc_01             =$dat['deduct_01'];
                    $deduc_02             =$dat['deduct_02'];
                    $deduc_03             =$dat['deduct_03'];
                    $deduc_04             =$dat['deduct_04'];
                    $deduc_05             =$dat['deduct_05'];

                    $tpl_01               =($dat['tpl_01']);
                    $tpl_02               =($dat['tpl_02']);
                    $tpl_03               =($dat['tpl_03']);
                    $tpl_04               =($dat['tpl_04']);
                    $tpl_05               =($dat['tpl_05']);

                    $tpl_01_conv          =number_format($dat['tpl_01']);
                    $tpl_02_conv          =number_format($dat['tpl_02']);
                    $tpl_03_conv          =number_format($dat['tpl_03']);
                    $tpl_04_conv          =number_format($dat['tpl_04']);
                    $tpl_05_conv          =number_format($dat['tpl_05']);



                    $rate_01              =$dat['rate_01'];
                    $rate_02              =$dat['rate_02'];
                    $rate_03              =$dat['rate_03'];
                    $rate_04              =$dat['rate_04'];  
                    $rate_05              =$dat['rate_05'];
                    $rscc_02              =$dat['rscc_02'];
                    $rscc_01              =$dat['rscc_01'];
                    $rscc_03              =$dat['rscc_03'];
                    $rscc_04              =$dat['rscc_04'];
                    $rscc_05              =$dat['rscc_05'];
                    $teroris_01           =$dat['teroris_01'];
                    $teroris_02           =$dat['teroris_02'];
                    $teroris_03           =$dat['teroris_03'];
                    $teroris_04           =$dat['teroris_04'];
                    $teroris_05           =$dat['teroris_05'];
                    $flood_01             =$dat['flood_01'];
                    $flood_02             =$dat['flood_02'];
                    $flood_03             =$dat['flood_03'];
                    $flood_04             =$dat['flood_04'];
                    $flood_05             =$dat['flood_05'];
                    $eq_01                =$dat['eq_01'];
                    $eq_02                =$dat['eq_02'];
                    $eq_03                =$dat['eq_03'];
                    $eq_05                =$dat['eq_05'];
                    $eq_04                =$dat['eq_04'];
                    $bengkel_01           =$dat['bengkel_01'];
                    $bengkel_02           =$dat['bengkel_02'];
                    $bengkel_04           =$dat['bengkel_04'];
                    $bengkel_03           =$dat['bengkel_03'];
                    $bengkel_05           =$dat['bengkel_05'];
                    $derek_01             =$dat['derek_01'];
                    $derek_02             =$dat['derek_02'];
                    $derek_03             =$dat['derek_03'];
                    $derek_05             =$dat['derek_05'];
                    $derek_04             =$dat['derek_04'];


                    $rate_comp_01        =number_format(strval($dat['rate_01_comp']),5);
                    $rate_comp_02        =number_format(strval($dat['rate_02_comp']),5);
                    $rate_comp_03        =number_format(strval($dat['rate_03_comp']),5);
                    $rate_comp_04        =number_format(strval($dat['rate_04_comp']),5);
                    $rate_comp_05        =number_format(strval($dat['rate_05_comp']),5);

                    $qty_pass_01         =$dat['qty_pass_01'];
                    $qty_pass_02         =$dat['qty_pass_02'];
                    $qty_pass_03         =$dat['qty_pass_03'];
                    $qty_pass_04         =$dat['qty_pass_04'];
                    $qty_pass_05         =$dat['qty_pass_05'];
                    

                    $si_driver_01         =$dat['si_driver_01'];
                    $si_driver_02         =$dat['si_driver_02'];
                    $si_driver_03         =$dat['si_driver_03'];
                    $si_driver_04         =$dat['si_driver_04'];
                    $si_driver_05         =$dat['si_driver_05'];
                    
                    $pa_pass_01           =$dat['si_pass_01'];
                    $pa_pass_02           =$dat['si_pass_02'];
                    $pa_pass_03           =$dat['si_pass_03'];
                    $pa_pass_04           =$dat['si_pass_04'];
                    $pa_pass_05           =$dat['si_pass_05'];


                    $ext_polis            = $dat['ex_polis'];
                    $no_polis             = $dat['no_polis'];
                    $mkg_group            = $dat['mkg_group'];
                    $mkg_officer          = $dat['mkg_officer'];
                    $customer_name        = $dat['cust_name'];
                    $customer_add         = $dat['cust_add'];
                    $status               = $dat['status_penggunaan'];
                    $no_chasis            = $dat['no_rangka'];
                    $no_mesin             = $dat['no_mesin'];
                    $no_polisi            = $dat['no_polisi'];
                    $make                 = $dat['make'];
                    $cate                 = $dat['cate'];
                    $model                = $dat['model'];
                    $tahun_buat           = $dat['tahun_buat'];
                    $adm_cost             = $dat['admin_cost'];
                    $adm_cost_conv        = number_format($dat['admin_cost']);


                    $per_tgg_01           = $dat[per_tgg_01];
                    $per_tgg_02           = $dat[per_tgg_02];
                    $per_tgg_03           = $dat[per_tgg_03];
                    $per_tgg_04           = $dat[per_tgg_04];
                    $per_tgg_05           = $dat[per_tgg_05];

        
                    $disc_debit           = $dat[disc_debt];
                    $disc_credit          = $dat[disc_cred];


                    $warna                = $dat['warna'];
                    $tgl_awal             = $dat['tgl_awal'];
                    $tgl_akhir            = $dat['tgl_akhir'];
                    $tgl_buat             = $dat['tgl_buat'];
                    $prem_rate_01         = $dat['prem_rate_01'];
                    $prem_rate_02         = $dat['prem_rate_02'];
                    $prem_rate_03         = $dat['prem_rate_03'];
                    $prem_rate_04         = $dat['prem_rate_04'];
                    $prem_rate_05         = $dat['prem_rate_05'];
                    $prem_rscc_01         = $dat['prem_rscc_01'];
                    $prem_rscc_02         = $dat['prem_rscc_02'];
                    $prem_rscc_03         = $dat['prem_rscc_03'];
                    $prem_rscc_04         = $dat['prem_rscc_04'];
                    $prem_rscc_05         = $dat['prem_rscc_05'];
                    $prem_teroris_01      = $dat['prem_teroris_01'];
                    $prem_teroris_02      = $dat['prem_teroris_02'];
                    $prem_teroris_03      = $dat['prem_teroris_03'];
                    $prem_teroris_04      = $dat['prem_teroris_04'];
                    $prem_teroris_05      = $dat['prem_teroris_05'];
                    $prem_flood_01        = $dat['prem_flood_01'];
                    $prem_flood_02        = $dat['prem_flood_02'];
                    $prem_flood_03        = $dat['prem_flood_03'];
                    $prem_flood_04        = $dat['prem_flood_04'];
                    $prem_flood_05        = $dat['prem_flood_05'];
                    $prem_eq_01           = $dat['prem_eq_01'];
                    $prem_eq_02           = $dat['prem_eq_02'];
                    $prem_eq_03           = $dat['prem_eq_03'];
                    $prem_eq_04           = $dat['prem_eq_04'];
                    $prem_eq_05           = $dat['prem_eq_05'];
                    $prem_bengkel_01      = $dat['prem_bengkel_01'];
                    $prem_bengkel_02      = $dat['prem_bengkel_02'];
                    $prem_bengkel_03      = $dat['prem_bengkel_03'];
                    $prem_bengkel_04      = $dat['prem_bengkel_04'];
                    $prem_bengkel_05      = $dat['prem_bengkel_05'];
                    $prem_derek_01        = $dat['prem_derek_01'];
                    $prem_derek_02        = $dat['prem_derek_02'];
                    $prem_derek_03        = $dat['prem_derek_03'];
                    $prem_derek_04        = $dat['prem_derek_04'];
                    $prem_derek_05        = $dat['prem_derek_05'];
                    $pa_si_driver_01      = $dat['pa_si_driver_01'];
                    $pa_si_driver_02      = $dat['pa_si_driver_02'];
                    $pa_si_driver_03      = $dat['pa_si_driver_03'];
                    $pa_si_driver_04      = $dat['pa_si_driver_04'];
                    $pa_si_driver_05      = $dat['pa_si_driver_05'];
                    $prem_pa_pass_01      = $dat['prem_pa_pass_01'];
                    $prem_pa_pass_02      = $dat['prem_pa_pass_02'];
                    $prem_pa_pass_03      = $dat['prem_pa_pass_03'];
                    $prem_pa_pass_04      = $dat['prem_pa_pass_04'];
                    $prem_pa_pass_05      = $dat['prem_pa_pass_05'];
                    $prem_tpl_01          = $dat['prem_tpl_01'];
                    $prem_tpl_02          = $dat['prem_tpl_02'];
                    $prem_tpl_03          = $dat['prem_tpl_03'];
                    $prem_tpl_04          = $dat['prem_tpl_04'];
                    $prem_tpl_05          = $dat['prem_tpl_05'];
                    $prem_total_tahun_01  = $dat['prem_total_tahun_01'];
                    $prem_total_tahun_02  = $dat['prem_total_tahun_02'];
                    $prem_total_tahun_03  = $dat['prem_total_tahun_03'];
                    $prem_total_tahun_04  = $dat['prem_total_tahun_04'];
                    $prem_total_tahun_05  = $dat['prem_total_tahun_05'];
                

                    $tahun_total          = $dat['tahun_total'];
                    $short_rate_metode    = $dat['short_rate_value'];   
                    $short_rate           = $dat['short_rate'];                    
          
                    $total_premi          = $dat['total_premi'];
                    $total_premi_prev     = $dat['total_premi_prev'];
                    $nilai_disc_debit     = $dat['nilai_disc_debit'];
                    $nilai_disc_credit    = $dat['nilai_disc_credit'];
                    $grand_total          = $dat['grand_total_new'];

                  
                    $l_rate_01            = $dat['loading_rate_01'];
                    $l_rate_01_conv       = number_format($l_rate_01);
                    $l_rate_02            = $dat['loading_rate_02'];
                    $l_rate_02_conv       = number_format($l_rate_02);
                    $l_rate_03            = $dat['loading_rate_03'];
                    $l_rate_03_conv       = number_format($l_rate_03);
                    $l_rate_04            = $dat['loading_rate_04'];
                    $l_rate_04_conv       = number_format($l_rate_04);
                    $l_rate_05            = $dat['loading_rate_05'];
                    $l_rate_05_conv       = number_format($l_rate_05);
                
                    $prem_rate_01_conv          = number_format($prem_rate_01);
                    $prem_rate_02_conv          = number_format($prem_rate_02);
                    $prem_rate_03_conv          = number_format($prem_rate_03);
                    $prem_rate_04_conv          = number_format($prem_rate_04);
                    $prem_rate_05_conv          = number_format($prem_rate_05);
                    $prem_rscc_01_conv          = number_format($prem_rscc_01);
                    $prem_rscc_02_conv          = number_format($prem_rscc_02);
                    $prem_rscc_03_conv          = number_format($prem_rscc_03);
                    $prem_rscc_04_conv          = number_format($prem_rscc_04);
                    $prem_rscc_05_conv          = number_format($prem_rscc_05);
                    $prem_teroris_01_conv       = number_format($prem_teroris_01);
                    $prem_teroris_02_conv       = number_format($prem_teroris_02);
                    $prem_teroris_03_conv       = number_format($prem_teroris_03);
                    $prem_teroris_04_conv       = number_format($prem_teroris_04);
                    $prem_teroris_05_conv       = number_format($prem_teroris_05);
                    $prem_flood_01_conv         = number_format($prem_flood_01);
                    $prem_flood_02_conv         = number_format($prem_flood_02);
                    $prem_flood_03_conv         = number_format($prem_flood_03);
                    $prem_flood_04_conv         = number_format($prem_flood_04);
                    $prem_flood_05_conv         = number_format($prem_flood_05);
                    $prem_eq_01_conv            = number_format($prem_eq_01);
                    $prem_eq_02_conv            = number_format($prem_eq_02);
                    $prem_eq_03_conv            = number_format($prem_eq_03);
                    $prem_eq_04_conv            = number_format($prem_eq_04);
                    $prem_eq_05_conv            = number_format($prem_eq_05);
                    $prem_bengkel_01_conv       = number_format($prem_bengkel_01);
                    $prem_bengkel_02_conv       = number_format($prem_bengkel_02);
                    $prem_bengkel_03_conv       = number_format($prem_bengkel_03);
                    $prem_bengkel_04_conv       = number_format($prem_bengkel_04);
                    $prem_bengkel_05_conv       = number_format($prem_bengkel_05);
                    $prem_derek_01_conv         = number_format($prem_derek_01);
                    $prem_derek_02_conv         = number_format($prem_derek_02);
                    $prem_derek_03_conv         = number_format($prem_derek_03);
                    $prem_derek_04_conv         = number_format($prem_derek_04);
                    $prem_derek_05_conv         = number_format($prem_derek_05);
                    
                    $pa_si_driver_01_conv       = number_format($pa_si_driver_01);
                    $pa_si_driver_02_conv       = number_format($pa_si_driver_02);
                    $pa_si_driver_03_conv       = number_format($pa_si_driver_03);
                    $pa_si_driver_04_conv       = number_format($pa_si_driver_04);
                    $pa_si_driver_05_conv       = number_format($pa_si_driver_05);
                    $prem_pa_pass_01_conv       = number_format($prem_pa_pass_01);
                    $prem_pa_pass_02_conv       = number_format($prem_pa_pass_02);
                    $prem_pa_pass_03_conv       = number_format($prem_pa_pass_03);
                    $prem_pa_pass_04_conv       = number_format($prem_pa_pass_04);
                    $prem_pa_pass_05_conv       = number_format($prem_pa_pass_05);
                    $prem_tpl_01_conv           = number_format($prem_tpl_01);
                    $prem_tpl_02_conv           = number_format($prem_tpl_02);
                    $prem_tpl_03_conv           = number_format($prem_tpl_03);
                    $prem_tpl_04_conv           = number_format($prem_tpl_04);
                    $prem_tpl_05_conv           = number_format($prem_tpl_05);




                    $stnk_01           = $dat['stnk_01'];
                    $stnk_02           = $dat['stnk_02'];
                    $stnk_03           = $dat['stnk_03'];
                    $stnk_04           = $dat['stnk_04'];
                    $stnk_05           = $dat['stnk_05'];
                


                    $prem_stnk_01_conv           = number_format(strval($dat['stnk_01']));
                    $prem_stnk_02_conv           = number_format(strval($dat['stnk_02']));
                    $prem_stnk_03_conv           = number_format(strval($dat['stnk_03']));
                    $prem_stnk_04_conv           = number_format(strval($dat['stnk_04']));
                    $prem_stnk_05_conv           = number_format(strval($dat['stnk_05']));
                
                    $prem_total_tahun_01_conv   = number_format($prem_total_tahun_01);
                    $prem_total_tahun_02_conv   = number_format($prem_total_tahun_02);
                    $prem_total_tahun_03_conv   = number_format($prem_total_tahun_03);
                    $prem_total_tahun_04_conv   = number_format($prem_total_tahun_04);
                    $prem_total_tahun_05_conv   = number_format($prem_total_tahun_05);
                    

                    $total_premi_prev_conv      = number_format($total_premi_prev);
                    $total_premi_conv           = number_format($total_premi);
                    
                    $nilai_disc_debit_conv      = number_format($nilai_disc_debit);
                    $nilai_disc_credit_conv     = number_format($nilai_disc_credit);
                    
                    $grand_total_conv           = number_format($grand_total);


                    $_api_joson   = 'mks_work_to_b';        // production
                    $data_api = array( "input_group_head" => $mkg_group );
                    $url_api = "https://raksa-service.com/" . $_api_joson . "/index.php/mks_api_person_name_mst/person_name_master_gh";
                    $web_url  = curl_init($url_api);
                    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
                    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api);
                    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

                    $result_unit  = curl_exec($web_url);
                    $info_unit    = curl_getinfo($web_url);
                    curl_close($web_url);

                  
                    $data_unit_name = json_decode($result_unit);

                    // echo $data_unit_name.'xxxxxxxd';
                    // echo $result_unit.'xxxxxxxd';

                    foreach ($data_unit_name->code as $mks_data)
                    {
                      
                      
                      if ($mkg_officer == $mks_data->PERSON_SHORT_NAME) 
                      {           
                        $mkg_short_name     = $mks_data->PERSON_SHORT_NAME ;
                        $mkg_full_name      = $mks_data->PERSON_FULL_NAME ;
                        
                      }
                    }

                    
                    {
                      // $table_perhit_premi   = "";
                      $sum_ins              = $dat['sum_ins'];
                      $sum_ins_conv         = number_format(intval($dat['sum_ins']));
                      $tahun_cover          = $unit['tahun_cover'];
                      // $rate_01              = intval($unit['rate_01']);
                      $rate_01_persen       = "$rate_01%";
                      // $rate_02              = intval($unit['rate_02']);
                      $rate_02_persen       = "$rate_02%";
                      // $rate_03              = intval($unit['rate_03']);
                      $rate_03_persen       = "$rate_03%";
                      // $rate_04              = intval($unit['rate_04']);
                      $rate_04_persen       = "$rate_04%";
                      // $rate_05              = intval($unit['rate_05']);
                      $rate_05_persen       = "$rate_05%";
                  
                      //RUMUS TAMPIL
                      // $show_rumus_rate_01 = "$sum_ins_conv x $unit[rate_01]%";
                      
                  
                      // if ( $l_rate_01 == '' ) { $rate_hull_01 = "$sum_ins_conv x $unit[rate_01]"; } else { $rate_hull_01 = "$sum_ins_conv x ($unit[rate_01]%+($unit[rate_01]% x $l_rate_01_conv %))"; }
                      // if ( $l_rate_02 == '' ) { $rate_hull_02 = "$sum_ins_conv x $unit[rate_02]"; } else { $rate_hull_02 = "$sum_ins_conv x ($unit[rate_02]%+($unit[rate_02]% x $l_rate_02_conv %))"; }
                      // if ( $l_rate_03 == '' ) { $rate_hull_03 = "$sum_ins_conv x $unit[rate_03]"; } else { $rate_hull_03 = "$sum_ins_conv x ($unit[rate_03]%+($unit[rate_03]% x $l_rate_03_conv %))"; }
                      // if ( $l_rate_04 == '' ) { $rate_hull_04 = "$sum_ins_conv x $unit[rate_04]"; } else { $rate_hull_04 = "$sum_ins_conv x ($unit[rate_04]%+($unit[rate_04]% x $l_rate_04_conv %))"; }
                      // if ( $l_rate_05 == '' ) { $rate_hull_05 = "$sum_ins_conv x $unit[rate_05]"; } else { $rate_hull_05 = "$sum_ins_conv x ($unit[rate_05]%+($unit[rate_05]% x $l_rate_05_conv %))"; }
            
                    
                    }
                  }


                    // perluasan
                  {
                    $perluasan_array=array();

                   
                          if($rscc_01!="") {
                            array_push($perluasan_array, "huru hara");
                          }
                          if($flood_01!="") {
                            array_push($perluasan_array, "banjir");
                          }
                          if($eq_01!="") {
                            array_push($perluasan_array, "gempa bumi");
                          }
                          if($teroris_01!="") {
                            array_push($perluasan_array, "terorisme & sabotase");
                          }
                          if($rscc_01=="" && $flood_01=="" && $eq_01== "" && $teroris_01=="") {
                            // DO NOTHING
                          }
                          else
                          {
                            $perluasan = '';  
                          
                              for ($a=0; $a<count($perluasan_array); $a++) 
                              {
                                  if($a==0) 
                                  {
                                    $perluasan=$perluasan."$perluasan_array[$a]";
                                  }
                                  else if ($a==count($perluasan_array)-1) 
                                  {
                                    $perluasan=$perluasan." dan $perluasan_array[$a].";
                                  }
                                  else 
                                  {
                                    $perluasan=$perluasan.", $perluasan_array[$a]";
                                  }
                              }
                            
                          }
                    }


                  {

                    $_user_id   = 'araksa.com';
                    $_user_pwd  = 'R@ks@!!##@@..';
            
            
                    $data_api_cabang  = array("in_user_id"    =>  $_user_id,
                                              "in_user_pwd"   =>  $_user_pwd
                                            );
            
                    $web_unit = curl_init('https://202.152.50.222/mks_work_to_b/index.php/mks_api_list_cabang_mks/list_data_cabang');
            
                    curl_setopt($web_unit, CURLOPT_CUSTOMREQUEST , "POST");
                    curl_setopt($web_unit, CURLOPT_POSTFIELDS    , $data_api_cabang);
                    curl_setopt($web_unit, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($web_unit, CURLOPT_SSL_VERIFYPEER, false);
            
                    $result_unit  = curl_exec($web_unit);
                    $info_unit    = curl_getinfo($web_unit);
                    curl_close($web_unit);
            
                    $data_unit = json_decode($result_unit);
            
                    // echo $data_unit;
                    // exit;
            
                    $mkg_group_by_location = mkg_group_by_location($mkg_group);
                    $daerah  = corp_id_detail($mkg_group_by_location);
                    if ($daerah[1] == 'xxx') 
                    {
                        $daerah[1] = mkg_group_detail($mkg_group);
                    }

                    foreach ($data_unit->list_cabang as $mks_cabang) 
                    {
            
                        $corp_api = $mks_cabang->BRANCH_CODE;
            
                        // echo  $mkg_group_by_location."<br>";
                        // echo  $corp_api;
                        // exit;
            
                        if ($corp_api == $mkg_group_by_location) {
                            $hp1      = $mks_cabang->PHONE_NO1;
                            $hp2      = $mks_cabang->PHONE_NO2;
                        }
                        //  else {
                        //  $hp1      = 'UNKNOWN NO HP';
                        //  $hp2      = 'UNKNOWN NO HP';
                        // }
                    }

                  }

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

                
                    // Main Pengoalahan Data
                  {

                    // Pengantar hanya pada unit pertama
                    if($unit_no == '001')
                    {   
                      {
                        $pengantar = '<table border="" cellspacing="2"  >
                        <tr>
                        <td colspan ="2"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>';

                        $tanggal_indo = date('d M Y');
                        $pengantar.='<tr>
                            <td style="width:130" style="font-size:10;"><b>Tanggal Simulasi</b></td>
                            <td style="width:10" align="left">:</td>
                            <td width = "400" style="font-size:10;"><b>'.$daerah[0].', '.$digit_tgl.' '.$bulan_indo.date(' Y') .'</b></td>
                            <td></td>
                            <td></td>
                        </tr>';

                        $pengantar.='</table>';
                      }
                      $pdf->writeHTML($pengantar, true, false, true, false, '');
                    }
                
                      // Data Tertanggung Per-Unit
                    {

              
                      $variable = ${"html_" . $unit_no};
                          
                            $variable='<table border="" cellspacing="5" ><tr>
                            <td style="width:150"><h3>Unit '.substr($dat[unit_no],1,2).'</h3></td>
                            <td style="width:10" align="left"></td>
                            <td ><br></td>
                            <td></td>
                            <td></td>
                            </tr>';
                        

                            $variable.='<tr>
                            <td  style="font-size:10;">Nomor Register</td>
                            <td style="width:10" align="left">:</td>
                            <td width = "400" style="font-size:10;">'.$register_id.'</td>
                            <td></td>
                            <td></td>
                            </tr>';


                            $variable.='<tr>
                            <td  style="font-size:10;">Nama Tertanggung
                            </td>
                            <td style="width:10" align="left">:</td>
                            <td width = "400" style="font-size:10;">'.$customer_name.'</td>
                            <td></td>
                            <td></td>
                            </tr>';
                        
                            $tgl_awal           = date('d-m-Y',strtotime($dat[tgl_awal]));
                            $tgl_akhir          = date('d-m-Y',strtotime($dat[tgl_akhir]));
                            $variable.='<tr>
                            <td  style="font-size:10;">Periode Asuransi</td>
                            <td style="width:10" align="left">:</td>
                            <td style="width:500" colspan ="5" style="font-size:10;">'.$tgl_awal.' s/d '.$tgl_akhir.'<br>(Pada jam 12.00 siang waktu setempat)</td>
                            <td></td>
                            <td></td>
                            </tr>';
                        

                            if($tahun_buat <> '' || $tahun_buat <> null) { $tahun_buat = ', TAHUN '.$tahun_buat; }
                            if($no_polisi <> ''  || $no_polisi  <> null) { $no_polisi  = ', '.$no_polisi;  }
                            $variable.='<tr>
                            <td  style="font-size:10;">Objek Pertanggungan</td>
                            <td style="width:10" align="left">:</td>
                            <td colspan ="2" width="300" style="font-size:10;">'.$make.' '.$cate.' '.$model.' '.$tahun_buat.' '.$no_polisi.'</td>
                            <td></td>
                            <td></td>
                            </tr>';
                        
                            if($sum_ins <> '' || $sum_ins <> null) {$sum_ins_ket = 'IDR '.$sum_ins_conv;}
                            $variable.='<tr>
                            <td  style="font-size:10;">Harga Pertanggungan</td>
                            <td style="width:10" align="left">:</td>
                            <td style="font-size:10;">'.$sum_ins_ket.'</td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                    
                            
                        
                            $variable .='<tr>
                            <td style="width:250; font-size:12;"><b>PERHITUNGAN SIMULASI PREMI</b></td>
                            <td style="width:10" align="left"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>';

                  
                          $variable.='</table>';

                            
                    }    


                    $pdf->writeHTML($variable, true, false, true, false, '');

                      // Perhitungan Premi Per Tahun
                    {
                      $index = 1;
                      $check_year = array($dat[per_tgg_01], $dat[per_tgg_02], $dat[per_tgg_03],$dat[per_tgg_04],$dat[per_tgg_05]);
                      $batas_page = 0;
                        foreach ($check_year as $year)
                        {
                          
                          $tgg_index = '0'.$index;
                          $premi = ${"html_2_".$tgg_index."_".$unit_no};
                          
                          if($year <> '' || $year <> null)
                          { 
                            
                            {
                              $premi ='
                              <table border ="" cellspacing ="4">
                                  <tr>
                                      <td width ="150" style="font-size:10;"><hr>Tahun ke- '.$tgg_index.'<hr></td>
                                      <td width ="40"></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                  </tr>';
                          
                              if(${"rate_".$tgg_index."_persen"} <> '' || ${"rate_".$tgg_index."_persen"} <> null)
                              {
                                if(${"per_tgg_".$tgg_index} =='ARK')
                                {
                                  ${"per_tgg_".$tgg_index} = 'Comprehensive';
                                }
                                  $premi .='
                                  <tr>
                                        <td style="font-size:10;">'.${"per_tgg_".$tgg_index}.'</td>
                                        <td></td>
                                        <td style="font-size:10;" align="right" width = "100">'.$sum_ins_conv.'</td>
                                        <td align="right" width = "20">x</td>
                                        <td width = "75" align="right"  style="font-size:10;">'.${"rate_comp_".$tgg_index}.'%</td>
                                        <td align="center" width = "30"></td>
                                        <td width= "10"></td>
                                        <td style="font-size:10;"  width= "10">=</td>
                                        <td width= "30" style="font-size:10;" >IDR</td>
                                        <td  style="font-size:10; text-align:right;font-size:10;" width = "100">'.${"prem_rate_".$tgg_index."_conv"}.'</td>
                              
                                    </tr>';
                                    $batas_page++;
                                    
                              }

                              if(${"rscc_".$tgg_index} <> '' || ${"rscc_".$tgg_index} <> null)
                              {
                                  $premi .='<tr>
                                        <td style="font-size:10;">Huru Hara</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">'.${"rscc_".$tgg_index}.'%</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_rscc_".$tgg_index."_conv"}.'</td>
                                    </tr>';
                                    $batas_page++;

                              
                              }

                              if(${"derek_".$tgg_index} <> '' || ${"derek_".$tgg_index} <> null)
                              {
                                  $premi .='
                                    <tr>
                                        <td style="font-size:10;">Derek & Hotline Service</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">'.${"derek_".$tgg_index}.'%</td>
                                        <td align="center" ></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_derek_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"bengkel_".$tgg_index} <> '' || ${"bengkel_".$tgg_index} <> null)
                              {
                                  $premi .='
                                    <tr>
                                        <td style="font-size:10;">Bengkel Authorized</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">'.${"bengkel_".$tgg_index}.'%</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_bengkel_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"teroris_".$tgg_index} <> '' || ${"teroris_".$tgg_index} <> null)
                              {
                                    $premi .='
                                    <tr>
                                        <td style="font-size:10;">Terorisme</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">'.${"teroris_".$tgg_index}.'%</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_teroris_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"flood_".$tgg_index} <> '' || ${"flood_".$tgg_index} <> null)
                              {
                                    $premi .='
                                      <tr>
                                        <td style="font-size:10;">Banjir</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">'.${"flood_".$tgg_index}.'%</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td  width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_flood_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"eq_".$tgg_index} <> '' || ${"eq_".$tgg_index} <> null)
                              {
                                    $premi .='
                                      <tr>
                                        <td style="font-size:10;">Gempa Bumi</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">'.${"eq_".$tgg_index}.'%</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.$prem_eq_01_conv.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }     
                              
                              

                              if(${'si_driver_'.$tgg_index} <> '' || ${'si_driver_'.$tgg_index} <> null)
                              {
                                    $premi .='
                                      <tr>
                                        <td style="font-size:10;">PA Driver</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.number_format(${'si_driver_'.$tgg_index}).'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td style="font-size:10;" align="right">0.50000%</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"pa_si_driver_".$tgg_index."_conv"}.'</td>
                                      </tr>';
                                    $batas_page++;

                              }

                              if(${"pa_pass_".$tgg_index} <> '' || ${"pa_pass_".$tgg_index} <> null)
                              {
                                      $premi .='
                                      <tr>
                                        <td style="font-size:10;">PA Passenger</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.number_format(${"pa_pass_".$tgg_index}).'</td>
                                        <td style="text-align:right;font-size:10;" width = "20">x</td>
                                        <td align="right" style="font-size:10;">0.10000%</td>
                                        <td align="center" style="text-align:right;font-size:10;" width = "30">x</td>
                                        <td align="center" style="font-size:10;">'.${"qty_pass_".$tgg_index}.'</td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_pa_pass_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"tpl_".$tgg_index} <> '' || ${"tpl_".$tgg_index} <> null)
                                  {
                                        $premi .='
                                          <tr style="font-size:10;">
                                            <td>TJH Pihak Ketiga</td>
                                            <td></td>
                                            <td align="right">'.${"tpl_".$tgg_index."_conv"}.'</td>
                                            <td align="center"></td>
                                            <td align="right"></td>
                                            <td align="center"></td>
                                            <td></td>
                                            <td style="font-size:10;">=</td>
                                            <td width = "30">IDR</td>
                                            <td style="text-align:right">'.${"prem_tpl_".$tgg_index."_conv"}.'</td>
                                        </tr>';
                                        $batas_page++;

                                  
                                  }

                              if(${"prem_stnk_".$tgg_index."_conv"} <> '' || ${"prem_stnk_".$tgg_index."_conv"} <> null)
                              {
                                    $premi .='
                                    <tr>
                                        <td style="font-size:10;">STNK/BPKB</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.${"prem_stnk_".$tgg_index."_conv"}.'</td>
                                        <td style="text-align:center"></td>
                                        <td align="right"></td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width= "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right;font-size:10;">'.${"prem_stnk_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                                  
                              } 
                                    $premi .='
                                    </table>';
                            
                            }

                            
                                    // batas 41
                                if($batas_page < 30)
                                {
                                  $index++;
                                  $tambah_page = '';
                                }
                                else
                                {
                                  if($tambah_page == 'nambah')
                                  {
                                    $index++;
                                  }
                                  else
                                  {
                                    $tambah_page = $pdf->AddPage('P', 'A4');
                                    echo $tambah_page;
                                    $tambah_page = 'nambah';

                                    $index++;
                                  }
                                }
                          }
                          else
                          {
                            break;
                          }

                          $pdf->writeHTML($premi, true, false, true, false, '');
                          
                        } 

                          // total perhitungan premi beserta diskon
                        {
                        
                          $total_premi ='<hr></hr><table border ="" cellspacing ="4">';
                          $total_premi .='
                                
                                  <tr>
                                      <td width="168" style="font-size:10;"><b>Total Premi Per-Unit</b></td>
                                      <td width ="90"></td>
                                      <td width = "20"></td>
                                      <td width = "60"></td>
                                      <td width = "95"></td>
                                      <td width = "9"  style="font-size:10;">=</td>
                                      <td width = "30" style="font-size:10;">IDR</td>
                                      <td width = "100" align ="right" style="font-size:10;">'.$total_premi_prev_conv.'</td>
                                  </tr>    
                                ';

                          
                        if($short_rate == 'PRO_RATE') { $short_rate = 'Pro Rate';   }
                        if($short_rate =='SHORT_RATE'){ $short_rate = 'Short Rate'; }

                        if($short_rate <> '')
                        {
                          $total_premi .='
                                
                                  <tr>
                                      <td width="153"style="font-size:10;"><b>Total Premi '.$short_rate.'</b></td>
                                      <td width ="38"></td>
                                      <td width = "100"  align ="right"  style="font-size:10;">'.$total_premi_prev_conv.'</td>
                                      <td width = "20" align ="right">x</td>
                                      <td align ="right" width = "80" style="font-size:10;">'.$short_rate_metode.'/'.$tahun_total.'</td>
                                      <td align="center"></td>
                                      <td></td>
                                      <td width = "9" style="font-size:10;">=</td>
                                      <td width = "30" style="font-size:10;">IDR</td>
                                      <td width = "100" align ="right" style="font-size:10;">'.$total_premi_conv.'</td>
                                  </tr>';  
                        }
                          
                          $total_premi .='</table>';
                                
                                $pdf->writeHTML($total_premi, true, false, true, false, '');
                        }
                          
                          
                        
                    }


                    {


                          $subtable_luas = ${"subtable_".$unit_no};
                          $subtable_luas .='<table>
                                                <tr>
                                                    <td width="10">-</td>
                                                    <td width="500" style="font-size:10;">Rp. ' .number_format($deduc_01).' per kejadian untuk '.$per_tgg_01.'</td>
                                                </tr>';

                          if(count($perluasan_array) <> 0) 
                          {
                            $subtable_luas .='   <tr>
                                                      <td width="10">-</td>
                                                      <td width="500" style="font-size:10;">10% dari klaim, minimum IDR 500.000 per kejadian untuk '.$perluasan.'</td>
                                                  </tr>';
                          }
                          $subtable_luas .='
                                            </table>';


                          $subnote ='<table>
                                <tr>
                                    <td width="10"></td>
                                    <td width="60" style="font-size:10;">*) Catatan</td>
                                    <td width="10">:</td>
                                    <td>'.$subtable_luas.'</td>
                                </tr>';

                          $subnote .='
                                      </table>';
                                      
                            
                          $pdf->writeHTML($subnote, true, false, true, false, '');
                    
                      
                    }

                  

                  $pdf->AddPage('P', 'A4');
              }


              // keterangan perhitungan premi
              {               

                  $tgl_buat_source=date("d-m-Y",strtotime($tgl_buat));
                  $tgl_buat_convert=date("d-m-Y", strtotime($tgl_buat_source. '+14 days'));
                      
                  $subtable ='<table cellspacing = "4" border="">
                      <tr>
                        <td  width="10">-</td>
                        <td  style="font-size:10;" width="500">Suku Premi, Resiko Sendiri atau syarat ketentuan lainnya bisa berubah jika<br>terjadi klaim sebelum jatuh tempo polis berakhir.</td>
                      </tr>

                      <tr>
                        <td>-</td>
                        <td style="font-size:10;">Penutupan asuransi baru dan atau perluasan banjir Wajib dilakukan Survey</td>
                      </tr>

                      <tr>
                        <td>-</td>
                        <td style="font-size:10;">Hasil simulasi perhitungan premi bukan merupakan konfirmasi persetujuan penutupan asuransi</td>
                      </tr>

                      <tr>
                        <td>-</td>
                        <td style="font-size:10;">Simulasi perhitungan premi hanya berlaku sampai dengan tanggal '.$tgl_buat_convert.'<br>atau dinyatakan tidak berlaku jika sudah ada penerbitan polis</td>
                      </tr>
                      
                    </table>';

                }

              }

              $note =' <table><tr>
                      <td width="550" style="font-size:10;">Okupasi kendaraan digunakan untuk keperluan pribadi (kendaraan tidak disewakan atau digunakan sebagai taxi online atau penggunaan lain yang mendapatkan imbal jasa)</td>
                  </tr>';

                  $note .=' 
                  <tr>
                      <td width="10"></td>
                      <td width="60" style="font-size:10;">*) Catatan</td>
                      <td width="10">:</td>
                      <td>'.$subtable.'</td>
                      
                  </tr>';

                  $note .='</table>';
                              
                    
                  $pdf->writeHTML($note, true, false, true, false, '');

              $pdf->AddPage('P', 'A4');

              // SUMMARY
              {

                $summary = '<table border="" cellspacing = "10">
                <tr>
                    <td></td>
                    <td width ="100"></td>
                    <td width ="200"><h1><b>SUMMARY</b></h2></td>
                    <td></td>
                    <td></td>
                </tr></table><br><br>';
            
                $summary.='<table border="" cellspacing ="10">
                <tr>
                  <th width ="200" style="font-size:8;" align = "center"><h3>MERK & TYPE KENDARAAN</h3></th>
                  <th width ="100" style="font-size:8;" align = "center"><h3>TAHUN</h3></th>
                  <th width ="100" style="font-size:8;" align = "center"><h3>NO.POLISI</h3></th>
                  <th width ="40"  style="font-size:8;"></th>
                  <th width ="100" align = "center" style="font-size:8;"><h3>PREMI</h3></th>
                </tr>';

                


                foreach ($arr_res_p_premi['data'] as $dat) 
                {

                  if($dat[no_polisi] == '' || $dat[no_polisi] == null)
                  {
                    $dat[no_polisi] = '-';
                  }

                  if($dat[tahun_buat] == '' || $dat[tahun_buat] == null)
                  {
                    $dat[tahun_buat] = '-';
                  }

                  
                  $summary.='
                  <tr>
                    <td style="font-size:10;" align = "center">'.$dat[make].' '.$dat[cate].'</td>
                    <td align = "center" style="font-size:10;">'.$dat[tahun_buat].'</td>
                    <td align = "center" style="font-size:10;">'.$dat[no_polisi].'</td>
                    <td style="font-size:10;">IDR</td>
                    <td width ="80" style="text-align:right;font-size:10;">'.number_format($dat[total_premi]).'</td>
                  </tr>';

                }

                $summary.='
                <hr></hr>';

                $summary.='<hr></hr>';

                $summary.='
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>';

                $summary.='
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>';


                $summary.='
                <tr>
                  <td width ="230"></td>
                  <td width ="70" style="font-size:10;">Sub Total</td>
                  <td width ="100"></td>
                  <td width ="40" style="font-size:10;">IDR</td>
                  <td width ="80"  style="text-align:right;font-size:10;">'.number_format($arr_res_p_premi['total'][0][sum_total_premi]).'</td>
                </tr>';


                if($arr_res_p_premi['total'][0][sum_disc_debit] <> '' || $arr_res_p_premi['total'][0][sum_disc_debit] <> null)
                {
                  $summary.='
                  <tr>
                    <td width ="230"></td>
                    <td width ="70"  style="font-size:10;">Discount</td>
                    <td width ="100" style="font-size:10;">('.$disc_debit.'%)</td>
                    <td width ="40" style="font-size:10;">IDR</td>
                    <td width ="80"  style="text-align:right;font-size:10;">'.'-('.number_format($arr_res_p_premi['total'][0][sum_disc_debit]).')'.'</td>
                  </tr>';
                }

                // if($arr_res_p_premi['total'][0][sum_disc_credit] <> '' || $arr_res_p_premi['total'][0][sum_disc_credit] <> null)
                // {
                //   $summary.='
                //   <tr>
                //     <td width ="230"></td>
                //     <td width ="70" style="font-size:10;">Commission</td>
                //     <td width ="100" style="font-size:10;">('.$disc_credit.'%)</td>
                //     <td width ="40" style="font-size:10;">IDR</td>
                //     <td width ="80"  style="text-align:right;font-size:10;">'.'-('.number_format($arr_res_p_premi['total'][0][sum_disc_credit]).')'.'</td>
                //   </tr>';
                // }


                $summary.='
                <tr>
                  <td width ="230"></td>
                  <td width ="70"></td>
                  <td width ="100"></td>
                  <td width ="40"></td>
                  <td width ="100">___________</td>
                </tr>';

                // $summary.='<hr></hr><br><br>';

                $summary.='<br><br>
                <tr>
                  <td width ="230"></td>
                  <td width ="70" style="font-size:10;">Total Premi</td>
                  <td width ="100" ></td>
                  <td width ="40" style="font-size:10;">IDR</td>
                  <td width ="80"  style="text-align:right;font-size:10;">'.number_format($arr_res_p_premi['total'][0][grand_total_multi_debt]).'</td>
                </tr>';

                
                $summary.='
                <tr>
                  <td width ="230"></td>
                  <td width ="70" style="font-size:10;">Admin Cost</td>
                  <td width ="100" ></td>
                  <td width ="40" style="font-size:10;">IDR</td>
                  <td width ="80"  style="text-align:right;font-size:10;">'.number_format($arr_res_p_premi['total'][0][admin_cost]).'</td>
                </tr>';

                $summary.='
                <tr>
                  <td width ="230"></td>
                  <td width ="70"></td>
                  <td width ="100"></td>
                  <td width ="40"></td>
                  <td width ="100">___________</td>
                </tr>';
                

                // $summary.='<hr><br><br></hr>';


                $summary.='
                <tr>
                  <td width ="230"></td>
                  <td width ="100" style="font-size:10;">NET Premi</td>
                  <td width ="70" ></td>
                  <td width ="40" style="font-size:10;">IDR</td>
                  <td width ="80" style="text-align:right;font-size:10;">'.number_format($arr_res_p_premi['total'][0][net_total_multi]).'</td>
                </tr>';
                
                

                $summary.='</table>';
        
              }
              $pdf->writeHTML($summary, true, false, true, false, '');

        }
          
            date_default_timezone_set("Asia/Jakarta");
            $dateObj = DateTime::createFromFormat('U.u', microtime(TRUE));
            $dateObj->setTimeZone(new DateTimeZone('Asia/Jakarta'));
            $file_pdf  = md5(md5(md5($dateObj->format('YmdHisu'))));

            
            $file_qou      = "$register_id" . "_" . $file_pdf  . ".pdf";
            $path_epol     = $_SERVER['DOCUMENT_ROOT'] . 'mks/entry/bike/api/files/pdf/pdf_sim_v3/';
            $file_name_pdf = $path_epol . $file_qou;
            $pdf->Output( $file_name_pdf ,'F');

            $link         ='https://'.$_SERVER['SERVER_NAME'].'/mks/entry/bike/api/files/pdf/pdf_sim_v3/'.$file_qou;
            $b64Doc       = chunk_split(base64_encode(file_get_contents($file_name_pdf)));

            // unlink($file_qou);

            $return_simul = array(
              "status"  =>  200,
              "message"  =>  "Sukses",
              "link"    =>   $link, 
              "encode"  =>   $b64Doc
              );

              return $return_simul;
  }
    
}