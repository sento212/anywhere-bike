<?php



    $encode_nota = json_encode($no_nota,true);
    //  https://www.araksa.com/mks/entry/print_cargo/api_debit_credit.php

      $data_api_agent = array(
        "key_id"      => "ASDAS#!@Dasdkl123ljldasdl",
        "no_polis"    => $no_polis,
        "nota"        => $encode_nota,
        "background"  => "NO",
        "sign"        => "YES",
        "stamp"       => "YES",
        "data_mentah" => "NO"
      );

    //   echo '<br><pre>'; print_r($data_api_agent); echo '</pre>';echo "<br>----";
      $web_url = curl_init('https://www.rks-w.com/mks/hvc/nota_auto.php');

      curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
      curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_agent);
      curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

      $result_unit  = curl_exec($web_url);
      $info_unit    = curl_getinfo($web_url);
      curl_close($web_url);

      $data_unit  = json_decode($result_unit, true);

      $base64_nota = $data_unit[encode]; // echo "$debit . $credit <br>";

    //   print_r($base64_nota);


?>