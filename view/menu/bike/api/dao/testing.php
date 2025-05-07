<?php
function data_all($sqlbuilder , $id, $nama){

    $table_use_det = $_SESSION['table_use_det'];
    $sql = "
    SELECT
           m.rowid,
           m.oleh_buat, date_format(m.tgl_buat,'%d-%m-%Y %H:%i:%s') tgl_buat,m.tgl_buat tgl_buat_asli,
           m.oleh_update, date_format(m.tgl_update,'%d-%m-%Y %H:%i:%s') tgl_update,
           m.web_engine_class,
           m.wfh_id, m.wfh_group,m.wfh_id_ext,m.type_api,
           m.ref_person,m.uwd_status,

           m.short_rate_metode, m.short_rate_value, m.code_short_rate,
           m.register_id, m.register_id_old, m.quotation_no, m.no_kontrak,m.quotation_uwd_status,m.quotation_file_name,

           m.sob_code, m.corp_id,
           m.bus_code,m.email,
           m.admin_cost,m.wording_no,

           m.mkg_group, m.mkg_member, m.mkg_officer, m.nik, m.customer_name,
           m.nik_qq, m.qq, m.qq2,
           m.customer_add,m.ren_option,m.ren_insured_id,
           m.kelurahan, m.kecamatan, m.kabupaten, m.province,

           m.kode_post,m.mobile_phone,
           date_format(m.tgl_awal,'%d-%m-%Y') tgl_awal, date_format(m.tgl_akhir,'%d-%m-%Y') tgl_akhir,

           m.uwd_status_no,m.ex_polis_no,m.nik_pt_person,m.code_agent,
           m.reg_approval_web,m.reg_approval_web_02,m.reg_approval_web_03,m.reg_approval_web_04,

           m.fetch_company,m.fetch_company_loc,m.info_for_uwd_app,
           date_format(m.tgl_conf_spp,'%d-%m-%Y')tgl_conf_spp, m.bukti_conf_sppa,
           m.p_orig,m.p_copy,m.p_duplicate,m.konf_tertulis,m.note_uwd,m.note_uwd_oth,
           m.policy_status_aegis,

           m.qq_add,m.qq_mobile_phone,
           m.fetch_qq_loc,

           m.qq2_add,m.qq2_mobile_phone,m.nik_qq2,
           m.fetch_qq,m.fetch_qq2,m.qq_pt_person,m.qq2_pt_person,
           m.membership,m.membership_remark,m.note_raksa_partner,m.source_api,

           date_format(m.uwd_tgl_send,'%d-%m-%Y %H:%i:%s') uwd_tgl_send,
           date_format(m.uwd_tgl_done,'%d-%m-%Y %H:%i:%s') uwd_tgl_done,
           m.agent_no_request,m.agent_no_request agent_no_request_full,m.agent_code,m.agent_name,m.agent_sob_code,m.agent_sob_name,
           ( select max(x.unit_no) total_unit from polis_agent_direct_unit x where x.register_id = m.register_id )total_unit,
           ( select count(x.unit_no) total_unit from polis_agent_direct_unit x where x.register_id = m.register_id )jumlah_unit,
           m.ren_sob_code,
           m.oleh_uwd_approval,
           
           m.register_id,
           u.no_mesin, u.no_rangka, u.no_polisi,
           u.curr, u.sum_ins, u.tahun_cover,
			  u.wilayah_unit,
           u.disc_debit, u.disc_credit, u.tax, u.ph21, u.value_ph21,u.value_tax23,
           u.total_premi, u.total_auto_premi,
           u.add_equipment, u.non_standart, u.remark,
			  u.body_type_ojk,u.make, u.cate, u.model,
           u.subject_non_claim, u.stnk_beda_nama, u.nama_stnk_beda, u.or_ctl_tlo,
			  u.upload_api_code,
           u.per_tgg_01, u.rate_01, u.loading_01, u.rscc_01, u.teroris_01, u.flood_01, u.eq_01, u.bengkel_01, u.si_driver_01, u.derek_01, u.komersil_01, u.si_pass_01, u.qty_pass_01, u.tpl_01, u.deduc_01, u.Depre_01,u.stnk_01,
           u.per_tgg_02, u.rate_02, u.loading_02, u.rscc_02, u.teroris_02, u.flood_02, u.eq_02, u.bengkel_02, u.si_driver_02, u.derek_02, u.komersil_02, u.si_pass_02, u.qty_pass_02, u.tpl_02, u.deduc_02, u.Depre_02,u.stnk_02,
           u.per_tgg_03, u.rate_03, u.loading_03, u.rscc_03, u.teroris_03, u.flood_03, u.eq_03, u.bengkel_03, u.si_driver_03, u.derek_03, u.komersil_03, u.si_pass_03, u.qty_pass_03, u.tpl_03, u.deduc_03, u.Depre_03,u.stnk_03,
           u.per_tgg_04, u.rate_04, u.loading_04, u.rscc_04, u.teroris_04, u.flood_04, u.eq_04, u.bengkel_04, u.si_driver_04, u.derek_04, u.komersil_04, u.si_pass_04, u.qty_pass_04, u.tpl_04, u.deduc_04, u.Depre_04,u.stnk_04,
           u.per_tgg_05, u.rate_05, u.loading_05, u.rscc_05, u.teroris_05, u.flood_05, u.eq_05, u.bengkel_05, u.si_driver_05, u.derek_05, u.komersil_05, u.si_pass_05, u.qty_pass_05, u.tpl_05, u.deduc_05, u.Depre_05,u.stnk_05,
			  u.Policy_No,u.unit_no,u.jml_foto,u.warna,
           u.status_mobil, u.status_penggunaan,
           u.survey_no, u.survey_report, date_format(u.jam_survey,'%d-%m-%Y %H:%i:%s') jam_survey, u.tahun_buat
           from polis_agent_direct m left JOIN 
           (
		    SELECT *
			FROM 
            $table_use_det u
            WHERE u.register_id = '123'
            AND u.unit_no     = '1234'
            ) u ON m.register_id = u.register_id
            WHERE m.register_id = '1234'
    ";
    $data = $sqlbuilder->select('BIKE', $sql);
    if ($data['status'] == 400) {
        return $data;
    }
return $data;
}