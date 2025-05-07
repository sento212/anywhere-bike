<?php

class NewView extends UserView{

    public function general()
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $full_dept = $this->full_dept;
        $data2 = $this->list_branch;
        $data3 = $this->person_name_master_gh;
        $data4 = $this->person_name_master_gh_ao;
        $data5 = $this->list_agent_id_data;
        $data6 = $this->general_table_data;
        $UWD_HOLD_list        = $this->UWD_HOLD_list;
        $UWD_HOLD_date        = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text        = $this->UWD_HOLD_text;
        $dat = $data['data'][0];
        $list_branch = $data2['code'];
        $person_name_master = $data3['code'];
        $person_name_master_gh_ao = $data4['code'];
        $list_agent_id_data = $data5['code'];
        $general_table_data = $data6['code'];
        if($dat['note_uwd_oth'] != ''){$disabled = '';} else {$disabled = 'disabled';}
        if ( $dat['admin_cost']       == null ) { $adm_cost = number_format(60000);} else { $adm_cost = number_format($dat['admin_cost']);  }
        $tgl_awal = $this->format_year($dat['tgl_awal']);
        $tgl_akhir = $this->format_year($dat['tgl_akhir']);
        $tgl_conf_spp = $this->format_year($dat['tgl_conf_spp']);

