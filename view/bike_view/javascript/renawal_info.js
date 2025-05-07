$(document).ready(function () {
  renewal_on_off();

  $("#ren_option").on("input", function () {
    renewal_on_off();
  });
  $("#ren_option").change(function () {
    renewal_on_off();
  });

  function renewal_on_off() {
    let val_ren_option = $("#ren_option").val();
    if (val_ren_option == "USE_SOURCE_OF_BIZ") {
      $(".hasil_ren_option").css("display", "none");
    } else {
      $(".hasil_ren_option").css("display", "grid");
    }
  }

  $("#ren_insured_id").on("input", function () {
    let cc = $("#ren_insured_id").val();
    get_add_loc_REN(cc);
  });
  $("#ren_insured_id").change(function () {
    let cc = $("#ren_insured_id").val();
    get_add_loc_REN(cc);
  });

  function get_add_loc_REN(cc) {
    if (cc.length >= 7) {
      let obj = {};
      obj.com_cod = cc;
      // console.log('x --> ' + obj.com_cod );
      let psDT = JSON.stringify(obj);
      $.post(
        "https://www.araksa.com/mks/entry/api/index.php/Wfh_Project/Wfh_Project_list_alamat",
        psDT,
        function (result) {
          Hasil_Data = result;

          // console.log(Hasil_Data);
          if (Hasil_Data.message == "Success") {
            $("#loca_kirim_renewal").empty();
            for (i = 0, l = Hasil_Data.code.length; i < l; i++) {
              $("#loca_kirim_renewal").append(
                "<option value=" +
                  Hasil_Data.code[i].LOCATION_NO +
                  ">" +
                  Hasil_Data.code[i].ADDRESS_LINE1 +
                  "</option>"
              );
            }
          } else {
            $("#loca_kirim_renewal").empty();
            $("#ren_nama").empty();
            $("#ren_alamat").empty();
            $("#ren_district").empty();
            $("#ren_email").empty();
            $("#ren_zip").empty();
            $("#ren_village").empty();
            $("#ren_city").empty();
            $("#ren_no_hp").empty();
            $("#ren_province").empty();
          }
        }
      );
    } else {
      $("#loca_kirim_renewal").empty();
    }
  }

  $("#ren_insured_id").on("input", function () {
    let cc = $("#ren_insured_id").val();
    let loc = $("#loca_kirim_renewal").val();
    get_add_name_renewal(cc, loc);
  });
  $("#ren_insured_id").change(function () {
    let cc = $("#ren_insured_id").val();
    let loc = $("#loca_kirim_renewal").val();
    get_add_name_renewal(cc, loc);
  });
  $("#loca_kirim_renewal").change(function () {
    let cc = $("#ren_insured_id").val();
    let loc = $("#loca_kirim_renewal").val();
    get_add_name_renewal(cc, loc);
  });
  $(document).ready(function () {
    let cc = $("#ren_insured_id").val();
    let loc = $("#loca_kirim_renewal").val();
    get_add_name_renewal(cc, loc);
  });

  function get_add_name_renewal(cc, locat) {
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

            $("#ren_nama").val(obj.data.insured_name);
            $("#ren_alamat").val(add_insured);
            $("#ren_district").val(obj.data.district_name);
            $("#ren_email").val(obj.data.email1);
            $("#ren_zip").val(obj.data.postal_code);
            $("#ren_village").val(obj.data.village_name);
            $("#ren_city").val(obj.data.city);
            $("#ren_no_hp").val(obj.data.hp_no1);
            $("#ren_province").val(obj.data.state_province);
          }
        },
      });
    }
  }
});
