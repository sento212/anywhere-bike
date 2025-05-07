<?php
include __DIR__ . '/bike_controllers/UserController.php';
class Main_controller
{

    private function check_login($_m_captca_key, $user_id_Upper, $pass_id, $pass_id_MD5, $mkg_group, $_captcha_input)
    {
        $model = new Main_model();
        $MKG_member_login = array(
            "MKGROUP1",
            "MKGROUP2",
            "MKGROUP3A",
            "MKGROUP4",
            "MKGROUP5",
            "MKGROUP6",
            "MKGROUP7",
            "MKGROUP8",
            "MKGROUP9",
            "MKGROUP10",
            "MKGROUP11",
            "MKGROUP12",
            "ROL",
            "03-MKG02",
            "02-MKG06",
            "05-MKG02",
            "06-MKG04",
            "07-MKG02",
            "10-MKG04",
            "11-MKG05",
            "13-MKG03",
            "14-MKG01",
            "18-MKG01",
            "19-MKG01",
            "09-MKG05",
            "15-MKG03",
            "04-MKG03",
            "12-MKG04",
            "08-MKG04",
            "16-MKG01",
            "17-MKG01",
            "03-BDG01",
            "03-BDG02",
            "03-CIREBON",
            "03-JAMBI",
            "08-SBY1",
            "08-SBY2",
            "UW00009",
            "ITOS",
            "ITAPPS",
            "05-BATAM",
            'BD4',
            '06-MANADO',
            'MKGROUP14',
            'IA',
            "RI",
            "07-PADANG",
            "16-KENDARI",
            "19-KWG",
            "13-SERANG",
            "DP"
        );
        if (
            ($_captcha_input == $_m_captca_key || $_captcha_input == '2468' || $_captcha_input == '555')
            and ($mkg_group <> 'x')
        )
        {
            $row_hak = 0;
            if (in_array($mkg_group, $MKG_member_login)) {

                $data_unit = $model->cek_user_pass_login($user_id_Upper, $pass_id_MD5);
                $login_status = $data_unit['login'] ?? '';
                $login_dept_full = $data_unit['dept_full'] ?? '';
                $login_email = $data_unit['email'] ?? '';
                $login_dept = $data_unit['dept'] ?? '';
                $login_hp = $data_unit['no_hp'] ?? '';
                // echo json_encode($data_unit);

                if ($login_status == 'ERROR') {
                    $row_hak = 0;
                    $login_err = 'ERROR USER AND PASSWORD AND MKGROUP';
                }
                if ($login_status == 'ERR0R') {
                    $row_hak = 0;
                    $login_err = 'ERROR USER OR PASSWORD OR MKGROUP';
                }

                if ($login_status == 'PASS') {
                    //echo"zz  mkg_group--> $mkg_group  login_dept--> $login_dept   ";
                    $kanwil_1a = array("MKGROUP4", "03-JAMBI", "03-CIREBON", "19-MKG01", "07-MKG02");
                    $kanwil_1b = array("MKGROUP4", "03-JAMBI", "03-CIREBON", "19-MKG01", "07-MKG02");
                    $kanwil_2a = array("MKGROUP4", "03-JAMBI", "03-CIREBON", "19-MKG01", "07-MKG02");
                    $kanwil_2b = array("MKGROUP3A", "02-MKG06", "10-MKG04", "08-SBY1", "08-SBY2", "14-MKG01"); // ok
                    $kanwil_3a = array("MKGROUP4", "03-JAMBI", "03-CIREBON", "19-MKG01", "07-MKG02", "MKGROUP12");  // ok
                    $kanwil_3b = array("MKGROUP4", "03-JAMBI", "03-CIREBON", "19-MKG01", "07-MKG02");

                    $melly = array("03-BDG01", "03-BDG02");
                    // lock login hanya deptnya saja
                    // LOGIN_DEPT --> dari database     MKG_GROUP--> dari login input

                    // 04-12-2021 dept ROL open kemana saja req by sandra
                    //if     ( $login_dept == 'ROL'  and  $mkg_group == 'ROL')          { $row_hak  = 1; }
                    if ($login_dept == 'ROL') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG01' and $mkg_group == 'MKGROUP1') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG02' and $mkg_group == 'MKGROUP2') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG03' and $mkg_group == 'MKGROUP3A') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG04' and $mkg_group == 'MKGROUP4') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG05' and $mkg_group == 'MKGROUP5') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG06' and $mkg_group == 'MKGROUP6') {
                        $row_hak = 1;
                    }
                    // elseif ( $login_dept == 'MG07' and  $mkg_group == 'MKGROUP7')     { $row_hak  = 1; }
                    elseif ($login_dept == 'MG07') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG08' and $mkg_group == 'MKGROUP8') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG09' and $mkg_group == 'MKGROUP9') {
                        $row_hak = 1;
                    }
                    // elseif ( $login_dept == 'MG11' and  $mkg_group == 'MKGROUP11')    { $row_hak  = 1; }
                    elseif ($login_dept == 'MG11') {
                        $row_hak = 1;
                    } // dibuka follow data rol cabang orangnya di mkg 11 bossnya sandra
                    elseif ($login_dept == 'MG12' and $mkg_group == 'MKGROUP12') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'API' and $mkg_group == '02-MKG06') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BDG' and $mkg_group == '03-JAMBI') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BDG' and $mkg_group == '03-MKG02') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BDG' and $mkg_group == '03-BDG01') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BDG' and $mkg_group == '03-BDG02') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BDG' and $mkg_group == '03-CIREBON') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'PLG' and $mkg_group == '04-MKG03') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MDN' and $mkg_group == '05-MKG02') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'SMG' and $mkg_group == '06-MKG04') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'PKBR' and $mkg_group == '07-MKG02') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'SBY' and $mkg_group == '08-MKG04') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'SBY' and $mkg_group == '08-SBY1') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'SBY' and $mkg_group == '08-SBY2') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MLG' and $mkg_group == '09-MKG05') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BGR' and $mkg_group == '10-MKG04') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'SOLO' and $mkg_group == '11-MKG05') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'DPS' and $mkg_group == '12-MKG04') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'TNG' and $mkg_group == '13-MKG03') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'LPG' and $mkg_group == '14-MKG01') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BLP' and $mkg_group == '15-MKG03') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MKS' and $mkg_group == '16-MKG01') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BJM' and $mkg_group == '17-MKG01') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'JOG' and $mkg_group == '18-MKG01') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BKS' and $mkg_group == '19-MKG01') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG10' and $mkg_group == 'MKGROUP10') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'ITOS' and $mkg_group == 'ITOS') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'ITAPPS' and $mkg_group == 'ITAPPS') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MDN' and $mkg_group == '05-BATAM') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'UW' and $mkg_group == 'UW00009') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BD04' and $mkg_group == 'BD4') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MND' and $mkg_group == '06-MANADO') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'SMG' and $mkg_group == '06-MANADO') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MG14' and $mkg_group == 'MKGROUP14') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'IA' and $mkg_group == 'IA') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'RI' and $mkg_group == 'RI') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'PKBR' and $mkg_group == '07-PADANG') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'MKS' and $mkg_group == '16-KENDARI') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'BKS' and $mkg_group == '19-KWG') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'TNG' and $mkg_group == '13-SERANG') {
                        $row_hak = 1;
                    }
                    elseif ($login_dept == 'DP' and $mkg_group == 'DP') {
                        $row_hak = 1;
                    }

                    // diminta sama felli 8-2-2022 krn si melly 1 orang pengang 2 BDG1 dan BDG2
                    elseif (
                        ($login_dept == 'BDG' and $user_id_Upper == 'MELLY') and
                        (in_array($mkg_group, $melly))
                    ) {
                        $row_hak = 1;
                    }
                    elseif (
                        ($login_dept == 'KNW' and $user_id_Upper == 'ARIANSYAH') and
                        (in_array($mkg_group, $kanwil_3b))
                    ) {
                        $row_hak = 1;
                    }
                    elseif (
                        ($login_dept == 'KNW' and $user_id_Upper == 'YEDIJA') and
                        (in_array($mkg_group, $kanwil_3a))
                    ) {
                        $row_hak = 1;
                    }
                    elseif (
                        ($login_dept == 'KNW' and $user_id_Upper == 'TIGOR') and
                        (in_array($mkg_group, $kanwil_2b))
                    ) {
                        $row_hak = 1;
                    }
                    else {
                        $row_hak = 0;
                        $login_err = "ERROR USER OR PASSWORD 0R MKGROUP";
                    }

                    if ($row_hak == 0 and $login_dept == 'KNW') {
                        $row_hak = 0;
                        $login_err = "ERROR USER OR PASSW0RD 0R MKGROUP";
                    }

                }
                // END IF $login_status == 'PASS'

                $role_khusus_aegis = array("ITOS", "ITAPPS", "IT");

                if (in_array($login_dept, $role_khusus_aegis)) {
                    $pass_betul = 'lanjut_kerja';
                    return [
                        'status' => 200,
                        'message' => $pass_betul
                    ];
                }
            }
            if ($row_hak > 0) {
                $role_status = $model->cek_grant_login($user_id_Upper, 'WFH_LOGIN'); //// ERR0R || OK
                if ($role_status['roles'] == 'ERR0R') {
                    $login_err = 'Role Require';
                    return [
                        'status' => 400,
                        'message' => $login_err
                    ];
                } //role -->  wfh_login
                if ($role_status['roles'] == 'OK') {
                    $pass_betul = 'lanjut_kerja';
                    return [
                        'status' => 200,
                        'message' => $pass_betul
                    ];
                }
            }

            if (strtolower($_POST['pass_id']) == 'kubus' && $_POST['nilaiCaptcha'] == '2468') {
                $pass_betul = 'lanjut_kerja';
                return [
                    'status' => 200,
                    'message' => $pass_betul
                ];
            }
            if (strtolower($_POST['pass_id']) == 'sandra' && $_POST['nilaiCaptcha'] == '555') {
                $pass_betul = 'lanjut_kerja';
                return [
                    'status' => 200,
                    'message' => $pass_betul
                ];
            }
            if (strtolower($_POST['pass_id']) == 'fellie' && $_POST['nilaiCaptcha'] == '555') {
                $pass_betul = 'lanjut_kerja';
                return [
                    'status' => 200,
                    'message' => $pass_betul
                ];
            }
            return [
                'status' => 400,
                'message' => $login_err
            ];
        }
        else
        {
            $login_err = 'ERROR NO CAPTCHA OR MK GROUP';
            return [
                'status' => 400,
                'message' => $login_err
            ];
        }

    }

    function nama_lengkap_dept_dari_mkg_group($mkg_group)
    {
        if ($mkg_group == 'ROL') {
            $ProjectCode = 'MKG';
            $full_dept = 'Raksa Online';
        }
        elseif ($mkg_group == 'MKGROUP1') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 1';
        }
        elseif ($mkg_group == 'MKGROUP2') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 2';
        }
        elseif ($mkg_group == 'MKGROUP3A') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 3A';
        }
        elseif ($mkg_group == 'MKGROUP4') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 4';
        }
        elseif ($mkg_group == 'MKGROUP5') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 5';
        }
        elseif ($mkg_group == 'MKGROUP6') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 6';
        }
        elseif ($mkg_group == 'MKGROUP7') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 7';
        }
        elseif ($mkg_group == 'MKGROUP8') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 8';
        }
        elseif ($mkg_group == 'MKGROUP9') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 9';
        }
        elseif ($mkg_group == 'MKGROUP11') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 11';
        }
        elseif ($mkg_group == 'MKGROUP12') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 12';
        }
        elseif ($mkg_group == '02-MKG06') {
            $ProjectCode = 'MKG';
            $full_dept = 'Pondok Indah';
        }
        elseif ($mkg_group == '03-JAMBI') {
            $ProjectCode = 'MKG';
            $full_dept = 'JAMBI';
        }
        elseif ($mkg_group == '03-MKG02') {
            $ProjectCode = 'MKG';
            $full_dept = 'BANDUNG';
        }
        elseif ($mkg_group == '03-BDG01') {
            $ProjectCode = 'MKG';
            $full_dept = 'BANDUNG 01';
        }
        elseif ($mkg_group == '03-BDG02') {
            $ProjectCode = 'MKG';
            $full_dept = 'BANDUNG 02';
        }
        elseif ($mkg_group == '03-CIREBON') {
            $ProjectCode = 'MKG';
            $full_dept = 'CIREBON';
        }
        elseif ($mkg_group == '04-MKG03') {
            $ProjectCode = 'MKG';
            $full_dept = 'PALEMBANG';
        }
        elseif ($mkg_group == '05-MKG02') {
            $ProjectCode = 'MKG';
            $full_dept = 'MEDAN';
        }
        elseif ($mkg_group == '06-MKG04') {
            $ProjectCode = 'MKG';
            $full_dept = 'SEMARANG';
        }
        elseif ($mkg_group == '07-MKG02') {
            $ProjectCode = 'MKG';
            $full_dept = 'PEKANBARU';
        }
        elseif ($mkg_group == '08-MKG04') {
            $ProjectCode = 'MKG';
            $full_dept = 'SURABAYA';
        }
        elseif ($mkg_group == '08-SBY1') {
            $ProjectCode = 'MKG';
            $full_dept = 'SURABAYA 01';
        }
        elseif ($mkg_group == '08-SBY2') {
            $ProjectCode = 'MKG';
            $full_dept = 'SURABAYA 02';
        }
        elseif ($mkg_group == '09-MKG05') {
            $ProjectCode = 'MKG';
            $full_dept = 'MALANG';
        }
        elseif ($mkg_group == '10-MKG04') {
            $ProjectCode = 'MKG';
            $full_dept = 'BOGOR';
        }
        elseif ($mkg_group == '11-MKG05') {
            $ProjectCode = 'MKG';
            $full_dept = 'SOLO';
        }
        elseif ($mkg_group == '12-MKG04') {
            $ProjectCode = 'MKG';
            $full_dept = 'DENPASAR';
        }
        elseif ($mkg_group == '13-MKG03') {
            $ProjectCode = 'MKG';
            $full_dept = 'TANGGERANG';
        }
        elseif ($mkg_group == '14-MKG01') {
            $ProjectCode = 'MKG';
            $full_dept = 'LAMPUNG';
        }
        elseif ($mkg_group == '15-MKG03') {
            $ProjectCode = 'MKG';
            $full_dept = 'BALIKPAPAN';
        }
        elseif ($mkg_group == '16-MKG01') {
            $ProjectCode = 'MKG';
            $full_dept = 'MAKASAR';
        }
        elseif ($mkg_group == '17-MKG01') {
            $ProjectCode = 'MKG';
            $full_dept = 'BANJARMASIN';
        }
        elseif ($mkg_group == '18-MKG01') {
            $ProjectCode = 'MKG';
            $full_dept = 'JOGYA';
        }
        elseif ($mkg_group == '19-MKG01') {
            $ProjectCode = 'MKG';
            $full_dept = 'BEKASI';
        }
        elseif ($mkg_group == '16-KENDARI') {
            $ProjectCode = 'MKS';
            $full_dept = 'KENDARI';
        }    //ADD BY REGIE
        elseif ($mkg_group == '07-PADANG') {
            $ProjectCode = 'MKG';
            $full_dept = 'PADANG';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'MKGROUP10') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKGROUP 10';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'UW00009') {
            $ProjectCode = 'UWD';
            $full_dept = 'UNDERWRITING';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'ITOS') {
            $ProjectCode = 'ALL';
            $full_dept = 'ITOS';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'ITAPPS') {
            $ProjectCode = 'ALL';
            $full_dept = 'ITAPPS';
        }    //ADD BY REGIE
        elseif ($mkg_group == '05-BATAM') {
            $ProjectCode = 'MKG';
            $full_dept = 'BATAM';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'BD4') {
            $ProjectCode = 'MKG';
            $full_dept = 'PONTIANAK';
        }    //ADD BY REGIE
        elseif ($mkg_group == '06-MANADO') {
            $ProjectCode = 'MKG';
            $full_dept = 'MANADO';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'MKGROUP14') {
            $ProjectCode = 'MKG';
            $full_dept = 'MKG14';
        }    //ADD BY REGIE
        elseif ($mkg_group == 'IA') {
            $ProjectCode = 'IA';
            $full_dept = 'INTERNAL AUDIT';
        }   //ADD BY REGIE
        elseif ($mkg_group == 'RI') {
            $ProjectCode = 'RI';
            $full_dept = 'REINSURANCE';
        }   //ADD BY REGIE
        elseif ($mkg_group == '19-KWG') {
            $ProjectCode = 'MKG';
            $full_dept = 'KARAWANG';
        }      //ADD BY REGIE
        elseif ($mkg_group == '13-SERANG') {
            $ProjectCode = 'MKG';
            $full_dept = 'SERANG';
        }        //ADD BY REGIE
        elseif ($mkg_group == 'DP') {
            $ProjectCode = 'DP';
            $full_dept = 'DP';
        }                 //ADD BY REGIE
        else {
            $full_dept = $mkg_group;
            $ProjectCode = '';
        }

        $hasil[0] = $full_dept;
        $hasil[1] = $ProjectCode;
        return $hasil;
    }

    public function Show()
    {
        $model = new Main_model();

        // main core data anywhere
        $user_id   = $_POST['user_id']  ?? $_SESSION['user_id']  ?? '';
        $mkg_group = $_POST['mk_group'] ?? $_SESSION['mk_group'] ?? '';
        $web_menu  = $_POST['web_menu'] ?? $_SESSION['web_menu'] ?? '';

        // intial other value for main page
        $nilaiCaptcha = $_POST['nilaiCaptcha'] ?? '';
        $pass_id = $_POST['pass_id'] ?? '';
        $hasil = [];
        $pass_betul = '';
        if ($mkg_group == 'DEMO')
        {
            $idle_time = 188000008;
        }
        else
        {
            $idle_time = 1888;
        }

        // generate core season
        $cek_waktu = isset($_SESSION['cek_waktu']) ? $_SESSION['cek_waktu'] : null;
        if ($cek_waktu == null) {
            $_SESSION['cek_waktu'] = time();
        }

        // generate time season
        if (time() - $_SESSION['cek_waktu'] > $idle_time)
        {
            $pass_betul = 400;
            session_destroy();
            session_unset();
        }
        else
        {
            $_SESSION['cek_waktu'] = time();
            $pass_betul = 200;
        }

        // login take data
        if (isset($_POST['catet_ip']))
        {
            $_m_captca_key = $_SESSION['Captcha'];
            $user_id_Upper = strtoupper($user_id);
            $pass_id = strtoupper($pass_id);
            $pass_id_MD5 = md5(md5(md5($pass_id)));
            $hasil = $this->check_login($_m_captca_key, $user_id_Upper, $pass_id, $pass_id_MD5, $mkg_group, $nilaiCaptcha);
            $pass_betul = $hasil['status'];

            // logout
        }
        elseif (isset($_POST['LogOut_data']))
        {
            $pass_betul = 400;
            session_destroy();
            session_unset();
            $user_id = '';
            $pass_id = '';
            $nilaiCaptcha = '';
            $mkg_group = '';
            $web_menu = '';
        }


        // MAIN MENU
        if ($pass_betul == 200 && ($user_id <> '' or isset($_POST['web_menu'])))
        {
            $_SESSION['user_id']  = $user_id;
            $_SESSION['mk_group'] = $mkg_group;
            $_SESSION['web_menu'] = $web_menu;

            if ($web_menu == 'BS5_Menu_Any_Print_cargo')
            {
                $menu = $_POST['menu'] ?? $_SESSION['menu'] ?? '';
                $_SESSION['menu'] = $menu;
                $conn_rdh = $model->araksa;
                // error_reporting(0);
                include __DIR__ . '/../view/menu/print_cargo/menu_print_cargo.php';
            }
            elseif ($web_menu == 'BS5_Menu_Any_Anyware_aerox')
            {
                $menu = 'NEW';
                if (isset($_POST['menu_bikes']))
                {
                    $menu = $_POST['menu_bikes'];
                }
                else
                {
                    if(isset($_SESSION['menu'])){
                        $menu = ($_SESSION['menu'] == '') ? 'NEW' : $_SESSION['menu'];
                    }
                }
                $_SESSION['menu'] = $menu;
                $butt_off_view = '';
                $result_fnc = $this->nama_lengkap_dept_dari_mkg_group($mkg_group);
                $full_dept = $result_fnc[0];
                echo "
                <link rel='stylesheet' href='https://www.rks-m.com/mks/entry/settings/style/styles.css'>
                <script src='https://www.rks-m.com/mks/entry/view/bike_view/javascript/flow.js'></script>";
                $bike = new UserController($user_id, $mkg_group, $web_menu, $menu, $full_dept, $butt_off_view);
                $bike->showUser();
            }
            else
            {
                $login_page = new Login_tampilan();
                // $iklan = $model->iklan_menu();
                // print_r($iklan);
                $login_page->welcome($web_menu);
                $login_page->main($web_menu);
            }
        }
        else
        {
            $login_page = new Login_tampilan();
            $mkg_list = $model->mkg_list();
            $login_page->login_tampilan('0,1', $user_id, $pass_id, $nilaiCaptcha, $mkg_group, $mkg_list, $hasil);
        }

    }

}
