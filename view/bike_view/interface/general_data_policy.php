<?php
namespace general;
function tampilan($tampilan, $user_id, $mkg_group,$full_dept, $data, $data2, $data3, $data4, $data5,$data6,$UWD_HOLD_list,$UWD_HOLD_date,$UWD_HOLD_list_select,$UWD_HOLD_text){
    $dat = $data[data][0];
    $list_branch = $data2[code];
    $person_name_master = $data3[code];
    $person_name_master_gh_ao = $data4[code];
    $list_agent_id_data = $data5[code];
    $general_table_data = $data6[code];
    if($dat[note_uwd_oth] != ''){$disabled = '';} else {$disabled = 'disabled';}
    if ( $dat[admin_cost]       == null ) { $adm_cost = number_format(60000);} else { $adm_cost = number_format($dat[admin_cost]);  }
    $tgl_awal = format_year($dat[tgl_awal]);
    $tgl_akhir = format_year($dat[tgl_akhir]);
    $tgl_conf_spp = format_year($dat[tgl_conf_spp]);

//     $dat[wfh_id]
// $dat[konf_tertulis]
// print_r($list_agent_id_data);
echo "
$dat[konf_tertulis]
<div class='container-fluid flex-wrap align-content-start' id='main-menu'>
    <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
        <div class='card-body'>
            <h4 class='card-title mb-3'>General Data Policy</h4>
            <div class='main d-flex flex-column w-100'> 
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Polis Number</span>
                    </div>
                    <div class='isi align-self-center d-flex flex-row align-items-center gap-3'>
                        <input type='text' class='form-control' name='Policy_No' value='$dat[Policy_No]' disabled> 
                        <span class='flex-shrink-0'>- $dat[policy_status_aegis]</span>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Prev Polis Number</span>
                    </div>
                    <div class='isi align-self-center'>
                        <input type='text' class='form-control' name='ex_polis_no'  value='$dat[ex_polis_no]' disabled>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Web Engine</span>
                    </div>
                    <div class='isi d-flex flex-row'>
                        <select class='form-select w-50 me-1' id='web_engine_class' name='web_engine_class' $UWD_HOLD_list_select>";
                        if ( $mkg_group == 'DEMO') { $jebak_web_engine_class = ''; } else { $jebak_web_engine_class = 'disabled'; }
                        echo"
                            <option value='WEB_AUTO'                         "; if ( 'WEB_AUTO' == $dat[web_engine_class]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">AUTO</option>
                            <option value='WEB_BIKE' $jebak_web_engine_class "; if ( 'WEB_BIKE' == $dat[web_engine_class]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">BIKE</option>
                            <option value='WEB_FIRE' $jebak_web_engine_class "; if ( 'WEB_FIRE' == $dat[web_engine_class]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">FIRE</option>
                        </select>
                        <select class='form-select w-50 ms-1' id='wfh_id' class='sh_rate_table' name='wfh_id' $UWD_HOLD_list_select>
                        ";
                        if ( $_SESSION['Dept_database'] == 'MG07' and  $_SESSION['Dept_login'] <> 'MKGROUP7')
                        {
                          echo"
                                <option value='0017'"; if ( '0017' == $dat[wfh_id]) { echo " selected ";}  else { echo $UWD_HOLD_list;} echo ">ROL</option>
                                <option value='0036'"; if ( '0036' == $dat[wfh_id]) { echo " selected ";}  else { echo $UWD_HOLD_list;} echo ">ROL SA</option>
                          ";
                        }
                        elseif ( $_SESSION['Dept_database'] == 'ROL' and  $_SESSION['Dept_login'] <> 'ROL')
                        {
                          echo"
                                <option value='0017'"; if ( '0017' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL</option>
                                <option value='0036'"; if ( '0036' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL SA</option>
                          ";
                        }else{
                            echo"                        
                                <option value='0010'"; if ( '0010' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">AGENT</option>
                                <option value='0055'"; if ( '0055' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">AGENT SA</option>
                                <option value='0011'"; if ( '0011' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DIRECT</option>
                                <option value='0059'"; if ( '0059' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DIRECT SA</option>
                                <option value='0012'"; if ( '0012' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DEALER</option>
                                <option value='0061'"; if ( '0061' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DEALER SA</option>
                                <option value='0017'"; if ( '0017' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL</option>
                                <option value='0036'"; if ( '0036' == $dat[wfh_id]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL SA</option>
                            ";
                        }
                        echo"
                        </select>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Service</span>
                    </div>
                    <div class='isi align-self-center'>
                        <select class='form-select' name='type_api' $UWD_HOLD_list_select>";
                        echo"
                        <option value='R'"; if ( $dat[type_api] == 'R' || $dat[type_api] == 'R_upload' || substr($dat[type_api],0,6) == 'R_basi' ) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Regular</option>
                        <option value='E'"; if ( $dat[type_api] == 'E' ) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Express</option>
                        ";
                        echo"
                        </select>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name align-self-center flex-grow-1'>
                        <span>Konfirmasi Tertulis</span>
                    </div>
                    <div class='isi align-self-center'>
                        <div class='form-check'>
                            <input class='form-check-input radio_konf_tertulis' type='radio' name='konf_tertulis' value='Tertanggung (IC)' id='flexRadioDefault1'";if($dat[konf_tertulis] == 'Tertanggung (IC)') { echo "checked";} echo">
                            <label class='form-check-label' for='flexRadioDefault1'>
                            Tertanggung (IC)
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input radio_konf_tertulis' type='radio' name='konf_tertulis' value='Pihak Ketiga (OC)' id='flexRadioDefault2'";if($dat[konf_tertulis] == 'Pihak Ketiga (OC)') { echo "checked";} echo">
                            <label class='form-check-label' for='flexRadioDefault2'>
                            Pihak Ketiga (OC) 
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input radio_konf_tertulis' type='radio' name='konf_tertulis' value='Tidak Ada (NC)' id='flexRadioDefault3'";if($dat[konf_tertulis] == 'Tidak Ada (NC)') { echo "checked";} echo">
                            <label class='form-check-label' for='flexRadioDefault3'>
                            Tidak Ada (NC) 
                            </label>
                        </div>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Tgl Konfirmasi SPPA</span>
                    </div>
                    <div class='isi align-self-center'>
                        <input type='date' class='form-control' name='tgl_conf_spp' id='tgl_spp' value='$tgl_conf_spp' $UWD_HOLD_date>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Bukti SPPA</span>
                    </div>
                    <div class='isi align-self-center'>
                        <input class='form-control' type='file' name='bukti_conf_sppa' accept='image/jpg, image/jpeg'>
                        <input type='hidden' name='bukti_conf_sppa_backup' value='$dat[bukti_conf_sppa]'>";
                        if ( $dat[bukti_conf_sppa] <> '' )
                        {
                            echo"<a href='https://www.rks-w.com/mks/entry/bike/api/files/images/foto_bukti_sppa/$dat[bukti_conf_sppa]' target='_blank'>File Bukti Persetujuan SPPA</a>";
                        }  
                        echo"
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Bukti BAST</span>
                    </div>
                    <div class='isi align-self-center'>
                        <input class='form-control' type='file' name='bukti_conf_bast' accept='image/jpg, image/jpeg'>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Policy Issued</span>
                    </div>
                    <div class='isi align-self-center'>
                        <div class='mini my-1 d-flex flex-row align-items-center'>
                            <input type='text' name='p_orig' value='$dat[p_orig]' class='form-control me-2' value='' maxlength='2' autocomplete='off' style='text-align:center; width:60px' size='3'>
                            <span>Original</span>
                        </div>
                        <div class='mini my-1 d-flex flex-row align-items-center'>
                            <input type='text' name='p_copy' value='$dat[p_copy]' class='form-control me-2' value='' maxlength='2' autocomplete='off' style='text-align:center; width:60px' size='3'>
                            <span>Copy</span>
                        </div>
                        <div class='mini my-1 d-flex flex-row align-items-center'>
                            <input type='text' name='p_duplicate' value='$dat[p_duplicate]' class='form-control me-2' value='' maxlength='2' autocomplete='off' style='text-align:center; width:60px' size='3'>
                            <span>Duplicate</span>
                        </div>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Note Underwriter</span>
                    </div>
                    <div class='isi align-self-center'>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='note_uwd' id='flexRadioDefault1' value='PKS / SCHEME' ";if($dat[note_uwd] == 'PKS / SCHEME') { echo "checked";} echo">
                            <label class='form-check-label' for='flexRadioDefault1'>
                            PKS / SCHEME 
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='note_uwd' id='flexRadioDefault2' value='IM' ";if($dat[note_uwd] == 'IM') { echo "checked";} echo">
                            <label class='form-check-label' for='flexRadioDefault2'>
                            IM 
                            </label>
                        </div>
                        <div class='form-check d-flex flex-row align-items-center'>
                            <input class='form-check-input' type='radio' name='note_uwd' id='flexRadioDefault3' value='Other' ";if($dat[note_uwd] == 'Other') { echo "checked";} echo">
                            <label class='form-check-label' for='flexRadioDefault3'>
                            Other
                            </label>
                             <input type='text' name='note_uwd_oth' value='$dat[note_uwd_oth]' id='radio_note_uwd_oth' $disabled class='form-control ms-2' autocomplete='off'>
                        </div>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Branch Code</span>
                    </div>
                    <div class='isi align-self-center'>
                        <select name='corp' id=the_corp_id class='form-select w-50 reform cari_harga_boil' aria-label='Default select example' $UWD_HOLD_list_select>";
                        foreach ($list_branch as $mks_data)
                        {
                          $value      = $mks_data[BRANCH_CODE];
                          $value_desc = $mks_data[BRANCH_NAME];
                          echo "<option value='$value'"; if ($value==$dat['corp_id']) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value - $value_desc</option>";
                        }       
                    echo"
                        </select>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Bus Code</span>
                    </div>
                    <div class='isi align-self-center'>
                        <select name='bus_code' id=the_bus_code class='form-select w-25 reform' aria-label='Default select example' $UWD_HOLD_list_select>
                        <option value='E'   ";if ( 'E'  == $dat[bus_code]) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >E </option>
                        <option value='N1'  ";if ( 'N1' == $dat[bus_code]) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N1</option>
                        <option value='N2'  ";if ( 'N2' == $dat[bus_code]) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N2</option>
                        <option value='N3'  ";if ( 'N3' == $dat[bus_code]) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N3</option>
                        <option value='N4'  ";if ( 'N4' == $dat[bus_code]) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N4</option>
                        <option value='R'   ";if ( 'R'  == $dat[bus_code]) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >R</option>
                        </select>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Marketing Member</span>
                    </div>
                    <div class='isi d-flex flex-row align-items-center'>";
                    if ( $mkg_group == 'DEMO'){
                        echo"
                        <span class='flex-shrink-0'>$full_dept -</span>
                        <select name='mkg_member' $UWD_HOLD_list_select class='form-select w-50 ms-2 reform' aria-label='Default select example'>
                            <option value='DEMO' selected >Demo Marketing</option>
                        </select>   
                        ";

                    }else{
                        // $cabang_no_expolis_01 = substr( $dat[ex_polis_no],0,2 ); ENTAH DIPAKAI DIMANA
                        // $cabang_no_expolis_02 =  $dat[ex_polis_no];
                        echo"
                        <span class='flex-shrink-0'>$full_dept -</span>
                        <select class='form-select w-50 ms-2 reform' name='mkg_member' $UWD_HOLD_list_select aria-label='Default select example'>";
                        foreach ($person_name_master as $mks_data)
                        {   $value      = $mks_data[PERSON_SHORT_NAME];
                            $value_desc = $mks_data[PERSON_FULL_NAME];
                            echo "<option value='$value'"; if ($value==$dat['mkg_member']) {echo " selected ";} echo ">$value_desc</option>";
                        }
                        echo "</select>";
                    }
                echo"
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Account Officer</span>
                    </div>
                    <div class='isi align-self-center'>";
                    if ( $mkg_group == 'DEMO'){
                        echo"<select name='acc_officer' $UWD_HOLD_list_select class='form-select w-50 ms-2 reform' aria-label='Default select example'>
                            <option value='DEMO' selected >Demo Officer</option>
                        </select>   
                        ";

                    }else{
                        echo"
                        <span class='flex-shrink-0'>$full_dept -</span>
                        <select class='form-select w-50 ms-2 reform' name='acc_officer' $UWD_HOLD_list_select aria-label='Default select example'>";
                        foreach ($person_name_master_gh_ao as $mks_data)
                        {   $value      = $mks_data[PERSON_SHORT_NAME];
                            $value_desc = $mks_data[PERSON_FULL_NAME];
                            echo "<option value='$value'"; if ($value==$dat['mkg_officer']) {echo " selected ";} echo ">$value_desc</option>";
                        }
                        echo "</select>";
                    }
                echo"
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Agent ID</span>
                    </div>
                    <div class='isi align-self-center'>";
                        if($mkg_group <> 'DEMO')
                        {
                        
                            echo "<select id='no_agent_id' name='no_agent_id' class='form-select w-50 ms-2 reform' aria-label='Default select example' $UWD_HOLD_list_select>";
                            echo "<option value=''>NO AGENT ID</option>
                            </select>";
                        
                        }
                    if ( $mkg_group == 'DEMO'){
                    //     echo "<select id='no_agent_id' name='no_agent_id' $UWD_HOLD_list_select> bakal di cek lagi di js
                    //     <option value=''>NO AGENT ID</option>
                    //   </select>";
                        if($dat['agent_code'] <> '')
                        {
                        $dat['code_agent'] = $dat['agent_code'];
                        }
                            echo"
                            <select class='form-select w-50 ms-2 reform' id='id_agent_code' name='agent_code'  $UWD_HOLD_list_select aria-label='Default select example'>";
                            foreach ($list_agent_id_data as $mks_data)
                            { $profile    = $mks_data[PROFILE_ID] ;
                                $name_full  = $mks_data[FULL_NAME];
                                echo "<option value='$profile'"; if ($profile==$dat['code_agent']) {echo " selected ";} echo ">$name_full</option>";
                            }
                            echo "</select>";
                    }
                echo"
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Policy Period</span>
                    </div>
                    <div class='isi d-flex flex-column gap-2'>
                        <div class='d-flex flex-row gap-1 align-items-center'>
                            <input $UWD_HOLD_text type='date' class='hitung1 form-control me-2' name=tgl_awal  value='$tgl_awal' id=datepicker1 >
                            <span>To</span>
                            <input $UWD_HOLD_text type='date' class='hitung1 form-control ms-2' name=tgl_akhir value='$tgl_akhir' id=datepicker2 >
                        </div>
                        ";
                    echo "
                        <div id=boxChoose class='d-none flex-row gap-1 align-items-center'>
                            <span>Method</span>
                            <select $UWD_HOLD_list_select name='short_rate_metode'  id=shortRate_metode class='form-select w-25 reform hitung1'sss>
                                <option value=''           ";if ( ''           == $dat[short_rate_metode]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Choose
                                <option value='Pro_Rate'   ";if ( 'Pro_Rate'   == $dat[short_rate_metode]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Pro Rate
                                <option value='Short_Rate' ";if ( 'Short_Rate' == $dat[short_rate_metode]) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Short Rate
                            </select>
                            <input type=text  class='hitung form-control'  name=short_rate_value id=shortRateValue       value='$dat[short_rate_value]'  autocomplete=off style='display:none;width:60px;text-align:right;'>
                            <input type=hidden                name=code_short_rate          id=shortRateValueHid    value='$dat[code_short_rate]'  autocomplete=off >
                            <input type=hidden                name=code_short_rate1         id=shortRateValueHid1   value=''  autocomplete=off >
                            <input type=hidden                name=code_short_rate2         id=shortRateValueHid2   value=''  autocomplete=off >
                            <input type=hidden                name=code_short_rate3         id=shortRateValueHid3   value=''  autocomplete=off >
                            <span id=shortRateValueSign></span>
                        </div>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Admin Cost</span>
                    </div>
                    <div class='isi d-flex flex-row align-items-center' >
                        <span>IDR</span>
                        <input $UWD_HOLD_text type='text' value='$adm_cost' name=adm_cost class='form-control ms-2 w-25 reform numericinput' id='inputPassword'>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Wording No</span>
                    </div>
                    <div class='isi align-self-center'>
                        <input type='text' class='form-control w-50 reform' name=wording_no value='$dat[wording_no]' disabled>
                    </div>
                </div>
                <div class='d-flex guting my-2'>
                    <div class='name  align-self-center'>
                        <span>Membership</span>
                    </div>
                    <div class='isi align-self-center'>
                        <select class='form-select w-50 reform' name='membership' id='membership' $UWD_HOLD_list_select>";
                        foreach ($general_table_data as $mks_data)
                        {
                          $value      = $mks_data[GT_KEY];
                          $value_desc = $mks_data[GT_DESC_1] ;
                          echo "<option value='$value_desc'"; if ($value_desc==$dat['membership']) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value_desc</option>";
                        }

                    echo"
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://www.rks-w.com/mks/entry/bike/views/javascript/general_data_policy.js' ></script>
";
}
?>
