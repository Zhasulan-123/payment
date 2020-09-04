$(document).ready(function () {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
  });

  $(".clear_count_sum").on("click", function (e) {
    e.preventDefault();
    if (confirm("Вы действительно хотите очистить ?")) {
      $.ajax({
        type: "POST",
        data: { _csrf: yii.getCsrfToken() },
        url: "/payment/clear",
        dataType: "JSON",
        success: function (response) {
          if (response.success) {
            $(".past_sum > tbody").html(response.html);

            Toast.fire({
              icon: "success",
              title: "Ваше списки платеж быль очистино !!!",
            });
          }
          if (response.error) {
            Toast.fire({
              icon: "error",
              title: "Ваше списки платеж не очистино error !!!",
            });
          }
        },
      });
    }
  });

  $(".add_sum_count").on("click", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      data: {
        _csrf: yii.getCsrfToken(),
      },
      url: "/payment/create",
      dataType: "JSON",
      success: function (response) {
        if (response) {
          Toast.fire({
            icon: "success",
            title: "Ваше списки платежы были успешно отправлено !!!",
          });
          $.ajax({
            type: "POST",
            data: { _csrf: yii.getCsrfToken() },
            url: "/payment/clear",
            dataType: "JSON",
            success: function (response) {
              if (response.success) {
                $(".past_sum > tbody").html(response.html);
              }
            },
          });
        }
      },
    });
  });

  $(".past_sum").on("click", ".delete_sum", function (e) {
    e.preventDefault();
    var id = $(this).data("id");

    if (confirm("Вы действительно хотите удалить ?")) {
      $.ajax({
        type: "POST",
        data: {
          _csrf: yii.getCsrfToken(),
          id: id,
        },
        url: "/payment/delete",
        dataType: "JSON",
        success: function (response) {
          if (response.success) {
            $(".past_sum > tbody").html(response.html);

            Toast.fire({
              icon: "success",
              title: "Ваше платеж было удалено !!!",
            });
          }
          if (response.error) {
            Toast.fire({
              icon: "error",
              title: "Ваше списки платеж не удалено error !!!",
            });
          }
        },
      });
    }
  });

  $.validator.setDefaults({
    submitHandler: function () {
      var id = Math.floor(Math.random() * 10) + 1;

      var order_number = Math.floor(Math.random() * 20) + 1;

      var name = $(".namePrice").val();

      var sum = $(".sumPrice").val();

      var signature = [];

      $(".signaturePrice").each(function () {
        if ($(this).prop("checked") == true) {
          signature = 1;
        } else {
          signature = 0;
        }
      });

      let data = [];
      data.push(
        {
          name: "_csrf",
          value: yii.getCsrfToken(),
        },
        {
          name: "id",
          value: id,
        },
        {
          name: "order_number",
          value: order_number,
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
          name: "signature",
          value: signature,
        }
      );

      $.ajax({
        type: "POST",
        url: "/payment/add",
        data: data,
        dataType: "JSON",
        success: function (response) {
          if (response.success) {
            Toast.fire({
              icon: "success",
              title: "Ваше платеж добавлено в списки платеж !!!",
            });
            $(".past_sum > tbody").html(response.html);
            $("#payingForm").trigger("reset");
          }
          if (response.error) {
            Toast.fire({
              icon: "error",
              title: "Ваше платеж не добавлено в списки платеж !!!",
            });
          }
        },
      });
    },
  });
  $("#payingForm").validate({
    rules: {
      name: {
        required: true,
      },
      sum: {
        required: true,
        minlength: 2,
        maxlength: 3,
        digits: true,
      },
      signature: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Это Имя должно быть заполнено !!!",
      },
      sum: {
        required: "Обязательное поле Сумма !!!",
        minlength: "Минимальный сумма 10руб !!!",
        maxlength: "Максимальный сумма 500руб !!!",
        digits: "Только цифры обязательно !!!",
      },
      signature: {
        required: "Обязательное поле подпись !!!",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
});
