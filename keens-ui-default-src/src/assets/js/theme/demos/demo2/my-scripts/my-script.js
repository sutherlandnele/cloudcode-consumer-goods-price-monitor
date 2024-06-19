"use strict";
// Class definition

var PageAlert = function () {     
    
    //private properties
    var target;
    var alertTitle;
    var alertMessage;

    var initAlertDom = function(eid,title,message){
        target =  KTUtil.get(eid);   
        alertTitle = KTUtil.find(target, '.toast-title');
        alertMessage = KTUtil.find(target, '.toast-body'); 
        KTUtil.setHTML(alertTitle,title);
        KTUtil.setHTML(alertMessage,message);  
        // Init toast
        $(target).toast({
            delay: 4000
        }); 
    }
    
    // Private functions 
    var successAlert = function (title,message) {         
        initAlertDom('cc_success_page_alert',title,message);      
        $(target).toast('show');   
    }

    var errorAlert = function (title,message) {             
        initAlertDom('cc_error_page_alert',title,message);      
        $(target).toast('show');   
    }

    var warningAlert = function (title,message) {             
        initAlertDom('cc_warning_page_alert',title,message);      
        $(target).toast('show');   
    }

    var infoAlert = function (title,message) {             
        initAlertDom('cc_info_page_alert',title,message);      
        $(target).toast('show');   
    }
    
    return {
        // public functions
        success: function(title,message){
            successAlert(title,message);
        },  
        error: function(title,message){
            errorAlert(title,message);
        },
        warning: function(title,message){
            warningAlert(title,message);
        },
        info: function(title,message){
            infoAlert(title,message);
        }       
    };
}();

var AllPageInit = function () {     
    
    var pageInit = function () {             

        $("#btn_login").click(function(e){
            window.open(g_base_url + "./../user-login",'_blank');       
          });    

        $('[data-toggle="tooltip"]').tooltip();
        
        //modal image display
        $("#myModalImg").click(function(e){
            $('#myModalDialog').css('display', 'block');            
            $("#myModalImg01").attr("src", $(this).attr("src"));
            $("#myModalImgCaption").html($(this).attr("alt"));
        });

        $(".myModalDialogClose:first").click(function(e){
            $('#myModalDialog').css('display', 'none');      
        });

        
    }
    
    return {
        // public functions
        init: function(){
            pageInit();
        }
    };
}();

// Init on page load completed
KTUtil.ready(function() {
    AllPageInit.init();
});
