<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Shop_Model
*
* @author http://www.cloudcode.com.pg
*/

class Product_Category_Model extends CI_Model {

    private $product_categories = 'ictr_product_category';

    public function get_all($product_category_type){
         
        //build data source statement
        $this->db->select('ictr_product_category.id, ictr_product_category.name, ictr_product_category.image, ictr_product_category_type.name product_category_type');
        $this->db->from('ictr_product_category');      
        $this->db->join('ictr_product_category_type','ictr_product_category_type.id = ictr_product_category.product_category_type_id');  
        if($product_category_type > 0){
            $this->db->where('ictr_product_category_type.id',$product_category_type);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_search($search_category){
         
        //build data source statement
        $this->db->select('*');
        $this->db->from('ictr_product_category');      
        if(isset($search_category) && !empty($search_category)){
            $this->db->like('upper(ictr_product_category.name)',strtoupper($search_category));
        }
        $query = $this->db->get();
        return $query->result();
    }

 
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->product_categories);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }	

    public function get_by_id_view($id){

        //build data source statement
        $this->db->select('ictr_product_category.id, ictr_product_category.name, ictr_product_category.image, ictr_product_category_type.name product_category_type');
        $this->db->from('ictr_product_category');      
        $this->db->join('ictr_product_category_type','ictr_product_category_type.id = ictr_product_category.ictr_product_category_type_id');  
        $this->db->where('ictr_product_category.id',$id);
        $query = $this->db->get();        
        return $query->row();
    }	

	function delete($id) {
        $this->db->where('id', $id); 
        return $this->db->delete($this->product_categories);
	}	
	function update($id, $data) { 		
        $this->db->where('id', $id);        
		return $this->db->update($this->product_categories, $data);
	}	
	function create($data) {         
        $this->db->insert($this->product_categories,$data);
        return $insert_id = $this->db->insert_id();
    }

    function get_dd_product_category_types(){
     
        $result = $this->db->select('id,name')->from('ictr_product_category_type')->order_by('name','asc')->get()->result_array();

        $product_category_types = array(); 

        foreach($result as $r) { 
            $product_category_types[$r['id']] = $r['name']; 
        } 

        $product_category_type[''] = '-- Select --'; 

        return $product_category_type;       
    }


}
