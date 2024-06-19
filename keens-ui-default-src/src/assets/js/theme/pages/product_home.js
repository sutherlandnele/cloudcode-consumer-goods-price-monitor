"use strict";
var ProductHome = function() {

	var initTable1 = function() {
	
		// begin first table
		var table = $('#kt_product_datatables').DataTable({
		
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
				url: 'Product/get_products',
				type: 'POST',
				data:{ 			
					columnsDef:	[
						'id','image', 'name','category','size','description', 'actions'
				]}
			},
			columns: [			
				{data: 'id'},
				{data: 'image'},
				{data: 'name'},
				{data: 'category'},		
				{data: 'size'},							
				{data: 'description'},					
				{data: 'actions'}
			
			],

			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<a href="` + g_base_url + `Product/edit/` + full.id + `" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Record">
											<i class="la la-edit"></i>
										</a>										
										<a href="` + g_base_url + `Product/delete_confirmation/` + full.id + `" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete Record">
											<i class="la la-trash"></i>
										</a>`;
					},
				},
				{
					targets: [0,1],
					visible: false
				},
				{
					targets: 2,
					title: 'Good',
					render: function(data, type, full, meta) {
						
						
						var image = full['image'] || 'image_not_available.jpg';
						var output = `
									<div class="kt-user-card-v2">
										<div class="kt-user-card-v2__pic">
											<img src="` + g_base_url + 'uploads/products/' + image + `" class="kt-img-rounded kt-marginless" alt="` + full['size'] + ' ' + full['name'] + `">										
										</div>
										<div class="kt-user-card-v2__details">
											<a href="` + g_base_url + 'product/view/' + full.id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['size'] + ' ' + full['name'] + `</span></a>									                            
										</div>
									</div>`;


						return output;

						// if (full['image']) {
						// 	output = `
                        //         <div class="kt-user-card-v2">
                        //             <div class="kt-user-card-v2__pic">
						// 				<img src="` + g_base_url + 'uploads/products/' + full['image'] + `" class="kt-img-rounded kt-marginless" alt="` + full['size'] + ' ' + full['name'] + `">										
                        //             </div>
                        //             <div class="kt-user-card-v2__details">
						// 				<a href="` + g_base_url + 'product/view/' + full.id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['size'] + ' ' + full['name'] + `</span></a>									                            
                        //             </div>
                        //         </div>`;
						// }
						// else {
						// 	var stateNo = KTUtil.getRandomInt(0, 7);
						// 	var states = [
						// 		'success',
						// 		'brand',
						// 		'danger',
						// 		'accent',
						// 		'warning',
						// 		'metal',
						// 		'primary',
						// 		'info'];

						// 	var state = states[stateNo];

						// 	output = `
                        //         <div class="kt-user-card-v2">
                        //             <div class="kt-user-card-v2__pic">
                        //                 <div class="kt-badge kt-badge--xl kt-badge--` + state + `"><span>` + full['name'].substring(0, 1) + `</span></div>
                        //             </div>
                        //             <div class="kt-user-card-v2__details">
						// 				<a href="` + g_base_url + 'product/view/' + full.id + `" class="kt-link"><span class="kt-user-card-v2__name">` + full['name'] + `</span></a>                           
                        //             </div>
                        //         </div>`;
						// }

						// return output;
					},
				},
				{
					targets: 3,
					
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
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				}

			],
		});

		// $('#kt_product_datatables').on('click', 'tbody tr td:nth-child(8) a:nth-child(2)', function () {
			
		// 	var data = table.row($(this).closest('tr')).data();
		// 	var id = data['id'];

		// 	var result = confirm('Are you sure you want to delete ' + data['name'] + '?');
		// 	if (result) {
		// 		//ajax Logic to delete the item
		// 	}
			
		// } );

	};


	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

jQuery(document).ready(function() {
	ProductHome.init();
});