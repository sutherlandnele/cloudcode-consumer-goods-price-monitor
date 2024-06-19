<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	
/**
* Description of Shop_Model
*
* @author http://www.cloudcode.com.pg
*/

class ACL_Model extends CI_Model {

    private $acls = 'ictr_acl';

    public function get_acl($class,$action){
        $this->db->select('is_protected');
        $this->db->from($this->acls);
        $this->db->where('LOWER(class)',strtolower($class));
        $this->db->where('LOWER(action)',strtolower($action));
        $query = $this->db->get();
        if($query->num_rows() == 0)
            return 0;
        else
            return $query->row()->is_protected;
        
    }	
}
