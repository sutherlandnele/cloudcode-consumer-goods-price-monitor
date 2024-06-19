<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Product_Model
*
* @author http://www.cloudcode.com.pg
*/

class User_Model extends CI_Model {

    private $users = 'ictr_user';

    public function get_by_username($username){
        $this->db->select('*');
        $this->db->from($this->users);
        $this->db->like('UPPER(user_name)',strtoupper($username));
        $query = $this->db->get();
        return $query->row();
    }	

}
