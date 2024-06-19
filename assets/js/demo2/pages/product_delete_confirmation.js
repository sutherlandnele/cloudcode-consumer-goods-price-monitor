"use strict";
// Class definition
var ProductView = function () {      

    var map;
    var markers = [];

	var initTable1 = function() {

	
		// begin first table
		var table = $('#product_view_datatables').DataTable({
		
			// Pagination settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i>>`,			
			pageLength: 5,
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: { 
				url: g_base_url + 'ShopProduct/get_shop_products',
                type: 'POST',
                data:{ 			
                    product_id:	$('#product_id').val()!='' ? $('#product_id').val() : '',
                    shop_id: ''
				}
			},
			columns: [			
          {data: 'id'},				
          {data: 'shop'},
          {data: 'shop_id'},
          {data: 'product'},
          {data: 'product_id'},
          {data: 'current_price'},
          {data: 'discount_price'},
          {data: 'discount_price_start'},
          {data: 'discount_price_end'}
       		],
			columnDefs: [
				{
					targets: [0,2,3,4],
					visible: false
                },
                {
					targets: 1,
					title: 'Shop',
					render: function(data, type, full, meta) {
						
						var output;

						var stateNo = KTUtil.getRandomInt(0, 7);
						var states = [
							'success',
							'brand',
							'danger',
							'accent',
							'warning',
							'metal',
							'primary',
							'info'];

						var state = states[stateNo];

						output = `
							<div class="kt-user-card-v2">
								<div class="kt-user-card-v2__pic">
									<div class="kt-badge kt-badge--xl kt-badge--` + state + `"><span>` + full['shop'].substring(0, 1) + `</span></div>
								</div>
								<div class="kt-user-card-v2__details">
									<a href="` + g_base_url + 'Shop/view/' + full.shop_id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['shop'] + `</span></a>                           
								</div>
							</div>`;
						

						return output;
					},
				},
				{
					targets: 6,
					render: function(data, type, full, meta) {				
						if (data.replace("K","") === '0.00') {
							return '--';
						}
						return '<h5><span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">' +  data + '</span></h5>';
					},
				}

			]
		});
    };
    
    var initProductShopLocationsMap = function() {
        
        var center = {lat: -6.452617, lng: 147.816742}; //center on PNG Map
        
        map = new google.maps.Map(document.getElementById('product_shop_locations_map'), {
            zoom: 6.5,
            center: center
        });
    }

    // Adds a marker to the map and push to the array.
    var addMarker = function(lat, lon, title,desc) {
        var infowindow =  new google.maps.InfoWindow({});
        var marker = new google.maps.Marker({
          position:  new google.maps.LatLng(lat, lon),
          map: map,
          title: title
        });
  
        google.maps.event.addListener(marker, 'click', (function (marker) {
          return function () {
            infowindow.setContent(desc);
            infowindow.open(map, marker);
          }
        })(marker));   
  
        markers.push(marker);
      }
  
      // Sets the map on all markers in the array.
      var setMapOnAll = function (map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }
      // Shows any markers currently in the array.
      var showMarkers = function() {
        setMapOnAll(map);
      }
      // Removes the markers from the map, but keeps them in the array.
      var clearMarkers = function() {
        setMapOnAll(null);
      }
  
      // Deletes all markers in the array by removing references to them.
      var deleteMarkers = function() {
        clearMarkers();
        markers = [];
      }
  
       // Get and display all markers
      var showProductShopLocations = function(locations){
        deleteMarkers();
        var count;
        for (count = 0; count < locations.length; count++) {
          addMarker(locations[count][1], locations[count][2], locations[count][0],locations[count][0]);         
        }
        showMarkers();        
      }
  


	return {

		//main function to initiate the module
		init: function() {
            initTable1();
            initProductShopLocationsMap();

            if($('#product_id').val() != ''){          
                $.post(g_base_url + 'ProductLocation/get_shops_selling_product',
                { 
                    product_id : $('#product_id').val()                               
                },
                function(response,status){                            
                    let parsedResponse = JSON.parse(response);
                    if(parsedResponse.status === 'success'){
                      if (parsedResponse.locations !== undefined || parsedResponse.locations != 0) {
                        showProductShopLocations(parsedResponse.locations);
                      }
                    }
                }
              );        
            }            
		}
	};
}();

var ProductDeleteConfirmation = function () {       
    
     // Private functions 

    var deleteProduct = function() {
       
        // Handles 
		$('#product_delete_yes').click(function(e) {  
            e.preventDefault();                
            $('#delete_product_confirmation_form').submit();
        });

    }  
    
    
    return {
        // public functions
        init: function() {     
            deleteProduct();
        }
    };
}();


jQuery(document).ready(function() {
    
    ProductDeleteConfirmation.init();
    ProductView.init();
    
});

