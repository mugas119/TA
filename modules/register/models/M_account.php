<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_account extends CI_Model{
    function daftar($data){
        $this->db->insert('users', $data);
    }
    
    function sendForgot($token, $email){
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'ptotocol' => 'smtp',
            'smtp-host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'wildan.kharisma46@gmail.com',
            'smtp_port' => 465,
            'smtp_pass' => 'guitar125',
            'newline' => "\r\n"
        ];

        $message = "link dibawah untuk mereset password : 
                    <br><br>
                    <p><s href='".base_url()."member/resetpassword?email=".$email/$token."'>".base_url()."member/resetpassword?email=".$email."&token=".$token."</a><p>
                    <br><br>
                    terima kasih";

                    $this->load->library('email',$config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user'], 'dev');
                    $this->email->to($email);
                    $this->email->subject('pls reset password');
                    $this->email->message($message);

                    if($this->email->send()){
                        return true;
                    }else{
                        echo $this->email->print_debugger();
                        die;
                    }
    }
}
?>