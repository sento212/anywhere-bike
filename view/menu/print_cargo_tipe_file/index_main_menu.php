
<?php

$ProjectCode   = nama_lengkap_dept_dari_mkg_group($mkg_group)[1];

$User_id_sakti = array("MKS","ASAP");
$user_id_Upper = strtoupper($user_id);

// print_r($_POST);
    // if ( $ProjectCode == 'UWD' || $ProjectCode=="IA" || $ProjectCode=="DP")
    // {
    //     $G_ANY_MKG_ENTRY  = cek_grant_login(strtoupper($user_id),'ANYWHERE_MKG_ENTRY');   // ERR0R || OK
    //     $G_ANY_MKG_READ   = cek_grant_login(strtoupper($user_id),'ANYWHERE_MKG_READ');    // ERR0R || OK
    //     $G_ANY_DELIVERY   = cek_grant_login(strtoupper($user_id),'ANYWHERE_DELIVERY');    // ERR0R || OK
    //     $G_ANY_VIEW_ENTRY = cek_grant_login(strtoupper($user_id),'ANYWHERE_VIEW_ENTRY');  // ERR0R || OK
    //     //echo "$G_ANY_MKG_ENTRY || $G_ANY_READ || $G_ANY_DELIVERY";
    //
    //     echo"
    //     <select name='web_menu' $AnyWhere_class_L_menu onchange='this.form.submit();' >
    //         <option value=''"; if ( '' == $_POST[web_menu]) { echo " selected ";} echo ">Pilih Salah Satu";
    //
    //         if ( $G_ANY_DELIVERY == 'OK' OR (in_array($user_id_Upper,$User_id_sakti)) )
    //         { echo "<option value='Menu_Any_Delivery'     "; if ( 'Menu_Any_Delivery'     == $_POST[web_menu]) { echo " selected ";} echo ">Delivery AnyWhere "; }
    //
    //         if ( $G_ANY_MKG_READ == 'OK' OR (in_array($user_id_Upper,$User_id_sakti)) )
    //         { echo "<option value='view_no_anywhere'      "; if ( 'view_no_anywhere'      == $_POST[web_menu]) { echo " selected ";} echo ">View Entry AnyWhere"; }
    //
    //         // //20 JULI 2022 => SI UWD MINTA DINYALAIN VIEW ENTRY ANYWHERENYA
    //         // LILIK, VIVIAN, SHAFIRA, IRVANI, NIKE, RISA, SUKMA, NISASOENJAYA
    //         // $arr_user_uwd= ["LILIK", "VIVIAN", "SHAFIRA", "IRVANI", "NIKE", "RISA", "SUKMA", "NISASOENJAYA"];
    //         if ( $G_ANY_VIEW_ENTRY == 'OK' OR (in_array($user_id_Upper,$User_id_sakti)) )
    //         {
    //           echo "<option value='view_no_anywhere'      "; if ( 'view_no_anywhere'      == $_POST[web_menu]) { echo " selected ";} echo ">View Entry AnyWhere";
    //         }
    //
    //         // 19 SEPTEMBER 2022 //HARDCODE DL KARENA DI AEGIS TIDAK ADA KODENYA KHUSUS BU CHIKA UNTUK MENU VIEW ENTRY ANYWHERE
    //         // 16 FEB 2023 SUKMA REQUEST DAFTAR USER 'DEBBY', 'DIAH', 'TRESIA', 'AYDA', 'YENI'
    //         $arr_user_uwd_2=
    //         [
    //           "FRANSISKA", "SHAFIRA", "RAHMAWATI", "CHARLES",
    //           'DEBBY', 'DIAH', 'TRESIA', 'AYDA', 'YENI', 'PUTU', 'STEFANNY0612', 'SELVY', 'ANDRE98', 'STEFANNI0612', "MERRYJ"
    //         ];
    //
    //         if (in_array($user_id_Upper, $arr_user_uwd_2))
    //         {
    //           echo "<option value='view_no_anywhere'      "; if ( 'view_no_anywhere'      == $_POST[web_menu]) { echo " selected ";} echo ">View Entry AnyWhere";
    //         }
    //
    //         // 31 AGUSTUS 2022 => TAMBAH MENU ANYWHERE PRINT HVC
    //         $G_ANY_CETAK_HVC  = cek_grant_login(strtoupper($user_id),'ANYWHERE_PRINT_HVC');  // ERR0R || OK
    //         if ( $G_ANY_CETAK_HVC == 'OK' OR (in_array($user_id_Upper,$User_id_sakti)) )
    //         { echo "<option value='Menu_Any_Print_hvc'     "; if ( 'Menu_Any_Print_hvc' == $_POST[web_menu]) { echo " selected ";} echo ">Print HVC AnyWhere"; }
    //
    //
    //         echo"
    //     </select>
    //     ";
    //
    // }
    //
    //
    // // MKG
    // if ( $ProjectCode == 'MKG' or $mkg_group == 'DEMO' or $ProjectCode == 'ALL' or $ProjectCode == 'MKS')
    // {
    //     echo"
    //     <select name='web_menu' $AnyWhere_class_L_menu onchange='this.form.submit();' >
    //         <option value=''                   "; if ( ''                   == $_POST[web_menu]) { echo " selected ";} echo ">Pilih Salah Satu
    //         <option value='BS5_HVC_Entry_web'  "; if ( 'BS5_HVC_Entry_web'  == $_POST[web_menu]) { echo " selected ";} echo ">HVC Entry AnyWhere
    //         <option value='Auto_Entry_web'     "; if ( 'Auto_Entry_web'     == $_POST[web_menu]) { echo " selected ";} echo ">AUTO Entry AnyWhere (Agent+Direct+Dealer+ROL)
    //         <option value='Auto_renewal_web'   "; if ( 'Auto_renewal_web'   == $_POST[web_menu]) { echo " selected ";} echo ">AUTO Renewal AnyWhere (Agent+Direct+Dealer+ROL)
    //         <option value='renewal_FUA_DIRECT' "; if ( 'renewal_FUA_DIRECT' == $_POST[web_menu]) { echo " selected ";} echo ">RENEWAL FUA PROGRESS $full_dept
    //       ";
    //
    //          //BY REGIE DI TAMBAHINNYA
    //          // 2 FEB 2022 => RUDI MINTA TAMBAH CABANG MALANG
    //          if ( $mkg_group == 'MKGROUP3A' || $mkg_group == 'MKGROUP4' ||  $mkg_group == '03-JAMBI' ||  $mkg_group == '03-CIREBON' || $mkg_group == '18-MKG01' || $mkg_group=='09-MKG05')
    //          {
    //             echo "<option value='Auto_email_entry_web'  "; if ( 'Auto_email_entry_web'  == $_POST[web_menu]) { echo " selected ";} echo ">AUTO EXCEL-15 Upload Leasing";
    //          }
    //
    //         //  if ( $mkg_group == 'MKGROUP3A'|| $mkg_group == '02-MKG06'|| $mkg_group=='10-MKG04' )
    //         //  {
    //         //    echo "<option value='penawaran_dari_apps'   "; if ( 'penawaran_dari_apps'   == $_POST[web_menu]) { echo " selected ";} echo ">Penawaran From Agent";
    //         //  }
    //          if ( $mkg_group == 'DEMO' )
    //          {
    //            echo "<option value='Auto_email_entry_web'  "; if ( 'Auto_email_entry_web'  == $_POST[web_menu]) { echo " selected ";} echo ">AUTO EXCEL-15 Upload Leasing";
    //            echo "<option value='Fire_Entry_web'        "; if ( 'Fire_Entry_web'        == $_POST[web_menu]) { echo " selected ";} echo ">FIRE ENTRY Fire";
    //            echo "<option value='EQ_Entry_web'          "; if ( 'EQ_Entry_web'        == $_POST[web_menu]) { echo " selected ";} echo ">EQ ENTRY Earthquake";
    //           //  echo "<option value='penawaran_dari_apps'   "; if ( 'penawaran_dari_apps'   == $_POST[web_menu]) { echo " selected ";} echo ">Penawaran From Agent";
    //            echo "<option value='Request_survey_claim'  "; if ( 'Request_survey_claim'  == $_POST[web_menu]) { echo " selected ";} echo ">TEMPORARY Request Survey Claim";
    //            echo "<option value='Request_kwitansi'      "; if ( 'Request_kwitansi'      == $_POST[web_menu]) { echo " selected ";} echo ">TEMPORARY Request Kwitansi";
    //            echo "<option value='Report_Survey_BCA'     "; if ( 'Report_Survey_BCA'     == $_POST[web_menu]) { echo " selected ";} echo ">TEMPORARY Report Survey BCA";
    //          }
    //
    //           // NYALA DI SEMUA MKG YA
    //           echo "<option value='penawaran_dari_apps'   "; if ( 'penawaran_dari_apps'   == $_POST[web_menu]) { echo " selected ";} echo ">Penawaran From Agent";
    //           echo "<option value='Menu_Any_Delivery'     "; if ( 'Menu_Any_Delivery'     == $_POST[web_menu]) { echo " selected ";} echo ">Delivery AnyWhere ";
    //           echo "<option value='view_no_anywhere'      "; if ( 'view_no_anywhere'      == $_POST[web_menu]) { echo " selected ";} echo ">View Entry AnyWhere";
    //
    //           // 31 AGUSTUS 2022 => TAMBAH MENU ANYWHERE PRINT HVC
    //           $G_ANY_CETAK_HVC  = cek_grant_login(strtoupper($user_id),'ANYWHERE_PRINT_HVC');  // ERR0R || OK
    //           if ( $G_ANY_CETAK_HVC == 'OK' OR (in_array($user_id_Upper,$User_id_sakti)) )
    //           { echo "<option value='Menu_Any_Print_hvc'     "; if ( 'Menu_Any_Print_hvc' == $_POST[web_menu]) { echo " selected ";} echo ">Print HVC AnyWhere"; }
    //
    //           echo "<option value='BS5_Menu_Any_Print_cargo' "; if ( 'BS5_Menu_Any_Print_cargo' == $_POST[web_menu]) { echo " selected ";} echo ">Print Cargo AnyWhere";
    //
    //        echo"
    //     </select>
    //     ";
    //
    // }


    if ( $ProjectCode == 'MKG' or $mkg_group == 'DEMO' or $ProjectCode == 'ALL' or $ProjectCode == 'MKS' or $ProjectCode == 'UWD' OR $ProjectCode == "DP")
    {
          echo"
          <select name='web_menu' $AnyWhere_class_L_menu onchange='this.form.submit();' >

              <option value=''                         "; if ( ''                                       == $_POST[web_menu]) { echo " selected ";} echo ">Pilih Salah Satu
              <option value='BS5_Menu_Any_Print_cargo' "; if ( 'BS5_Menu_Any_Print_cargo'               == $_POST[web_menu]) { echo " selected ";} echo ">Print Cargo AnyWhere
              <option value='BS5_Menu_Any_Print_polis_cargo' "; if ( 'BS5_Menu_Any_Print_polis_cargo'   == $_POST[web_menu]) { echo " selected ";} echo ">Print Polis File Cargo
              <option value='BS5_Menu_Any_Anyware_aerox' "; if ( 'BS5_Menu_Any_Anyware_aerox'           == $_POST[web_menu]) { echo " selected ";} echo ">Anywhere Bike";

             echo"
          </select>
            ";

    }
?>
