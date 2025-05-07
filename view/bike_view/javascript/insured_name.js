$(document).ready(function () {
  $("#fetch_qq").on("input", function () {
    let cc = $("#fetch_qq").val();
    get_add_loc_QQ1(cc);
  });
  $("#fetch_qq").change(function () {
    let cc = $("#fetch_qq").val();
    get_add_loc_QQ1(cc);
  });

  function get_add_loc_QQ1(cc) {
    if (cc.length >= 7) {
      let obj = {};
      obj.com_cod = cc;
      let psDT = JSON.stringify(obj);

      $.ajax({
        type: "POST",
        url: "https://www.araksa.com/mks/entry/api/index.php/Wfh_Project/Wfh_Project_list_alamat",
        data: psDT,
        global: false,
        success: function (result) {
          Hasil_Data = result;
          // console.log(Hasil_Data);
          if (Hasil_Data.message == "Success") {
            $("#loca_kirim_qq").empty();
            for (i = 0, l = Hasil_Data.code.length; i < l; i++) {
              $("#loca_kirim_qq").append(
                "<option value=" +
                  Hasil_Data.code[i].LOCATION_NO +
                  ">" +
                  Hasil_Data.code[i].ADDRESS_LINE1 +
                  "</option>"
              );
            }
          } else {
            $("#loca_kirim_qq").empty();
          }
        },
      });
    } else {
      $("#loca_kirim_qq").empty();
    }
  }

  $("#fetch_qq").on("input", function () {
    let cc = $("#fetch_qq").val();
    let loc = $("#loca_kirim_qq").val();
    get_add_name_qq1(cc, loc);
  });
  $("#fetch_qq").change(function () {
    let cc = $("#fetch_qq").val();
    let loc = $("#loca_kirim_qq").val();
    get_add_name_qq1(cc, loc);
  });
  $("#loca_kirim_qq").change(function () {
    let cc = $("#fetch_qq").val();
    let loc = $("#loca_kirim_qq").val();
    get_add_name_qq1(cc, loc);
  });
  // $(document).ready(function()                { let cc = $('#ren_insured_id').val(); let loc = $('#loca_kirim_renewal').val(); get_add_name_renewal(cc,loc);  });

  function get_add_name_qq1(cc, locat) {
    if (cc.length >= 7) {
      if (locat == null) {
        locat = "01";
      }
      $.ajax({
        type: "POST",
        url: "https://www.araksa.com/mks/entry/idx_agen_direct_delivery_JSON.php",
        data: {
          input_company_code: cc,
          input_company_location: locat,
          key_id: "kmskskmskmskms",
        },
        global: false,
        success: function (response) {
          let obj = JSON.parse(response);

          if (obj.message == "success") {
            let add_insured;
            if (obj.data.address_line1 != null) {
              add_insured = obj.data.address_line1;
            }
            if (obj.data.address_line2 != null) {
              add_insured += " " + obj.data.address_line2;
            }
            if (obj.data.address_line3 != null) {
              add_insured += add_insured + " " + obj.data.address_line3;
            }

            $("#qqName").val(obj.data.insured_name);
            $("#qqadd").val(add_insured);
            $("#qqhp").val(obj.data.hp_no1);
          }
        },
      });
    }
    // end if <7
  }

  $("#fetch_qq2").on("input", function () {
    let cc = $("#fetch_qq2").val();
    get_add_loc_QQ2(cc);
  });
  $("#fetch_qq2").change(function () {
    let cc = $("#fetch_qq2").val();
    get_add_loc_QQ2(cc);
  });

  function get_add_loc_QQ2(cc) {
    if (cc.length >= 7) {
      let obj = {};
      obj.com_cod = cc;
      let psDT = JSON.stringify(obj);
      $.ajax({
        type: "POST",
        url: "https://www.araksa.com/mks/entry/api/index.php/Wfh_Project/Wfh_Project_list_alamat",
        data: psDT,
        global: false,
        success: function (result) {
          Hasil_Data = result;
          // console.log(Hasil_Data);
          if (Hasil_Data.message == "Success") {
            $("#loca_kirim_qq2").empty();
            for (i = 0, l = Hasil_Data.code.length; i < l; i++) {
              $("#loca_kirim_qq2").append(
                "<option value=" +
                  Hasil_Data.code[i].LOCATION_NO +
                  ">" +
                  Hasil_Data.code[i].ADDRESS_LINE1 +
                  "</option>"
              );
            }
          } else {
            $("#loca_kirim_qq2").empty();
          }
        },
      });
    } else {
      $("#loca_kirim_qq2").empty();
    }
  }

  $("#fetch_qq2").on("input", function () {
    let cc = $("#fetch_qq2").val();
    let loc = $("#loca_kirim_qq").val();
    get_add_name_qq2(cc, loc);
  });
  $("#fetch_qq2").change(function () {
    let cc = $("#fetch_qq2").val();
    let loc = $("#loca_kirim_qq").val();
    get_add_name_qq2(cc, loc);
  });
  $("#loca_kirim_qq2").change(function () {
    let cc = $("#fetch_qq2").val();
    let loc = $("#loca_kirim_qq2").val();
    get_add_name_qq2(cc, loc);
  });
  // $(document).ready(function()          { let cc = $('#ren_insured_id').val(); let loc = $('#loca_kirim_renewal').val(); get_add_name_renewal(cc,loc);  });

  function get_add_name_qq2(cc, locat) {
    if (cc.length >= 7) {
      if (locat == null) {
        locat = "01";
      }
      $.ajax({
        type: "POST",
        url: "https://www.araksa.com/mks/entry/idx_agen_direct_delivery_JSON.php",
        data: {
          input_company_code: cc,
          input_company_location: locat,
          key_id: "kmskskmskmskms",
        },
        global: false,
        success: function (response) {
          let obj = JSON.parse(response);

          if (obj.message == "success") {
            let add_insured;
            if (obj.data.address_line1 != null) {
              add_insured = obj.data.address_line1;
            }
            if (obj.data.address_line2 != null) {
              add_insured += " " + obj.data.address_line2;
            }
            if (obj.data.address_line3 != null) {
              add_insured += add_insured + " " + obj.data.address_line3;
            }

            $("#qq2name").val(obj.data.insured_name);
            $("#qq2add").val(add_insured);
            $("#qq2hp").val(obj.data.hp_no1);
          }
        },
      });
    }
    // end if <7
  }
});
