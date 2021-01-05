<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddData extends CI_Model {

    public function data($data){
    	$this->db->insert('data', $data);
    	return;
    }

    public function list(){
        $data = $this->db->get('data');
        return $data;
    }

    public function scan($id){
        $this->db->where('id_data', $id); 
        $result = $this->db->get('data')->row(); 
        return $result;
    }

    public function scanupdate($where,$data){
        $this->db->where($where);
        $this->db->update('data',$data);
        return true;
    }

    public function dataupdate($where,$data){
        $this->db->where($where);
        $this->db->update('data',$data);
        return true;
    }

    public function hapus($id){
        $this->db->where('id_data',$id);
        $this->db->delete('data');
        return;
    }


}