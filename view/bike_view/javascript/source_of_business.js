$(document).ready(function () {
  Source_Of_Biz_Code();
  $("#sob_code").on("input", function () {
    Source_Of_Biz_Code();
  });

  function Source_Of_Biz_Code() {
    var vSobCode = $("#sob_code").val();
    // vSobCode = tambah_nol_depan(vSobCode,7);
    // console.log('yyyyyyyyy' + vSobCode.length );

    if (vSobCode.length == 7) {
      vJsonData = JSON.stringify({ input_company_code: vSobCode });

      $.ajax({
        type: "POST",
        url: "https://www.araksa.com/mks/entry/api/index.php/Wfh_Project/Wfh_Project_raw_data",
        data: vJsonData,
        global: false,
        success: function (response) {
          hasil = JSON.parse(JSON.stringify(response));
          if (hasil.status == 1) {
            $("#ptSob").html(hasil.code[0].FULL_NAME);

            if (hasil.code[0].COMPANY == "1") {
              $("#pt_or_private").html("COMPANY");
              $("#get_pt_or_private").val("COMPANY");
            }
            if (hasil.code[0].PRIVATE == "1") {
              $("#pt_or_private").html("PRIVATE");
              $("#get_pt_or_private").val("PRIVATE");
            }

            if (hasil.code[0].NPWP == "" || hasil.code[0].NPWP === null) {
              $("#npwp_source_of_biz").html("-");
            } else {
              $("#npwp_source_of_biz").html(hasil.code[0].NPWP);
            }

            if (
              hasil.code[0].BANK_CODE === null ||
              hasil.code[0].BANK_ACCOUNTS === null
            ) {
              $("#bank_account_source_of_biz").html("-");
            } else {
              $("#bank_account_source_of_biz").html(
                hasil.code[0].BANK_CODE + " - " + hasil.code[0].BANK_ACCOUNTS
              );
            }

            if (hasil.code[0].EMAIL1 == "" || hasil.code[0].EMAIL1 === null) {
              $("#sob_email").html("-");
            } else {
              $("#sob_email").html(hasil.code[0].EMAIL1);
            }

            if (hasil.code[0].WA_NO == "" || hasil.code[0].WA_NO === null) {
              $("#no_wa_txt").html("-");
            } else {
              $("#no_wa_txt").html(hasil.code[0].WA_NO);
              $("#no_wa").val(hasil.code[0].WA_NO);
            }

            // if (hasil.code[0].ACTIVE_FLAG == "Y") {
            //   $("#icon_sob_flag_active").html(
            //     "<font style='color:blue'><i class='fa fa-check-square fa-lg fa-fw'></i></font>"
            //   );
            // } else {
            //   $("#icon_sob_flag_active").html(
            //     "<font style='color:red'><i class='fa fa-times-circle fa-lg fa-fw'></i></font>"
            //   );
            // }

            // if (hasil.code[0].ACTIVE_FLAG_UW == "Y") {
            //   $("#icon_sob_flag_uwd").html(
            //     "<font style='color:blue'><i class='fa fa-check-square fa-lg fa-fw'></i></font>"
            //   );
            // } else {
            //   $("#icon_sob_flag_uwd").html(
            //     "<font style='color:red'><i class='fa fa-times-circle fa-lg fa-fw'></i></font>"
            //   );
            // }

            // if (hasil.code[0].ACTIVE_FLAG_FINANCE == "Y") {
            //   $("#icon_sob_flag_finance").html(
            //     "<font style='color:blue'><i class='fa fa-check-square fa-lg fa-fw'></i></font>"
            //   );
            // } else {
            //   $("#icon_sob_flag_finance").html(
            //     "<font style='color:red'><i class='fa fa-times-circle fa-lg fa-fw'></i></font>"
            //   );
            // }
            // EMAIL1
          }
        },
      });
    } else {
      //   $("#ptSob").html("-");
      //   $("#pt_or_private").html("-");
      //   $("#npwp_source_of_biz").html("-");
      //   $("#bank_account_source_of_biz").html("-");
      //   $("#icon_sob_flag_active").html(
      //     "<font style='color:green'><i class='fa fa-info-circle fa-lg fa-fw'></i></font>"
      //   );
      //   $("#icon_sob_flag_uwd").html(
      //     "<font style='color:green'><i class='fa fa-info-circle fa-lg fa-fw'></i></font>"
      //   );
      //   $("#icon_sob_flag_finance").html(
      //     "<font style='color:green'><i class='fa fa-info-circle fa-lg fa-fw'></i></font>"
      //   );
    }
  }
});
