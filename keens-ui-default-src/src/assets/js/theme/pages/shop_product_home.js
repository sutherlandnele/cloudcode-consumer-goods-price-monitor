"use strict";
var ShopProductHome = function() {

	var initTable1 = function() {

		var groupColumn = 1; //==> shop
	
		// begin first table
		var table = $('#kt_shop_product_datatables').DataTable({
		
			// Pagination settings
			dom: `<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_filter'f>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,	

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
							'<tr class="group"><td colspan="6">' + group + '</td></tr>',
						);
						last = group;
					}
				});
			},
			ajax: {
				url: 'ShopProduct/get_shop_products',
				type: 'POST',
				data:{ 			
					product_id:	'',
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
				{data: 'discount_price_end'},	
				{data: 'image'},				
				{data: 'actions'}
			
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<a href="` + g_base_url + `ShopProduct/edit/` + full.id + `" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Record">
											<i class="la la-edit"></i>
										</a>										
										<a href="` + g_base_url + `ShopProduct/delete_confirmation/` + full.id + `" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete Record">
											<i class="la la-trash"></i>
										</a>`;
					},
				},
				{
					targets: [0,1,2,4,9],
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
											<img src="` + g_base_url + 'uploads/products/' + image + `" class="kt-img-rounded kt-marginless" alt="` + full.product + `">										
										</div>
										<div class="kt-user-card-v2__details">
											<a href="` + g_base_url + 'ShopProduct/view_shop_product/' + full.product_id + '/' + full.shop_id + `" class="kt-link"><span class="kt-user-card-v2__name">`  + full.product + `</span></a>									                            
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

			],
		});


		// Order by the grouping
		$('#kt_shop_product_datatables tbody').on( 'click', 'tr.group', function () {
			var currentOrder = table.order()[0];
			// alert(currentOrder[0]);
			if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
				
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
	ShopProductHome.init();
});