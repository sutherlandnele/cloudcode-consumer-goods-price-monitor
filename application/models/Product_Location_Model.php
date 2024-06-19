<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Product_Model
*
* @author http://www.cloudcode.com.pg
*/

class Product_Location_Model extends CI_Model {
	
    
    function get_dd_products(){
     
        $result = $this->db->select('id,name,size')->from('ictr_product')->order_by('name','asc')->get()->result_array();

        $products = array(); 

        foreach($result as $r) { 
            $products[$r['id']] = $r['size']." ".$r['name']; 
        } 

        $products[''] = '-- Select --'; 

        return $products;       
    }

    function get_shops_selling_product(){
     
        //build data source statement
        
        $this->db->select('concat(ictr_shop.name,\'<br><a href="Shop/view/\',ictr_shop.id,\'">View Shop</a>\') shop,ictr_shop.location_latitude latitude,ictr_shop.location_longtitude longtitude ');
        $this->db->from('ictr_shop_product');      
        $this->db->join('ictr_shop','ictr_shop_product.shop_id = ictr_shop.id'); 
        

        if(isset($_POST['product_id']) && $_POST['product_id']!=''){ 
            $this->db->where('ictr_shop_product.product_id',$_POST['product_id']);
        }

        $query = $this->db->get();        
        return $query->result();    
    }

    function get_shop(){
     
        //build data source statement
        
        $this->db->select('ictr_shop.name shop,ictr_shop.location_latitude latitude,ictr_shop.location_longtitude longtitude ');
        $this->db->from('ictr_shop');      
        if(isset($_POST['shop_id']) && $_POST['shop_id']!=''){ 
            $this->db->where('ictr_shop.id',$_POST['shop_id']);
        }

        $query = $this->db->get();        
        return $query->result();    
    }


}
