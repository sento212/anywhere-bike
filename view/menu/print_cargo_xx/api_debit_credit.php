<?php
    $polis_single   = '01-C-00001-000-07-2023';
    $note_no        = array('01-PO-D0000185-07-2023');
    
    $encode_nota = json_encode($note_no,true);
    //  https://www.araksa.com/mks/entry/print_cargo/api_debit_credit.php   
    
      $data_api_agent = array(
        "key_id"      => "ASDAS#!@Dasdkl123ljldasdl",
        "no_polis"    => $polis_single,
        "nota"        => $encode_nota,
        "background"  => "NO",
        "sign"        => "YES",
        "stamp"       => "YES", 
        "data_mentah" => "NO"
      );

    //   echo '<br><pre>'; print_r($data_api_agent); echo '</pre>';echo "<br>----";
      $web_url = curl_init('https://www.araksa.com/mks/epol/hvc/nota_auto.php');

      curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
      curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_agent);
      curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);

      $result_unit  = curl_exec($web_url);
      $info_unit    = curl_getinfo($web_url);
      curl_close($web_url);

      $data_unit  = json_decode($result_unit, true);

      $base64_nota = $data_unit[encode]; // echo "$debit . $credit <br>";

    // $debit  = $data_unit['html1'] ;
    // $credit = $data_unit['html2'];
    print_r( $base64_nota );

?>