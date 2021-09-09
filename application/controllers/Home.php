<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('model_rumah_sakit');
		$data['rumahsakit'] = $this->model_rumah_sakit->getdata();
		$this->template->load('admin_template','home',$data);
	}
	public function coba(){ 
		$this->template->load('admin_template','coba');
	}
}
