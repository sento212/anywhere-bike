<!DOCTYPE html>
<html lang="en" data-bs-theme="light" id="dark_theme">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

  <?php

  echo "
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9' crossorigin='anonymous'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
<link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css'>

<link href='jquery-ui.css' rel='stylesheet'>
";


  //MENU
  echo "
<div>
  <div class='container-fluid table-responsive-sm'>

    <div class='shadow-lg m-4 p-3 mb-3 bg-body rounded'>
      <form method=post action='index.php'>
        <table class='table table-bordered'>
          <div class='form-group text-bold text-center'>
              <h3 class='text-center'>MAIN MENU</h3>
          </div>

          <div class='form-group row'>
              <div class='col-sm-2 text-left'>Project Code</div>
              <div class='col-sm-10 text-left'> ";
  include 'index_main_menu.php';
  echo "
              </div>
          </div>

          <div class='form-group text-center mt-2'> ";
  include 'index_main_menu_button.php';
  echo "
           </div>

        </table>
      </form>
        ";

  // $warna_item_putih = '1' ;
  // if ( $warna_item_putih == '1' ) { $item_putih = 'on'; } else { $item_putih = 'off'; }
  
  $sql = "SELECT code FROM anywhere_general_table WHERE user ='$user_id'";
  $conn_sql = mysqli_query($conn_rdh, $sql);
  $get_after_update = mysqli_fetch_array($conn_sql);
  $take_update = $get_after_update['code'];

  echo "
        <div class='form-check form-switch '>
          <input class='form-check-input' type='checkbox'  id='dark_mode' name='dark_mode_saver' value='$take_update' >
          <label class='form-check-label' id='text_mode_blk'></label>
        </div>
    </div>
    ";

  echo "<div class='shadow-lg m-4 p-3 mb-5 bg-body rounded'>";
  include 'print_cargo/menu_print_cargo.php';
  echo "</div>";


  echo "
  </div>
</div>";





  echo "
<div class='row'>
  <div class='card w-50 mx-auto'>
    <div class='card-body text-center'>
      <div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel' >

        <div class='carousel-inner active' >
            ";

  $sql_iklan = "SELECT rowid,judul,url_image
                          FROM underwriting_approval_list_slide_show
                          WHERE upper(STATUS) = 'VALID' AND now() BETWEEN eff_date and exp_date
                          ORDER BY no_urut ";
  $list_iklan = mysqli_query($login_db_react, $sql_iklan);
  while ($L_Iklan = mysqli_fetch_array($list_iklan)) {
    $a_md5 = md5(md5(md5($L_Iklan[rowid])));
    echo "
                <div class='carousel-item active' data-bs-interval='200'>
                  <img src='$L_Iklan[url_image]' class='d-block w-100' onclick=\"window.open('Anywhere_iklan.php?a=$a_md5', '_blank')\"; >
                </div>
              ";
  }

  echo "
        </div>
        <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
          <span class='visually-hidden'>Previous</span>
        </button>
        <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
          <span class='carousel-control-next-icon' aria-hidden='true'></span>
          <span class='visually-hidden'>Next</span>
        </button>
      </div>
    </div>
  </div>
</div>



";

  // echo"<img src='under_cons_01.jpg' class='rounded mx-auto d-block text-center mt-2 mb-2' width='300' height='200'>";
  

  echo "
<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js' integrity='sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js' integrity='sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
<script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js'></script>

";


  if ($mkg_group == 'DEMO') {
    include 'print_cargo/controller/print_cargo_JS.php';
  } else {
    include 'print_cargo/controller/print_cargo_JS.php';
  }

  ?>
</body>

</html>