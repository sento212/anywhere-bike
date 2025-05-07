
<?php
include 'tcpdf/tcpdf.php';
// include '../koneksi_lite.php';

// $no_cpm = $_GET['a'];
// $user_name = $_GET['b'];

//         $sql_ext = "SELECT  d.no_polis,d.no_claim,d.loss_date,d.no_cpm,c.ttg_nama,
//                             a.loc_place,g.kejadian_cause_desc,f.no_polisi,
//                             f.make,f.cate,f.model,f.no_rangka,f.no_mesin,e.ext_inv_name,e.no_reg,d.loss_date,e.ext_inv_name
//                     FROM 
//                             espk_cpm_location a,
//                             espk_cpm_tertanggung c,
//                             espk_cpm_master d,
//                             espk_surat_adjuster e,
//                             espk_cpm_unit f,
//                             espk_cpm_kejadian g
// 			      WHERE  MD5(MD5(MD5(MD5(a.no_cpm)))) = '$no_cpm'
//                     AND  MD5(MD5(MD5(MD5(a.no_cpm)))) = MD5(MD5(MD5(MD5(c.no_cpm))))
//                     AND  MD5(MD5(MD5(MD5(c.no_cpm)))) = MD5(MD5(MD5(MD5(d.no_cpm))))
//                     AND  MD5(MD5(MD5(MD5(d.no_cpm)))) = MD5(MD5(MD5(MD5(e.no_cpm))))
//                     AND  MD5(MD5(MD5(MD5(e.no_cpm)))) = MD5(MD5(MD5(MD5(f.no_cpm))))
//                     AND  MD5(MD5(MD5(MD5(f.no_cpm)))) = MD5(MD5(MD5(MD5(g.no_cpm)))) 
// 			        AND  MD5(MD5(MD5(MD5(g.no_cpm)))) = MD5(MD5(MD5(MD5(a.no_cpm))))";
//         $res = mysqli_fetch_array(mysqli_query($conn_survey, $sql_ext));

//         $noreg           = $res[no_reg];
//         $nama_adjust     = $res[ext_inv_name];
//         $pada            = $res[kepada];
//         $alamat          = $res[alamat];
//         $hor_kami        = $res[hormat_kami];
//         $ttg_nama        = $res[ttg_nama];
//         $polis_no        = $res[no_polis];
//         $make            = $res[make];
//         $cate            = $res[cate];
//         $model           = $res[model];
//         $tahun           = $res[year];
//         $no_rangka       = $res[no_rangka];
//         $no_engine       = $res[no_mesin];
//         $plat_polisi     = $res[no_polisi];
//         $departemen      = $res[depart];
//         $nomor_klaim     = $res[no_claim];
//         $bab_kejadian    = $res[loc_place];
//         $tgl_jadian      = $res[loss_date];
//         $pnyebab_kjadian = $res[kejadian_cause_desc];

class MYPDF extends TCPDF
{
    //Page header
    public function Header() {
        $this->SetFont('courier', '', 8.5);
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        // $img_file = "https://www.rks-w.com/prog-x/smart_claim/assets/template.jpg";
        // $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // $this->SetAutoPageBreak($auto_page_break, $bMargin);
    }
}

$pdf = new MYPDF('A4', 'mm', 'portrait', true, 'UTF-8', false);
//$pdf->SetProtection(array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'),'','mks1234',3);
$pdf->SetCreator('Araksa');
$pdf->SetAuthor('Araksa');
$pdf->SetTitle('Surat Adjuster');
$pdf->SetSubject('Araksa');
$pdf->SetKeywords('Araksa,Surat Adjuster');
$pdf->SetFont('courier', '', 8.5);
//$pdf->SetTextColor(0, 107, 26);
$pdf->SetMargins(7, 35, 8);
//$pdf->SetHeaderMargin(47);
$pdf->SetAutoPageBreak(TRUE, 50);
$pdf->AddPage();

$html = 
'   
<table border="" cellspacing="" cellpadding="">
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td width ="173" align="right" >' .$polis_single. '<br></td>
</tr>

<tr>
    <td></td>
    <td align="center" colspan="2"  style="font-size:15px"><b>ACCEPTANCE OF POLICY <br><i>(PERSETUJUAN POLIS)</i></b><br></td>
    <td width ="173" style="font-size: 15px;" align="right"><b></b></td>
</tr>

<tr>
    <td colspan = "3"> We hereby confirm acceptance of the Policy below :<br><i>(Dengan ini Kami memberikan persetujuan Polis di bawah ini): </i></td>
    <td></td>
    <td></td>
</tr>
<br>
<tr>
<td></td>
    <td></td>
    <td></td>
</tr>

<tr>
    <td>Policy No.<br>(No.Polis)<br></td>
    <td style="width:15" align="right">:</td>
    <td>' . $polis_single . '</td>
</tr>

<tr>
    <td>Name of the Insured<br>(<i>Nama Tertanggung</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">' . $ins_name . '<br></td>
</tr>

<tr>
    <td>Estimated Departure Date<br>(<i>Perkiraan Tanggal Keberangkatan</i>)<br></td>
    <td style="width:15" align="right">:</td>
    <td colspan="2">'. date("j F Y", strtotime($est_date)) . '</td>
</tr>

<tr>
    <td width="285">' . $footer . '</td>
    <td style="width:55%; text-align:right;">' . $sign_explode[0] . '' . $sign . '</td>
</tr>

<tr>
    <tr>
    <td>' . $footer2 . '</td>
</tr>

<tr>
    <td style="width:76%;"></td>
    <td style="text-align:center;width:24%;">
    <img src="./image/TTD_baru.png" width="100" height="100">
    </td>
</tr>

<tr>
    <td style="width:76%;"></td>
    <td style="text-align:center;width:24%;"><u> Doni Yuska </u><br>Authorized Signature<br>(<i>Penanggung</i>)</td>
</tr>

</table>';
    
   
$pdf->writeHTML($html, true, 0, true, true);
// ob_end_clean(); //https://stackoverflow.com/questions/16011050/tcpdf-error-some-data-has-already-been-output-cant-send-pdf-file
$pdf->Output(  $_SERVER['DOCUMENT_ROOT'] . "/mks/entry/print_cargo/mix_all_Cargo/" . 'lonte.pdf' ,'F');

//PREVIEW
// $pdf->Output('zzz.pdf');

?>

