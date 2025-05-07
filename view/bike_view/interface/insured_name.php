<?php
namespace Insured_Name;
function tampilan($tampilan, $user_id, $mkg_group,$data,$UWD_HOLD_list,$UWD_HOLD_date,$UWD_HOLD_list_select,$UWD_HOLD_text, $qq_location, $qq_location2,$UWD_HOLD_checkbox, $UWD_HOLD_text_area){
$dat = $data[data][0];
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
                                foreach ($qq_location[code] as $mks_data)
                                {
                                  $value       = $mks_data[LOCATION_NO];
                                  $value_desc  = $mks_data[ADDRESS_LINE1];
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
                            <input class='form-check-input' type='checkbox' name=qq_pt_person id=cek_qq_company value='$dat[qq_pt_person]' ";if ( $dat[qq_pt_person] == 'Y' ) {echo " checked ";} echo ">
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
                                foreach ($qq_location[code] as $mks_data)
                                {
                                  $value       = $mks_data[LOCATION_NO];
                                  $value_desc  = $mks_data[ADDRESS_LINE1];
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
                            <input class='form-check-input' id=cek_qq2_company $UWD_HOLD_checkbox type=checkbox  name=qq2_pt_person   value='$dat[qq2_pt_person]'"; if ( $dat[qq2_pt_person] == 'Y' ) {echo " checked ";} echo ">
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
<script src='https://www.rks-w.com/mks/entry/bike/views/javascript/insured_name.js' ></script>
";
}
?>
