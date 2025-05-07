<?php
// function data_all($sqlbuilder , $id, $nama){
include('koneksi_lite.php');

$sqlmu = "INSERT INTO entry_bike.polis_agent_direct(oleh_buat) values('aa')";
if(mysqli_query($login_db_bike , $sqlmu))
{
echo 'asasqas';
}
else
{

echo "Failed to connect to MySQL: " . $connection->error;
      
}
// $hasilnya = $sqlbuilder->select('BIKE',$sqlmu);

// $hasilnya = $hasilnya[data][0];

// $sql = "INSERT INTO testing (id, nama) VALUES ('$hasilnya[id]', '$hasilnya[nama]')";
// $hasil = $sqlbuilder->executeNoCommit('ARAKSA',$sql);

// $sqlbuilder->commit('BIKE');
// $sqlbuilder->rollback('ARAKSA');
// return $hasilnya;
// }