$('form[name="create_users"]').submit(function (event) {
    event.preventDefault();
    //var formData = JSON.stringify($("#create_client").serializeArray());
    var data = {
        "first_name": $("input[name=first_name]").val(),
        "last_name": $("input[name=last_name]").val(),
        "client_email": $("input[name=client_email]").val(),
        "client_mobile": $("input[name=client_mobile]").val(),
        "client_password": $("input[name=client_password]").val(),
        "confirm_password": $("input[name=confirm_password]").val(),
        "id": $("input[name=id]").val(),

    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: SITE_URL + "/createUsers", //Relative or absolute path to response.php file
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