<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rumah_sakit extends CI_Model {
	public function getdata($id = null){
		if ($id == null) {
			$this->db->order_by('id_rumah_sakit','DESC');
			return $this->db->get('tabel_rumah_sakit')->result();
		} else {
			return $this->db->get_where('tabel_rumah_sakit',array('id_rumah_sakit'=>$id))->row();
		}
	}
    public function tambah_rumah_sakit(){
        //foto
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('foto'))
		{
			redirect('rumahsakit/tambah_rumah_sakit');
		}
		else
		{
			$data['cover'] = $this->upload->data('file_name');
		}
		//data_tempat
        $data = array(
            'thumbnail' => $data['cover'],
            'alamat' => $this->input->post('alamat',TRUE),
            'latitude' => $this->input->post('latitude',TRUE),
            'longitude' => $this->input->post('longitude',TRUE),
            'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
            'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit',TRUE)
        );
        $this->db->insert('tabel_rumah_sakit',$data);
        $this->session->set_flashdata('pesan','Data berhasil ditambahkan');
		redirect('rumahsakit');   
    }
	public function edit_rumah_sakit(){
        //foto
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto'))
		{
			$data['cover'] = $this->input->post('foto',TRUE);
		}
		else
		{
			$data['cover'] = $this->upload->data('file_name');
		}
		//data_tempat
        $data = array(
            'thumbnail' => $data['cover'],
            'alamat' => $this->input->post('alamat',TRUE),
            'latitude' => $this->input->post('latitude',TRUE),
            'longitude' => $this->input->post('longitude',TRUE),
            'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
            'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit',TRUE)
        );
		$this->db->where('id_rumah_sakit',$this->input->post('id',TRUE));
        $this->db->update('tabel_rumah_sakit',$data);
        $this->session->set_flashdata('pesan','Data berhasil diubah');
		redirect('rumahsakit');   
    }
	public function delete_rumah_sakit($id)
	{
		$this->db->where('id_rumah_sakit',$id);
		$this->db->delete('tabel_rumah_sakit');
        $this->session->set_flashdata('pesan','Data berhasil dihapus');
		redirect('rumahsakit');   
	}
}
