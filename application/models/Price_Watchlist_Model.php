<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Price_Watchlist_Model
*
* @author http://www.cloudcode.com.pg
*/

class Price_Watchlist_Model extends CI_Model {

    //datatables related properties   
    public $dt_product_sv;
    public $dt_product_category_sv;
    public $dt_shop_sv;
    public $dt_city_sv;
    public $dt_region_sv;
    // public $dt_price_date_sv;
    public $dt_col_order;
    public $dt_col_order_dir;
    public $dt_page_length;
    public $dt_page_start;
	
    private $shop_products = 'ictr_shop_product';   

    private $column_order = array('id','product','product_id','image','category','shop','shop_id','city','region','current_price','discount_price','discount_price_start','discount_price_end'); 

    private $order = array('id' => 'asc'); // default order 

    private function _get_datatables_query(){

        //build data source statement
        $this->db->select('sp.id, CONCAT(p.size," ",p.name) product, p.id product_id, p.image, pc.name category
                            ,s.name shop, s.id shop_id, c.name city, r.name region
                            ,concat("K",format(sp.current_price,2)) current_price, concat("K",format(sp.discount_price,2)) discount_price
                            ,date_format(sp.discount_price_start,"%d/%m/%Y") discount_price_start
                            ,date_format(sp.discount_price_end,"%d/%m/%Y") discount_price_end');
        $this->db->from('ictr_shop_product sp');
        $this->db->join('ictr_product p','sp.product_id = p.id');
        $this->db->join('ictr_shop s','sp.shop_id = s.id');
        $this->db->join('ictr_product_category pc','p.product_category_id = pc.id');  
        $this->db->join('ictr_city c','s.city_id = c.id');  
        $this->db->join('ictr_region r','c.region_id = r.id');  
        $this->db->where('sp.created_date = (select max(created_date) from ictr_shop_product sp2  where sp2.id = sp.id)', NULL, FALSE); //get only the latest enter shop products

        //column searching
        if($this->dt_product_sv){
            $this->db->like('upper(p.name)', strtoupper($this->dt_product_sv));  
        }
        if($this->dt_product_category_sv){
            $this->db->where('pc.name', $this->dt_product_category_sv);
        }
        if($this->dt_shop_sv){
            $this->db->where('s.name', $this->dt_shop_sv);       
        }
        if($this->dt_city_sv){
            $this->db->where('c.name', $this->dt_city_sv);
        }
        if($this->dt_region_sv){
            $this->db->where('r.name', $this->dt_region_sv);
        }
        // if($this->dt_price_date_sv){

        //     $dates = array();

        //     $dates = explode('|',$this->dt_price_date_sv); 

        //     if(count($dates) == 2){            
        //         $mdate_from = join('-',array_reverse(explode('/',$dates[0])));
        //         $mdate_to = join('-',array_reverse(explode('/',$dates[1])));
        //         $this->db->where('sp.price_date >=', $mdate_from);
        //         $this->db->where('sp.price_date <=', $mdate_to);
        //     }

        // }

        //column ordering 
        if($this->dt_col_order && $this->dt_col_order_dir) // here order processing
        {
            $this->db->order_by($this->column_order[$this->dt_col_order] , $this->dt_col_order_dir);            
        } 
        else if(isset($this->order) && $this->order) 
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables(){
        $this->_get_datatables_query();
        if($this->dt_page_length && $this->dt_page_length  != -1 && $this->dt_page_start)
            $this->db->limit($this->dt_page_length , $this->dt_page_start );

        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
     public function count_all(){
        $this->db->from($this->shop_products);
        return $this->db->count_all_results();
    }  

    

    
}
