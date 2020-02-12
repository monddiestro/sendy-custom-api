<?php 
class Sendy_model extends CI_Model {

    function push_data($data) {
        $this->db->insert('subscribers',$data);
    }

    function pull_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('subscribers');
        return = $query->num_rows();
    }

    function push_update($data,$email) {
        $this->db->where('email',$email);
        $this->db->where('list','3');
        $this->db->update('subscribers',$data);
    }


}