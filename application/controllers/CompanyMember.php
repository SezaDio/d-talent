<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyMember extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		// $this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('company_member_models/CompanyUpdatesModel');
		$this->load->model('company_member_models/CompanyOverviewModel');
	}

	// Menampilkan halaman Company Member awal setelah company login
	public function index()
	{
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('content_front_end/company_member_page');
		$this->load->view('skin/front_end/footer_company_page');
	}

	//Menampilkan halaman Company Member (Menu Update)
	public function updates_page()
	{
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		$data['company_updates'] = $this->CompanyUpdatesModel->get_all($id_company);

		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		// var_dump($data['company_updates']);
		// die();

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_updates_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	// Tambah artikel
	public function store_updates()
	{
		$this->load->library('upload');
	
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		$this->form_validation->set_rules('title', '"Judul"', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('skin/front_end/header_company_page_topbar');
			$this->load->view('skin/front_end/navbar_company_page');
			$this->load->view('content_front_end/company_updates_page');
			$this->load->view('skin/front_end/footer_company_page');
		}
		else {
			// upload images to path for image
			if( !empty($_FILES['image']['name']) ) {
				// get filename image
				$image_filename_new = $_FILES['image']['name'];
				$upload_path = "asset/img/upload_img_company_updates/";
				$config_image = array(
					'upload_path' => "./" . $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
					'file_name' => $image_filename_new
				);

				$this->upload->initialize($config_image);
				// if uploaded use new file name
				if($this->upload->do_upload('image')) {
					$upload_data = $this->upload->data();
					$image_filename = $upload_data['file_name'];
				}
			}
			// save data to db
			$this->CompanyUpdatesModel->create($id_company, $image_filename);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Tambah artikel berhasil');

			// redirect to page ...
			redirect('company/updates');
		}
	}

	public function edit_updates($id_company_update)
	{
		$data['company_update'] = $this->CompanyUpdatesModel->edit($id_company_update);

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_updates_page_edit', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	public function update_updates($id_company_update)
	{
		$this->load->library('upload');
	
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		// default name: use old file name
		$image_filename = $this->input->post('old_image');

		$this->form_validation->set_rules('title', '"Judul"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get edit data
			$data['company_update'] = $this->CompanyUpdatesModel->edit($id_company_update);

			$this->load->view('skin/front_end/header_company_page_topbar');
			$this->load->view('skin/front_end/navbar_company_page');
			$this->load->view('content_front_end/company_updates_page_edit', $data);
			$this->load->view('skin/front_end/footer_company_page');
		}
		else {
			// upload images to path for image
			if( !empty($_FILES['image']['name']) ) {
				// get filename image
				$image_filename_new = $_FILES['image']['name'];
				$upload_path = "asset/img/upload_img_company_updates/";
				$config_image = array(
					'upload_path' => "./" . $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
					'file_name' => $image_filename_new
				);

				$this->upload->initialize($config_image);
				// if uploaded, delete old file & use new file name
				if($this->upload->do_upload('image')) {
					if (file_exists($upload_path . $image_filename)) {
						unlink($upload_path . $image_filename);
					}
					$upload_data = $this->upload->data();
					$image_filename = $upload_data['file_name'];
				}
			}
			// save data to db
			$this->CompanyUpdatesModel->update($id_company_update, $image_filename);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Edit artikel berhasil');

			// redirect to page ...
			redirect('company/updates');
		}
	}

	public function delete_updates($id_company_update)
	{
		$company_update = $this->CompanyUpdatesModel->edit($id_company_update);
		$query = $this->CompanyUpdatesModel->delete($id_company_update);

		if ($query) {
			// delete image
			$upload_path = "asset/img/upload_img_company_updates/";
			if (file_exists($upload_path . $company_update->image)) {
				unlink($upload_path . $company_update->image);
			}
			
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus artikel berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus artikel gagal');
		}
		// redirect to page ...
		redirect('company/updates');
	}


	//Menampilkan halaman Company Member (Menu Update)
	public function overview_page()
	{
		$this->load->model('company_member_models/CompanyOverviewModel');
		$id_company = 1;

		//get data company
		$data['dataCoverCompany'] = $this->CompanyOverviewModel->get_data_cover_by_id($id_company)->row();
		$data['dataCompany'] = $this->CompanyOverviewModel->get_data_company_by_id($id_company)->row();

		//Data Bidang Usaha Perusahaan
		$bidang_usaha = array(
							  'bu-1'=>'Pertanian, Kehutanan, dan Perikanan',
                              'bu-2'=>'Pertambangan dan Penggalian',
                              'bu-3'=>'Industri Pengolahan',
                              'bu-4'=>'Pengadaan Listrik Gas, Uap/Air Panas dan Udara Dingin',
                              'bu-5'=>'Konstruksi',
                              'bu-6'=>'Perdagangan Besar Eceran, Reparasi dan Perawatan Mobil',
                              'bu-7'=>'Transportasi Pergudangan',
                              'bu-8'=>'Penyedia Akomodasi dan Penyedia Makan Minum',
                              'bu-9'=>'Informasi dan Komunikasi',
                              'bu-10'=>'Jasa Keuangan dan Asuransi',
                              'bu-11'=>'Real Estate',
                              'bu-12'=>'Jasa Profesional, Ilmiah, dan Teknis',
                              'bu-13'=>'Jasa Persewaan dan Sewa Guna Usaha Tanpa Hak Opsi',
                              'bu-14'=>'Administrasi Pemerintahan, Pertanahan, dan Jaminan Sosial',
                              'bu-15'=>'Jasa Pendidikan',
                              'bu-16'=>'Jasa Kesehatan dan Kegiatan Sosial',
                              'bu-17'=>'Kesenian, Hiburan, dan Rekreasi',
                              'bu-18'=>'Kegiatan Jasa Lainnya'
                              );
		$data['bidang_usaha']= $bidang_usaha;

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_overview_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	//Fungsi melakukan update data company pada database
	public function update_data_company($id_company) 
	{	
		//Data Bidang Usaha Perusahaan
		$bidang_usaha = array(
							  'bu-1'=>'Pertanian, Kehutanan, dan Perikanan',
                              'bu-2'=>'Pertambangan dan Penggalian',
                              'bu-3'=>'Industri Pengolahan',
                              'bu-4'=>'Pengadaan Listrik Gas, Uap/Air Panas dan Udara Dingin',
                              'bu-5'=>'Konstruksi',
                              'bu-6'=>'Perdagangan Besar Eceran, Reparasi dan Perawatan Mobil',
                              'bu-7'=>'Transportasi Pergudangan',
                              'bu-8'=>'Penyedia Akomodasi dan Penyedia Makan Minum',
                              'bu-9'=>'Informasi dan Komunikasi',
                              'bu-10'=>'Jasa Keuangan dan Asuransi',
                              'bu-11'=>'Real Estate',
                              'bu-12'=>'Jasa Profesional, Ilmiah, dan Teknis',
                              'bu-13'=>'Jasa Persewaan dan Sewa Guna Usaha Tanpa Hak Opsi',
                              'bu-14'=>'Administrasi Pemerintahan, Pertanahan, dan Jaminan Sosial',
                              'bu-15'=>'Jasa Pendidikan',
                              'bu-16'=>'Jasa Kesehatan dan Kegiatan Sosial',
                              'bu-17'=>'Kesenian, Hiburan, dan Rekreasi',
                              'bu-18'=>'Kegiatan Jasa Lainnya'
                              );
		$data['bidang_usaha']= $bidang_usaha;


		//if($this->session->userdata('admin_logged_in'))
		//{
			$this->load->model('company_member_models/CompanyOverviewModel');
			$this->load->library('form_validation');

			$edit = $this->input->post('save');

			if (isset($_POST['save']))
			{
				$id_company = $this->input->post('id_company');

				$this->form_validation->set_rules('company_name', 'Nama Company', 'required');
				$this->form_validation->set_rules('company_logo', 'Logo Company', 'required');
				$this->form_validation->set_rules('company_description', 'Deskripsi Company', 'required');
				$this->form_validation->set_rules('company_address', 'Address Company', 'required');
				$this->form_validation->set_rules('company_industries', 'Industries Company', 'required');
				$this->form_validation->set_rules('company_website', 'Website Company', 'required');
				$this->form_validation->set_rules('company_type', 'Type Company', 'required');
				$this->form_validation->set_rules('company_email', 'Email Company', 'required');
				$this->form_validation->set_rules('company_year', 'Year Company', 'required');

				//Mengambil filename gambar untuk disimpan
				$nmfile = "logo_company_".time();
				$config['upload_path'] = './asset/img/upload_img_company/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048000'; //kb
				$config['file_name'] = $nmfile;

				$data_company=array(
								'company_name'=>$this->input->post('company_name'),
								'company_description'=>$this->input->post('company_description'),
								'company_address'=>$this->input->post('company_address'),
								'company_industries'=>$this->input->post('company_industries'),
								'company_website'=>$this->input->post('company_website'),
								'company_type'=>$this->input->post('company_type'),
								'company_email'=>$this->input->post('company_email'),
								'company_year'=>$this->input->post('company_year'),
								'company_address'=>$this->input->post('company_address')
								
								);
				$data['dataCompany'] = $data_company;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				if (($this->form_validation->run() == TRUE))
				{
					$gbr = NULL;
					$iserror = false;
					if ((!empty($_FILES['company_logo']['name']))) 
					{
						$this->load->library('upload', $config);
						if($this->upload->do_upload('company_logo'))
						{
							$gbr = $this->upload->data();
							$this->crop($gbr['full_path'],$gbr['file_name']);
							$data_company['path_gambar'] = $gbr['file_name'];
						}
						else
						{
							$this->session->set_flashdata('msg_gagal', 'Data Company Member gagal diperbaharui');
							$iserror = true;
						}
					}
					if (!$iserror) 
					{
						$this->db->update('company', $data_company, array('id_company'=>$id_company));
						$this->session->set_flashdata('msg_berhasil', 'Data Company Member berhasil diperbaharui');
						redirect('CompanyMember/overview_page');
					}
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Company Member gagal diperbaharui');
					$this->update_data_company($id_company);
				}
			}
			else
			{
				$id_company = 1;
				$this->load->model('company_member_models/CompanyOverviewModel');
				$data['company'] = $this->CompanyOverviewModel->get_data_company_by_id($id_company)->row();

				$data_company=array(
								'id_company'=>$data['company']->id_company,
								'company_name'=>$data['company']->company_name,
								'company_email'=>$data['company']->company_email,
								'company_telepon'=>$data['company']->company_telepon,
								'company_website'=>$data['company']->company_website,
								'company_address'=>$data['company']->company_address,
								'company_industries'=>$data['company']->company_industries,
								'company_type'=>$data['company']->company_type,
								'company_specialties'=>$data['company']->company_specialties,
								'company_year'=>$data['company']->company_year,
								'company_description'=>$data['company']->company_description,
								'company_cover'=>$data['company']->company_cover,
								'company_logo'=>$data['company']->company_logo,
								'company_date_join'=>$data['company']->company_date_join
								);
				$data['dataCompany'] = $data_company;
			}

			$data['idCompany'] = $id_company;
			$this->load->view('skin/front_end/header_company_page_topbar');
			$this->load->view('skin/front_end/navbar_company_page');
			$this->load->view('content_front_end/company_overview_page', $data);
			$this->load->view('skin/front_end/footer_company_page');
		//} 
		//else
		//{
			//redirect(site_url('Account'));
		//}
	}

	// menyimpan update data company cover picture
	public function update_company_cover()
	{
			
			$this->load->model('company_member_models/CompanyUpdatesModel');
			$this->load->library('form_validation');

			$edit = $this->input->post('save');

			if (isset($_POST['save']))
			{
				//$id_company = $this->input->post('id_company');
				$id_company = 1;

				//Mengambil filename gambar untuk disimpan
				$nmfile = "company_cover_".time();
				$config['upload_path'] = './asset/img/upload_img_company/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = "2048000"; //kb
				$config['file_name'] = $nmfile;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				$gbr = NULL;
				$iserror = false;
				if ((!empty($_FILES['filefoto']['name']))) 
				{

					$this->load->library('upload', $config);
					if($this->upload->do_upload('filefoto'))
					{
						$gbr = $this->upload->data();
						$data_cover_company['company_cover'] = $gbr['file_name'];
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data Testimoni gagal diedit');
						$iserror = true;
					}

				}
				if (!$iserror) 
				{
					$this->db->update('company', $data_cover_company, array('id_company'=>$id_company));
					$this->session->set_flashdata('msg_berhasil', 'Cover Picture berhasil diperbaharui');
					redirect('CompanyMember/overview_page');
				}
			}
			else
			{
				$id_company = 1;
				$this->load->model('company_member_models/CompanyOverviewModel');
				$data['company'] = $this->CompanyOverviewModel->get_data_company_by_id($id_company)->row();

				$data_company=array(
								'company_name'=>$data['company']->company_name,
								'company_email'=>$data['company']->company_email,
								'company_telepon'=>$data['company']->company_telepon,
								'company_website'=>$data['company']->company_website,
								'company_address'=>$data['company']->company_address,
								'company_industries'=>$data['company']->company_industries,
								'company_type'=>$data['company']->company_type,
								'company_specialties'=>$data['company']->company_specialties,
								'company_year'=>$data['company']->company_year,
								'company_description'=>$data['company']->company_description,
								'company_cover'=>$data['company']->company_cover,
								'company_logo'=>$data['company']->company_logo,
								'company_date_join'=>$data['company']->company_date_join
								);
				$data['dataCompany'] = $data_company;
			}

			$data['idCompany'] = $id_company;
			$this->load->view('skin/front_end/header_company_page_topbar');
			$this->load->view('skin/front_end/navbar_company_page');
			$this->load->view('content_front_end/company_overview_page', $data);
			$this->load->view('skin/front_end/footer_company_page');
		
	}

	//Menampilkan halaman Company Member (Menu Jobs)
	public function jobs_page()
	{
		//Data Job Categoru Perusahaan
		$job_category = array(
							  'jc-1'=>'Software Engineering',
                              'jc-2'=>'Data Science',
                              'jc-3'=>'Design',
                              'jc-4'=>'Operations',
                              'jc-5'=>'Marketing',
                              'jc-6'=>'Product Management',
                              'jc-7'=>'Bussiness Development',
                              'jc-8'=>'Engineering',
                              'jc-9'=>'Management',
                              'jc-10'=>'Finance',
                              'jc-11'=>'Human Resource',
                              'jc-12'=>'Media & Communication',
                              'jc-13'=>'Consulting',
                              'jc-14'=>'Other'
                              );
		$data['job_category']= $job_category;

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_jobs_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	//Menampilkan halaman Company Member (Add Jobs)
	public function add_jobs_page()
	{
		$this->load->model('account/UserModel');
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();
		
		//Data Job Categoru Perusahaan
		$job_category = array(
							  'jc-1'=>'Software Engineering',
                              'jc-2'=>'Data Science',
                              'jc-3'=>'Design',
                              'jc-4'=>'Operations',
                              'jc-5'=>'Marketing',
                              'jc-6'=>'Product Management',
                              'jc-7'=>'Bussiness Development',
                              'jc-8'=>'Engineering',
                              'jc-9'=>'Management',
                              'jc-10'=>'Finance',
                              'jc-11'=>'Human Resource',
                              'jc-12'=>'Media & Communication',
                              'jc-13'=>'Consulting',
                              'jc-14'=>'Other'
                              );

		$job_type = array(
							  'jt-1'=>'Part Time',
                              'jt-2'=>'Full Time',
                              'jt-3'=>'Internship'
                              );

		$data['job_category']= $job_category;
		$data['job_type']= $job_type;

		//if($this->session->userdata('admin_logged_in'))
		//{
	        //$this->load->model('jobVacancy_models/JobVacancyModels');
			$this->load->library('form_validation');

			$tambah = $this->input->post('submit');

			if ($tambah == 1) 
			{
				$this->form_validation->set_rules('nama_testimoni', 'Nama', 'required');
				$this->form_validation->set_rules('job', 'Job', 'required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

				//Mengambil filename gambar untuk disimpan
				$nmfile = "file_".time();
				$config['upload_path'] = './asset/img/upload_img_testimoni/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '4000'; //kb
				$config['file_name'] = $nmfile;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				if (($this->form_validation->run() == TRUE) AND (!empty($_FILES['filefoto']['name'])))
				{
					$gbr = NULL;

						$data_testimoni=array(
							'nama_testimoni'=>$this->input->post('nama_testimoni'),
							'job'=>$this->input->post('job'),
							'deskripsi'=>$this->input->post('deskripsi'),
							//'tanggal_posting'=>date("Y-m-d h:i:sa"),
							'path_gambar'=> NULL
						);
						$data['dataTestimoni'] = $data_testimoni;
					$this->load->library('upload', $config);
					if($this->upload->do_upload('filefoto'))
					{
						//echo "Masuk";
						$gbr = $this->upload->data();
						//$this->crop($gbr['full_path'],$gbr['file_name']);
						$data_testimoni['path_gambar'] = $gbr['file_name'];

						$this->db->insert('testimoni', $data_testimoni);
						$this->session->set_flashdata('msg_berhasil', 'Data Testimoni berhasil ditambahkan');
						redirect('KelolaTestimoni');
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data Testimoni gagal ditambahkan, cek type file dan ukuran file yang anda upload');
						
						$this->load->view('skin/admin/header_admin');
						$this->load->view('skin/admin/nav_kiri');
						$this->load->view('content_admin/tambah_testimoni', $data);
						$this->load->view('skin/admin/footer_admin');
					}
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Testimoni gagal ditambahkan');
					$this->tambah_testimoni_check();
				}
			}
			else
			{
				$this->load->view('skin/front_end/header_company_page_topbar');
				$this->load->view('skin/front_end/navbar_company_page');
				$this->load->view('content_front_end/company_add_jobs_page', $data);
				$this->load->view('skin/front_end/footer_company_page');
			}     
		//} 
		//else 
		//{
			//redirect(site_url('Account'));
		//}
	}
}