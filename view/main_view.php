<?php
require_once __DIR__ . '/login_tampilan.php';
require_once __DIR__ . '/bike_view/UserView.php';
require_once __DIR__ . '/bike_view/DataView.php';
require_once __DIR__ . '/bike_view/CloudView.php';
require_once __DIR__ . '/bike_view/NewView.php';

class Main_view
{
    public function pesan_pop_up($text_01, $text_02, $text_03)
    {
        echo "
        <script>
            Swal.fire(
              '$text_01',
              '$text_02',
              '$text_03'
            );
        </script>";
    }

    public function pesan_pop_up_close($text_01, $text_02, $text_03)
    {
        echo "
        <script>
            Swal.fire({
              title: '$text_01',
              text: '$text_02',
              icon: '$text_03',
              confirmButtonText: 'Exit',
              allowOutsideClick: false
            }).then((result) => {
              if (result.isConfirmed) {
                window.close();
              }
            });
        </script>";
    }

    protected function clock()
    {
        $css = "
        <style>
            body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #D9D7DD;
            }

            .clock {
            border-radius: 100%;
            background: #ffffff;
            font-family: 'Montserrat';
            border: 5px solid white;
            box-shadow: inset 2px 3px 8px 0 rgba(0, 0, 0, 0.1);
            }

            .wrap {
            overflow: hidden;
            position: relative;
            width: 350px;
            height: 350px;
            border-radius: 100%;
            }

            .minute,
            .hour {
            position: absolute;
            height: 100px;
            width: 6px;
            margin: auto;
            top: -27%;
            left: 0;
            bottom: 0;
            right: 0;
            background: black;
            transform-origin: bottom center;
            transform: rotate(0deg);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.4);
            z-index: 1;
            }

            .minute {
            position: absolute;
            height: 130px;
            width: 4px;
            top: -38%;
            left: 0;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.4);
            transform: rotate(90deg);
            }

            .second {
            position: absolute;
            height: 90px;
            width: 2px;
            margin: auto;
            top: -26%;
            left: 0;
            bottom: 0;
            right: 0;
            border-radius: 4px;
            background: #FF4B3E;
            transform-origin: bottom center;
            transform: rotate(180deg);
            z-index: 1;
            }

            .dot {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 12px;
            height: 12px;
            border-radius: 100px;
            background: white;
            border: 2px solid #1b1b1b;
            border-radius: 100px;
            margin: auto;
            z-index: 1;
            }
        </style>
        ";

        $js = <<<JS
        <script>
            var inc = 1000;

            clock();

            function clock() {
            const date = new Date();

            const hours = ((date.getHours() + 11) % 12 + 1);
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();

            const hour = hours * 30;
            const minute = minutes * 6;
            const second = seconds * 6;

            document.querySelector('.hour').style.transform = "rotate("+hour+"deg)"
            document.querySelector('.minute').style.transform = "rotate("+minute+"deg)"
            document.querySelector('.second').style.transform = "rotate("+second+"deg)"
            }

            setInterval(clock, inc);
        </script>
        JS;
        return "
        $css
        <div class='clock'>
            <div class='wrap'>
                <span class='hour'></span>
                <span class='minute'></span>
                <span class='second'></span>
                <span class='dot'></span>
            </div>
        </div>
        $js";

    }

    protected function format_year($originalDate)
    {
        $newDateFormat = '';
        if ($originalDate != null) {
            $newDateFormat = date("Y-m-d", strtotime($originalDate));
        } else {
            $originalDate = $newDateFormat;
        }
        return $newDateFormat;
    }

    public function portal($web_menu)
    {


        echo "
        <body style='background-color: #fbd305;'>
        <div class='container'>
        <form method=post action='index.php'>
            <div class='row h-100 justify-content-center'>
                <div class='card text-bg-light shadow-lg' >
                    <div class='card-body'>
                        <div class='row g-2 align-items-center'>
                            <div class='col-sm-12 text-center position-relative'>
                                <h2>Welcome to Anywhere</h2>
                            </div>
                            <div class='col-sm-2'>
                                Pilih Menu
                            </div>
                            <div class='col-sm-10'>
                        <select class='form-select' name='web_menu' onchange='this.form.submit();'>
                    <option value=''                         ";
        if ('' == $web_menu) {
            echo " selected ";
        }
        echo ">Pilih Salah Satu
                    <option value='BS5_Menu_Any_Print_cargo' ";
        if ('BS5_Menu_Any_Print_cargo' == $web_menu) {
            echo " selected ";
        }
        echo ">Print Cargo AnyWhere
                    <option value='BS5_Menu_Any_Anyware_aerox' ";
        if ('BS5_Menu_Any_Anyware_aerox' == $web_menu) {
            echo " selected ";
        }
        echo ">Anywhere Bike
                </select>
                <button type=submit class='btn btn-success mt-2'  name=pilih_menu  value='PROCESS' data-mdb-ripple-init> <i class='fa fa-cog fa-spin fa-lg fa-fw'></i>Start</button>
                <button type='submit' name='LogOut_data' class='btn btn-warning mt-2' data-mdb-ripple-init><i class='fa-solid fa-arrow-right-from-bracket'></i> Log Out</button>
                <button type=submit class='btn btn-success mt-2'  name=pilih_menu form=web_menu_yeah  accesskey='S' value='PROCESS' data-mdb-ripple-init> <i class='fa fa-cog fa-spin fa-lg fa-fw'></i><u><b>S</b></u>tart..</button>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        ";
    }

    public function welcome()
    {


        echo "
        <body style='background-color: #fbd305;'>
        <div class='container-fluid flex-fill flex-wrap align-content-start'>
            <div class='card border-transparent mx-3 p-2 shadow bg-white rounded'>
                <form method=post action='index.php'>
                    <div class='row h-100 justify-content-center'>
                        <div class='card-body'>
                            <div class='row g-2 align-items-center'>
                                <div class='col-sm-12 text-center position-relative'>
                                    <h2>Welcome to Anywhere</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        ";
    }

    public function main($web_menu){
        $pilihan = $web_menu;
        echo "
        <div class='container-fluid flex-fill flex-wrap align-content-start' id='main-menu'>
            <div class='card border-transparent m-3 p-2 shadow bg-white rounded'>
                <div class='card-body'>
                    <h4 class='card-title mb-3'> Main Menu</h4>
                    <form method=post id='web_menu_yeah' action='index.php'>
                        <select class='form-select' name='web_menu' form=web_menu_yeah onchange='this.form.submit();'>
                            <option value=''                         ";     if ( ''                         == $pilihan) { echo " selected ";} echo ">Pilih Salah Satu
                            <option value='BS5_Menu_Any_Print_cargo' ";     if ( 'BS5_Menu_Any_Print_cargo' == $pilihan) { echo " selected ";} echo ">Print Cargo AnyWhere
                            <option value='BS5_Menu_Any_Anyware_aerox' ";   if ( 'BS5_Menu_Any_Anyware_aerox' == $pilihan) { echo " selected ";} echo ">Anywhere Bike
                        </select>
                        <button type=submit class='btn btn-success mt-2' form=web_menu_yeah  name=pilih_menu  value='PROCESS' data-mdb-ripple-init> <i class='fa fa-cog fa-spin fa-lg fa-fw'></i>Start</button>
                        <button type='submit' name='LogOut_data' form=web_menu_yeah value='123' class='btn btn-warning mt-2' data-mdb-ripple-init><i class='fa-solid fa-arrow-right-from-bracket'></i> Log Out</button>
                    </form>
                </div>
            </div>
        </div>
        ";
    }
}