        //     $dat['wfh_id']
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
                                    <option value='WEB_BIKE' $jebak_web_engine_class "; if ( 'WEB_BIKE' == $dat['web_engine_class']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">BIKE</option>
                                </select>
                                <select class='form-select w-50 ms-1' id='wfh_id' class='sh_rate_table' name='wfh_id' $UWD_HOLD_list_select>
                                ";
                                if ( $_SESSION['Dept_database'] == 'MG07' and  $_SESSION['Dept_login'] <> 'MKGROUP7')
                                {
                                echo"
                                        <option value='0017'"; if ( '0017' == $dat['wfh_id']) { echo " selected ";}  else { echo $UWD_HOLD_list;} echo ">ROL</option>
                                        <option value='0036'"; if ( '0036' == $dat['wfh_id']) { echo " selected ";}  else { echo $UWD_HOLD_list;} echo ">ROL SA</option>
                                ";
                                }
                                elseif ( $_SESSION['Dept_database'] == 'ROL' and  $_SESSION['Dept_login'] <> 'ROL')
                                {
                                echo"
                                        <option value='0017'"; if ( '0017' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL</option>
                                        <option value='0036'"; if ( '0036' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL SA</option>
                                ";
                                }else{
                                    echo"
                                        <option value='0010'"; if ( '0010' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">AGENT</option>
                                        <option value='0055'"; if ( '0055' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">AGENT SA</option>
                                        <option value='0011'"; if ( '0011' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DIRECT</option>
                                        <option value='0059'"; if ( '0059' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DIRECT SA</option>
                                        <option value='0012'"; if ( '0012' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DEALER</option>
                                        <option value='0061'"; if ( '0061' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">DEALER SA</option>
                                        <option value='0017'"; if ( '0017' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL</option>
                                        <option value='0036'"; if ( '0036' == $dat['wfh_id']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">ROL SA</option>
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
                                <option value='R'"; if ( $dat['type_api'] == 'R' || $dat['type_api'] == 'R_upload' || substr($dat['type_api'],0,6) == 'R_basi' ) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Regular</option>
                                <option value='E'"; if ( $dat['type_api'] == 'E' ) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Express</option>
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
                                    <input class='form-check-input radio_konf_tertulis' type='radio' name='konf_tertulis' value='Tertanggung (IC)' id='flexRadioDefault1'";if($dat['konf_tertulis'] == 'Tertanggung (IC)') { echo "checked";} echo">
                                    <label class='form-check-label' for='flexRadioDefault1'>
                                    Tertanggung (IC)
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input radio_konf_tertulis' type='radio' name='konf_tertulis' value='Pihak Ketiga (OC)' id='flexRadioDefault2'";if($dat['konf_tertulis'] == 'Pihak Ketiga (OC)') { echo "checked";} echo">
                                    <label class='form-check-label' for='flexRadioDefault2'>
                                    Pihak Ketiga (OC)
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input radio_konf_tertulis' type='radio' name='konf_tertulis' value='Tidak Ada (NC)' id='flexRadioDefault3'";if($dat['konf_tertulis'] == 'Tidak Ada (NC)') { echo "checked";} echo">
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
                                if ( $dat['bukti_conf_sppa'] <> '' )
                                {
                                    echo"<a href='https://www.rks-m.com/mks/entry/view/menu/bike/api/files/images/foto_bukti_sppa/$dat[bukti_conf_sppa]' target='_blank'>File Bukti Persetujuan SPPA</a>";
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
                                    <input class='form-check-input' type='radio' name='note_uwd' id='flexRadioDefault1' value='PKS / SCHEME' ";if($dat['note_uwd'] == 'PKS / SCHEME') { echo "checked";} echo">
                                    <label class='form-check-label' for='flexRadioDefault1'>
                                    PKS / SCHEME
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='note_uwd' id='flexRadioDefault2' value='IM' ";if($dat['note_uwd'] == 'IM') { echo "checked";} echo">
                                    <label class='form-check-label' for='flexRadioDefault2'>
                                    IM
                                    </label>
                                </div>
                                <div class='form-check d-flex flex-row align-items-center'>
                                    <input class='form-check-input' type='radio' name='note_uwd' id='flexRadioDefault3' value='Other' ";if($dat['note_uwd'] == 'Other') { echo "checked";} echo">
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
                                $value      = $mks_data['BRANCH_CODE'];
                                $value_desc = $mks_data['BRANCH_NAME'];
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
                                <option value='E'   ";if ( 'E'  == $dat['bus_code']) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >E </option>
                                <option value='N1'  ";if ( 'N1' == $dat['bus_code']) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N1</option>
                                <option value='N2'  ";if ( 'N2' == $dat['bus_code']) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N2</option>
                                <option value='N3'  ";if ( 'N3' == $dat['bus_code']) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N3</option>
                                <option value='N4'  ";if ( 'N4' == $dat['bus_code']) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >N4</option>
                                <option value='R'   ";if ( 'R'  == $dat['bus_code']) { echo "selected ";} else { echo "$UWD_HOLD_list"; }  echo " >R</option>
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
                                {   $value      = $mks_data['PERSON_SHORT_NAME'];
                                    $value_desc = $mks_data['PERSON_FULL_NAME'];
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
                                {   $value      = $mks_data['PERSON_SHORT_NAME'];
                                    $value_desc = $mks_data['PERSON_FULL_NAME'];
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
                                    { $profile    = $mks_data['PROFILE_ID'] ;
                                        $name_full  = $mks_data['FULL_NAME'];
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
                                        <option value=''           ";if ( ''           == $dat['short_rate_metode']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Choose
                                        <option value='Pro_Rate'   ";if ( 'Pro_Rate'   == $dat['short_rate_metode']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Pro Rate
                                        <option value='Short_Rate' ";if ( 'Short_Rate' == $dat['short_rate_metode']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Short Rate
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
                                $value      = $mks_data['GT_KEY'];
                                $value_desc = $mks_data['GT_DESC_1'] ;
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
        <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/general_data_policy.js' ></script>
        ";
    }

    public function source()
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $UWD_HOLD_list        = $this->UWD_HOLD_list;
        $UWD_HOLD_date        = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text        = $this->UWD_HOLD_text;
        $dat = $data['data'][0];
            echo "
            <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
                <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                    <div class='card-body'>
                        <h4 class='card-title mb-3'>Source Of Business</h4>
                        <div class='main d-flex flex-column w-100'>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Code</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input $UWD_HOLD_text type='text' class='form-control w-25 me-2 onlynumber reform' name=sob_code id=sob_code value='$dat[sob_code]' maxlength='7'>
                                        <span class='flex-shrink-0'>[<span id=pt_or_private></span> <input type='hidden' id=get_pt_or_private name=get_pt_or_private >]</span>
                                </div>
                            </div>
                            <div class='gutang d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Name</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <span id=ptSob>-</span>
                                </div>
                            </div>
                            <div class='gutang d-flex flex-row my-2'>
                                <div class='name align-self-center '>
                                    <span>Email</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center '>
                                    <span id=sob_email class='w-100'>-</span>
                                </div>
                            </div>
                            <div class='gutang d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>NPWP</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <span id=npwp_source_of_biz>-</span>
                                </div>
                            </div>
                            <div class='gutang d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Bank Account</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <span id='bank_account_source_of_biz'>-</span>
                                </div>
                            </div>
                            <div class='gutang d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>No.WA</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <span id=no_wa_txt name=no_wa_txt>-</span> <input type='hidden' id=no_wa name=no_wa >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/source_of_business.js' ></script>
            ";
    }

    public function List_in()
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $UWD_HOLD_list        = $this->UWD_HOLD_list;
        $UWD_HOLD_date        = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text        = $this->UWD_HOLD_text;
        $UWD_HOLD_button      = $this->UWD_HOLD_button;
        $location_data        = $this->location_data;
        $butt_off_view        = $this->butt_off_view;
        $UWD_HOLD_text_area   = $this->UWD_HOLD_text_area;
        $list_province        = $this->list_province;
        $dat = $data['data'][0];
        $location_data = $location_data['code'] ?? '';
        $list_province = $list_province['code'] ?? '';
            echo "
            <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
                <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                    <div class='card-body'>
                        <h4 class='card-title mb-3'>Insured List & Policy Holder</h4>
                        <div class='main d-flex flex-column w-100'>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Fetch Insured Code</span>
                                </div>
                                <div class='isi d-flex flex-column'>
                                    <input type='text' class='form-control w-25 mb-1 reform onlynumber' $UWD_HOLD_text name=fetch_company maxlength=7  id='F_comp'  value='$dat[fetch_company]' placeholder='Insured Code'>
                                    <select class='form-select w-25 reform' id='loca_kirim_1' name='fetch_company_loc' $UWD_HOLD_list_select>";
                                    if ( strlen($dat['fetch_company']) >= 7 )
                                    {
                                        foreach ($location_data as $mks_data)
                                        {
                                        $value       = $mks_data['LOCATION_NO'];
                                        $value_desc  = $mks_data['ADDRESS_LINE1'];
                                        echo "<option value='$value'"; if ( $value == $dat['fetch_company_loc'] ) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value_desc</option>";
                                        }
                                        echo "<option value='ADD_NEW_ADDR'"; if ( 'ADD_NEW_ADDR' == $dat['fetch_company_loc'] ) {echo " selected ";} echo ">Add New Address</option>";
                                    }
                                echo"
                                    </select>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Insured ID Card</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input type='text' class='form-control w-50 me-2 onlynumber' id=insIDcard name=nik maxlength=16 value='$dat[nik]' placeholder='No KTP / NPWP'>
                                    <div class='form-check w-50 flex-shrink-0 align-self-center'>
                                        <input class='form-check-input' type='checkbox' value='' id='cek_company' name=nik_pt_person  value='$dat[nik_pt_person]'";if($dat['nik_pt_person'] == 'Y') { echo "checked";} echo">
                                        <label class='form-check-label' for='cek_company'>
                                            Ins As Company
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Insured Name</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input type='text' class='form-control w-100 me-2 upper'  $UWD_HOLD_text id=insName name=cus_name value='$dat[customer_name]'>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Email</span>
                                </div>
                                <div class='isi d-flex flex-row sidegtg gap-2'>
                                    <input type='text' $UWD_HOLD_text id='email' name=email class='form-control' value='$dat[email]' placeholder=''>";
                                    if ( $butt_off_view   == 'ON' ) { $jebak_uwd = "disabled"; } else { $jebak_uwd = ""; }
                                    // $status_uwd = array("APPROVE","INPROGRESS","REJECT");
                                    $status_uwd = array("APPROVE","INPROGRESS");
                                    if (in_array(  $dat['uwd_status'] , $status_uwd )) { $jebak_uwd = "disabled"; } else { $jebak_uwd = ""; }

                                    if ( $mkg_group == 'DEMO' or strtoupper($user_id) == 'MKS' )   { $jebak_uwd = ""; } else { $jebak_uwd = "disabled"; }
                                echo"
                                    <button $UWD_HOLD_button type='button' name='A_update_email_ins' id='A_update_email_ins' value='' class='btn btn-secondary flex-shrink-0 flex-shrink-0' data-mdb-ripple-init $jebak_uwd><i class='fa-solid fa-circle-plus'></i> Update</button>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Insured Address</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <div class='form-floating w-100'>
                                        <textarea class='form-control upper' $UWD_HOLD_text_area  maxlength=150 id='cust_add' name=cust_add style='height: 100px;'>$dat[customer_add]</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Postal Code</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input type='text' maxlength=5 class='form-control w-25 me-2' id='kodepos' name=kodepos value='$dat[kode_post]' placeholder=''>";
                                    if ( $dat['uwd_status'] == 'APPL' or $dat['uwd_status'] == '' ){
                                        echo "<button type='button' class='btn btn-secondary'  id=update_zip name=update_zip value='update_zipt' data-mdb-ripple-init><i class='fa-solid fa-circle-plus'></i> Load Postal Code</button>";
                                    }
                                    echo "
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Village/Sub District</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input type='text' class='form-control w-50 me-2 upper reform' id='kelurah' name=kelurah value='$dat[kelurahan]'  placeholder='Desa/Kelurahan'>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>District</span>
                                </div>
                                <div class='isi d-flex flex-column'>
                                    <input type='text' class='form-control w-50 mb-1 reform upper' name=kecamat id='District' value='$dat[kecamatan]' placeholder='Kecamatan'>";
                                    if ( $dat['uwd_status'] == 'APPL' or $dat['uwd_status'] == '' )
                                    {
                                        echo "<button type='button' id=update_District name=update_District value='update_District' class='btn btn-secondary w-50 reform' data-mdb-ripple-init><i class='fa-solid fa-circle-plus'></i> Load District</button>";
                                    }
                                    echo "
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>City/Regency</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input type='text' class='form-control w-50 me-2 upper reform' id='kabupaten' name=kabupaten size=25 value='$dat[kabupaten]' placeholder='KotaMadya/Kabupaten'>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Province</span>
                                </div>
                                <div class='isi d-flex flex-column'>
                                    <select class='form-select w-50 reform' id='province' name='province' $UWD_HOLD_list_select>";
                                    echo "<option value='' ";
                                    if ( $dat['province'] == '' ) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">-- Choose --</option>";
                                    foreach ($list_province as $mks_data)
                                    {
                                    $value = $mks_data['PROVINCE_NAME'];
                                    echo "<option value='$value'"; if ($value==$dat['province']) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value</option>";
                                    }
                                echo "
                                    </select>
                                </div>
                            </div>
                            <div class='guting d-flex flex-row my-2'>
                                <div class='name align-self-center'>
                                    <span>Mobile Phone</span>
                                </div>
                                <div class='isi d-flex flex-row align-items-center'>
                                    <input type='text' class='form-control w-50 me-2 onlynumber reform' $UWD_HOLD_text id='cust_hp' name=cust_hp  maxlength=16 value='$dat[mobile_phone]' placeholder=''>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/insurend_list.js' ></script>
            ";
    }

    public function Doc()
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $UWD_HOLD_list        = $this->UWD_HOLD_list;
        $UWD_HOLD_date        = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text        = $this->UWD_HOLD_text;
        $dat = $data['data'][0];
        $status_uwd = array("POST","INPROGRESS","APPROVE","HOLD","");
        if (in_array(  $dat['uwd_status'] , $status_uwd )) { $D_app_but = ' disabled '; } else { $D_app_but = ''; }
        echo "
        <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                <div class='card-body'>
                    <h4 class='card-title mb-3'>Document Approval</h4>
                    <div class='main d-flex flex-column w-100'>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Document Approval 01</span>
                            </div>
                            <div class='sidegtg isi d-flex flex-column align-items-start gap-2'>
                                <div class='d-flex flex-row w-100 gap-2'>
                                <input type='text' form=cek_doc_app id=doc_suevey $UWD_HOLD_text name=reg_approval_web  value='$dat[reg_approval_web]' maxlength='14' class='form-control reform w-25' placeholder='xxxxxx-xx-xxxx'>
                                ";
                                if (  ( $dat['register_id'] == '' ) or (  $dat['register_id'] != ''  and $dat['reg_approval_web'] == '' )  ){
                                echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app      id=doc_suevey_cek >
                                </div>";
                                }
                                else if (  $dat['register_id'] != '' and $dat['reg_approval_web'] != '' ){
                                    echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app      id=doc_suevey_cek >
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                                </div>";
                                }
                        echo"</div>
                        </div>";

                        $doc1 = $dat['doc_appr']['reg_approval_web1'] ?? [];
                        if (!empty($doc1))
                        {
                            $this->doc_tampil($dat['doc_appr']['reg_approval_web1']);
                        }
                        elseif($dat['reg_approval_web'] != ''){
                            echo "<span style='color:red'><b>Dokumen Tidak Ditemukan !</b></span>";
                        }

                        echo"
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Document Approval 02</span>
                            </div>
                            <div class='sidegtg isi d-flex flex-column align-items-start gap-2'>
                                <div class='d-flex flex-row w-100 gap-2'>
                                <input type='text' form=cek_doc_app id=doc_suevey_02 $UWD_HOLD_text name=reg_approval_web_02  value='$dat[reg_approval_web_02]' maxlength='14' class='form-control reform w-25' placeholder='xxxxxx-xx-xxxx'>
                                ";
                                if (  ( $dat['register_id'] == '' ) or (  $dat['register_id'] != ''  and $dat['reg_approval_web_02'] == '' )  ){
                                echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_02 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app_02      id=doc_suevey_cek_02 >
                                </div>";
                                }
                                else if (  $dat['register_id'] != '' and $dat['reg_approval_web_02'] != '' ){
                                    echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_02 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_02 $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app_02      id=doc_suevey_cek_02 >
                                </div>";
                                }
                        echo"</div>
                        </div>";

                        $doc2 = $dat['doc_appr']['reg_approval_web2'] ?? '';
                        if (!empty($doc2))
                        {
                            $this->doc_tampil($dat['doc_appr']['reg_approval_web2']);
                        }
                        elseif($dat['reg_approval_web_02'] != ''){
                            echo "<span style='color:red'><b>Dokumen Tidak Ditemukan !</b></span>";
                        }

                        echo"
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Document Approval 03</span>
                            </div>
                            <div class='sidegtg isi d-flex flex-column align-items-start gap-2'>
                                <div class='d-flex flex-row w-100 gap-2'>
                                <input type='text' form=cek_doc_app id=doc_suevey $UWD_HOLD_text name=reg_approval_web_03  value='$dat[reg_approval_web_03]' maxlength='14' class='form-control reform w-25' placeholder='xxxxxx-xx-xxxx'>
                                ";
                                if (  ( $dat['register_id'] == '' ) or (  $dat['register_id'] != ''  and $dat['reg_approval_web_03'] == '' )  ){
                                echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_03 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app_03      id=doc_suevey_cek_03 >
                                </div>";
                                }
                                else if (  $dat['register_id'] != '' and $dat['reg_approval_web_03'] != '' ){
                                    echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_03 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_03 $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app_03      id=doc_suevey_cek_03 >
                                </div>";
                                }
                        echo"</div>
                        </div>";

                        $doc3 = $dat['doc_appr']['reg_approval_web3'] ?? [];
                        if (!empty($doc3))
                        {
                            $this->doc_tampil($dat['doc_appr']['reg_approval_web3']);
                        }
                        elseif($dat['reg_approval_web_03'] != ''){
                            echo "<span style='color:red'><b>Dokumen Tidak Ditemukan !</b></span>";
                        }

                        echo"
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Document Approval 04</span>
                            </div>
                            <div class='sidegtg isi d-flex flex-column align-items-start gap-2'>
                                <div class='d-flex flex-row w-100 gap-2'>
                                <input type='text' form=cek_doc_app id=doc_suevey $UWD_HOLD_text name=reg_approval_web_04  value='$dat[reg_approval_web_04]' maxlength='14' class='form-control reform w-25' placeholder='xxxxxx-xx-xxxx'>
                                ";
                                if (  ( $dat['register_id'] == '' ) or (  $dat['register_id'] != ''  and $dat['reg_approval_web_04'] == '' )  ){
                                echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_04 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app_04      id=doc_suevey_cek_04 >
                                </div>";
                                }
                                else if (  $dat['register_id'] != '' and $dat['reg_approval_web_04'] != '' ){
                                    echo"
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_04 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                                    <button type=submit form=cek_doc_app name=reg_approval_web_but_04 $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                                    <input  type=hidden form=cek_doc_app name=val_reg_doc_app_04      id=doc_suevey_cek_04 >
                                </div>";
                                }
                        echo"</div>
                        </div>";

                        $doc4 = $dat['doc_appr']['reg_approval_web4'] ?? [];
                        if (!empty($doc4))
                        {
                            $this->doc_tampil($dat['doc_appr']['reg_approval_web4']);
                        }
                        elseif($dat['reg_approval_web_04'] != ''){
                            echo "<span style='color:red'><b>Dokumen Tidak Ditemukan !</b></span>";
                        }

                        echo"
                        <input type=hidden form=cek_doc_app name=no_regis      value='$dat[register_id]' >
                        <input type=hidden form=cek_doc_app name=no_unit      value='$dat[unit_no]' >
                    </div>
                </div>
            </div>
        </div>
        ";
    }

    private function doc_tampil($data)
    {
        $list_judul_doc = $data;
        $doc_judul   = $list_judul_doc['doc_judul'];
        $doc_ket     = $list_judul_doc['doc_ket'];
        $doc_tgl_req = $list_judul_doc['doc_tgl_req'];
        $doc_jns_doc = $list_judul_doc['doc_jns_doc'];
        echo"
        <div class='table-container tbw-100 pt-2' style='overflow-x:auto;'>
            <table class='table table-bordered'>
                <thead class='table-warning'>
                    <tr>
                        <td>
                            <div style='text-align:center;font-weight:bold;'>
                                <font style='font-weight:bold;color:red'>$doc_jns_doc</font> <br>
                                Reg Doc $list_judul_doc[approval_code],at $doc_tgl_req
                                <br>$doc_judul
                            </div>
                            $doc_ket
                        </td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><b>PICTURE</b><br>";
                    foreach($list_judul_doc['data_foto'] as $foto){
                    echo"
                            <a href='$foto[link]' target='_blank'><i class='fa fa-file-image-o fa-lg fa-fw'></i></a>
                                $foto[nama_file], Size : $foto[besarfile] kB</a>
                            <br>
                        ";
                    }
                echo"
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>CHAT</b><br><br>";
                        $list_value = array_column($list_judul_doc['data_chat'], 'chat_user_name');
                        $data_user = array_unique($list_value);
                        $colors = array(
                            "#DAA520",
                            "red",
                            "blue",
                            "green"
                        );
                        foreach($list_judul_doc['data_chat'] as $chat){
                            $angka = array_search($chat['chat_user_name'], $data_user);
                            if($angka > 3){
                                $angka = $angka % 3;
                            }
                            if($chat['link_file'] != '')
                                {
                                    $files = "<a href='$chat[link_file]' target='_blank'><i class='fa fa-file-image-o fa-lg fa-fw'></i>
                                    $chat[file_name]</a>";
                                }
                            else{
                                    $files = '';
                                }
                            echo"
                            <div class='chat border w-100 px-3 pt-2 pb-1 my-2 rounded-3 d-flex flex-column'>
                                <div class='mb-1' style='color: $colors[$angka];'>$chat[chat_user_name]</div>
                                $chat[chat]
                                $files
                                <div class='align-self-end' style='font-size: 12px;'>$chat[tgl_chat]</div>
                            </div>
                            ";
                        }
                echo"
                    </td>
                </tr>
                <tr>
                    <td>
                    <div class='table-container' style='overflow-x:auto;'>
                        <b>APPROVAL STATUS</b><br><br>
                                <table class='table table-bordered'>
                                    <thead class='table-dark'>
                                        <tr>
                                            <td class='text-center'>No</td>
                                            <td class='text-center'>User</td>
                                            <td class='text-center'>Y/N</td>
                                            <td class='text-center'>Date</td>
                                            <td class='text-center'>Remark</td>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    $no = 1;
                                    foreach($list_judul_doc['data_doc_app'] as $apprv){
                                        echo"
                                        <tr>
                                            <td align='center' style='font-size:11px;'  >$no                </td>
                                            <td style='font-size:11px;'                 >$apprv[email1]     </td>
                                            <td align='center' style='font-size:11px;'  >$apprv[reject]     </td>
                                            <td style='font-size:11px;'                 >$apprv[tglbuat]    </td>
                                            <td style='font-size:11px;'                 >$apprv[keterangan] </td>
                                        </tr>
                                        ";
                                        $no++;
                                    }
                                echo "
                                    </tbody>
                                </table>
                        </td>
                    </div>
                </tr>
            </tbody>
            </table>
        </div>
        ";
    }

    public function qq_name()
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $qq_location = $this->qq_location;
        $qq_location2 = $this->qq_location2;
        $UWD_HOLD_list        = $this->UWD_HOLD_list;
        $UWD_HOLD_date        = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text        = $this->UWD_HOLD_text;
        $UWD_HOLD_checkbox    = $this->UWD_HOLD_checkbox;
        $UWD_HOLD_text_area   = $this->UWD_HOLD_text_area;
        $dat = $data['data'][0];
        echo "
        <div class='container-fluid flex-wrap align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                <div class='card-body'>
                    <h4 class='card-title mb-3'>QQ Insured Name</h4>
                    <div class='main d-flex flex-column w-100'>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>Fetch QQ1</span>
                            </div>
                            <div class='isi'>
                                <div class='row row-cols-2 g-1'>
                                    <div class='col special'>
                                        <input type='text' class='form-control onlynumber' $UWD_HOLD_text name=fetch_qq  id='fetch_qq' value='$dat[fetch_qq]' maxlength='7' placeholder='QQ1 Code'>
                                    </div>
                                    <div class='col-3 d-flex align-items-center'>
                                        (7 Digit)
                                    </div>
                                    <div class='col special'>
                                        <select class='form-select' id='loca_kirim_qq' name='fetch_qq_loc' $UWD_HOLD_list_select>";
                                        foreach ($qq_location['code'] as $mks_data)
                                        {
                                          $value       = $mks_data['LOCATION_NO'];
                                          $value_desc  = $mks_data['ADDRESS_LINE1'];
                                          echo "<option value='$value'"; if ( $value == $dat['fetch_qq_loc'] ) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value_desc</option>";
                                        }
                                    echo"
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>QQ1 ID Card No</span>
                            </div>
                            <div class='isi d-flex flex-row justify-content-center align-items-center gap-1'>
                                <input type='text' class='form-control w-50 onlynumber' maxlength=16 name=nik_qq value='$dat[nik_qq]' placeholder='No KTP / NPWP QQ1'>
                                <div class='form-check w-50'>
                                    <input class='form-check-input' type='checkbox' name=qq_pt_person id=cek_qq_company value='$dat[qq_pt_person]' ";if ( $dat['qq_pt_person'] == 'Y' ) {echo " checked ";} echo ">
                                    <label class='form-check-label' for='cek_qq_company'>
                                        QQ1 As Company
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>QQ1 Name</span>
                            </div>
                            <div class='isi d-flex flex-row justify-content-center align-items-center gap-1'>
                                <input type='text' class='form-control upper' $UWD_HOLD_text id=qqName name=qq value='$dat[qq]'>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>QQ1 Address</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <div class='form-floating w-100'>
                                    <textarea class='form-control upper' id=qqadd maxlength=150  name=qq_add style='height: 100px;'>$dat[qq_add]</textarea>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>QQ1 Mobile Phone</span>
                            </div>
                            <div class='isi d-flex flex-row justify-content-center align-items-center gap-1'>
                                <input type='text' class='form-control onlynumber' $UWD_HOLD_text id=qqhp type=text name=qq_mobile_phone maxlength=16 value='$dat[qq_mobile_phone]'>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>Fetch QQ2</span>
                            </div>
                            <div class='isi'>
                                <div class='row row-cols-2 g-1'>
                                    <div class='col special'>
                                        <input type='text' class='form-control onlynumber' $UWD_HOLD_text type=text name=fetch_qq2  id='fetch_qq2' value='$dat[fetch_qq2]' maxlength=7  placeholder='QQ2 Code'>
                                    </div>
                                    <div class='col-3 d-flex align-items-center'>
                                        (7 Digit)
                                    </div>
                                    <div class='col special'>
                                        <select id='loca_kirim_qq2' class='form-select' aria-label='Default select example'>";
                                        foreach ($qq_location['code'] as $mks_data)
                                        {
                                          $value       = $mks_data['LOCATION_NO'];
                                          $value_desc  = $mks_data['ADDRESS_LINE1'];
                                          echo "<option value='$value'"; if ( $value == $dat['fetch_qq2_loc'] ) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value_desc</option>";
                                        }
                                    echo"
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>QQ2 ID Card No</span>
                            </div>
                            <div class='isi d-flex flex-row justify-content-center align-items-center gap-1'>
                                <input type='text' class='form-control w-50 onlynumber' $UWD_HOLD_text type=text maxlength=16 name=nik_qq2  value='$dat[nik_qq2]' placeholder='No KTP / NPWP QQ2'>
                                <div class='form-check w-50'>
                                    <input class='form-check-input' id=cek_qq2_company $UWD_HOLD_checkbox type=checkbox  name=qq2_pt_person   value='$dat[qq2_pt_person]'"; if ( $dat['qq2_pt_person'] == 'Y' ) {echo " checked ";} echo ">
                                    <label class='form-check-label' for='cek_qq2_company'>
                                        QQ2 As Company
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>QQ2 Name</span>
                            </div>
                            <div class='isi d-flex flex-row justify-content-center align-items-center gap-1'>
                                <input $UWD_HOLD_text type=text id=qq2name name=qq2 class='form-control upper' value='$dat[qq2]'>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>QQ2 Address</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <div class='form-floating w-100'>
                                    <textarea class='form-control upper' $UWD_HOLD_text_area maxlength=150 id=qq2add   name=qq2_add style='height: 100px;'>$dat[qq2_add]</textarea>
                                </div>
                            </div>
                        </div>
                        <div class='d-flex guting my-2'>
                            <div class='name align-self-center'>
                                <span>QQ2 Mobile Phone</span>
                            </div>
                            <div class='isi d-flex flex-row justify-content-center align-items-center gap-1'>
                                <input type='text' class='form-control onlynumber' $UWD_HOLD_text type=text id=qq2hp  name=qq2_mobile_phone maxlength=16 value='$dat[qq2_mobile_phone]'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/insured_name.js' ></script>
        ";

    }

