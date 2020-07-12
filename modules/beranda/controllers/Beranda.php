<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
          parent::__construct();
          $this->load->model('mBeranda');
          
     }
     
     public function index()
     {
          $data['kategori'] = $this->mBeranda->getAllKategori();
          $data['username'] = $this->session->userdata('username');
          
          $data['title'] = "RentALL";
          $this->load->view('template/header', $data);
          $this->load->view('template/topnav');
          
          $this->load->view('template/category');
          $this->load->view('template/newest', $data);
          $this->load->view('template/footer');
     }
     
     
     public function catalog()
     {
          $query = "SELECT * FROM products"; 
          $this->load->library('pagination');
          
          $config['base_url'] =base_url('beranda/catalog').'';
          $config['total_rows'] = $this->db->query($query)->num_rows();
          $config['per_page'] = 9;
          $config['uri_segment'] = 3;
          $config['num_links'] = 3;
          $config['full_tag_open'] = '<div class="row d-flex"><ul>';
          $config['full_tag_close'] = '</ul></div>';
          $config['first_link'] = '<span class="page-link">First</span>';
          $config['first_tag_open'] = '<li class="class="genric-btn info radius"">';
          $config['first_tag_close'] = '</li>';
          $config['last_link'] = '<span class="page-link">Last</span>';
          $config['last_tag_open'] = '<li class="genric-btn info radius">';
          $config['last_tag_close'] = '</li>';
          $config['next_link'] = '&gt;';
          $config['next_tag_open'] = '<li class="genric-btn info radius">';
          $config['next_tag_close'] = '</li>';
          $config['prev_link'] = '&lt;';
          $config['prev_tag_open'] = '<li class="genric-btn info radius">';
          $config['prev_tag_close'] = '</li>';
          $config['cur_tag_open'] = '<li class="genric-btn info radius active"><a href="#">';
          $config['cur_tag_close'] = '</a></li>';
          $config['num_tag_open'] = '<li class="genric-btn info radius">';
          $config['num_tag_close'] = '</li>';
          
          $this->pagination->initialize($config);
          
          $page =($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $query .= " LIMIT ".$page.", ".$config['per_page'];
          $data['limit'] = $config['per_page'];
          $data['total_rows'] = $config['total_rows'];
          $data['pagination'] = $this->pagination->create_links();
          $data['produk'] = $this->db->query($query)->result();
          $data['title'] = "RentALL";
          $data['username']= $this->session->userdata('username');

          $this->load->view('template/header', $data);
          $this->load->view('template/topnav',$data);
          
          $this->load->view('index', $data);
          $this->load->view('template/footer');
     }

     public function contact()
     {
          $data['username'] = $this->session->userdata('username');
          
          $data['title'] = "RentALL";
          $this->load->view('template/header', $data);
          $this->load->view('template/topnav');
          $this->load->view('contact');
          $this->load->view('template/footer');
     }
     
     public function login()
     {
          $this->load->view('template/header');
          $this->load->view('template/topnav');
          
          $valid = $this->form_validation;
          $username = $this->input->post('username'); 
          $password = $this->input->post('password'); 
          $valid->set_rules('username','Username','required');
          $valid->set_rules('password','Password','required');
  
          if($valid->run()) { 
              $this->simple_login->login($username,$password,base_url('dashboard'), base_url('login')); 
          
          } else {
              redirect(base_url('login'));
          }
          $this->load->view('template/footer');   
     }

     public function logout()
     {
          $this->simple_login->logout(); 
     }
     
     public function product($id)
     {
          $data['username'] = $this->session->userdata('username');
          
          $data['product'] = $this->mBeranda->getDetail($id);
          $data['title'] = "Detail Produk";
          $this->load->view('template/header', $data);
          $this->load->view('template/topnav');
         
          
          $this->load->view('produkdet', $data);
          $this->load->view('template/footer');
     }

     public function addtocart($id)
     {
          $produk=$this->mBeranda->getcart($id);
          $cid=$this->mBeranda->getcartid();
          $cidbaru = $cid + 1;
          $data = array(
               'cartid'      => $cidbaru,
               'prod_id'     => $produk->prod_id,
               'qty'         => 1
          );
          
          $this->db->insert('cart',$data);
          redirect('beranda/product/'.$id);
          
     }

     public function keranjang()
     {
          $data['username'] = $this->session->userdata('username');
          
         // $data['product'] = $this->mBeranda->getDetail($id);
           
        //  $data['prod_name'] = $this->mBeranda->addtocart();
         
          $this->load->view('template/header', $data);
          $data['title'] = "Keranjang Belanja";
          $this->load->view('template/topnav', $data);
          $this->load->view('keranjang',$data);
          $this->load->view('template/footer');
          
     }

     public function search()
     {
          $keyword = $this->input->post('keyword');
          $product = $this->mBeranda->search($keyword);
          $data ['products'] = $product;
          $hasil = $this->load->view('view',$data,true);
          $callback = array(
               'hasil' => $hasil, 
          );
          echo json_encode($callback);
     }
}