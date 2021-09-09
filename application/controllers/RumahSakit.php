<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RumahSakit extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_rumah_sakit');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['rumahsakit'] = $this->model_rumah_sakit->getdata();
		$this->template->load('admin_template','data_rumah_sakit',$data);
	}
	public function tambah_rumah_sakit()
	{	
		if (empty($_FILES['foto']['name'])) {		
			$this->form_validation->set_rules('foto','Foto','required');
		}
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		$this->form_validation->set_rules('latitude','Latitude','required|trim');
		$this->form_validation->set_rules('longitude','Longitude','required|trim');
		$this->form_validation->set_rules('nama_rumah_sakit','Nama Rumah Sakit','required|trim');
		$this->form_validation->set_rules('nomor_telepon','Nomor Telepon','required|trim');
		if ($this->form_validation->run() == true) {
			$this->model_rumah_sakit->tambah_rumah_sakit();
		}
		$this->template->load('admin_template','tambah_rumah_sakit');
	}
	public function edit_rumah_sakit($id)
	{
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		$this->form_validation->set_rules('latitude','Latitude','required|trim');
		$this->form_validation->set_rules('longitude','Longitude','required|trim');
		$this->form_validation->set_rules('nama_rumah_sakit','Nama Rumah Sakit','required|trim');
		$this->form_validation->set_rules('nomor_telepon','Nomor Telepon','required|trim');
		if ($this->form_validation->run() == true) {
			$this->model_rumah_sakit->edit_rumah_sakit();
		}
		$data['rumahsakit'] = $this->model_rumah_sakit->getdata($id);
		$this->template->load('admin_template','edit_rumah_sakit',$data);
	}
	public function delete_rumah_sakit($id)
	{
		$this->model_rumah_sakit->delete_rumah_sakit($id);
	}
} 
