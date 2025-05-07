<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Polis Raksa</title>
</head>

<body>


<?php

include 'koneksi_lite.php';
include 'idx_agen_direct_css.php';




$a =  $_GET['a'];
$sql_iklan ="SELECT rowid,upper(judul) judul, url_image,isi_pesan,
                    date_format(eff_date,'%d-%m-%Y') eff_date,
                    date_format(exp_date,'%d-%m-%Y') exp_date
              FROM react_native.underwriting_approval_list_slide_show
              WHERE md5(md5(md5(rowid))) = '$a' and upper(status) = 'VALID'
              ORDER BY no_urut ";

$Iklan  = mysqli_fetch_array( mysqli_query($login_db_react,$sql_iklan) );
$desc       = $Iklan[desc];
$isi_pesan  = $Iklan[isi_pesan];
$url_image  = $Iklan[url_image];
$judul      = $Iklan[judul];
$eff_date   = $Iklan[eff_date];
$exp_date   = $Iklan[exp_date];

echo "
<table border='0' class='tbl_mks' style='margin-top:2px;' width=400px >
  <tr>
    <td align=center style='font-size:16px;'>
     <b> $judul</b>
    </td>
  </tr>

  <tr>
    <td align=center>
      <img border='0' width='400' height='200' src='$url_image' >
    </td>
  </tr>

  <tr>
    <td> " . str_replace('  ', ' &nbsp;', nl2br(htmlentities( $isi_pesan ))) . "
    </td>
  </tr>

  <tr>
    <td align=center style='font-size:10px;'><b><br> Tayang dari Tanggal $eff_date sampai $exp_date </b> </td>
  </tr>

</table>
  ";


?>


</body>
</html>
