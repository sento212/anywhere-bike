<?php
class Login_tampilan extends Main_view
{

    public function login_tampilan($versi_anywhere, $user_id, $pass_id, $nilaiCaptcha, $mk_group, $mkg_list, $hasil)
    {
        if (isset($hasil['status']))
        {
            if ($hasil['status'] == 400)
            {
                $this->pesan_pop_up('Gagal', "$hasil[message]", 'error');
            }
        }
        echo "
        <form method=post action='index.php'>
        <body style='background-color: #fbd305;'>
        <div class='container' style='height: 100vh;'>
        <div class='row h-100 justify-content-center align-items-center'>
            <div class='card text-bg-light shadow-lg' style='width: 35rem;'>
                <div class='card-body'>
                    <div class='text-center mb-3'>
                        <img class='card-img-top' src='https://www.rks-m.com/mks/entry/settings/image/produk/raksa-lg.png' style='height: 40px; width: 40px' alt='gambar'>
                        <h4 class='card-title'>Login AnyWhere</h4>
                        <i class='fa-solid fa-code-branch' style='font-size: 10px;'> $versi_anywhere</i>
                    </div>
                    <div class='row g-2 align-items-center'>
                        <div class='col-sm-3'>
                            MkGroup
                        </div>
                        <div class='col-sm-9'>
                            <select class='form-select' name='mk_group' aria-label='Default select example'>
                            <option value='x'>";

        foreach ($mkg_list['data'] as $list_dept)
        {
            // INITIATE
            $selected_or_not = "";
            if ($mk_group == $list_dept['cabang'])
            {
                $selected_or_not = "selected";
            }
            $tmp_label = "<option value='$list_dept[cabang]' $selected_or_not>$list_dept[cabang_label]</option>";
            echo $tmp_label;
        }
        echo "
                            </select>
                        </div>
                        <div class='col-sm-3'>
                            User ID
                        </div>
                        <div class='col-sm-9'>
                            <input type='text' name=user_id value='$user_id' class='form-control'>
                        </div>
                        <div class='col-sm-3'>
                            Password
                        </div>
                        <div class='col-sm-9'>
                            <div class='row-ms-12'>
                                <input type='password' name='pass_id' value='$pass_id' id='my_mata' class='form-control'>
                                <div class='form-check'>
                                    <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' onclick='myFunction()'>
                                    <label class='form-check-label' for='flexCheckDefault'>
                                        Show Passwords
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            Captcha
                        </div>
                        <div class='col-sm-9'>
                            <img src='https://www.rks-m.com/mks/entry/settings/captcha_image_3_digit.php' alt='gambar'>
                        </div>
                        <div class='col-sm-3'>
                            Enter Captcha
                        </div>
                        <div class='col-sm-9'>
                            <input type='text' name='nilaiCaptcha' class='form-control w-25' maxlength='4'>
                        </div>
                        <div class='col-sm-12 text-center'>
                            <button type='submit'  name=catet_ip value='LOGIN' accesskey='L' class='btn btn-success w-50 mt-3' data-mdb-ripple-init>Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
        ";
    }


}
