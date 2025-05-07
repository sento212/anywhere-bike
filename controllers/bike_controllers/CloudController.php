<?php
class CloudController extends Main_controller{
    public function __construct($user_id, $mkg_group, $pilihan, $menu,$full_dept,$butt_off_view,$hasilModel,$hasilAction){
        $CloudView = new CloudView();
        $CloudView->setcoreval($user_id, $mkg_group, $pilihan, $menu,$full_dept,$butt_off_view);
        $CloudView->header($menu);
        $CloudView->main($pilihan);
        $CloudView->footer();
    }
}
