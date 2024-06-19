"use strict";
// Class definition
var ShopProductView = function () { 
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
									<a href="` + g_shop_view_url + full.shop_id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['shop'] + `</span></a>                           
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
  
  var initProductShopLocationsMap = function() {
        
    var center = {lat: -6.452617, lng: 147.816742}; //center on PNG Map
    
    map = new google.maps.Map(document.getElementById('product_shop_locations_map'), {
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

var Dashboard = function(){

    var widgetShopProductPriceTrendChart = function() {
        if (!document.getElementById('shop_product_price_trend')) {
            return;
        }

        var color = Chart.helpers.color;
        var filterYear = $("#max_year").val();
        var p_id = $("#product_id").val();
        var s_id = $("#shop_id").val();
        var size = $("#size").val();


        var updateChart = function(chart, labelArray, dataArray,y_axis_max) {        

            chart.data.labels = labelArray;
            chart.data.datasets[0].data = dataArray;
            chart.options.scales.yAxes[0].ticks.max = Math.round(y_axis_max);
            chart.options.scales.yAxes[0].ticks.stepSize = Math.round(y_axis_max/10);
            chart.update();
        }

        var getChartData = function(filterYear, product_id , shop_id){
            console.log(filterYear);
            if(filterYear && product_id && shop_id){   
               
                $("#filterYearLabel").text(filterYear);
                $.post(g_base_url + 'ShopProduct/get_chart_data',
                { 
                    product_id : p_id,
                    shop_id: s_id,
                    year: filterYear
                },
                function(response,status){                            
                    let parsedResponse = JSON.parse(response);                    
                    if(parsedResponse.status === 'success'){                       
                      if (parsedResponse.chart_data) {
                        updateChart(shopProductPriceTrendChart,
                                parsedResponse.chart_data.labelArray,
                                parsedResponse.chart_data.dataArray,
                                parsedResponse.chart_data.y_axis_max); //update the chartjs
                      }
                    }
                }
              );  

            }
        }
        
  
        var chartData = {            
            datasets: [{
                label: 'Price ' + size,
                backgroundColor: color(KTApp.getStateColor('brand')).alpha(1).rgbString(),
                borderWidth: 0,
                borderColor: KTApp.getStateColor('brand'),
                borderWidth: 3,
                backgroundColor: color(KTApp.getStateColor('brand')).alpha(0.07).rgbString(),
                //pointBackgroundColor: KTApp.getStateColor('brand'),
                fill: true
            }]
        };

        var ctx = document.getElementById('shop_product_price_trend').getContext('2d');

        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            legend: false,
            scales: {
                xAxes: [{
                    categoryPercentage: 0.35,
                    barPercentage: 0.70,
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    },
                    gridLines: false,
                    ticks: {
                        display: true,
                        beginAtZero: true,
                        fontColor: KTApp.getBaseColor('shape', 3),
                        fontSize: 13,
                        padding: 10
                    }
                }],
                yAxes: [{
                    categoryPercentage: 0.35,
                    barPercentage: 0.70,
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: 'Value'
                    },
                    gridLines: {
                        color: KTApp.getBaseColor('shape', 2),
                        drawBorder: false,
                        offsetGridLines: false,
                        drawTicks: false,
                        borderDash: [3, 4],
                        zeroLineWidth: 1,
                        zeroLineColor: KTApp.getBaseColor('shape', 2),
                        zeroLineBorderDash: [3, 4]
                    },
                    ticks: {
                        max: 10,                            
                        stepSize: 1,
                        display: true,
                        beginAtZero: true,
                        fontColor: KTApp.getBaseColor('shape', 3),
                        fontSize: 13,
                        padding: 10
                    }
                }]
            },
            title: {
                display: false
            },
            hover: {
                mode: 'index'
            },
            elements: {
                line: {
                    tension: 0.5
                },
                point: { 
                    radius: 0 
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'nearest',
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10, 
                caretPadding: 0,
                displayColors: false,
                backgroundColor: KTApp.getStateColor('brand'),
                titleFontColor: '#ffffff', 
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 5,
                    bottom: 5
                }
            }
        };

        var chartConfig = {
            type: 'line',
            data: chartData,
            options: chartOptions
        }

        var shopProductPriceTrendChart = new Chart(ctx, chartConfig);

        $("ul#priceTrendFilter>li>a").click(function(e){
            e.preventDefault();
            filterYear = $(this).find('span').text();    
            getChartData(filterYear, p_id , s_id);
        });

        getChartData(filterYear, p_id , s_id);
    }

    

    return{

        init: function(){
            widgetShopProductPriceTrendChart();
        }
    }

}();

jQuery(document).ready(function() {
    ShopProductView.init();
    Dashboard.init();
});

