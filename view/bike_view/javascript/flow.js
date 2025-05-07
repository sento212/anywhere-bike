$(document).ready(function () {
  $(".numericinput").on("keypress", function (event) {
    var inputValue = $(this).val();
    return ketikinput(event, "0123456789.", inputValue);
  });

  $(".onlynumber").on("keypress", function (event) {
    var inputValue = $(this).val();
    return ketikinput(event, "0123456789.", inputValue);
  });

  $("#doc_suevey").on("keypress", function (event) {
    var inputValue = $(this).val();
    return ketikinput(event, "0123456789-", inputValue);
  });

  $("#fsurveyno").on("keypress", function (event) {
    var inputValue = $(this).val();
    return ketikinput(event, "0123456789-", inputValue);
  });

  $(".upper").on("input", function () {
    var originalText = $(this).val();
    var uppercasedText = originalText.toUpperCase();
    $(this).val(uppercasedText);
  });

  $(".numericinput").on("keyup", function (event) {
    var inputValue = $(this).val();
    var numericValue = inputValue.replace(/[^0-9]/g, "");

    var new_value = addCommas(numericValue);
    $(this).val(new_value);
  });

  function ketiktombol(e) {
    if (window.event) return window.event.keyCode;
    else if (e) return e.which;
    else return null;
  }

  function ketikinput(e, daftar, id) {
    var key, keychar;
    key = ketiktombol(e);
    if (key == null) return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    daftar = daftar.toLowerCase();
    if (daftar.indexOf(keychar) != -1) return true;
    if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
      return true;
    if (key == 13) {
      var i;
      for (i = 0; i < id.form.elements.length; i++)
        if (id == id.form.elements[i]) break;
      i = (i + 1) % id.form.elements.length;
      id.form.elements[i].focus();
      return false;
    }
    return false;
  }

  function addCommas(number) {
    return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  $(".table-container").css("width", "10px");
  updatebarsize();

  // if ($("body").hasClass("table-container")) {
  cardcheking();
  //   console.log(1234567654321)
  // }

  $(window).resize(function () {
    $(".table-container").css("width", "10px");
    updatebarsize();
    cardcheking();
    console.log("berubah ya");
  });

  function cardcheking() {
    var screenWidth = $(window).width();
    var parentWidth = $(".periodshow").parent().width();
    var parentWidth2 = $(".table-container").parent().width();
    var table_class = document.querySelector(".table-container");
    var lebar_table = 100;
    if (table_class != null) {
      table_class.classList.forEach(function (className) {
        if (className.startsWith("tbw-")) {
          lebar_table = className.split("-");
          lebar_table = lebar_table[1];
          // console.log(className);
        }
      });
    }

    let tessss = (parentWidth2 * lebar_table) / 100;
    console.log(tessss);

    // console.log(lebar_table);
    if (screenWidth > 515) {
      $(".periodshow").css("width", parentWidth + "px");
      $(".table-container").css(
        "width",
        (parentWidth2 * lebar_table) / 100 + "px"
      );
      $(".hilangkanlah").show();
    } else if (screenWidth <= 515) {
      $(".periodshow").addClass("border");
      screenWidth = screenWidth / 530;
      $(".periodshow").css("width", parentWidth + "px");
      // console.log(screenWidth);
      // $(".table-container").css("transform", "scale(" + screenWidth + ")");
      $(".table-container").css("width", parentWidth2 + "px");
      $(".hilangkanlah").hide();
    } else {
      // $(".table-container").css("transform", "scale(1)");
      $(".periodshow").removeClass("border");
    }
  }

  // function format_angka(num, min, max, digitkoma) {
  //   adakoma = num.indexOf(".");
  //   jmlkoma = num.split(".");
  //   if (digitkoma != "" && jmlkoma.length == 2) {
  //     if (jmlkoma[1].length > digitkoma) {
  //       num = num.slice(0, num.length - 1);
  //     }
  //   }
  //   numasli = num;
  //   numasli1 = num.toString().replace(/\$|\,/g, "");
  //   lanjut = 1;
  //   if ((parseFloat(numasli1) < min || num == "") && min != "") {
  //     lanjut = 0;
  //   }
  //   if (parseFloat(numasli1) > max && max != "") {
  //     lanjut = 0;
  //   }
  //   if (lanjut) {
  //     if (jmlkoma.length > 2) num = num.slice(0, num.length - 1);
  //     koma = num.substr(adakoma, num.length + 1);
  //     num = num.toString().replace(/\$|\,/g, "");
  //     if (isNaN(num)) num = "0";
  //     tanda = num == (num = Math.abs(num));
  //     num = Math.floor(num * 100 + 0.50000000001);
  //     num = Math.floor(num / 100).toString();
  //     for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
  //       num =
  //         num.substring(0, num.length - (4 * i + 3)) +
  //         "," +
  //         num.substring(num.length - (4 * i + 3));
  //     if (adakoma > 0) num = num + koma;
  //     if (num == "00") num = "0";
  //     if (numasli == "") num = "";
  //     return (tanda ? "" : "-") + num;
  //   } else {
  //     num = num.slice(0, num.length - 1);
  //     if (jmlkoma.length > 2) num = num.slice(0, num.length - 1);
  //     koma = num.substr(adakoma, num.length + 1);
  //     num = num.toString().replace(/\$|\,/g, "");
  //     if (isNaN(num)) num = "0";
  //     tanda = num == (num = Math.abs(num));
  //     num = Math.floor(num * 100 + 0.50000000001);
  //     num = Math.floor(num / 100).toString();
  //     for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
  //       num =
  //         num.substring(0, num.length - (4 * i + 3)) +
  //         "," +
  //         num.substring(num.length - (4 * i + 3));
  //     if (adakoma > 0) num = num + koma;
  //     if (num == "00") num = "0";
  //     if (numasli == "") num = "";
  //     return (tanda ? "" : "-") + num;
  //   }
  // }
});

function updatebarsize() {
  $(".periodshow").css("width", "10px");
  // $(".table-container").css("width", "10px");
  $(".side, .sides").css("transition", "");
  var screenWidth = $(window).width();
  var screenHeight = $(window).height();
  $(".exit-mark").css("display", "none");
  $(".guting").addClass("gap-2");
  // console.log(screenWidth);
  let kurangi = 0;
  if (screenWidth <= 515) {
    kurangi = 0;
    $(".side").removeClass("hide");
    $(".sides").removeClass("hide");
    $(".side").addClass("shide");
    $(".sides").addClass("shide");
    $(".guting").removeClass("flex-row");
    $(".guting").addClass("flex-column");
    $(".guting").removeClass("my-2");
    $(".guting").addClass("my-3");
    $(".sidegtg").addClass("flex-row");
    $(".sidegtg").addClass("flex-column");
    $(".sidegtg").addClass("my-1");
    $(".guting .isi").removeClass("w-75");
    $(".guting .isi").addClass("w-100");
    $(".gutang .isi").removeClass("w-75");
    $(".gutang .isi").addClass("w-50");
    $(".reform").addClass("w-100");
    $(".special").addClass("flex-fill");
    $(".guting .name").removeClass("w-25");
    $(".guting .name").addClass("w-100");
    $(".gutang .name").removeClass("w-25");
    $(".gutang .name").addClass("w-50");
    $(".usera").addClass("d-none");
    $(".menura").removeClass("d-none");
    $(".juduloy").css("display", "none");
    $(".side-icon").css("display", "none");
    $(".list-item").css("display", "none");
    $(".mama").css("display", "none");
  } else if (screenWidth <= 850) {
    kurangi = 60;
    $(".side").removeClass("shide");
    $(".sides").removeClass("shide");
    $(".side").addClass("hide");
    $(".sides").addClass("hide");
    $(".guting").addClass("flex-row");
    $(".guting").removeClass("flex-column");
    $(".guting").addClass("my-2");
    $(".guting").removeClass("my-3");
    $(".sidegtg").addClass("flex-row");
    $(".sidegtg").removeClass("flex-column");
    $(".sidegtg").removeClass("my-1");
    $(".isi").addClass("w-75");
    $(".isi").removeClass("w-100");
    $(".gutang .isi").removeClass("w-50");
    $(".gutang .isi").addClass("w-75");
    $(".reform").removeClass("w-100");
    $(".name").addClass("w-25");
    $(".name").removeClass("w-100");
    $(".gutang .name").removeClass("w-50");
    $(".gutang .name").addClass("w-25");
    $(".special").removeClass("flex-fill");
    $(".usera").addClass("d-none");
    $(".menura").removeClass("d-none");
    $(".side-icon").css("display", "inline");
    $(".list-item").css("display", "flex");
    $(".mama").css("display", "inline");
    $(".juduloy").css("display", "none");
  } else {
    kurangi = 200;
    $(".exit-mark").css("display", "none");
    $(".side").removeClass("hide");
    $(".sides").removeClass("hide");
    $(".guting").addClass("flex-row");
    $(".guting").removeClass("flex-column");
    $(".guting").addClass("my-2");
    $(".guting").removeClass("my-3");
    $(".sidegtg").addClass("flex-row");
    $(".sidegtg").removeClass("flex-column");
    $(".sidegtg").removeClass("my-1");
    $(".special").removeClass("flex-fill");
    $(".reform").removeClass("w-100");
    $(".gutang .isi").removeClass("w-50");
    $(".gutang .isi").addClass("w-75");
    $(".gutang .name").removeClass("w-50");
    $(".gutang .name").addClass("w-25");
    $(".isi").addClass("w-75");
    $(".isi").removeClass("w-100");
    $(".name").addClass("w-25");
    $(".name").removeClass("w-100");
    $(".side").removeClass("shide");
    $(".sides").removeClass("shide");
    $(".usera").removeClass("d-none");
    $(".menura").addClass("d-none");
    $(".side-icon").css("display", "inline");
    $(".list-item").css("display", "flex");
    $(".mama").css("display", "inline");
    $(".juduloy").css("display", "inline");
  }

  let divWidth = $(".side-main").width();
  console.log(divWidth);
  $(".top-head").css("width", divWidth);
}

function hitFormula01() {
  let v_Sum_insured =
    document.getElementById("Sum_Insured").value.replace(/,/g, "") * 1;
  let v_tahun_ke =
    document.getElementById("thn_pertanggunan").value.replace(/,/g, "") * 1;

  //tahun 01
  //--------
  let v_Rate_1 =
    document.getElementById("Rate_1").value.replace(/,/g, "") / 100;
  let v_loading_1 =
    document.getElementById("loading_1").value.replace(/,/g, "") / 100;
  let v_rscc_1 =
    document.getElementById("RSCC_1").value.replace(/,/g, "") / 100;
  let v_teroris_1 =
    document.getElementById("teroris_1").value.replace(/,/g, "") / 100;
  let v_Flood_1 =
    document.getElementById("Flood_1").value.replace(/,/g, "") / 100;
  let v_Eq_1 = document.getElementById("Eq_1").value.replace(/,/g, "") / 100;
  let v_bkl_1 = document.getElementById("bkl_1").value.replace(/,/g, "") / 100;
  let v_derek_1 =
    document.getElementById("derek_1").value.replace(/,/g, "") / 100;
  let r_pa_drv_1 =
    document.getElementById("si_driv_1").value.replace(/,/g, "") * 1;
  let v_pa_drv_1 = r_pa_drv_1 * (0.5 / 100);
  let v_qty_pass_1 =
    document.getElementById("qty_pass_1").value.replace(/,/g, "") * 1;
  let r_si_pass_1 =
    document.getElementById("si_pass_1").value.replace(/,/g, "") * 1;
  let v_si_drv_1 = r_si_pass_1 * (0.1 / 100) * v_qty_pass_1;
  let r_tlp_1 = document.getElementById("tpl_1").value.replace(/,/g, "") * 1;
  let r_Depre_1 =
    document.getElementById("Depre_1").value.replace(/,/g, "") / 100;
  let v_stnk_1 = document.getElementById("stnk_1").value.replace(/,/g, "") * 1;
  console.log(v_stnk_1);
  let v_SI_1 = v_Sum_insured * r_Depre_1;

  // 0-25 1%  || 25.1-50 0.5%  ||  50.1-100 0.25%
  let tpl_1_stage1 = 0;
  let tpl_1_stage2 = 0;
  let tpl_1_stage3 = 0;
  let m25 = 25000000;
  let m50 = 50000000;
  let m100 = 100000000;

  let ojk_body_type = $("#body_type_ojk").val();

  // rate tpl passanger 001- non bus non truck + ALL
  let rate_tpl_stage_1 = 1 / 100;
  let rate_tpl_stage_2 = 0.5 / 100;
  let rate_tpl_stage_3 = 0.25 / 100;

  // rate tpl passanger 002-turck and pickup
  if (ojk_body_type == "002") {
    rate_tpl_stage_1 = 1.5 / 100;
    rate_tpl_stage_2 = 0.75 / 100;
    rate_tpl_stage_3 = 0.375 / 100;
  }

  // rate tpl passanger 003-BUS
  if (ojk_body_type == "003") {
    rate_tpl_stage_1 = 1.5 / 100;
    rate_tpl_stage_2 = 0.75 / 100;
    rate_tpl_stage_3 = 0.375 / 100;
  }

  if (r_tlp_1 > m50 && r_tlp_1 <= m100) {
    tpl_1_stage1 = m25 * rate_tpl_stage_1;
    tpl_1_stage2 = m25 * rate_tpl_stage_2;
    tpl_1_stage3 = (r_tlp_1 - m50) * rate_tpl_stage_3;
  }
  if (r_tlp_1 > m25 && r_tlp_1 <= m50) {
    tpl_1_stage1 = m25 * rate_tpl_stage_1;
    tpl_1_stage2 = (r_tlp_1 - m25) * rate_tpl_stage_2;
  }
  if (r_tlp_1 > 0 && r_tlp_1 <= m25) {
    tpl_1_stage1 = r_tlp_1 * rate_tpl_stage_1;
  }

  let v_tlp_1 = tpl_1_stage1 + tpl_1_stage2 + tpl_1_stage3;

  let v_cover_1 = document.getElementById("ptg_1").value;

  let V_Hull_with_load_1 = 0;

  if (v_cover_1 == "ARK") {
    $("#loading_1").prop("disabled", false);
  } else {
    $("#loading_1").prop("disabled", true);
  }
  if (v_loading_1 > 0 && v_cover_1 == "ARK") {
    V_Hull_with_load_1 = v_Rate_1 + v_Rate_1 * v_loading_1;
  } else {
    V_Hull_with_load_1 = v_Rate_1;
    document.getElementById("loading_1").value = "";
  }

  //hitung total tahun 01
  let v_Tahun_01 =
    (V_Hull_with_load_1 +
      v_rscc_1 +
      v_teroris_1 +
      v_Flood_1 +
      v_Eq_1 +
      v_bkl_1 +
      v_derek_1) *
    v_SI_1;
  v_Tahun_01 = v_Tahun_01 + v_pa_drv_1 + v_si_drv_1 + v_tlp_1 + v_stnk_1;

  //tahun 02
  //--------
  let v_Rate_2 =
    document.getElementById("Rate_2").value.replace(/,/g, "") / 100;
  let v_loading_2 =
    document.getElementById("loading_2").value.replace(/,/g, "") / 100;
  let v_rscc_2 =
    document.getElementById("RSCC_2").value.replace(/,/g, "") / 100;
  let v_teroris_2 =
    document.getElementById("teroris_2").value.replace(/,/g, "") / 100;
  let v_Flood_2 =
    document.getElementById("Flood_2").value.replace(/,/g, "") / 100;
  let v_Eq_2 = document.getElementById("Eq_2").value.replace(/,/g, "") / 100;
  let v_bkl_2 = document.getElementById("bkl_2").value.replace(/,/g, "") / 100;
  let v_derek_2 =
    document.getElementById("derek_2").value.replace(/,/g, "") / 100;
  let r_pa_drv_2 =
    document.getElementById("si_driv_2").value.replace(/,/g, "") * 1;
  let v_pa_drv_2 = r_pa_drv_2 * (0.5 / 100);
  let v_qty_pass_2 =
    document.getElementById("qty_pass_2").value.replace(/,/g, "") * 1;
  let r_si_pass_2 =
    document.getElementById("si_pass_2").value.replace(/,/g, "") * 1;
  let v_si_drv_2 = r_si_pass_2 * (0.1 / 100) * v_qty_pass_2;
  let r_tlp_2 = document.getElementById("tpl_2").value.replace(/,/g, "") * 1;
  let r_Depre_2 =
    document.getElementById("Depre_2").value.replace(/,/g, "") / 100;
  let v_stnk_2 = document.getElementById("stnk_2").value.replace(/,/g, "") * 1;
  let v_SI_2 = v_Sum_insured * r_Depre_2;

  let tpl_2_stage1 = 0;
  let tpl_2_stage2 = 0;
  let tpl_2_stage3 = 0;
  if (r_tlp_2 > m50 && r_tlp_2 <= m100) {
    tpl_2_stage1 = m25 * rate_tpl_stage_1;
    tpl_2_stage2 = m25 * rate_tpl_stage_2;
    tpl_2_stage3 = (r_tlp_2 - m50) * rate_tpl_stage_3;
  }
  if (r_tlp_2 > m25 && r_tlp_2 <= m50) {
    tpl_2_stage1 = m25 * rate_tpl_stage_1;
    tpl_2_stage2 = (r_tlp_2 - m25) * rate_tpl_stage_2;
  }
  if (r_tlp_2 > 0 && r_tlp_2 <= m25) {
    tpl_2_stage1 = r_tlp_2 * rate_tpl_stage_1;
  }

  let v_tlp_2 = tpl_2_stage1 + tpl_2_stage2 + tpl_2_stage3;

  let v_cover_2 = document.getElementById("ptg_2").value;
  let V_Hull_with_load_2 = 0;
  if (v_cover_2 == "ARK") {
    $("#loading_2").prop("disabled", false);
  } else {
    $("#loading_2").prop("disabled", true);
  }
  if (v_loading_2 > 0 && v_cover_2 == "ARK") {
    V_Hull_with_load_2 = v_Rate_2 + v_Rate_2 * v_loading_2;
  } else {
    V_Hull_with_load_2 = v_Rate_2;
    document.getElementById("loading_2").value = "";
  }

  //hitung total tahun 02
  let v_Tahun_02 =
    (V_Hull_with_load_2 +
      v_rscc_2 +
      v_teroris_2 +
      v_Flood_2 +
      v_Eq_2 +
      v_bkl_2 +
      v_derek_2 +
      v_stnk_2) *
    v_SI_2;
  v_Tahun_02 = v_Tahun_02 + v_pa_drv_2 + v_si_drv_2 + v_tlp_2;

  //tahun 03
  //--------
  let v_Rate_3 =
    document.getElementById("Rate_3").value.replace(/,/g, "") / 100;
  let v_loading_3 =
    document.getElementById("loading_3").value.replace(/,/g, "") / 100;
  let v_rscc_3 =
    document.getElementById("RSCC_3").value.replace(/,/g, "") / 100;
  let v_teroris_3 =
    document.getElementById("teroris_3").value.replace(/,/g, "") / 100;
  let v_Flood_3 =
    document.getElementById("Flood_3").value.replace(/,/g, "") / 100;
  let v_Eq_3 = document.getElementById("Eq_3").value.replace(/,/g, "") / 100;
  let v_bkl_3 = document.getElementById("bkl_3").value.replace(/,/g, "") / 100;
  let v_derek_3 =
    document.getElementById("derek_3").value.replace(/,/g, "") / 100;
  let r_pa_drv_3 =
    document.getElementById("si_driv_3").value.replace(/,/g, "") * 1;
  let v_pa_drv_3 = r_pa_drv_3 * (0.5 / 100);
  let v_qty_pass_3 =
    document.getElementById("qty_pass_3").value.replace(/,/g, "") * 1;
  let r_si_pass_3 =
    document.getElementById("si_pass_3").value.replace(/,/g, "") * 1;
  let v_si_drv_3 = r_si_pass_3 * (0.1 / 100) * v_qty_pass_3;
  let r_tlp_3 = document.getElementById("tpl_3").value.replace(/,/g, "") * 1;
  let r_Depre_3 =
    document.getElementById("Depre_3").value.replace(/,/g, "") / 100;
  let v_stnk_3 = document.getElementById("stnk_3").value.replace(/,/g, "") * 1;
  let v_SI_3 = v_Sum_insured * r_Depre_3;

  let tpl_3_stage1 = 0;
  let tpl_3_stage2 = 0;
  let tpl_3_stage3 = 0;
  if (r_tlp_3 > m50 && r_tlp_3 <= m100) {
    tpl_3_stage1 = m25 * rate_tpl_stage_1;
    tpl_3_stage2 = m25 * rate_tpl_stage_2;
    tpl_3_stage3 = (r_tlp_3 - m50) * rate_tpl_stage_3;
  }
  if (r_tlp_3 > m25 && r_tlp_3 <= m50) {
    tpl_3_stage1 = m25 * rate_tpl_stage_1;
    tpl_3_stage2 = (r_tlp_3 - m25) * rate_tpl_stage_2;
  }
  if (r_tlp_3 > 0 && r_tlp_3 <= m25) {
    tpl_3_stage1 = r_tlp_3 * rate_tpl_stage_1;
  }

  let v_tlp_3 = tpl_3_stage1 + tpl_3_stage2 + tpl_3_stage3;

  let v_cover_3 = document.getElementById("ptg_3").value;
  let V_Hull_with_load_3 = 0;
  if (v_cover_3 == "ARK") {
    $("#loading_3").prop("disabled", false);
  } else {
    $("#loading_3").prop("disabled", true);
  }
  if (v_loading_3 > 0 && v_cover_3 == "ARK") {
    V_Hull_with_load_3 = v_Rate_3 + v_Rate_3 * v_loading_3;
  } else {
    V_Hull_with_load_3 = v_Rate_3;
    document.getElementById("loading_3").value = "";
  }

  //hitung total tahun 03
  let v_Tahun_03 =
    (V_Hull_with_load_3 +
      v_rscc_3 +
      v_teroris_3 +
      v_Flood_3 +
      v_Eq_3 +
      v_bkl_3 +
      v_derek_3 +
      v_stnk_3) *
    v_SI_3;
  v_Tahun_03 = v_Tahun_03 + v_pa_drv_3 + v_si_drv_3 + v_tlp_3;

  //tahun 04
  //--------
  let v_Rate_4 =
    document.getElementById("Rate_4").value.replace(/,/g, "") / 100;
  let v_loading_4 =
    document.getElementById("loading_4").value.replace(/,/g, "") / 100;
  let v_rscc_4 =
    document.getElementById("RSCC_4").value.replace(/,/g, "") / 100;
  let v_teroris_4 =
    document.getElementById("teroris_4").value.replace(/,/g, "") / 100;
  let v_Flood_4 =
    document.getElementById("Flood_4").value.replace(/,/g, "") / 100;
  let v_Eq_4 = document.getElementById("Eq_4").value.replace(/,/g, "") / 100;
  let v_bkl_4 = document.getElementById("bkl_4").value.replace(/,/g, "") / 100;
  let v_derek_4 =
    document.getElementById("derek_4").value.replace(/,/g, "") / 100;
  let r_pa_drv_4 =
    document.getElementById("si_driv_4").value.replace(/,/g, "") * 1;
  let v_pa_drv_4 = r_pa_drv_4 * (0.5 / 100);
  let v_qty_pass_4 =
    document.getElementById("qty_pass_4").value.replace(/,/g, "") * 1;
  let r_si_pass_4 =
    document.getElementById("si_pass_4").value.replace(/,/g, "") * 1;
  let v_si_drv_4 = r_si_pass_4 * (0.1 / 100) * v_qty_pass_4;
  let r_tlp_4 = document.getElementById("tpl_4").value.replace(/,/g, "") * 1;
  let r_Depre_4 =
    document.getElementById("Depre_4").value.replace(/,/g, "") / 100;
  let v_stnk_4 = document.getElementById("stnk_4").value.replace(/,/g, "") * 1;
  let v_SI_4 = v_Sum_insured * r_Depre_4;

  let tpl_4_stage1 = 0;
  let tpl_4_stage2 = 0;
  let tpl_4_stage3 = 0;
  if (r_tlp_4 > m50 && r_tlp_4 <= m100) {
    tpl_4_stage1 = m25 * rate_tpl_stage_1;
    tpl_4_stage2 = m25 * rate_tpl_stage_2;
    tpl_4_stage3 = (r_tlp_4 - m50) * rate_tpl_stage_3;
  }
  if (r_tlp_4 > m25 && r_tlp_4 <= m50) {
    tpl_4_stage1 = m25 * rate_tpl_stage_1;
    tpl_4_stage2 = (r_tlp_4 - m25) * rate_tpl_stage_2;
  }
  if (r_tlp_4 > 0 && r_tlp_4 <= m25) {
    tpl_4_stage1 = r_tlp_4 * rate_tpl_stage_1;
  }

  let v_tlp_4 = tpl_4_stage1 + tpl_4_stage2 + tpl_4_stage3;

  let v_cover_4 = document.getElementById("ptg_4").value;
  let V_Hull_with_load_4 = 0;
  if (v_cover_4 == "ARK") {
    $("#loading_4").prop("disabled", false);
  } else {
    $("#loading_4").prop("disabled", true);
  }
  if (v_loading_4 > 0 && v_cover_4 == "ARK") {
    V_Hull_with_load_4 = v_Rate_4 + v_Rate_4 * v_loading_4;
  } else {
    V_Hull_with_load_4 = v_Rate_4;
    document.getElementById("loading_4").value = "";
  }

  //hitung total tahun 04
  let v_Tahun_04 =
    (V_Hull_with_load_4 +
      v_rscc_4 +
      v_teroris_4 +
      v_Flood_4 +
      v_Eq_4 +
      v_bkl_4 +
      v_derek_4 +
      v_stnk_4) *
    v_SI_4;
  v_Tahun_04 = v_Tahun_04 + v_pa_drv_4 + v_si_drv_4 + v_tlp_4;

  //tahun 05
  //--------
  let v_Rate_5 =
    document.getElementById("Rate_5").value.replace(/,/g, "") / 100;
  let v_loading_5 =
    document.getElementById("loading_5").value.replace(/,/g, "") / 100;
  let v_rscc_5 =
    document.getElementById("RSCC_5").value.replace(/,/g, "") / 100;
  let v_teroris_5 =
    document.getElementById("teroris_5").value.replace(/,/g, "") / 100;
  let v_Flood_5 =
    document.getElementById("Flood_5").value.replace(/,/g, "") / 100;
  let v_Eq_5 = document.getElementById("Eq_5").value.replace(/,/g, "") / 100;
  let v_bkl_5 = document.getElementById("bkl_5").value.replace(/,/g, "") / 100;
  let v_derek_5 =
    document.getElementById("derek_5").value.replace(/,/g, "") / 100;
  let r_pa_drv_5 =
    document.getElementById("si_driv_5").value.replace(/,/g, "") * 1;
  let v_pa_drv_5 = r_pa_drv_5 * (0.5 / 100);
  let v_qty_pass_5 =
    document.getElementById("qty_pass_5").value.replace(/,/g, "") * 1;
  let r_si_pass_5 =
    document.getElementById("si_pass_5").value.replace(/,/g, "") * 1;
  let v_si_drv_5 = r_si_pass_5 * (0.1 / 100) * v_qty_pass_5;
  let r_tlp_5 = document.getElementById("tpl_5").value.replace(/,/g, "") * 1;
  let r_Depre_5 =
    document.getElementById("Depre_5").value.replace(/,/g, "") / 100;
  let v_stnk_5 = document.getElementById("stnk_5").value.replace(/,/g, "") * 1;
  let v_SI_5 = v_Sum_insured * r_Depre_5;

  let tpl_5_stage1 = 0;
  let tpl_5_stage2 = 0;
  let tpl_5_stage3 = 0;
  if (r_tlp_5 > m50 && r_tlp_5 <= m100) {
    tpl_5_stage1 = m25 * rate_tpl_stage_1;
    tpl_5_stage2 = m25 * rate_tpl_stage_2;
    tpl_5_stage3 = (r_tlp_5 - m50) * rate_tpl_stage_3;
  }
  if (r_tlp_5 > m25 && r_tlp_5 <= m50) {
    tpl_5_stage1 = m25 * rate_tpl_stage_1;
    tpl_5_stage2 = (r_tlp_5 - m25) * rate_tpl_stage_2;
  }
  if (r_tlp_5 > 0 && r_tlp_5 <= m25) {
    tpl_5_stage1 = r_tlp_5 * rate_tpl_stage_1;
  }

  let v_tlp_5 = tpl_5_stage1 + tpl_5_stage2 + tpl_5_stage3;

  let v_cover_5 = document.getElementById("ptg_5").value;
  let V_Hull_with_load_5 = 0;
  if (v_cover_5 == "ARK") {
    $("#loading_5").prop("disabled", false);
  } else {
    $("#loading_5").prop("disabled", true);
  }
  if (v_loading_5 > 0 && v_cover_5 == "ARK") {
    V_Hull_with_load_5 = v_Rate_5 + v_Rate_5 * v_loading_5;
  } else {
    V_Hull_with_load_5 = v_Rate_5;
    document.getElementById("loading_5").value = "";
  }

  //hitung total tahun 05
  let v_Tahun_05 =
    (V_Hull_with_load_5 +
      v_rscc_5 +
      v_teroris_5 +
      v_Flood_5 +
      v_Eq_5 +
      v_bkl_5 +
      v_derek_5 +
      v_stnk_5) *
    v_SI_5;
  v_Tahun_05 = v_Tahun_05 + v_pa_drv_5 + v_si_drv_5 + v_tlp_5;

  //hitung total tahun 01-05
  //------------------------
  //alert(v_premi_original);
  let v_premi_original = 0;
  if (v_tahun_ke == 1) {
    v_premi_original = v_Tahun_01;
  }
  if (v_tahun_ke == 2) {
    v_premi_original = v_Tahun_01 + v_Tahun_02;
  }
  if (v_tahun_ke == 3) {
    v_premi_original = v_Tahun_01 + v_Tahun_02 + v_Tahun_03;
  }
  if (v_tahun_ke == 4) {
    v_premi_original = v_Tahun_01 + v_Tahun_02 + v_Tahun_03 + v_Tahun_04;
  }
  if (v_tahun_ke == 5) {
    v_premi_original =
      v_Tahun_01 + v_Tahun_02 + v_Tahun_03 + v_Tahun_04 + v_Tahun_05;
  }

  //let v_premi_original = v_Tahun_01 + v_Tahun_02 +  v_Tahun_03 + v_Tahun_04 + v_Tahun_05;
  //document.getElementById('Auto_Total_Premi').value = v_premi_original;

  vShortRate1 = document.getElementById("shortRateValueHid1").value;
  vShortRate2 = document.getElementById("shortRateValueHid2").value;
  vShortRate3 = document.getElementById("shortRateValueHid3").value;

  let V_thn_pertanggunan = document.getElementById("thn_pertanggunan").value;
  let total_days = V_thn_pertanggunan * vShortRate3;
  // alert(total_days + '-' + V_thn_pertanggunan + '-' + vShortRate3);

  if (vShortRate2 == "/") {
    // { v_premi_short = ( vShortRate1 / vShortRate3 ) * v_premi_original; }
    v_premi_short = (vShortRate1 / total_days) * v_premi_original;
  }
  if (vShortRate2 == "%") {
    v_premi_short = (vShortRate1 / 100) * v_premi_original;
  }
  if (vShortRate2 == "") {
    v_premi_short = v_premi_original;
  }

  function buat_comma_js(v_sum) {
    let v_sumAsli = v_sum;
    v_sum = Math.floor(v_sum * 100 + 0.50000000001);
    v_sum = Math.floor(v_sum / 100).toString();
    let v_koma = v_sumAsli - v_sum;
    v_koma = Math.floor(v_koma * 100 + 0.50000000001).toString();
    for (var i = 0; i < Math.floor((v_sum.length - (1 + i)) / 3); i++)
      v_sum =
        v_sum.substring(0, v_sum.length - (4 * i + 3)) +
        "," +
        v_sum.substring(v_sum.length - (4 * i + 3));
    if (v_koma != "0") {
      v_sum = v_sum + "." + v_koma;
    }

    return v_sum;
  }

  let x_premi = buat_comma_js(v_premi_original);
  let x_premi_short = buat_comma_js(v_premi_short);

  // display prorata nya
  if (vShortRate1 != "") {
    document.getElementById("shortRateHit1").innerHTML =
      " X " + x_premi + " = ";
  } else {
    document.getElementById("shortRateHit1").innerHTML = "";
  }

  document.getElementById("Auto_Total_Premi").value = x_premi_short;
  document.getElementById("manual_gross_premi").value = x_premi_short;
}
