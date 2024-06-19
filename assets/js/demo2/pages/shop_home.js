"use strict";
var ShopHome = function() {

	var initTable1 = function() {
	
		// begin first table
		var table = $('#kt_shop_datatables').DataTable({
		
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
			ajax: {
				url: 'Shop/get_shops',
				type: 'POST',
				data:{ 			
					columnsDef:	[
						'id','name', 'city','region','latitude', 'longtitude','actions'
				]}
			},
			columns: [			
				{data: 'id'},
				{data: 'name'},
				{data: 'city'},
				{data: 'region'},
				{data: 'latitude'},
				{data: 'longtitude'},										
				{data: 'actions'}
			
			],

			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<a href="` + g_base_url + `Shop/edit/` + full.id + `" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Record">
											<i class="la la-edit"></i>
										</a>										
										<a href="` + g_base_url + `Shop/delete_confirmation/` + full.id + `" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete Record">
											<i class="la la-trash"></i>
										</a>`;
					},
				},
				{
					targets: 0,
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
									<div class="kt-badge kt-badge--xl kt-badge--` + state + `"><span>` + full['name'].substring(0, 1) + `</span></div>
								</div>
								<div class="kt-user-card-v2__details">
									<a href="` + g_base_url + 'Shop/view/' + full.id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['name'] + `</span></a>                           
								</div>
							</div>`;
						

						return output;
					},
				}

			],
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
	ShopHome.init();
});