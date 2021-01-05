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
	        if($user['status'] ==1){
	            //cek password
	            if(password_verify($password, $user['password'])){
	                $data=[
	                    'username'=>$user['username'],
	                    'role'=>$user['role'],
	                    'login' => 'zpmlogin'
	                ];
	                $this->session->set_userdata($data);
	                redirect('home');
	            }else{
	                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
	                redirect('auth');
	            }

	        }else{
	            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
	        redirect('auth');
	        }
	    }else{
	        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
	        redirect('auth');
	    }
	}

	public function logout(){
		session_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout.</div>');
		redirect('auth');
	}
}
