$('form[name="create_client"]').submit(function (event) {
    event.preventDefault();
    //var formData = JSON.stringify($("#create_client").serializeArray());
    var data = {
        "first_name": $("input[name=first_name]").val(),
        "last_name": $("input[name=last_name]").val(),
        "client_email": $("input[name=client_email]").val(),
        "client_code": $("input[name=client_code]").val(),
        "client_mobile": $("input[name=client_mobile]").val(),
        "url": $("input[name=url]").val(),
        "client_password": $("input[name=client_password]").val(),
        "confirm_password": $("input[name=confirm_password]").val(),
        "phone": $("input[name=phone]").val(),
        "personal_email": $("input[name=address]").val(),
        "address": $("input[name=personal_email]").val(),
        "zipcode": $("input[name=zipcode]").val(),
        "office_address": $("input[name=office_address]").val(),
        "office_phone": $("input[name=office_phone]").val(),
        "gst_number": $("input[name=gst_number]").val(),
        "pan_number": $("input[name=pan_number]").val(),
        "adhar_number": $("input[name=adhar_number]").val(),
        "brand_name": $("input[name=brand_name]").val(),
        "city_name": $("input[name=city_name]").val(),
        "state_id": $("input[name=state_id]").val(),
        "country_id": $("input[name=country_id]").val(),
        "id": $("input[name=id]").val(),

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