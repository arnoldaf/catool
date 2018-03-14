$('form[name="create_role"]').submit(function (event) {
    event.preventDefault();
        "name": $("input[name=name]").val(),
        "id": $("input[name=id]").val(),

    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: SITE_URL + "/createRole", //Relative or absolute path to response.php file
        data: data,
        success: function (data) {
            if (data.result === false) {
                $(".alert-message").removeClass("hide");
                $(".alert-message div").removeClass("alert-success").addClass("alert-danger");
                $(".alert-message div").html(data.message);
            } else {
                $(".alert-message").removeClass("hide");
                $(".alert-message div").removeClass("alert-danger").addClass("alert-success");
                $(".alert-message div").html(data.message);
            }
        }
    });
});