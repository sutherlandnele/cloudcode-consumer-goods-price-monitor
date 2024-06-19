"use strict";
var PriceWatchlistHome = function() {

	$.fn.dataTable.Api.register('column().title()', function() {
		return $(this.header()).text().trim();
	});

	var groupColumn = 5; //==> shop
	var search_category_found = false;

	var initTable1 = function() {
	
		// begin first table
		var table = $('#dt_price_watchlist').DataTable({
		
			// Pagination settings
			dom: `<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,	
			// "oSearch": {"sSearch": g_search_category },
			buttons: [
				{
					extend: 'pdf',
					footer: false,
					exportOptions: {
						 columns: [1,4,5,7,8,9,10,11,12]
					 }
				},
				{
					extend: 'csv',
					footer: false
				   
				},
				{
					extend: 'excel',
					footer: false
				}         
			 ], 
			lengthMenu: [5, 10, 25, 50],
			pageLength: 10,
			language: {
				'lengthMenu': 'Display _MENU_',
			},
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			order: [[ groupColumn, 'asc' ]],
			drawCallback: function(settings) {
				var api = this.api();
				var rows = api.rows({page: 'current'}).nodes();
				var last = null;

				api.column(groupColumn, {page: 'current'}).data().each(function(group, i) {
					if (last !== group) {
						$(rows).eq(i).before(
							'<tr class="group"><td colspan="9">' + group + '</td></tr>',
						);
						last = group;
					}
				});
			},
			ajax: {
				url: g_base_url + '/PriceWatchlist/get_price_watchlist',
				type: 'POST',
				data:{ 			
						columnsDef:	['id','product','product_id','image','category','shop','shop_id','city','region','current_price','discount_price','discount_price_start','discount_price_end', 'actions']
					}
			},
			columns: [			
				{data: 'id'}, 
				{data: 'product'},
				{data: 'product_id'},
				{data: 'image'}, 
				{data: 'category'},			
				{data: 'shop'},	
				{data: 'shop_id'},			
				{data: 'city'},				
				{data: 'region'},				
				{data: 'current_price'},
				{data: 'discount_price'},
				{data: 'discount_price_start'},
				{data: 'discount_price_end'},
				{data: 'actions'}			
			],

			initComplete: function(settings,json) {

				var category_column;

				this.api().columns().every(function() {

					var column = this;

					switch (column.title()) {
						case 'Category':
							category_column = column;
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="4"]').append('<option value="' + d + '">' + d + '</option>');

								//filter product category on load if search category is passed								
								if(typeof(g_search_category) != 'undefined' && d.localeCompare(g_search_category) == 0){
									search_category_found = true;														
								}
								
							});
							break;
						case 'Shop':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="5"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;	
						case 'City':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="7"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;	
						case 'Region':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="8"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;			
					}
				});		
				
				if(typeof(g_search_category) != "undefined")
				{

					if(search_category_found)
					{
						//set searched_category 
						$('.kt-input[data-col-index="4"]').val(g_search_category);

					}
					else
					{
						PageAlert.info("Not Found!", g_search_category + " category items not found.");
					}
				}

				
				
			},

			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
									<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
									<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">	
										<a class="dropdown-item" href="` + g_base_url + `PriceWatchlist/view_shop/` + full.shop_id + `"><i class="la la-map-marker"></i>  View Shop</a>								
										<a class="dropdown-item" href="` + g_base_url + `PriceWatchlist/view_product/` + full.product_id + `"><i class="la la-binoculars"></i>  View Good</a>
									</div>
								</span>`;
					},
				},
				{
					targets: [0,2,3,5,6],
					visible: false
				},
				{
					targets: 1,
					title: 'Good',
					render: function(data, type, full, meta) {

						var image = full['image'] || 'image_not_available.jpg';
						var output = `
									<div class="kt-user-card-v2">
										<div class="kt-user-card-v2__pic">
											<img src="` + g_base_url + 'uploads/products/' + image + `" class="kt-img-rounded kt-marginless" alt="` + full['product'] + `">										
										</div>
										<div class="kt-user-card-v2__details">
											<a href="` + g_base_url + 'PriceWatchlist/view_shop_product/' + full.product_id + '/' + full.shop_id + `" class="kt-link"><span class="kt-user-card-v2__name">`  + full['product'] + `</span></a>									                            
										</div>
									</div>`;
						return output;
					},
				},
				{
					targets: 4,
					width:"12%",
					render: function(data, type, full, meta) {						

						var status = {
							'Fuel': {'title': 'Fuel', 'class': 'kt-badge--brand'},
							'Rice': {'title': 'Rice', 'class': ' kt-badge--metal'},
							'Tinned Fish': {'title': 'Tinned Fish', 'class': ' kt-badge--primary'},
							'Cooking Oil': {'title': 'Cooking Oil', 'class': ' kt-badge--success'},
							'Flour': {'title': 'Flour', 'class': ' kt-badge--info'},
							'Sugar': {'title': 'Sugar', 'class': 'kt-badge--brand'},
							'Beverage Item': {'title': 'Beverage Item', 'class': ' kt-badge--metal'},
							'Tinned Meat': {'title': 'Tinned Meat', 'class': ' kt-badge--primary'},
							'Laundery and Toiletry': {'title': 'Laundery and Toiletry', 'class': ' kt-badge--success'},
							'Biscuit': {'title': 'Biscuit', 'class': ' kt-badge--info'}
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline">' + status[data].title + '</span>';
					},
				},
				{
					targets: 10,
					render: function(data, type, full, meta) {				


						if (data.replace("K","") === '0.00') {
							return '--';
						}
						return '<h5><span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">' +  data + '</span></h5>';
					},
				},
				{
					targets: 5,
					title: 'Shop',
					render: function(data, type, full, meta) {
						
 					var output = `
							<div class="kt-user-card-v2">
								<div class="kt-user-card-v2__details">
									<a href="` + g_base_url + 'shop/view/' + full.shop_id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['shop'] + `</span></a>                           
								</div>
							</div>`;
	

						return output;
					},
				}

			],
		
		});

		if(typeof(g_search_category) != "undefined")
		{
			table.column(4).search(g_search_category,true,false).draw();
		}
	
		$('#m_search').on('click', function(e) {
			
			e.preventDefault();
			var params = {};
			$('.kt-input').each(function() {
				var i = $(this).data('col-index');
				if (params[i]) {
					params[i] += '|' + $(this).val();
				}
				else {
					params[i] = $(this).val();
				}
			});
			$.each(params, function(i, val) {
				// apply search params to datatable
				table.column(i).search(val ? val : '', false, false);
			});
			
			table.table().draw();
		});		
	
		$('#m_reset').on('click', function(e) {
			e.preventDefault();
			$('.kt-input').each(function() {
				$(this).val('');
				table.column($(this).data('col-index')).search('', false, false);
			});
			table.table().draw();
		});
	
		// Order by the grouping
		$('#dt_price_watchlist tbody').on( 'click', 'tr.group', function () {
			var currentOrder = table.order()[0];
			// alert(currentOrder[0]);
			if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
				
				table.order( [groupColumn, 'desc' ] ).draw();
			}
			else {
				table.order( [groupColumn, 'asc' ] ).draw();
			}
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
			
		}
	};
}();

jQuery(document).ready(function() {
	PriceWatchlistHome.init();		
	  
});
