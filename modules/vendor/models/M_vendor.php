<?php

class M_vendor extends CI_Model{

    public function getAllVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->order_by('vend_id', 'asc');
        $qry=$this->db->get();
        return $qry->result_array();
    }

    public function getVendor($id)
    {   
        $this->db->where('vend_id', $id);
        return $this->db->get('Vendor')->result_array();
    }

    public function getProductVendor($id)
    {
        $this->db->select('*');
        $this->db->where('vendor.vend_id', $id); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $this->db->join('vendor', 'products.vend_id = vendor.vend_id');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function editCat()
    {
        $cid = $this->input->post('catid', true);
		$row = $this->db->query('select vend_name from vendor where vend_id ="'.$cid.'"');
		$kategori = $row->row();
        $namas = $m_Vendor->Vendor_name;
        $nama_kategori = $this->input->post('catname', true);
        $data = array(
            'Vend_name' => $nama_kategori
        );
        $this->db->where('vend_id', $cid);
        $this->db->update('vendor', $data);
    }

    public $Vendor_id;
    public $Vendor_name;

    public function cekvid()
    {
        $query = $this->db->query("SELECT MAX(vend_id) as catid from vendor");
        $hasil = $query->row();
        return $hasil->catid;
    }

    public function addCat()
    {
        $id_kategori = $this->input->post('catid', true);
		$nama_kategori = $this->input->post('catname', true);
		$dataa = array(
			'vend_id' => $id_kategori,
			'vend_name' => $nama_kategori
		);
        $this->db->insert('vendor', $dataa);

        redirect(base_url('vendor'));
        
    }

}