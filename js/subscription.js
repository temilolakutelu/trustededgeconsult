$(document).ready(function () {

    var delay = 8000; // milliseconds
    var cookie_expire = 0; // days

    var cookie = localStorage.getItem("list-builder");
    if (cookie == undefined || cookie == null) {
        cookie = 0;
    }

    if (((new Date()).getTime() - cookie) / (1000 * 60 * 60 * 24) > cookie_expire) {
        $("#list-builder").delay(delay).fadeIn("fast", () => {
            $("#popup-box").fadeIn("fast", () => { });
        });

        $("#popup-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "Post",
                url: $("#popup-form").attr("action"),
                data: $("#popup-form").serialize(),
                success: (data) => {
                    $("#popup-box-content").html("<p style='text-align: center; font-size:16px; color:#f8f8f8;'>Thank you for subscribing to TrustedEdge Consult Newsletter!</p>");

                }
            });
        });

        $("#popup-close").click((e) => {
            $("#list-builder, #popup-box").hide();
            localStorage.setItem("list-builder", (new Date()).getTime());
        });
    }



});