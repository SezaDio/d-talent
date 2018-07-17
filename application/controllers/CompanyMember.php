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
		$this->load->library('pagination');
		$this->load->model('company_member_models/CompanyUpdatesModel');
		$this->load->model('company_member_models/CompanyOverviewModel');
		$this->load->model('company_member_models/CompanyJobVacancyModel');
	}

	// Menampilkan halaman Company Member awal setelah company login
	public function index()
	{
		if($this->session->userdata('company_logged_in'))
		{
			$id_company = $this->session->userdata('id_company');
			$this->load->model('company_member_models/CompanyOverviewModel');

			$data['dataCompany'] = $this->CompanyOverviewModel->get_data_company_by_id($id_company)->row();

			$this->load->view('skin/front_end/header_company_page_topbar');
			$this->load->view('content_front_end/company_member_page', $data);
			$this->load->view('skin/front_end/footer_company_page');
		}
	}

	//Menampilkan halaman Company Member (Menu Update)
	public function updates_page()
	{
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		// pagination
		$base_url = site_url('company/updates/page');
		$uri_segment = 4;
		$limit_per_page = 10;
        $total_rows = $this->CompanyUpdatesModel->get_total();
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

		$data['company_updates'] = $this->CompanyUpdatesModel->get_all($id_company, $limit_per_page, $start_index);

		$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);


		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_updates_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	// Menyimpan artikel
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

	// Menampilkan halaman detail artikel
	public function detail_updates($id_company_update)
	{
		$data['company_update'] = $this->CompanyUpdatesModel->edit($id_company_update);
		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_updates_page_detail', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	// Menampilkan halaman edit artikel
	public function edit_updates($id_company_update)
	{
		$data['company_update'] = $this->CompanyUpdatesModel->edit($id_company_update);

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_updates_page_edit', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	// Meng-update artikel
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

	// Manghapus artikel
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
		$data['dataLogoCompany'] = $this->CompanyOverviewModel->get_data_logo_by_id($id_company)->row();
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
		//Data Company Type
		$company_type = array(
							  'ct-1'=>'Public Company',
                              'ct-2'=>'Educational Institution',
                              'ct-3'=>'Self-Employed',
                              'ct-4'=>'Government Agency',
                              'ct-5'=>'Nonprofit',
                              'ct-6'=>'Sole Proprietorship',
                              'ct-7'=>'Privately Held',
                              'ct-8'=>'Partnership'
                              );
		
		$data['company_type']= $company_type;
		$data['bidang_usaha']= $bidang_usaha;

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_overview_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	//Fungsi melakukan update data company pada database
	public function update_data_company() 
	{	
		$id_company = $this->input->post('id_company');

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

		//Data Company Type
		$company_type = array(
							  'ct-1'=>'Public Company',
                              'ct-2'=>'Educational Institution',
                              'ct-3'=>'Self-Employed',
                              'ct-4'=>'Government Agency',
                              'ct-5'=>'Nonprofit',
                              'ct-6'=>'Sole Proprietorship',
                              'ct-7'=>'Privately Held',
                              'ct-8'=>'Partnership'
                              );

		$data['bidang_usaha']= $bidang_usaha;
		$data['company_type']= $company_type;


		//if($this->session->userdata('admin_logged_in'))
		//{
			$this->load->model('company_member_models/CompanyOverviewModel');
			$this->load->library('form_validation');

			$edit = $this->input->post('save');

			if (isset($_POST['save']))
			{
				$id_company = $this->input->post('id_company');

				$this->form_validation->set_rules('company_name', 'Nama Company', 'required');
				$this->form_validation->set_rules('company_description', 'Deskripsi Company', 'required');
				$this->form_validation->set_rules('company_address', 'Address Company', 'required');
				$this->form_validation->set_rules('company_industries', 'Industries Company', 'required');
				$this->form_validation->set_rules('company_website', 'Website Company', 'required');
				$this->form_validation->set_rules('company_type', 'Type Company', 'required');
				$this->form_validation->set_rules('company_email', 'Email Company', 'required');
				$this->form_validation->set_rules('company_year', 'Year Company', 'required');
				$this->form_validation->set_rules('company_specialties[]', 'Company Specialties', 'required');

				// convert array to string
				$data_company_specialties = $this->input->post('company_specialties[]');
				$company_specialties = implode(",", $data_company_specialties);

				$data_company=array(
								'company_name'=>$this->input->post('company_name'),
								'company_description'=>$this->input->post('company_description'),
								'company_address'=>$this->input->post('company_address'),
								'company_industries'=>$this->input->post('company_industries'),
								'company_website'=>$this->input->post('company_website'),
								'company_type'=>$this->input->post('company_type'),
								'company_email'=>$this->input->post('company_email'),
								'company_year'=>$this->input->post('company_year'),
								'company_specialties'=>$company_specialties,
								'company_address'=>$this->input->post('company_address')
								);
				$data['dataCompany'] = $data_company;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				if (($this->form_validation->run() == TRUE))
				{
					$this->db->update('company', $data_company, array('id_company'=>$id_company));
					$this->session->set_flashdata('msg_berhasil', 'Data Company Member berhasil diperbaharui');
					redirect('CompanyMember/overview_page');
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

	// menyimpan update data company cover picture
	public function update_company_logo()
	{
			
			$this->load->model('company_member_models/CompanyUpdatesModel');
			$this->load->library('form_validation');

			$edit = $this->input->post('save');

			if (isset($_POST['save']))
			{
				//$id_company = $this->input->post('id_company');
				$id_company = 1;

				//Mengambil filename gambar untuk disimpan
				$nmfile = "company_logo_".time();
				$config['upload_path'] = './asset/img/upload_img_company/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = "2048000"; //kb
				$config['file_name'] = $nmfile;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				$gbr = NULL;
				$iserror = false;
				if ((!empty($_FILES['company_logo']['name']))) 
				{

					$this->load->library('upload', $config);
					if($this->upload->do_upload('company_logo'))
					{
						$gbr = $this->upload->data();
						$data_logo_company['company_logo'] = $gbr['file_name'];
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data Testimoni gagal diedit');
						$iserror = true;
					}

				}
				if (!$iserror) 
				{
					$this->db->update('company', $data_logo_company, array('id_company'=>$id_company));
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
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		// get job category list
		$data['job_category'] = $this->get_job_category_list();
		
		// pagination
		$base_url = site_url('company/job-vacancy/page');
		$uri_segment = 4;
		$limit_per_page = 10;
        $total_rows = $this->CompanyJobVacancyModel->get_total();
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

		$data['company_jobs'] = $this->CompanyJobVacancyModel->get_all($id_company, $limit_per_page, $start_index);

		$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_jobs_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}
	//Menampilkan halaman Company Member (Menu Jobs) berdasarkan category
	public function filter_job($category)
	{
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		// get job category list
		$data['job_category'] = $this->get_job_category_list();

		// pagination
		$base_url = site_url('company/job-vacancy/category/') . $category . '/page';
		$uri_segment = 6;
		$limit_per_page = 10;
        $total_rows  = $this->CompanyJobVacancyModel->get_total_filter($id_company, $category);
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

		$data['company_jobs'] = $this->CompanyJobVacancyModel->filter($id_company, $category, $limit_per_page, $start_index);

		$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);
		// ./pagination

		$data['filter_category'] = $data['job_category'][$category];

		if (empty($data['company_jobs'])) {
			$data['filter_result'] = 'Lowongan dengan kategori "'.$data['filter_category'].'" tidak ditemukan.';
		}
		else{
			$data['filter_result'] = 'Kategori: "'. $data['filter_category'] .'"';
		}

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_jobs_page', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}
	//Menampilkan halaman Company Member (Menu Jobs) berdasarkan search
	public function search_job()
	{
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		// get job category list
		$data['job_category'] = $this->get_job_category_list();

		$keyword = $this->input->post('keyword');
		if ($keyword != "") {
			$this->session->set_userdata('keyword', $keyword);
		}
		else {
			$keyword = $this->session->userdata('keyword');
		}

		// $data['company_jobs'] = $this->CompanyJobVacancyModel->search($id_company, $keyword);

		// pagination
		$base_url = site_url('company/job-vacancy/search/page');
		$uri_segment = 5;
		$limit_per_page = 10;
        $total_rows  = $this->CompanyJobVacancyModel->get_total_search($id_company, $keyword);
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

		$data['company_jobs'] = $this->CompanyJobVacancyModel->search($id_company, $keyword, $limit_per_page, $start_index);

		$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);
		// ./pagination


		if (empty($data['company_jobs'])) {
			$data['filter_result'] = 'Hasil pencarian "'. $keyword .'" tidak ditemukan.';
		}
		else{
			$data['filter_result'] = 'Hasil pencarian "'. $keyword .'"';
		}

		$data['keyword'] = $keyword;

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

		// get job category list
		$data['job_category'] = $this->get_job_category_list();
		// get job type list
		$data['job_type'] 	  = $this->get_job_type_list();

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_add_jobs_page', $data);
		$this->load->view('skin/front_end/footer_company_page');

	}

	// Menyimpan lowongan kerja
	public function store_job()
	{
		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		$this->form_validation->set_rules('job_title', '"Job Title"', 'required');
		$this->form_validation->set_rules('job_type', '"Job Type"', 'required');
		$this->form_validation->set_rules('job_role', '"Job Role"', 'required');
		$this->form_validation->set_rules('job_category', '"Job Category"', 'required');
		$this->form_validation->set_rules('job_province_location_id', '"Job Province"', 'required');
		$this->form_validation->set_rules('job_city_location_id', '"Job City"', 'required');
		$this->form_validation->set_rules('job_date_start', '"Job Date Start"', 'required');
		$this->form_validation->set_rules('job_date_end', '"Job Date End"', 'required');
		$this->form_validation->set_rules('job_description', '"Job Description"', 'required');
		$this->form_validation->set_rules('job_required_skill[]', '"Required Skills"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function if form not valid
			$this->add_jobs_page();
		}
		else {
			// get job_required_skill[]
			$skills = $this->input->post('job_required_skill[]');
			// convert array to string
			$job_required_skill = implode(",", $skills);

			// save data to db
			$this->CompanyJobVacancyModel->create($id_company, $job_required_skill);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Tambah lowongan kerja berhasil');

			// redirect to page ...
			redirect('company/job-vacancy');
		}
	}

	// Menampilkan halaman detail lowongan kerja
	public function detail_job($id_job)
	{
		$this->load->model('account/UserModel');

		// $id_company = $this->session->userdata('id_company');
		$id_company = 1;

		// $id_company = $this->session->userdata('company_name');
		$data['company_name'] = "PT . ABC";

		$data['company_job'] = $this->CompanyJobVacancyModel->detail($id_job);

		// get job category
		$job_categories 	  = $this->get_job_category_list();
		$data['job_category'] = $job_categories[$data['company_job']->job_category];
		// get job type list
		$job_types 	  	  = $this->get_job_type_list();
		$data['job_type'] = $job_types[$data['company_job']->job_type];

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_jobs_page_detail', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	// Menampilkan halaman edit lowongan kerja
	public function edit_job($id_job)
	{
		$this->load->model('account/UserModel');
		$array_province = $this->UserModel->lokasi_provinsi();
		$data['lokasiProvinsi'] = $array_province;
		
		// get job category list
		$data['job_category'] = $this->get_job_category_list();
		// get job type list
		$data['job_type'] 	  = $this->get_job_type_list();

		$data['company_job'] = $this->CompanyJobVacancyModel->edit($id_job);

		// convert string to array
		$data['company_job_skills'] = explode(',', $data['company_job']->job_required_skill);

		// get id province
		$id_province = $this->get_id_province($array_province, $data['company_job']->job_province_location_id);
		// get company job cities
		$data['company_job_cities'] = $this->UserModel->lokasi_kabupaten_kota($id_province);

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_jobs_page_edit', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}
	// get id province from location (province) array by lokasi_ID
	private function get_id_province($provinces, $lokasi_ID)
	{
	   foreach ($provinces as $key => $val) {
	       if ($val['lokasi_ID'] === $lokasi_ID) {
	           return $val['lokasi_propinsi'];
	       }
	   }
	   return null;
	}


	// Meng-update lowongan kerja
	public function update_job($id_job)
	{
		$this->form_validation->set_rules('job_title', '"Job Title"', 'required');
		$this->form_validation->set_rules('job_type', '"Job Type"', 'required');
		$this->form_validation->set_rules('job_role', '"Job Role"', 'required');
		$this->form_validation->set_rules('job_category', '"Job Category"', 'required');
		$this->form_validation->set_rules('job_province_location_id', '"Job Province"', 'required');
		$this->form_validation->set_rules('job_city_location_id', '"Job City"', 'required');
		$this->form_validation->set_rules('job_date_start', '"Job Date Start"', 'required');
		$this->form_validation->set_rules('job_date_end', '"Job Date End"', 'required');
		$this->form_validation->set_rules('job_description', '"Job Description"', 'required');
		$this->form_validation->set_rules('job_required_skill[]', '"Required Skills"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function if form not valid
			$this->edit_job($id_job);
		}
		else {
			// get job_required_skill[]
			$skills = $this->input->post('job_required_skill[]');
			// convert array to string
			$job_required_skill = implode(",", $skills);

			// save data to db
			$this->CompanyJobVacancyModel->update($id_job, $job_required_skill);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Edit lowongan kerja berhasil');

			// redirect to page ...
			redirect('company/job-vacancy');
		}
	}

	// Manghapus lowongan kerja
	public function delete_job($id_job)
	{
		$query = $this->CompanyJobVacancyModel->delete($id_job);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus lowongan kerja berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus lowongan kerja gagal');
		}
		// redirect to page ...
		redirect('company/job-vacancy');
	}

	// company job category list
	private function get_job_category_list()
	{
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
		return $job_category;
	}

	// company job type list
	private function get_job_type_list()
	{
		$job_type = array(
					  'jt-1'=>'Part Time',
	                  'jt-2'=>'Full Time',
	                  'jt-3'=>'Internship'
	                  );
		return $job_type;
	}

	private function custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows)
	{
        // pagination config
        $config['base_url'] = $base_url;
		$config["uri_segment"] = $uri_segment;
		$config['per_page'] = $limit_per_page;
		$config['total_rows'] = $total_rows;
		
		// custom paging configuration
        $config['num_links'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
         
        $config['full_tag_open'] = '<nav class="fit-content">';
        $config['full_tag_close'] = '</nav>';
         
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<li class="firstlink">';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<li class="lastlink">';
        $config['last_tag_close'] = '</li>';
         
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<li class="prevlink">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<li class="nextlink">';
        $config['next_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="curlink">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="numlink">';
        $config['num_tag_close'] = '</li>';
         
		$this->pagination->initialize($config);

		// build paging links
        return $this->pagination->create_links();
	}
}