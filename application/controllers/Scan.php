<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('AddData');
    }

	public function index(){
		$image = $this->input->post('image');
		$bin = base64_decode($image);
		$id = $this->input->get('id');
		$arsip = $this->input->get('arsip');
		$file = $this->input->get('file');
		if (empty($file)) {
			$filename = uniqid();
		}else{
			$filename = str_replace('.jpg', "",$file);
		}

		if ( ! write_file('./upload/'.$filename.'.jpg', $bin)){
			$result = array(
				"status" =>422,
				"description" => "Upload Document Failed"
			);
		}else{
			$where['id_data'] = $id;
			if ($arsip == 'arsip1') {
				$data['arsip1'] = $filename.'.jpg';
			}elseif ($arsip == 'arsip2') {
				$data['arsip2'] = $filename.'.jpg';
			}elseif ($arsip == 'arsip3') {
				$data['arsip3'] = $filename.'.jpg';
			}else{
				echo "error";
			}
			$this->AddData->scanupdate($where,$data);
			$result = array(
			    "status" =>200,
				"description" => 'Upload Document Success'
			);
		}
		echo json_encode($result);
	}

}