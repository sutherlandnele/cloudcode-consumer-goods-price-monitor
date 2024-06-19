
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PriceWatchlist extends CI_Controller {
    
    //Constructor
	public function __construct() {
        parent::__construct();
		$this->load->model('Price_Watchlist_Model', 'price_watchlist_model');
		$this->load->model('Shop_Product_Model', 'shop_product_model');
		$this->load->model('Product_Model', 'product_model');	
		$this->load->model('Shop_Model', 'shop_model');
		
	}
	
	//private methods
	private function _initialize_datatable(){
        if(isset($_POST['columns'][1]['search']['value']) && $_POST['columns'][1]['search']['value']){
            $this->price_watchlist_model->dt_product_sv = $_POST['columns'][1]['search']['value'];   
        }
        if(isset($_POST['columns'][4]['search']['value']) && $_POST['columns'][4]['search']['value']){
			$this->price_watchlist_model->dt_product_category_sv = $_POST['columns'][4]['search']['value'];
        }
        if(isset($_POST['columns'][5]['search']['value']) && $_POST['columns'][5]['search']['value']){
            $this->price_watchlist_model->dt_shop_sv = $_POST['columns'][5]['search']['value'];
        }
        if(isset($_POST['columns'][7]['search']['value']) && $_POST['columns'][7]['search']['value']){
            $this->price_watchlist_model->dt_city_sv = $_POST['columns'][7]['search']['value'];
        }
        if(isset($_POST['columns'][8]['search']['value']) && $_POST['columns'][8]['search']['value']){
			$this->price_watchlist_model->dt_region_sv = $_POST['columns'][8]['search']['value'];
		}
		// if(isset($_POST['columns'][11]['search']['value']) && $_POST['columns'][11]['search']['value']){
		// 	$this->price_watchlist_model->dt_price_date_sv = $_POST['columns'][11]['search']['value'];
		// }		
		if(isset($_POST['order']['0']['column']) && $_POST['order']['0']['column']){
			$this->price_watchlist_model->dt_col_order = $_POST['order']['0']['column'];
		}
		if(isset($_POST['order']['0']['dir']) && $_POST['order']['0']['dir']){
			$this->price_watchlist_model->dt_col_order_dir = $_POST['order']['0']['dir'];
		}
		if(isset($_POST['length']) && $_POST['length']){
			$this->price_watchlist_model->dt_page_length = $_POST['length'];
		}
		if(isset($_POST['start']) && $_POST['start']){
			$this->price_watchlist_model->dt_page_start = $_POST['start'];
		}
		
	}
    
    //GET request
	public function index($search_category = '') {

		$data['page_js'] = 'price_watchlist_home.js';		
		$data['page_use_datatables_js'] = '1';
		$data['l2_breadcrumb_title'] = 'Price Watchlist';	
		$data['current_breadcrumb_title'] = 'Price Watchlist Table';	
		$data['search_category'] = urldecode($search_category);
        $this->load->view('template/header',$data);
        $this->load->view('price_watchlist_home', $data);
        $this->load->view('template/footer',$data);
	}

	public function view_shop_product($product_id = false,$shop_id = false){		

		if(is_numeric($product_id) && is_numeric($shop_id))
		{			
			$data['product'] = $this->product_model->get_by_id_view($product_id); 
			$data['shop'] = $this->shop_model->get_by_id($shop_id); 			
			$data['price_trend_filter_years'] = $this->shop_product_model->get_price_trend_filter_years($product_id,$shop_id); 
			$data['max_year'] = $this->shop_product_model->get_max_year($data['price_trend_filter_years']);
			$data['page_js'] = 'shop_product_view.js';
			$data['page_use_datatables_js'] = '1';
			$data['l2_breadcrumb_title'] = 'Price Watchlist';	
			$data['l3_breadcrumb_title'] = 'Price Watchlist Table';	
			$data['l3_breadcrumb_url'] = base_url('PriceWatchlist');	
			$data['current_breadcrumb_title'] = 'View Shop Good';	
			$data['shop_view_url'] = base_url('PriceWatchlist/view_shop/');
			$this->load->view('template/header',$data);     
			$this->load->view('shop_product_view', $data);
			$this->load->view('template/footer',$data);
		}
		else
		{
			redirect(base_url('PriceWatchlist'));
		}
	}

	public function view_product($product_id = false){		

		if(is_numeric($product_id))
		{			
			$data['product'] = $this->product_model->get_by_id_view($product_id); 
			$data['page_js'] = 'product_view.js';
			$data['page_use_datatables_js'] = '1';
			$data['l2_breadcrumb_title'] = 'Price Watchlist';	
			$data['l3_breadcrumb_title'] = 'Price Watchlist Table';	
			$data['l3_breadcrumb_url'] = base_url('PriceWatchlist');	
			$data['current_breadcrumb_title'] = 'View Good';	
			$data['shop_view_url'] = base_url('PriceWatchlist/view_shop/');
			$this->load->view('template/header',$data);     
			$this->load->view('product_view', $data);
			$this->load->view('template/footer',$data);
		}
		else
		{
			redirect(base_url('PriceWatchlist'));
		}
	}


	//GET request
	public function view_shop($id = false){
	

		if(is_numeric($id))
			$shop_id = $id;
		else
			redirect(base_url('PriceWatchlist/'));			
		
		$data['shop'] = $this->shop_model->get_by_id_view($shop_id); 
		$data['page_use_datatables_js'] = '1';
		$data['page_js'] = 'shop_view.js';

		$data['l2_breadcrumb_title'] = 'Price Watchlist';	
		$data['l3_breadcrumb_title'] = 'Price Watchlist Table';	
		$data['l3_breadcrumb_url'] = base_url('PriceWatchlist');	
		$data['current_breadcrumb_title'] = 'View Shop';
		$data['product_view_url'] = base_url('PriceWatchlist/view_product/');

        $this->load->view('template/header',$data);  
		$this->load->view('shop_view', $data);
		$this->load->view('template/footer',$data);
	}


	//Post request
	public function get_price_watchlist() {
		
		//initialize all datatables related posted variables for the model to consume
		$this->_initialize_datatable();		

		$price_watchlist = $this->price_watchlist_model->get_datatables();
		$data = array();	
	
		$no =  isset($_POST['start']) ?  $_POST['start'] : 0;

		foreach ($price_watchlist as $r) {   		    
			$row = array(); 
			$data[] = $r;
		}
	
		$output = array(
			"draw" => isset($_POST['draw']) ?  $_POST['draw'] : 0,			
			"recordsTotal" => $this->price_watchlist_model->count_all(),
			"recordsFiltered" => $this->price_watchlist_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

}