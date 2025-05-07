<?php
namespace Doc_Appr;
function tampilan($tampilan, $user_id, $mkg_group,$data,$UWD_HOLD_list,$UWD_HOLD_date,$UWD_HOLD_list_select,$UWD_HOLD_text){
    $dat = $data[data][0];
    $status_uwd = array("POST","INPROGRESS","APPROVE","HOLD","");
    if (in_array(  $dat[uwd_status] , $status_uwd )) { $D_app_but = ' disabled '; } else { $D_app_but = ''; }
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
                        if (  ( $dat[register_id] == '' ) or (  $dat[register_id] != ''  and $dat[reg_approval_web] == '' )  ){
                        echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app      id=doc_suevey_cek >
                        </div>";
                        }
                        else if (  $dat[register_id] != '' and $dat[reg_approval_web] != '' ){
                            echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app      id=doc_suevey_cek >
                            <button type=submit form=cek_doc_app name=reg_approval_web_but $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                        </div>";  
                        }      
                echo"</div>
                </div>";

                if ( $dat[doc_appr][reg_approval_web1] != '')
                {
                    doc_tampil($dat[doc_appr][reg_approval_web1]);
                }
                elseif($dat[reg_approval_web] != ''){
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
                        if (  ( $dat[register_id] == '' ) or (  $dat[register_id] != ''  and $dat[reg_approval_web_02] == '' )  ){
                        echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_02 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app_02      id=doc_suevey_cek_02 >
                        </div>";
                        }
                        else if (  $dat[register_id] != '' and $dat[reg_approval_web_02] != '' ){
                            echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_02 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_02 $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app_02      id=doc_suevey_cek_02 >
                        </div>";  
                        }      
                echo"</div>
                </div>";

                if ( $dat[doc_appr][reg_approval_web2] != '')
                {
                    doc_tampil($dat[doc_appr][reg_approval_web2]);
                }
                elseif($dat[reg_approval_web_02] != ''){
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
                        if (  ( $dat[register_id] == '' ) or (  $dat[register_id] != ''  and $dat[reg_approval_web_03] == '' )  ){
                        echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_03 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app_03      id=doc_suevey_cek_03 >
                        </div>";
                        }
                        else if (  $dat[register_id] != '' and $dat[reg_approval_web_03] != '' ){
                            echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_03 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_03 $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app_03      id=doc_suevey_cek_03 >
                        </div>";  
                        }      
                echo"</div>
                </div>";

                if ( $dat[doc_appr][reg_approval_web3] != '')
                {
                    doc_tampil($dat[doc_appr][reg_approval_web3]);
                }
                elseif($dat[reg_approval_web_03] != ''){
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
                        if (  ( $dat[register_id] == '' ) or (  $dat[register_id] != ''  and $dat[reg_approval_web_04] == '' )  ){
                        echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_04 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app_04      id=doc_suevey_cek_04 >
                        </div>";
                        }
                        else if (  $dat[register_id] != '' and $dat[reg_approval_web_04] != '' ){
                            echo"
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_04 $D_app_but value='cek_doc_appoval' class='btn btn-secondary flex-shrink-0' data-mdb-ripple-init><i class='fa-solid fa-binoculars'></i> Load</button>
                            <button type=submit form=cek_doc_app name=reg_approval_web_but_04 $D_app_but value='clear_doc_app' class='btn btn-danger flex-shrink-0' data-mdb-ripple-init><i class='fa fa-trash  fa-lg fa-fw'></i> Clear</button>
                            <input  type=hidden form=cek_doc_app name=val_reg_doc_app_04      id=doc_suevey_cek_04 >
                        </div>";  
                        }      
                echo"</div>
                </div>";

                if ($dat[doc_appr][reg_approval_web4] != '')
                {
                    doc_tampil($dat[doc_appr][reg_approval_web4]);
                }
                elseif($dat[reg_approval_web_04] != ''){
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

function doc_tampil($data) {
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
                foreach($list_judul_doc[data_foto] as $foto){
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
                    $list_value = array_column($list_judul_doc[data_chat], 'chat_user_name');
                    $data_user = array_unique($list_value);
                    $colors = array(
                        "#DAA520",
                        "red",
                        "blue",
                        "green"
                    );
                    foreach($list_judul_doc[data_chat] as $chat){
                        $angka = array_search($chat[chat_user_name], $data_user);
                        if($angka > 3){
                            $angka = $angka % 3;
                        }
                        if($chat[link_file] != '')
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
                                foreach($list_judul_doc[data_doc_app] as $apprv){
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
?>
