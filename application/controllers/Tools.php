
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {
    
    //Constructor
	public function __construct() {
        parent::__construct();
        $this->load->model('Tools_Model', 'tools_model');
        $this->load->model('Product_Model', 'product_model');	
        $this->load->model('Shop_Model', 'shop_model');
        $this->load->model('Product_Category_Model', 'product_category_model');
    }
    
    //GET request
	public function quick_search() {

         $search_string = $this->input->get('query');
         $qs_products = $this->product_model->get_all_search($search_string);
         $qs_shops = $this->shop_model->get_all_search($search_string);
         $qs_categories = $this->product_category_model->get_all_search($search_string);
         $qs_search_result = '<div class="kt-quick-search__result">';  
         $qs_no_records_found_flag = 0;       
         $qs_no_record_found =  '<div class="kt-quick-search__message">
                                    No record found
                                </div>';

        //products
        if (count($qs_products) > 0) {
            $qs_no_records_found_flag = 1;
            $qs_search_result = $qs_search_result . '<div class="kt-quick-search__category">Goods</div><div class="kt-quick-search__section">';
           foreach ($qs_products as $product){
                $qs_search_result = $qs_search_result . '<div class="kt-quick-search__item"><div class="kt-quick-search__item-img">';
                $qs_search_result = $qs_search_result . '<img src="'.base_url().PRD_IMG_FL_PATH.$product->image.'" alt="" />';
                $qs_search_result = $qs_search_result . '</div><div class="kt-quick-search__item-wrapper">';
                $qs_search_result = $qs_search_result . '<a href="'.base_url().'PriceWatchlist/view_product/'.$product->id.'" class="kt-quick-search__item-title">'.$product->size.' '.$product->name.'</a>';
                $qs_search_result = $qs_search_result .  '<div class="kt-quick-search__item-desc">'.$product->description.'</div></div></div>';
           }
           $qs_search_result = $qs_search_result . '</div>'; //qs category end
        }
        //shops
        if (count($qs_shops) > 0) {
            $qs_no_records_found_flag = 1;
            $qs_search_result = $qs_search_result . '<div class="kt-quick-search__category">Shops</div><div class="kt-quick-search__section">';
           foreach ($qs_shops as $shop){
                $qs_search_result = $qs_search_result . '<div class="kt-quick-search__item"><div class="kt-quick-search__item-img">';
                $qs_search_result = $qs_search_result . '<img src="'.base_url().SHOP_IMG_FL_PATH.'shop.jpg" alt="" />';
                $qs_search_result = $qs_search_result . '</div><div class="kt-quick-search__item-wrapper">';
                $qs_search_result = $qs_search_result . '<a href="'.base_url().'PriceWatchlist/view_shop/'.$shop->id.'" class="kt-quick-search__item-title">'.$shop->name.'</a>';
                $qs_search_result = $qs_search_result .  '<div class="kt-quick-search__item-desc">'.$shop->description.'</div></div></div>';
           }
           $qs_search_result = $qs_search_result . '</div>'; //qs category end
        }
        //categories
        if (count($qs_categories) > 0) {
            $qs_no_records_found_flag = 1;
            $qs_search_result = $qs_search_result . '<div class="kt-quick-search__category">Categories</div><div class="kt-quick-search__section">';
           foreach ($qs_categories as $category){
                $qs_search_result = $qs_search_result . '<div class="kt-quick-search__item"><div class="kt-quick-search__item-img">';
                $qs_search_result = $qs_search_result . '<img src="'.base_url().PRD_CAT_IMG_FL_PATH.$category->image.'" alt="" />';
                $qs_search_result = $qs_search_result . '</div><div class="kt-quick-search__item-wrapper">';
                $qs_search_result = $qs_search_result . '<a href="'.base_url().'PriceWatchlist/search_category/'.$category->name.'" class="kt-quick-search__item-title">'.$category->name.'</a>';
                $qs_search_result = $qs_search_result .  '<div class="kt-quick-search__item-desc">'.$category->name.' category</div></div></div>';
           }
           $qs_search_result = $qs_search_result . '</div>'; //qs category end
        }

        //if nothing found...
        if($qs_no_records_found_flag==0)
        {
            $qs_search_result = $qs_search_result . $qs_no_record_found;
        }
               
        $qs_search_result = $qs_search_result . '</div>'; //qs result end
        
		echo $qs_search_result;
    }
    



}