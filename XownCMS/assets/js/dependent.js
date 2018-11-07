$(function () {
    $('#btn-lookup').click(function (e) {
        e.preventDefault();
        var $pemail = $('#p_email').val();
        $.post("lookup", {pemail: $pemail}, function (data) {
            if (!jQuery.isEmptyObject(data)) {
                pData = data;
                $('#p_first_name').val(pData.first_name);
                $('#p_last_name').val(pData.last_name);
                $('#p_middle_name').val(pData.middle_name);
                $('#company_code').val(pData.company_code);
                $('#pmail').val($pemail);
            } else {
                alert('The Principal Does not Exist');
            }
        }, "json");
    });
});
