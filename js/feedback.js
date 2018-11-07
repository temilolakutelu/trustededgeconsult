
$("input[name=submit]").click((e) => {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $("#feedback").attr("action"),
        data: $("#feedback").serialize(),
        success: (data) => {
            $('#feedback').each(function () {
                this.reset();
                grecaptcha.reset();
            }

            );
        }
    });
});

