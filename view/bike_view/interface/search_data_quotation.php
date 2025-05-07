<?php
namespace search_data_quotation;
function tampilan($tampilan, $user_id, $mkg_group){
echo "
<div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
    <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
        <div class='card-body'>
            <div class='guting d-flex flex-row gap-3'>
                <div class='d-flex align-items-center'>
                    <span>Type</span> 
                </div>
                <div class='d-flex flex-row'>
                    <select class='form-select'>
                        <option value='1'>Simulation</option>
                        <option value='2'>Quotation</option>
                        <option value='3'>Polis</option>
                    </select>
                </div>
                <div class='d-flex align-items-center'>
                    <span>UWD Status</span>
                </div>
                <div class='d-flex flex-row'>
                    <select class='form-select' >                        
                        <option value='ALL'         >ALL
                        <option value='APPL'        >APPL
                        <option value='HOLD'        >HOLD
                        <option value='INPROGRESS'  >IN PROGRESS
                        <option value='APPROVE'     >APPROVE
                        <option value='REJECT'      >REJECT
                    </select>
                </div>
            </div>
            <div class='gutang d-flex flex-row gap-2 mb-2'>
                <input type='date' class='form-control'>
                <div class='d-flex align-items-center'>
                    <span>-</span>
                </div>
                <input type='date' class='form-control'>
            </div>
            <div class='gutang d-flex flex-row gap-2'>
                <div class='d-flex align-items-center'>
                    <span>$mkg_group</span>
                </div>
                <div class='d-flex flex-row'>
                    <select class='form-select' >                        
                        <option value='ALL' >ALL
                    </select>
                </div>
                <button type='button' class='btn btn-primary' data-mdb-ripple-init><i class='fa-solid fa-magnifying-glass'></i> Find</button>
            </div>
            <div class='gutang d-flex flex-row gap-2 mt-2'>
                <div class='d-flex align-items-center'>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' />
                        <label class='form-check-label' for='flexCheckDefault'>Select ALL</label>
                    </div>
                </div>
                <div class='d-flex align-items-center'>
                    <button type='button' class='btn btn-success' data-mdb-ripple-init><i class='fa-regular fa-thumbs-up'></i> Request UWD Approval</button>
                </div>
            </div>
        </div>
    </div>
</div>
";
}
?>
