$(document).ready(function () {
    $("#createPostBtn").click(function () {
        if($(this).data('login') == "#")
            $("#createPost").modal();
        else
            document.location.href = $(this).data('login');
    });
    $("#category").change(function () {
        if ($(this).val() == "Textbooks" || $(this).val() == "Video Games") {
            $("#if1").show();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").hide();
            $("#ifOther").hide();
        } else if ($(this).val() == "Electronics") {
            $("#if1").hide();
            $("#if2").show();
            $("#if3").hide();
            $("#if4").hide();
            $("#ifOther").hide();
        } else if ($(this).val() == "Clothing" || $(this).val() == "Furniture") {
            $("#if1").hide();
            $("#if2").hide();
            $("#if3").show();
            $("#if4").hide();
            $("#ifOther").hide();
        } else if ($(this).val() == "Automotive") {
            $("#if1").hide();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").show();
            $("#ifOther").hide();
        } else {
            $("#if1").hide();
            $("#if2").hide();
            $("#if3").hide();
            $("#if4").hide();
            $("#ifOther").show();
        }
    });
    $("#category").trigger("change");

    $(".card-contact-info").hide();
    $(".view-contact-details").click(function () {
        if ($(this).text() == "View Contact Information") {
            $(this).closest("div").find(".card-contact-info").show();
            $(this).text("Hide Contact Information");
        }
        else {
            $(this).closest("div").find(".card-contact-info").hide();
            $(this).text("View Contact Information");
        }

    });

});

