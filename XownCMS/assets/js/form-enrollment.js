$(function() {
    var options = [];
    var spouseForm;
    var dependentsForm;
    
   
    
   
    
    $('#spouse').on('click', function (e) {
        if($(this).is(':checked')){
            $('#wizard-form').stepy('destroy');
            $('input.finish').remove();
            $('fieldset.principal-form').after(spouseForm);
            stepyActivation();
        }
        else{
            $('#wizard-form').stepy('destroy');
            spouseForm = $('.spouse');
            $('.spouse').remove();
            stepyActivation();
        }
    });
    
    $('#dependents').on('click', function (e) {
        if($(this).is(':checked')){
            $('#wizard-form').stepy('destroy');
            $('input.finish').remove();
            $('fieldset').last().after(dependentsForm);
            stepyActivation();
        }
        else{
            $('#wizard-form').stepy('destroy');
            dependentsForm = $('.dependents');
            $('.dependents').remove();
            stepyActivation();
        }
    });
    
    function stepyActivation(){
        //remove previous header
        $('#wizard-form-header').remove();
        
        //adding the sumbmit button which was remove when stepy was destroyed
        $('#children').after('<input type="submit" class="finish btn-success btn" value="Add" />');
        
        //Load Wizards
        $('#wizard-form').stepy({finishButton: true, titleClick: false, block: true, validate: true});

        //Add Wizard Compability - see docs
        $('.stepy-navigator').wrapInner('<div class="pull-right"></div>');

        //Make Validation Compability - see docs
        $('#wizard-form').validate({
            errorClass: "help-block",
            validClass: "help-block",
            highlight: function(element, errorClass, validClass) {
               $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass("has-error");
            }
        });
        
    }
});
