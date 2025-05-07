<?php
function hapus_unit($sqlbuilder, $_no_regis, $_unit_no)
{
    $table_use = $_SESSION['table_use'];
    $table_use_det = $_SESSION['table_use_det'];
    $table_foto = $_SESSION['table_foto'];
    $table_survey = $_SESSION['table_survey'];

    $sql_delete = "DELETE from $table_use_det
    where     register_id = '$_no_regis'
          AND unit_no     = '$_unit_no'  ";

    $delete_unit = $sqlbuilder->executeNoCommit('BIKE', $sql_delete);
    if ($delete_unit['status'] == 400) {
        $sqlbuilder->rollback('BIKE');
        return $delete_unit;
    }

    $sqlset = "
    SET @nomor = 0;  
    ";
    $setsql = $sqlbuilder->select('BIKE', $sqlset, true);
    if ($setsql['status'] == 400) {
        return $setsql;
    }

    $unit_update = "
    UPDATE $table_use_det u
        LEFT JOIN (
    SELECT u.rowid, LPAD(@nomor := @nomor + 1, 3, '0') unit_urutan
    FROM 
    $table_use_det u
    WHERE u.register_id = '$_no_regis'
    ORDER BY u.rowid asc
        )us ON
            u.rowid = us.rowid
        SET
            u.unit_no  = us.unit_urutan
    WHERE u.register_id = '$_no_regis'
    ";
    $unit_hasil = $sqlbuilder->executeNoCommit('BIKE', $unit_update);
    if ($unit_hasil['status'] == 400) {
        $sqlbuilder->rollback('BIKE');
        return $unit_hasil;
    }

    $sqlbuilder->commit('BIKE');
    $result = [
        "status" => 200,
        "message" => 'ambil data berhasil',
        "data" => [$_no_regis, '001']
    ];
    return $result;
}

?>