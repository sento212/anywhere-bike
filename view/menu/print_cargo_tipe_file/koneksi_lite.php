<?php
  // https://www.rks-w.com/mks/entry/koneksi_lite.php

  // RDH ANYWHERE
  {
    $login_db_lite  = mysqli_init();
    mysqli_options ($login_db_lite, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    mysqli_ssl_set($login_db_lite, NULL,NULL,'/home/raksa/htdocs/mks/entry/koneksi_lite_anywhere-ca.pem', NULL, NULL);
    $host_sd_RDH	= "lin-28306-15183-mysql-primary.servers.linodedb.net";
    // $host_sd_RDH	= "lin-28306-15183-mysql-primary-private.servers.linodedb.net";

    $user_sd_RDH	= 'linroot';  // "masuk_polis";
    $pass_sd_RDH	= 'ftImeR+zrnh8WC0C'; // 'M@suK#_Po0l1$_25';
    $db_sd_RDH	  = "entry_polis";

    $user_sd_RDH	= "masuk_polis";
    $pass_sd_RDH	= 'M@suK#_Po0l1$_25';
    $db_sd_RDH	  = "entry_polis";

    mysqli_real_connect($login_db_lite, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
    $link_konn = mysqli_real_connect ($login_db_lite, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
  }

  if (!$link_konn)
  { $link_konn_01 =  'Connect error (' . mysqli_connect_errno() . '): ' . mysqli_connect_error()  ; }
  else
  { $link_konn_01 = "conn 01 sukses <br>"; }
  // echo $link_konn_01;

  // RDH ANYWHERE bike
  {
    $login_db_bike  = mysqli_init();
    mysqli_options ($login_db_bike, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    mysqli_ssl_set($login_db_bike, NULL,NULL,'/home/raksa/htdocs/mks/entry/koneksi_lite_anywhere-ca.pem', NULL, NULL);
    $host_sd_RDH	= "lin-28306-15183-mysql-primary.servers.linodedb.net";
    // $host_sd_RDH	= "lin-28306-15183-mysql-primary-private.servers.linodedb.net";

    $user_sd_RDH	= 'linroot';  // "masuk_polis";
    $pass_sd_RDH	= 'ftImeR+zrnh8WC0C'; // 'M@suK#_Po0l1$_25';
    $db_sd_RDH	  = "entry_bike";

    // $user_sd_RDH	= "masuk_polis";
    // $pass_sd_RDH	= 'M@suK#_Po0l1$_25';
    // $db_sd_RDH	  = "entry_bike";

    mysqli_real_connect($login_db_bike, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
    $link_konn_bike = mysqli_real_connect ($login_db_bike, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
  }

  // if (!$link_konn)
  // { $link_konn_01 =  'Connect error (' . mysqli_connect_errno() . '): ' . mysqli_connect_error()  ; }
  // else
  // { $link_konn_01 = "conn 01 sukses <br>"; }
  // // echo $link_konn_01;


  // RDH REACT_NATIVE
  {
    $login_db_react  = mysqli_init();
    mysqli_options ($login_db_react, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    mysqli_ssl_set($login_db_react, NULL,NULL,'/home/raksa/htdocs/mks/entry/koneksi_lite_anywhere-ca.pem', NULL, NULL);
    $host_sd_RDH_react	= "lin-28306-15183-mysql-primary.servers.linodedb.net";

    $user_sd_RDH_react	= "reak_umum";
    $pass_sd_RDH_react	= 'R3@K!!_Pu$ih_u3u3';
    $db_sd_RDH_react	  = "react_native";

    mysqli_real_connect($login_db_react, $host_sd_RDH_react , $user_sd_RDH_react, $pass_sd_RDH_react , $db_sd_RDH_react, 3306, NULL, MYSQLI_CLIENT_SSL);
    $link_konn_react = mysqli_real_connect ($login_db_react, $host_sd_RDH_react , $user_sd_RDH_react, $pass_sd_RDH_react , $db_sd_RDH_react, 3306, NULL, MYSQLI_CLIENT_SSL);

    $conn            = $login_db_react;
    $connection      = $login_db_react;
    $conn_polis      = $login_db_react;
  }

  //RDH ARAKSA VISITOR
  {
    $login_db_araksa = mysqli_init();
    mysqli_options ($login_db_araksa, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    mysqli_ssl_set($login_db_araksa, NULL,NULL,'/home/raksa/htdocs/mks/entry/koneksi_lite_DB-ca-certificate.pem', NULL, NULL);

    $host_sd_RDH	= "lin-27541-14953-mysql-primary.servers.linodedb.net";
    $user_sd_RDH	= "araksa_root";
    $pass_sd_RDH	= "raksA2282$@";
    $db_sd_RDH	  = "araksa_visitor";

    mysqli_real_connect ($login_db_araksa, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
    $link_login_db_araksa = mysqli_real_connect ($login_db_araksa, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
  }

  //RDH ARAKSA VISITOR
  {
    $login_db_araksa = mysqli_init();
    mysqli_options ($login_db_araksa, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    mysqli_ssl_set($login_db_araksa, NULL,NULL,'/home/raksa/htdocs/mks/entry/koneksi_lite_DB-ca-certificate.pem', NULL, NULL);

    $host_sd_RDH	= "lin-27541-14953-mysql-primary.servers.linodedb.net";
    $user_sd_RDH	= "araksa_root";
    $pass_sd_RDH	= "raksA2282$@";
    $db_sd_RDH	  = "araksa_visitor";

    mysqli_real_connect ($login_db_araksa, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
    $link_login_db_araksa = mysqli_real_connect ($login_db_araksa, $host_sd_RDH , $user_sd_RDH, $pass_sd_RDH , $db_sd_RDH, 3306, NULL, MYSQLI_CLIENT_SSL);
  }

  // RDH SUR_DIGI
  {
    $login_db_sur_digi  = mysqli_init();
    mysqli_options ($login_db_sur_digi, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
    mysqli_ssl_set($login_db_sur_digi, NULL,NULL,'/home/raksa/htdocs/mks/entry/koneksi_lite_DB-ca-certificate.pem', NULL, NULL);
    $host_sd_RDH_surdigi	= "lin-27541-14953-mysql-primary.servers.linodedb.net";

    $user_sd_RDH_surdigi	= "API_claim";
    $pass_sd_RDH_surdigi	= 'Ih_5uRVey_Dlj1t0k_Y2kKk';
    $db_sd_RDH_surdigi	  = "survey_digital";

    mysqli_real_connect($login_db_sur_digi, $host_sd_RDH_surdigi , $user_sd_RDH_surdigi, $pass_sd_RDH_surdigi , $db_sd_RDH_surdigi, 3306, NULL, MYSQLI_CLIENT_SSL);
    $link_konn_surdigi = mysqli_real_connect ($login_db_sur_digi, $host_sd_RDH_surdigi , $user_sd_RDH_surdigi, $pass_sd_RDH_surdigi , $db_sd_RDH_surdigi, 3306, NULL, MYSQLI_CLIENT_SSL);

    $conn_survey = $login_db_sur_digi;
  }

  // // testing
  // $q =  "SELECT 'test' FROM DUAL";
  // $run_q = mysqli_query($login_db_sur_digi, $q);
  // while($det= mysqli_fetch_assoc($run_q)) {
  //   echo json_encode($det);
  // }

  // // testing
  // $q =  "SELECT * FROM react_native.underwriting_approval_approval LIMIT 10";
  // $run_q = mysqli_query($login_db_react, $q);
  // while($det= mysqli_fetch_assoc($run_q)) {
  //   echo json_encode($det);
  // }

  // // testing
  // $q =  "SELECT * FROM entry_polis.polis_agent_direct LIMIT 10";
  // $run_q = mysqli_query($login_db_lite, $q);
  // while($det= mysqli_fetch_assoc($run_q)) {
  //   echo json_encode($det);
  //   echo "<br><br>";
  // }

  // // testing
  // $q =  "SELECT * FROM survey_digital.espk_master LIMIT 10";
  // $run_q = mysqli_query($login_db_sur_digi, $q);
  // while($det= mysqli_fetch_assoc($run_q)) {
  //   echo json_encode($det);
  //   echo "<br><br>";
  // }

?>
