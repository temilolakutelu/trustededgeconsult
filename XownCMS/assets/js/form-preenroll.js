$(function() {
    var options = [];
    $("#cus_id").select2({width: '100%'});
    
    $('#cus_id').on('change', function (evt) {
        var $cus_id = $(this).val();
        var $policy_code = $('#policy_code').val();
        if(($cus_id != '') && ($policy_code != '')){
            $first = '<option value="">Select a Plan</option>';
            options = [];
            $('.plan_select').html($first);
            $.post("getPlan", {policy_code: $policy_code, cus_id: $cus_id}, function (data) {
                if (!jQuery.isEmptyObject(data)) {
                    $('.plan_select').html('');
                    $('.plan_select').append($first);
                    $(jQuery.parseJSON(JSON.stringify(data))).each(function () {
                        $html = '<option value="'+this.id+'">'+this.name+'</option>';
                        $('.plan_select').append($html);
                        options.push($html);
                    });
                } else {
                    alert('Error in getting policy record or policy record not found, please contact the admin');
                }
            }, "json");
        }
    });
    
    $('#policy_code').on('change', function (evt) {
        var $policy_code = $(this).val();
        var $cus_id = $('#cus_id').val();
        if(($cus_id != '') && ($policy_code != '')){
            $first = '<option value="">Select a Plan</option>';
            options = [];
            $('.plan_select').html($first);
            $.post("getPlan", {policy_code: $policy_code, cus_id: $cus_id}, function (data) {
                if (!jQuery.isEmptyObject(data)) {
                    $('.plan_select').html('');
                    $('.plan_select').append($first);
                    $(jQuery.parseJSON(JSON.stringify(data))).each(function () {
                        $html = '<option value="'+this.id+'">'+this.name+'</option>';
                        $('.plan_select').append($html);
                        options.push($html);
                    });
                } else {
                    alert('Error in getting policy record or policy record not found, please contact the admin');
                }
            }, "json");
        }
    });
});
