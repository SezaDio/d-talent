<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent extends CI_Controller {

	public function index()
	{
		$data['page_title'] = "Talent";

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/index');
		$this->load->view('skin/talent/footer');
	}
}
