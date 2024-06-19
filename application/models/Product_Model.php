<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Product_Model
*
* @author http://www.cloudcode.com.pg
*/

class Product_Model extends CI_Model {

    //datatables related properties   
    public $dt_search_value;   
    public $dt_col_order;
    public $dt_col_order_dir;
    public $dt_page_length;
    public $dt_page_start;
	
    private $products = 'ictr_product';

    private $column_order = array('id','image','name','category','size','description'); //set column field database for datatable orderable

    private $column_search = array('ictr_product.name','ictr_product_category.name','ictr_product.size','ictr_product.description'); //set column field database for datatable searchable 

    private $order = array('name' => 'asc'); // default order 

    private function _get_datatables_query(){

        //build data source statement
        $this->db->select('ictr_product.id,ictr_product.image, ictr_product.name, ictr_product_category.name category,ictr_product.size,ictr_product.description');
        $this->db->from('ictr_product');      
        $this->db->join('ictr_product_category','ictr_product.product_category_id = ictr_product_category.id');  
        
  

        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($this->dt_search_value) // if datatable send POST for search
            {                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like('UPPER('.$item.')', strtoupper($this->dt_search_value));
                }
                else
                {
                    $this->db->or_like('UPPER('.$item.')', strtoupper($this->dt_search_value));
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
         if($this->dt_col_order && $this->dt_col_order_dir) // here order processing
         {
             $this->db->order_by($this->column_order[$this->dt_col_order], $this->dt_col_order_dir);
         } 
         else if(isset($this->order))
         {
             $order = $this->order;
             $this->db->order_by(key($order), $order[key($order)]);
         }
    }
    public function get_datatables(){
        $this->_get_datatables_query();
        if(isset($this->dt_page_length) && $this->dt_page_length != -1)
            $this->db->limit($this->dt_page_length, $this->dt_page_start);

        $query = $this->db->get();       
        return $query->result();
    }
    public function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
     public function count_all(){
        $this->db->from($this->products);
        return $this->db->count_all_results();
    }  
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->products);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }	

    public function get_all_search($search_product){
         
        //build data source statement
        $this->db->select('*');
        $this->db->from('ictr_product');      
        if(isset($search_product) && !empty($search_product)){
            $this->db->like('upper(concat(ictr_product.name,ictr_product.size))',strtoupper($search_product));
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id_view($id){

        //build data source statement
        $this->db->select('ictr_product.id,ictr_product.image, ictr_product.name,ictr_product.description,ictr_product.size, ictr_product_category.name category');
        $this->db->from('ictr_product');      
        $this->db->join('ictr_product_category','ictr_product.product_category_id = ictr_product_category.id');       
        $this->db->where('ictr_product.id',$id);
        $query = $this->db->get();        
        return $query->row();
    }	

	function delete($id) {
        $this->db->where('id', $id); 
        return $this->db->delete($this->products);
	}	
	function update($id, $data) { 		
        $this->db->where('id', $id);        
		return $this->db->update($this->products, $data);
	}	
	function create($data) {         
        $this->db->insert($this->products,$data);
        return $insert_id = $this->db->insert_id();
    }
    
    function get_dd_product_categories(){
     
        $result = $this->db->select('id,name')->from('ictr_product_category')->order_by('name','asc')->get()->result_array();

        $product_categories = array(); 

        foreach($result as $r) { 
            $product_categories[$r['id']] = $r['name']; 
        } 

        $product_categories[''] = '-- Select --'; 

        return $product_categories;       
    }

}
