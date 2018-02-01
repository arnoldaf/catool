$('form[name="create_client"]').submit(function (event) {
    event.preventDefault();
    //var formData = JSON.stringify($("#create_client").serializeArray());
    var data = {
        "first_name": $("input[name=first_name]").val(),
        "client_email": $("input[name=client_email]").val()
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: SITE_URL + "/createClient", //Relative or absolute path to response.php file
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