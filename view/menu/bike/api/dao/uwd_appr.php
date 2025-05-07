<?php

function uwd_aproval($sqlbuilder, $no_regis)
{
    $no_regis = implode("','", $no_regis);
    $sql = "UPDATE polis_agent_direct
            set uwd_status = 'APPROVE'
            where register_id in ('$no_regis')";
    $hasil = $sqlbuilder->executeCommit('BIKE', $sql);
    if ($hasil['status'] == 400) {
        return $hasil;
    }
    return $hasil;
}