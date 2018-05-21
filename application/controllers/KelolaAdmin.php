<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaAdmin extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{
		$this->load->model('admin_models/AdminModels');
		$data['listAdmin'] = $this->AdminModels->get_data_admin();
			
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_admin', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	//Delete Data
	public function delete_admin()
	{
		$id_admin = $_POST['id_admin'];
		$this->load->model('admin_models/AdminModels');
		$this->AdminModels->delete_admin($id_admin);


		$this->index();
	}

	//Delete Data detail produk
	public function delete_detail_admin($id_admin)//
	{
		$this->load->model('admin_models/AdminModels');
		$this->AdminModels->delete_admin($id_admin);


		$this->index();
	}
	
	//Lihat detail produk
	public function lihat_detail_admin($id_admin)
	{
		$this->load->model('admin_models/AdminModels');

		//Ambil id_agenda yang akan diedit
		$data['id_admin'] = $this->AdminModels->select_by_id_admin($id_admin)->row();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/detail_admin', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	//tambah admin soon
	public function tambah_admin()
	{
		$this->load->model('admin_models/AdminModels');

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_admin');
		$this->load->view('skin/admin/footer_admin');
	}
	
	function tambah_admin_check() {
        $this->load->model('admin_models/AdminModels');
		$this->load->library('form_validation');

		$tambah = $this->input->post('submit');
		$status_admin = array('Admin Wow'=>'Admin Wow',
                              'Admin Update'=>'Admin Update',
                              'Admin News'=>'Admin News',
                              'Admin Pepak'=>'Admin Pepak',
                              'Admin Karepmu'=>'Admin Karepmu',
                              'Admin Shopping'=>'Admin Shopping',
                              'Admin Comming Soon'=>'Admin Comming Soon',
                              'Admin Member Control'=>'Admin Member Control'
                              );
		$data['status_admin']= $status_admin;

		if ($tambah == 1) 
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('telfon', 'Telfon', 'required');

			//Mengambil filename gambar untuk disimpan
			$nmfile = "file_".time();
			$config['upload_path'] = './asset/upload_img_admin/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4000'; //kb
			$config['file_name'] = $nmfile;

			//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
			/*if (($this->form_validation->run() == TRUE) AND (!empty($_FILES['filefoto']['name'])))
			{*/
				$gbr = NULL;

					$data_admin=array(
						'username'=>$this->input->post('username'),
						'nama_admin'=>$this->input->post('nama_admin'),
						'password'=>md5($this->input->post('username')),
						'email'=>$this->input->post('email'),
						'telfon'=>$this->input->post('telfon'),
						'status_admin'=>$this->input->post('status_admin'),
						'path_foto'=> NULL
					);
					$data['dataAdmin'] = $data_admin;
				$this->load->library('upload', $config);
				if($this->upload->do_upload('filefoto'))
				{
					//echo "Masuk";
					$gbr = $this->upload->data();

					$data_admin['path_foto'] = $gbr['file_name'];

					$this->db->insert('admin', $data_admin);
					$this->session->set_flashdata('msg_berhasil', 'Data admin berhasil ditambahkan');
					redirect('KelolaAdmin');
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data admin gagal ditambahkan, cek type file dan ukuran file yang anda upload');
					
					$this->load->view('skin/admin/header_admin');
					$this->load->view('skin/admin/nav_kiri');
					$this->load->view('content_admin/tambah_admin', $data);
					$this->load->view('skin/admin/footer_admin');
				}
			/*}
			else
			{
				$this->session->set_flashdata('msg_gagal', 'Data admmin gagal ditambahkan');
				$this->tambah_admin_check();
			}*/
		}
		else
		{
			$this->load->view('skin/admin/header_admin');
			$this->load->view('skin/admin/nav_kiri');
			$this->load->view('content_admin/tambah_admin',$data);
			$this->load->view('skin/admin/footer_admin');
		}     
		
	}
	
	//Fungsi melakukan update pada database
	public function edit_admin($id_admin) 
	{
		$this->load->model('admin_models/AdminModels');
		$this->load->library('form_validation');

		$edit = $this->input->post('save');
		$status_admin = array('Admin Wow'=>'Admin Wow',
                              'Admin Update'=>'Admin Update',
                              'Admin News'=>'Admin News',
                              'Admin Pepak'=>'Admin Pepak',
                              'Admin Karepmu'=>'Admin Karepmu',
                              'Admin Shopping'=>'Admin Shopping',
                              'Admin Comming Soon'=>'Admin Comming Soon',
                              'Admin Member Control'=>'Admin Member Control'
                              );
		$data['status_admin']= $status_admin;

		if (isset($_POST['save']))
		{
			$id_admin = $this->input->post('id_admin');
			if($this->input->post('passwordbaru')==NULL){
				$password=$this->input->post('passwordlama');
			} else{
				$password=md5($this->input->post('passwordbaru'));
			}
			$id_member = $this->input->post('id_member');

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('nama_admin', 'Nama_admin', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('telfon', 'Telfon', 'required');

			//Mengambil filename gambar untuk disimpan
			$nmfile = "file_".time();
			$config['upload_path'] = './asset/upload_img_admin/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4000'; //kb
			$config['file_name'] = $nmfile;

			$data_admin=array(
							'username'=>$this->input->post('username'),
							'nama_admin'=>$this->input->post('nama_admin'),
							'email'=>$this->input->post('email'),
							'telfon'=>$this->input->post('telfon'),
							'status_admin'=>$this->input->post('status_admin'),
							'password'=>$password
							);
			$data['dataadmin'] = $data_admin;

			//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
			if (($this->form_validation->run() == TRUE))
			{
				$gbr = NULL;
				$iserror = false;
				if ((!empty($_FILES['filefoto']['name']))) {
					
					$this->load->library('upload', $config);
					if($this->upload->do_upload('filefoto'))
					{
						//echo "Masuk";
						$gbr = $this->upload->data();

						$data_admin['path_foto'] = $gbr['file_name'];

						
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data admin gagal diperbaharui');
						$iserror = true;
					}

				}
				if (!$iserror) {
					$this->db->update('admin', $data_admin, array('id_admin'=>$id_admin));
					$this->session->set_flashdata('msg_berhasil', 'Data admin berhasil diperbaharui');
					redirect('Kelolaadmin');
				}
			}
			else
			{
				$this->session->set_flashdata('msg_gagal', 'Data admin gagal diperbaharui');
				//$this->edit_admin();
			}
		}
		else
		{
			$data['admin'] = $this->AdminModels->select_by_id_admin($id_admin)->row();

			$data_admin=array(
							'username'=>$data['admin']->username,
							'nama_admin'=>$data['admin']->nama_admin,
							'email'=>$data['admin']->email,
							'telfon'=>$data['admin']->telfon,
							'status_admin'=>$data['admin']->status_admin,
							'password'=>$data['admin']->password,
							'path_foto'=> $data['admin']->path_foto
							);
			$data['dataAdmin'] = $data_admin;


		}
		$data['idAdmin'] = $id_admin;
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_admin', $data);
		$this->load->view('skin/admin/footer_admin');
	}

}
