$(document).ready(function () {
  $("#F_comp").on("input", function () {
    let cc = $("#F_comp").val();
    get_add_loc(cc);
  });
  $("#F_comp").change(function () {
    let cc = $("#F_comp").val();
    get_add_loc(cc);
  });

  function get_add_loc(cc) {
    if (cc.length >= 7) {
      let obj = {};
      obj.com_cod = cc;
      // console.log('x --> ' + obj.com_cod );
      let psDT = JSON.stringify(obj);

      $.ajax({
        type: "POST",
        url: "https://www.araksa.com/mks/entry/api/index.php/Wfh_Project/Wfh_Project_list_alamat",
        data: psDT,
        global: false,
        success: function (result) {
          let Hasil_Data = result;
          // console.log(Hasil_Data);
          if (Hasil_Data.message == "Success") {
            $("#loca_kirim_1").empty();
            for (i = 0, l = Hasil_Data.code.length; i < l; i++) {
              $("#loca_kirim_1").append(
                "<option value=" +
                  Hasil_Data.code[i].LOCATION_NO +
                  ">" +
                  Hasil_Data.code[i].ADDRESS_LINE1 +
                  "</option>"
              );
            }
            $("#loca_kirim_1").append(
              "<option value=ADD_NEW_ADDR>Add New Address</option>"
            );
          }
        },
      });
    } else {
      $("#loca_kirim_1").empty();
    }
  }

  $("#F_comp").on("input", function () {
    let cc = $("#F_comp").val();
    let loc = $("#loca_kirim_1").val();
    get_add_name(cc, loc);
  });
  $("#F_comp").change(function () {
    let cc = $("#F_comp").val();
    let loc = $("#loca_kirim_1").val();
    get_add_name(cc, loc);
  });
  $("#loca_kirim_1").change(function () {
    let cc = $("#F_comp").val();
    let loc = $("#loca_kirim_1").val();
    get_add_name(cc, loc);
  });

  $("#insIDcard").on("input", function () {
    $("#insIDcard").css({ color: "", "background-color": "" });
  });

  function get_add_name(cc, locat) {
    let aax = $("#insIDcard").val();
    // console.log(aax);

    if (cc.length >= 7) {
      // 12-08-2022, sandra minta email bisa di update kaya hp gituuuuu.....
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
            // console.log(response);
            // let add_insured = obj.data.address_line1 + ' ' + obj.data.address_line2 + ' ' + obj.data.address_line3;
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
            $("#insName")
              .val(obj.data.insured_name)
              .prop("readonly", true)
              .css("background-color", "#dedede");
            $("#cust_add")
              .val(add_insured)
              .prop("readonly", true)
              .css("background-color", "#dedede");
            // $('#cust_add'   ).val(obj.data.address_line1).prop('readonly', true).css('background-color', '#dedede');
            // $('#cust_add_02').val(obj.data.address_line2).prop('readonly', true).css('background-color', '#dedede');
            // $('#cust_add_03').val(obj.data.address_line3).prop('readonly', true).css('background-color', '#dedede');
            $("#District")
              .val(obj.data.district_name)
              .prop("readonly", true)
              .css("background-color", "#dedede");
            //$('#email'      ).val(obj.data.email1       ).prop('readonly', true).css('background-color', '#dedede');
            $("#email").val(obj.data.email1);
            $("#kodepos")
              .val(obj.data.postal_code)
              .prop("readonly", true)
              .css("background-color", "#dedede");
            $("#kelurah")
              .val(obj.data.village_name)
              .prop("readonly", true)
              .css("background-color", "#dedede");
            $("#kabupaten")
              .val(obj.data.city)
              .prop("readonly", true)
              .css("background-color", "#dedede");
            $("#cust_hp").val(obj.data.hp_no1);

            if (obj.data.state_province == null) {
              $('#province option[value="' + "" + '"]').prop("selected", true);
            } else {
              $(
                '#province option[value="' + obj.data.state_province + '"]'
              ).prop("selected", true);
            }
            $("#province").prop("disabled", true);
            // $("#province").attr("style", "pointer-events: none;");

            if (obj.data.insured_card == null) {
              $("#insIDcard").attr("placeholder", "Wajib isi NPWP / NIK");
              // $('#insIDcard').val( "Wajib isi NPWP / NIK");
              $("#insIDcard").prop("readonly", false);
              $("#insIDcard").val("");
              $("#insIDcard").css({ color: "red", "background-color": "" });
            } else {
              $("#insIDcard").val(obj.data.insured_card);
              $("#insIDcard").prop("readonly", true);
              $("#insIDcard").css({ color: "", "background-color": "#dedede" });
            }

            if (obj.data.insured_company == 1) {
              $("#cek_company").prop("checked", true);
            }
            if (obj.data.insured_company == 0) {
              $("#cek_company").prop("checked", false);
            }
            // isi npwp tapi company = 0 0646595

            $("#A_update_phone").show("");
            $("#A_update_email_ins").show("");

            $("#update_zip").hide("");
            $("#update_District").hide("");
          } else {
            // lookup pilih --> new address, ALL OPEN EDIT
            $("#insName").prop("readonly", false).css("background-color", "");
            $("#cust_add").prop("readonly", false).css("background-color", "");
            $("#District").prop("readonly", false).css("background-color", "");
            //$('#email'      ).prop('readonly', false).css('background-color', '');
            $("#kodepos").prop("readonly", false).css("background-color", "");
            $("#kelurah").prop("readonly", false).css("background-color", "");
            $("#kabupaten").prop("readonly", false).css("background-color", "");
            $("#cust_hp").prop("readonly", false).css("background-color", "");
            $("#insIDcard").prop("readonly", false).css("background-color", "");
            $("#cek_company").prop("checked", false);
            $("#province").attr("style", "pointer-events", "");
            $("#A_update_phone").hide("");
            $("#A_update_email_ins").hide("");

            $("#update_zip").show("");
            $("#update_District").show("");
          }
          // console.log(response);
        },
      });
    } else {
      // jika insured code <7 semua OPEN EDIT dan hapus look up list alamat
      $("#insName").prop("readonly", false).css("background-color", "");
      $("#cust_add").prop("readonly", false).css("background-color", "");
      $("#District").prop("readonly", false).css("background-color", "");
      //$('#email'      ).prop('readonly', false).css('background-color', '');
      $("#kodepos").prop("readonly", false).css("background-color", "");
      $("#kelurah").prop("readonly", false).css("background-color", "");
      $("#kabupaten").prop("readonly", false).css("background-color", "");
      $("#cust_hp").prop("readonly", false).css("background-color", "");
      $("#insIDcard").prop("readonly", false).css("background-color", "");
      $("#cek_company").prop("checked", false);
      $("#province").attr("style", "pointer-events", "");
      $("#A_update_phone").hide("");
      $("#A_update_email_ins").hide("");

      $("#update_zip").show("");
      $("#update_District").show("");
    }
  }

  if (
    $("#loca_kirim_1").val() != "ADD_NEW_ADDR" &&
    $("#F_comp").val().length >= 7
  ) {
    $("#insName").prop("readonly", true).css("background-color", "#dedede");
    $("#cust_add").prop("readonly", true).css("background-color", "#dedede");
    $("#District").prop("readonly", true).css("background-color", "#dedede");
    //$('#email'        ).prop('readonly', true).css('background-color', '#dedede');
    $("#kodepos").prop("readonly", true).css("background-color", "#dedede");
    $("#kelurah").prop("readonly", true).css("background-color", "#dedede");
    $("#kabupaten").prop("readonly", true).css("background-color", "#dedede");
    $("#insIDcard").prop("readonly", true).css("background-color", "#dedede");
    $("#province").attr("style", "pointer-events: none;");

    $("#update_zip").hide("");
    $("#update_District").hide("");
  }

  if (
    $("#loca_kirim_1").val() != "ADD_NEW_ADDR" &&
    $("#F_comp").val().length >= 7
  ) {
    $("#A_update_phone").show("");
  } else {
    $("#A_update_phone").hide("");
  }
});
