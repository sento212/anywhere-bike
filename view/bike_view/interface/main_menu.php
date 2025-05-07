<?php
namespace main_menu;
function tampilan($tampilan, $user_id, $mkg_group){
echo "
<div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
    <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
        <div class='card-body'>
            <h4 class='card-title mb-3'> Main Menu</h4>
            
                <select class='form-select' name='web_menu' form=web_menu_yeah onchange='this.form.submit();'>
                    <option value=''                         "; if ( ''                         == $tampilan) { echo " selected ";} echo ">Pilih Salah Satu
                    <option value='BS5_Menu_Any_Print_cargo' "; if ( 'BS5_Menu_Any_Print_cargo' == $tampilan) { echo " selected ";} echo ">Print Cargo AnyWhere
                    <option value='BS5_Menu_Any_Anyware_aerox' "; if ( 'BS5_Menu_Any_Anyware_aerox' == $tampilan) { echo " selected ";} echo ">Anywhere Bike
                </select>
                <button type=submit class='btn btn-success mt-2'  name=pilih_menu form=web_menu_yeah  accesskey='S' value='PROCESS' data-mdb-ripple-init> <i class='fa fa-cog fa-spin fa-lg fa-fw'></i><u><b>S</b></u>tart..</button>

        </div>
    </div>
</div>
";
}
?>
