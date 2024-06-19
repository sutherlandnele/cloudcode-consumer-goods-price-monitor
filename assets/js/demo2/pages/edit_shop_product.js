"use strict";
// Class definition

var EditShopProduct = function () {       
    
     // Private functions 
    var validator;
    
    var datePicker = function(){

        var arrows;

        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        } 

        // enable clear button 
        $('#discount_price_start, #discount_price_end').datepicker({
            rtl: KTUtil.isRTL(),
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true, 
            format:'dd/mm/yyyy',         
            templates: arrows
        });
    }

    var inputMasks = function(){

        $("#current_price,#discount_price").inputmask('decimal',{
            rightAlign: false,   
            prefix: 'K ',        
            allowPlus: false,
            digitsOptional: false,
            groupSeparator: ",",
            autoGroup: true,
            allowMinus: false,
            clearMaskOnLostFocus: false,
            removeMaskOnSubmit: true,
            digits: 2
        }); 

    }
    var liveSearchInit = function(){
        $('select#product_id').selectpicker();  
        $('select#shop_id').selectpicker();  

        $('select#shop_id').on('changed.bs.select', function() {
            validator.element($(this)); // validate element
        });

        $('select#product_id').on('changed.bs.select', function() {
            validator.element($(this)); // validate element
        });
    }
    var save = function() {
       
        // Handles 
		$('#edit_shop_product_save_default').click(function() {                  
            $('#edit_shop_product_form').submit();
        });

    }  
    
    var initValidation = function () {
        validator = $( "#edit_shop_product_form" ).validate({
            // define validation rules
            rules: {
            
                'input_val[shop_id]': {
                    required: true
                },
                'input_val[product_id]': {
                    required: true
                },
                'input_val[current_price]': {
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
                // swal({
                //     "title": "", 
                //     "text": "Shop Product Created Successfully!", 
                //     "type": "success",
                //     "confirmButtonClass": "btn btn-secondary"
                // });

                return true;
            }
        });       
    }
    return {
        // public functions
        init: function() {             
           
            datePicker();
            inputMasks();
            liveSearchInit();
            save();
            initValidation();
        }
    };
}();

EditShopProduct.init();

