
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    //Constructor
	public function __construct() {
        parent::__construct();
		$this->load->model('Product_Model', 'product_model');		
    }
	
	//private methods
	private function _initialize_datatable(){
		if(isset($_POST['search']['value']) && $_POST['search']['value']){
			$this->product_model->dt_search_value = $_POST['search']['value'];   
		}
		
		if(isset($_POST['order']['0']['column']) && $_POST['order']['0']['column']){
			$this->product_model->dt_col_order = $_POST['order']['0']['column'];
		}
		if(isset($_POST['order']['0']['dir']) && $_POST['order']['0']['dir']){
			$this->product_model->dt_col_order_dir = $_POST['order']['0']['dir'];
		}
		if(isset($_POST['length']) && $_POST['length']){
			$this->product_model->dt_page_length = $_POST['length'];
		}
		if(isset($_POST['start']) && $_POST['start']){
			$this->product_model->dt_page_start = $_POST['start'];
		}
		
	}
	
    //GET request
	public function index() {
		$data['page_js'] = 'product_home.js';		
		$data['page_use_datatables_js'] = '1';
		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['current_breadcrumb_title'] = 'Monitored Goods';	
        $this->load->view('template/header',$data);
        $this->load->view('product_home', $data);
        $this->load->view('template/footer',$data);
	}
	

	//GET request
	public function view($id = false){
		

		if(is_numeric($id))
			$product_id = $id;
		else
			redirect(base_url('Product'));

		$data['product'] = $this->product_model->get_by_id_view($product_id); 
		$data['page_js'] = 'product_view.js';
		$data['page_use_datatables_js'] = '1';
		
		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Goods';	
		$data['l3_breadcrumb_url'] = base_url('Product');	
		$data['current_breadcrumb_title'] = 'View Good';	
		$data['shop_view_url'] = base_url('Shop/view/');	

        $this->load->view('template/header',$data);     
		$this->load->view('product_view', $data);
		$this->load->view('template/footer',$data);
	}

	//GET request
	public function delete_confirmation($id = false){
		

		if(is_numeric($id))
			$product_id = $id;
		else
			redirect(base_url('Product/'));

		$data['product'] = $this->product_model->get_by_id_view($product_id); 
		$data['page_js'] = 'product_delete_confirmation.js';
		$data['page_use_datatables_js'] = '1';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Goods';	
		$data['l3_breadcrumb_url'] = base_url('Product');	
		$data['current_breadcrumb_title'] = 'Delete Good';	

        $this->load->view('template/header',$data); 
		$this->load->view('product_delete_confirmation', $data);
		$this->load->view('template/footer',$data);
	}
	

    //Post request
	function get_products() {

		$this->_initialize_datatable();

		$products = $this->product_model->get_datatables();

        $data = array();
		
	
		$no =  isset($_POST['start']) ?  $_POST['start'] : 0;

        foreach ($products as $product) {   		    
		
            $data[] = $product;
        }
 
        $output = array(
			"draw" => isset($_POST['draw']) ?  $_POST['draw'] : 0,			
			"recordsTotal" => $this->product_model->count_all(),
			"recordsFiltered" => $this->product_model->count_filtered(),
			"data" => $data,
		);
        //output to json format
        echo json_encode($output);
	}

	//GET request
	public function add_new(){

	
		$data['dd_product_categories'] = $this->product_model->get_dd_product_categories();	
		$data['page_js'] = 'add_new_product.js';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Goods';	
		$data['l3_breadcrumb_url'] = base_url('Product');	
		$data['current_breadcrumb_title'] = 'Create Good';	

        $this->load->view('template/header',$data);   
		$this->load->view('add_new_product',$data);
		$this->load->view('template/footer',$data);
	}

	//GET request
	public function edit($id = false){
		

		if(is_numeric($id))
			$product_id = $id;
		else
			redirect(base_url('Product'));

		
		$product_to_edit = $this->product_model->get_by_id($product_id);
		
		if($product_to_edit->image)
			$this->session->image = $product_to_edit->image;
		
		$data['product'] = $product_to_edit; 
		$data['dd_product_categories'] = $this->product_model->get_dd_product_categories();	
		$data['page_js'] = 'edit_product.js';		

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';	
		$data['l3_breadcrumb_title'] = 'Monitored Goods';	
		$data['l3_breadcrumb_url'] = base_url('Product');	
		$data['current_breadcrumb_title'] = 'Edit Good';	

        $this->load->view('template/header',$data); 
		$this->load->view('edit_product', $data);
		$this->load->view('template/footer',$data);
	}
    
     //POST request
	public function create() {

        if($this->input->post('input_val'))
		{
			$input_data = $this->input->post('input_val');

			if($this->session->image != 'DEL'){
				//get the product image name from the previous session request
				$input_data['image'] = $this->session->image;
			}

			$this->session->unset_userdata('image');

			//populate audit fields
			$input_data['created_by']  = 'iccc'; //TODO: need to get this value from currently logged in username
			$input_data['created_date'] = mdate('%Y-%m-%d %H:%i:%s');

            $is_inserted = $this->product_model->create($input_data);
            
            if($is_inserted) 
                $this->session->set_flashdata('success','Record created successfully.');
            else		
                $this->session->set_flashdata('error','Could not create new record!');
        }
        else
		{
			$this->session->set_flashdata('error','No request!');
		}

		redirect(base_url('Product/add_new'));
    }

    //POST request
	public function update() {

		$id = 0;
		
		

        if($this->input->post('input_val'))
		{
			
            $id = $this->input->post('id');	
            $input_data = $this->input->post('input_val');           
			$is_updated = $this->product_model->update($id, $input_data);
			

			if($this->session->image == 'DEL'){
				//get the product image name from the previous session request
				$input_data['image'] = '';							
			}
			else
			{
				$input_data['image'] = $this->session->image;					
			}

			$this->session->unset_userdata('image');

			//populate audit fields
			$input_data['last_updated_by']  = 'iccc'; //TODO: need to get this value from currently logged in username
			$input_data['last_updated_date'] = mdate('%Y-%m-%d %H:%i:%s');

			$is_updated = $this->product_model->update($id, $input_data);

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
			redirect(base_url().'Product/edit/'.$id);
		else
			redirect(base_url().'Product');

	}

    //POST request
    public function delete() {
                
        if($this->input->post('id'))
		{
			$id = $this->input->post('id');		
			$product_to_delete = $this->product_model->get_by_id($id);

			if($this->product_model->delete($id)) 	
			{		
				$this->session->set_flashdata('success','Record deleted successfully.');
				
				if($product_to_delete->image)
					$this->delete_product_image_file($product_to_delete->image);					
			}
			else
			{
				$this->session->set_flashdata('error','Could not delete record!');      
			}    
        }
        else
        {
            $this->session->set_flashdata('error','No request!');
        }

		redirect(base_url().'Product');
	}

	private function delete_product_image_file($filename){

		$file_path = PRD_IMG_FL_PATH . $filename;       
		// Check if file is exists
		if (file_exists($file_path) ) {
			// Delete the file
			unlink($file_path);          
		}

	}
	
    public function ajax_upload_image(){

        $targetPath = PRD_IMG_FL_PATH;

        // Check if it's an upload or and not a delete and if there is a file in the form
        if (!empty($_FILES)) {

            // Check if the upload folder exists
            if ( file_exists($targetPath) && is_dir($targetPath) ) {

                // Check if we can write in the target directory
                if ( is_writable($targetPath) ) {

                    $tempFile = $_FILES['file']['tmp_name'];

                    $path = $targetPath . $_FILES['file']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $file = basename($path, ".".$ext); 
                    $newFileName = $file.date('dmYHis').'.'.$ext; //append current datetime to make file unique

                    $targetFile = $targetPath . $newFileName; 

                    // Check if there is any file with the same name
                    if (file_exists($targetFile) ) {
                        unlink($targetFile);
                    }   

                    move_uploaded_file($tempFile, $targetFile);

                    // Be sure that the file has been uploaded
                    if ( file_exists($targetFile) ) {
                        // set file name in flash session variable to be updated in next session request
                        $this->session->image = $newFileName;
                        $response = array (
                            'status'    => 'success',
                            'info'      => 'File uploaded successfully.',
                            'file_link' => $targetFile
                        );

                    } else {
                        $response = array (
                            'status' => 'error',
                            'info'   => 'Couldn\'t upload the requested file :(-, a mysterious error happened.'
                        );
                    }


                } else {
                    $response = array (
                        'status' => 'error',
                        'info'   => 'The specified folder for upload isn\'t writeable.'
                    );
                }
            } else {
                $response = array (
                    'status' => 'error',
                    'info'   => ' No folder to upload to :(, Please create one.'
                );
            }

            // Return the response
            echo json_encode($response);
            exit;
        }
	}
	
	public function ajax_delete_image(){

            $file_path = $_POST['target_file'];

            // Check if file is exists
            if (file_exists($file_path) ) {

                // Delete the file
                unlink($file_path);

                // Be sure we deleted the file
                if ( !file_exists($file_path) ) {
                    $this->session->image = 'DEL';
                    $response = array (
                        'status' => 'success',
                        'info'   => 'Successfully Deleted.'
                    );                   

                } else {
                    // Check the directory's permissions
                    $response = array (
                        'status' => 'error',
                        'info'   => 'We screwed up, the file can\'t be deleted.'
                    );
                }
            } else {
                // Something weird happend and we lost the file
                $response = array (
                    'status' => 'error',
                    'info'   => 'Couldn\'t find the requested file :(,'
                );
            }

            // Return the response
            echo json_encode($response);
            exit;

	}
	
	public function ajax_get_image(){

        $targetPath = PRD_IMG_FL_PATH;

		$targetFile = $targetPath . $_POST['file_name'];

		if (file_exists($targetFile)) {
			$size = filesize($targetFile);              
			$response = array (
				'status' => 'success',
				'info'   => 'Requested file found!',                    
				'size'   => $size,
				'upload_ticket' => $targetFile
			);
		}
		else{
			$response = array (
				'status' => 'error',
				'info'   => 'Requested file not found!'
			);
		}
		// Return the response
		echo json_encode($response);
		exit;        
    }

}