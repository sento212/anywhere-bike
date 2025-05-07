<?php
namespace Insurent_list;
function tampilan($tampilan, $user_id, $mkg_group,$data,$UWD_HOLD_list,$UWD_HOLD_date,$UWD_HOLD_list_select,$UWD_HOLD_text,$location_data,$butt_off_view,$UWD_HOLD_button,$UWD_HOLD_text_area, $list_province){
    $dat = $data[data][0];
    $location_data = $location_data[code];
    $list_province = $list_province[code];
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
                              $value       = $mks_data[LOCATION_NO];
                              $value_desc  = $mks_data[ADDRESS_LINE1];
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
                            <input class='form-check-input' type='checkbox' value='' id='cek_company' name=nik_pt_person  value='$dat[nik_pt_person]'";if($dat[nik_pt_person] == 'Y') { echo "checked";} echo">
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
                        if ( $dat[uwd_status] == 'APPL' or $dat[uwd_status] == '' ){
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
                        if ( $dat[uwd_status] == 'APPL' or $dat[uwd_status] == '' )
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
                        echo "<option value='' "; if ( $dat['province'] == '' ) { echo " selected ";} else { echo $UWD_HOLD_list;} echo ">-- Choose --</option>";
                        foreach ($list_province as $mks_data)
                        {
                          $value = $mks_data[PROVINCE_NAME];
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
<script src='https://www.rks-w.com/mks/entry/bike/views/javascript/insurend_list.js' ></script>
";
}
?>
