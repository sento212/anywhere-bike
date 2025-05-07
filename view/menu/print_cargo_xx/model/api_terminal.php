<?php

    //https://www.araksa.com/mks/entry/print_cargo/model/api_terminal.php

    // $polis_single = '01-C-00417-000-05-2023';
    // $polis_multi  = '01-C-00548-000-07-2023';


    $no_polis = $_POST['no_polis'];
    $no_polis = '01-C-00548-000-07-2023';
        $data_api_unit = array(
            "input_policy_no" => $no_polis
        );
    $web_url = curl_init('https://raksa-service.com/mks_work_to_b/index.php/ch_api_policy_mst/policy_cargo_unit');
    curl_setopt($web_url, CURLOPT_CUSTOMREQUEST , "POST");
    curl_setopt($web_url, CURLOPT_POSTFIELDS    , $data_api_unit);
    curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
    
    $result_unit  = curl_exec($web_url);
    $info_unit    = curl_getinfo($web_url);
    curl_close($web_url);
    
    $data_unit  = json_decode($result_unit, true);

    //echo "<pre>"; print_r($data_unit); echo"</pre>";
    $x1 = 0;
    foreach ($data_unit['code'] as $cargo_pol)
    {
        $polis_unit     = $cargo_pol['POLICY_UNIT_NO'];
        $cov_desc       = $cargo_pol['COVERAGE_DESCRIPTION'];
        $car_voyage     = $cargo_pol['CARGO_VOYAGE'];
        $car_conveyage  = $cargo_pol['CARGO_CONVEYANCE'];
        $car_remarks    = $cargo_pol['REMARKS'];
        $estimasi       = $cargo_pol['CARGO_SAIL_DATE'];
        $no_bl          = $cargo_pol['CARGO_BILL_OF_LADING_NO'];
        $currency_code  = $cargo_pol['CURRENCY_CODE'];
        $sum_ins        = $cargo_pol['SUM_INSURED'];
        $currency_name  = $cargo_pol['CURRENCY_NAME'];
        $vessel         = $cargo_pol['VESSEL_NAME'];
        $cov_desc       = $cargo_pol['COVERAGE_DESCRIPTION'];
        $vessel_class   = $cargo_pol['VESSEL_CLASS'];
        $remarkss       = $cargo_pol['REMARKS'];
        $vessel_year    = $cargo_pol['VESSEL_YEAR'];
        $vessel_grt     = $cargo_pol['VESSEL_GRT'];
        $vessel_const   = $cargo_pol['VESSEL_CONSTRUCTION'];

        $isi_obj_cargo[$x1] = array(
            "estimasi"      => $estimasi,
            "vessel"        => $vessel,
            "car_conveyage" => $car_conveyage,
            "car_voyage"    => $car_voyage,
            "cov_desc"      => $cov_desc,
            "sum_ins"       => $sum_ins,
            "remarkss"      => $remarkss,
            "vessel_year"   => $vessel_year,
            "vessel_grt"    => $vessel_grt,
            "vessel_class"  => $vessel_class,
            "vessel_const"  => $vessel_const,
            "vessel_class"  => $vessel_class
        );
        $x1++;
    }
    $tot_isi_obj_cargo = count($isi_obj_cargo);

    if($tot_isi_obj_cargo == 1)
    {
        // echo "single";

        $polis_single = '01-C-00417-000-05-2023';
        $nota_single  = array('01-PO-D0003409-05-2023');
        include "../API_cargo.php";
        include "../pdf_single_cargo.php";
    }
    else if($tot_isi_obj_cargo > 1)
    {
        // echo "multi";

        $polis_multi  = '01-C-00548-000-07-2023';
        $nota_multi   = array('01-PO-D0003367-07-2023');
        include "../API_cargo.php";
        include "../pdf_multi_cargo.php";
    }
    else
    {
        echo "err";
    }
    // echo json_encode($data_unit);
?>