
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    
    //Constructor
	public function __construct() {
        parent::__construct();
		$this->load->model('Shop_Model', 'shop_model');		
    }
	
	//private methods
	private function _initialize_datatable(){
		if(isset($_POST['search']['value']) && $_POST['search']['value']){
			$this->shop_model->dt_search_value = $_POST['search']['value'];   
		}
		
		if(isset($_POST['order']['0']['column']) && $_POST['order']['0']['column']){
			$this->shop_model->dt_col_order = $_POST['order']['0']['column'];
		}
		if(isset($_POST['order']['0']['dir']) && $_POST['order']['0']['dir']){
			$this->shop_model->dt_col_order_dir = $_POST['order']['0']['dir'];
		}
		if(isset($_POST['length']) && $_POST['length']){
			$this->shop_model->dt_page_length = $_POST['length'];
		}
		if(isset($_POST['start']) && $_POST['start']){
			$this->shop_model->dt_page_start = $_POST['start'];
		}
		
	}
		
    //GET request
	public function index() {
		$data['page_js'] = 'shop_home.js';		
		$data['page_use_datatables_js'] = '1';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';			
		$data['current_breadcrumb_title'] = 'Monitored Shops';	

        $this->load->view('template/header',$data);
        $this->load->view('shop_home', $data);
        $this->load->view('template/footer',$data);
	}
	

	//GET request
	public function view($id = false){
		

		if(is_numeric($id))
			$shop_id = $id;
		else
			redirect(base_url('shop/'));			
		
		$data['shop'] = $this->shop_model->get_by_id_view($shop_id); 
		$data['page_use_datatables_js'] = '1';
		$data['page_js'] = 'shop_view.js';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Shops';	
		$data['l3_breadcrumb_url'] = base_url('Shop');	
		$data['current_breadcrumb_title'] = 'View Shop';	
		$data['product_view_url'] = base_url('Product/view/');

        $this->load->view('template/header',$data);  			
		$this->load->view('shop_view', $data);
		$this->load->view('template/footer',$data);
	}

	//GET request
	public function delete_confirmation($id = false){
	
		if(is_numeric($id))
			$shop_id = $id;
		else
			redirect(base_url('shop/'));

		$data['shop'] = $this->shop_model->get_by_id_view($shop_id); 
		$data['page_use_datatables_js'] = '1';
		$data['page_js'] = 'shop_delete_confirmation.js';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Shops';	
		$data['l3_breadcrumb_url'] = base_url('Shop');	
		$data['current_breadcrumb_title'] = 'Delete Shop';	

        $this->load->view('template/header',$data); 
		$this->load->view('shop_delete_confirmation', $data);
		$this->load->view('template/footer',$data);
	}
	

    //Get request
	function get_shops() {

		$this->_initialize_datatable();

		$shops = $this->shop_model->get_datatables();
        $data = array();
		
	
		$no =  isset($_POST['start']) ?  $_POST['start'] : 0;

        foreach ($shops as $shop) {   		    
			$row = array(); 
            $data[] = $shop;
        }
 
        $output = array(
			"draw" => isset($_POST['draw']) ?  $_POST['draw'] : 0,			
			"recordsTotal" => $this->shop_model->count_all(),
			"recordsFiltered" => $this->shop_model->count_filtered(),
			"data" => $data,
		);
        //output to json format
        echo json_encode($output);
	}

	//GET request
	public function add_new(){
		
		$data['page_js'] = 'add_new_shop.js';	
		$data['dd_cities'] = $this->shop_model->get_dd_cities();		
		$data['dd_regions'] = $this->shop_model->get_dd_regions();		

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Shops';	
		$data['l3_breadcrumb_url'] = base_url('Shop');	
		$data['current_breadcrumb_title'] = 'Create New Shop';	

		$this->load->view('template/header',$data); 
		$this->load->view('add_new_shop',$data);
		$this->load->view('template/footer',$data);
	}

	//GET request
	public function edit($id = false){
		

		if(is_numeric($id))
			$shop_id = $id;
		else
			redirect(base_url('Shop/'));

		$data['shop'] = $this->shop_model->get_by_id($shop_id); 
		
		$data['page_js'] = 'edit_shop.js';
		$data['dd_cities'] = $this->shop_model->get_dd_cities();		
		$data['dd_regions'] = $this->shop_model->get_dd_regions();	

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Shops';	
		$data['l3_breadcrumb_url'] = base_url('Shop');	
		$data['current_breadcrumb_title'] = 'Edit Shop';	

		$this->load->view('template/header',$data); 
		$this->load->view('edit_shop', $data);
		$this->load->view('template/footer',$data);
	}
    
     //POST request
	public function create() {

        if($this->input->post('input_val'))
		{
			$input_data = $this->input->post('input_val');

			//populate audit fields
			$input_data['created_by']  = 'iccc'; //TODO: need to get this value from currently logged in username
			$input_data['created_date'] = mdate('%Y-%m-%d %H:%i:%s');

            $is_inserted = $this->shop_model->create($input_data);
            
            if($is_inserted) 
                $this->session->set_flashdata('success','Record created successfully.');
            else		
                $this->session->set_flashdata('error','Could not create new record!');
        }
        else
		{
			$this->session->set_flashdata('error','No request!');
		}

		redirect(base_url('Shop/add_new'));
    }

    //POST request
	public function update() {

		$id = 0;
		
        if($this->input->post('input_val'))
		{
			
            $id = $this->input->post('id');	
            $input_data = $this->input->post('input_val');           
			$is_updated = $this->shop_model->update($id, $input_data);
			
			//populate audit fields
			$input_data['last_updated_by']  = 'iccc'; //TODO: need to get this value from currently logged in username
			$input_data['last_updated_date'] = mdate('%Y-%m-%d %H:%i:%s');

			$is_updated = $this->shop_model->update($id, $input_data);

			if ($is_updated)
				$this->session->set_flashdata('success','Record updated successfully.');
			else
				$this->session->set_flashdata('error','Could not update record!');
		}
		else
		{
			$this->session->set_flashdata('error','No request!');
		}

		if($id != 0)
			redirect(base_url().'Shop/edit/'.$id);
		else
			redirect(base_url().'Shop');

	}

    //POST request
    public function delete() {
                
        if($this->input->post('id'))
		{
            $id = $this->input->post('id');		

            if($this->shop_model->delete($id)) 
                $this->session->set_flashdata('success','Record deleted successfully.');
            else
                $this->session->set_flashdata('error','Could not delete record!');          
        }
        else
        {
            $this->session->set_flashdata('error','No request!');
        }

		redirect(base_url().'Shop');
	}
}