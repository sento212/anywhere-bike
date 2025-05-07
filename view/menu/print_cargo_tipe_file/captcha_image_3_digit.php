<?php

//aktifkan session
session_start();

header("Content-type: image/png");

// beri nama session dengan nama Captcha
$_SESSION["Captcha"]="";

//tentukan ukuran gambar
$gbr = imagecreate(110, 35);

//warna background gambar
imagecolorallocate($gbr, 167, 218, 239);

$grey  = imagecolorallocate($gbr, 128, 128, 128);

$black = imagecolorallocate($gbr, 0, 0,0);

// tentukan font
$font = "monaco.ttf";

// membuat nomor acak dan ditampilkan pada gambar
$jumlah_nomer = 4;
for($i=1 ; $i<=$jumlah_nomer ; $i++)
{
	// jumlah karakter
	$nomor=rand(0,9);
	$_SESSION["Captcha"].=$nomor;
	$sudut= rand(-30, 30);
	if (( $sudut >= -15) and ( $sudut <= 1 ))
	{ $sudut= rand(-50,-35); }
	if (( $sudut >= 1) and ( $sudut <= 15 ))
	{ $sudut= rand(50,35); }

	imagettftext($gbr, 20, $sudut, 8+15*$i, 25, $black, $font, $nomor);
	// efek shadow
	imagettftext ($gbr, 20, $sudut, 9+15*$i, 26, $grey, $font, $nomor);
}
//untuk membuat gambar
imagepng($gbr);
imagedestroy($gbr);
?>
