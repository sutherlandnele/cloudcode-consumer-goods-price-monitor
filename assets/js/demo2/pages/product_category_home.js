"use strict";
// Class definition

var ProductCategoriesHome = function () {  
    
    var goodCategoriesInit = function(){
        $('.kt-grid-nav-v2__item').on("click",function(e){
            // e.preventDefault();
            // alert('Hellow!');
        });
    }
        
    return {
        // public functions
        init: function() {             
            goodCategoriesInit();

        }
    };
}();

ProductCategoriesHome.init();

