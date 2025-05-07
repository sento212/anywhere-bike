<?php
namespace sob;
function tampilan($tampilan, $user_id, $mkg_group,$data,$UWD_HOLD_list,$UWD_HOLD_date,$UWD_HOLD_list_select,$UWD_HOLD_text){
    $dat = $data[data][0];
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
<script src='https://www.rks-w.com/mks/entry/bike/views/javascript/source_of_business.js' ></script>
";
}
?>
