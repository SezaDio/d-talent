<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaHeader extends CI_Controller {

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
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('header_models/HeaderModels');
		$data['listHeaderEvent'] = $this->HeaderModels->get_header_event();
		$data['listHeaderNonEvent'] = $this->HeaderModels->get_header_nonevent();
			
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_header', $data);
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}

	//Delete Data
	public function delete_header($id_header)//$id_produk
	{
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->delete_header($id_header);


		$this->index();
	}
	
	//Publish
	public function publish_header()//$id_produk
	{
		$id_header = $_POST['idHeader'];
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->publish_header($id_header);


		$this->index();
	}
	
	//Unpublish
	public function unpublish_header()//$id_produk
	{
		$id_header = $_POST['idHeader'];
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->unpublish_header($id_header);


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

	//Delete Data detail produk
	public function delete_detail_header($id_header)//
	{
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->delete_header($id_header);


		$this->index();
	}
	
	//Lihat detail produk
	public function lihat_detail_header($id_header)
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('header_models/HeaderModels');

		//Ambil id_agenda yang akan diedit
		$data['id_header'] = $this->HeaderModels->select_by_id_header($id_header)->row();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/detail_header', $data);
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}

	//Validasi header
	public function validasi_header()
	{
		$this->load->model('header_models/HeaderModels');
		$data['listHeader'] = $this->HeaderModels->get_data_header_pend();
			
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/validasi_header', $data);
		$this->load->view('skin/admin/footer_admin');
	}
	
	//Setujui header
	public function setuju_header()
	{
		$id_header = $_POST['id_header'];
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->setuju_header($id_header);
		$sub_setuju = "Youth header";
		$msg_setuju = "Posting yang anda masukan di Youth header telah disetujui";
		$this->kirim_email($sub_setuju,$msg_setuju);
		$this->validasi_header();
	}
	
	//Setujui header
	public function setuju_detail_header($id_header)
	{
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->setuju_header($id_header);
		$sub_setuju = "Youth header";
		$msg_setuju = "Posting yang anda masukan di Youth header Soon telah disetujui";
		$this->kirim_email($sub_setuju,$msg_setuju);
		$this->validasi_header();
	}
	
	//Tolak Data
	public function tolak_header()
	{
		$id_header = $_POST['id_header'];
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->delete_header($id_header);
		$sub_tolak = "Youth header";
		$msg_tolak = "Posting yang anda masukan di Youth header Soon telah ditolak";
		$this->kirim_email($sub_tolak,$msg_tolak);
		$this->validasi_header();
	}
	
	//Tolak Data
	public function tolak_detail_header($id_header)
	{
		$this->load->model('header_models/HeaderModels');
		$this->HeaderModels->delete_header($id_header);
		$sub_tolak = "Youth header";
		$msg_tolak = "Posting yang anda masukan di Youth header Soon telah ditolak";
		$this->kirim_email($sub_tolak,$msg_tolak);
		$this->validasi_header();
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
	
	//tambah header soon
	public function tambah_header()
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('header_models/HeaderModels');
		
		$q_pt=$this->db->get('coming');        
        $data['event']=$q_pt->result();
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_header');
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}
	
	function tambah_header_check() {
		if($this->session->userdata('admin_logged_in')){
        $this->load->model('header_models/HeaderModels');
		$this->load->library('form_validation');
		$tambah = $this->input->post('submit');
		$data['event'] = $this->HeaderModels->get_event();
		
		if ($tambah == 1) 
		{
			$this->form_validation->set_rules('nama_header', 'Nama Header', 'required');
			$this->form_validation->set_rules('jenis_header', 'Nama Header', 'required');
			
			$jenis_header = $this->input->post('jenis_header');
			
			if($jenis_header == 1){
				$id_event = $this->input->post('event');
			} else {
				$id_event = 0;
			}
			
			//Mengambil filename gambar untuk disimpan
			$nmfile = "file_".time();
			$config['upload_path'] = './asset/upload_img_header/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4000'; //kb
			$config['file_name'] = $nmfile;

			//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
			if (($this->form_validation->run() == TRUE) AND (!empty($_FILES['filefoto']['name'])))
			{
				$gbr = NULL;

					$data_header=array(
						'nama_header'=>$this->input->post('nama_header'),
						'jenis_header'=>$jenis_header,
						'id_event'=>$id_event,
						'status'=>1,
						'path_gambar'=> NULL
					);
					$data['dataHeader'] = $data_header;
				$this->load->library('upload', $config);
				if($this->upload->do_upload('filefoto'))
				{
					//echo "Masuk";
					$gbr = $this->upload->data();
					$data_header['path_gambar'] = $gbr['file_name'];
					$this->db->insert('header', $data_header);
					$this->session->set_flashdata('msg_berhasil', $data_header['path_gambar']);
					redirect('KelolaHeader');
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Youth header Soon gagal ditambahkan, cek type file dan ukuran file yang anda upload');
					
					$this->load->view('skin/admin/header_admin');
					$this->load->view('skin/admin/nav_kiri');
					$this->load->view('content_admin/tambah_header', $data);
					$this->load->view('skin/admin/footer_admin');
				}
			}
			else
			{
				$this->session->set_flashdata('msg_gagal', 'Data Youth header Soon gagal ditambahkan');
				$this->tambah_header_check();
			}
		}
		else
		{
			$this->load->view('skin/admin/header_admin');
			$this->load->view('skin/admin/nav_kiri');
			$this->load->view('content_admin/tambah_header',$data);
			$this->load->view('skin/admin/footer_admin');
		}     
		} else {
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
