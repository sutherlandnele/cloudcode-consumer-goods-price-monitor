<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Product_Model
*
* @author http://www.cloudcode.com.pg
*/

class Latest_News_Model extends CI_Model {

    private $latest_news = 'z25yx_content';


    public function get_latest_news($cat_id){
        $this->db->select('id,catid,title,introtext,urls link,created');
        $this->db->from($this->latest_news);
        $this->db->where('catid',$cat_id); 
        $this->db->order_by("created", "desc")->limit(5);
        $query = $this->db->get();
        return $query->result();
    }	

    public function get_top_latest_news($cat_id){
        $this->db->select_max('id');
        $this->db->from($this->latest_news);
        $this->db->where('catid',$cat_id);         
        $query = $this->db->get();
        return $query->row();
    }	

}
