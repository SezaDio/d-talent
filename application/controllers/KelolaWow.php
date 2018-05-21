<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaWow extends CI_Controller {

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
		$this->load->model('wow_models/WowModels');
		$data['listWow'] = $this->WowModels->get_data_wow();
			
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_wow', $data);
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}
	
	public function tambah_wow()
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('wow_models/WowModels');

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_wow');
		$this->load->view('skin/admin/footer_admin');
		} else {
			redirect(site_url('Account'));
		}
	}
	
	function tambah_wow_check() {
		if($this->session->userdata('admin_logged_in')){
        $this->load->model('wow_models/WowModels');
		$this->load->library('form_validation');

		$tambah = $this->input->post('submit');
		$kategori_wow = array('Seni'=>'Seni',
                              'Travel dan Outdoor'=>'Travel dan Outdoor',
                              'Bisnis'=>'Bisnis',
                              'Science dan Teknologi'=>'Science dan Teknologi',
                              'Spirituality'=>'Spirituality',
                              'Musik'=>'Musik',
                              'Keluarga dan Pendidikan'=>'Keluarga dan Pendidikan',
                              'Hobi'=>'Hobi',
                              'Lain-Lain'=>'Lain-Lain'
                              );
		$data['kategori_wow']= $kategori_wow;

		if ($tambah == 1) 
		{
			$this->form_validation->set_rules('judul_wow', 'Judul', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('deskripsi_wow', 'Deskripsi', 'required');

			//Mengambil filename gambar untuk disimpan
			$nmfile = "file_".time();
			$config['upload_path'] = './asset/upload_img_wow/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4000'; //kb
			$config['file_name'] = $nmfile;

			//value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
			if (($this->form_validation->run() == TRUE) AND (!empty($_FILES['filefoto']['name'])))
			{
				$gbr = NULL;

					$data_wow=array(
						'judul_wow'=>$this->input->post('judul_wow'),
						'kategori_wow'=>$this->input->post('kategori'),
						'deskripsi'=>$this->input->post('deskripsi_wow'),
						'tanggal_posting'=>date("Y-m-d h:i:sa"),
						'path_gambar'=> NULL
					);
					$data['dataWow'] = $data_wow;
				$this->load->library('upload', $config);
				if($this->upload->do_upload('filefoto'))
				{
					//echo "Masuk";
					$gbr = $this->upload->data();
					$this->crop($gbr['full_path'],$gbr['file_name']);
					$data_wow['path_gambar'] = $gbr['file_name'];

					$this->db->insert('wow', $data_wow);
					$this->session->set_flashdata('msg_berhasil', 'Data Ngerti Rak berhasil ditambahkan');
					redirect('KelolaWow');
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Ngerti Rak gagal ditambahkan, cek type file dan ukuran file yang anda upload');
					
					$this->load->view('skin/admin/header_admin');
					$this->load->view('skin/admin/nav_kiri');
					$this->load->view('content_admin/tambah_wow', $data);
					$this->load->view('skin/admin/footer_admin');
				}
			}
			else
			{
				$this->session->set_flashdata('msg_gagal', 'Data Ngerti Rak gagal ditambahkan');
				$this->tambah_wow_check();
			}
		}
		else
		{
			$this->load->view('skin/admin/header_admin');
			$this->load->view('skin/admin/nav_kiri');
			$this->load->view('content_admin/tambah_wow',$data);
			$this->load->view('skin/admin/footer_admin');
		}     
		} else {
			redirect(site_url('Account'));
		}
	}
	
	//Fungsi melakukan update pada database
	public function edit_wow($id_wow) 
	{	if($this->session->userdata('admin_logged_in')){
		$this->load->model('wow_models/WowModels');
		$this->load->library('form_validation');

		$edit = $this->input->post('save');

		$kategori_wow = array('Seni'=>'Seni',
                              'Travel dan Outdoor'=>'Travel dan Outdoor',
                              'Bisnis'=>'Bisnis',
                              'Science dan Teknologi'=>'Science dan Teknologi',
                              'Spirituality'=>'Spirituality',
                              'Musik'=>'Musik',
                              'Keluarga dan Pendidikan'=>'Keluarga dan Pendidikan',
                              'Hobi'=>'Hobi',
                              'Lain-Lain'=>'Lain-Lain'
                              );
		$data['kategori_wow']= $kategori_wow;
		if (isset($_POST['save']))
		{
			$id_wow = $this->input->post('id_wow');


			
			$this->form_validation->set_rules('judul_wow', 'Judul', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('deskripsi_wow', 'Deskripsi', 'required');

			//Mengambil filename gambar untuk disimpan
			$nmfile = "file_".time();
			$config['upload_path'] = './asset/upload_img_wow/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4000'; //kb
			$config['file_name'] = $nmfile;

			$data_wow=array(
							'judul_wow'=>$this->input->post('judul_wow'),
							'kategori_wow'=>$this->input->post('kategori'),
							'deskripsi'=>$this->input->post('deskripsi_wow'),
							'tanggal_posting'=>date("Y-m-d h:i:sa")
							
							);
			$data['dataWow'] = $data_wow;
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
						$this->crop($gbr['full_path'],$gbr['file_name']);
						$data_wow['path_gambar'] = $gbr['file_name'];

						
					}
					else
					{
						$this->session->set_flashdata('msg_gagal', 'Data Youth Wow gagal diedit');
						$iserror = true;
					}

				}
				if (!$iserror) {
					$this->db->update('wow', $data_wow, array('id_wow'=>$id_wow));
					$this->session->set_flashdata('msg_berhasil', 'Data Youth Wow berhasil diedit');
					redirect('KelolaWow');
					
				}
			}
			else
			{
				$this->session->set_flashdata('msg_gagal', 'Data Youth Wow gagal diedit');
				$this->tambah_wow_check();
			}
		}
		else
		{
			$data['wow'] = $this->WowModels->select_by_id_wow($id_wow)->row();

			$data_wow=array(
							'judul_wow'=>$data['wow']->judul_wow,
							'kategori_wow'=>$data['wow']->kategori_wow,
							'deskripsi'=>$data['wow']->deskripsi,
							'tanggal_posting'=>$data['wow']->tanggal_posting,
							'path_gambar'=> $data['wow']->path_gambar
							);
			$data['dataWow'] = $data_wow;


		}
		$data['idWow'] = $id_wow;
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_wow', $data);
		$this->load->view('skin/admin/footer_admin');
		} else{
			redirect(site_url('Account'));
		}
	}


	public function delete_wow()//$id_produk
	{
		$id_wow = $_POST['id_wow'];
		$this->load->model('wow_models/WowModels');
		$this->WowModels->delete_wow($id_wow);


		$this->index();
	}
	
	function by_kategori($ngerti){
		$ngerti=str_replace('%20',' ',$ngerti);
        header('Access-Control-Allow-Origin: *');
        header('Content-type: text/xml');
        
        //var_dump($search_term); exit();
        $get_ngerti=$this->db->like('kategori_wow',$this->db->escape_like_str($ngerti))->order_by('id_wow','DESC')->get('wow');
        
		
        
        
        $this->load->helper('xml');
		$xml_out = '<ngertis>';
        if ($get_ngerti->num_rows()>0) {
            foreach ($get_ngerti->result() as $row_ngerti) {
                $xml_out .= '<ngerti ';
                $xml_out .= 'id_ngerti="' . xml_convert($row_ngerti->id_wow) . '" ';
                $xml_out .= 'judul_ngerti="' . xml_convert($row_ngerti->judul_wow) . '" ';
                $xml_out .= 'deskripsi="' . xml_convert(($row_ngerti->deskripsi)) . '" ';
                $xml_out .= 'tanggal_posting="' . xml_convert(($row_ngerti->tanggal_posting)) . '" ';
                $xml_out .= 'path_gambar="' . xml_convert(($row_ngerti->path_gambar)) . '" ';
                $xml_out .= '/>';
            }
        }
		
		$xml_out .= '</ngerti>';
		
        echo $xml_out;
	}
	
	function crop($img,$filename){
		
		$name = $img;
		$myImage = imagecreatefromjpeg($name);
		list($width, $height) = getimagesize($name);
		//get percent to resize to 900x550
		if($width<=$height){
			$percent = 800/$width;
			$newwidth = $width * $percent;
			$newheight = $height * $percent;
			if($newheight<550){
				$percent2 = 550/$newheight;
				$newwidth = $newwidth * $percent2;
				$newheight = $newheight * $percent2;
			}
		} else {
			$percent = 550/$height;
			$newwidth = $width * $percent;
			$newheight = $height * $percent;
			if($newwidth<800){
				$percent2 = 800/$newwidth;
				$newwidth = $newwidth * $percent2;
				$newheight = $newheight * $percent2;
			}
		}
		
		
		// resize image
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresized($thumb, $myImage, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		imagejpeg($thumb,"./asset/upload_img_wow/resize_".$filename);
		
		// crop thumb
		$imgThumb = './asset/upload_img_wow/resize_'.$filename;
		$myThumb = imagecreatefromjpeg($imgThumb);
		list($width, $height) = getimagesize($imgThumb);
		$myThumbCrop =  imagecreatetruecolor(800, 550);
		imagecopyresampled($myThumbCrop,$myThumb,0,0,0,0 ,$width,$height,$width,$height);
		unlink('./asset/upload_img_wow/resize_'.$filename);
		 
		// Save the two images created
		$fileName="thumb_".$filename;
		imagejpeg( $myThumbCrop,"./asset/upload_img_wow/".$fileName );
		
	}
		
}