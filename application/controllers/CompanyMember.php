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
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/company_updates_page');
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
				// if uploaded, delete old file & use new file name
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
		# code...
	}

	public function update_updates($id_company_update)
	{
		# code...
	}

	public function delete_updates($id_company_update)
	{
		# code...
	}


	//Menampilkan halaman Company Member (Menu Update)
	public function overview_page()
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