<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategory extends CI_Controller {

	//Constructor
	public function __construct() {
		parent::__construct();		
		$this->load->model('Product_Category_Model', 'product_category_model');
		
	}
		
	//GET request
	public function index(){}

	//GET request
	public function get_all_declared()
	{
		$data['product_category'] = $this->product_category_model->get_all(1); // 1 = Declared Product Category Type
		$data['page_js'] = 'product_category_home.js';		
		$data['l2_breadcrumb_title'] = 'Monitored Goods & Services';	
		$data['current_breadcrumb_title'] = 'Declared Goods';			
		$this->load->view('template/header',$data);
		$this->load->view('product_category_home', $data);
		$this->load->view('template/footer',$data);
	}

	//GET request
	public function get_all_non_declared()
	{
		$data['product_category'] = $this->product_category_model->get_all(2); // 2 = Non-Declared Product Category Type
		$data['page_js'] = 'product_category_home.js';		
		$data['l2_breadcrumb_title'] = 'Monitored Goods & Services';	
		$data['current_breadcrumb_title'] = 'Non-Declared Goods';			
        $this->load->view('template/header',$data);
        $this->load->view('product_category_home', $data);
        $this->load->view('template/footer',$data);
	}

	//GET request
	public function view($id = false){
		$this->load->view('template/header');	

		if(is_numeric($id))
			$product_category_id = $id;
		else
			redirect(base_url('productcategory/'));

		$data['product'] = $this->product_category_model->get_by_id_view($product_category_id); 
		$data['page_js'] = 'product_category_view.js';		
		$this->load->view('product_category_view', $data);
		$this->load->view('template/footer',$data);
	}
}
