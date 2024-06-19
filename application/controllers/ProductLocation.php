
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductLocation extends CI_Controller {
    
    //Constructor
	public function __construct() {
        parent::__construct();		
		$this->load->model('Product_Location_Model', 'product_location_model');
		$this->load->model('Product_Model', 'product_model');	
		$this->load->model('Shop_Model', 'shop_model');
    }
    
    //GET request
	public function index() {
		$data = array();

		if(isset($_POST['product_live_search']) && $_POST['product_live_search'] != '')	
		{	
			$product_id = $_POST['product_live_search'];
			$data['product'] = $this->product_model->get_by_id_view($product_id); 		
				
		}

		$data['page_use_datatables_js'] = '1';		
		$data['page_js'] = 'product_location_home.js';
		$data['dd_products'] = $this->product_location_model->get_dd_products();	
		$data['l2_breadcrumb_title'] = 'Shopping Hints';	
		$data['current_breadcrumb_title'] = 'Locate Sold Good';	
        $this->load->view('template/header',$data);
		$this->load->view('product_location_home.php', $data);
		$this->load->view('template/footer',$data);
	}

	//GET request
	public function view_shop($id = false){
	

		if(is_numeric($id))
			$shop_id = $id;
		else
			redirect(base_url('ProductLocation/'));			
		
		$data['shop'] = $this->shop_model->get_by_id_view($shop_id); 
		$data['page_use_datatables_js'] = '1';
		$data['page_js'] = 'shop_view.js';

		$data['l2_breadcrumb_title'] = 'Shopping Hints';	
		$data['l3_breadcrumb_title'] = 'Locate Sold Good';	
		$data['l3_breadcrumb_url'] = base_url('ProductLocation');	
		$data['current_breadcrumb_title'] = 'View Shop';	
		$data['product_view_url'] = base_url('ProductLocation/view_product/');

		$this->load->view('template/header',$data);  			
		$this->load->view('shop_view', $data);
		$this->load->view('template/footer',$data);
	}

	
	public function view_product($id = false){		

		if(is_numeric($id))
			$product_id = $id;
		else
			redirect(base_url('PriceWatchlist'));

		$data['product'] = $this->product_model->get_by_id_view($product_id); 
		$data['page_js'] = 'product_view.js';
		$data['page_use_datatables_js'] = '1';
		$data['l2_breadcrumb_title'] = 'Shopping Hints';	
		$data['l3_breadcrumb_title'] = 'Locate Sold Good';	
		$data['l3_breadcrumb_url'] = base_url('ProductLocation');	
		$data['current_breadcrumb_title'] = 'View Good';	
		$data['shop_view_url'] = base_url('ProductLocation/view_shop/');
        $this->load->view('template/header',$data);     
		$this->load->view('product_view', $data);
		$this->load->view('template/footer',$data);
	}

	//POST AJAX request
	public function get_shops_selling_product() {

		$shop_locations = $this->product_location_model->get_shops_selling_product();

		if(count($shop_locations) > 0){
			$data = array();

			foreach ($shop_locations as $shop_location) { 
				$data[] = Array($shop_location->shop, $shop_location->latitude, $shop_location->longtitude);
			}

			$response = array (
				'status'    => 'success',
				'info'      => 'Shop locations of good retrieved successfully',
				'locations' => $data
			);
		}
		else
		{
			$response = array (
				'status'    => 'info',
				'info'      => 'no data found',
				'locations' => ''
			);
		}
		
		//output to json format
		echo json_encode($response);


	}

	public function get_shop(){
		$shop_locations = $this->product_location_model->get_shop();

		if(count($shop_locations) > 0){
			$data = array();

			foreach ($shop_locations as $shop_location) { 
				$data[] = Array($shop_location->shop, $shop_location->latitude, $shop_location->longtitude);
			}

			$response = array (
				'status'    => 'success',
				'info'      => 'Shop location retrieved successfully',
				'locations' => $data
			);
		}
		else
		{
			$response = array (
				'status'    => 'info',
				'info'      => 'no data found',
				'locations' => ''
			);
		}
		
		//output to json format
		echo json_encode($response);
	}
	

}