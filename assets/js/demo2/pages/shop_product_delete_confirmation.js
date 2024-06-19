"use strict";
// Class definition

var ShopProductDeleteConfirmation = function () {       
    
     // Private functions 

    var deleteShopProduct = function() {
       
        // Handles 
		$('#shop_product_delete_yes').click(function(e) {  
            e.preventDefault();                
            $('#delete_shop_product_confirmation_form').submit();
        });

    }  
    
    
    return {
        // public functions
        init: function() {     
            deleteShopProduct();
        }
    };
}();

ShopProductDeleteConfirmation.init();

