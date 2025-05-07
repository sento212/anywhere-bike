<?php
function data_foto_unit($sqlbuilder , $register_id, $unit_number){
    $table_use =  $_SESSION['table_use'];
    $table_use_det = $_SESSION['table_use_det'];
    $table_foto    = $_SESSION['table_foto'];
    $table_survey  = $_SESSION['table_survey'] ;
    
    $sql_foto_D =" SELECT unit_no,type_foto,Nama_foto,url_foto,Harga_mobil,urut
    from $table_foto
    where     register_id = '$register_id'
          and unit_no     = '$unit_number'
          and urut         BETWEEN  1 and 10
          and status      = 'use'
          ";
$Fot_C = $sqlbuilder->select('BIKE',$sql_foto_D);
if($Fot_C['status'] == 400){
    return $Fot_C;
}
$hasil_foto = [];
$data_foto = [];
foreach ($Fot_C['data'] as $Fot_D)
    {
        $data_foto['nomor_urut'] = $Fot_D['urut'];
        $data_foto['type_foto'] = $Fot_D['type_foto'];
        $data_foto['Nama_foto'] = $Fot_D['Nama_foto'];

        if ( $Fot_D['Harga_mobil'] == null )
        { $data_foto['Harga_mobil'] = null;}
        else
        { $data_foto['Harga_mobil'] = number_format($Fot_D['Harga_mobil']); }

        $data_foto['url_foto']   = $Fot_D['url_foto'];
        $data_foto['besar_data']   = 2;
        $hasil_foto[] = $data_foto;
    }

    $result =   [
        "status"    => 200,
        "message"   => 'select data berhasil',
        "data"      => $hasil_foto
    ];
    return $result;

}