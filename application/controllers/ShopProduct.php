
<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ShopProduct extends CI_Controller
{

	//Constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shop_Product_Model', 'shop_product_model');
		$this->load->model('Product_Model', 'product_model');
		$this->load->model('Shop_Model', 'shop_model');
	}

	//private methods
	private function _initialize_datatable()
	{
		if (isset($_POST['search']['value']) && $_POST['search']['value']) {
			$this->shop_product_model->dt_search_value = $_POST['search']['value'];
		}

		if (isset($_POST['order']['0']['column']) && $_POST['order']['0']['column']) {
			$this->shop_product_model->dt_col_order = $_POST['order']['0']['column'];
		}
		if (isset($_POST['order']['0']['dir']) && $_POST['order']['0']['dir']) {
			$this->shop_product_model->dt_col_order_dir = $_POST['order']['0']['dir'];
		}
		if (isset($_POST['length']) && $_POST['length']) {
			$this->shop_product_model->dt_page_length = $_POST['length'];
		}
		if (isset($_POST['start']) && $_POST['start']) {
			$this->shop_product_model->dt_page_start = $_POST['start'];
		}
	}

	//GET request
	public function index()
	{
		$data['page_js'] = 'shop_product_home.js';
		$data['page_use_datatables_js'] = '1';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';
		$data['current_breadcrumb_title'] = 'Shop Goods';

		$this->load->view('template/header', $data);
		$this->load->view('shop_product_home', NULL);
		$this->load->view('template/footer', $data);
	}


	//GET request
	public function view($id = false)
	{
		$this->load->view('template/header');

		if (is_numeric($id))
			$shop_product_id = $id;
		else
			redirect(base_url('shopproduct/'));

		$data['shop_product'] = $this->shop_product_model->get_by_id_view($shop_product_id);
		$data['page_js'] = 'shop_product_view.js';
		$this->load->view('shop_product_view', $data);
		$this->load->view('template/footer', $data);
	}

	//GET request
	public function delete_confirmation($id = false)
	{

		if (is_numeric($id))
			$shop_product_id = $id;
		else
			redirect(base_url('shopproduct/'));

		$data['shop_product'] = $this->shop_product_model->get_by_id_view($shop_product_id);
		$data['page_js'] = 'shop_product_delete_confirmation.js';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';
		$data['l3_breadcrumb_title'] = 'Shop Goods';
		$data['l3_breadcrumb_url'] = base_url('ShopProduct');
		$data['current_breadcrumb_title'] = 'Delete Shop Good';

		$this->load->view('template/header', $data);
		$this->load->view('shop_product_delete_confirmation', $data);
		$this->load->view('template/footer', $data);
	}


	//Get request
	function get_shop_products()
	{

		$this->_initialize_datatable();
		$shop_id = -1;
		$product_id = -1;

		if (isset($_POST['product_id']) && $_POST['product_id'] != '') {
			$product_id  = $_POST['product_id'];
		}
		if (isset($_POST['shop_id']) && $_POST['shop_id'] != '') {
			$shop_id = $_POST['shop_id'];
		}

		$shop_products = $this->shop_product_model->get_datatables($product_id, $shop_id);
		$data = array();


		$no =  isset($_POST['start']) ?  $_POST['start'] : 0;

		foreach ($shop_products as $shop_product) {
			$row = array();
			$data[] = $shop_product;
		}

		$output = array(
			"draw" => isset($_POST['draw']) ?  $_POST['draw'] : 0,
			"recordsTotal" => $this->shop_product_model->count_all(),
			"recordsFiltered" => $this->shop_product_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	//GET request
	public function add_new()
	{


		$data['page_js'] = 'add_new_shop_product.js';
		$data['dd_products'] = $this->shop_product_model->get_dd_products();
		$data['dd_shops'] = $this->shop_product_model->get_dd_shops();


		$data['l2_breadcrumb_title'] = 'ICCC Information Management';
		$data['l3_breadcrumb_title'] = 'Shop Goods';
		$data['l3_breadcrumb_url'] = base_url('ShopProduct');
		$data['current_breadcrumb_title'] = 'Add New Shop Good';

		$this->load->view('template/header', $data);
		$this->load->view('add_new_shop_product', $data);
		$this->load->view('template/footer', $data);
	}

	//GET request
	public function edit($id = false)
	{


		if (is_numeric($id))
			$shop_product_id = $id;
		else
			redirect(base_url('shopproduct/'));

		$data['shop_product'] = $this->shop_product_model->get_by_id($shop_product_id);
		$data['dd_products'] = $this->shop_product_model->get_dd_products();
		$data['dd_shops'] = $this->shop_product_model->get_dd_shops();
		$data['page_js'] = 'edit_shop_product.js';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';
		$data['l3_breadcrumb_title'] = 'Shop Goods';
		$data['l3_breadcrumb_url'] = base_url('ShopProduct');
		$data['current_breadcrumb_title'] = 'Edit Shop Good';

		$this->load->view('template/header', $data);
		$this->load->view('edit_shop_product', $data);
		$this->load->view('template/footer', $data);
	}

	//POST request
	public function create()
	{

		if ($this->input->post('input_val')) {
			$input_data = $this->input->post('input_val');

			//format date string to mysql datestring format
			if (isset($input_data['discount_price_start']) && !empty($input_data['discount_price_start'])) {

				$input_data['discount_price_start']  = join('-', array_reverse(explode('/', $input_data['discount_price_start'])));
			} else {
				$input_data['discount_price_start'] = NULL;
			}

			if (isset($input_data['discount_price_end']) && !empty($input_data['discount_price_end'])) {

				$input_data['discount_price_end']  = join('-', array_reverse(explode('/', $input_data['discount_price_end'])));
			} else {
				$input_data['discount_price_end'] = NULL;
			}


			//populate audit fields
			$input_data['created_by']  = 'iccc'; //TODO: need to get this value from currently logged in username
			$input_data['created_date'] = mdate('%Y-%m-%d %H:%i:%s');

			$is_inserted = $this->shop_product_model->create($input_data);

			if ($is_inserted)
				$this->session->set_flashdata('success', 'Record created successfully.');
			else
				$this->session->set_flashdata('error', 'Could not create new record!');
		} else {
			$this->session->set_flashdata('error', 'No request!');
		}

		redirect(base_url('ShopProduct/add_new'));
	}

	//POST request
	public function update()
	{

		$id = 0;

		if ($this->input->post('input_val')) {

			$id = $this->input->post('id');
			$input_data = $this->input->post('input_val');

			//format date string to mysql datestring format		
			if (isset($input_data['discount_price_start']) && !empty($input_data['discount_price_start'])) {

				$input_data['discount_price_start']  = join('-', array_reverse(explode('/', $input_data['discount_price_start'])));
			} else {
				$input_data['discount_price_start'] = NULL;
			}

			if (isset($input_data['discount_price_end']) && !empty($input_data['discount_price_end'])) {

				$input_data['discount_price_end']  = join('-', array_reverse(explode('/', $input_data['discount_price_end'])));
			} else {
				$input_data['discount_price_end'] = NULL;
			}

			//populate audit fields
			$input_data['last_updated_by']  = 'iccc'; //TODO: need to get this value from currently logged in username
			$input_data['last_updated_date'] = mdate('%Y-%m-%d %H:%i:%s');

			$is_updated = $this->shop_product_model->update($id, $input_data);

			if ($is_updated)
				$this->session->set_flashdata('success', 'Record updated successfully.');
			else
				$this->session->set_flashdata('error', 'Could not update record!');
		} else {
			$this->session->set_flashdata('error', 'No request!');
		}

		if ($id != 0)
			redirect(base_url() . 'ShopProduct/edit/' . $id);
		else
			redirect(base_url() . 'ShopProduct');
	}

	//POST request
	public function delete()
	{

		if ($this->input->post('id')) {
			$id = $this->input->post('id');

			if ($this->shop_product_model->delete($id))
				$this->session->set_flashdata('success', 'Record deleted successfully.');
			else
				$this->session->set_flashdata('error', 'Could not delete record!');
		} else {
			$this->session->set_flashdata('error', 'No request!');
		}

		redirect(base_url() . 'ShopProduct');
	}


	public function view_shop_product($product_id = false, $shop_id = false)
	{

		if (is_numeric($product_id) && is_numeric($shop_id)) {
			$data['product'] = $this->product_model->get_by_id_view($product_id);
			$data['shop'] = $this->shop_model->get_by_id($shop_id);
			
			$data['price_trend_filter_years'] = $this->shop_product_model->get_price_trend_filter_years($product_id,$shop_id);
			$data['max_year'] = $this->shop_product_model->get_max_year($data['price_trend_filter_years']);
			$data['page_js'] = 'shop_product_view.js';
			$data['page_use_datatables_js'] = '1';
			$data['l2_breadcrumb_title'] = 'ICCC Information Management';
			$data['l3_breadcrumb_title'] = 'Shop Goods';
			$data['l3_breadcrumb_url'] = base_url('ShopProduct');
			$data['current_breadcrumb_title'] = 'View Shop Good';
			$data['shop_view_url'] = base_url('ShopProduct/view_shop/');
			$this->load->view('template/header', $data);
			$this->load->view('shop_product_view', $data);
			$this->load->view('template/footer', $data);
		} else {
			redirect(base_url('ShopProduct'));
		}
	}

	//GET request
	public function view_shop($id = false)
	{


		if (is_numeric($id))
			$shop_id = $id;
		else
			redirect(base_url('ShopProduct/'));

		$data['shop'] = $this->shop_model->get_by_id_view($shop_id);
		$data['page_use_datatables_js'] = '1';
		$data['page_js'] = 'shop_view.js';

		$data['l2_breadcrumb_title'] = 'ICCC Information Management';
		$data['l3_breadcrumb_title'] = 'Shop Goods';
		$data['l3_breadcrumb_url'] = base_url('ShopProduct');
		$data['current_breadcrumb_title'] = 'View Shop';
		$data['product_view_url'] = base_url('ShopProduct/view_product/');

		$this->load->view('template/header', $data);
		$this->load->view('shop_view', $data);
		$this->load->view('template/footer', $data);
	}

	//POST AJAX request
	public function get_chart_data()
	{

		$product_id = $this->input->post('product_id');
		$shop_id = $this->input->post('shop_id');
		$year = $this->input->post('year');

		$response = [];
		$data = [];


		if (isset($product_id) && $product_id != '' && isset($shop_id) && $shop_id != '' && isset($year) && $year != '') {
			$result = $this->shop_product_model->get_chart_data($product_id, $shop_id, $year);
			$rec = $this->shop_product_model->get_chart_data_max($product_id, $shop_id, $year);

			if (count($result) > 0) {

				$data = array();

				foreach ($result as $row) {
					$data['labelArray'][] = $row->label;
					$data['dataArray'][] = (float) $row->data;
				}

				$data['y_axis_max'] = (float) $rec->max;

				$response = array(
					'status'    => 'success',
					'info'      => 'Chart data retrieved successfully',
					'chart_data' => $data
				);
			} else {
				$response = array(
					'status'    => 'fail',
					'info'      => 'no data found',
					'chart_data' => ''
				);
			}
		}




		//output to json format
		echo json_encode($response);
	}


	public function create_price_trend_excel_data($product_id = false, $shop_id = false)
	{
		$fileName = 'PriceTrendData.xlsx';
		$priceTrendData = $this->shop_product_model->get_price_trend_data($product_id, $shop_id);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Id');
		$sheet->setCellValue('B1', 'Shop_Good_Id');
		$sheet->setCellValue('C1', 'Good');
		$sheet->setCellValue('D1', 'Shop');
		$sheet->setCellValue('E1', 'Current_Price');
		$sheet->setCellValue('F1', 'Discount_Price');
		$sheet->setCellValue('G1', 'Discount_Price_Start');
		$sheet->setCellValue('H1', 'Discount_Price_End');
		$sheet->setCellValue('I1', 'Action');
		$sheet->setCellValue('J1', 'Last_Updated_Time');
		$sheet->setCellValue('K1', 'UpdatedBy');
		$rows = 2;

		foreach ($priceTrendData as $val) {
			$sheet->setCellValue('A' . $rows, $val->id);
			$sheet->setCellValue('B' . $rows, $val->shop_product_id);
			$sheet->setCellValue('C' . $rows, $val->product);
			$sheet->setCellValue('D' . $rows, $val->shop);
			$sheet->setCellValue('E' . $rows, $val->current_price);
			$sheet->setCellValue('F' . $rows, $val->discount_price);
			$sheet->setCellValue('G' . $rows, $val->discount_price_start);
			$sheet->setCellValue('H' . $rows, $val->discount_price_end);
			$sheet->setCellValue('I' . $rows, $val->action);
			$sheet->setCellValue('J' . $rows, $val->time_stamp);
			$sheet->setCellValue('K' . $rows, $val->user);			
			$rows++;
		}

		$writer = new Xlsx($spreadsheet);
		// $writer->save("uploads/price_trend/" . $fileName."-".$product_id."-".$shop_id."-".date('dmYHis'));
		$writer->save("uploads/price_trend/" . $fileName);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url() . "/uploads/price_trend/" . $fileName);
	}
}
