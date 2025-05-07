<?php
namespace header;

function tampilan($user_id, $mkg_group, $menu){

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
                  <script src='https://www.rks-m.com/mks/entry/bike/bike_view/javascript/header.js' ></script>
        ";

        
}
?>


<!-- <div class='list-item selected' type='button'>
                              <div class='side-icon'><i class='icon-ni fa-solid fa-house'></i></div>
                              <span class='juduloy ps-2'>Home</span>
                        </div> -->
