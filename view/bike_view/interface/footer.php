<?php
namespace footer;
function tampilan($user_id, $mkg_group,$data){
    $dat = $data[data][0];
    $next_unit  = str_pad( $dat[jumlah_unit] + 1 ,3, "0",STR_PAD_LEFT );
    echo "  
    <input type=hidden name=token    value='$_SESSION[token]'>
    </div>
    </form> 
    <div class='border border-1 w-100' style='height:50px'>footer face</div>
    </div>
    </div>
    <form method='POST' id=web_menu_yeah action='index.php'>
        <input type=hidden name=on_track              value='on_track'    >
        <input type=hidden name=user_id   id=user_id  value='$user_id'    >
        <input type=hidden name=mk_group              value='$mkg_group'  >
    </form>
    <form method='POST' id='renew_partner' action=''>
        <input  type=hidden     name=on_track           value='on_track'          >
        <input  type=hidden     name=user_id            value='$user_id'          >
        <input  type=hidden     name=mk_group           value='$mkg_group'        >
        <input  type=hidden     name=web_menu           value='renewal_30_day_ren_partner_2'>
    </form>
    <form method='post' id=back_to_menu action='index.php' target='_blank' >
        <input type='hidden'  name='web_menu'         value='BS5_Menu_Any_Anyware_aerox'>
        <input type=hidden name='menu_bikes'          value='NEW'    >
        <input type=hidden name=menu_key              value='rgtrgtrgtrgtrgtrgrtg'>
        <input type=hidden name=menu_type             value='MODEL'      >
        <input type=hidden name=on_track              value='on_track'    >
        <input type=hidden name=user_id   id=user_id  value='$user_id'    >
        <input type=hidden name=mk_group              value='$mkg_group'  >
    </form>
    <form method='post' id=tgl_to_list action='index.php'>
        <input type=hidden name=on_track                value='on_track'  >
        <input type=hidden name=user_id                 value='$user_id'  >
        <input type=hidden name=mk_group                value='$mkg_group'>
        <input type=hidden name=menu_type               value='MODEL'      >
        <input type=hidden name='menu_bikes'            value='DATA'    >
        <input type=hidden name=menu_key                value='rgtbongekrgtbongekrgtbongek'>
        <input type=hidden name=web_menu                value='BS5_Menu_Any_Anyware_aerox' >
    </form>
    <form method='post' id=cek_doc_app action='index.php'>
        <input type=hidden name=user_id       value='$user_id'          >
        <input type=hidden name=mk_group      value='$mkg_group'        >
        <input type=hidden name=on_track      value='on_track'          >
        <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox' >
        <input type=hidden name='menu_bikes'  value='NEW'    >
        <input type=hidden name=menu_type     value='ACTION'      >
        <input type=hidden name=menu_key      value='dewaditinggalindewaditinggalin'>
        <input type=hidden name=token    value='$_SESSION[token]'>
    </form>
    <form method='post' id=addon_unit action='index.php'>
        <input type=hidden name=user_id       value='$user_id'                      >
        <input type=hidden name=mk_group      value='$mkg_group'                    >
        <input type=hidden name=on_track      value='on_track'                      >
        <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox'    >
        <input type=hidden name=menu_key      value='rianbabirianbabirianbabi'      >
        <input type=hidden name=menu_type     value='MODEL'                         >
        <input type=hidden name='menu_bikes'  value='NEW'                           >
        <input type=hidden name='register_id' value='$dat[register_id]'             >
        <input type=hidden name='latersunit' value='$next_unit'                     >
    </form>
    <form method='post' id=Perhit_simul_or_quotation target='_blank' >
        <input type=hidden name=on_track      value='on_track'                          >
        <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox'        >
        <input type=hidden name=menu_key      value='rianasurianasurianasurianasu'      >
        <input type=hidden name=menu_type     value='MODEL'                             >
        <input type=hidden name=user_id       value='$user_id'          >
        <input type=hidden name=mk_group      value='$mkg_group'        >
    </form>
";
}
?>


