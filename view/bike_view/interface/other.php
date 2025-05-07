<?php
namespace Other;
function tampilan($tampilan, $user_id, $mkg_group, $data,$butt_off_view,$result_Simul_to_pol_quo,$UWD_HOLD_button){
    $dat = $data[data][0];
    echo "
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
                    if ( $dat[source_api] == 'Raksa_patner' ){
                        echo "
                        <div class='gutang d-flex flex-column my-2 gap-2'>
                            <span>Note For Raksa Patner</span>
                            <div class='form-floating w-100'>
                                <textarea class='form-control upper'  name=info_for_uwd_app style='height: 100px;'>$dat[note_raksa_partner]</textarea>
                            </div>
                        </div>";
                    }

                    // start button 
                    if ( substr( $dat[register_id],0,1) == 'Q' )   { $the_register_id = "Q" ; }
                    if ( substr( $dat[register_id],0,1) == 'P' )   { $the_register_id = "P" ; }
                    if ( substr( $dat[register_id],0,1) == 'S' )   { $the_register_id = "S" ; }
                
                    if ( $dat[register_id] != '' )
                    {
                        if ( $the_register_id == 'Q' )
                        { $button_off_P = " disabled " ; }
                
                        if ( $the_register_id == 'P' )
                        { $button_off_Q = " disabled " ; $button_off_Copy = " disabled " ; }
                    }
                    else
                    { $button_off_Copy = " disabled " ; }
                
                
                    if ( $dat[uwd_status] == 'APPL' )
                    {
                      $button_off_Copy = " disabled " ;
                    }
                
                    // 4 APRIL 2023 => TUTUP DULU AD BUG PADA SAAT APPROVE DI Q, TIDAK BISA DILAKUKAN Q_TO_P
                    //Trap untuk status uwd APPROVE or INPROGRESS or REJECT nya
                    // if ( $dat[uwd_status] == 'APPROVE'  or  $dat[uwd_status] == 'INPROGRESS'  )
                    // {
                    //     if ( $the_register_id == "Q"  )
                    //     { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled " ;}
                
                    //     if ( $the_register_id == "P" )
                    //     { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled " ;}
                    // }
                    // 4 APRIL 2023 => PERBAIKAN BUG (BUG PADA SAAT APPROVE DI Q, TIDAK BISA DILAKUKAN Q_TO_P)
                    if ( $dat[uwd_status] == 'APPROVE')
                    {
                        if ( $the_register_id == "Q"  )
                        { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ;}
                
                        if ( $the_register_id == "P" )
                        { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ;}
                    }
                    if($dat[uwd_status] == 'INPROGRESS') {
                        if ( $the_register_id == "Q"  )
                        { $button_off_Q = " disabled ";  $button_off_P = " disabled "; $button_off_Copy = " disabled ";}
                
                        if ( $the_register_id == "P" )
                        { $button_off_Q = " disabled " ;  $button_off_P = " disabled " ; $button_off_Copy = " disabled ";}
                    }
                
                
                    //Trap untuk REJECT nya
                    if ( $dat[uwd_status] == 'REJECT' )
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
                            if ( substr ( $dat[register_id], 0,1) == 'S'){

                                if ( $dat[uwd_status] == 'APPL' )
                                {
                                echo "
                                    <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                    <button type='submit' class='btn btn-secondary' name=update_data_Simul  value='update_simulation' data-mdb-ripple-init><i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                    </div>
                                ";
                                }
                                if ( $dat[uwd_status] == 'APPROVE' and $result_Simul_to_pol_quo == '' )
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
                                if ( $dat[uwd_status] == 'APPROVE' and $result_Simul_to_pol_quo != '' )
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
                            elseif ( substr ( $dat[register_id], 0,1) == 'Q'){
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
                            elseif ( substr ( $dat[register_id], 0,1) == 'P')
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
                            if ( substr ( $dat[register_id], 0,1) == 'S'){

                                // VIRGIN STATUS
                                if ( $dat[uwd_status] == 'APPL' )
                                {
                                echo "
                                    <div class='guting d-flex flex-row justify-content-center gap-2 my-2'>
                                        <button type=submit class='btn btn-secondary' name=update_data_Simul  value='update_simulation' data-mdb-ripple-init>  <i class='fa-regular fa-floppy-disk'></i> Save Simulation</button>
                                    </div>
                                ";
                                }
                                // STATUS POSTING ( UWD APPROVAL )
                                else if ( $dat[uwd_status] == 'APPROVE' and $result_Simul_to_pol_quo == '' )
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
                                else if ( $dat[uwd_status] == 'APPROVE' and $result_Simul_to_pol_quo != '' )
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
                            elseif ( substr ( $dat[register_id], 0,1) == 'Q')
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
                            elseif ( substr ( $dat[register_id], 0,1) == 'P')
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
    <input type=hidden name=on_track              value='on_track'    >
    <input type=hidden name=user_id   id=user_id  value='$user_id'    >
    <input type=hidden name=mk_group              value='$mkg_group'  >
    ";

    // ada hubungan dengan yang gak di pake
    // <input type=hidden      name=polis_renew        value='$ex_polis_baru'    >
    // <input type=hidden      name=tgl_list_direct    value='$tgl_list'         >
}
?>