    public function renewal($result_Simul_to_pol_quo)
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $UWD_HOLD_list        = $this->UWD_HOLD_list;
        $UWD_HOLD_date        = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text        = $this->UWD_HOLD_text;
        $insurend             = $this->insurend;
        $UWD_HOLD_text_area   = $this->UWD_HOLD_text_area;
        $butt_off_view = $this->butt_off_view;
        $button_off_Q = '';
        $UWD_HOLD_button      = $this->UWD_HOLD_button;
        $dat = $data['data'][0];
        $disabled_renewal = "";
        if ($user_id == 'mks')
        {
          // request meeting 15:59 23-03-2023 jebak renewal, untuk agent, agent SA, dealer, dealer SA
          if ( $dat['wfh_id']  == '0010' ||
               $dat['wfh_id']  == '0055' ||
               $dat['wfh_id']  == '0012' ||
               $dat['wfh_id']  == '0061')
              {
                $disabled_renewal ="disabled";
              }
        }
        echo "
        <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                <div class='card-body'>
                    <h4 class='card-title mb-3'>Renewal Information</h4>
                    <div class='main d-flex flex-column w-100'>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Renewal Polis</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <select class='form-select w-50 reform' name='ren_option' id=ren_option $UWD_HOLD_list_select>
                                    <option value='USE_SOURCE_OF_BIZ'             ";if ( 'USE_SOURCE_OF_BIZ'  == $dat['ren_option']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Direct / ROL </option>
                                    <option value='USE_COMPANY_CODE'      $disabled_renewal";if ( 'USE_COMPANY_CODE'   == $dat['ren_option']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Agent / Dealer </option>
                                </select>
                            </div>
                        </div>";

                    echo "
                    <div class='hasil_ren_option'>
                        <div class='main d-flex guting'>
                            <div class='name align-self-center'>
                                <span>Insured Code</span>
                            </div>
                            <div class='isi'>
                                <div class='row row-cols-2 g-1'>
                                    <div class='col special'>
                                        <input type='text' class='form-control onlynumber upper' id='ren_insured_id' name='ren_insured_id'  minlength='7' maxlength='7' value='$dat[ren_insured_id]'>
                                    </div>
                                    <div class='col-3 d-flex align-items-center'>
                                        (7 Digit)
                                    </div>
                                    <div class='col special'>
                                        <select class='form-select' id='loca_kirim_renewal' name='ren_insured_id_loc'>";
                                        foreach ($insurend['code'] as $mks_data)
                                        {
                                        $value       = $mks_data['LOCATION_NO'];
                                        $value_desc  = $mks_data['ADDRESS_LINE1'];
                                        echo "<option value='$value'"; if ( $value == $dat['ren_insured_id_loc'] ) {echo " selected ";} else { } echo ">$value_desc</option>";
                                        }
                                        echo"
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Ren Insured Name</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_nama' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Address</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <textarea class='form-control w-75 reform' $UWD_HOLD_text_area maxlength=150  disabled id='ren_alamat' style='height: 100px;'>$dat[qq2_add]</textarea>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Email</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_email' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Postal Code</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-25' $UWD_HOLD_text type='text' id='ren_zip' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Village/Sub District</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_village' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>District</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_district' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>City/Regency</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_city' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Province</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_province' disabled>
                            </div>
                        </div>
                        <div class='main guting d-flex flex-row'>
                            <div class='name align-self-center'>
                                <span>Mobile Phone</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-75 reform' $UWD_HOLD_text type='text' id='ren_no_hp' disabled>
                            </div>
                        </div>
                    </div>
                        ";



                            // start button
                            if ( substr( $dat['register_id'],0,1) == 'Q' )   { $the_register_id = "Q" ; }
                            if ( substr( $dat['register_id'],0,1) == 'P' )   { $the_register_id = "P" ; }
                            if ( substr( $dat['register_id'],0,1) == 'S' )   { $the_register_id = "S" ; }

                            if ( $dat['register_id'] != '' )
                            {
                                if ( $the_register_id == 'Q' )
                                { $button_off_P = " disabled " ; }

                                if ( $the_register_id == 'P' )
                                { $button_off_Q = " disabled " ; $button_off_Copy = " disabled " ; }
                            }
                            else
                            { $button_off_Copy = " disabled " ; }


                            if ( $dat['uwd_status'] == 'APPL' )
                            {
                              $button_off_Copy = " disabled " ;
                            }

                            // 4 APRIL 2023 => TUTUP DULU AD BUG PADA SAAT APPROVE DI Q, TIDAK BISA DILAKUKAN Q_TO_P
                            //Trap untuk status uwd APPROVE or INPROGRESS or REJECT nya
                            // if ( $dat['uwd_status'] == 'APPROVE'  or  $dat['uwd_status'] == 'INPROGRESS'  )
                            // {
                            //     if ( $the_register_id == "Q"  )
                            //     { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled " ;}

