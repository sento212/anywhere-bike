<?php
require_once(__DIR__ . '/../tcpdf/tcpdf.php');
use setasign\Fpdi;
require_once(__DIR__ . '/../fpdi/src/autoload.php');

function pdf_generate($sqlbuilder,$register_id,$kelas,$source,$water_mark){

// https://www.araksa.com/mks/entry/pdf_create_quotation_v3.php
  
ob_end_clean();

  class Pdf extends Fpdi\Tcpdf\Fpdi
  {
      protected $tplId;

      public $register_id;
      public $water_mark;
      public function Header()
      {
        global $register_id;
        global $water_mark;
          // get the current page break margin
          $bMargin = $this->getBreakMargin();
          // get current auto-page-break mode
          $auto_page_break = $this->AutoPageBreak;
          // disable auto-page-break
          $this->SetAutoPageBreak(false, 0);
          // set bacground image

          if($water_mark == 'YES')
          {
            $img_file = __DIR__ .'/../pdf_compenent/kop_surat_draft.jpg';
            $this->Image($img_file, 0, 0, 210, 299, '', '', '', false, 300, '', false, false, 0);
          }
          else
          {
            $img_file = __DIR__ .'/../pdf_compenent/kop_surat.jpg';
            $this->Image($img_file, 0, 0, 210, 299, '', '', '', false, 300, '', false, false, 0);
          }
        

          $this->SetFont('times', 'B', 9);
          $ss = '('.$this->getPageNumGroupAlias().'/'.$this->getPageGroupAlias().')';
          $this->MultiCell(55, 5, $ss, 0, 'R', 0, 0, '165', '272',false);

          $this->SetFont('times', '', 8);
          $versi = 'V3';
          $this->MultiCell(55, 5, $versi, 0, 'L', 0, 0, '5', '272',false);


          $this->SetFont('times', 'B', 6);
          $this->MultiCell(55, 100, $register_id, 0, 'R', 0, 0, '150', '23', false);

        
         
          $this->SetAutoPageBreak($auto_page_break, $bMargin);
          $this->SetFont('courier', '', 8);
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
  $pdf->SetTitle('Quotation');
  $pdf->SetSubject('Araksa');
  $pdf->SetKeywords('Araksa, Quotation Auto');


  $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
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
  $pdf->AddPage();
  // $pdf->SetFont('arial', '', 9);

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

                $tpl_01               =$dat['tpl_01'];
                $tpl_02               =$dat['tpl_02'];
                $tpl_03               =$dat['tpl_03'];
                $tpl_04               =$dat['tpl_04'];
                $tpl_05               =$dat['tpl_05'];

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

                $tahun_total          = $dat['tahun_total'];
                $short_rate_metode    = $dat['short_rate_value'];   
                $short_rate           = $dat['short_rate'];                    
      
                $total_premi          = $dat['total_premi'];
                $total_premi_prev     = $dat['total_premi_prev'];
                $nilai_disc_debit     = $dat['nilai_disc_debit'];
                $nilai_disc_credit    = $dat['nilai_disc_credit'];
                $grand_total          = $dat['grand_total_new'];

                $qty_pass_01         =$dat['qty_pass_01'];
                $qty_pass_02         =$dat['qty_pass_02'];
                $qty_pass_03         =$dat['qty_pass_03'];
                $qty_pass_04         =$dat['qty_pass_04'];
                $qty_pass_05         =$dat['qty_pass_05'];

                $rate_comp_01        =number_format($dat['rate_01_comp'],5);
                $rate_comp_02        =number_format($dat['rate_02_comp'],5);
                $rate_comp_03        =number_format($dat['rate_03_comp'],5);
                $rate_comp_04        =number_format($dat['rate_04_comp'],5);
                $rate_comp_05        =number_format($dat['rate_05_comp'],5);



                $pass_01_persen_conv  =$dat['qty_pass_01'] * 0.1;
                $pass_02_persen_conv  =$dat['qty_pass_02'] * 0.1;
                $pass_03_persen_conv  =$dat['qty_pass_03'] * 0.1;
                $pass_04_persen_conv  =$dat['qty_pass_04'] * 0.1;
                $pass_05_persen_conv  =$dat['qty_pass_05'] * 0.1;

                $si_driver_01         =$dat['si_driver_01'];
                $si_driver_02         =$dat['si_driver_02'];
                $si_driver_03         =$dat['si_driver_03'];
                $si_driver_04         =$dat['si_driver_04'];
                $si_driver_05         =$dat['si_driver_05'];

                $si_driver_01_conv    =number_format($dat['si_driver_01']);
                $si_driver_02_conv    =number_format($dat['si_driver_02']);
                $si_driver_03_conv    =number_format($dat['si_driver_03']);
                $si_driver_04_conv    =number_format($dat['si_driver_04']);
                $si_driver_05_conv    =number_format($dat['si_driver_05']);
                
                $pa_pass_01           =$dat['si_pass_01'];
                $pa_pass_02           =$dat['si_pass_02'];
                $pa_pass_03           =$dat['si_pass_03'];
                $pa_pass_04           =$dat['si_pass_04'];
                $pa_pass_05           =$dat['si_pass_05'];

                $pa_pass_01_conv      =number_format($dat['si_pass_01']);
                $pa_pass_02_conv      =number_format($dat['si_pass_02']);
                $pa_pass_03_conv      =number_format($dat['si_pass_03']);
                $pa_pass_04_conv      =number_format($dat['si_pass_04']);
                $pa_pass_05_conv      =number_format($dat['si_pass_05']);


                $qq1                  = $dat[qq1];
                $qq2                  = $dat[qq2];

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
                $adm_cost_conv             = number_format($dat['admin_cost']);


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
            
                $total_premi          = $dat['total_premi'];
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
                $header = array('Content-Type: multipart/form-data');
                $data_unit_name = $sqlbuilder->api('POST',$url_api, $data_api, $header);
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
                  $rate_01_persen       = "$rate_01 %";
                  // $rate_02              = intval($unit['rate_02']);
                  $rate_02_persen       = "$rate_02 %";
                  // $rate_03              = intval($unit['rate_03']);
                  $rate_03_persen       = "$rate_03 %";
                  // $rate_04              = intval($unit['rate_04']);
                  $rate_04_persen       = "$rate_04 %";
                  // $rate_05              = intval($unit['rate_05']);
                  $rate_05_persen       = "$rate_05 %";
              
                  //RUMUS TAMPIL
                  // $show_rumus_rate_01 = "$sum_ins_conv x $unit[rate_01]%";
                  
              
                  // if ( $l_rate_01 == '' ) { $rate_hull_01 = "$sum_ins_conv x $unit[rate_01]"; } else { $rate_hull_01 = "$sum_ins_conv x ($unit[rate_01]%+($unit[rate_01]% x $l_rate_01_conv %))"; }
                  // if ( $l_rate_02 == '' ) { $rate_hull_02 = "$sum_ins_conv x $unit[rate_02]"; } else { $rate_hull_02 = "$sum_ins_conv x ($unit[rate_02]%+($unit[rate_02]% x $l_rate_02_conv %))"; }
                  // if ( $l_rate_03 == '' ) { $rate_hull_03 = "$sum_ins_conv x $unit[rate_03]"; } else { $rate_hull_03 = "$sum_ins_conv x ($unit[rate_03]%+($unit[rate_03]% x $l_rate_03_conv %))"; }
                  // if ( $l_rate_04 == '' ) { $rate_hull_04 = "$sum_ins_conv x $unit[rate_04]"; } else { $rate_hull_04 = "$sum_ins_conv x ($unit[rate_04]%+($unit[rate_04]% x $l_rate_04_conv %))"; }
                  // if ( $l_rate_05 == '' ) { $rate_hull_05 = "$sum_ins_conv x $unit[rate_05]"; } else { $rate_hull_05 = "$sum_ins_conv x ($unit[rate_05]%+($unit[rate_05]% x $l_rate_05_conv %))"; }
        
                
                }
              }

              {

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

            
                //Main Pengoalahan Data
              {

                  //Pengantar hanya pada unit pertama
                if($unit_no == '001')
                {   
                  {
                    $pengantar = '<table border="" cellspacing="2"  style="font-size:10;">
                    <tr>
                    <td colspan ="2"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';

                    $tanggal_indo = date('d M Y');
                    $pengantar.='<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td  width = "50" ></td>
                    <td width ="220"  style="font-size:10;">'.$daerah[0].', '.$digit_tgl.' '.$bulan_indo.date(' Y') .'<br><br></td>
                    </tr>';

                    $pengantar.='<tr>
                    <td width = "550" style="font-size:10;">Kepada Yth,<br>'.$customer_name.''.$customer_add.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';

                    $pengantar.='<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';

                  

                    if (strlen($ext_polis)>4) 
                    {
                      $ket_perihal = 'Perihal : Penawaran Perpanjangan Polis Asuransi No '.$ext_polis.'';

                    } else {
                      $ket_perihal = 'Perihal : Penawaran Penutupan Asuransi Kendaraan Bermotor';
                    }
                  

                    $pengantar.='<tr>
                    <td colspan ="3" width="500" style="font-size:10;">'.$ket_perihal.'<br></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';

                    $pengantar.='<tr>
                    <td style="font-size:10;">Dengan Hormat,<br></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';

                    $pengantar.='<tr>
                    <td colspan ="6" style="font-size:10;">Dengan ini kami sampaikan Penawaran Asuransi Kendaraan Bermotor dengan syarat dan ketentuan sebagai berikut :</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr></table>';
                  }
                  $pdf->writeHTML($pengantar, true, false, true, false, '');
                }
            
                  //Data Tertanggung Per-Unit
                {

          
                  $variable = ${"html_" . $unit_no};
                      
                        $variable='<table border="" cellspacing="5" ><tr>
                        <td width=125  style="font-size:10;"><h3>Unit '.substr($dat[unit_no],1,2).'</h3></td>
                        <td width=10   style="font-size:10;"></td>
                        <td ></td>
                        <td></td>
                        <td></td>
                        </tr>';
                    
                        $variable.='<tr style="font-size:10;">
                        <td style="font-size:10;">Nama Tertanggung
                        </td>
                        <td width="10" >:</td>
                        <td width="400" style="font-size:10;">'.$customer_name.'</td>
                        <td></td>
                        <td></td>
                        </tr>';


                        // $variable.='<tr style="font-size:10;">
                        // <td></td>
                        // <td style="font-size:10;">QQ</td>
                        // <td width="10" >:</td>
                        // <td width="400" style="font-size:10;">'.$qq1.'</td>
                        // <td></td>
                        // </tr>';
                    
                        $variable.='<tr style="font-size:10;">
                        <td>Alamat</td>
                        <td width=10 align="left">:</td>
                        <td colspan ="2" style="font-size:10;">'.$customer_add.'</td>
                        <td></td>
                        <td></td>
                        </tr>';
                    
                        $tgl_awal           = date('d-m-Y',strtotime($dat[tgl_awal]));
                        $tgl_akhir          = date('d-m-Y',strtotime($dat[tgl_akhir]));
                        $variable.='<tr style="font-size:10;">
                        <td style="font-size:10;">Periode Asuransi</td>
                        <td width="10">:</td>
                        <td widt="500"; style="font-size:10;" colspan ="5">'.$tgl_awal.' s/d '.$tgl_akhir.'<br>(Pukul 12.00 siang waktu setempat dimana obyek pertanggungan berada)</td>
                        <td></td>
                        <td></td>
                        </tr>';
                    

                        if($tahun_buat <> '' || $tahun_buat <> null) { $tahun_buat = ', TAHUN '.$tahun_buat; }
                        if($no_polisi <> ''  || $no_polisi  <> null) { $no_polisi  = ', '.$no_polisi;  }
                        $variable.='<tr>
                        <td style="font-size:10;">Objek Pertanggungan</td>
                        <td width=10 align="left">:</td>
                        <td colspan ="2" width="300" style="font-size:10;">'.$make.' '.$cate.' '.$model.' '.$tahun_buat.' '.$no_polisi.'</td>
                        <td></td>
                        <td></td>
                        </tr>';

                        $variable.='<tr style="font-size:10;">
                        <td></td>
                        <td></td>
                        <td>No Rangka</td>
                        <td width="10"  align="left">:</td>
                        <td width="200" style="font-size:10;">'.$no_chasis.'</td>
                        </tr>';
                
                        $variable.='<tr style="font-size:10;">
                        <td></td>
                        <td></td>
                        <td>No Mesin</td>
                        <td width="10" align="left">:</td>
                        <td style="font-size:10;">'.$no_mesin.'</td>
                        </tr>';
                
                        $variable.='<tr style="font-size:10;">
                        <td></td>
                        <td></td>
                        <td>Warna</td>
                        <td width="10" align="left">:</td>
                        <td style="font-size:10;">'.$warna.'</td>
                        </tr>';
                
                        $variable.='<tr style="font-size:10;">
                        <td></td>
                        <td></td>
                        <td>Penggunaan</td>
                        <td width="10" align="left">:</td>
                        <td style="font-size:10;">'.$status.'</td>
                        </tr>';
                
                    
                        
                        if($sum_ins <> '' || $sum_ins <> null) {$sum_ins_ket = 'IDR '.$sum_ins_conv;}
                        $variable.='<tr style="font-size:10;">
                        <td style="font-size:10;">Harga Pertanggungan</td>
                        <td width="10" align="left">:</td>
                        <td style="font-size:10;">'.$sum_ins_ket.'</td>
                        <td></td>
                        <td></td>
                        </tr>';

                        if($per_tgg_01 =='ARK')
                        {
                          $per_tgg_01 = 'Comprehensive';
                        }

                        if($per_tgg_01 =='TLO')
                        {
                          $per_tgg_01 ='TLO';
                        } 

                        {

                                if($l_rate_01_conv <> '')
                                {
                                  $loading_rate = '(Loading Rate = '.$l_rate_01_conv.'%)';
                                }
                                $compre = '<table border = "" style="font-size:10;">
                                              <tr>
                                                <td width ="15" style="font-size:10;">#</td>
                                                <td width ="325" style="font-size:10;">'.$per_tgg_01.' '.$loading_rate.'</td>
                                                <td></td>
                                                <td></td>
                                              </tr>
                
                                              <tr>
                                                <td></td>
                                                <td width ="100" style="font-size:10;">Suku Premi</td>
                                                <td width ="10">:</td>
                                                <td width ="300" style="font-size:10;">'.$rate_01_persen.'</td>
                                              </tr>
                
                                              <tr>
                                                <td></td>
                                                <td style="font-size:10;">Resiko Sendiri</td>
                                                <td style="font-size:10;">:</td>
                                                <td style="font-size:10;" width = "500">IDR ' .number_format($deduc_01).' setiap kejadian</td>
                                              </tr>
                                            </table>
                                          ';
                          
                                  
                                  $drk = '<table border = "" style="font-size:10;">
                                      <tr>
                                        <td  width ="15" style="font-size:10;">#</td>
                                        <td width ="325" style="font-size:10;">Derek & Hotline Service 24 jam</td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                
                                      <tr>
                                        <td></td>
                                        <td width ="100" style="font-size:10;">Suku Premi</td>
                                        <td width ="10"  style="font-size:10;">:</td>
                                        <td width ="300" style="font-size:10;">'.$derek_01.' %</td>
                                      </tr>
                        
                                    </table>
                                  ';
                          
                
                              $bkl = '<table border = "" style="font-size:10;">
                                  <tr>
                                    <td width ="15"  style="font-size:10;">#</td>
                                    <td width ="325" style="font-size:10;">Bengkel Authorized</td>
                                    <td ></td>
                                    <td></td>
                                  </tr>
                
                                  <tr>
                                    <td></td>
                                    <td width ="100" style="font-size:10;">Suku Premi</td>
                                    <td width ="10"  style="font-size:10;">:</td>
                                    <td width ="300" style="font-size:10;">'.$bengkel_01.' %</td>
                                  </tr>
                
                                  
                                </table>
                              ';

                          
                
                                $driver = '<table border = "" style="font-size:10;">
                                    <tr>
                                      <td width ="15"   style="font-size:10;">#</td>
                                      <td width ="325"  style="font-size:10;">PA Driver limit IDR '.$si_driver_01_conv.'</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td width ="100" style="font-size:10;">Suku Premi</td>
                                      <td width ="10"  style="font-size:10;">:</td>
                                      <td width ="300" style="font-size:10;">0.50000 %</td>
                                    </tr>
                
                                  </table>
                                ';
                      

                                $passanger = '<table border = "" style="font-size:10;">
                                    <tr>
                                      <td width ="15"  style="font-size:10;">#</td>
                                      <td width ="425" style="font-size:10;">PA Passanger limit IDR '.$pa_pass_01_conv.' (per orang/ maksimum 4 orang)</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td width ="100" style="font-size:10;">Suku Premi</td>
                                      <td width ="10"  style="font-size:10;">:</td>
                                      <td width ="300" style="font-size:10;">'.number_format(strval($pass_01_persen_conv),5).' %</td>
                                    </tr>
                
                                  </table>
                                ';
                        
                                $rusuh = '<table border = "" style="font-size:10;">
                                    <tr>
                                      <td width ="15"   style="font-size:10;">#</td>
                                      <td width ="325"  style="font-size:10;">Huru-Hara, Kerusuhan</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td width ="100" style="font-size:10;">Suku Premi</td>
                                      <td width ="10"  style="font-size:10;">:</td>
                                      <td width ="300" style="font-size:10;">'.$rscc_01.' %</td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td style="font-size:10;">Resiko Sendiri</td>
                                      <td style="font-size:10;">:</td>
                                      <td width = "500" style="font-size:10;">10% dari nilai klaim yang disetujui, minimum  IDR 500.000 setiap kejadian</td>
                                    </tr>
                                    
                                  </table>
                                ';
                
                                
                                $gempa = '<table border = "" style="font-size:10;">
                                    <tr >
                                      <td width ="15"   >#</td>
                                      <td width ="325"  >Gempa Bumi, Letusan Gunung Berapi dan Tsunami</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td width ="100" >Suku Premi</td>
                                      <td width ="10"  >:</td>
                                      <td width ="300" >'.$eq_01.' %</td>
                                    </tr>
                
                
                                    <tr style="font-size:10;">
                                      <td></td>
                                      <td >Resiko Sendiri</td>
                                      <td style="font-size:10;">:</td>
                                      <td width = "500" style="font-size:10;">10% dari nilai klaim yang disetujui, minimum  IDR 500.000 setiap kejadian</td>
                                    </tr>
                                    
                                  </table>
                                ';
              

                                $banjir = '<table border = "">
                                      <tr style="font-size:10;">
                                        <td width ="15"   >#</td>
                                        <td width ="325"  >Banjir, Angin Topan dan Badai</td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                  
                                      <tr>
                                        <td></td>
                                        <td width ="100" style="font-size:10;">Suku Premi</td>
                                        <td width ="10"  style="font-size:10;">:</td>
                                        <td width ="300" style="font-size:10;">'.$flood_01.' %</td>
                                      </tr>
                  
                  
                                      <tr>
                                        <td></td>
                                        <td style="font-size:10;">Resiko Sendiri</td>
                                        <td style="font-size:10;">:</td>
                                        <td width = "500" style="font-size:10;">10% dari nilai klaim yang disetujui, minimum  IDR 500.000 setiap kejadian</td>
                                      </tr>
                                      
                                    </table>
                                  ';
                      
                
                                $teroris_sab = '<table border = "">
                                    <tr>
                                      <td width ="15" style="font-size:10;">#</td>
                                      <td width ="325" style="font-size:10;">Terrorisme dan Sabotase</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td width ="100" style="font-size:10;">Suku Premi</td>
                                      <td width ="10"  style="font-size:10;">:</td>
                                      <td width ="300" style="font-size:10;">'.$teroris_01.'</td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td style="font-size:10;">Resiko Sendiri</td>
                                      <td style="font-size:10;">:</td>
                                      <td width = "500" style="font-size:10;">10% dari nilai klaim yang disetujui, minimum IDR 500.000 setiap kejadian</td>
                                    </tr>
                                    
                                  </table>
                                ';
                        
                                $jawab = '<table border = "">
                                    <tr>
                                      <td width ="15" style="font-size:10;">#</td>
                                      <td width ="500" style="font-size:10;">Tanggung Jawab Hukum terhadap Pihak Ketiga limit s/d IDR '.$tpl_01_conv.'</td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                
                                    <tr>
                                      <td></td>
                                      <td width ="100" style="font-size:10;">Suku Premi</td>
                                      <td width ="10" style="font-size:10;">:</td>
                                      <td width ="300" style="font-size:10;">IDR '.$prem_tpl_01_conv.'</td>
                                    </tr>
                                  </table>
                                ';
                        
                        }
                
                        $variable.='<tr>
                        <td style="font-size:10;">Lingkup Jaminan</td>
                        <td style="width:10" align="left">:</td>
                        <td colspan ="4"></td>
                        <td></td>
                        <td></td>
                        </tr><br>';
                
                        {

                          if ($rate_01_persen <> '' && $rate_01_persen <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$compre.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }
                
                          if ($derek_01 <> '' && $derek_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$drk.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }
                
                          if($bengkel_01 <> '' && $bengkel_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$bkl.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }
                
                          if($pa_si_driver_01 <> '' && $pa_si_driver_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$driver.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }

                          
                          if($pa_pass_01 <> '' && $pa_pass_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$passanger.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }

                          if($rscc_01 <> '' && $rscc_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$rusuh.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }

                          if($flood_01 <> '' && $flood_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$banjir.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }
                
                          if($eq_01 <> '' && $eq_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$gempa.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }
                
                          if($teroris_01 <> '' && $teroris_01 <> null)
                          {
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$teroris_sab.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr><br>';
                          }

                          if($prem_tpl_01 <> '' && $prem_tpl_01 <> null)
                          {
                  
                            $variable.='<tr>
                            <td style="width:40"></td>
                            <td style="width:100 font-size:10">'.$jawab.'</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            </tr>';
                          }
                          $variable.='</table><br>';
                        }
                }    
                $pdf->writeHTML($variable, true, false, true, false, '');



                  //Perhitungan Premi
                $pdf->addPage();

                      //Judul Perhitungan premi
                    {
                      $jdl_premi = ${"html_2_".$unit_no}; 
                      $jdl_premi ='<tr style="font-size:10;">
                            <td style="width:120 font-size:10">Perhitungan Premi</td>
                            <td style="width:10 font-size:10" align="left">:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>';


                        $pdf->writeHTML($jdl_premi, true, false, true, false, '');
                    }
                      

                      //Perhitungan Premi Per Tahun
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
                              <table border ="" cellspacing ="4" >
                                  <tr style="font-size:10;" >
                                      <td width ="120" style="font-size:10;"><hr>Tahun ke- '.$tgg_index.'<hr></td>
                                      <td width ="40" style="font-size:10;"></td>
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
                                  <tr style="font-size:10;">
                                        <td style="font-size:10;" width = "150">'.${"per_tgg_".$tgg_index}.'</td>
                                        <td></td>
                                        <td align="right" width = "100" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td align="right" width = "20" style="font-size:10;">x</td>
                                        <td width = "75" align="right"  style="font-size:10;">'.${"rate_comp_".$tgg_index}.' %</td>
                                        <td align="center" width = "30" style="font-size:10;"></td>
                                        <td width = "30" ></td>
                                        <td width = "10" style="font-size:10;">=</td>
                                        <td width = "30" style="font-size:10;">IDR</td>
                                        <td width = "100" style="text-align:right font-size:10;">'.${"prem_rate_".$tgg_index."_conv"}.'</td>
                              
                                    </tr>';
                                    $batas_page++;
                                    
                              }

                              if(${"rscc_".$tgg_index} <> '' || ${"rscc_".$tgg_index} <> null)
                              {
                                  $premi .='<tr style="font-size:10;">
                                        <td style="font-size:10;">Huru Hara</td>
                                        <td></td>
                                        <td align="right" style="font-size:10;">'.$sum_ins_conv.'</td>
                                        <td align="right" style="font-size:10;">x</td>
                                        <td align="right" style="font-size:10;">'.${"rscc_".$tgg_index}.' %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30" style="font-size:10;">IDR</td>
                                        <td style="text-align:right font-size:10;">'.${"prem_rscc_".$tgg_index."_conv"}.'</td>
                                    </tr>';
                                    $batas_page++;

                              
                              }

                              if(${"derek_".$tgg_index} <> '' || ${"derek_".$tgg_index} <> null)
                              {
                                  $premi .='
                                    <tr style="font-size:10;">
                                        <td >Derek & Hotline Service</td>
                                        <td></td>
                                        <td align="right">'.$sum_ins_conv.'</td>
                                        <td align="right">x</td>
                                        <td align="right">'.${"derek_".$tgg_index}.' %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"prem_derek_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"bengkel_".$tgg_index} <> '' || ${"bengkel_".$tgg_index} <> null)
                              {
                                  $premi .='
                                    <tr style="font-size:10;">
                                        <td>Bengkel Authorized</td>
                                        <td></td>
                                        <td align="right">'.$sum_ins_conv.'</td>
                                        <td align="right">x</td>
                                        <td align="right">'.${"bengkel_".$tgg_index}.' %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"prem_bengkel_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"teroris_".$tgg_index} <> '' || ${"teroris_".$tgg_index} <> null)
                              {
                                    $premi .='
                                    <tr style="font-size:10;">
                                        <td>Terorisme</td>
                                        <td></td>
                                        <td align="right">'.$sum_ins_conv.'</td>
                                        <td align="right">x</td>
                                        <td align="right">'.${"teroris_".$tgg_index}.' %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"prem_teroris_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"flood_".$tgg_index} <> '' || ${"flood_".$tgg_index} <> null)
                              {
                                    $premi .='
                                      <tr style="font-size:10;">
                                        <td>Banjir</td>
                                        <td></td>
                                        <td align="right">'.$sum_ins_conv.'</td>
                                        <td align="right">x</td>
                                        <td align="right">'.${"flood_".$tgg_index}.' %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"prem_flood_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${"eq_".$tgg_index} <> '' || ${"eq_".$tgg_index} <> null)
                              {
                                    $premi .='
                                      <tr style="font-size:10;">
                                        <td>Gempa Bumi</td>
                                        <td></td>
                                        <td align="right" align="right">'.$sum_ins_conv.'</td>
                                        <td align="right">x</td>
                                        <td align="right">'.${"eq_".$tgg_index}.' %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.$prem_eq_01_conv.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                              }

                              if(${'si_driver_'.$tgg_index} <> '' || ${'si_driver_'.$tgg_index} <> null)
                              {
                                    $premi .='
                                      <tr style="font-size:10;">
                                        <td>PA Driver</td>
                                        <td></td>
                                        <td align="right">'.number_format(${'si_driver_'.$tgg_index}).'</td>
                                        <td align="right">x</td>
                                        <td align="right">0.50000 %</td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"pa_si_driver_".$tgg_index."_conv"}.'</td>
                                      </tr>';
                                    $batas_page++;

                              }

                              if(${"pa_pass_".$tgg_index} <> '' || ${"pa_pass_".$tgg_index} <> null)
                              {
                                      $premi .='
                                      <tr style="font-size:10;">
                                        <td>PA Passenger</td>
                                        <td></td>
                                        <td align="right">'.number_format(${"pa_pass_".$tgg_index}).'</td>
                                        <td align="right">x</td>
                                        <td align="right">0.10000 %</td>
                                        <td align="center">x</td>
                                        <td align="center">'.${"qty_pass_".$tgg_index}.'</td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"prem_pa_pass_".$tgg_index."_conv"}.'</td>
                                        
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
                                    <tr style="font-size:10;">
                                        <td>STNK/BPKB</td>
                                        <td></td>
                                        <td align="right">'.${"prem_stnk_".$tgg_index."_conv"}.'</td>
                                        <td style="text-align:center"></td>
                                        <td align="right"></td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td style="font-size:10;">=</td>
                                        <td width = "30">IDR</td>
                                        <td style="text-align:right">'.${"prem_stnk_".$tgg_index."_conv"}.'</td>
                                        
                                    </tr>';
                                    $batas_page++;

                                  
                              } 
                                    $premi .='
                                    </table>';
                            
                            }

                                if($batas_page < 33)
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
                                    $tambah_page = $pdf->addPage();
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

                      
                        $total_premi_html ='<hr></hr><table border ="" cellspacing ="4">';
                          // if($total_premi_conv <> '' || $total_premi_conv == null)
                          {
                            $total_premi_html .='
                                    <tr style="font-size:10;">
                                        <td width ="195">Total Premi Per-Unit</td>
                                        <td width ="100"></td>
                                        <td width = "20"></td>
                                        <td width = "75"></td>
                                        <td width = "64"></td>
                                        <td width = "9">=</td>
                                        <td width = "30">IDR</td>
                                        <td width ="100" style="text-align:right">'.$total_premi_prev_conv.'</td>
                                    </tr>';
                          }



                          // if($nilai_disc_debit_conv <> '' || $nilai_disc_debit_conv == null)
                          // {
                      
                          //   $total_premi_html .='
                          //             <tr style="font-size:10;">
                          //                 <td>Diskon</td>
                          //                 <td width ="90"></td>
                          //                 <td width = "20"></td>
                          //                 <td width = "75" align = "right">'.$disc_debit.'%</td>
                          //                 <td width = "60"></td>
                          //                 <td width = "9">=</td>
                          //                 <td width = "30">IDR</td>
                          //                 <td style="text-align:right">- '.$nilai_disc_debit_conv.'</td>
                          //             </tr>';
                          // }

                          

                          // $total_premi_html .='<hr></hr><br>';

                        //  if($grand_total_conv <> '' || $grand_total_conv == null)
                          // {
                          //   $total_premi_html .='
                          //         <tr style="font-size:10;">
                          //             <td >Total Premi Per-Unit</td>
                          //             <td width ="90"></td>
                          //             <td width = "20"></td>
                          //             <td width = "75"></td>
                          //             <td width = "60"></td>
                          //             <td width = "9">=</td>
                          //             <td width = "30">IDR</td>
                          //             <td align ="right">'.$grand_total_conv.'</td>
                          //         </tr>';
                          // }


                          if($short_rate == 'PRO_RATE') { $short_rate = 'Pro Rate';   }
                            if($short_rate =='SHORT_RATE'){ $short_rate = 'Short Rate'; }

                            if($short_rate <> '')
                            {
                              $total_premi_html .='
                                    
                                      <tr>
                                          <td width="195"style="font-size:10;"><b>Total Premi '.$short_rate.'</b></td>
                                          <td width = "100"  align ="right"  style="font-size:10;">'.$total_premi_prev_conv.'</td>
                                          <td width = "20" style="font-size:10;" align ="right">x</td>
                                          <td align ="right" width = "75" style="font-size:10;">'.$short_rate_metode.'/'.$tahun_total.'</td>
                                          <td align="center"></td>
                                          <td width = "9">=</td>
                                          <td width = "30" style="font-size:10;">IDR</td>
                                          <td width = "100" align ="right" style="font-size:10;">'.$total_premi_conv.'</td>
                                      </tr>';  
                            }
                                  
                          $total_premi_html .='
                                </table>';
                                $pdf->writeHTML($total_premi_html, true, false, true, false, '');

                        
                        
                    }
                    $pdf->addPage();
                
                  
              }
          }

                //keterangan premi   
                {
                      $ket_premi =
                      '<table border="">
                        <br><br>
                        <tr  style="font-size:10;">
                              <td width ="50">Note:</td>
                              <td width ="10">-</td>
                              <td width ="630">Kendaraan Tidak Disewakan atau Digunakan Sebagai Taxi Online atau Penggunaan Lain yang Mendapatkan
                              Imbalan Jasa.</td>
                      </tr>
                      <tr  style="font-size:10;">
                            <td></td>
                            <td >-</td>
                            <td>Kendaraan Wajib Disurvey.</td>
                      </tr>
          
                      <tr  style="font-size:10;">
                        <br>
                        <td width ="650"><p>Kami informasikan bahwa Ringkasan Informasi Produk Asuransi Kendaraan Bermotor dapat Bapak/Ibu Unduh di www.araksa.com
                        Ringkasan Produk.</p>
                        <p>Demikian surat penawaran ini kami sampaikan, apabila Bapak/Ibu ingin menanyakan lebih lanjut terkait penawaran ini atau telah
                        menyetujui penawaran kami, Bapak/Ibu bisa menghubungi kami di '. $hp1 .' / '. $daerah[1].' untuk proses lebih lanjut.
                        Kami ucapkan terima kasih atas kesempatan yang diberikan.</p></td>
                        <td></td>
                        <td></td>
                      </tr>
                              
                      
                      </table>';
          
          
                      $ket_premi.=
                      '<table border="">
          
                          <tr  style="font-size:10;">
                            <td colspan ="3"><br><br><>Hormat Kami,<br><br></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
          
                          <tr>
                            <td style="height:60px;"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>

                          <tr>
                            <td style="height:10px;width:500;font-size:10;">'.$mkg_full_name.'</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>

                          <tr>
                            <td colspan ="3"  style="text-align:left;font-size:10;"><br>ACCOUNT OFFICER</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
          
                          <tr>
                            <td colspan ="2" style="font-size:10;"><br><br><br> Catatan Penting:</td>
                            <td> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
          
                          <tr style="font-size:10;">
                            <td style="width:20px;text-align:right;"><br><br>1.  </td>
                            <td style="width:7" align="right"></td>
                            <td style="text-align:left;width:100%;"><br><br>PT Asuransi Raksa Pratikara telah berizin dan diawasi oleh Otoritas Jasa Keuangan.</td>
          
                          </tr>
          
                          <tr style="font-size:10;">
                            <td style="width:20px;text-align:right;"><br><br>2.  </td>
                            <td style="width:7" align="right"></td>
                            <td style="text-align:left;width:100%;"><br><br>Produk Asuransi Kendaraan Bermotor PT. Asuransi Raksa Pratikara telah disetujui oleh dan tercatat oleh OJK (Otoritas Jasa
                            Keuangan).
                            </td>
                          </tr>
          
                          <tr style="font-size:10;">
                            <td style="width:20px;text-align:right;"><br><br>3.  </td>
                            <td style="width:7" align="right"></td>
                            <td align="justify" style="text-align:left;width:100%;"><br><br>PT. Asuransi Raksa Pratikara akan merahasiakan setiap data / informasi yang diberikan oleh Pemohon baik yang diberikan
                            atau disampaikan secara lisan, tertulis, atau yang disampaikan melalui media elektronik atau data / informasi dalam bentuk
                            lainnya kecuali data-data atau informasi yang sudah merupakan informasi umum yang diperoleh dari media massa atau cetak
                            maupun elektronik.
                            </td>
                          </tr>
                      </table>';
                      $pdf->writeHTML($ket_premi, true, false, true, false, '');
                      
                }
                


                //SUMMARY
              $pdf->addPage();
                {

                      $summary = '<table border="" cellspacing = "10">
                      <tr>
                      <td></td>
                      <td width ="130"></td>
                      <td width ="330"><h1>SUMMARY</h1></td>
                      <td></td>
                      <td></td>
                      </tr></table><br><br>';
                  
                      $summary.='<table border="" cellspacing ="10">
                      <tr style="font-size:8;">
                        <th width ="200"><h3>MERK & TYPE KENDARAAN</h3></th>
                        <th width ="100" align = "center"><h3>TAHUN</h3></th>
                        <th width ="100"  align = "center"><h3>NO.POLISI</h3></th>
                        <th width ="40"></th>
                        <th width ="100" align = "center"><h3>PREMI</h3></th>
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
                        <tr style="font-size:10;">
                          <td>'.$dat[make].' '.$dat[cate].'</td>
                          <td align = "center">'.$dat[tahun_buat].'</td>
                          <td align = "center">'.$dat[no_polisi].'</td>
                          <td>IDR</td>
                          <td width ="100" style="text-align:right">'.number_format($dat[total_premi]).'</td>
                        </tr>';

                      }

                    //   $summary.='
                    // <hr></hr>';

                      $summary.='<hr></hr>';

                      // $summary.='<br><br>
                      // <tr>
                      //   <td></td>
                      //   <td></td>
                      //   <td></td>
                      //   <td></td>
                      //   <td></td>
                      // </tr>';

                      $summary.='
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>';


                      $summary.='
                      <tr style="font-size:10;">
                        <td width ="230"></td>
                        <td width ="70">Sub Total</td>
                        <td width ="100"></td>
                        <td width ="40">IDR</td>
                        <td width ="100" style="text-align:right">'.number_format($arr_res_p_premi['total'][0][sum_total_premi]).'</td>
                      </tr>';


                      if($arr_res_p_premi['total'][0][sum_disc_debit] <> '' || $arr_res_p_premi['total'][0][sum_disc_debit] <> null)
                      {
                        $summary.='
                        <tr style="font-size:10;">
                          <td width ="230"></td>
                          <td width ="70">Discount</td>
                          <td width ="100" style="font-size:10;">('.$disc_debit.'%)</td>
                          <td width ="40">IDR</td>
                          <td width ="100" style="text-align:right">'.'-('.number_format($arr_res_p_premi['total'][0][sum_disc_debit]).')'.'</td>
                        </tr>';
                      }

                      // if($arr_res_p_premi['total'][0][sum_disc_credit] <> '' || $arr_res_p_premi['total'][0][sum_disc_credit] <> null)
                      // {
                      //   $summary.='
                      //   <tr style="font-size:10;">
                      //     <td width ="230"></td>
                      //     <td width ="70"></td>
                      //     <td width ="100">Commission</td>
                      //     <td width ="40">IDR</td>
                      //     <td width ="80" style="text-align:right">'.'-('.number_format($arr_res_p_premi['total'][0][sum_disc_credit]).')'.'<br></td>
                      //   </tr>';
                      // }


                      $summary.='
                      <tr style="font-size:10;">
                        <td width ="230"></td>
                        <td width ="70"></td>
                        <td width ="100"></td>
                        <td width ="40"></td>
                        <td width ="100" align="right">_____________</td>
                      </tr>';

                      // $summary.='<hr></hr><br><br>';

                      $summary.='<br><br>
                      <tr style="font-size:10;">
                        <td width ="230"></td>
                        <td width ="70">Total Premi</td>
                        <td width ="100"></td>
                        <td width ="40">IDR</td>
                        <td width ="100" style="text-align:right">'.number_format($arr_res_p_premi['total'][0][grand_total_multi_debt]).'</td>
                      </tr>';

                      
                      $summary.='
                      <tr style="font-size:10;">
                        <td width ="230"></td>
                        <td width ="70">Admin Cost</td>
                        <td width ="100"></td>
                        <td width ="40">IDR</td>
                        <td width ="100" style="text-align:right">'.number_format($arr_res_p_premi['total'][0][admin_cost]).'</td>
                      </tr>';

                      $summary.='
                      <tr style="font-size:10;">
                        <td width ="230"></td>
                        <td width ="70"></td>
                        <td width ="100"></td>
                        <td width ="40"></td>
                        <td width ="100" align="right">_____________</td>
                      </tr>';
                      

                      // $summary.='<hr><br><br></hr>';


                      $summary.='
                      <tr style="font-size:10;">
                        <td width ="230"></td>
                        <td width ="100">NET PREMI</td>
                        <td width ="70"></td>
                        <td width ="40">IDR</td>
                        <td width ="100" style="text-align:right">'.number_format($arr_res_p_premi['total'][0][net_total_multi]).'</td>
                      </tr>';
                      
                      

                      $summary.='</table>';
              
                }
                $pdf->writeHTML($summary, true, false, true, false, '');


                $pdf->addPage();

                //Penutupan
                {
                        $penutup = '<table border="" cellspacing = "10">
                        <tr style="font-size:10;">
                        <td></td>
                        <td width ="70"></td>
                        <td width ="500"><h4>SURAT PERNYATAAN PENUTUPAN ASURANSI</h4></td>
                        <td></td>
                        <td></td>
                        </tr></table><br><br>';
                    

                        if($unit_no == '001'){ $subjek = $make.' '.$cate.' '.$model.' '.$tahun_buat.' '.$no_polisi;}
                        else                 { $subjek = 'Various';}
                        
                        $penutup.='<table border="" cellspacing ="10" >
                        <tr style="font-size:10;">
                          <td width ="150">Objek Pertanggungan</td>
                          <td width ="10">:</td>
                          <td width ="400">'.$subjek.'</td>
                        </tr>';

            

                        if($unit_no == '001'){ $objek = 'IDR '. $sum_ins_conv;}
                        else                 { $objek = 'Various';}

                        $penutup.='
                        <tr style="font-size:10;">
                          <td>Harga Pertanggungan</td>
                          <td>:</td>
                          <td>'.$objek.'</td>
                        </tr>';

                        
                        $penutup.='
                        <tr style="font-size:10;">
                          <td>Anywhere ID</td>
                          <td>:</td>
                          <td>'.$register_id.'</td>
                        </tr>';

                        $penutup.='</table>';


                        $penutup.='<table border="" cellspacing ="10">
                        <tr style="font-size:10;">
                          <td width ="200">Yang Bertandatangan dibawah ini</td>
                          <td width ="10"></td>
                          <td></td>
                        </tr>';

                        $penutup.='
                        <tr style="font-size:10;">
                          <td>Nama</td>
                          <td>:</td>
                          <td></td>
                        </tr>';

                        $penutup.='
                        <tr style="font-size:10;">
                          <td>No. KTP<br>(diisi untuk asuransi individu)</td>
                          <td>:</td>
                          <td></td>
                        </tr>';

                        $penutup.='
                        <tr style="font-size:10;">
                          <td>Jabatan<br>(diisi untuk asuransi individu)</td>
                          <td>:</td>
                          <td></td>
                        </tr>';

                        $penutup.='
                        <tr style="font-size:10;">
                          <td>Perusahaan<br>(diisi untuk asuransi individu)</td>
                          <td>:</td>
                          <td></td>
                        </tr>';

                        $penutup.='<tr style="font-size:10;">
                          <td style="width:20px;text-align:right;"><br>1.  </td>
                          <td style="width:7" align="right"></td>
                          <td style="text-align:left;width:100%;"><br>Saya/Kami telah membaca, mengerti dan menyetujui penawaran yang diajukan oleh PT. Asuransi Raksa Pratikara selaku
                          Penanggung untuk penutupan risiko tersebut diatas.</td>

                        </tr>';

                        $penutup.='<tr style="font-size:10;">
                          <td style="width:20px;text-align:right;"><br>2.  </td>
                          <td style="width:7" align="right"></td>
                          <td style="text-align:left;width:100%;"><br>Saya/Kami telah membaca dan memahami produk yang dipilih termasuk biaya, manfaat, pengecualian dan ketentuan
                          tambahan lainnya.
                          </td>
                        </tr>';

                        $penutup.='<tr style="font-size:10;">
                          <td style="width:20px;text-align:right;"><br>3.  </td>
                          <td style="width:7" align="right"></td>
                          <td align="justify" style="text-align:left;width:100%;"><br>Saya/Kami menetapkan Nilai Pertanggungan (Sum Insured) sebagaimana di atas atau terlampir dan menyatakan telah
                          mengerti mengenai ketentuan penetapan Nilai Pertanggungan pada polis dan konsekwensi bila nilai pertanggungan tersebut
                          lebih rendah dari yang disyaratkan polis.
                          </td>
                        </tr>';

                        $penutup.='<tr style="font-size:10;">
                          
                          <td align="justify" style="text-align:left;width:100%;"><br><br>Demikian surat pernyataan ini Saya/Kami buat dengan sebenar-benarnya dan dengan keadaan sadar tanpa paksaan.</td>
                          <td></td>
                          <td></td>
                        </tr>';


                                      
                        $penutup.='<tr style="font-size:10;">
                          <td colspan ="3">Tempat / Tanggal : ________________/_______________________</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          </tr>';


                          
                          $penutup.='<tr style="font-size:10;">
                          <td align="center" width ="170"><br><br>Yang Membuat Pernyataan<br><br>TTD & Cap</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          </tr>';


                          $penutup.='<tr>
                          <td style="height:70px;"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          </tr>';

                          $table_name = '<table>
                                            <tr>
                                              <td style="font-size:8;" width ="55">Nama Jelas</td>
                                              <td width ="3">:</td></tr>
                                            <tr style="font-size:8;">
                                              <td width ="55x">Jabatan</td>
                                              <td width ="3">:</td>
                                            </tr>
                                          </table>';
                          $penutup.='<tr style="font-size:8;">
                          <td colspan ="3" style="text-align:left;">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . <br>'.$table_name.'</td>
                          <td> </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          </tr>';

                        $penutup.='</table>';
                
                }
                $pdf->writeHTML($penutup, true, false, true, false, '');

        }
          
            date_default_timezone_set("Asia/Jakarta");
            $dateObj = DateTime::createFromFormat('U.u', microtime(TRUE));
            $dateObj->setTimeZone(new DateTimeZone('Asia/Jakarta'));
            $file_pdf  = md5(md5(md5($dateObj->format('YmdHisu'))));

            
            $file_qou      = "$register_id" . "_" . $file_pdf  . ".pdf";
            $path_epol     = $_SERVER['DOCUMENT_ROOT'] . 'mks/entry/bike/api/files/pdf/pdf_quo_v3/';
            $file_name_pdf = $path_epol . $file_qou;
            $pdf->Output( $file_name_pdf ,'F');

            $link         ='https://'.$_SERVER['SERVER_NAME'].'/mks/entry/bike/api/files/pdf/pdf_quo_v3/'.$file_qou;
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
    
}