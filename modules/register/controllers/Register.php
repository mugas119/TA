<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_account'); //call model
    }

    public function index(){
        $data['judul']="registrasi admin";
        $this->form_validation->set_rules('username', 'USERNAME','required');
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('password','PASSWORD','required');
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('registerv',$data);
        }else{
            $this->regis();
        }
    }
    private function regis()
    {
            $data['email']  = $this->input->post('email');
            $data['nama']  = $this->input->post('nama');
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $data['roles'] = "User";

            $this->m_account->daftar($data);
            $pesan['message'] = "Pendaftaran berhasil";
            $this->load->view('suksesv',$pesan);

            $this->m_account->sendForgot($data);
        
    }
}
?>