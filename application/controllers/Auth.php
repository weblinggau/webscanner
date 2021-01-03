<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	 public function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('template/auth_header');
		$this->load->view('auth/login');
		$this->load->view('template/auth_footer');
	}

	public function login(){
		$username= $this->input->post('username');
	    $password= $this->input->post('password');
	    $user=$this->db->get_where('user', ['username' =>$username])->row_array();
	    if($user){
	        //jika usernya aktif
	        if($user['is_active'] ==1){
	            //cek password
	            if(password_verify($password, $user['password'])){
	                $data=[
	                    'email'=>$user['email'],
	                    'role_id'=>$user['role_id'],
	                    'login' => 'zpmlogin'
	                ];
	                $this->session->set_userdata($data);
	                redirect('Panel');
	            }else{
	                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
	                redirect('auth');
	            }

	        }else{
	            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
	        redirect('auth');
	        }
	    }else{
	        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
	        redirect('auth');
	    }
	}
}
