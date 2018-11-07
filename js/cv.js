$(document).ready(function () {
    $('#Mybtn').click(function () {
        $('#myform').toggle(500);
    });

    $("#form-close").click((e) => {
        $('#myform').toggle(500);
    });
});