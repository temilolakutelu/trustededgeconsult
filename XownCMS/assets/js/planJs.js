$(function() {
    $('#plan_type').change(function(e){
        if(($(this).val() != '')&&($('#master_plan_id').val()!= '')){
            var name = $('#master_plan_id option:selected').text()+'-'+$('#plan_type option:selected').text();
            $('#name').val(name);
        }
    });
    $('#master_plan_id').change(function(e){
        if(($(this).val() != '')&&($('#plan_type').val()!= '')){
            var name = $('#master_plan_id option:selected').text()+'-'+$('#plan_type option:selected').text();
            $('#name').val(name);
        }
    });
});
