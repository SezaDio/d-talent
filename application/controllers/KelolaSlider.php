<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaSlider extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	//Show big slider page
	public function show_big_slider_page()
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('slider_models/SliderModels');
		$data['listSlider'] = $this->SliderModels->get_slider();
			
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_slider', $data);
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}

	//Show big slider page
	public function show_small_slider_page()
	{	
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->model('slider_models/SliderModels');
			$data['listSlider'] = $this->SliderModels->get_slider_small();
				
			$this->load->view('skin/admin/header_admin');
			$this->load->view('skin/admin/nav_kiri');
			$this->load->view('content_admin/kelola_slider_small', $data);
			$this->load->view('skin/admin/footer_admin');
		} 
		else
		{
			redirect(site_url('Account'));
		}
	}

	//Delete Data
	public function delete_slider($id_slider)
	{
		$this->load->model('slider_models/SliderModels');
		$this->SliderModels->delete_slider($id_slider);

		$this->index();
	}
	
	//Publish
	public function publish_slider()
	{
		$id_slider = $_POST['idSlider'];
		$this->load->model('slider_models/SliderModels');
		$this->SliderModels->publish_slider($id_slider);

		$this->index();
	}
	
	//Unpublish
	public function unpublish_slider()
	{
		$id_slider = $_POST['idSlider'];
		//$this->load->model('slider_models/SliderModels');
		//$this->SliderModels->unpublish_slider($id_slider);
		$data_slider=array(
								'status'=>2
								);
		$this->db->update('slider', $data_slider, array('id_slider'=>$id_slider));

		$this->index();
	}
	
	//Publish
	public function ubah_nama_header()//$id_produk
	{
		$nama_header = $_POST['namaBaru'];
		$data = array(
			'nama_header' => $nama_header
		);

		$this->db->insert('nama_header', $data);


		$this->index();
	}

	//kirim email
	function kirim_email($sub,$msg) {
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'youthsuaramerdeka@gmail.com'; //change this
		$config['smtp_pass'] = 'suaramerdeka'; //change this
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
		$this->load->library('email'); // load email library
		$this->email->initialize($config);
		$this->email->from('youthsuaramerdeka@gmail.com', 'admin');
		$this->email->to('abdulazies.k@gmail.com');
		$this->email->subject($sub);
		$this->email->message($msg);
		if ($this->email->send())
			echo "Mail Sent!";
		else
			show_error($this->email->print_debugger());
    }
	
	//Function to add slider image
	function tambah_slider_check() 
	{
		if ($this->session->userdata('admin_logged_in'))
		{
	        $this->load->model('slider_models/SliderModels');
			$this->load->library('form_validation');
			$tambah = $this->input->post('submit');
			$data['slider'] = $this->SliderModels->get_slider();
			
			if ($tambah == 1) 
			{
				$this->form_validation->set_rules('judul_slider', 'Judul Slider', 'required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

				$deskripsi = $this->input->post('deskripsi');

				//Mengambil filename gambar untuk disimpan
				$nmfile = "file_".time();
				$config['upload_path'] = './asset/img/upload_img_slider/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '4000'; //kb
				$config['file_name'] = $nmfile;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				if (($this->form_validation->run() == TRUE) AND (!empty($_FILES['filefoto']['name'])))
				{
					$gbr = NULL;

					$data_slider = array(
						'judul_slider'=>$this->input->post('judul_slider'),
						'deskripsi'=>$deskripsi,
						'status'=>1,
						'type'=>1,
						'path_gambar'=> NULL
					);
					$data['dataSlider'] = $data_slider;

					$this->load->library('upload', $config);
					if($this->upload->do_upload('filefoto'))
					{
						$gbr = $this->upload->data();
						$data_slider['path_gambar'] = $gbr['file_name'];
						$this->db->insert('slider', $data_slider);
						$this->session->set_flashdata('msg_berhasil', $data_slider['path_gambar']);
						redirect('KelolaSlider');
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data Slider gagal ditambahkan, cek type file dan ukuran file yang anda upload');
						
						$this->load->view('skin/admin/header_admin');
						$this->load->view('skin/admin/nav_kiri');
						$this->load->view('content_admin/tambah_slider', $data);
						$this->load->view('skin/admin/footer_admin');
					}
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Slider gagal ditambahkan');
					$this->tambah_slider_check();
				}
			}
			else
			{
				$this->load->view('skin/admin/header_admin');
				$this->load->view('skin/admin/nav_kiri');
				$this->load->view('content_admin/tambah_slider',$data);
				$this->load->view('skin/admin/footer_admin');
			}     
		} 
		else 
		{
			redirect(site_url('Account'));
		}
	}

	//Function to add slider image
	function tambah_small_slider_check() 
	{
		if ($this->session->userdata('admin_logged_in'))
		{
	        $this->load->model('slider_models/SliderModels');
			$this->load->library('form_validation');
			$tambah = $this->input->post('submit');
			$data['slider'] = $this->SliderModels->get_slider_small();
			
			if ($tambah == 1) 
			{
				$this->form_validation->set_rules('judul_slider', 'Judul Slider', 'required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

				$deskripsi = $this->input->post('deskripsi');

				//Mengambil filename gambar untuk disimpan
				$nmfile = "small_file_".time();
				$config['upload_path'] = './asset/img/upload_img_slider/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '4000'; //kb
				$config['file_name'] = $nmfile;

				//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
				if (($this->form_validation->run() == TRUE) AND (!empty($_FILES['filefoto']['name'])))
				{
					$gbr = NULL;

					$data_slider = array(
						'judul_slider'=>$this->input->post('judul_slider'),
						'deskripsi'=>$deskripsi,
						'status'=>1,
						'type'=>2,
						'path_gambar'=> NULL
					);
					$data['dataSlider'] = $data_slider;

					$this->load->library('upload', $config);
					if($this->upload->do_upload('filefoto'))
					{
						$gbr = $this->upload->data();
						$data_slider['path_gambar'] = $gbr['file_name'];
						$this->db->insert('slider', $data_slider);
						$this->session->set_flashdata('msg_berhasil', $data_slider['path_gambar']);
						redirect('KelolaSlider/show_small_slider_page');
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data Slider gagal ditambahkan, cek type file dan ukuran file yang anda upload');
						
						$this->load->view('skin/admin/header_admin');
						$this->load->view('skin/admin/nav_kiri');
						$this->load->view('content_admin/tambah_slider_small', $data);
						$this->load->view('skin/admin/footer_admin');
					}
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Slider gagal ditambahkan');
					$this->tambah_small_slider_check();
				}
			}
			else
			{
				$this->load->view('skin/admin/header_admin');
				$this->load->view('skin/admin/nav_kiri');
				$this->load->view('content_admin/tambah_slider_small',$data);
				$this->load->view('skin/admin/footer_admin');
			}     
		} 
		else 
		{
			redirect(site_url('Account'));
		}
	}

	//Fungsi melakukan update pada database
	public function edit_header($id_header) 
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('header_models/HeaderModels');
		$this->load->library('form_validation');
		
		$tambah = $this->input->post('submit');
		$data['event'] = $this->HeaderModels->get_event();
		
		$edit = $this->input->post('save');
		$data['idHeader'] = $id_header;
		if (isset($_POST['save']))
		{
			$id_header = $this->input->post('id_header');

			$this->form_validation->set_rules('nama_header', 'Nama Header', 'required');
			$this->form_validation->set_rules('jenis_header', 'Jenis Header', 'required');

			//Mengambil filename gambar untuk disimpan
			$nmfile = "file_".time();
			$config['upload_path'] = './asset/upload_img_header/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4000'; //kb
			$config['file_name'] = $nmfile;
			
			$jenis_header=$this->input->post('jenis_header');
			if($jenis_header==1){
				$id_event=$this->input->post('event');
			} else{
				$id_event=0;
			}
			
			$data_header=array(
							'nama_header'=>$this->input->post('nama_header'),
							'jenis_header'=>$jenis_header,
							'id_event'=>$id_event
							);
			$data['dataHeader'] = $data_header;

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
						$data_header['path_gambar'] = $gbr['file_name'];

						
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data konten header gagal diperbaharui');
						$iserror = true;
					}

				}
				if (!$iserror) {
					$this->db->update('header', $data_header, array('id_header'=>$id_header));
					$this->session->set_flashdata('msg_berhasil', 'Data konten header berhasil diperbaharui');
					redirect('KelolaHeader');
				}
			}
			else
			{
				$this->session->set_flashdata('msg_gagal', 'Data konten header gagal diperbaharui');
				//$this->edit_comming_soon();
			}
		}
		else
		{
			$data['header'] = $this->HeaderModels->select_by_id_header($id_header)->row();

			$data_header=array(
							'nama_header'=>$data['header']->nama_header,
							'jenis_header'=>$data['header']->jenis_header,
							'id_event'=>$data['header']->id_event,
							'path_gambar'=> $data['header']->path_gambar
							);
			$data['dataHeader'] = $data_header;


		}
		$data['idHeader'] = $id_header;
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_header', $data);
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}
	
	function crop($img,$filename){
		$name = $img;
		$myImage = imagecreatefromjpeg($name);
		list($width, $height) = getimagesize($name);
		//Create the zoom_out and cropped image
		$myImageCrop =  imagecreatetruecolor(900, 550);
		 
		// Fill the two images
		$b=imagecopyresampled($myImageCrop,$myImage,0,0,0,291 ,$width,$height,$width,$height);	
		 
		// Save the two images created
		$fileName="thumb_".$filename;
		imagejpeg( $myImageCrop,"./asset/upload_img_header/".$fileName );
	}
	
	function cari_header($header) {
		$header=str_replace('%20',' ',$header);
        header('Access-Control-Allow-Origin: *');
        header('Content-type: text/xml');
        
        //var_dump($search_term); exit();
        $get_header=$this->db->like('nama_header',$this->db->escape_like_str($header))->get('header');
        
		
        
        
        $this->load->helper('xml');
		$xml_out = '<headers>';
        if ($get_header->num_rows()>0) {
            foreach ($get_header->result() as $row_header) {
                $xml_out .= '<header ';
                $xml_out .= 'id_header="' . xml_convert($row_header->id_header) . '" ';
                $xml_out .= 'nama_header="' . xml_convert($row_header->nama_header) . '" ';
                $xml_out .= 'jenis_header="' . xml_convert(($row_header->jenis_header)) . '" ';
                $xml_out .= 'id_event="' . xml_convert(($row_header->id_event)) . '" ';
                $xml_out .= 'status="' . xml_convert(($row_header->status)) . '" ';
                $xml_out .= 'path_gambar="' . xml_convert(($row_header->path_gambar)) . '" ';
                $xml_out .= '/>';
            }
        }
		
		$xml_out .= '</headers>';
		
        echo $xml_out;
		
    }
}
