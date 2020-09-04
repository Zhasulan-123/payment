$(document).ready(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
  });

  $("body").on("click", ".click_admin_sum", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $("#modal-lg").modal("show");
    $("#modal-lg")
      .find(".modal-content")
      .load("/admin/payment/select?id=" + id);
  });

  $("body").on("click", ".click_form_sum", function (e) {
    e.preventDefault();

    var name = $(".name_value").val();

    var sum = $(".sum_value").val();

    var user_id = $(".order_number_value").val();

    var commision = $(".commision_value_form").val();

    let data = [];
    data.push(
      {
        name: "_csrf",
        value: yii.getCsrfToken(),
      },
      {
        name: "name",
        value: name,
      },
      {
        name: "sum",
        value: sum,
      },
      {
        name: "user_id",
        value: user_id,
      },
      {
        name: "commision",
        value: commision,
      }
    );

    $.ajax({
      type: "POST",
      url: "/admin/payment/create",
      data: data,
      dataType: "JSON",
      success: function (data) {
        if (data.success) {
          $("#modal-lg").modal("toggle");
          Toast.fire({
            icon: "success",
            title: "В обработку данный было добавлено !!!",
          });
        }
      },
    });
  });
});
