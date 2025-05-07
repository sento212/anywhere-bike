<?php
namespace search_data_quotation2;
function tampilan($tampilan, $user_id, $mkg_group,$list_Q_P,$stat_uwd_stat,$cari_tgl_awal,$cari_tgl_akhir,$list_mkg_nya,$mkg_member){
echo "
<div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
    <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
        <div class='card-body d-flex flex-column gap-2'>
            <div class='row gy-3 gx-2'>
                    <div class='col-sm-auto d-flex align-items-center'>
                        <span>Type</span> 
                    </div>
                    <div class='col-sm-2'>
                        <select class='form-select' name='list_Q_P' form=tgl_to_list>";
                            echo "
                            <option value='Simulation'"; if ( $list_Q_P =='Simulation'  or $list_Q_P =='S' ) { echo " selected ";} echo ">Simulation
                            <option value='Quotation'";  if ( $list_Q_P =='Quotation'   or $list_Q_P =='Q' ) { echo " selected ";} echo ">Quotation
                            <option value='Polis'";      if ( $list_Q_P =='Polis'       or $list_Q_P =='P' ) { echo " selected ";} echo ">Polis
                            ";
                        echo "
                        </select>
                    </div>
                    <div class='col-sm-auto d-flex align-items-center'>
                        <span>UWD Status</span>
                    </div>
                    <div class='col-sm-2'>
                        <select class='form-select' name='stat_uwd_stat' form=tgl_to_list >";
                            echo"
                            <option value='ALL'        "; if ( 'ALL'        == $stat_uwd_stat) { echo " selected ";} echo ">ALL
                            <option value='APPL'       "; if ( 'APPL'       == $stat_uwd_stat) { echo " selected ";} echo ">APPL
                            <option value='HOLD'       "; if ( 'HOLD'       == $stat_uwd_stat) { echo " selected ";} echo ">HOLD
                            <option value='INPROGRESS' "; if ( 'INPROGRESS' == $stat_uwd_stat) { echo " selected ";} echo ">IN PROGRESS
                            <option value='APPROVE'    "; if ( 'APPROVE'    == $stat_uwd_stat) { echo " selected ";} echo ">APPROVE
                            <option value='REJECT'     "; if ( 'REJECT'     == $stat_uwd_stat) { echo " selected ";} echo ">REJECT
                            ";
                        echo "
                        </select>
                    </div>
            </div>
            <div class='row justify-content-md-center'>
                <div class='col d-flex flex-row gap-2 align-items-center'>
                    <input type='date' name=cari_tgl_awal   value='$cari_tgl_awal'   form=tgl_to_list id=date_pic_cari_tgl_awal class='form-control' required>
                    <span>-</span>
                    <input type='date' name=cari_tgl_khir   value='$cari_tgl_akhir'  form=tgl_to_list id=date_pic_cari_tgl_akhir class='form-control' required>
                </div>
            </div>
            <div class='row align-items-center gx-2'>
                <div class='col-auto'>
                    <span>$mkg_group</span>   
                </div>    
                <div class='col-4'>          
                    <select class='form-select' name='list_mkg_nya' form=tgl_to_list>
                    <option value='ALL'   "; if ( 'ALL' == $list_mkg_nya ) { echo " selected ";} echo ">ALL";
                    foreach ($mkg_member as $mks_data){
                        echo "<option value='$mks_data[value]'  "; if ( $mks_data[value] == $list_mkg_nya ) {echo " selected ";} echo ">$mks_data[value] - $mks_data[value_desc] - $mks_data[count_mkg_group] </option>";
                    }
                    echo"
                    </select>
                </div>
                <div class='col-auto'>
                    <button id=cari_tgl type=submit class='btn btn-primary' name=show_data_list  value='cari_tgl_di_list' form=tgl_to_list data-mdb-ripple-init><i class='fa-solid fa-magnifying-glass'></i> Find</button>
                </div>
            </div>
        </div>
    </div>
</div>
";
}
?>
