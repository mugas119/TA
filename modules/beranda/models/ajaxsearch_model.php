<?php
class Ajaxsearch_model extends CI_model
{
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("customer");
        if($query != '')
        {
            $this->db->like('nama', $query);
            $this->db->or('email', $query);
            $this->db->or('alamat', $query);
            $this->db->or('telp', $query);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
}
?>