<?php
function data_periode_polis($sqlbuilder , $register_id){
    $cek_data_1 =" SELECT rowid FROM polis_agent_direct_unit_rate WHERE register_id = '$register_id'";
$hasil_data_1 = $sqlbuilder->select('LITE',$cek_data_1);
if($hasil_data_1[status] == 400){
    return $hasil_data_1;
}
$query_data_x = count($hasil_data_1[data]);
if ( $query_data_x >= 2 )
{
    $select = "SELECT
    rowid, tahun_cover, sumber_data, MAX(sequence_number) sequence_number,

    register_id, unit_no, unit_no, wilayah_unit, oleh_buat, sum_ins,

    per_tgg_01, rate_01, loading_01, rscc_01, teroris_01, flood_01, eq_01, bengkel_01,
    si_driver_01, derek_01, komersil_01, si_pass_01, qty_pass_01, tpl_01, deduc_01, Depre_01, stnk_01,

    per_tgg_02, rate_02, loading_02, rscc_02, teroris_02, flood_02, eq_02, bengkel_02,
    si_driver_02, derek_02, komersil_02, si_pass_02, qty_pass_02, tpl_02, deduc_02, Depre_02, stnk_02,

    per_tgg_03, rate_03, loading_03, rscc_03, teroris_03, flood_03, eq_03, bengkel_03,
    si_driver_03, derek_03, komersil_03, si_pass_03, qty_pass_03, tpl_03, deduc_03, Depre_03, stnk_03,

    per_tgg_04, rate_04, loading_04, rscc_04, teroris_04, flood_04, eq_04, bengkel_04,
    si_driver_04, derek_04, komersil_04, si_pass_04, qty_pass_04, tpl_04, deduc_04, Depre_04, stnk_04,

    per_tgg_05, rate_05, loading_05, rscc_05, teroris_05, flood_05, eq_05, bengkel_05,
    si_driver_05, derek_05, komersil_05, si_pass_05, qty_pass_05, tpl_05, deduc_05, Depre_05, stnk_05";

    $sql_rate_ba = "  $select
    FROM
        polis_agent_direct_unit_rate
    WHERE
        register_id = '$register_id'
    AND sumber_data IN ('ORIGINAL')

        UNION ALL

    $select
    FROM
        polis_agent_direct_unit_rate
    WHERE
            register_id = '$register_id'
        AND sumber_data IN ('REPLACE')
    ";

    $hasil_rate_ba = $sqlbuilder->select('LITE',$sql_rate_ba);
    if($hasil_rate_ba[status] == 400){
        return $hasil_rate_ba;
    }

}

    $result =   [
        "status"    => 200,
        "message"   => 'select data berhasil',
        "data"      => []
    ];
    return $result;

}