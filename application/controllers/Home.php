<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 public function __construct(){
        parent::__construct();
        $this->load->model('AddData');
    }

	public function index(){
		if ($this->session->userdata('login') != 'zpmlogin') {
			redirect('auth');
		}else{
			$data['list'] = $this->AddData->list()->result();
			$this->load->view('template/home_header');
			$this->load->view('template/home_menu');
			$this->load->view('home/index',$data);
			$this->load->view('template/home_footer');
		}
	}

	public function add(){
		if ($this->session->userdata('login') != 'zpmlogin') {
			riderect('auth');
		}else{
			$data['nopol'] = htmlspecialchars($this->input->post('nopol', true));
			$data['tahun'] = htmlspecialchars($this->input->post('tahun', true));
			$data['noka'] = htmlspecialchars($this->input->post('noka', true));
			$data['nosin'] = htmlspecialchars($this->input->post('nosin', true));
			$this->AddData->data($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambhkan</div>');
	        redirect('home');
		}
	}

	public function scan($id,$rule){
		if ($this->session->userdata('login') != 'zpmlogin') {
			riderect('auth');
		}else{
			$data['scan'] = $this->AddData->scan($id);
			$data['rule'] = $rule;
			$this->load->view('template/home_header');
			$this->load->view('template/home_menu');
			$this->load->view('scan/index',$data);
			$this->load->view('template/home_footer');
		}
	}

	public function image($id,$rule){
		$data = $this->AddData->scan($id);
		if ($rule == 'arsip1') {
			$gbr = $data->arsip1;
		}elseif ($rule == 'arsip2') {
			$gbr = $data->arsip2;
		}elseif ($rule == 'arsip3') {
			$gbr = $data->arsip3;
		}else{
			//
		}

		if (empty($gbr)) {
			echo '
				<div>
	                <img src="'.base_url('upload/blank.jpg').'"  width="50%">
	            </div>

			';
		}else{
			echo '
				<div>
	                <img src="'.base_url('upload/').$gbr.'"  width="50%">
	            </div>

			';
		}
		
	}

	public function view(){
		$id = $this->input->post('iddat');
		$dat = $this->AddData->scan($id);
		echo '
				<div class="form-group">
                  <label>Nopol</label>
                  <input type="text" class="form-control"  name="nopol" value="'.$dat->nopol.'">
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control"  name="tahun" value="'.$dat->tahun.'">
                </div>
                <div class="form-group">
                  <label>Kode Arsip Stnk</label>
                  <input type="text" class="form-control"  name="noka" value="'.$dat->noka.'">
                </div>
                <div class="form-group">
                  <label>Kode Arsip BPKB</label>
                  <input type="text" class="form-control"  name="nosin" value="'.$dat->nosin.'">
                </div>
                <div class="form-group">
                  <label>Arsip 1</label>';
                  if (empty($dat->arsip1)) {
                  	echo "Gambar tidak Tersedia";
                  }else{
                  	echo'
                  <div>
	                <img src="'.base_url('upload/').$dat->arsip1.'"  width="50%">
	              </div>
                </div>';
           		  }
                   echo'
                <div class="form-group">
                  <label>Arsip 2</label>';
                  if (empty($dat->arsip2)) {
                  	echo "Gambar tidak Tersedia";
                  }else{
                  	echo '
                  <div>
	                <img src="'.base_url('upload/').$dat->arsip2.'"  width="50%">
	              </div>
                </div>';}
                echo '
                <div class="form-group">
                  <label>Arsip 3</label>';
                  if (empty($dat->arsip3)) {
                  	echo "Gambar tidak Tersedia";
                  }else{
                  	echo '
                  <div>
	                <img src="'.base_url('upload/').$dat->arsip3.'"  width="50%">
	              </div>
                </div>';}
	}

	public function praedit(){
		$id = $this->input->post('iddat');
		$dat = $this->AddData->scan($id);
		echo '
				<div class="form-group">
                  <label>Nopol</label>
                  <input type="hidden" name="iddat" value="'.$dat->id_data.'">
                  <input type="text" class="form-control"  name="nopol" value="'.$dat->nopol.'">
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control"  name="tahun" value="'.$dat->tahun.'">
                </div>
                <div class="form-group">
                  <label>Kode Arsip Stnk</label>
                  <input type="text" class="form-control"  name="noka" value="'.$dat->noka.'">
                </div>
                <div class="form-group">
                  <label>Kode Arsip BPKB</label>
                  <input type="text" class="form-control"  name="nosin" value="'.$dat->nosin.'">
                </div>
            ';
	}

	public function update(){
		$where['id_data'] = $this->input->post('iddat');
		$data['nopol'] = $this->input->post('nopol');
		$data['tahun'] = $this->input->post('tahun');
		$data['noka'] = $this->input->post('noka');
		$data['nosin'] = $this->input->post('nosin');
		$this->AddData->dataupdate($where,$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit</div>');
	    redirect('home');
	}

	public function delete($id){
		$dat = $this->AddData->scan($id);
		$this->AddData->hapus($id);
		if (empty($dat->arsip1)) {
			//
		}else{
			$file1 = './upload/'.$dat->arsip1;
			unlink($file1);
		}

		if (empty($dat->arsip2)) {
			# code...
		}else{
			$file2 = './upload/'.$dat->arsip2;
			unlink($file2);
		}

		if (empty($dat->arsip3)) {
			$file3 = './upload/'.$dat->arsip3;
			unlink($file3);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data Berhasil dihapus</div>');
	    redirect('home');
	}
	
}