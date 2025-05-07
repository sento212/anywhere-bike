$(document).ready(function () {
  new DataTable("#list_quotation", {
    columnDefs: [{ width: 10, targets: 0 }],
    pagingType: "simple_numbers",
    // layout: {
    //   top1Start: {
    //     buttons: ["copy", "csv", "excel", "pdf", "print"],
    //   },
    // },
  });

  $("#select_all").change(function (e) {
    if ($("#select_all").is(":checked")) {
      $(".list_check_table").prop("checked", true);
    } else {
      $(".list_check_table").prop("checked", false);
    }
  });
});
