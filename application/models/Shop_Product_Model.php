<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Shop_Product_Model
*
* @author http://www.cloudcode.com.pg
*/

class Shop_Product_Model extends CI_Model {
    
    //datatables related properties   
    public $dt_search_value;   
    public $dt_col_order;
    public $dt_col_order_dir;
    public $dt_page_length;
    public $dt_page_start;

    private $shop_products = 'ictr_shop_product';
    private $shop_product_hist = 'ictr_shop_product_hist';


    //nb: column order has to be exaclty the same as the column definition in datatables
    private $column_order = array('id','shop','shop_id','product','product_id','current_price','discount_price','discount_price_start','discount_price_end','image'); //set column field database for datatable orderable

    private $column_search = array('ictr_product.name', 'ictr_shop.name', 'concat("K",format(ictr_shop_product.current_price,2))'
        , 'concat("K",format(ictr_shop_product.discount_price,2))'
        , 'date_format(ictr_shop_product.discount_price_start,"%d/%m/%Y")'
        , 'date_format(ictr_shop_product.discount_price_end,"%d/%m/%Y")'); //set column field database for datatable searchable 

    private $order = array('shop' => 'asc'); // default order 

    private function _get_datatables_query(){
         

        //build data source statement
        $this->db->select('sp.id, CONCAT(p.size," ",p.name) product,p.id product_id, s.name shop, s.id shop_id, concat("K",format(sp.current_price,2)) current_price, concat("K",format(sp.discount_price,2)) discount_price, date_format(sp.discount_price_start,"%d/%m/%Y") discount_price_start, date_format(sp.discount_price_end,"%d/%m/%Y") discount_price_end, p.image');
        $this->db->from('ictr_shop_product sp');
        $this->db->join('ictr_product p','sp.product_id = p.id');
        $this->db->join('ictr_shop s','sp.shop_id = s.id');  
        $this->db->where('sp.created_date = (select max(created_date) from ictr_shop_product sp2  where sp2.id = sp.id)',NULL, FALSE);

  

        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if(isset($this->dt_search_value) && $this->dt_search_value) // if datatable send POST for search
            {                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like('UPPER('.$item.')', strtoupper($this->dt_search_value));;
                }
                else
                {
                    $this->db->or_like('UPPER('.$item.')', strtoupper($this->dt_search_value));;
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
    public function get_datatables($product_id,$shop_id){

        $this->_get_datatables_query();
        if(isset($this->dt_page_length) && $this->dt_page_length != -1)
            $this->db->limit($this->dt_page_length, $this->dt_page_start);

        if($product_id != -1)
            $this->db->where('sp.product_id', $product_id);
        
        if($shop_id != -1)
            $this->db->where('sp.shop_id', $shop_id);

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
    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->shop_products);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }	

    public function get_by_id_view($id){

        //build data source statement
        $this->db->select('ictr_shop_product.id, CONCAT(ictr_product.size," ",ictr_product.name) product, ictr_product.id product_id, ictr_shop.name shop, ictr_shop.id shop_id, concat("K",format(ictr_shop_product.discount_price,2)) discount_price, concat("K",format(ictr_shop_product.current_price,2)) current_price, date_format(ictr_shop_product.discount_price_start,"%d/%m/%Y") discount_price_start, date_format(ictr_shop_product.discount_price_end,"%d/%m/%Y") discount_price_end,ictr_shop_product.description');
        $this->db->from('ictr_shop_product');
        $this->db->join('ictr_product','ictr_shop_product.product_id = ictr_product.id');
        $this->db->join('ictr_shop','ictr_shop_product.shop_id = ictr_shop.id'); 
        $this->db->where('ictr_shop_product.id',$id);
        $query = $this->db->get();
        return $query->row();
    }	

	function delete($id) {
        $this->db->where('id', $id); 
        return $this->db->delete($this->shop_products);
	}	
	function update($id, $data) { 		
        $this->db->where('id', $id);        
		return $this->db->update($this->shop_products, $data);
	}	
	function create($data) {         
        $this->db->insert($this->shop_products,$data);
        return $insert_id = $this->db->insert_id();
    }
    

    
    function get_dd_shops(){
     
        $result = $this->db->select('id,name')->from('ictr_shop')->order_by('name','asc')->get()->result_array();

        $shops = array(); 

        foreach($result as $r) { 
            $shops[$r['id']] = $r['name']; 
        } 

        $shops[''] = '-- Select --'; 

        return $shops;       
    }


    function get_dd_products(){
     
        $result = $this->db->select('id,name,size')->from('ictr_product')->order_by('name','asc')->get()->result_array();

        $products = array(); 

        foreach($result as $r) { 
            $products[$r['id']] = $r['size'].' '.$r['name']; 
        } 

        $products[''] = '-- Select --'; 

        return $products;       
    }

    function get_price_trend_filter_years($product_id,$shop_id){

        $result = $this->db->select('YEAR(time_stamp) year')->from($this->shop_product_hist)->where('product_id',$product_id)->where('shop_id',$shop_id)->group_by('YEAR(time_stamp)')->order_by('YEAR(time_stamp)','desc')->get()->result();

        return $result; 
    }

    function get_chart_data($product_id, $shop_id, $year){

        $result = $this->db->select('CONCAT(DAY(time_stamp)," ",SUBSTRING(MONTHNAME(time_stamp),1,3)) label, current_price data')->from($this->shop_product_hist)->where('product_id',$product_id)->where('shop_id',$shop_id)->where('YEAR(time_stamp)',$year)->order_by('time_stamp','asc')->get()->result();

        return $result; 
    }

    function get_chart_data_max($product_id, $shop_id, $year){

        $row = $this->db->select('ROUND(MAX(current_price)) max')->from($this->shop_product_hist)->where('product_id',$product_id)->where('shop_id',$shop_id)->where('YEAR(time_stamp)',$year)->get()->row();

        return $row; 
    }

    function get_max_year($col)
	{
		$max_year = 0;

		if(count($col) > 0){
			foreach ($col as $obj) { 
				if($obj->year > $max_year){
					$max_year = $obj->year;
				}				
			}
		}

		return $max_year;
    }
    
    function get_price_trend_data($product_id, $shop_id){

        $result = $this->db->select('h.id,h.shop_product_id,CONCAT(p.size," ",p.name) product,s.name shop,h.current_price,(CASE WHEN h.discount_price>0 THEN h.discount_price ELSE "" END) discount_price,h.discount_price_start,h.discount_price_end,h.action,h.time_stamp,h.user')->from('ictr_shop_product_hist h')->join('ictr_product p', 'h.product_id = p.id', 'left outer')->join('ictr_shop s', 'h.shop_id = s.id', 'left outer')->where('h.product_id',$product_id)->where('h.shop_id',$shop_id)->order_by('h.time_stamp','desc')->get()->result();

        return $result; 
    }



}
