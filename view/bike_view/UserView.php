<?php
// view/UserView.php
// require_once(__DIR__ .'/interface/main_menu.php');
// require_once(__DIR__ .'/interface/general_data_policy.php');
// require_once(__DIR__ .'/interface/source_of_business.php');
// require_once(__DIR__ .'/interface/document_approval.php');
// require_once(__DIR__ .'/interface/insured_list.php');
// require_once(__DIR__ .'/interface/insured_name.php');
// require_once(__DIR__ .'/interface/renewal_info.php');
// require_once(__DIR__ .'/interface/policy_unit.php');
// require_once(__DIR__ .'/interface/other.php');
// require_once(__DIR__ .'/interface/header.php');
// require_once(__DIR__ .'/interface/footer.php');
// require_once(__DIR__ .'/interface/main_menu.php');
// require_once(__DIR__ .'/interface/search_data_quotation.php');
// require_once(__DIR__ .'/interface/list_data_quotation.php');
// require_once(__DIR__ .'/interface/search_data_quotation 2.php');
// $files = glob('bike/views/interface' . '/*.php');
// foreach($files as $file){
//     require_once($file);
// }

// $directory = __DIR__ . '/interface/';

// $files = scandir($directory);

// foreach ($files as $file) {
//     if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
//         require_once $directory . $file;
//     }
// }

// require_once __DIR__ . '/NewView.php';


class UserView extends Main_view
{
    protected $UWD_HOLD_list = "", $UWD_HOLD_date = '', $UWD_HOLD_list_select = "",
    $UWD_HOLD_text = "", $UWD_HOLD_button = '', $UWD_HOLD_text_area = '',
    $UWD_HOLD_checkbox = "", $UWD_HOLD_text_sum_ins = '';

    public $menu, $make, $cate, $modeler, $foto_unit, $list_province, $qq_location, $qq_location2, $insurend, $user_id, $mkg_group, $pilih, $full_dept, $list_branch,
    $person_name_master_gh, $person_name_master_gh_ao, $list_agent_id_data,
    $general_table_data, $location_data, $butt_off_view, $data = [], $list_quotation = [];

    // public function main(){
    //     $pilihan = $this->pilih;
    //     $user_id = $this->user_id;
    //     $mkg_group = $this->mkg_group;
    //     main_menu\tampilan($pilihan, $user_id, $mkg_group);
    // }

    public function sethold()
    {
        $this->UWD_HOLD_list = " readonly style='background-color:powderblue;' ";
        $this->UWD_HOLD_date = " style='background-color:powderblue;'";
        $this->UWD_HOLD_list_select = " disabled ";
        $this->UWD_HOLD_text = 'readonly';
        $this->UWD_HOLD_button = "disabled";
        $this->UWD_HOLD_text_area = " readonly style='background-color:powderblue;' ";
        $this->UWD_HOLD_checkbox = " disabled ";
        $this->UWD_HOLD_text_sum_ins = " readonly style='background-color:powderblue;' ";

    }

    public function setcoreval($user_id, $mkg_group, $pilihan, $menu, $full_dept, $butt_off_view)
    {
        $this->pilih = $pilihan;
        $this->user_id = $user_id;
        $this->mkg_group = $mkg_group;
        $this->full_dept = $full_dept;
        $this->menu = $menu;
        $this->butt_off_view = $butt_off_view;
    }

