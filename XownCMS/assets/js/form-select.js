$(function() {
    var options = [];
    $("#scheme_id, #customer_id").select2({width: '100%'});
    
    $('.datepicker-pastdisabled').datepicker({
        todayHighlight: true,
        startDate: "-3d",
        format: 'yyyy-mm-dd',
    });
    
    $('#scheme_id').on('change', function (evt) {
        var $scheme_id = $(this).val();
        $first = '<option value="">Select a Plan</option>';
        options = [];
        $('.plan_select').html($first);
        $.post("getPlan", {scheme_id: $scheme_id}, function (data) {
            if (!jQuery.isEmptyObject(data)) {
                $('.plan_select').html('');
                $('.plan_select').append($first);
                $(jQuery.parseJSON(JSON.stringify(data))).each(function () {
                    $html = '<option value="'+this.id+'">'+this.name+'</option>';
                    $('.plan_select').append($html);
                    options.push($html);
                });
            } else {
                alert('Error in getting plan or scheme does not have any plan, please contact the admin');
            }
        }, "json");
    });
    
    var number = 1;
    
    function planHtml(number){
        
         return '<div class="recordset">'
                        + '<div class="form-group col-md-5">'
                        + '<label for="plan_id_' +number+'" class="control-label">Plan<span class="required">*</span></label>'
                        + '<select id="plan_id_' +number+'" style="width:100% !important" class="plan_select form-control" name="plan_id_' +number+'" required>'
                            + '<option value="">Select a Plan</option>'
                            + options
                        + '</select>'
                    + '</div>'
                    + '<div class="form-group col-md-5">'
                        + '<label for="quantity_' +number+'" class="control-label">Quantity<span class="required">*</span></label>'
                        + '<input type="text" class="form-control" name="quantity_' +number+'" id="quantity_' +number+'" required/>'
                    + '</div>'
                    + '<div class="col-md-2">'
                        + '<label style="visibility: hidden;" class="control-label">ffff</label>'
                        + '<button class="btn btn-primary remove form-control" style="color: #fff">Remove</button>'
                    + '</div>'
                + '</div>'; 
    }
    
    $("#addMore").click(function(e){
        $('#planContainer').append(planHtml(number));
        number++;
        $('#plan_number').val(number);
    });
    
    $(document).on('click', '.remove', function () {
        $(this).parent().parent().remove();
        number--;
        $('#plan_number').val(number);
    });
    
});

$(document).ready(function() {
     var total_price= $("#t_total").val();
      $('#dis_total_amount').html('<span>&#8358;</span> '+Number(+total_price).toLocaleString('en'));
     $('#amount_price').hide();
    $('#percent_price').hide();
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'amount') {
            $('#percent_price').hide();
            $('#amount_price').show();
             
        }
        else if (this.value == 'percentage') {
            $('#amount_price').hide();
             $('#percent_price').show();
        }
    });
    
      $("#amount_price").on('keyup', function() {    
            var disc_price= $(this).val();
            var total_price= $("#t_total").val();
            var f_price= total_price - disc_price;
            
          
            $('#dis_total_amount').html('<span>&#8358;</span> '+Number(+f_price).toLocaleString('en'));
            $('#f_total').val(f_price);
        
        }); 
    
     $("#percent_price").on('keyup', function() {    
            var disc_price= $(this).val();
            var total_price= $("#t_total").val();
            var f_price= total_price-(total_price * disc_price/100);
            $('#dis_total_amount').html('<span>&#8358;</span> '+Number(+f_price).toLocaleString('en'));
            $('#f_total').val(f_price);
        
        }); 
    
});
    
   


