"use strict";
// Class definition

var AddNewProduct = function () {       
    
    // Private functions 
    var validator;

     var dropZone = function () {     
        Dropzone.options.imageFileDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.gif,.png",
            dictMaxFilesExceeded: "No more files please! Max files to be uploaded is {{maxFiles}}",
            init: function(){
                this.on("error", function(file, message) {                    
                    
                    PageAlert.error("An error occured",message);
                    this.removeFile(file); 
                });               

            },           
            removedfile: function(file) {   
                                             
                $.ajax({
                    type: 'POST',
                    url: g_base_url + 'Product/ajax_delete_image',
                    data: {
                            target_file: file.upload_ticket                          
                        }  
                })
                .done(function(response){
                    let parsedResponse = JSON.parse(response);                    
                    // PageAlert.success("Operation completed successfully",parsedResponse.info);
                 })
                .fail(function(jqXHR, textStatus){
                    PageAlert.error("An error occured",textStatus);
                });

                 var _ref;
                 return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function(file,response){
                
                let parsedResponse = JSON.parse(response);

                if(parsedResponse.status === 'success'){    
                    // PageAlert.success('File upload','File uploaded successfully.'); 
                }
                else{
                    // PageAlert.success("An error occured",parsedResponse.info); 
                }
                file.upload_ticket = parsedResponse.file_link;                
            }
        };
    }

    var save = function() {
       
        // Handles 
		$('#new_product_save_default').click(function() {            
            $('#add_new_product_form').submit();
        });

    }  

    var initWidgets = function(){
        // $('select#product_category_id').selectpicker();  

        // $('select#product_category_id').on('changed.bs.select', function() {
        //     validator.element($(this)); // validate element
        // });

    }

    var initValidation = function () {
        validator = $( "#add_new_product_form" ).validate({
            // define validation rules
            rules: {
            
                'input_val[name]': {
                    required: true
                },
                'input_val[product_category_id]': {
                    required: true
                },
                'input_val[size]': {
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
            dropZone(); 
            initWidgets();
            save();
            initValidation();
        }
    };
}();

AddNewProduct.init();