                            //     if ( $the_register_id == "P" )
                            //     { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled " ;}
                            // }
                            // 4 APRIL 2023 => PERBAIKAN BUG (BUG PADA SAAT APPROVE DI Q, TIDAK BISA DILAKUKAN Q_TO_P)
                            if ( $dat['uwd_status'] == 'APPROVE')
                            {
                                if ( $the_register_id == "Q"  )
                                { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ;}

                                if ( $the_register_id == "P" )
                                { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ;}
                            }
                            if($dat['uwd_status'] == 'INPROGRESS') {
                                if ( $the_register_id == "Q"  )
                                { $button_off_Q = " disabled ";  $button_off_P = " disabled "; $button_off_Copy = " disabled ";}

                                if ( $the_register_id == "P" )
                                { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled ";}
                            }


                            //Trap untuk REJECT nya
                            if ( $dat['uwd_status'] == 'REJECT' )
                            {
                                if ( $the_register_id == "Q"  )
                                {  $button_off_Copy = " disabled " ; $button_off_P = " disabled " ;  }

                                if ( $the_register_id == "P" )
                                { $button_off_Copy = " disabled " ; $button_off_Q = " disabled " ; }
                            }


                            $list_cabang_uwd_hold = array(
                                "02-MKG06",
                                "03-BDG01",
                                "03-BDG02",
                                "03-CIREBON",
                                "03-JAMBI",
                                "04-MKG03",
                                "05-BATAM",
                                "05-MKG02",
                                "06-MANADO",
                                "06-MKG04",
                                "15-MKG03",
                                "16-KENDARI",
                                "16-MKG01",
                                "17-MKG01",
                                "18-MKG01",
                                "19-MKG01",
                                "07-MKG02",
                                "07-PADANG",
                                "08-SBY1",
                                "08-SBY2",
                                "09-MKG05",
                                "10-MKG04",
                                "11-MKG05",
                                "12-MKG04",
                                "13-MKG03",
                                "14-MKG01",
                                "MKGROUP1",
                                "MKGROUP10",
                                "MKGROUP11",
                                "MKGROUP12",
                                "MKGROUP14",
                                "MKGROUP2",
                                "MKGROUP3A",
                                "MKGROUP4",
                                "MKGROUP5",
                                "MKGROUP6",
                                "MKGROUP7",
                                "MKGROUP8",
                                "MKGROUP9",
                                "ROL",
                                "DEMO"
                              );

                            if (in_array($mkg_group, $list_cabang_uwd_hold)){

                                if($butt_off_view != 'ON'){

                                    // PILIHAN SIMULATION
                                    if ( substr ( $dat['register_id'], 0,1) == 'S'){

                                        if ( $dat['uwd_status'] == 'APPL' )
                                        {
                                        echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button type='submit' class='btn btn-secondary' name=update_data_Simul  value='update_simulation' data-mdb-ripple-init><i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                            </div>
                                        ";
                                        }
                                        if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo == '' )
                                        {
                                        echo "
                                                <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                                Generate Simulation to
                                                <select class='form-select w-25' name='pilih_Simul_KE_P_Q'>
                                                        <option value='Q' >Save To Quotation
                                                </select>
                                                <button type=submit class='btn btn-secondary' name='copy_simul_pol_quo'  value='copy_simul_pol_quo' data-mdb-ripple-init>GO</button>
                                                </div>
                                        ";
                                        }
                                        if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo != '' )
                                        {
                                        echo "
                                            <td colspan='2' align='center'>
                                                Generate Simulation to
                                                <select class='form-select w-25' name='pilih_Simul_KE_P_Q' >
                                                        <option value='Q' disabled";if ( $result_Simul_to_pol_quo == 'Q') { echo " selected ";} echo ">Save To Quotation
                                                </select>
                                                <br>
                                                No AnyWhere <input style='background-color:#dedede;' type=text name=new_reg_from_simul    value='xxx' size=16 readonly>
                                                <button type=submit class='btn btn-secondary' name=open_hasil_copy_simul value='open_hasil_copy_simul' data-mdb-ripple-init>Open</button>
                                            </td>
                                        ";
                                        }
                                    }

                                    // PILIHAN QUOTATION
                                    elseif ( substr ( $dat['register_id'], 0,1) == 'Q'){
                                        echo"
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=insert_data_quo        value='save_quotation' $button_off_Q    accesskey='Q' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                            <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=copy_data_quo_to_polis value='Copy_to_polis'  $button_off_Copy accesskey='T' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Quotation <u><b>T</b></u>o Policy</button>
                                        ";
                                        // nanti di pake kali jadi di remarks dulu
                                        // if($dat[source_api] == 'Raksa_patner')
                                        // {

                                        //    $sql_exp = "SELECT EXPIRED_DATE
                                        //                  FROM data_auto_per_end
                                        //                  WHERE
                                        //                        POLICY_NO = '$dat[ex_polis_no]'
                                        //                      AND
                                        //                        UW_CLASS = 'AUTO'
                                        //                      order by ENTRY_DATE DESC
                                        //                  ";
                                        //  $query_exp            = mysqli_fetch_assoc(mysqli_query($login_db_harian,$sql_exp));
                                        //  $tgl_list             = date('d-m-Y',strtotime($query_exp[EXPIRED_DATE]));
                                        //  $ex_polis_baru        = $dat[ex_polis_no];

                                        //   echo " <button type=submit  class='mks_button'   name=list_renew_part  value='list_renew_part' form='renew_partner' > List Renewal Partner 2</button>";

                                        // }
                                        echo"
                                        </div>
                                        ";
                                    }

                                    // PILIHAN POLIS  --> DONE CEK
                                    elseif ( substr ( $dat['register_id'], 0,1) == 'P')
                                    {

                                    echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                                <button type=submit class='btn btn-secondary' name=insert_data_pol        value='save_polis'     $button_off_P    accesskey='P' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>P</b></u>olicy</button>
                                            </div>
                                            ";
                                    }else{

                                        echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button type=submit class='btn btn-secondary' name=insert_data_simul  value='update_simulation' >                          <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                            <button type=submit class='btn btn-secondary' name=insert_data_quo    value='save_quotation' $button_off_Q  accesskey='Q'> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                        </div>
                                        ";
                                    }
                                }
                            }else{
                                if ( $butt_off_view != 'ON' ){
                                    // // netralkan utk Renter 1 unit ini gua skip dulu
                                    // if ( $_POST["Re_Entry"] and $tot_unit_reentry == '1' )
                                    // { $dat[register_id] = '';  $button_off_P = ''; $button_off_P = ''; }

                                    // PILIHAN SIMULATION
                                    if ( substr ( $dat['register_id'], 0,1) == 'S'){

                                        // VIRGIN STATUS
                                        if ( $dat['uwd_status'] == 'APPL' )
                                        {
                                        echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                                <button type=submit class='btn btn-secondary' name=update_data_Simul  value='update_simulation' data-mdb-ripple-init>  <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                            </div>
                                        ";
                                        }
                                        // STATUS POSTING ( UWD APPROVAL )
                                        else if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo == '' )
                                        {
                                        echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                                Generate Simulation to
                                                <select class='form-select w-25' name='pilih_Simul_KE_P_Q' >
                                                        <option value='Q' >Save To Quotation
                                                </select>
                                                <button type=submit class='btn btn-secondary' name='copy_simul_pol_quo'  value='copy_simul_pol_quo' data-mdb-ripple-init>GO</button>
                                            </div>
                                        ";
                                        }
                                        // STATUS POSTING ( UWD APPROVAL + SUDAH PILIH COPY DATA KEMANA DAN ADA OPEN KE ABYWHERE NYA )
                                        else if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo != '' )
                                        {
                                        echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                                Generate Simulation to
                                                <select class='form-select w-25' name='pilih_Simul_KE_P_Q' >
                                                        <option value='Q' disabled";if ( $result_Simul_to_pol_quo == 'Q') { echo " selected ";} echo ">Save To Quotation
                                                </select>
                                                <br>
                                                No AnyWhere <input style='background-color:#dedede;' type=text name=new_reg_from_simul class='form-control' value='xxx' size=16 readonly>
                                                <button type=submit class='btn btn-secondary' name=open_hasil_copy_simul value='open_hasil_copy_simul' data-mdb-ripple-init>Open</button>
                                            </div>
                                        ";
                                        }

                                    }

                                    // PILIHAN QUOTATION
                                    elseif ( substr ( $dat['register_id'], 0,1) == 'Q')
                                    {
                                        echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=insert_data_quo        value='save_quotation' $button_off_Q    accesskey='Q' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=copy_data_quo_to_polis value='Copy_to_polis'  $button_off_Copy accesskey='T' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Quotation <u><b>T</b></u>o Policy</button>

                                        </div>
                                        ";
                                    }
                                    // PILIHAN POLIS
                                    elseif ( substr ( $dat['register_id'], 0,1) == 'P')
                                    {
                                        echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button type=submit class='btn btn-secondary' name=insert_data_pol        value='save_polis'     $button_off_P    accesskey='P' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>P</b></u>olicy</button>
                                        </div>
                                        ";
                                    }else{
                                        echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                             <button type=submit class='btn btn-secondary' name=insert_data_simul  value='update_simulation' data-mdb-ripple-init>  <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                             &nbsp;&nbsp;
                                             <button type=submit class='btn btn-secondary' name=insert_data_quo    value='save_quotation' $button_off_Q    accesskey='Q' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                             &nbsp;&nbsp;
                                             <button type=submit class='btn btn-secondary' name=insert_data_pol    value='save_polis'     $button_off_P    accesskey='P' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>P</b></u>olicy</button>
                                         </div>
                                         ";
                                    }
                                }
                            }
                    echo "
                    </div>
                </div>
            </div>
        </div>
        <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/renawal_info.js' ></script>
        <form method='POST' id='renew_partner' action=''>
        <input  type=hidden     name=user_id            value='$user_id'          >
        <input  type=hidden     name=mk_group           value='$mkg_group'        >
        <input  type=hidden     name=web_menu           value='renewal_30_day_ren_partner_2'>
        </form>
        ";
    }

    public function policy($count_unit)
    {
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $full_dept = $this->full_dept;
        $make = $this->make;
        $cate = $this->cate;
        $model = $this->modeler;
        $foto_unit = $this->foto_unit;

        $UWD_HOLD_list          = $this->UWD_HOLD_list;
        $UWD_HOLD_date          = $this->UWD_HOLD_date;
        $UWD_HOLD_list_select   = $this->UWD_HOLD_list_select;
        $UWD_HOLD_text          = $this->UWD_HOLD_text;
        $UWD_HOLD_button        = $this->UWD_HOLD_button;
        $butt_off_view          = $this->butt_off_view;
        $UWD_HOLD_text_sum_ins  = $this->UWD_HOLD_text_sum_ins;
        $UWD_HOLD_text_area     = $this->UWD_HOLD_text_area;
        $dat = $data['data'][0];
        $unit_number = $dat['unit_no'];
        $unit_count  = $count_unit['data'];
        $text_add_U = "";
        $sum_ins_copy = '';

        if ( $unit_number     == null )
        {
            if($dat['jumlah_unit'] != null){
                $next_unit  = str_pad( $dat['jumlah_unit'] + 1 ,3, "0",STR_PAD_LEFT );
                $unit_number      = $next_unit;
            }else{
                $unit_number      = '001';
            }
        }

        if ( $dat['membership'] == NULL )   { $dat['membership']  = 'ORDINARY'; }

        if ( $mkg_group == 'DEMO'){ $off_uplaod_file = "";} else { $off_uplaod_file = "disabled";}

        if ( $butt_off_view == 'ON' ) { $off_add = "disabled" ; } else { $off_add = "" ;}

        if ( $dat['sum_ins']          == null ) { $sum_ins          = null;} else { $sum_ins          = number_format($dat['sum_ins']);          }

        $unit_count_oo = str_pad( $unit_count ,3, "0",STR_PAD_LEFT );

        if (  $dat['unit_no'] == null  )
        { $text_add_U = "<span class='text-warning'>[ SAVE BEFORE ADD UNIT ]</span>"; }

        if ( $dat['uwd_status'] == '' or  $dat['uwd_status'] == 'APPROVE' or $dat['uwd_status'] == 'INPROGRESS' )
        { $reqeust_suvey = "disabled"; } else { $reqeust_suvey = ""; }

        $no_survey_cek  = $dat['survey_no'];
        $dat_wfh_id="";
        if ( $dat["wfh_id"] == "0010" or $dat["wfh_id"] == "0011" or $dat["wfh_id"] == "0012" or $dat["wfh_id"] == "0017" or $dat["wfh_id"] == "0036" )  { $dat_wfh_id=""; }
        if ( $dat["wfh_id"] == "9999" or $dat["wfh_id"] == "8888" )  { 	$dat_wfh_id="MOTOR"; }

        if ( $dat['total_premi']      == null ) { $total_premi      = null;} else { $total_premi      = number_format($dat['total_premi']);      }
        if ( $dat['total_auto_premi'] == null ) { $total_auto_premi = null;} else { $total_auto_premi = number_format($dat['total_auto_premi']); }
        if ( $dat['disc_debit']       == null ) { $disc_debit       = null;} else { $disc_debit       = number_format($dat['disc_debit'],5);     }
        if ( $dat['disc_credit']      == null ) { $disc_credit      = null;} else { $disc_credit      = number_format($dat['disc_credit'],5);    }
        if ( $dat['value_tax23']      == null ) { $insert_tax23            = null;} else { $insert_tax23             = number_format($dat['value_tax23'],5);    }
        if ( $dat['value_ph21']       == null ) { $insert_pph21            = null;} else { $insert_pph21             = number_format($dat['value_ph21'],5);     }
        // $dat[register_id]
        echo "
        <input type=hidden id='unit_number' value='$unit_number'     >
        <input type=hidden id='register_id' value='$dat[register_id]'    >
        <input type=hidden id='tgl_buat_asli' value='$dat[tgl_buat_asli]'    >

        <input type=hidden id='wfh_ids' value='$dat_wfh_id'     >
        <input type=hidden id='wfh_id' value='$dat[wfh_id]'     >
        <div class='container-fluid align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded '>
                <div class='card-body'>
                    <h4 class='card-title mb-3'>Policy Unit $unit_number Of " . str_pad( $dat['total_unit'],3,'0',STR_PAD_LEFT ); echo "</h4>
                    <div class='main d-flex flex-column w-100'>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Upload Multi unit</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='file' class='form-control' $UWD_HOLD_button name=upload_multi_unit $off_uplaod_file accept='.xls,.XLS' />
                            </div>
                        </div>
                        <div class='guting d-flex flex-row align-items-center'>";
                            if ( $dat['unit_no'] <> '001' and $dat['unit_no'] <> null )
                            {
                                if ( $dat['unit_no'] == $unit_count_oo )
                                {
                                    echo"
                                    <div>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=add_unit  value='add_unit'   $off_add  data-mdb-ripple-init><i class='fa-solid fa-circle-plus'></i> Add</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=prev_unit value='prev_unit' data-mdb-ripple-init><i class='fa-solid fa-backward'></i> Prev</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=del_unit  value='del_unit' data-mdb-ripple-init><i class='fa-solid fa-trash'></i> Del</button>
                                        <input  type=hidden class='mks_button' form=addon_unit  name=unit_no   value='$unit_number' >
                                    </div>
                                    $text_add_U ";
                                }
                                else
                                {
                                    echo"
                                    <div>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=add_unit  value='add_unit'   $off_add  data-mdb-ripple-init><i class='fa-solid fa-circle-plus'></i> Add</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=prev_unit value='prev_unit' data-mdb-ripple-init><i class='fa-solid fa-backward'></i> Prev</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=next_unit value='next_unit' data-mdb-ripple-init><i class='fa-solid fa-forward'></i> Next</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=del_unit  value='del_unit' data-mdb-ripple-init><i class='fa-solid fa-trash'></i> Del</button>
                                        <input  type=hidden class='mks_button' form=addon_unit  name=unit_no   value='$unit_number' >
                                    </div>
                                    $text_add_U ";
                                }
                            }
                            elseif ( $dat['unit_no'] == '001')
                            {
                                if ( $unit_count > 1 )
                                {
                                    echo"
                                    <div>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=add_unit  value='add_unit'   $off_add  data-mdb-ripple-init><i class='fa-solid fa-circle-plus'></i> Add</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=next_unit value='next_unit' data-mdb-ripple-init><i class='fa-solid fa-forward'></i> Next</button>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=del_unit  value='del_unit' data-mdb-ripple-init><i class='fa-solid fa-trash'></i> Del</button>
                                        <input type=hidden  class='mks_button' form=addon_unit  name=unit_no   value='$unit_number' >
                                    </div>
                                    $text_add_U";
                                }
                                else
                                {
                                    echo"
                                    <div>
                                        <button $UWD_HOLD_button type='submit' class='btn btn-secondary flex-shrink-0' form=addon_unit  name=add_unit  value='add_unit'   $off_add  data-mdb-ripple-init><i class='fa-solid fa-circle-plus'></i> Add</button>
                                        <input  type=hidden class='mks_button' form=addon_unit  name=unit_no  value='$unit_number'  >
                                    </div>
                                    $text_add_U";
                                }
                            }
                            echo "
                            $text_add_U
                            <input type=hidden                              name=unit_no                    value='$unit_number'>
                            <input type=hidden id=unit_no_cek_button_survey name=unit_no_cek_button_survey  value='$dat[unit_no]'>
                        </div>";
                            if ( $dat['register_id'] == '')
                                {
                                    echo "
                                    <div class='guting d-flex flex-row my-2'>
                                        <div class='name align-self-center'>
                                            <span>Number of Photos</span>
                                        </div>
                                        <div class='isi d-flex flex-row align-items-center'>
                                            <select class='form-select reform' name='jml_foto' id='pilih_jml_foto' $UWD_HOLD_list_select>
                                                <option value='none' >Please SAVE first !!
                                            </select>
                                        </div>
                                    </div>
                                    ";
                                }else{
                                        echo "
                                    <div class='guting d-flex flex-row my-2'>
                                        <div class='name align-self-center'>
                                            <span>Number of Photos</span>
                                        </div>
                                        <div class='isi d-flex flex-row align-items-center'>
                                            <select class='form-select reform' name='jml_foto' id='pilih_jml_foto' $UWD_HOLD_list_select>
                                            <option value='none'" ;
                                            if ( $dat['jml_foto']=='' or $dat['jml_foto']=='0' )   { echo " selected ";} echo ">Choose";
                                            $Max_foto_upload = 10;
                                            for ( $Z=1 ; $Z <= $Max_foto_upload ; $Z++ )
                                            { echo "<option value='$Z' "; if ( $dat['jml_foto'] == $Z )  { echo " selected ";} echo ">$Z"; }
                                            echo"
                                            </select>
                                        </div>
                                    </div>";
                                }

                        echo "
                        <div class='table-container' id='add_photos'  style='overflow-x:auto;'>";
                        $table = $this->show_number($dat['tgl_buat_asli'],$UWD_HOLD_list_select,$UWD_HOLD_list,$foto_unit);
                        echo"
                        $table
                        </div>

                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>OJK Regional</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <select class='form-select reform sh_rate_table' name='wilayah_unit' id='wilayah' $UWD_HOLD_list_select>";
                                for ($i=1; $i <= 3; $i++)
                                {
                                  $wil_rks = str_pad( $i,2,"0",STR_PAD_LEFT )  ;
                                  echo "<option value='$wil_rks'";if ( $wil_rks == $dat['wilayah_unit']) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Wilayah $wil_rks ";
                                }
                                echo "
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Sum Insured</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select' style='width: 15%; min-width: 80px;' name='curr' id='Sum_Insured_Curr' $UWD_HOLD_list_select>
                                    <option value='IDR'"; if ($dat['curr']=='IDR')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">IDR
                                </select>
                                <input $UWD_HOLD_text_sum_ins type='text' class='form-control hitung sh_rate_table numericinput' id='Sum_Insured' name=sum_ins value='$sum_ins'>
                            </div>
                        </div>
                <!--    <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Request Survey</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform'  name='type_survey_model' $UWD_HOLD_list_select form='request_survey' $reqeust_suvey>
                                    <option value=''               >
                                    <option value='OLD_IPAD_RM'    >Existing RM Survery
                                    <option value='RM_PENUTUPAN'   >New RM Survery
                                </select>
                                <button type='button' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init>Request Survey</button>
                            </div>
                        </div>  -->
                        <div class='guting d-flex flex-row my-2' id='survey_no'>
                            <div class='name align-self-center'>
                                <span>Survey No</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                            $dat[survey_no]
                                <input type='text' class='form-control w-50 reform ' $UWD_HOLD_text type=text  id='fsurveyno'    name=survey_no  maxlength='21' value='$dat[survey_no]' placeholder='xx-xxxxx-xx-xxxx-xxxx'>
                                <input  type=hidden   id='fceksurveyno'   name=cek_no_survey  value='$no_survey_cek' >
                                <input  type=hidden   id=SI_survey      name=sum_ins_survey value='$sum_ins_copy'  >
                                <input type=hidden id='user_id' name=user_id       value='$user_id'          >
                                <input type=hidden id='mk_group' name=mk_group      value='$mkg_group'        >
                                <input type=hidden id='no_regis' name=no_regis      value='$dat[register_id]' >

                                <button type='button' class='btn btn-secondary flex-shrink-0' $UWD_HOLD_button type=submit  id=fButViewCekSurvey  name=cek_survey  value='cek survey' data-mdb-ripple-init><i class='fa-solid fa-rotate-left'></i> Retrieve</button>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Make</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' id='make' $UWD_HOLD_list_select name=make>";
                                $dataMake=$make['Data'];
                                foreach ($dataMake as $value)
                                {
                                    echo "<option value='$value'"; if ($value==$dat['make']) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value</option>";
                                }
                                echo"
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>cate</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' id='cate' $UWD_HOLD_list_select name=cate>";
                                $dataCate=$cate['Data'];
                                foreach ($dataCate as $value)
                                {
                                    echo "<option value='$value'"; if ($value==$dat['cate']) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value</option>";
                                }
                                echo"
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>model</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' id='moda' $UWD_HOLD_list_select name='moda'>";
                                $dataModel= $model['Data'];
                                foreach ($dataModel as $value)
                                {
                                    echo "<option value='$value'"; if ($value==$dat['model']) {echo " selected ";} else { echo $UWD_HOLD_list;} echo ">$value</option>";
                                }
                            echo "
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Colour</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <input type='text' class='form-control w-50 reform upper' $UWD_HOLD_text name=warna id='warna' value='$dat[warna]'>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Year</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <input type='text' class='form-control onlynumber' style='text-align:center; width:15%; min-width:80px' maxlength='4' $UWD_HOLD_text  name=tahun id='tahun_buat' value='$dat[tahun_buat]'>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Vehicle Status</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' id=fstatus name='status' $UWD_HOLD_list_select>
                                    <option value='NEW'"; if ($dat[ 'status_mobil' ]=='NEW')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">NEW
                                    <option value='USED'";if ($dat[ 'status_mobil' ]=='USED') { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">USED
                                </select>
                                <select class='form-select w-50 reform' name='use_new' $UWD_HOLD_list_select id=status_penggunaan>
                                    <option value='PRIBADI'"; if ($dat['status_penggunaan' ]=='PRIBADI')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">PRIBADI
                                    <option value='KOMERSIL'";if ($dat['status_penggunaan' ]=='KOMERSIL') { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">KOMERSIL
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Chassis No</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-50 reform'  id=no_rangka name=no_rangka value='$dat[no_rangka]' $UWD_HOLD_text>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Engine No</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-50 reform' id=no_mesin  name=no_mesin value='$dat[no_mesin]' $UWD_HOLD_text>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>License No</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <input type='text' class='form-control w-50 reform'  $UWD_HOLD_text id='No_Polisi' maxlength=15  name=plat value='$dat[no_polisi]'>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2' id='periode-polis'>
                            <div class='name align-self-center'>
                                <span>Period Polis</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <select class='form-select w-25 reform' id='thn_pertanggunan' $UWD_HOLD_list_select name='thn_pertanggunan' >
                                    <option value='0'";if ($dat['tahun_cover']==0) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Choose
                                    <option value='1'";if ($dat['tahun_cover']==1) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">1 Year
                                    <option value='2'";if ($dat['tahun_cover']==2) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">2 Year
                                    <option value='3'";if ($dat['tahun_cover']==3) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">3 Year
                                    <option value='4'";if ($dat['tahun_cover']==4) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">4 Year
                                    <option value='5'";if ($dat['tahun_cover']==5) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">5 Year
                                </select>
                            </div>
                        </div>";

                        $periode = $this->show_period($dat, $UWD_HOLD_list_select,$UWD_HOLD_text);
                        echo "$periode";

                        echo "
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Total Gross Premium</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center gap-1'>
                                <span id=shortRateHit></span><span id=shortRateHit1></span>
                                <input type='text' class='form-control w-25 reform' disabled id='manual_gross_premi' value='$total_premi'>
                                <input id=Auto_Total_Premi   type=hidden readonly name=auto_premi value='$total_auto_premi'  >
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Discount (On DN)</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <div class='persen w-25 reform d-flex flex-row align-items-center gap-2'>
                                    <input type='text' class='form-control w-75 onlynumber' style='text-align:end'  $UWD_HOLD_text id=discDN name=d_debit value='$disc_debit'>
                                    <span>%</span>
                                </div>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Commision (On CN)</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <div class='persen w-25 reform d-flex flex-row align-items-center gap-2'>
                                    <input type='text' class='form-control w-75 onlynumber' style='text-align:end'  $UWD_HOLD_text id=discCN name=d_credit value='$disc_credit'>
                                    <span>%</span>
                                </div>
                            </div>
                        </div>
                        <div id='tax23' class='guting d-none flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Tax23</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center' >
                                <div class='persen w-25 reform d-flex flex-row align-items-center gap-2'>
                                    <input type='text' class='form-control w-75 onlynumber' style='text-align:end' disabled  $UWD_HOLD_text name='tax23' value='$insert_tax23'>
                                    <span>%</span>
                                </div>
                            </div>
                        </div>
                        <div id='pph21' class='guting d-none flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>PPH21</span>
                            </div>
                            <div class='isi d-flex flex-row align-items-center'>
                                <div class='persen w-25 reform d-flex flex-row align-items-center gap-2'>
                                    <input type='text' class='form-control w-75 onlynumber' style='text-align:end' disabled  $UWD_HOLD_text name='pph21' value='$insert_pph21'>
                                    <span>%</span>
                                </div>
                            </div>
                        </div>
                        <div class='gutang d-flex flex-column my-2 gap-2'>
                            <span>Additional Equipment</span>
                            <div class='form-floating w-75 reform'>
                                <textarea class='form-control upper' $UWD_HOLD_text_area maxlength=2000 name=add_equip id='add_equipment' style='height: 150px;'>$dat[add_equipment]</textarea>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Non Standard Accessories ?</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' id='non_std' name='non_std' $UWD_HOLD_list_select>
                                    <option value=''  ";if ($dat['non_standart']=='')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">No
                                    <option value='Y' ";if ($dat['non_standart']=='Y') { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">YES
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Subject To No CLAIM ?</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' name='subject_non_claim' $UWD_HOLD_list_select>
                                    <option value=''  ";if ($dat['subject_non_claim']=='')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">No
                                    <option value='Y' ";if ($dat['subject_non_claim']=='Y') { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">YES
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>STNK Different Name ?</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' id=selSTNK name='stnk_beda_nama' $UWD_HOLD_list_select>
                                    <option value=''  ";if ($dat['stnk_beda_nama']=='N')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">No
                                    <option value='Y' ";if ($dat['stnk_beda_nama']=='Y')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">YES
                                </select>
                            </div>
                        </div>
                        <div class='guting d-flex flex-row my-2'>
                            <div class='name align-self-center'>
                                <span>Deductible CTL/TLO</span>
                            </div>
                            <div class='isi d-flex flex-row gap-2 align-items-center'>
                                <select class='form-select w-50 reform' name='or_ctl_tlo' $UWD_HOLD_list_select>
                                    <option value='0'  ";if ($dat['or_ctl_tlo']=='0')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">Tidak Berlaku
                                    <option value='5'  disabled";if ($dat['or_ctl_tlo']=='5')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">5% Of Claim
                                </select>
                            </div>
                        </div>
                        <div class='gutang d-flex flex-column my-2 gap-2'>
                            <span>Remark</span>";
                            if ($dat['remark'] != '')
                            {
                                echo "<textarea class='form-control upper' maxlength=2000 name=remark style='height: 150px;'>$dat[remark]</textarea>";
                            }

                            if ( ( $dat['register_id'] != '' ) and ($dat['survey_no'] != '') ){
                                echo"
                                <input type=hidden name=survey_report value='$dat[survey_report]' autocomplete=off>
                                <input type=hidden id='survey_no' value='$dat[survey_no]'>
                                <input type=hidden id='jam_survey' name=jam_survey    value='$dat[jam_survey]'    autocomplete=off>
                                ";
                                if ( $dat['survey_report'] != '' )
                                {
                                    $survey_no = "<span>$dat[survey_no]</span>";
                                    $jam_survey ="<span>$dat[jam_survey]</span>";
                                    $download_survey = "<a type='button' class='btn btn-success' id=clkPdf href='$dat[survey_report]' target='_blank' data-mdb-ripple-init><i class='fa-solid fa-download'></i> Download</a>";
                                    $view_survey = "<button type='submit' class='btn btn-info' name=view_pic_survey value='$dat[survey_no]'  form=to_view_survey_pic  data-mdb-ripple-init><i class='fa-solid fa-eye'></i> View</button>";

                                }else{
                                    $survey_no = "";
                                    $jam_survey = "";
                                    $download_survey = " Survey report";
                                    $view_survey = "Not Available";
                                }
                                $survey_report = "
                                <th>Survey Report</th>
                                <td><span id='rks_report_survey'>$download_survey $view_survey</span></td>
                                ";
                            }
                            else{
                                $survey_no = "<span class='text-secondary'>xx-xxxxx-xx-xxxx-xxxx</span>";
                                $jam_survey = "<span class='text-secondary'>dd-mm-yyyy hh:mm:ss</span>";
                                $survey_report = "";
                            }
                            echo"
                            <div class='table-container' style='overflow-x:auto;'>
                                <table class='table table-bordered '>
                                    <tbody>
                                        <tr>
                                        <th>Survey No</th>
                                        <td id='rks_no_survey'>$survey_no</td>
                                        </tr>
                                        <tr>
                                        <th>Survey Date</th>
                                        <td id='rks_jam_survey'>$jam_survey</td>
                                        </tr>
                                        <tr id='remarks_table'>
                                        $survey_report
                                        </tr>
                                    </tbody>
                                </table>
                            </div>";
                            if($dat['hasil_surv'] != [])
                            {
                                $tampilan_table = 'd-inline';
                            }else{
                                $tampilan_table = 'd-none';
                            }
                            echo "
                            <div id='hasil_survey_bawah' class='table-container $tampilan_table' style='overflow-x:auto;'>
                                <table class='table table-bordered '>
                                    <thead>
                                        <tr>
                                        <th style='text-align: center ;vertical-align: middle;'>No</th>
                                        <th style='text-align: center ;vertical-align: middle;'>Panel Unit</th>
                                        <th style='text-align: center ;vertical-align: middle;'>Condition</th>
                                        <th style='text-align: center ;vertical-align: middle;'>Std</th>
                                        <th style='text-align: center ;vertical-align: middle;'>Roles</th>";
                                         // 04-08-2023 Bu Chika Request untuk semua engine SA
                                        if ( $dat['wfh_id'] == '0036' || $dat['wfh_id'] == '0055' || $dat['wfh_id'] == '0059' || $dat['wfh_id'] == '0061' ) // ROL_SA  01-00074-11-2020-0001 line 175 - 340
                                        { echo "<th>Roles SA  </th>"; }
                                        echo "
                                        </tr>
                                    </thead>
                                    <tbody id='data_survey_bawah'>";
                                    $no = 0;
                                    foreach($dat['hasil_surv'] as $s)
                                    {
                                        $nooo = $s['unit_hasil_survey'];
                                        $no++;
                                        echo "
                                              <tr>
                                                  <td align='center'> $no                 </td>
                                                  <td align='left'  > $s[panel_name]      </td>
                                                  <td align='left'  > $s[panel_kondisi]   </td>
                                                  <td align='center'> $s[Std_panel]       </td>
                                                  <td>
                                                      <select name='panel_roles[$nooo]' class='form-select' style='min-width:120px' disabled >
                                                              <option value=''          ";if ($s['panel_roles']=='')          { echo " selected ";} echo ">Choose
                                                              <option value='Ignore'    ";if ($s['panel_roles']=='Ignore')    { echo " selected ";} echo ">Ignore
                                                              <option value='Exclude'   ";if ($s['panel_roles']=='Exclude')   { echo " selected ";} echo ">Exclude
                                                              <option value='Double OR' ";if ($s['panel_roles']=='Double OR') { echo " selected ";} echo ">Double OR
                                                      </select>
                                                  </td>
                                                  ";
                                                      // 09-06-2023 ditambahin ke web engine SA lain request UW bu chika, untuk menyesuaikan SA
                                                     // if($d_t[wfh_id] == '0055' || $d_t[wfh_id] == '0059' || $d_t[wfh_id] =='0061' || $d_t[wfh_id] =='0036')

                                                     // 04-08-2023 Bu Chika Request untuk semua engine SA
                                                   if ( $dat['wfh_id'] == '0036' || $dat['wfh_id'] == '0055' || $dat['wfh_id'] == '0059' || $dat['wfh_id'] == '0061' )
                                                   {
                                                     echo"
                                                     <td>
                                                         <select name='panel_roles_SA[$nooo]' class='form-select' style='min-width:120px'>
                                                                 <option value=''          ";if ($s['panel_roles_sa']=='')          { echo " selected ";} echo ">Choose
                                                                 <option value='Ignore'    ";if ($s['panel_roles_sa']=='Ignore')    { echo " selected ";} echo ">Ignore
                                                                 <option value='Exclude'   ";if ($s['panel_roles_sa']=='Exclude')   { echo " selected ";} echo ">Exclude
                                                                 <option value='Double OR' ";if ($s['panel_roles_sa']=='Double OR') { echo " selected ";} echo ">Double OR
                                                         </select>
                                                     </td>
                                                     ";
                                                   }

                                              echo"
                                              </tr>
                                        ";
                                    }
                                    echo"
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/policy_unit.js' ></script>
        <form method='post' id=to_view_survey_pic action='https://www.araksa.com/mks/entry/idx_agen_direct_foto_survey.php' target='_blank' >
        </form>
        ";
    }

    private function show_number($tgl_buat_asli,$UWD_HOLD_list_select,$UWD_HOLD_list,$foto_unit)
    {
            $data_foto = $foto_unit['data'] ?? [];
            // print_r($data_foto);
            $gama= '';
                for ($i = 1; $i <= 10; $i++) {
                    if ( $data_foto[$i-1]['Harga_mobil'] ?? null == null )
                    { $Harga_mobil = null;}
                    else
                    { $Harga_mobil = $data_foto[$i-1]['Harga_mobil'];}
                    $url_foto = $data_foto[$i-1]['url_foto'] ?? '';
                    $ganu = "
                    <tr id='penghalang$i'>
                    <td style='text-align: center ;vertical-align: middle; width:10%'>
                        $i
                    </td>
                    <td style='text-align: center ;vertical-align: middle; width:20%' id='nopimg-link$i'>";
                    if ( $data_foto[$i-1]['Nama_foto'] ?? '' != '' ){
                        $foto_array = explode('.', $data_foto[$i-1]['Nama_foto'] );
                        $ext_file_foto = strtolower(end($foto_array));
                        if ( $ext_file_foto == 'pdf')                                 { $gbr_icon = 'fa-file-pdf-o';   }
                        elseif ( $ext_file_foto == 'jpeg' or $ext_file_foto == 'jpg') { $gbr_icon = 'fa-file-image-o'; }
                        else { $gbr_icon = 'fa-file'; }
                        $foto_nama = $data_foto[$i-1]['Nama_foto'];
                        $ganu .= "<a href='https://www.rks-w.com/mks/entry/bike/api/files/images/foto_rus/$foto_nama' target='_blank'>
                                  <font style='color:green'>
                                     <i class='fa $gbr_icon fa-2x fa-fw'></i>
                                  </font>
                               </a>";

                            //    $besarfile = round((filesize("https://www.araksa.com/mks/entry/image/Auto/foto_rus/$foto_nama")/1024), 0, PHP_ROUND_HALF_UP) ;
                            //    $besarfile = number_format($besarfile);
                        $besarfile = 12;
                    }else
                    {  $besarfile = 0;  }

                    if ( $data_foto[$i-1]['type_foto'] ?? '' == 'URL' )
                    {

                      $ganu .="<a href='$url_foto' target='_blank'>
                              <font style='color:blue'>
                                 <i class='fa fa-link fa-lg fa-fw'></i>
                              </font>
                           </a>";
                    }
                    else
                    {
                      $ganu .="
                      <br>$besarfile kB";
                    }

                    $ganu .="
                    </td>
                    <td style='text-align: center ;vertical-align: middle; width:60%'>
                      <div class='d-flex flex-column' id='isitype$i'>
                        <div class='d-flex flex-row gap-1 align-items-center'>
                          <span class='flex-shrink-0 hilangkanlah'>TYPE FOTO</span>";
                          $tgl_buat_any = strtotime($tgl_buat_asli);
                          $tgl_berlaku  = strtotime('2022-10-06 00:00:00');

                          $ganu .="
                          <select class='form-select reform' aria-label='Default select example' id='type_foto_xx$i' name='type_foto_$i' $UWD_HOLD_list_select>";
                          if ( $tgl_buat_any > $tgl_berlaku )
                          {
                              $ganu .="
                                   <option value=''        "; if ($data_foto[$i-1]['type_foto'] ?? '' == '')        { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">Choose
                                   <option value='PERHIT'  "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'PERHIT')  { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">PERTHITUNGAN PREMI
                                   <option value='H_PASAR' "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'H_PASAR') { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">MARKETPLACE'S PRICE
                                   <option value='URL'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'URL')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">URL WEB HARGA PASAR
                                   <option value='BAST'    "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'BAST')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">DOCUMENT BAST
                                   <option value='KTP'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'KTP')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">KTP
                                   <option value='SIM'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'SIM')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">SIM
                                   <option value='STNK'    "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'STNK')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">STNK
                                   <option value='OTH'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'OTH')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">OTHER
                              ";
                          }else{
                                $ganu .="
                                <option value=''        "; if ($data_foto[$i-1]['type_foto'] ?? '' == '')        { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">Choose
                                <option value='PERHIT'  "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'PERHIT')  { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">PERTHITUNGAN PREMI
                                <option value='SPPA'    "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'SPPA')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">SPPA
                                <option value='H_PASAR' "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'H_PASAR') { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">MARKETPLACE'S PRICE
                                <option value='URL'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'URL')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">URL WEB HARGA PASAR
                                <option value='LR'      "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'LR')      { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">LOSS RATIO
                                <option value='KTP'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'KTP')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">KTP
                                <option value='SIM'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'SIM')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">SIM
                                <option value='STNK'    "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'STNK')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">STNK
                                <option value='OTH'     "; if ($data_foto[$i-1]['type_foto'] ?? '' == 'OTH')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">OTHER
                                ";
                          }

                          $nama_file_foto = $data_foto[$i-1]['Nama_foto'] ?? '';
                          $ganu .="
                          </select>
                        </div>
                            <input type='file' class='form-control mt-2' id=url_show_foto_$i  name='file_wfh_$i' style='min-width: 100px;'  accept='image/jpg, image/jpeg' />
                            <input type=hidden   name='nama_file_$i' value='$nama_file_foto'>
                        <div class='d-flex flex-row gap-2 align-items-center mt-2'>
                          <span class='kumaha$i flex-shrink-0' id=url_foto_$i >URL</span>
                          <input type='text' class='kumaha$i form-control' style='min-width: 100px;' maxlength='200'  name='url_foto_$i' value='$url_foto'>
                        </div>
                        <div class='d-flex flex-row gap-2 align-items-center mt-2'>
                          <span class='kumaga$i flex-shrink-0'>price</span>
                          <input type='text' class='kumaga$i form-control numericinput' style='min-width: 100px;' name='Harga_mobil_$i' value='$Harga_mobil'>
                        </div>
                      </div>
                    </td>
                    <td style='text-align: center ;vertical-align: middle;width:10%'>
                      <input type='checkbox' name='del_foto_$i' value='1'>
                    </td>
                  </tr>
                  ";
                  $gama = $gama.$ganu;
                }
                $guma = "
                <table class='table table-bordered' id='sekaiwama'>
                    <thead>
                        <tr class='table-dark'>
                        <th style='text-align: center ;vertical-align: middle;'>No</th>
                        <th style='text-align: center ;vertical-align: middle;'>View</th>
                        <th style='text-align: center ;vertical-align: middle;'>Upload</th>
                        <th style='text-align: center ;vertical-align: middle;'>Del</th>
                        </tr>
                    </thead>
                    <tbody id='add_val'>
                    $gama
                    </tbody>
                    </table>";

                return $guma;
    }

    private function show_period($dat, $UWD_HOLD_list_select,$UWD_HOLD_text)
    {
        {
            $DED = number_format(300000) ;



            if ( $dat['admin_cost']       == null ) { $adm_cost = number_format(60000);} else { $adm_cost = number_format($dat['admin_cost']);  }
            if ( $dat['ren_option']       == null ) { $dat['ren_option'] = 'USE_PH';  }
            if ( $dat['total_unit']       == 0    ) { $dat['total_unit'] = '1';       }

            if ( $dat['sum_ins']          == null ) { $sum_ins          = null;} else { $sum_ins          = number_format($dat['sum_ins']);          }
            if ( $dat['tax']              == null ) { $tax              = null;} else { $tax              = number_format($dat['tax'],5);            }
            if ( $dat['ph21']             == null ) { $ph21             = null;} else { $ph21             = number_format($dat['ph21'],5);           }


            $per_tgg_[1] = $dat['per_tgg_01'];
            // $tpl_[1] = $dat['tpl_01'];
            if ( $dat['rate_01']      == null ) { $rate_[1]  	  = null;} else { $rate_[1]     = number_format($dat['rate_01'],5) ;		  }
            if ( $dat['loading_01']   == null ) { $loading_[1]  = null;} else { $loading_[1]  = number_format($dat['loading_01'],5) ;		}
            if ( $dat['rscc_01']      == null ) { $rscc_[1]  	  = null;} else { $rscc_[1]     = number_format($dat['rscc_01'],5) ;		  }
            if ( $dat['teroris_01']   == null ) { $tero_[1]  	  = null;} else { $tero_[1]     = number_format($dat['teroris_01'],5) ;	  }
            if ( $dat['flood_01']     == null ) { $flood_[1] 	  = null;} else { $flood_[1]    = number_format($dat['flood_01'],5)  ;	  }
            if ( $dat['eq_01']        == null ) { $eq_[1] 	 	  = null;} else { $eq_[1] 	    = number_format($dat['eq_01'],5)  ;		    }
            if ( $dat['bengkel_01']   == null ) { $bkl_[1] 	 	  = null;} else { $bkl_[1] 	    = number_format($dat['bengkel_01'],5)  ;	}
            if ( $dat['si_driver_01'] == null ) { $si_driv_[1]  = null;} else { $si_driv_[1]  = number_format($dat['si_driver_01'])  ;	}
            if ( $dat['derek_01']     == null ) { $derek_[1] 	  = null;} else { $derek_[1] 	  = number_format($dat['derek_01'],5)  ;	  }
            if ( $dat['komersil_01']  == null ) { $komersil_[1] = null;} else { $komersil_[1] = number_format($dat['komersil_01'],5)  ;	}
            if ( $dat['si_pass_01']   == null ) { $si_pass_[1]  = null;} else { $si_pass_[1]  = number_format($dat['si_pass_01'])  ;	  }
            if ( $dat['qty_pass_01']  == null ) { $qty_pass_[1] = null;} else { $qty_pass_[1] = number_format($dat['qty_pass_01'])  ;   }
            if ( $dat['tpl_01']       == null ) { $tpl_[1]      = null;} else { $tpl_[1]      = number_format($dat['tpl_01'])  ;	      }
            if ( $dat['deduc_01']     == null ) { $deduc_[1] 	  = $DED;} else { $deduc_[1]    = number_format($dat['deduc_01'])  ;	    }
            if ( $dat['stnk_01']      == null ) { $stnk_[1]  	  = null;} else { $stnk_[1]     = number_format($dat['stnk_01']) ;		    }

            $per_tgg_[2] = $dat['per_tgg_02'];
            // $tpl_[2] = $dat['tpl_02'];
            if ( $dat['rate_02']      == null ) { $rate_[2]     = null;} else { $rate_[2]     = number_format($dat['rate_02'],5) ;      }
            if ( $dat['loading_02']   == null ) { $loading_[2]  = null;} else { $loading_[2]  = number_format($dat['loading_02'],5) ;		}
            if ( $dat['rscc_02']      == null ) { $rscc_[2]     = null;} else { $rscc_[2]     = number_format($dat['rscc_02'],5) ;      }
            if ( $dat['teroris_02']   == null ) { $tero_[2]     = null;} else { $tero_[2]     = number_format($dat['teroris_02'],5) ;   }
            if ( $dat['flood_02']     == null ) { $flood_[2]    = null;} else { $flood_[2]    = number_format($dat['flood_02'],5)  ;    }
            if ( $dat['eq_02']        == null ) { $eq_[2]       = null;} else { $eq_[2]       = number_format($dat['eq_02'],5)  ;       }
            if ( $dat['bengkel_02']   == null ) { $bkl_[2]      = null;} else { $bkl_[2]      = number_format($dat['bengkel_02'],5)  ;  }
            if ( $dat['si_driver_02'] == null ) { $si_driv_[2]  = null;} else { $si_driv_[2]  = number_format($dat['si_driver_02'])  ;  }
            if ( $dat['derek_02']     == null ) { $derek_[2]    = null;} else { $derek_[2]    = number_format($dat['derek_02'],5)  ;    }
            if ( $dat['komersil_02']  == null ) { $komersil_[2] = null;} else { $komersil_[2] = number_format($dat['komersil_02'],5)  ; }
            if ( $dat['si_pass_02']   == null ) { $si_pass_[2]  = null;} else { $si_pass_[2]  = number_format($dat['si_pass_02'])  ;    }
            if ( $dat['qty_pass_02']  == null ) { $qty_pass_[2] = null;} else { $qty_pass_[2] = number_format($dat['qty_pass_02'])  ;   }
            if ( $dat['tpl_02']       == null ) { $tpl_[2]      = null;} else { $tpl_[2]      = number_format($dat['tpl_02'])  ;        }
            if ( $dat['deduc_02']     == null ) { $deduc_[2]    = $DED;} else { $deduc_[2]    = number_format($dat['deduc_02'])  ;      }
            if ( $dat['stnk_02']      == null ) { $stnk_[2]  	  = null;} else { $stnk_[2]     = number_format($dat['stnk_02']) ;		    }

            $per_tgg_[3] = $dat['per_tgg_03'];
            // $tpl_[3] = $dat['tpl_03'];
            if ( $dat['rate_03']      == null ) { $rate_[3]     = null;} else { $rate_[3]     = number_format($dat['rate_03'],5) ;      }
            if ( $dat['loading_03']   == null ) { $loading_[3]  = null;} else { $loading_[3]  = number_format($dat['loading_03'],5) ;		}
            if ( $dat['rscc_03']      == null ) { $rscc_[3]     = null;} else { $rscc_[3]     = number_format($dat['rscc_03'],5) ;      }
            if ( $dat['teroris_03']   == null ) { $tero_[3]     = null;} else { $tero_[3]     = number_format($dat['teroris_03'],5) ;   }
            if ( $dat['flood_03']     == null ) { $flood_[3]    = null;} else { $flood_[3]    = number_format($dat['flood_03'],5)  ;    }
            if ( $dat['eq_03']        == null ) { $eq_[3]       = null;} else { $eq_[3]       = number_format($dat['eq_03'],5)  ;       }
            if ( $dat['bengkel_03']   == null ) { $bkl_[3]      = null;} else { $bkl_[3]      = number_format($dat['bengkel_03'],5)  ;  }
            if ( $dat['si_driver_03'] == null ) { $si_driv_[3]  = null;} else { $si_driv_[3]  = number_format($dat['si_driver_03'])  ;  }
            if ( $dat['derek_03']     == null ) { $derek_[3]    = null;} else { $derek_[3]    = number_format($dat['derek_03'],5)  ;    }
            if ( $dat['komersil_03']  == null ) { $komersil_[3] = null;} else { $komersil_[3] = number_format($dat['komersil_03'],5)  ; }
            if ( $dat['si_pass_03']   == null ) { $si_pass_[3]  = null;} else { $si_pass_[3]  = number_format($dat['si_pass_03'])  ;    }
            if ( $dat['qty_pass_03']  == null ) { $qty_pass_[3] = null;} else { $qty_pass_[3] = number_format($dat['qty_pass_03'])  ;   }
            if ( $dat['tpl_03']       == null ) { $tpl_[3]      = null;} else { $tpl_[3]      = number_format($dat['tpl_03'])  ;        }
            if ( $dat['deduc_03']     == null ) { $deduc_[3]    = $DED;} else { $deduc_[3]    = number_format($dat['deduc_03'])  ;      }
            if ( $dat['stnk_03']      == null ) { $stnk_[3]  	  = null;} else { $stnk_[3]     = number_format($dat['stnk_03']) ;		    }

            $per_tgg_[4] = $dat['per_tgg_04'];
            // $tpl_[4] = $dat['tpl_04'];
            if ( $dat['rate_04']      == null ) { $rate_[4]     = null;} else { $rate_[4]     = number_format($dat['rate_04'],5) ;      }
            if ( $dat['loading_04']   == null ) { $loading_[4]  = null;} else { $loading_[4]  = number_format($dat['loading_04'],5) ;		}
            if ( $dat['rscc_04']      == null ) { $rscc_[4]     = null;} else { $rscc_[4]     = number_format($dat['rscc_04'],5) ;      }
            if ( $dat['teroris_04']   == null ) { $tero_[4]     = null;} else { $tero_[4]     = number_format($dat['teroris_04'],5) ;   }
            if ( $dat['flood_04']     == null ) { $flood_[4]    = null;} else { $flood_[4]    = number_format($dat['flood_04'],5)  ;    }
            if ( $dat['eq_04']        == null ) { $eq_[4]       = null;} else { $eq_[4]       = number_format($dat['eq_04'],5)  ;       }
            if ( $dat['bengkel_04']   == null ) { $bkl_[4]      = null;} else { $bkl_[4]      = number_format($dat['bengkel_04'],5)  ;  }
            if ( $dat['si_driver_04'] == null ) { $si_driv_[4]  = null;} else { $si_driv_[4]  = number_format($dat['si_driver_04'])  ;  }
            if ( $dat['derek_04']     == null ) { $derek_[4]    = null;} else { $derek_[4]    = number_format($dat['derek_04'],5)  ;    }
            if ( $dat['komersil_04']  == null ) { $komersil_[4] = null;} else { $komersil_[4] = number_format($dat['komersil_04'],5)  ; }
            if ( $dat['si_pass_04']   == null ) { $si_pass_[4]  = null;} else { $si_pass_[4]  = number_format($dat['si_pass_04'])  ;    }
            if ( $dat['qty_pass_04']  == null ) { $qty_pass_[4] = null;} else { $qty_pass_[4] = number_format($dat['qty_pass_04'])  ;   }
            if ( $dat['tpl_04']       == null ) { $tpl_[4]      = null;} else { $tpl_[4]      = number_format($dat['tpl_04'])  ;        }
            if ( $dat['deduc_04']     == null ) { $deduc_[4]    = $DED;} else { $deduc_[4]    = number_format($dat['deduc_04'])  ;      }
            if ( $dat['stnk_04']      == null ) { $stnk_[4]  	  = null;} else { $stnk_[4]     = number_format($dat['stnk_04']) ;		    }


            $per_tgg_[5] = $dat['per_tgg_05'];
            // $tpl_[5] = $dat['tpl_05'];
            if ( $dat['rate_05']      == null ) { $rate_[5]     = null;} else { $rate_[5]     = number_format($dat['rate_05'],5) ;      }
            if ( $dat['loading_05']   == null ) { $loading_[5]  = null;} else { $loading_[5]  = number_format($dat['loading_05'],5) ;		}
            if ( $dat['rscc_05']      == null ) { $rscc_[5]     = null;} else { $rscc_[5]     = number_format($dat['rscc_05'],5) ;      }
            if ( $dat['teroris_05']   == null ) { $tero_[5]     = null;} else { $tero_[5]     = number_format($dat['teroris_05'],5) ;   }
            if ( $dat['flood_05']     == null ) { $flood_[5]    = null;} else { $flood_[5]    = number_format($dat['flood_05'],5)  ;    }
            if ( $dat['eq_05']        == null ) { $eq_[5]       = null;} else { $eq_[5]       = number_format($dat['eq_05'],5)  ;       }
            if ( $dat['bengkel_05']   == null ) { $bkl_[5]      = null;} else { $bkl_[5]      = number_format($dat['bengkel_05'],5)  ;  }
            if ( $dat['si_driver_05'] == null ) { $si_driv_[5]  = null;} else { $si_driv_[5]  = number_format($dat['si_driver_05'])  ;  }
            if ( $dat['derek_05']     == null ) { $derek_[5]    = null;} else { $derek_[5]    = number_format($dat['derek_05'],5)  ;    }
            if ( $dat['komersil_05']  == null ) { $komersil_[5] = null;} else { $komersil_[5] = number_format($dat['komersil_05'],5)  ; }
            if ( $dat['si_pass_05']   == null ) { $si_pass_[5]  = null;} else { $si_pass_[5]  = number_format($dat['si_pass_05'])  ;    }
            if ( $dat['qty_pass_05']  == null ) { $qty_pass_[5] = null;} else { $qty_pass_[5] = number_format($dat['qty_pass_05'])  ;   }
            if ( $dat['tpl_05']       == null ) { $tpl_[5]      = null;} else { $tpl_[5]      = number_format($dat['tpl_05'])  ;        }
            if ( $dat['deduc_05']     == null ) { $deduc_[5]    = $DED;} else { $deduc_[5]    = number_format($dat['deduc_05'])  ;      }
            if ( $dat['stnk_05']      == null ) { $stnk_[5]  	  = null;} else { $stnk_[5]     = number_format($dat['stnk_05']) ;		    }


            if ( $dat['Depre_01'] == null) { $Depre_[1] = 100; } else { $Depre_[1] =  $dat['Depre_01']; }
            if ( $dat['Depre_02'] == null) { $Depre_[2] = 90;  } else { $Depre_[2] =  $dat['Depre_02']; }
            if ( $dat['Depre_03'] == null) { $Depre_[3] = 80;  } else { $Depre_[3] =  $dat['Depre_03']; }
            if ( $dat['Depre_04'] == null) { $Depre_[4] = 70;  } else { $Depre_[4] =  $dat['Depre_04']; }
            if ( $dat['Depre_05'] == null) { $Depre_[5] = 60;  } else { $Depre_[5] =  $dat['Depre_05']; }
            }



        $data = '';
        for ($i = 1; $i <= 5; $i++) {
            $myStrung = "
                                <div class='isi-period d-flex flex-column px-3 gap-1 border-end border-secondary-subtle' style='width:16%;min-width:100px;' id='years_$i'>
                                    <span class='d-flex align-items-center align-self-center' style='height:40px'><b>Year 0$i</b></span>
                                    <select class='form-select w-75 hitung' name='ptg_[$i]' style='height:40px;' $UWD_HOLD_list_select id='ptg_$i'>
                                        <option value=''   ";if ($per_tgg_[$i]=='')    { $myStrung .= " selected ";} $myStrung .= ">
                                        <option value='ARK'";if ($per_tgg_[$i]=='ARK') { $myStrung .= " selected ";} $myStrung .= ">Compre
                                        <option value='TLO'";if ($per_tgg_[$i]=='TLO') { $myStrung .= " selected ";} $myStrung .= ">TLO
                                    </select>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='Rate_$i' value='$rate_[$i]' name=Rate_[$i]>
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='loading_$i' name=loading_[$i] value='$loading_[$i]'>
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='RSCC_$i' name=RSCC_[$i] value='$rscc_[$i]'>
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='teroris_$i' name=teroris_[$i] value='$tero_[$i]'>
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='Flood_$i' name=Flood_[$i] value='$flood_[$i]'>
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='Eq_$i' name=Eq_[$i] value='$eq_[$i]'>
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='bkl_$i' name=bkl_[$i] value='$bkl_[$i]' >
                                        <span>%</span>
                                    </div>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
                                        <input $UWD_HOLD_text type='text' class='numericinput form-control w-75 hitung' style='text-align:end'  id='derek_$i' name=derek_[$i] value='$derek_[$i]' >
                                        <span>%</span>
                                    </div>
                                    <input $UWD_HOLD_text type='text' class='numericinput form-control hitung' style='text-align:end; height:40px'  id='si_driv_$i' name=si_driv[$i] value='$si_driv_[$i]'>
                                    <input $UWD_HOLD_text type='text' class='numericinput form-control hitung' style='text-align:end; height:40px'  id='si_pass_$i' name=si_pass[$i] value='$si_pass_[$i]'>
                                    <select class='form-select w-50 hitung' id='qty_pass_$i' style='height:40px' UWD_HOLD_list_select name='qty_pass_[$i]'>
                                        <option value=''" ;if ($qty_pass_[$i]=='' ) { $myStrung .= " selected ";} $myStrung .= ">
                                        <option value='1'";if ($qty_pass_[$i]=='1') { $myStrung .= " selected ";} $myStrung .= ">1
                                        <option value='2'";if ($qty_pass_[$i]=='2') { $myStrung .= " selected ";} $myStrung .= ">2
                                        <option value='3'";if ($qty_pass_[$i]=='3') { $myStrung .= " selected ";} $myStrung .= ">3
                                        <option value='4'";if ($qty_pass_[$i]=='4') { $myStrung .= " selected ";} $myStrung .= ">4
                                        <option value='5'";if ($qty_pass_[$i]=='5') { $myStrung .= " selected ";} $myStrung .= ">5
                                        <option value='6'";if ($qty_pass_[$i]=='6') { $myStrung .= " selected ";} $myStrung .= ">6
                                    </select>
                                    <input $UWD_HOLD_text type='text' class='numericinput form-control hitung' style='text-align:end; height:40px'  id='tpl_$i' name=tpl_[$i] value='$tpl_[$i]' >
                                    <input $UWD_HOLD_text type='text' class='numericinput form-control' style='text-align:end; height:40px' name=deduc_[$i] value='$deduc_[$i]'>
                                    <input $UWD_HOLD_text type='text' class='numericinput form-control hitung' style='text-align:end; height:40px'  id='stnk_$i' name=stnk_[$i] value='$stnk_[$i]'>
                                    <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>";
                                    if ( $i == 1 )
                                    {
                                    $myStrung .= "<input $UWD_HOLD_text type='text' style='background-color:#dedede;' readonly class='numericinput form-control w-50 hitung' style='text-align:end'  id='Depre_$i' maxlength=3  type=text name=Depre_[$i] value='$Depre_[$i]'>";
                                    }else{
                                    $myStrung .= "<input $UWD_HOLD_text type='text' class='numericinput form-control w-50 hitung' style='text-align:end'  id='Depre_$i' maxlength=3  type=text name=Depre_[$i] value='$Depre_[$i]'>";
                                    }
                                    $myStrung .= "
                                        <span>%</span>
                                    </div>
                                </div>";
            $data = $data.$myStrung;
            }

            $title = "
            <div class='judul-period d-flex flex-column gap-1 px-3 border-end border-secondary-subtle' style='width:20%;min-width:200px;white-space: nowrap;'>
            <span class='d-flex align-items-center align-self-center' style='height:40px'><b>Major</b></span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Coverage</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Hull</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Loading</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate RSCC</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Terrorism</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Flood</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Earthquake</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Authorized Wks</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Towing</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>SI PA Driver</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>SI PA Passenger</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Num of Passenger(s)</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Limit TPL</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Deductible</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>STNK/BPKB</span>
            <span class='d-flex align-items-center align-self-end' style='height:40px'>Depreciation</span>
        </div>";
        $header = "<div class='periodshow d-flex flex-row align-items-center align-self-center my-3' id='years_0' style='overflow-x: auto;width:100px'>$title $data</div>";
        return $header;
    }

    public function other($result_Simul_to_pol_quo){
        $data = $this->data;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $butt_off_view = $this->butt_off_view;
        $UWD_HOLD_button      = $this->UWD_HOLD_button;
        $dat = $data['data'][0];
        $button_off_Q = '';
        $button_off_Copy = '';
        echo "
        $dat[register_id]
        <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                <div class='card-body'>
                    <h4 class='card-title mb-3'>Other</h4>
                    <div class='main d-flex flex-column w-100'>
                        <div class='gutang d-flex flex-column my-2 gap-2'>
                            <span>Note For Approval</span>
                            <div class='form-floating w-100'>
                                <textarea class='form-control upper' name=info_for_uwd_app style='height: 100px;'>$dat[info_for_uwd_app]</textarea>
                            </div>
                        </div>";
                        if ( $dat['source_api'] == 'Raksa_patner' ){
                            echo "
                            <div class='gutang d-flex flex-column my-2 gap-2'>
                                <span>Note For Raksa Patner</span>
                                <div class='form-floating w-100'>
                                    <textarea class='form-control upper'  name=info_for_uwd_app style='height: 100px;'>$dat[note_raksa_partner]</textarea>
                                </div>
                            </div>";
                        }

                        // start button
                        if ( substr( $dat['register_id'],0,1) == 'Q' )   { $the_register_id = "Q" ; }
                        if ( substr( $dat['register_id'],0,1) == 'P' )   { $the_register_id = "P" ; }
                        if ( substr( $dat['register_id'],0,1) == 'S' )   { $the_register_id = "S" ; }

                        if ( $dat['register_id'] != '' )
                        {
                            if ( $the_register_id == 'Q' )
                            { $button_off_P = " disabled " ; }

                            if ( $the_register_id == 'P' )
                            { $button_off_Q = " disabled " ; $button_off_Copy = " disabled " ; }
                        }
                        else
                        { $button_off_Copy = " disabled " ; }


                        if ( $dat['uwd_status'] == 'APPL' )
                        {
                        $button_off_Copy = " disabled " ;
                        }

                        // 4 APRIL 2023 => TUTUP DULU AD BUG PADA SAAT APPROVE DI Q, TIDAK BISA DILAKUKAN Q_TO_P
                        //Trap untuk status uwd APPROVE or INPROGRESS or REJECT nya
                        // if ( $dat['uwd_status'] == 'APPROVE'  or  $dat['uwd_status'] == 'INPROGRESS'  )
                        // {
                        //     if ( $the_register_id == "Q"  )
                        //     { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled " ;}

                        //     if ( $the_register_id == "P" )
                        //     { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled " ;}
                        // }
                        // 4 APRIL 2023 => PERBAIKAN BUG (BUG PADA SAAT APPROVE DI Q, TIDAK BISA DILAKUKAN Q_TO_P)
                        if ( $dat['uwd_status'] == 'APPROVE')
                        {
                            if ( $the_register_id == "Q"  )
                            { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ;}

                            if ( $the_register_id == "P" )
                            { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ;}
                        }
                        if($dat['uwd_status'] == 'INPROGRESS') {
                            if ( $the_register_id == "Q"  )
                            { $button_off_Q = " disabled ";  $button_off_P = " disabled "; $button_off_Copy = " disabled ";}

                            if ( $the_register_id == "P" )
                            { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled ";}
                        }


                        //Trap untuk REJECT nya
                        if ( $dat['uwd_status'] == 'REJECT' )
                        {
                            if ( $the_register_id == "Q"  )
                            {  $button_off_Copy = " disabled " ; $button_off_P = " disabled " ;  }

                            if ( $the_register_id == "P" )
                            { $button_off_Copy = " disabled " ; $button_off_Q = " disabled " ; }
                        }


                        $list_cabang_uwd_hold = array(
                            "02-MKG06",
                            "03-BDG01",
                            "03-BDG02",
                            "03-CIREBON",
                            "03-JAMBI",
                            "04-MKG03",
                            "05-BATAM",
                            "05-MKG02",
                            "06-MANADO",
                            "06-MKG04",
                            "15-MKG03",
                            "16-KENDARI",
                            "16-MKG01",
                            "17-MKG01",
                            "18-MKG01",
                            "19-MKG01",
                            "07-MKG02",
                            "07-PADANG",
                            "08-SBY1",
                            "08-SBY2",
                            "09-MKG05",
                            "10-MKG04",
                            "11-MKG05",
                            "12-MKG04",
                            "13-MKG03",
                            "14-MKG01",
                            "MKGROUP1",
                            "MKGROUP10",
                            "MKGROUP11",
                            "MKGROUP12",
                            "MKGROUP14",
                            "MKGROUP2",
                            "MKGROUP3A",
                            "MKGROUP4",
                            "MKGROUP5",
                            "MKGROUP6",
                            "MKGROUP7",
                            "MKGROUP8",
                            "MKGROUP9",
                            "ROL",
                            "DEMO"
                        );

                        if (in_array($mkg_group, $list_cabang_uwd_hold)){

                            if($butt_off_view != 'ON'){

                                // PILIHAN SIMULATION
                                if ( substr ( $dat['register_id'], 0,1) == 'S'){

                                    if ( $dat['uwd_status'] == 'APPL' )
                                    {
                                    echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                        <button type='submit' class='btn btn-secondary' name=update_data_Simul  value='update_simulation' data-mdb-ripple-init><i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                        </div>
                                    ";
                                    }
                                    if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo == '' )
                                    {
                                    echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            Generate Simulation to
                                            <select class='form-select w-25' name='pilih_Simul_KE_P_Q'>
                                                    <option value='Q' >Save To Quotation
                                            </select>
                                            <button type=submit class='btn btn-secondary' name='copy_simul_pol_quo'  value='copy_simul_pol_quo' data-mdb-ripple-init>GO</button>
                                            </div>
                                    ";
                                    }
                                    if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo != '' )
                                    {
                                    echo "
                                        <td colspan='2' align='center'>
                                            Generate Simulation to
                                            <select class='form-select w-25' name='pilih_Simul_KE_P_Q' >
                                                    <option value='Q' disabled";if ( $result_Simul_to_pol_quo == 'Q') { echo " selected ";} echo ">Save To Quotation
                                            </select>
                                            <br>
                                            No AnyWhere <input style='background-color:#dedede;' type=text name=new_reg_from_simul    value='xxx' size=16 readonly>
                                            <button type=submit class='btn btn-secondary' name=open_hasil_copy_simul value='open_hasil_copy_simul' data-mdb-ripple-init>Open</button>
                                        </td>
                                    ";
                                    }
                                }

                                // PILIHAN QUOTATION
                                elseif ( substr ( $dat['register_id'], 0,1) == 'Q'){
                                    echo"
                                    <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                        <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=insert_data_quo        value='save_quotation' $button_off_Q    accesskey='Q' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                        <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=copy_data_quo_to_polis value='Copy_to_polis'  $button_off_Copy accesskey='T' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Quotation <u><b>T</b></u>o Policy</button>
                                    ";
                                    // nanti di pake kali jadi di remarks dulu
                                    // if($dat[source_api] == 'Raksa_patner')
                                    // {

                                    //    $sql_exp = "SELECT EXPIRED_DATE
                                    //                  FROM data_auto_per_end
                                    //                  WHERE
                                    //                        POLICY_NO = '$dat[ex_polis_no]'
                                    //                      AND
                                    //                        UW_CLASS = 'AUTO'
                                    //                      order by ENTRY_DATE DESC
                                    //                  ";
                                    //  $query_exp            = mysqli_fetch_assoc(mysqli_query($login_db_harian,$sql_exp));
                                    //  $tgl_list             = date('d-m-Y',strtotime($query_exp[EXPIRED_DATE]));
                                    //  $ex_polis_baru        = $dat[ex_polis_no];

                                    //   echo " <button type=submit  class='mks_button'   name=list_renew_part  value='list_renew_part' form='renew_partner' > List Renewal Partner 2</button>";

                                    // }
                                    echo"
                                    </div>
                                    ";
                                }

                                // PILIHAN POLIS  --> DONE CEK
                                elseif ( substr ( $dat['register_id'], 0,1) == 'P')
                                {

                                    echo "
                                            <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                                <button type=submit class='btn btn-secondary' name=insert_data_pol        value='save_polis'     $button_off_P    accesskey='P' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>P</b></u>olicy</button>
                                            </div>
                                            ";
                                    }else{

                                        echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button type=submit class='btn btn-secondary' name=insert_data_simul  value='update_simulation' >                          <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                            <button type=submit class='btn btn-secondary' name=insert_data_quo    value='save_quotation' $button_off_Q  accesskey='Q'> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                        </div>
                                        ";
                                    }
                            }
                        }else{
                            if ( $butt_off_view != 'ON' ){
                                // // netralkan utk Renter 1 unit ini gua skip dulu
                                // if ( $_POST["Re_Entry"] and $tot_unit_reentry == '1' )
                                // { $dat['register_id'] = '';  $button_off_P = ''; $button_off_P = ''; }

                                // PILIHAN SIMULATION
                                if ( substr ( $dat['register_id'], 0,1) == 'S'){

                                    // VIRGIN STATUS
                                    if ( $dat['uwd_status'] == 'APPL' )
                                    {
                                    echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            <button type=submit class='btn btn-secondary' name=update_data_Simul  value='update_simulation' data-mdb-ripple-init>  <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                        </div>
                                    ";
                                    }
                                    // STATUS POSTING ( UWD APPROVAL )
                                    else if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo == '' )
                                    {
                                    echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            Generate Simulation to
                                            <select class='form-select w-25' name='pilih_Simul_KE_P_Q' >
                                                    <option value='Q' >Save To Quotation
                                            </select>
                                            <button type=submit class='btn btn-secondary' name='copy_simul_pol_quo'  value='copy_simul_pol_quo' data-mdb-ripple-init>GO</button>
                                        </div>
                                    ";
                                    }
                                    // STATUS POSTING ( UWD APPROVAL + SUDAH PILIH COPY DATA KEMANA DAN ADA OPEN KE ABYWHERE NYA )
                                    else if ( $dat['uwd_status'] == 'APPROVE' and $result_Simul_to_pol_quo != '' )
                                    {
                                    echo "
                                        <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                            Generate Simulation to
                                            <select class='form-select w-25' name='pilih_Simul_KE_P_Q' >
                                                    <option value='Q' disabled";if ( $result_Simul_to_pol_quo == 'Q') { echo " selected ";} echo ">Save To Quotation
                                            </select>
                                            <br>
                                            No AnyWhere <input style='background-color:#dedede;' type=text name=new_reg_from_simul class='form-control' value='xxx' size=16 readonly>
                                            <button type=submit class='btn btn-secondary' name=open_hasil_copy_simul value='open_hasil_copy_simul' data-mdb-ripple-init>Open</button>
                                        </div>
                                    ";
                                    }

                                }

                                // PILIHAN QUOTATION
                                elseif ( substr ( $dat['register_id'], 0,1) == 'Q')
                                {
                                    echo "
                                    <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                        <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=insert_data_quo        value='save_quotation' $button_off_Q    accesskey='Q' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                        &nbsp;&nbsp;&nbsp;
                                        <button $UWD_HOLD_button type=submit class='btn btn-secondary' name=copy_data_quo_to_polis value='Copy_to_polis'  $button_off_Copy accesskey='T' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Quotation <u><b>T</b></u>o Policy</button>

                                    </div>
                                    ";
                                }
                                // PILIHAN POLIS
                                elseif ( substr ( $dat['register_id'], 0,1) == 'P')
                                {
                                    echo "
                                    <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                        <button type=submit class='btn btn-secondary' name=insert_data_pol        value='save_polis'     $button_off_P    accesskey='P' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>P</b></u>olicy</button>
                                    </div>
                                    ";
                                }else{
                                    echo "
                                    <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                        <button type=submit class='btn btn-secondary' name=insert_data_simul  value='update_simulation' data-mdb-ripple-init>  <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                        &nbsp;&nbsp;
                                        <button type=submit class='btn btn-secondary' name=insert_data_quo    value='save_quotation' $button_off_Q    accesskey='Q' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>Q</b></u>uotation</button>
                                        &nbsp;&nbsp;
                                        <button type=submit class='btn btn-secondary' name=insert_data_pol    value='save_polis'     $button_off_P    accesskey='P' data-mdb-ripple-init> <i class='fa-regular fa-floppy-disk'></i> Save <u><b>P</b></u>olicy</button>
                                    </div>
                                    ";
                                }
                            }
                        }
                        echo"
                    </div>
                </div>
            </div>
        </div>
        <input type='hidden'  name='web_menu' value='BS5_Menu_Any_Anyware_aerox'>
        <input type=hidden name=menu_bikes              value='NEW'    >
        <input type=hidden name=menu_key              value='dewarajajudidewarajajudi'    >
        <input type=hidden name=menu_type              value='ACTION'      >
        <input type=hidden name=user_id   id=user_id  value='$user_id'    >
        <input type=hidden name=mk_group              value='$mkg_group'  >
        ";

    }

}
