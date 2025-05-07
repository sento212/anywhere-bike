<?php

class DataView extends UserView{
    public function search_quotation()
    {
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        search_data_quotation\tampilan($pilihan, $user_id, $mkg_group);
    }


    public function search_quotation2($list_Q_P,$stat_uwd_stat,$cari_tgl_awal,$cari_tgl_akhir,$list_mkg_nya,$mkg_member){
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $day7 = new DateTime();
        $day = new DateTime();
        $day7->modify('-7 days');
        $cari_tgl_awal = ($cari_tgl_awal == '') ? $day7->format('Y-m-d') : $cari_tgl_awal;
        $cari_tgl_akhir = ($cari_tgl_akhir == '') ? $day->format('Y-m-d') : $cari_tgl_akhir;

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
                                echo "<option value='$mks_data[value]'  "; if ( $mks_data['value'] == $list_mkg_nya ) {echo " selected ";} echo ">$mks_data[value] - $mks_data[value_desc] - $mks_data[count_mkg_group] </option>";
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

    public function list_quotation($list_Q_P){
        $list_quotation = $this->list_quotation;
        $pilihan = $this->pilih;
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $list_data = $list_quotation;

        $R_G = '';
        $_no_regis_before = '';
        if ( $list_Q_P == '' ) { $list_Q_P = 'Q'; }

        if ( $list_Q_P == 'Polis'      or $list_Q_P == 'P' )
        { $where_data = "and  SUBSTRING(m.register_id,1,1) = 'P'  " ; $where_data_id = "Polis";      $judul_info = 'LIST DATA Polis';     $judul_uwd_post = 'Request UWD Approval';}
        if ( $list_Q_P == 'Quotation'  or $list_Q_P == 'Q' )
        { $where_data = "and  SUBSTRING(m.register_id,1,1) = 'Q'  " ; $where_data_id = "Quotation";  $judul_info = 'LIST DATA Quotation'; $judul_uwd_post = 'Request UWD Approval';}
        if ( $list_Q_P == 'Simulation' or $list_Q_P == 'S' )
        { $where_data = "and  SUBSTRING(m.register_id,1,1) = 'S'  " ; $where_data_id = "Simulation"; $judul_info = 'LIST DATA Simulation';$judul_uwd_post = 'POST Simulation'; }

        echo "
        <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                <div class='card-body'>
                    <div class='gutang d-flex flex-row gap-2 mt-2'>
                        <div class='d-flex align-items-center'>
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' value='' id='select_all' />
                                <label class='form-check-label' for='select_all'>Select ALL</label>
                            </div>
                        </div>
                        <div class='d-flex align-items-center'>
                            <button type='button' class='btn btn-primary' data-mdb-ripple-init data-mdb-modal-init data-mdb-target='#staticBackdrop'>
                            <i class='fa-regular fa-thumbs-up'></i> Request UWD Approval
                            </button>

                            <!-- Modal -->
                            <div class='modal fade' id='staticBackdrop' data-mdb-backdrop='static' data-mdb-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true' >
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                <div class='modal-header'>
                                    <h3 class='modal-title' id='staticBackdropLabel'>Request UWD Apporval</h3>
                                    <button type='button' class='btn-close' data-mdb-ripple-init data-mdb-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body text-center'>
                                <i class='fa-solid fa-triangle-exclamation fa-shake fa-6x' style='--fa-animation-iteration-count: 1;'></i><br>
                                Apakah Anda Yakin Untuk Melakukan Request ???
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger' data-mdb-ripple-init data-mdb-dismiss='modal'>Close</button>
                                    <button type='submit' form='tgl_to_list' value='cari_tgl_di_list' name='submit_uwd' class='btn btn-success' data-mdb-ripple-init> Submit</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <table id='list_quotation' class='table table-bordered table-responsive-sm table-hover ' style='width:100%'>
                    <thead class='table-dark'>
                        <tr>
                            <th class='text-center'>No</th>
                            <th class='text-center'>$judul_info</th>
                        </tr>
                    </thead>
                    <tbody>";
                    $no = 0;
                    $tutup_kurung  = 'mks';
                    foreach($list_data as $d)
                    {
                        $pk_list           = $d['rowid'];
                        $total_unit        = $d['total_unit'];
                        $wfh_group_wfh_id  = explode("#", $d['wfh_group_wfh_id'] );
                        $wfh_group_wfh_id[0] = $wfh_group_wfh_id[0] ?? '';
                        $wfh_group_wfh_id[1] = $wfh_group_wfh_id[1] ?? '';
                        $wfh_group_wfh_id[2] = $wfh_group_wfh_id[2] ?? '';


                        // START button ReEntry
                        //---------------------
                        if ( ( $d['uwd_status'] == 'APPROVE' ) or ( $d['uwd_status'] == 'INPROGRESS' ) ){
                            if ( $d['agent_no_request'] != '')
                            {
                                if ( $d['uwd_status'] == 'INPROGRESS' )
                                { $in_pro_RA = " disabled style='background-color:#dedede;' "; }
                                else
                                { $in_pro_RA = " "; }

                                if ( $d['agent_upload_file'] == 'YES' )
                                { $but_send_file_apps = '';  }
                                else
                                { $but_send_file_apps = " <button type=submit  name=HIT_API_RA  $in_pro_RA  value='$d[register_id]'  class='btn text-black btn-sm btn-info btn-sm my-2' data-mdb-ripple-init ><i class='fa fa-paper-plane fa-lg fa-fw'></i> Send</button> "; }

                                $hit_ke_apps_RA = "
                                <table class='table table-bordered' width=300px >
                                    <tr>
                                        <th colspan=2>$d[agent_code] - $d[agent_name] $but_send_file_apps  </th>
                                    </tr>
                                    <tr>
                                        <td>Request               </td>
                                        <td>$d[agent_no_request]  </td>
                                    </tr>
                                    <tr>
                                        <td>Quotation File                  </td>
                                        <td>" . substr( $d['uwd_file_pdf'],19,15) . ".pdf </td>
                                    </tr>
                                    <tr>
                                        <td>Quotation Send            </td>
                                        <td>$d[agent_upload_file_date]</td>
                                    </tr>
                                </table>
                                ";

                            }else { $hit_ke_apps_RA =""; }

                            if ( $where_data_id == 'Polis' )
                            {
                                $butt_Re_entry  = "
                                <button  type=submit  name=Re_Entry  value='$d[register_id]'  form=Re_Entry   class='btn btn-info btn-sm my-2' data-mdb-ripple-init> <i class='fa fa-retweet fa-lg fa-fw'></i> Re-Entry</button>
                                <input  type=hidden  name=no_regis  value='$d[register_id]'  form=Re_Entry >
                                <input  type=hidden  name=no_regis  value='$d[register_id]'>
                              ";
                            }
                            elseif ( $where_data_id == 'Quotation' )
                            {
                                $butt_Re_entry_01 = " <button  type=submit  name=Re_Entry    value='$d[register_id]' form=Re_Entry class='btn btn-info btn-sm my-2' data-mdb-ripple-init> <i class='fa fa-retweet fa-lg fa-fw'></i> Re-Entry</button>
                                <input   type=hidden  name='no_regis'  value='$d[register_id]'  form='Re_Entry' >";

                                if ( $d['uwd_status'] == 'APPROVE' )
                                { $butt_Re_entry_02 = "<button  type=submit  name=Perhit_simul_or_quotation  value='$d[register_id]##$total_unit##$where_data_id'  form=Perhit_simul_or_quotation  class='btn btn-info btn-sm my-2' data-mdb-ripple-init> <i class='fa-solid fa-file-import'></i> Quotation</button>"; }
                                else
                                    { $butt_Re_entry_02 = ""; }

                                $butt_Re_entry_03 = "<input  type=hidden  name=no_regis  value='$d[register_id]'>
                                                    <br>
                                                    $hit_ke_apps_RA
                                                    ";

                                $butt_Re_entry = $butt_Re_entry_01 . $butt_Re_entry_02 . $butt_Re_entry_03 ;
                            }
                            elseif ( $where_data_id == 'Simulation' )
                            {
                                $butt_Re_entry = "
                                <button  type=submit  name=Re_Entry                   value='$d[register_id]'  form=Re_Entry                    class='btn btn-info btn-sm my-2' data-mdb-ripple-init> <i class='fa fa-retweet fa-lg fa-fw'></i> Re-Entry</button>
                                <button  type=submit  name=Perhit_simul_or_quotation  value='$d[register_id]##$total_unit##$where_data_id'  form=Perhit_simul_or_quotation   class='btn btn-info btn-sm my-2' data-mdb-ripple-init> <i class='fa-solid fa-file-import'></i> Perhit Premi</button>
                                <input  type=hidden  name=no_regis  value='$d[register_id]'  form=Re_Entry>
                                <input  type=hidden  name=no_regis  value='$d[register_id]'>
                                <br>
                                " . $hit_ke_apps_RA  ;
                            }
                        }else{
                            if ( $d['agent_no_request'] != '')
                            {
                                // chat agent
                                $hit_ke_apps_RA = "
                                                   <table  class='table table-bordered' width=300px >
                                                       <tr>
                                                           <th colspan=2>$d[agent_code] - $d[agent_name]</th>
                                                       </tr>
                                                       <tr>
                                                           <td>Request               </td>
                                                           <td>$d[agent_no_request]  </td>
                                                       </tr>
                                                       <tr>
                                                           <td>Quotation File  </td>
                                                           <td>-               </td>
                                                       </tr>
                                                       <tr>
                                                           <td>Quotation Send            </td>
                                                           <td>$d[agent_upload_file_date]</td>
                                                       </tr>
                                                   </table>
                                                   ";
                            }
                            else
                            {    $hit_ke_apps_RA = "";  }

                            $butt_Re_entry = $hit_ke_apps_RA;
                        }
                         // END button ReEntry

                        // gara gara salah text english
                        if ( $d['uwd_status'] == 'APPROVE') { $stat_uwd_new = 'APPROVED';  } else { $stat_uwd_new =  $d['uwd_status']; }

                        ////////////// MULTI UNIT SAJA ////////////////////--------------------------->
                        // --------------------------------------------------------------------------->
                        if($total_unit >= 2){
                            if  ( $_no_regis_before == $d['register_id'] )
                            {   // detail unit ke 2,3,4,.........
                                echo"
                                <div class='my-2'>
                                    <button type=submit class='btn text-black btn-sm' data-mdb-ripple-init  style='background-color: #b3b3b3;' name=Edit_no_regis_unit  value='$d[register_id]#$d[unit_no]' form=back_to_menu ><i class='fa fa-pencil fa-lg fa-fw'></i></button>
                                        $d[unit_no] - $d[make]/$d[cate]/$d[model]
                                </div>";
                            }else{
                                $no++;
                                if ( $tutup_kurung == 'x' )
                                { echo" </td> </tr>"; }
                                $tutup_kurung = 'x';
                                $tombol_off = '';
                                if ( $d['uwd_status'] == 'INPROGRESS' )  { $tombol_off = " disabled "; }
                                if ( $R_G == 'Q' and $d['uwd_status'] == 'APPROVE' )  { $tombol_off = " disabled "; }
                                if ( $R_G == 'S' and $d['uwd_status'] == 'APPROVE' )  { $tombol_off = " disabled "; }
                                echo"
                                <tr>
                                    <td class='text-center'>$no</td>
                                    <td>
                                    $butt_Re_entry
                                    <div class='form-check'>
                                        <input class='form-check-input list_check_table' $tombol_off type='checkbox' id='opt-in' value='$d[register_id]' form='tgl_to_list' name=list_regis[] checked />
                                        <label for='opt-in'><font style='font-size: 15px;font-weight: bold;'>$d[register_id]</font></label> - $d[type_api_desc] - $wfh_group_wfh_id[2]
                                    </div>
                                    <input type=hidden   name=uwd_statusnya[] value='$d[uwd_status]'  >
                                    <font style='color:blue'><b>Underwriting Status <i>$stat_uwd_new</i> </b> </font><br>
                                ";
                                if ( $d['uwd_status'] == 'APPROVE' )
                                {
                                  echo"
                                  <i class='fa fa-paper-plane-o  fa-lg fa-fw'></i>$d[uwd_tgl_send]
                                  <i class='fa fa-thumbs-o-up    fa-lg fa-fw'></i>$d[uwd_tgl_done] <br>";
                                }
                                if ( $d['uwd_status'] == 'REJECT' )
                                {
                                  echo"
                                  <i class='fa fa-paper-plane-o  fa-lg fa-fw'></i>$d[uwd_tgl_send]
                                  <i class='fa fa-thumbs-o-down  fa-lg fa-fw'></i>$d[uwd_tgl_done] <br>";
                                }
                                if ( $d['uwd_status'] == 'INPROGRESS' )
                                {
                                  echo"
                                  <i class='fa fa-paper-plane-o  fa-lg fa-fw'></i>$d[uwd_tgl_send]
                                  <i class='fa fa-lightbulb-o    fa-lg fa-fw'></i><br>";
                                }

                            if ( $d['quotation_no'] != '' )
                            { echo " <b> No Quotation : </b>$d[quotation_no] - $d[quotation_uwd_status]<br> ";}
                            echo"
                            <b> $d[customer_name]</b> <br>
                                QQ : $d[qq]<br>
                                Periode : $d[tgl_awal] Until $d[tgl_akhir]<br>
                                <div class='my-2'>
                                    <button type=submit class='btn text-black btn-sm' data-mdb-ripple-init  style='background-color: #b3b3b3;' name=Edit_no_regis_unit  value='$d[register_id]#$d[unit_no]' form=back_to_menu ><i class='fa fa-pencil fa-lg fa-fw'></i></button>
                                        $d[unit_no] - $d[make]/$d[cate]/$d[model]
                                </div>";
                            }

                        }

                        ////////////// SATU UNIT SAJA ////////////////////--------------------------->
                        // -------------------------------------------------------------------------->
                        elseif( $total_unit == 1 )
                        {
                            $no++;
                                    // jebakan button centang nya utk ACTION
                                    // ------------------------>>>>>>>>>>>>>
                                {
                                    $tombol_off = '';
                                    if ( $d['uwd_status'] == 'INPROGRESS' )  { $tombol_off = " disabled "; }
                                    if ( $R_G == 'Q' and $d['uwd_status'] == 'APPROVE' )  { $tombol_off = " disabled "; }
                                    if ( $R_G == 'S' and $d['uwd_status'] == 'APPROVE' )  { $tombol_off = " disabled "; }
                                }
                                echo"
                                <tr>
                                    <td class='text-center'>$no</td>
                                    <td>
                                    $butt_Re_entry
                                    <div class='form-check'>
                                        <input class='form-check-input list_check_table' $tombol_off type='checkbox' form='tgl_to_list' name=list_regis[] id='opt-in' value='$d[register_id]' />
                                        <label for='opt-in'><font style='font-size: 15px;font-weight: bold;'>$d[register_id]</font></label> - $d[type_api_desc] - $wfh_group_wfh_id[2]
                                    </div>
                                    <font style='color:green'> <b>Underwriting Status <i>$stat_uwd_new</i> </b> </font><br>
                                ";
                                // STATUS PROGRESS
                                {
                                    if ( $d['uwd_status'] == 'APPROVE' )
                                    {
                                        echo"
                                        <i class='fa fa-paper-plane-o  fa-lg fa-fw'></i>$d[uwd_tgl_send]
                                        <i class='fa fa-thumbs-o-up    fa-lg fa-fw'></i>$d[uwd_tgl_done] <br>";
                                    }
                                    if ( $d['uwd_status'] == 'REJECT' )
                                    {
                                        echo"
                                        <i class='fa fa-paper-plane-o  fa-lg fa-fw'></i>$d[uwd_tgl_send]
                                        <i class='fa fa-thumbs-o-down  fa-lg fa-fw'></i>$d[uwd_tgl_done] <br>";
                                    }
                                    if ( $d['uwd_status'] == 'INPROGRESS' )
                                    {
                                        echo"
                                        <i class='fa fa-paper-plane    fa-lg fa-fw'></i>$d[uwd_tgl_send] <br>";
                                    }
                                }
                                if ( $d['quotation_no'] != '' )
                                { echo " <b> No Quotation : </b>$d[quotation_no] - $d[quotation_uwd_status] <br> ";}

                                echo"
                                    <div class='table-container' style='overflow-x:auto;'>
                                       <table class='table table-bordered' >
                                       <thead>
                                           <tr>
                                               <td colspan=2><b>$d[customer_name]</b> </td>
                                           </tr>
                                           </thead>
                                           <tbody class='table-group-divider table-divider-color'>
                                           <tr>
                                               <td>QQ      </td>
                                               <td>$d[qq]  </td>
                                           </tr>
                                           <tr>
                                               <td>Period                            </td>
                                               <td>$d[tgl_awal] Until $d[tgl_akhir]  </td>
                                           </tr>
                                           <tr>
                                               <td>Bus Code      </td>
                                               <td>$d[bus_code]  </td>
                                           </tr>
                                           </tbody>
                                       </table>
                                    </div>
                                    ";
                                // Tampilan SCREEN
                                if (  $d['make']      <> '' and $d['cate']        <> '' and $d['model']       <> '' and
                                    $d['sum_ins']   <> '' and $d['per_tgg_01']  <> '' and $d['tahun_buat']  <> '' and
                                    $d['mkg_group'] <> '')
                                {
                                    $VEHICLE_MAKE   = $d['VEHICLE_MAKE'];
                                    $VEHICLE_SCORE  = $d['VEHICLE_SCORE'];
                                    $VEHICLE_BOBOT  = $d['VEHICLE_BOBOT'];

                                    $BODYTYPE       = $d['BODYTYPE'];
                                    $BODYTYPE_SCORE = $d['BODYTYPE_SCORE'];
                                    $BODYTYPE_BOBOT = $d['BODYTYPE_BOBOT'];

                                    $COVERAGE       = $d['COVERAGE'];
                                    $COVERAGE_SCORE = $d['COVERAGE_SCORE'];
                                    $COVERAGE_BOBOT = $d['COVERAGE_BOBOT'];

                                    $VEHICLE_AGE       = $d['VEHICLE_AGE'];
                                    $VEHICLE_AGE_SCORE = $d['VEHICLE_AGE_SCORE'];
                                    $VEHICLE_AGE_BOBOT = $d['VEHICLE_AGE_BOBOT'];

                                    $CORP_ID       = $d['CORP_ID'];
                                    $CORP_ID_SCORE = $d['CORP_ID_SCORE'];
                                    $CORP_ID_BOBOT = $d['CORP_ID_BOBOT'];

                                    $TSI       = $d['TSI'];
                                    $TSI_SCORE = $d['TSI_SCORE'];
                                    $TSI_BOBOT = $d['TSI_BOBOT'];

                                    $TOTAL_SCORE = $d['TOTAL_SCORE'];
                                    $GRADE       = $d['GRADE'];
                                    echo"
                                        <div class='table-container' style='overflow-x:auto;'>
                                          <table class='table table-bordered'>
                                                <thead>
                                                    <tr>
                                                        <td colspan=4 ><b>SCORE POINT KENDARAAN</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody class='table-group-divider table-divider-color'>
                                                    <tr>
                                                        <td>VEHICLE MAKE</td>
                                                        <td>$VEHICLE_MAKE</td>
                                                        <td style='text-align:right;'>$VEHICLE_SCORE</td>
                                                        <td style='text-align:right;'>$VEHICLE_BOBOT %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>BODYTYPE</td>
                                                        <td>$BODYTYPE</td>
                                                        <td style='text-align:right;' >$BODYTYPE_SCORE</td>
                                                        <td style='text-align:right;' >$BODYTYPE_BOBOT %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>COVERAGE</td>
                                                        <td>$COVERAGE</td>
                                                        <td style='text-align:right;'>$COVERAGE_SCORE</td>
                                                        <td style='text-align:right;'>$COVERAGE_BOBOT %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>VEHICLE AGE</td>
                                                        <td>$VEHICLE_AGE</td>
                                                        <td style='text-align:right;'>$VEHICLE_AGE_SCORE</td>
                                                        <td style='text-align:right;'>$VEHICLE_AGE_BOBOT %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>CORP ID</td>
                                                        <td>$CORP_ID</td>
                                                        <td style='text-align:right;'>$CORP_ID_SCORE</td>
                                                        <td style='text-align:right;'>$CORP_ID_BOBOT %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TSI</td>
                                                        <td>$TSI</td>
                                                        <td style='text-align:right;'>$TSI_SCORE</td>
                                                        <td style='text-align:right;'>$TSI_BOBOT %</td>
                                                    </tr>
                                                </tbody>
                                          </table>
                                        </div>
                                    ";
                                    echo"
                                    <div style='margin-bottom:5px;font-weight:bold;color:green;'>
                                        SCORE RATING --> $TOTAL_SCORE, GRADE --> $GRADE
                                    </div>
                                    ";
                                }else{
                                    $info_rating = "";
                                    if ( $d['make']       <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Make<br>";             }
                                    if ( $d['cate']       <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Category<br>";         }
                                    if ( $d['model']      <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Model<br>";            }
                                    if ( $d['sum_ins']    <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Sum Insured<br>";      }
                                    if ( $d['per_tgg_01'] <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Jenis pertangguan<br>";}
                                    if ( $d['tahun_buat'] <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Tahun kendaraan<br>";  }
                                    if ( $d['mkg_group']  <> '' ) { $info_rating =  $info_rating . "&nbsp;&nbspTidak ada Marketing Group<br>";  }

                                    echo"
                                    <div style='margin-bottom:5px;font-weight:bold;color:red;'>
                                        SCORE RATING TIDAK BISA DITAMPILKAN,
                                        DATA ENTRY BELUM SEMPURNA<BR>
                                        $info_rating
                                    </div>
                                    ";
                                }
                                echo"
                                <button type=submit class='btn text-black btn-sm' data-mdb-ripple-init  style='background-color: #b3b3b3;' name=Edit_no_regis_unit  value='$d[register_id]#$d[unit_no]' form=back_to_menu ><i class='fa fa-pencil fa-lg fa-fw'></i></button>
                                <b>$d[unit_no] - $d[make]/$d[cate]/$d[model]</b> - $d[no_rangka]
                            </td>
                        </tr>
                        ";
                        }
                        $_no_regis_before = $d['register_id'];
                    }
                    echo "
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/list_data_quotation.js' ></script>
        ";
    }
}
