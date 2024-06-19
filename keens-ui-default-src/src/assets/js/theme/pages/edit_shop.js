"use strict";
// Class definition

var EditShop = function () {       
    
    // Private functions 
    var validator;

    var inputMasks = function(){

        // $("#location_latitude,#location_longtitude").inputmask('decimal',{
        //     rightAlign: false,             
        //     allowPlus: false,
        //     digitsOptional: false,
        //     groupSeparator: ",",
        //     autoGroup: true,
        //     allowMinus: false,
        //     clearMaskOnLostFocus: false,
        //     removeMaskOnSubmit: true,
        //     digits: 2
        // }); 

    }

    var save = function() {
       
        // Handles 
		$('#edit_shop_save_default').click(function() {                  
            $('#edit_shop_form').submit();
        });

    }  

    var initValidation = function () {
        validator = $( "#edit_shop_form" ).validate({
            // define validation rules
            rules: {
            
                'input_val[name]': {
                    required: true
                },
                'input_val[city_id]': {
                    required: true
                },
                'input_val[location_latitude]': {
                    required: true
                },
                'input_val[location_longtitude]': {
                    required: true
                }
 
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                swal({
                    "title": "", 
                    "text": "There are some errors in your submission. Please correct them.", 
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary kt-btn kt-btn--wide",
                    "onClose": function(e) {
                        //console.log('on close event fired!');
                    }
                });

                event.preventDefault();
            },

            submitHandler: function (form) {
                return true;
            }
        });       
    }    
    
    return {
        // public functions
        init: function() {
            
            inputMasks();
            save();
            initValidation();
        }
    };
}();

EditShop.init();

