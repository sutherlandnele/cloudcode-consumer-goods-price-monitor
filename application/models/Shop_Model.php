<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Shop_Model
*
* @author http://www.cloudcode.com.pg
*/

class Shop_Model extends CI_Model {

    //datatables related properties   
    public $dt_search_value;   
    public $dt_col_order;
    public $dt_col_order_dir;
    public $dt_page_length;
    public $dt_page_start;
        
	
    private $shops = 'ictr_shop';

    private $column_order = array('id','name','city','region','latitude','longtitude'); //set column field database for datatable orderable

    private $column_search = array('ictr_shop.name','ictr_city.name','ictr_region.name','ictr_shop.location_latitude','ictr_shop.location_longtitude'); //set column field database for datatable searchable 

    private $order = array('name' => 'asc'); // default order 

    private function _get_datatables_query(){
         
        //build data source statement
        $this->db->select('ictr_shop.id, ictr_shop.name, ictr_city.name city, ictr_region.name region, ictr_shop.location_latitude latitude, ictr_shop.location_longtitude longtitude');
        $this->db->from('ictr_shop');      
        $this->db->join('ictr_city','ictr_shop.city_id = ictr_city.id');  
        $this->db->join('ictr_region','ictr_city.region_id = ictr_region.id');
  

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
        if($this->dt_page_length != -1)
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
        $this->db->from($this->shops);
        return $this->db->count_all_results();
    }  
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->shops);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }	
    public function get_all_search($search_shop){
         
        //build data source statement
        $this->db->select('*');
        $this->db->from('ictr_shop');      
        if(isset($search_shop) && !empty($search_shop)){
            $this->db->like('upper(ictr_shop.name)',strtoupper($search_shop));
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id_view($id){

        //build data source statement
        $this->db->select('ictr_shop.id, ictr_shop.name, ictr_city.name city, ictr_region.name region, ictr_shop.location_latitude latitude, ictr_shop.location_longtitude longtitude,ictr_shop.website,ictr_shop.description');
        $this->db->from('ictr_shop');      
        $this->db->join('ictr_city','ictr_shop.city_id = ictr_city.id');  
        $this->db->join('ictr_region','ictr_city.region_id = ictr_region.id');
        $this->db->where('ictr_shop.id',$id);
        $query = $this->db->get();        
        return $query->row();
    }	

	function delete($id) {
        $this->db->where('id', $id); 
        return $this->db->delete($this->shops);
	}	
	function update($id, $data) { 		
        $this->db->where('id', $id);        
		return $this->db->update($this->shops, $data);
	}	
	function create($data) {         
        $this->db->insert($this->shops,$data);
        return $insert_id = $this->db->insert_id();
    }

    function get_dd_cities(){
     
        $result = $this->db->select('id,name')->from('ictr_city')->order_by('name','asc')->get()->result_array();

        $cities = array(); 

        foreach($result as $r) { 
            $cities[$r['id']] = $r['name']; 
        } 

        $cities[''] = '-- Select --'; 

        return $cities;       
    }

    function get_dd_regions(){
     
        $result = $this->db->select('id,name')->from('ictr_region')->order_by('name','asc')->get()->result_array();

        $regions = array(); 

        foreach($result as $r) { 
            $regions[$r['id']] = $r['name']; 
        } 

        $regions[''] = '-- Select --'; 

        return $regions;       
    }


}
