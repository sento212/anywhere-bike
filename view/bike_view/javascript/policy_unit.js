$(document).ready(function () {
  // cardcheking();
  year_generate();
  // show_foto();
  $("#sekaiwama").hide();

  // $(window).resize(function () {
  //   cardcheking();
  // });
  // function cardcheking() {
  //   var screenWidth = $(window).width();
  //   var parentWidth = $(".periodshow").parent().width();
  //   var parentWidth2 = $(".table-container").parent().width();
  //   var table_class = document.querySelector(".table-container");
  //   var lebar_table = 100;
  //   table_class.classList.forEach(function (className) {
  //     if (className.startsWith("tbw-")) {
  //       lebar_table = className.split("-");
  //       lebar_table = lebar_table[1];
  //       // console.log(className);
  //     }
  //   });

  //   // console.log(lebar_table);
  //   if (screenWidth > 515) {
  //     $(".periodshow").css("width", parentWidth + "px");
  //     $(".table-container").css(
  //       "width",
  //       (parentWidth2 * lebar_table) / 100 + "px"
  //     );
  //     $(".hilangkanlah").show();
  //   } else if (screenWidth <= 515) {
  //     $(".periodshow").addClass("border");
  //     screenWidth = screenWidth / 530;
  //     $(".periodshow").css("width", parentWidth + "px");
  //     // console.log(screenWidth);
  //     // $(".table-container").css("transform", "scale(" + screenWidth + ")");
  //     $(".table-container").css("width", parentWidth2 + "px");
  //     $(".hilangkanlah").hide();
  //   } else {
  //     // $(".table-container").css("transform", "scale(1)");
  //     $(".periodshow").removeClass("border");
  //   }
  // }
  tampilkan_foto();

  $("#pilih_jml_foto").change(function () {
    tampilkan_foto();
  });

  function tampilkan_foto() {
    $('[id*="penghalang"]').hide();
    let qty = $("#pilih_jml_foto").val();
    if (qty != "none") {
      console.log(qty);
      $("#sekaiwama").show();
      for (let i = 1; i <= qty; i++) {
        $(`#penghalang${i}`).show();
        let isi = $(`#type_foto_xx${i}`).val();
        if (isi == "URL") {
          $(`#file_wfh${i}`).hide();
          $(`.kumaha${i}`).show();
          $(`.kumaga${i}`).hide();
        } else if (isi == "H_PASAR") {
          $(`#file_wfh${i}`).show();
          $(`.kumaha${i}`).hide();
          $(`.kumaga${i}`).show();
        } else {
          $(`#file_wfh${i}`).show();
          $(`.kumaha${i}`).hide();
          $(`.kumaga${i}`).hide();
        }

        $(`#type_foto_xx${i}`).change(function () {
          let isi = $(`#type_foto_xx${i}`).val();
          console.log(isi);
          if (isi == "URL") {
            $(`#file_wfh${i}`).hide();
            $(`.kumaha${i}`).show();
            $(`.kumaga${i}`).hide();
          } else if (isi == "H_PASAR") {
            $(`#file_wfh${i}`).show();
            $(`.kumaha${i}`).hide();
            $(`.kumaga${i}`).show();
          } else {
            $(`#file_wfh${i}`).show();
            $(`.kumaha${i}`).hide();
            $(`.kumaga${i}`).hide();
          }
        });
      }
    } else {
      $("#sekaiwama").hide();
    }
  }

  $("#thn_pertanggunan").change(function (e) {
    year_generate();
    // $(".periodshow").remove();
    // if (a != 0) {
    //   var data = "";
    //   for (i = 1; i <= a; i++) {
    //     var myStrung = `
    //                       <div class='isi-period d-flex flex-column px-3 gap-1 border-end border-secondary-subtle' style='width:16%;min-width:100px;'>
    //                           <span class='d-flex align-items-center align-self-center' style='height:40px'><b>Year 0${i}</b></span>
    //                           <select class='form-select w-75' id='coverage${i}' style='height:40px;'>
    //                               <option value='0' selected> </option>
    //                               <option value='1' >Compare</option>
    //                               <option value='2' >Tlo</option>
    //                           </select>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='hull${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='loading${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='rscc${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='terrorism${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='flood${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='earthquake${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='wks${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-75' style='text-align:end'  id='towing${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                           <input type='text' class='form-control' style='text-align:end; height:40px'  id='driver${i}' placeholder=''>
    //                           <input type='text' class='form-control' style='text-align:end; height:40px'  id='passenger${i}' placeholder=''>
    //                           <select class='form-select w-50' id='num-psg' style='height:40px'>
    //                               <option value='0' selected> </option>
    //                               <option value='1' >1</option>
    //                               <option value='2' >2</option>
    //                               <option value='3' >3</option>
    //                               <option value='4' >4</option>
    //                               <option value='5' >5</option>
    //                               <option value='6' >6</option>
    //                           </select>
    //                           <input type='text' class='form-control' style='text-align:end; height:40px'  id='tpl${i}' placeholder=''>
    //                           <input type='text' class='form-control' style='text-align:end; height:40px'  id='deductible${i}' placeholder=''>
    //                           <input type='text' class='form-control' style='text-align:end; height:40px'  id='bpkb${i}' placeholder=''>
    //                           <div class='persen d-flex flex-row align-items-center gap-2' style='height:40px'>
    //                               <input type='text' class='form-control w-50' style='text-align:end'  id='depreciation${i}' placeholder=''>
    //                               <span>%</span>
    //                           </div>
    //                       </div>`;
    //     data = data + myStrung;
    //   }
    //   let title = `
    //             <div class='judul-period d-flex flex-column gap-1 px-3 border-end border-secondary-subtle' style='width:20%;min-width:200px;white-space: nowrap;'>
    //               <span class='d-flex align-items-center align-self-center' style='height:40px'><b>Major</b></span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Coverage</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Hull</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Loading</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate RSCC</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Terrorism</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Flood</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Earthquake</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Authorized Wks</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Rate Towing</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>SI PA Driver</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>SI PA Passenger</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Num of Passenger(s)</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Limit TPL</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Deductible</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>STNK/BPKB</span>
    //               <span class='d-flex align-items-center align-self-end' style='height:40px'>Depreciation</span>
    //           </div>`;
    //   let header = `<div class='periodshow d-flex flex-row align-items-center align-self-center my-3' style='overflow-x: auto;width:100px'>${title} ${data}</div>`;
    //   $("#periode-polis").after(header);
    cardcheking();
    // }
  });

  function year_generate() {
    let a = $("#thn_pertanggunan").val();
    $('[id*="years_"]').addClass("d-none");
    if (a != 0) {
      for (i = 0; i <= 5 - (5 - a); i++) {
        $("#years_" + i).removeClass("d-none");
      }
    }
  }

  $("#fsurveyno").on("input", function () {
    let vfsurveyno = $("#fsurveyno").val();
    let vfsurveynoTmpl = "xx-xxxxx-xx-xxxx-xxxx";
    let vCek1 = vfsurveyno
      .replace(/[R,M,0-9]/gim, "")
      .replace(/\s+/g, "")
      .replace(/-/g, "");
    if (vfsurveyno.length > vfsurveynoTmpl.length) {
      $("#fsurveyno").val("");
      $("#fsurveyno").css("background-color", "#ffbbbb");
      $("#fsurveyno").focus();
    } else if (vCek1.length > 0) {
      $("#fsurveyno").val("");
      $("#fsurveyno").css("background-color", "#ffbbbb");
      $("#fsurveyno").focus();
    } else {
      let v1 = "";
      let v2 = "";
      let v3 = "";
      let vt = "";
      let vHSL = "";
      for (let i = 0; i < vfsurveyno.length; i++) {
        v1 = vfsurveyno.substr(i, 1);
        v3 = vfsurveyno.substr(0, i + 1);
        vt = vfsurveynoTmpl.substr(i, 1);
        if (i > 0) {
          v2 = vfsurveyno.substr(i - 1, 1);
        }
        if (vt == "-" && v1 != "-") {
          vHSL = vHSL + "-" + v1;
        } else {
          vHSL = vHSL + v1;
        }
      }
      $("#fsurveyno").val(vHSL);
    }

    if (vfsurveyno.length != vfsurveynoTmpl.length) {
      $("#fsurveyno").css("background-color", "#ffbbbb");
      $("#fsurveyno").focus();
    } else {
      $("#fsurveyno").css("background-color", "white");
    }
    document.getElementById("fceksurveyno").value =
      document.getElementById("fsurveyno").value;
    document.getElementById("SI_survey").value =
      document.getElementById("Sum_Insured").value;
  });

  // untuk cek survey
  let make = $("#make").val();
  let cate = $("#cate").val();
  let moda = $("#moda").val();
  let warna = $("#warna").val();
  let tahun_buat = $("#tahun_buat").val();
  let no_rangka = $("#no_rangka").val();
  let no_mesin = $("#no_mesin").val();
  let No_Polisi = $("#No_Polisi").val();
  let Sum_Insured = $("#Sum_Insured").val();
  let add_equipment = $("#add_equipment").val();
  let non_std = $("#non_std").val();
  let survey_no = $("#survey_no").val();
  let survey_report = $("#survey_report").val();
  let jam_survey = $("#jam_survey").val();
  let register_id = $("#register_id").val();
  let wfh_id_no = $("#wfh_id").val();

  $("#fButViewCekSurvey").click(function () {
    let fceksurveyno = $("#fceksurveyno").val();
    let fsurveyno = $("#fsurveyno").val();
    let SI_survey = $("#SI_survey").val();
    let user_id = $("#user_id").val();
    let mk_group = $("#mk_group").val();
    let no_regis = $("#no_regis").val();
    let unit_no = $("#unit_number").val();

    console.log(fceksurveyno);
    console.log(fsurveyno);
    console.log(SI_survey);
    console.log(user_id);
    console.log(mk_group);
    console.log(no_regis);
    console.log(unit_no);
    $.ajax({
      type: "POST",
      url: "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/survey_test",
      data: {
        fceksurveyno: fceksurveyno,
        fsurveyno: fsurveyno,
        SI_survey: SI_survey,
        user_id: user_id,
        mk_group: mk_group,
        no_regis: no_regis,
        unit_no: unit_no,
      },
      headers: {
        id: "mks",
        key: "wibuselamanyawibuselamanyawibuselamanya",
      },
      success: function (response) {
        let obj = JSON.parse(JSON.stringify(response));
        if (isObject(obj["data"]) == false) {
          $("#surveymsg").remove();
          $("#survey_no").after(
            `
            <span style='color:red;' id='surveymsg'>${obj["data"]}</span>
            `
          );
          let wfh_id = $("#wfh_ids").val();
          make_creator(make, wfh_id, function () {
            $("#make").val(make);
            cate_generator(make, cate, wfh_id, function () {
              $("#cate").val(cate);
              $("#moda").val(moda);
            });
          });
          $("#warna").val(warna);
          $("#tahun_buat").val(tahun_buat);
          $("#no_rangka").val(no_rangka);
          $("#no_mesin").val(no_mesin);
          $("#No_Polisi").val(No_Polisi);
          $("#Sum_Insured").val(Sum_Insured);
          $("#add_equipment").val(`${add_equipment ?? ""}`);
          $("#non_std").val(`${non_std ?? ""}`);
          if (register_id != "" && survey_no != "") {
            $("#remarks_table").empty();
            if (survey_report != "") {
              $("#rks_no_survey").html(survey_no);
              $("#rks_jam_survey").html(jam_survey);
              $("#remarks_table").append(`                        
                <th>Survey Report</th>
                <td><a type='button' class='btn btn-success' id=clkPdf href='${survey_report}' target='_blank' data-mdb-ripple-init><i class='fa-solid fa-download'></i> Download</a>
                <button type='submit' class='btn btn-info' name=view_pic_survey value='${survey_no}'  form=to_view_survey_pic  data-mdb-ripple-init><i class='fa-solid fa-eye'></i> View</button>
                </td>
              `);
            } else {
              $("#rks_no_survey").html("");
              $("#rks_jam_survey").html("");
              $("#remarks_table").append(`                        
              <tr>
                <th>Survey Report</th>
                <td>Survey report Not Available</td>
              </tr>`);
            }
            $("#hasil_survey_bawah").removeClass("d-inline");
            $("#hasil_survey_bawah").addClass("d-none");
            $("#data_survey_bawah").empty();
          } else {
            $("#remarks_table").empty();
            $("#rks_no_survey").html(
              "<span class='text-secondary'>xx-xxxxx-xx-xxxx-xxxx</span>"
            );
            $("#rks_jam_survey").html(
              "<span class='text-secondary'>dd-mm-yyyy hh:mm:ss</span>"
            );
            $("#hasil_survey_bawah").removeClass("d-inline");
            $("#hasil_survey_bawah").addClass("d-none");
            $("#data_survey_bawah").empty();
          }
        } else if (obj["status"] == 400) {
          $("#surveymsg").remove();
          $("#survey_no").after(
            `
            <span style='color:red;' id='surveymsg'>${obj["message"]}</span>
            `
          );
          let wfh_id = $("#wfh_ids").val();
          make_creator(make, wfh_id, function () {
            $("#make").val(make);
            cate_generator(make, cate, wfh_id, function () {
              $("#cate").val(cate);
              $("#moda").val(moda);
            });
          });
          $("#warna").val(warna);
          $("#tahun_buat").val(tahun_buat);
          $("#no_rangka").val(no_rangka);
          $("#no_mesin").val(no_mesin);
          $("#No_Polisi").val(No_Polisi);
          $("#Sum_Insured").val(Sum_Insured);
          $("#add_equipment").val(`${add_equipment ?? ""}`);
          $("#non_std").val(`${non_std ?? ""}`);
          if (register_id != "" && survey_no != "") {
            $("#remarks_table").empty();
            if (survey_report != "") {
              $("#rks_no_survey").html(survey_no);
              $("#rks_jam_survey").html(jam_survey);
              $("#remarks_table").append(`                        
                <th>Survey Report</th>
                <td><a type='button' class='btn btn-success' id=clkPdf href='${survey_report}' target='_blank' data-mdb-ripple-init><i class='fa-solid fa-download'></i> Download</a>
                <button type='submit' class='btn btn-info' name=view_pic_survey value='${survey_no}'  form=to_view_survey_pic  data-mdb-ripple-init><i class='fa-solid fa-eye'></i> View</button>
                </td>
              `);
            } else {
              $("#rks_no_survey").html("");
              $("#rks_jam_survey").html("");
              $("#remarks_table").append(`                        
              <tr>
                <th>Survey Report</th>
                <td>Survey report Not Available</td>
              </tr>`);
            }
            $("#hasil_survey_bawah").removeClass("d-inline");
            $("#hasil_survey_bawah").addClass("d-none");
            $("#data_survey_bawah").empty();
          } else {
            $("#remarks_table").empty();
            $("#rks_no_survey").html(
              "<span class='text-secondary'>xx-xxxxx-xx-xxxx-xxxx</span>"
            );
            $("#rks_jam_survey").html(
              "<span class='text-secondary'>dd-mm-yyyy hh:mm:ss</span>"
            );
            $("#hasil_survey_bawah").removeClass("d-inline");
            $("#hasil_survey_bawah").addClass("d-none");
            $("#data_survey_bawah").empty();
          }
        } else {
          let hasil = obj["data"];
          console.log(hasil);
          $("#surveymsg").remove();
          let wfh_id = $("#wfh_ids").val();
          make_creator(hasil["make"], wfh_id, function () {
            $("#make").val(`${hasil["make"]}`);
            cate_generator(hasil["make"], hasil["cate"], wfh_id, function () {
              $("#cate").val(`${hasil["cate"]}`);
              $("#moda").val(`${hasil["model"]}`);
            });
          });
          $("#warna").val(`${hasil["warna"]}`);
          $("#tahun_buat").val(`${hasil["tahun_buat"]}`);
          $("#no_rangka").val(`${hasil["no_rangka"]}`);
          $("#no_mesin").val(`${hasil["no_mesin"]}`);
          $("#No_Polisi").val(`${hasil["no_polisi"]}`);
          $("#Sum_Insured").val(`${hasil["sum_ins"]}`);
          $("#add_equipment").val(`${hasil["add_equipment"] ?? ""}`);
          $("#non_std").val(`${hasil["non_standart"] ?? ""}`);

          if (register_id != "" && hasil["survey_no"] != "") {
            $("#remarks_table").empty();
            if (hasil["survey_report"] != "") {
              $("#rks_no_survey").html(hasil["survey_no"]);
              $("#rks_jam_survey").html(hasil["jam_survey"]);
              $("#remarks_table").append(`                        
              <th>Survey Report</th>
              <td><a type='button' class='btn btn-success' id=clkPdf href='${hasil["survey_report"]}' target='_blank' data-mdb-ripple-init><i class='fa-solid fa-download'></i> Download</a>
              <button type='submit' class='btn btn-info' name=view_pic_survey value='${hasil["survey_no"]}'  form=to_view_survey_pic  data-mdb-ripple-init><i class='fa-solid fa-eye'></i> View</button>
              </td>
            `);
            } else {
              $("#rks_no_survey").html("");
              $("#rks_jam_survey").html("");
              $("#remarks_table").append(`                        
              <tr>
                <th>Survey Report</th>
                <td>Survey report Not Available</td>
              </tr>`);
            }
            if (hasil["hasil_surv"] != []) {
              $("#hasil_survey_bawah").removeClass("d-none");
              $("#hasil_survey_bawah").addClass("d-inline");
              $("#data_survey_bawah").empty();
              let no = 0;
              hasil["hasil_surv"].forEach(function (s) {
                let nooo = s["unit_hasil_survey"];
                no++;
                let engine_sa = "";
                if (
                  wfh_id_no == "0036" ||
                  wfh_id_no == "0055" ||
                  wfh_id_no == "0059" ||
                  wfh_id_no == "0061"
                ) {
                  console.log(wfh_id_no + "hagagagag");
                  engine_sa = `                                             
                  <td>
                    <select name='panel_roles_SA[$nooo]' class='form-select' style='min-width:120px'>
                    <option value='${
                      s["panel_roles_sa"] == "" ? "selected" : ""
                    } >Choose
                    <option value='Ignore'    ${
                      s["panel_roles_sa"] == "Ignore" ? "selected" : ""
                    }    >Ignore
                    <option value='Exclude'   ${
                      s["panel_roles_sa"] == "Exclude" ? "selected" : ""
                    }   >Exclude
                    <option value='Double OR' ${
                      s["panel_roles_sa"] == "Double OR" ? "selected" : ""
                    } >Double OR
                    </select>
                  </td>`;
                }
                $("#data_survey_bawah").append(
                  `                                      
                  <tr>
                    <td align='center'> ${no}                 </td>
                    <td align='left'  > ${s["panel_name"]}      </td>
                    <td align='left'  > ${s["panel_kondisi"]}   </td>
                    <td align='center'> ${s["Std_panel"]}       </td>
                    <td>
                    <select name='panel_roles[${nooo}]' class='form-select' style='min-width:120px' disabled >
                            <option value='${
                              s["panel_roles"] == "" ? "selected" : ""
                            } >Choose
                            <option value='Ignore'    ${
                              s["panel_roles"] == "Ignore" ? "selected" : ""
                            }    >Ignore
                            <option value='Exclude'   ${
                              s["panel_roles"] == "Exclude" ? "selected" : ""
                            }   >Exclude
                            <option value='Double OR' ${
                              s["panel_roles"] == "Double OR" ? "selected" : ""
                            } >Double OR
                    </select>
                    </td>
                    ${engine_sa}
                    </tr>`
                );
              });
            } else {
              $("#hasil_survey_bawah").removeClass("d-inline");
              $("#hasil_survey_bawah").addClass("d-none");
            }
          } else {
            $("#remarks_table").empty();
            $("#rks_no_survey").html(
              "<span class='text-secondary'>xx-xxxxx-xx-xxxx-xxxx</span>"
            );
            $("#rks_jam_survey").html(
              "<span class='text-secondary'>dd-mm-yyyy hh:mm:ss</span>"
            );
          }
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
        console.error("Full AJAX response:", jqXHR);
        Swal.fire({
          icon: "error",
          title: "Cek Data Gagal",
          text: "Gagal Mengecek Data!",
        });
      },
    });
  });

  function isObject(value) {
    return typeof value === "object" && value !== null;
  }

  $("#make").change(function () {
    let make = $("#make").val();
    let wfh_id = $("#wfh_ids").val();
    let value = make_creator(make, wfh_id);
    let ajak = $.when(value);
    ajak.done(function () {
      setTimeout(function () {
        let cate = $("#cate").val();
        cate_generator(make, cate, wfh_id);
      }, 400);
    });
  });

  $("#cate").change(function () {
    let make = $("#make").val();
    let cate = $("#cate").val();
    let wfh_id = $("#wfh_ids").val();
    cate_generator(make, cate, wfh_id);
  });

  function make_creator(make, wfh_id, callback) {
    $.ajax({
      type: "POST",
      url: "https://www.rks-w.com/prog-x/smart_claim/model/Gen_make_cate_model_car.php",
      data: {
        key_id: "jasjasasjcnasjcnacalcsladaicakc",
        param: make,
        jenis: wfh_id,
      },
      global: false,
      success: function (response) {
        let obj = JSON.parse(response);
        let cate = $("#cate");
        cate.empty();
        let moda = $("#moda");
        moda.empty();
        let data_hasil = obj.Data;
        for (let i = 0; i < obj.Data.length; i++) {
          cate.append(
            `<option value="${data_hasil[i]}">${data_hasil[i]}</option>`
          );
        }
        if (typeof callback === "function") {
          callback();
        }
      },
    });
  }

  function cate_generator(make, cate, wfh_id, callback) {
    $.ajax({
      type: "POST",
      url: "https://www.rks-w.com/prog-x/smart_claim/model/Gen_make_cate_model_car.php",
      data: {
        key_id: "kjadgfadgasjcbkjbaskjcbajicba",
        param: make,
        param_2: cate,
        jenis: wfh_id,
      },
      global: false,
      success: function (response) {
        let obj = JSON.parse(response);
        console.log(make + " " + cate + " " + wfh_id);
        let moda = $("#moda");
        moda.empty();
        let data_hasil = obj.Data;
        for (let i = 0; i < obj.Data.length; i++) {
          moda.append(
            `<option value="${data_hasil[i]}">${data_hasil[i]}</option>`
          );
        }
        if (typeof callback === "function") {
          callback();
        }
      },
    });
  }

  function show_foto() {
    let unit_number = $("#unit_number").val();
    let register_id = $("#register_id").val();
    let tgl_buat_asli = $("#tgl_buat_asli").val();
    $.ajax({
      type: "POST",
      url: "https://www.rks-m.com/mks/entry/view/menu/bike/api/index.php?/foto_unit",
      data: { register_id: register_id, unit_number: unit_number },
      headers: {
        id: "mks",
        key: "mamamamamamamamamamamamamamama",
      },
      global: false,
      success: function (response) {
        let obj = JSON.parse(JSON.stringify(response));
        let data_hasil = obj["data"];
        let gbr_icon = "";
        let besar_file = "";
        console.log(data_hasil.length);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
        console.error("Full AJAX response:", jqXHR);
        Swal.fire({
          icon: "error",
          title: "Cek Data Gagal",
          text: "Gagal Mengecek Data!",
        });
      },
    });
  }
  hitFormula01();
  $(".hitung").on("input change", function () {
    hitFormula01();
    console.log(124);
  });

  $("#discDN").on("input", function () {
    let vdiscDN = $("#discDN").val();
    vdiscDN = vdiscDN.replace(/,/g, "");
    vdiscDN = parseFloat(vdiscDN);
    if (vdiscDN > 25) {
      $("#discDN").val("");
      $("#discDN").css("background-color", "#ffbbbb");
    } else {
      $("#discDN").css("background-color", "white");
    }
  });

  $("#discCN").on("input", function () {
    let vdiscCN = $("#discCN").val();
    vdiscCN = vdiscCN.replace(/,/g, "");
    vdiscCN = parseFloat(vdiscCN);
    if (vdiscCN > 25) {
      $("#discCN").val("");
      $("#discCN").css("background-color", "#ffbbbb");
    } else {
      $("#discCN").css("background-color", "white");
    }

    if ($("#discCN").val() == "") {
      // $('#selTAX').val('');
      $("#selPh21").val("");
      // $('#idTax').hide();
      $("#idPph21").hide();
    } else {
      // $('#idTax').show();
      $("#idPph21").show();
      // $('#selTAX').show();
      $("#selPh21").val("");
    }
  });
  setTimeout(() => {
    let get_pt = $("#get_pt_or_private").val();
    let Ncn = $("#discCN").val();
    js_cn_pt(get_pt, Ncn);
  }, 2000);

  $("#discCN,#sob_code").on("input", function () {
    let get_pt = $("#get_pt_or_private").val();
    let Ncn = $("#discCN").val();
    js_cn_pt(get_pt, Ncn);
  });
  $("#discCN,#sob_code").change(function () {
    let get_pt = $("#get_pt_or_private").val();
    let Ncn = $("#discCN").val();
    js_cn_pt(get_pt, Ncn);
  });
  function js_cn_pt(get_pt, Ncn) {
    // var vpt=$('#get_pt_or_private').val();
    // var Ncn=$('#discCN').val();

    console.log(Ncn);
    console.log(get_pt);

    // console.log('xxxx');

    if (get_pt == "COMPANY" && Ncn != "" && Ncn != null) {
      $("#tax23").removeClass("d-none");
      $("#pph21").removeClass("d-none");
      $("#tax23").addClass("d-flex");
      $("#pph21").addClass("d-none");
    }

    if (get_pt == "PRIVATE" && Ncn != "" && Ncn != null) {
      $("#tax23").removeClass("d-none");
      $("#pph21").removeClass("d-none");
      $("#pph21").addClass("d-flex");
      $("#tax23").addClass("d-none");
    }
  }

  // function show_number() {
  //   $("#add_photos").append(`
  // <table class='table table-bordered'>
  // <thead>
  //     <tr class='table-dark'>
  //     <th style='text-align: center ;vertical-align: middle;'>No</th>
  //     <th style='text-align: center ;vertical-align: middle;'>View</th>
  //     <th style='text-align: center ;vertical-align: middle;'>Upload</th>
  //     <th style='text-align: center ;vertical-align: middle;'>Del</th>
  //     </tr>
  // </thead>
  //   <tbody id='add_val'>
  //   </tbody>
  // </table>
  // `);
  //   for (let i = 1; i <= 10; i++) {
  //     $("#add_val").append(`
  //   <tr>
  //     <td style='text-align: center ;vertical-align: middle; width:10%'>
  //         ${i}
  //     </td>
  //     <td style='text-align: center ;vertical-align: middle; width:20%'><span>0 kb</span></td>
  //     <td style='text-align: center ;vertical-align: middle; width:60%'>
  //       <div class='d-flex flex-column' id='isitype${i}'>
  //         <div class='d-flex flex-row gap-1 align-items-center'>
  //           <span class='flex-shrink-0 hilangkanlah'>TYPE FOTO</span>
  //           <select class='form-select reform' aria-label='Default select example' id='type_foto_xx${i}' name='list_type_foto'>
  //             <option value='PILIH'>Choose</option>
  //             <option value='PERHIT'>Perhitungan Premi</option>
  //             <option value='H_PASAR'>Marketplaces's price</option>
  //             <option value='URL'>Url Web Harga Pasar</option>
  //             <option value='BAST'>Document Bast</option>
  //             <option value='KTP'>KTP</option>
  //             <option value='SIM'>SIM</option>
  //             <option value='STNK'>STNK</option>
  //             <option value='OTH'>Other</option>
  //           </select>
  //         </div>
  //         <input type='file' class='form-control mt-2' name=file_wfh_${i} id='file_wfh${i}' style='min-width: 100px;'  accept="image/jpg, image/jpeg" />
  //         <div class='d-flex flex-row gap-2 align-items-center mt-2'>
  //           <span class='kumaha${i} flex-shrink-0'>URL</span>
  //           <input type='text' class='kumaha${i} form-control' style='min-width: 100px;' maxlength="200"  id='' placeholder=''>
  //         </div>
  //         <div class='d-flex flex-row gap-2 align-items-center mt-2'>
  //           <span class='kumaga${i} flex-shrink-0'>price</span>
  //           <input type='text' class='kumaga${i} form-control numericinput' style='min-width: 100px;' id='' placeholder=''>\
  //       </div>
  //       </div>
  //     </td>
  //     <td style='text-align: center ;vertical-align: middle;width:10%'>
  //       <input type="checkbox" name='del_foto_${i}' value='1'>
  //     </td>
  //   </tr>
  //   `);
  //     $(`.kumaha${i}`).hide();
  //     $(`.kumaga${i}`).hide();
  //     $(`#type_foto_xx${i}`).change(function () {
  //       let isi = $(`#type_foto_xx${i}`).val();
  //       if (isi == "URL") {
  //         $(`#file_wfh${i}`).hide();
  //         $(`.kumaha${i}`).show();
  //         $(`.kumaga${i}`).hide();
  //       } else if (isi == "H_PASAR") {
  //         $(`#file_wfh${i}`).show();
  //         $(`.kumaha${i}`).hide();
  //         $(`.kumaga${i}`).show();
  //       } else {
  //         $(`#file_wfh${i}`).show();
  //         $(`.kumaha${i}`).hide();
  //       }

  //       if (screenWidth <= 515) {
  //         console.log(isi);
  //         $(".hilangkanlah").hide();
  //       }
  //     });
  //   }
  //   if (screenWidth <= 515) {
  //     $(".hilangkanlah").hide();
  //   }
  //   $(".numericinput").on("keyup", function (event) {
  //     var inputValue = $(this).val();
  //     var numericValue = inputValue.replace(/[^0-9]/g, "");

  //     var new_value = addCommas(numericValue);
  //     $(this).val(new_value);
  //   });

  //   $(".numericinput").on("keypress", function (event) {
  //     var inputValue = $(this).val();
  //     return ketikinput(event, "0123456789.", inputValue);
  //   });
  // }

  // function addCommas(number) {
  //   return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  // }

  //buat pelajaran

  // for (let i = 0; i < data_hasil.length; i++) {
  //   if (data_hasil[i]["Nama_foto"] != "") {
  //     let arraynama = data_hasil[i]["Nama_foto"].split(".");
  //     let ext_file_foto = arraynama[arraynama.length - 1].toLowerCase();
  //     if (ext_file_foto == "pdf") {
  //       gbr_icon = "fa-file-pdf-o";
  //     } else if (ext_file_foto == "jpeg" || ext_file_foto == "jpg") {
  //       gbr_icon = "fa-file-image-o";
  //     } else {
  //       gbr_icon = "fa-file";
  //     }

  //     $(`#nopimg-link${i + 1}`).append(`
  //     <a href='https://www.araksa.com/mks/entry/image/Auto/foto_rus/${data_hasil[i]["Nama_foto"]}' target='_blank'>
  //     <font style='color:green'>
  //         <i class='fa ${gbr_icon} fa-2x fa-fw'></i>
  //     </font>
  //     </a>
  //     `);
  //     besar_file = data_hasil[i]["besar_data"];
  //   } else {
  //     besar_file = 0;
  //   }
  //   if (data_hasil[i]["type_foto"] == "URL") {
  //     $(`#nopimg-link${i + 1}`)
  //       .append(`<a href='${data_hasil[i]["url_foto"]}' target='_blank'>
  //               <font style='color:blue'>
  //                  <i class='fa fa-link fa-lg fa-fw'></i>
  //               </font>
  //            </a>`);
  //   } else {
  //     $(`#nopimg-link${i + 1}`).append(`<br>${besar_file} kB`);
  //   }

  //   let tgl_buat_any = new Date(`${tgl_buat_asli}`);
  //   let tgl_berlaku = new Date("2022-10-06 00:00:00");
  //   if (tgl_buat_any > tgl_berlaku) {
  //     if (data_hasil[i]["type_foto"] == "URL")
  //       $(`#type_foto_xx${i}`).append(`
  //     <option value='' ${
  //       data_hasil[i]["type_foto"] == ""
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>Choose
  //     <option value='PERHIT' ${
  //       data_hasil[i]["type_foto"] == "PERHIT"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>PERTHITUNGAN PREMI
  //     <option value='H_PASAR'${
  //       data_hasil[i]["type_foto"] == "H_PASAR"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>MARKETPLACE'S PRICE
  //     <option value='URL'    ${
  //       data_hasil[i]["type_foto"] == "URL"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>URL WEB HARGA PASAR
  //     <option value='BAST'   ${
  //       data_hasil[i]["type_foto"] == "BAST"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>DOCUMENT BAST
  //     <option value='KTP'    ${
  //       data_hasil[i]["type_foto"] == "KTP"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>KTP
  //     <option value='SIM'    ${
  //       data_hasil[i]["type_foto"] == "SIM"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>SIM
  //     <option value='STNK'   ${
  //       data_hasil[i]["type_foto"] == "STNK"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>STNK
  //     <option value='OTH'    ${
  //       data_hasil[i]["type_foto"] == "OTH"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>OTHER
  //     `);
  //   } else {
  //     console.log(12345678);
  //     $(`#type_foto_xx${i}`).append(`
  //     <option value='' ${
  //       data_hasil[i]["type_foto"] == ""
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>Choose
  //     <option value='PERHIT' ${
  //       data_hasil[i]["type_foto"] == "PERHIT"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>PERTHITUNGAN PREMI
  //     <option value='SPPA' ${
  //       data_hasil[i]["type_foto"] == "SPPA"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>SPPA
  //     <option value='H_PASAR'${
  //       data_hasil[i]["type_foto"] == "H_PASAR"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>MARKETPLACE'S PRICE
  //     <option value='URL'    ${
  //       data_hasil[i]["type_foto"] == "URL"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>URL WEB HARGA PASAR
  //     <option value='LR'   ${
  //       data_hasil[i]["type_foto"] == "LR"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>LOSS RATIO
  //     <option value='KTP'    ${
  //       data_hasil[i]["type_foto"] == "KTP"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>KTP
  //     <option value='SIM'    ${
  //       data_hasil[i]["type_foto"] == "SIM"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>SIM
  //     <option value='STNK'   ${
  //       data_hasil[i]["type_foto"] == "STNK"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>STNK
  //     <option value='OTH'    ${
  //       data_hasil[i]["type_foto"] == "OTH"
  //         ? " selected "
  //         : ' readonly style="background-color:powderblue;" '
  //     }>OTHER
  //     `);
  //   }
  // }

  $(document).ajaxStart(function () {
    Swal.fire({
      title: "Prosessing.......",
      html: "",
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
      },
      willClose: () => {
        clearInterval();
      },
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
      }
    });
  });

  $(document).ajaxComplete(function () {
    Swal.fire({
      title: "Prosessing.......",
      html: "",
      timer: 1,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
      },
      willClose: () => {
        clearInterval();
      },
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
      }
    });
  });
});
