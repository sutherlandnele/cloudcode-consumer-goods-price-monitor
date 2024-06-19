"use strict";
// Class definition

var EditProduct = function () {       
    
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

                var thisDropzone = this;

                thisDropzone.on("error", function(file, message) {                    
                    
                    PageAlert.error("An error occured",message);
                    thisDropzone.removeFile(file); 
                });        
                
                if(typeof g_product_image !== 'undefined' && g_product_image !='')
                {
                    
                    $.post(g_base_url + 'Product/ajax_get_image',
                        {                            
                            file_name: g_product_image
                        },
                        function(response,status){                            
                            let parsedResponse = JSON.parse(response); 
                            if(parsedResponse.status !== 'error'){

                                var mockFile = {
                                    name: g_product_image,
                                    size: parsedResponse.size,
                                    accepted: true,
                                    kind: 'image',
                                    upload: {
                                        filename: g_product_image,
                                    },
                                    dataURL: g_base_url + 'uploads/products/' + g_product_image,
                                    upload_ticket: parsedResponse.upload_ticket
                                };
                                
                                thisDropzone.files.push(mockFile);
                                thisDropzone.emit("addedfile", mockFile);
                                thisDropzone.createThumbnailFromUrl(
                                    mockFile,
                                    thisDropzone.options.thumbnailWidth,
                                    thisDropzone.options.thumbnailHeight,
                                    thisDropzone.options.thumbnailMethod,
                                    true,
                                    function(thumbnail) {
                                        thisDropzone.emit('thumbnail', mockFile, thumbnail);
                                        thisDropzone.emit("complete", mockFile);
                                    }
                                );                               
                            }
                        }
                    );
                }

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
                    //  PageAlert.success("Operation completed successfully",parsedResponse.info);
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
                    // PageAlert.success('File uploaded successfully',parsedResponse.info);                    

                }
                else{
                    PageAlert.error("An error occured",parsedResponse.info); 
                    
                }
                file.upload_ticket = parsedResponse.file_link;                
            }
        };
    }

    var save = function() {
       
        // Handles 
		$('#edit_product_save_default').click(function() {                  
            $('#edit_product_form').submit();
        });

    }  
    var initWidgets = function(){
        // $('select#product_category_id').selectpicker();  

        // $('select#product_category_id').on('changed.bs.select', function() {
        //     validator.element($(this)); // validate element
        // });

    }

    var initValidation = function () {
        validator = $( "#edit_product_form" ).validate({
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
            save();
            initWidgets();
            initValidation();
        }
    };
}();

EditProduct.init();

