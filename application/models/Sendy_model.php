<?php 
class Sendy_model extends CI_Model {

    function push_data($data) {
        $this->db->insert('subscribers',$data);
    }

}