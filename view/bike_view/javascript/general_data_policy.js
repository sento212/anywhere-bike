$(document).ready(function () {
  $("#shortRate_metode").on("change", function () {
    $("#shortRateValue").val("");
    fShortRateValue();
  });

  function fShortRateValue() {
    if ($("#shortRate_metode").val() == "") {
      $("#shortRateValue").hide();
      $("#shortRateValue").val("");
      $("#shortRateValue").attr("readonly", false);
      $("#shortRateValue").css({ backgroundColor: "white" });
      $("#shortRateValueSign").html("");
      $("#shortRateHit").html("");
      $("#shortRateValueHid").val("");
      $("#shortRateValueHid1").val("");
      $("#shortRateValueHid2").val("");
      $("#shortRateValueHid3").val("");
    } else if ($("#shortRate_metode").val() == "Pro_Rate") {
      // let vDate1=$('#datepicker1').val();
      // let vDate1dt=new Date(vDate1.substring(6,10),parseInt(vDate1.substring(3,5))-1,vDate1.substring(0,2));
      // let vDate2=$('#datepicker2').val();
      // let vDate2dt=new Date(vDate2.substring(6,10),parseInt(vDate2.substring(3,5))-1,vDate2.substring(0,2));
      // let vDiff=(vDate2dt.getTime()-vDate1dt.getTime())/(1000 * 3600 * 24);
      // let vDate3dt=new Date(vDate1.substring(6,10)*1+1,parseInt(vDate1.substring(3,5))-1,vDate1.substring(0,2));
      // let vDiff3=(vDate3dt.getTime()-vDate1dt.getTime())/(1000 * 3600 * 24);
      // let vD1=vDate1dt.getTime();
      // let vD2=vDate2dt.getTime();

      // 2023-10-27 => BACKUP KABISAT PAK MARTIN (TIDAK SESUAI DENGAN AEGIS)
      {
        // let vDate1=$('#datepicker1').val();
        // let vDate1dt=new Date(vDate1.substring(6,10),parseInt(vDate1.substring(3,5))-1,vDate1.substring(0,2));
        // let vDate2=$('#datepicker2').val();
        // let vDate2dt=new Date(vDate2.substring(6,10),parseInt(vDate2.substring(3,5))-1,vDate2.substring(0,2));
        // let vDiff=(vDate2dt.getTime()-vDate1dt.getTime())/(1000 * 3600 * 24);
        // let vDate3dt=new Date(vDate1.substring(6,10)*1+1,parseInt(vDate1.substring(3,5))-1,vDate1.substring(0,2));
        // let vD1=vDate1dt.getTime();
        // let vD2=vDate2dt.getTime();
        // if(vDate2dt.getTime() < vDate3dt.getTime()) {
        //   vDiff3=(vDate3dt.getTime()-vDate1dt.getTime())/(1000 * 3600 * 24);
        // }
        // else {
        //   vDiff3=(vDate2dt.getTime()-vDate1dt.getTime())/(1000 * 3600 * 24);
        // }
        // let V_thn_pertanggunan=$('#thn_pertanggunan').val();
        // let total_days         = V_thn_pertanggunan * vDiff3;
        // // alert(total_days + '-' + V_thn_pertanggunan + '-' + vDiff3);
        // $('#shortRateValue').show();
        // $('#shortRateValue').val(vDiff);
        // $('#shortRateValue').attr('readonly', true);
        // $('#shortRateValue').css({backgroundColor: '#dedede'});
        // $('#shortRateValueSign').html(' Days');
        // // $('#shortRateHit').html(vDiff+'/'+vDiff3);
        // $('#shortRateHit').html(vDiff+'/'+total_days);
        // $('#shortRateValueHid').val('');
        // $('#shortRateValueHid1').val(vDiff);
        // $('#shortRateValueHid2').val('/');
        // $('#shortRateValueHid3').val(vDiff3);
      }

      let vDate1 = $("#datepicker1").val();
      let vDate1dt = new Date(
        vDate1.substring(0, 4), // Year (substring from index 0 to 4)
        vDate1.substring(8, 10) - 1, // Month (substring from index 8 to 10, subtracting 1 since months are zero-based)
        vDate1.substring(5, 7)
      );
      let vDate2 = $("#datepicker2").val();
      let vDate2dt = new Date(
        vDate2.substring(0, 4), // Year (substring from index 0 to 4)
        vDate2.substring(8, 10) - 1, // Month (substring from index 8 to 10, subtracting 1 since months are zero-based)
        vDate2.substring(5, 7)
      );
      let vDiff =
        (vDate2dt.getTime() - vDate1dt.getTime()) / (1000 * 3600 * 24);
      let total_days = 365;

      if (vDate1.substring(6, 10) % 4 == 0) {
        // let tmp_time = new Date(vDate1.substring(6,10), parseInt(vDate1.substring(3,5))-1, 29);
        let tmp_time = new Date(vDate1.substring(6, 10), 0o2, 29);

        if (
          tmp_time.getTime() >= vDate1dt.getTime() &&
          tmp_time.getTime() <= vDate2dt.getTime()
        ) {
          total_days = 366;
        }
      }
      if (vDate1.substring(6, 10) % 4 > 0) {
        // let tmp_time = new Date(vDate2.substring(6,10), parseInt(vDate2.substring(3,5))-1, 29);
        let tmp_time = new Date(vDate2.substring(6, 10), 0o2, 29);

        if (
          tmp_time.getTime() >= vDate1dt.getTime() &&
          tmp_time.getTime() <= vDate2dt.getTime()
        ) {
          total_days = 366;
        }
      }

      // alert(total_days + '-' + V_thn_pertanggunan + '-' + vDiff3);
      $("#shortRateValue").show();
      $("#shortRateValue").val(vDiff);
      $("#shortRateValue").attr("readonly", true);
      $("#shortRateValue").css({ backgroundColor: "#dedede" });
      $("#shortRateValueSign").html(" Days");
      // $('#shortRateHit').html(vDiff+'/'+vDiff3);
      $("#shortRateHit").html(vDiff + "/" + total_days);
      $("#shortRateValueHid").val("");
      $("#shortRateValueHid1").val(vDiff);
      $("#shortRateValueHid2").val("/");
      $("#shortRateValueHid3").val(total_days);
    } else if ($("#shortRate_metode").val() == "Short_Rate") {
      let vDate1 = $("#datepicker1").val();
      let vDate1dt = new Date(
        vDate1.substring(0, 4), // Year (substring from index 0 to 4)
        vDate1.substring(8, 10) - 1, // Month (substring from index 8 to 10, subtracting 1 since months are zero-based)
        vDate1.substring(5, 7)
      );
      let vDate2 = $("#datepicker2").val();
      let vDate2dt = new Date(
        vDate2.substring(0, 4), // Year (substring from index 0 to 4)
        vDate2.substring(8, 10) - 1, // Month (substring from index 8 to 10, subtracting 1 since months are zero-based)
        vDate2.substring(5, 7)
      );
      let vDiff =
        (vDate2dt.getTime() - vDate1dt.getTime()) / (1000 * 3600 * 24);
      $("#shortRateValue").show();

      {
        if ($("#shortRateValue").val() == "") {
          if (vDiff > 300) {
            $("#shortRateValue").val("95");
            $("#shortRateValueHid").val("0015");
          } else if (vDiff > 270) {
            $("#shortRateValue").val("90");
            $("#shortRateValueHid").val("0014");
          } else if (vDiff > 240) {
            $("#shortRateValue").val("85");
            $("#shortRateValueHid").val("0013");
          } else if (vDiff > 210) {
            $("#shortRateValue").val("80");
            $("#shortRateValueHid").val("0012");
          } else if (vDiff > 180) {
            $("#shortRateValue").val("75");
            $("#shortRateValueHid").val("0011");
          } else if (vDiff > 150) {
            $("#shortRateValue").val("70");
            $("#shortRateValueHid").val("0010");
          } else if (vDiff > 120) {
            $("#shortRateValue").val("60");
            $("#shortRateValueHid").val("0008");
          } else if (vDiff > 90) {
            $("#shortRateValue").val("50");
            $("#shortRateValueHid").val("0007");
          } else if (vDiff > 60) {
            $("#shortRateValue").val("40");
            $("#shortRateValueHid").val("0006");
          } else if (vDiff > 45) {
            $("#shortRateValue").val("30");
            $("#shortRateValueHid").val("0005");
          } else if (vDiff > 31) {
            $("#shortRateValue").val("25");
            $("#shortRateValueHid").val("0004");
          } else if (vDiff > 10) {
            $("#shortRateValue").val("20");
            $("#shortRateValueHid").val("0003");
          } else if (vDiff > 3) {
            $("#shortRateValue").val("10");
            $("#shortRateValueHid").val("0002");
          } else {
            $("#shortRateValue").val("5");
            $("#shortRateValueHid").val("0001");
          }
        }
      }

      vShortRate = $("#shortRateValue").val();
      $("#shortRateHit").html(vShortRate + "%");
      $("#shortRateValue").attr("readonly", false);
      $("#shortRateValue").css({ backgroundColor: "white" });

      $("#shortRateValueSign").html(" <b>%</b> [ " + vDiff + " Days ]");
      $("#shortRateValueHid1").val(vShortRate);
      $("#shortRateValueHid2").val("%");
      $("#shortRateValueHid3").val("");
    }
  }
  $("#shortRateValue").on("input", function () {
    vShortRate = $("#shortRateValue").val();
    $("#shortRateHit").html(vShortRate + "%");
    $("#shortRateValueHid1").val(vShortRate);
    $("#shortRateValueHid2").val("%");
    $("#shortRateValueHid3").val("");
  });

  $("#datepicker1").on("input", function () {
    var date = $(this).val();
    var vTgl = date.substring(5, 10);
    var vThn = parseInt(date.substring(0, 6)) + 1;
    if (vTgl == "29-02-") {
      vTgl = "01-03-";
    }
    var newDate = vThn + "-" + vTgl;
    console.log(date + "  " + vTgl + "   " + vThn + "  " + newDate);
    $("#datepicker2").val(newDate);
    $("#boxChoose").removeClass("d-flex");
    $("#boxChoose").addClass("d-none");
    $("#shortRate_metode").val("");
    $("#shortRateValue").val("");
    $("#shortRateHit").html("");
    $(
      "#shortRateValueHid, #shortRateValueHid1, #shortRateValueHid2, #shortRateValueHid3"
    ).val("");
    hitFormula01();
  });

  $("#datepicker2").on("input", function () {
    let date1 = $("#datepicker1").val();
    let date2 = $("#datepicker2").val();
    var vDate1dt = new Date(date1);
    var vDate2dt = new Date(date2);
    let vDate3dt = new Date(date1);
    vDate3dt.setFullYear(vDate3dt.getFullYear() + 1);

    let vDiff = vDate2dt.getTime() - vDate1dt.getTime();
    let vDiff1 = vDate3dt.getTime() - vDate1dt.getTime();

    if (vDiff < vDiff1) {
      $("#shortRateValue").val("");
      if ($("#shortRate_metode").val() == "") {
        $("#boxChoose").removeClass("d-none");
        $("#boxChoose").addClass("d-flex");
        fShortRateValue();
      } else {
        fShortRateValue();
      }
    } else {
      $("#boxChoose").removeClass("d-flex");
      $("#boxChoose").addClass("d-none");
      $("#shortRate_metode").val("");
      $("#shortRateValue").val("");
      $("#shortRateValueHid").val("");
    }
    hitFormula01();
  });
});
