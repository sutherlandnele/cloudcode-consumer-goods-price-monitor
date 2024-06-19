"use strict";
// Class definition
var ShopView = function () {      

    var map;
    var markers = [];

	var initTable1 = function() {

	
		// begin first table
		var table = $('#shop_view_datatables').DataTable({
		
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
                    product_id:	'',
                    shop_id: $('#shop_id').val()!='' ? $('#shop_id').val() : ''
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
                {data: 'discount_price_end'},
                {data: 'image'}
               
       		],
			columnDefs: [
          {
            targets: [0,1,2,4,-1],
            visible: false
          },
          {
            targets: 3,
            title: 'Good',
            render: function(data, type, full, meta) {
  
              var image = full['image'] || 'image_not_available.jpg';
              var output = `
                    <div class="kt-user-card-v2">
                      <div class="kt-user-card-v2__pic">
                        <img src="` + g_base_url + 'uploads/products/' + image + `" class="kt-img-rounded kt-marginless" alt="` + full['product'] + `">										
                      </div>
                      <div class="kt-user-card-v2__details">
                        <a href="` + g_product_view_url + full.product_id + `" class="kt-link"><span class="kt-user-card-v2__name">`  + full['product'] + `</span></a>									                            
                      </div>
                    </div>`;
  
  
              return output;
            }
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
    
  


	return {

		//main function to initiate the module
		init: function() {
            initTable1();           
		}
	};
}();

var GMap = function(){
  var map;
  var markers = [];
  

    var initShopLocationMap = function() {
          
      var center = {lat: -6.452617, lng: 147.816742}; //center on PNG Map
      
      map = new google.maps.Map(document.getElementById('shop_location_map'), {
          zoom: 6.5,
          center: center,
          mapTypeId: google.maps.MapTypeId.HYBRID
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
    initLocation: function() {
      initShopLocationMap();

      if($('#shop_id').val() != ''){          
          $.post(g_base_url + 'ProductLocation/get_shop',
          { 
             shop_id: $('#shop_id').val() ? $('#shop_id').val():''            
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


jQuery(document).ready(function() {
	ShopView.init();
});