    public function header($menu)
    {
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        echo  "
        <div class='main d-flex flex-row justify-content-start align-items-stretch' style='height:100%; width:100%'>
              <!-- bagian side bar -->
              <div class='sides d-flex flex-column'></div>
              <div class='side side-res d-flex flex-column z-3 position-fixed h-100'>
                    <div class='exit-mark position-fixed' type='button'><i class='fa-solid fa-xmark'></i></div>
                    <div class='profil align-self-center d-flex align-items-center mt-4' style='height:50px'>
                          <span class='juduloy'>Anywhere Bike &nbsp;</span><i class='mama fa-solid fa-motorcycle'></i>
                    </div>
                    <hr class='mama line align-self-center'>
                          <form method='POST'>
                                <div class='list'>
                                      <button class='list-item ";if($menu == 'NEW'){echo 'selected';} echo"' name='menu_bikes' type='submit' value='NEW' ";if($menu == 'NEW'){echo 'disabled';} echo">
                                            <div class='side-icon'><i class='icon-ni fa-solid fa-circle-plus'></i></div>
                                            <span class='juduloy ps-2'>New</span>
                                      </button>
                                      <button class='list-item ";if($menu == 'DATA'){echo 'selected';} echo"' name='menu_bikes' form=tgl_to_list type='submit' value='DATA' ";if($menu == 'DATA'){echo 'disabled';} echo">
                                            <div class='side-icon'><i class='icon-ni fa-solid fa-database'></i></div>
                                            <span class='juduloy ps-2'>Data</span>
                                      </button>
                                      <button class='list-item ";if($menu == 'CLOUD'){echo 'selected';} echo"' name='menu_bikes' type='submit' value='CLOUD' ";if($menu == 'CLOUD'){echo 'disabled';} echo">
                                            <div class='side-icon'><i class='icon-ni fa-solid fa-cloud'></i></div>
                                            <span class='juduloy ps-2'>Cloud</span>
                                      </button>
                                      <input type='hidden'  name='web_menu' value='BS5_Menu_Any_Anyware_aerox'>
                                      <input type=hidden name=on_track              value='on_track'    >
                                      <input type=hidden name=user_id   id=user_id  value='$user_id'    >
                                      <input type=hidden name=mk_group              value='$mkg_group'  >
                                </div>
                          </form>
              </div>
              <!-- bagian menu -->
              <div class='side-main d-flex flex-fill flex-column'>
                    <!-- bagian top bar -->
                    <div class='top-head position-fixed d-flex flex-row-reverse align-items-center justify-content-between z-2' style='height:50px;'>
                          <form method=post action='index.php'>
                                <button class='head-icon d-flex flex-row justify-content-center align-items-center' type='submit' name=LogOut_data accesskey='O' value='LogOut'>
                                      <i class='fa-solid fa-arrow-right-from-bracket me-1'></i>
                                      <span>Log Out</span>
                                      <input type=hidden name=on_track              value='on_track'    >
                                      <input type=hidden name=user_id   id=user_id  value='$user_id'    >
                                      <input type=hidden name=mk_group              value='$mkg_group'  >
                                </button>
                          </form>
        
                          <img class='logo' src='https://www.rks-w.com/mks/entry/image/produk/raksa-lg.png' class='img-thumbnail'>
        
                          <div class='menura ps-4 d-none' type='button' style='width: 100px;'><i class='fa-solid fa-bars'></i> </div>
        
                          <div class='usera d-flex flex-row justify-content-center align-items-center' style='width: 100px;'>
                                <span>$user_id</span>
                                <i class='fa-solid fa-user ms-2 pb-1'></i>
                          </div>
                    </div>
                    <div class='shaman' style='height:50px'></div>
                    <!-- bagian menu -->
                    <form method='POST' enctype='multipart/form-data'>
                    <div class='d-flex flex-column'>
                    <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/header.js' ></script>
          ";
    }
    public function footer()
    {
        $user_id = $this->user_id;
        $mkg_group = $this->mkg_group;
        $token = $_SESSION['token'] ?? '';
        echo "  
        <input type=hidden name=token    value='$token'>
        </div>
        </form> 
        <div class='border border-1 w-100' style='height:50px'>footer face</div>
        </div>
        </div>
        <form method='POST' id=web_menu_yeah action='index.php'>
            <input type=hidden name=user_id   id=user_id  value='$user_id'    >
            <input type=hidden name=mk_group              value='$mkg_group'  >
        </form>
        <form method='POST' id='renew_partner' action=''>
            <input  type=hidden     name=user_id            value='$user_id'          >
            <input  type=hidden     name=mk_group           value='$mkg_group'        >
            <input  type=hidden     name=web_menu           value='renewal_30_day_ren_partner_2'>
        </form>
        <form method='post' id=back_to_menu action='index.php' target='_blank' >
            <input type='hidden'  name='web_menu'         value='BS5_Menu_Any_Anyware_aerox'>
            <input type=hidden name='menu_bikes'          value='NEW'    >
            <input type=hidden name=menu_key              value='rgtrgtrgtrgtrgtrgrtg'>
            <input type=hidden name=menu_type             value='MODEL'      >
            <input type=hidden name=user_id   id=user_id  value='$user_id'    >
            <input type=hidden name=mk_group              value='$mkg_group'  >
        </form>
        <form method='post' id=tgl_to_list action='index.php'>
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
            <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox' >
            <input type=hidden name='menu_bikes'  value='NEW'    >
            <input type=hidden name=menu_type     value='ACTION'      >
            <input type=hidden name=menu_key      value='dewaditinggalindewaditinggalin'>
            <input type=hidden name=token    value='$token'>
        </form>
        <form method='post' id=request_uwd action='index.php'>
            <input type=hidden name=user_id       value='$user_id'          >
            <input type=hidden name=mk_group      value='$mkg_group'        >
            <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox' >
            <input type=hidden name='menu_bikes'  value='DATA'    >
            <input type=hidden name=menu_type     value='ACTION'      >
            <input type=hidden name=menu_key      value='tidakherutidurtidakherutidur'>
            <input type=hidden name=token    value='$token'>
        </form>
        <form method='post' id=Perhit_simul_or_quotation target='_blank' >
            <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox'        >
            <input type=hidden name=menu_key      value='rianasurianasurianasurianasu'      >
            <input type=hidden name=menu_type     value='MODEL'                             >
            <input type=hidden name=user_id       value='$user_id'          >
            <input type=hidden name=mk_group      value='$mkg_group'        >
        </form>
        ";
        $data = $this->data;
        if(isset($data['data'][0])){
            $dat = $data['data'][0];
            $next_unit  = str_pad( $dat['jumlah_unit'] + 1 ,3, "0",STR_PAD_LEFT );
            echo "
            <form method='post' id=addon_unit action='index.php'>
                <input type=hidden name=user_id       value='$user_id'                      >
                <input type=hidden name=mk_group      value='$mkg_group'                    >
                <input type=hidden name=web_menu      value='BS5_Menu_Any_Anyware_aerox'    >
                <input type=hidden name=menu_key      value='rianbabirianbabirianbabi'      >
                <input type=hidden name=menu_type     value='MODEL'                         >
                <input type=hidden name='menu_bikes'  value='NEW'                           >
                <input type=hidden name='register_id' value='$dat[register_id]'             >
                <input type=hidden name='latersunit' value='$next_unit'                     >
            </form>
            ";
        }
    }

}

?>