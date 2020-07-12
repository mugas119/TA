<?php

class mBeranda extends CI_Model{

    public function getAllKategori()
    {   
        return $this->db->get('category')->result_array();
    }

    public function getProduct($id)
    {   
        $this->db->where('cat_id', $id);
        return $this->db->get('products')->result_array();
    }
    public function getAllProduct()
    {
        return $this->db->get('products')->result_array();
    }
    public function getDetail($id)
    {   
        $this->db->where('prod_id', $id);
        return $this->db->get('products')->result_array();
    }

    public function search($keyword)
    {
        $this->db->like('prod_name',$keyword);
        $this->db->or_like('prod_desc',$keyword);

        $result = $this->db->get('products');
        return result;
    }

    public function getcart($id)
    {
        $this->db->where('prod_id',$id);
        $this->db->join('category', 'products.cat_id = category.cat_id');
        $this->db->join('vendor', 'products.vend_id = vendor.vend_id');
        $query=$this->db->get('products');
        return $query->row();
    }
    
    public function getcartid()
    {
        $this->db->select('cartid');
        
        return $this->db->get('cart')->row();
        
    }

    
    

    
}