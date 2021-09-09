<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->load->model('model_rumah_sakit');
		$data['rumahsakit'] = $this->model_rumah_sakit->getdata();
		$this->template->load('user_template','user',$data);
	}
	public function detail($id){
		$this->load->model('model_rumah_sakit');
		$data['rumahsakit'] = $this->model_rumah_sakit->getdata($id);
		$this->template->load('user_template','detail_rumah_sakit',$data);
	}
}
