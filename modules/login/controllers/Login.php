<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
    // Fungsi Login
   
    
    $valid = $this->form_validation;
    $username = $this->input->post('username'); 
    $password = $this->input->post('password'); 
    $valid->set_rules('username','Username','required');
    $valid->set_rules('password','Password','required');
    $data['username'] = $this->session->userdata('username');
    
    if($valid->run()==FALSE) { 
    $this->load->view('beranda/template/header');
    $this->load->view('beranda/template/topnav',$data);
    $this->load->view('login');
    
    $this->load->view('beranda/template/footer');   
        
    } else {
        $this->simple_login->login($username,$password,base_url('dashboard'), base_url('login')); 
    }
     
    }
    
    public function logout(){
        $this->simple_login->logout(); 
    }
}