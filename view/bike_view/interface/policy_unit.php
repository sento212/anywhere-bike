<?php
namespace Policy_Unit;
function tampilan($tampilan, $user_id, $mkg_group,$data,$UWD_HOLD_list,$UWD_HOLD_date,$UWD_HOLD_list_select,$UWD_HOLD_text,$UWD_HOLD_button,$count_unit,$butt_off_view,$UWD_HOLD_text_sum_ins,$full_dept,$make,$cate,$model,$foto_unit,$UWD_HOLD_text_area){
    $dat = $data[data][0];
    $unit_number = $dat[unit_no];
    $unit_count  = $count_unit[data];
    $text_add_U = "";
    $sum_ins_copy = '';

    if ( $unit_number     == null )   
    { 
        if($dat[jumlah_unit] != null){
            $next_unit  = str_pad( $dat[jumlah_unit] + 1 ,3, "0",STR_PAD_LEFT );
            $unit_number      = $next_unit; 
        }else{
            $unit_number      = '001'; 
        }
    }

    if ( $dat[membership] == NULL )   { $dat[membership]  = 'ORDINARY'; }

    if ( $mkg_group == 'DEMO'){ $off_uplaod_file = "";} else { $off_uplaod_file = "disabled";}

    if ( $butt_off_view == 'ON' ) { $off_add = "disabled" ; } else { $off_add = "" ;}

    if ( $dat[sum_ins]          == null ) { $sum_ins          = null;} else { $sum_ins          = number_format($dat[sum_ins]);          }

    $unit_count_oo = str_pad( $unit_count ,3, "0",STR_PAD_LEFT );

    if (  $dat[unit_no] == null  )
    { $text_add_U = "<span class='text-warning'>[ SAVE BEFORE ADD UNIT ]</span>"; }
    
    if ( $dat[uwd_status] == '' or  $dat[uwd_status] == 'APPROVE' or $dat[uwd_status] == 'INPROGRESS' )
    { $reqeust_suvey = "disabled"; } else { $reqeust_suvey = ""; }

    $no_survey_cek  = $dat[survey_no];

    if ( $dat["wfh_id"] == "0010" or $dat["wfh_id"] == "0011" or $dat["wfh_id"] == "0012" or $dat["wfh_id"] == "0017" or $dat["wfh_id"] == "0036" )  { $dat_wfh_id=""; }
    if ( $dat["wfh_id"] == "9999" or $dat["wfh_id"] == "8888" )  { 	$dat_wfh_id="MOTOR"; }

    if ( $dat[total_premi]      == null ) { $total_premi      = null;} else { $total_premi      = number_format($dat[total_premi]);      }
    if ( $dat[total_auto_premi] == null ) { $total_auto_premi = null;} else { $total_auto_premi = number_format($dat[total_auto_premi]); }
    if ( $dat[disc_debit]       == null ) { $disc_debit       = null;} else { $disc_debit       = number_format($dat[disc_debit],5);     }
    if ( $dat[disc_credit]      == null ) { $disc_credit      = null;} else { $disc_credit      = number_format($dat[disc_credit],5);    }
    if ( $dat[value_tax23]      == null ) { $insert_tax23            = null;} else { $insert_tax23             = number_format($dat[value_tax23],5);    }
    if ( $dat[value_ph21]       == null ) { $insert_pph21            = null;} else { $insert_pph21             = number_format($dat[value_ph21],5);     }
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
            <h4 class='card-title mb-3'>Policy Unit $unit_number Of " . str_pad( $dat[total_unit],3,'0',STR_PAD_LEFT ); echo "</h4>
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
                    if ( $dat[unit_no] <> '001' and $dat[unit_no] <> null )
                    {
                        if ( $dat[unit_no] == $unit_count_oo )
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
                    elseif ( $dat[unit_no] == '001')
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
                    if ( $dat[register_id] == '')
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
                                    if ( $dat[jml_foto]=='' or $dat[jml_foto]=='0' )   { echo " selected ";} echo ">Choose";
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
                $table = show_number($dat[tgl_buat_asli],$UWD_HOLD_list_select,$UWD_HOLD_list,$foto_unit);
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
                            <option value='IDR'"; if ($dat[curr]=='IDR')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">IDR
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
                        $dataModel=$model['Data'];
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
                            <option value='NEW'"; if ($dat[ status_mobil ]=='NEW')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">NEW
                            <option value='USED'";if ($dat[ status_mobil ]=='USED') { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">USED
                        </select>
                        <select class='form-select w-50 reform' name='use_new' $UWD_HOLD_list_select id=status_penggunaan>
                            <option value='PRIBADI'"; if ($dat[status_penggunaan ]=='PRIBADI')  { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">PRIBADI
                            <option value='KOMERSIL'";if ($dat[status_penggunaan ]=='KOMERSIL') { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">KOMERSIL
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

                $periode = show_period($dat, $UWD_HOLD_list_select,$UWD_HOLD_text);
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

                    if ( ( $dat[register_id] != '' ) and ($dat[survey_no] != '') ){
                        echo"
                        <input type=hidden name=survey_report value='$dat[survey_report]' autocomplete=off>
                        <input type=hidden id='survey_no' value='$dat[survey_no]'>
                        <input type=hidden id='jam_survey' name=jam_survey    value='$dat[jam_survey]'    autocomplete=off>
                        ";
                        if ( $dat[survey_report] != '' )
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
                    if($dat[hasil_surv] != [])
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
                                if ( $dat[wfh_id] == '0036' || $dat[wfh_id] == '0055' || $dat[wfh_id] == '0059' || $dat[wfh_id] == '0061' ) // ROL_SA  01-00074-11-2020-0001 line 175 - 340
                                { echo "<th>Roles SA  </th>"; }
                                echo "
                                </tr>
                            </thead>
                            <tbody id='data_survey_bawah'>";
                            foreach($dat[hasil_surv] as $s)
                            {
                                $nooo = $s[unit_hasil_survey];
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
                                           if ( $dat[wfh_id] == '0036' || $dat[wfh_id] == '0055' || $dat[wfh_id] == '0059' || $dat[wfh_id] == '0061' )
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
<script src='https://www.rks-w.com/mks/entry/bike/views/javascript/policy_unit.js' ></script>
<form method='post' id=to_view_survey_pic action='https://www.araksa.com/mks/entry/idx_agen_direct_foto_survey.php' target='_blank' >
</form>
";
}

function show_number($tgl_buat_asli,$UWD_HOLD_list_select,$UWD_HOLD_list,$foto_unit){
$data_foto = $foto_unit[data];
// print_r($data_foto);
    $gama= '';
        for ($i = 1; $i <= 10; $i++) {
            if ( $data_foto[$i-1][Harga_mobil] == null )
            { $Harga_mobil = null;}
            else
            { $Harga_mobil = $data_foto[$i-1][Harga_mobil];}
            $url_foto = $data_foto[$i-1][url_foto];
            $ganu = "
          <tr id='penghalang$i'>
            <td style='text-align: center ;vertical-align: middle; width:10%'>
                $i
            </td>
            <td style='text-align: center ;vertical-align: middle; width:20%' id='nopimg-link$i'>";
            if ( $data_foto[$i-1][Nama_foto] != '' ){
                $foto_array = explode('.', $data_foto[$i][Nama_foto] );
                $ext_file_foto = strtolower(end($foto_array));
                if ( $ext_file_foto == 'pdf')                                 { $gbr_icon = 'fa-file-pdf-o';   }
                elseif ( $ext_file_foto == 'jpeg' or $ext_file_foto == 'jpg') { $gbr_icon = 'fa-file-image-o'; }
                else { $gbr_icon = 'fa-file'; }
                $foto_nama = $data_foto[$i-1][Nama_foto];
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

            if ( $data_foto[$i-1][type_foto] == 'URL' )
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
                           <option value=''        "; if ($data_foto[$i-1][type_foto] == '')        { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">Choose
                           <option value='PERHIT'  "; if ($data_foto[$i-1][type_foto] == 'PERHIT')  { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">PERTHITUNGAN PREMI
                           <option value='H_PASAR' "; if ($data_foto[$i-1][type_foto] == 'H_PASAR') { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">MARKETPLACE'S PRICE
                           <option value='URL'     "; if ($data_foto[$i-1][type_foto] == 'URL')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">URL WEB HARGA PASAR
                           <option value='BAST'    "; if ($data_foto[$i-1][type_foto] == 'BAST')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">DOCUMENT BAST
                           <option value='KTP'     "; if ($data_foto[$i-1][type_foto] == 'KTP')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">KTP
                           <option value='SIM'     "; if ($data_foto[$i-1][type_foto] == 'SIM')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">SIM
                           <option value='STNK'    "; if ($data_foto[$i-1][type_foto] == 'STNK')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">STNK
                           <option value='OTH'     "; if ($data_foto[$i-1][type_foto] == 'OTH')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">OTHER
                      ";
                  }else{
                        $ganu .="
                        <option value=''        "; if ($data_foto[$i-1][type_foto] == '')        { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">Choose
                        <option value='PERHIT'  "; if ($data_foto[$i-1][type_foto] == 'PERHIT')  { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">PERTHITUNGAN PREMI
                        <option value='SPPA'    "; if ($data_foto[$i-1][type_foto] == 'SPPA')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">SPPA
                        <option value='H_PASAR' "; if ($data_foto[$i-1][type_foto] == 'H_PASAR') { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">MARKETPLACE'S PRICE
                        <option value='URL'     "; if ($data_foto[$i-1][type_foto] == 'URL')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">URL WEB HARGA PASAR
                        <option value='LR'      "; if ($data_foto[$i-1][type_foto] == 'LR')      { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">LOSS RATIO
                        <option value='KTP'     "; if ($data_foto[$i-1][type_foto] == 'KTP')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">KTP
                        <option value='SIM'     "; if ($data_foto[$i-1][type_foto] == 'SIM')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">SIM
                        <option value='STNK'    "; if ($data_foto[$i-1][type_foto] == 'STNK')    { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">STNK
                        <option value='OTH'     "; if ($data_foto[$i-1][type_foto] == 'OTH')     { $ganu .= " selected ";} else { $ganu .= "$UWD_HOLD_list"; }  $ganu .= ">OTHER
                        ";
                  }
          
                  $nama_file_foto = $data_foto[$i-1][Nama_foto];
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

function show_period($dat, $UWD_HOLD_list_select,$UWD_HOLD_text)
{
    {
        $DED = number_format(300000) ;
  
  
  
        if ( $dat[admin_cost]       == null ) { $adm_cost = number_format(60000);} else { $adm_cost = number_format($dat[admin_cost]);  }
        if ( $dat[ren_option]       == null ) { $dat[ren_option] = 'USE_PH';  }
        if ( $dat[total_unit]       == 0    ) { $dat[total_unit] = '1';       }
  
        if ( $dat[sum_ins]          == null ) { $sum_ins          = null;} else { $sum_ins          = number_format($dat[sum_ins]);          }
        if ( $dat[tax]              == null ) { $tax              = null;} else { $tax              = number_format($dat[tax],5);            }
        if ( $dat[ph21]             == null ) { $ph21             = null;} else { $ph21             = number_format($dat[ph21],5);           }

  
        $per_tgg_[1] = $dat[per_tgg_01];
        // $tpl_[1] = $dat[tpl_01];
        if ( $dat[rate_01]      == null ) { $rate_[1]  	  = null;} else { $rate_[1]     = number_format($dat[rate_01],5) ;		  }
        if ( $dat[loading_01]   == null ) { $loading_[1]  = null;} else { $loading_[1]  = number_format($dat[loading_01],5) ;		}
        if ( $dat[rscc_01]      == null ) { $rscc_[1]  	  = null;} else { $rscc_[1]     = number_format($dat[rscc_01],5) ;		  }
        if ( $dat[teroris_01]   == null ) { $tero_[1]  	  = null;} else { $tero_[1]     = number_format($dat[teroris_01],5) ;	  }
        if ( $dat[flood_01]     == null ) { $flood_[1] 	  = null;} else { $flood_[1]    = number_format($dat[flood_01],5)  ;	  }
        if ( $dat[eq_01]        == null ) { $eq_[1] 	 	  = null;} else { $eq_[1] 	    = number_format($dat[eq_01],5)  ;		    }
        if ( $dat[bengkel_01]   == null ) { $bkl_[1] 	 	  = null;} else { $bkl_[1] 	    = number_format($dat[bengkel_01],5)  ;	}
        if ( $dat[si_driver_01] == null ) { $si_driv_[1]  = null;} else { $si_driv_[1]  = number_format($dat[si_driver_01])  ;	}
        if ( $dat[derek_01]     == null ) { $derek_[1] 	  = null;} else { $derek_[1] 	  = number_format($dat[derek_01],5)  ;	  }
        if ( $dat[komersil_01]  == null ) { $komersil_[1] = null;} else { $komersil_[1] = number_format($dat[komersil_01],5)  ;	}
        if ( $dat[si_pass_01]   == null ) { $si_pass_[1]  = null;} else { $si_pass_[1]  = number_format($dat[si_pass_01])  ;	  }
        if ( $dat[qty_pass_01]  == null ) { $qty_pass_[1] = null;} else { $qty_pass_[1] = number_format($dat[qty_pass_01])  ;   }
        if ( $dat[tpl_01]       == null ) { $tpl_[1]      = null;} else { $tpl_[1]      = number_format($dat[tpl_01])  ;	      }
        if ( $dat[deduc_01]     == null ) { $deduc_[1] 	  = $DED;} else { $deduc_[1]    = number_format($dat[deduc_01])  ;	    }
        if ( $dat[stnk_01]      == null ) { $stnk_[1]  	  = null;} else { $stnk_[1]     = number_format($dat[stnk_01]) ;		    }
  
        $per_tgg_[2] = $dat[per_tgg_02];
        // $tpl_[2] = $dat[tpl_02];
        if ( $dat[rate_02]      == null ) { $rate_[2]     = null;} else { $rate_[2]     = number_format($dat[rate_02],5) ;      }
        if ( $dat[loading_02]   == null ) { $loading_[2]  = null;} else { $loading_[2]  = number_format($dat[loading_02],5) ;		}
        if ( $dat[rscc_02]      == null ) { $rscc_[2]     = null;} else { $rscc_[2]     = number_format($dat[rscc_02],5) ;      }
        if ( $dat[teroris_02]   == null ) { $tero_[2]     = null;} else { $tero_[2]     = number_format($dat[teroris_02],5) ;   }
        if ( $dat[flood_02]     == null ) { $flood_[2]    = null;} else { $flood_[2]    = number_format($dat[flood_02],5)  ;    }
        if ( $dat[eq_02]        == null ) { $eq_[2]       = null;} else { $eq_[2]       = number_format($dat[eq_02],5)  ;       }
        if ( $dat[bengkel_02]   == null ) { $bkl_[2]      = null;} else { $bkl_[2]      = number_format($dat[bengkel_02],5)  ;  }
        if ( $dat[si_driver_02] == null ) { $si_driv_[2]  = null;} else { $si_driv_[2]  = number_format($dat[si_driver_02])  ;  }
        if ( $dat[derek_02]     == null ) { $derek_[2]    = null;} else { $derek_[2]    = number_format($dat[derek_02],5)  ;    }
        if ( $dat[komersil_02]  == null ) { $komersil_[2] = null;} else { $komersil_[2] = number_format($dat[komersil_02],5)  ; }
        if ( $dat[si_pass_02]   == null ) { $si_pass_[2]  = null;} else { $si_pass_[2]  = number_format($dat[si_pass_02])  ;    }
        if ( $dat[qty_pass_02]  == null ) { $qty_pass_[2] = null;} else { $qty_pass_[2] = number_format($dat[qty_pass_02])  ;   }
        if ( $dat[tpl_02]       == null ) { $tpl_[2]      = null;} else { $tpl_[2]      = number_format($dat[tpl_02])  ;        }
        if ( $dat[deduc_02]     == null ) { $deduc_[2]    = $DED;} else { $deduc_[2]    = number_format($dat[deduc_02])  ;      }
        if ( $dat[stnk_02]      == null ) { $stnk_[2]  	  = null;} else { $stnk_[2]     = number_format($dat[stnk_02]) ;		    }
  
        $per_tgg_[3] = $dat[per_tgg_03];
        // $tpl_[3] = $dat[tpl_03];
        if ( $dat[rate_03]      == null ) { $rate_[3]     = null;} else { $rate_[3]     = number_format($dat[rate_03],5) ;      }
        if ( $dat[loading_03]   == null ) { $loading_[3]  = null;} else { $loading_[3]  = number_format($dat[loading_03],5) ;		}
        if ( $dat[rscc_03]      == null ) { $rscc_[3]     = null;} else { $rscc_[3]     = number_format($dat[rscc_03],5) ;      }
        if ( $dat[teroris_03]   == null ) { $tero_[3]     = null;} else { $tero_[3]     = number_format($dat[teroris_03],5) ;   }
        if ( $dat[flood_03]     == null ) { $flood_[3]    = null;} else { $flood_[3]    = number_format($dat[flood_03],5)  ;    }
        if ( $dat[eq_03]        == null ) { $eq_[3]       = null;} else { $eq_[3]       = number_format($dat[eq_03],5)  ;       }
        if ( $dat[bengkel_03]   == null ) { $bkl_[3]      = null;} else { $bkl_[3]      = number_format($dat[bengkel_03],5)  ;  }
        if ( $dat[si_driver_03] == null ) { $si_driv_[3]  = null;} else { $si_driv_[3]  = number_format($dat[si_driver_03])  ;  }
        if ( $dat[derek_03]     == null ) { $derek_[3]    = null;} else { $derek_[3]    = number_format($dat[derek_03],5)  ;    }
        if ( $dat[komersil_03]  == null ) { $komersil_[3] = null;} else { $komersil_[3] = number_format($dat[komersil_03],5)  ; }
        if ( $dat[si_pass_03]   == null ) { $si_pass_[3]  = null;} else { $si_pass_[3]  = number_format($dat[si_pass_03])  ;    }
        if ( $dat[qty_pass_03]  == null ) { $qty_pass_[3] = null;} else { $qty_pass_[3] = number_format($dat[qty_pass_03])  ;   }
        if ( $dat[tpl_03]       == null ) { $tpl_[3]      = null;} else { $tpl_[3]      = number_format($dat[tpl_03])  ;        }
        if ( $dat[deduc_03]     == null ) { $deduc_[3]    = $DED;} else { $deduc_[3]    = number_format($dat[deduc_03])  ;      }
        if ( $dat[stnk_03]      == null ) { $stnk_[3]  	  = null;} else { $stnk_[3]     = number_format($dat[stnk_03]) ;		    }
  
        $per_tgg_[4] = $dat[per_tgg_04];
        // $tpl_[4] = $dat[tpl_04];
        if ( $dat[rate_04]      == null ) { $rate_[4]     = null;} else { $rate_[4]     = number_format($dat[rate_04],5) ;      }
        if ( $dat[loading_04]   == null ) { $loading_[4]  = null;} else { $loading_[4]  = number_format($dat[loading_04],5) ;		}
        if ( $dat[rscc_04]      == null ) { $rscc_[4]     = null;} else { $rscc_[4]     = number_format($dat[rscc_04],5) ;      }
        if ( $dat[teroris_04]   == null ) { $tero_[4]     = null;} else { $tero_[4]     = number_format($dat[teroris_04],5) ;   }
        if ( $dat[flood_04]     == null ) { $flood_[4]    = null;} else { $flood_[4]    = number_format($dat[flood_04],5)  ;    }
        if ( $dat[eq_04]        == null ) { $eq_[4]       = null;} else { $eq_[4]       = number_format($dat[eq_04],5)  ;       }
        if ( $dat[bengkel_04]   == null ) { $bkl_[4]      = null;} else { $bkl_[4]      = number_format($dat[bengkel_04],5)  ;  }
        if ( $dat[si_driver_04] == null ) { $si_driv_[4]  = null;} else { $si_driv_[4]  = number_format($dat[si_driver_04])  ;  }
        if ( $dat[derek_04]     == null ) { $derek_[4]    = null;} else { $derek_[4]    = number_format($dat[derek_04],5)  ;    }
        if ( $dat[komersil_04]  == null ) { $komersil_[4] = null;} else { $komersil_[4] = number_format($dat[komersil_04],5)  ; }
        if ( $dat[si_pass_04]   == null ) { $si_pass_[4]  = null;} else { $si_pass_[4]  = number_format($dat[si_pass_04])  ;    }
        if ( $dat[qty_pass_04]  == null ) { $qty_pass_[4] = null;} else { $qty_pass_[4] = number_format($dat[qty_pass_04])  ;   }
        if ( $dat[tpl_04]       == null ) { $tpl_[4]      = null;} else { $tpl_[4]      = number_format($dat[tpl_04])  ;        }
        if ( $dat[deduc_04]     == null ) { $deduc_[4]    = $DED;} else { $deduc_[4]    = number_format($dat[deduc_04])  ;      }
        if ( $dat[stnk_04]      == null ) { $stnk_[4]  	  = null;} else { $stnk_[4]     = number_format($dat[stnk_04]) ;		    }
  
  
        $per_tgg_[5] = $dat[per_tgg_05];
        // $tpl_[5] = $dat[tpl_05];
        if ( $dat[rate_05]      == null ) { $rate_[5]     = null;} else { $rate_[5]     = number_format($dat[rate_05],5) ;      }
        if ( $dat[loading_05]   == null ) { $loading_[5]  = null;} else { $loading_[5]  = number_format($dat[loading_05],5) ;		}
        if ( $dat[rscc_05]      == null ) { $rscc_[5]     = null;} else { $rscc_[5]     = number_format($dat[rscc_05],5) ;      }
        if ( $dat[teroris_05]   == null ) { $tero_[5]     = null;} else { $tero_[5]     = number_format($dat[teroris_05],5) ;   }
        if ( $dat[flood_05]     == null ) { $flood_[5]    = null;} else { $flood_[5]    = number_format($dat[flood_05],5)  ;    }
        if ( $dat[eq_05]        == null ) { $eq_[5]       = null;} else { $eq_[5]       = number_format($dat[eq_05],5)  ;       }
        if ( $dat[bengkel_05]   == null ) { $bkl_[5]      = null;} else { $bkl_[5]      = number_format($dat[bengkel_05],5)  ;  }
        if ( $dat[si_driver_05] == null ) { $si_driv_[5]  = null;} else { $si_driv_[5]  = number_format($dat[si_driver_05])  ;  }
        if ( $dat[derek_05]     == null ) { $derek_[5]    = null;} else { $derek_[5]    = number_format($dat[derek_05],5)  ;    }
        if ( $dat[komersil_05]  == null ) { $komersil_[5] = null;} else { $komersil_[5] = number_format($dat[komersil_05],5)  ; }
        if ( $dat[si_pass_05]   == null ) { $si_pass_[5]  = null;} else { $si_pass_[5]  = number_format($dat[si_pass_05])  ;    }
        if ( $dat[qty_pass_05]  == null ) { $qty_pass_[5] = null;} else { $qty_pass_[5] = number_format($dat[qty_pass_05])  ;   }
        if ( $dat[tpl_05]       == null ) { $tpl_[5]      = null;} else { $tpl_[5]      = number_format($dat[tpl_05])  ;        }
        if ( $dat[deduc_05]     == null ) { $deduc_[5]    = $DED;} else { $deduc_[5]    = number_format($dat[deduc_05])  ;      }
        if ( $dat[stnk_05]      == null ) { $stnk_[5]  	  = null;} else { $stnk_[5]     = number_format($dat[stnk_05]) ;		    }
  
  
        if ( $dat[Depre_01] == null) { $Depre_[1] = 100; } else { $Depre_[1] =  $dat[Depre_01]; }
        if ( $dat[Depre_02] == null) { $Depre_[2] = 90;  } else { $Depre_[2] =  $dat[Depre_02]; }
        if ( $dat[Depre_03] == null) { $Depre_[3] = 80;  } else { $Depre_[3] =  $dat[Depre_03]; }
        if ( $dat[Depre_04] == null) { $Depre_[4] = 70;  } else { $Depre_[4] =  $dat[Depre_04]; }
        if ( $dat[Depre_05] == null) { $Depre_[5] = 60;  } else { $Depre_[5] =  $dat[Depre_05]; }
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