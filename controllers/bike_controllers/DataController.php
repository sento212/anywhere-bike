<?php
class DataController extends UserController
{
    public function __construct($user_id, $mkg_group, $pilihan, $menu, $full_dept, $butt_off_view, $hasilModel, $hasilAction)
    {
        $DataView = new DataView();
        $DataView->setcoreval($user_id, $mkg_group, $pilihan, $menu, $full_dept, $butt_off_view);

        $stat_uwd_stat = $_POST['stat_uwd_stat'] ?? '';
        $list_mkg_nya = $_POST['list_mkg_nya'] ?? '';
        $list_Q_P = $_POST['list_Q_P'] ?? '';
        $show_data_list = $_POST['show_data_list'] ?? '';
        $cari_tgl_awal = $_POST['cari_tgl_awal'] ?? '';
        $cari_tgl_khir = $_POST['cari_tgl_khir'] ?? '';
        $DataView->list_quotation = $hasilModel['data']['data_search'] ?? '';
        $DataView->header($menu);
        $DataView->main($pilihan);
        
        $DataView->search_quotation2($list_Q_P, $stat_uwd_stat, $cari_tgl_awal, $cari_tgl_khir, $list_mkg_nya, $hasilModel['data']['mkg_member']);
        $DataView->list_quotation($list_Q_P);
        $DataView->footer();
    }
}
