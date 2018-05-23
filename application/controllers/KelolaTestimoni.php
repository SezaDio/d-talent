<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTestimoni extends CI_Controller {

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
		$this->load->model('testimoni_models/TestimoniModels');
		$data['listTestimoni'] = $this->TestimoniModels->get_data_testimoni();
			
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_testimoni', $data);
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
	
	function tambah_testimoni_check() {
		if($this->session->userdata('admin_logged_in')){
        $this->load->model('testimoni_models/TestimoniModels');
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
			$this->load->view('skin/admin/header_admin');
			$this->load->view('skin/admin/nav_kiri');
			$this->load->view('content_admin/tambah_testimoni');
			$this->load->view('skin/admin/footer_admin');
		}     
		} else {
			redirect(site_url('Account'));
		}
	}
	
	//Fungsi melakukan update pada database
	public function edit_testimoni($id_testimoni) 
	{	
		if($this->session->userdata('admin_logged_in'))
		{
			$this->load->model('testimoni_models/TestimoniModels');
			$this->load->library('form_validation');

			$edit = $this->input->post('save');

			if (isset($_POST['save']))
			{
				$id_testimoni = $this->input->post('id_testimoni');

				$this->form_validation->set_rules('nama_testimoni', 'Nama', 'required');
				$this->form_validation->set_rules('job', 'Job', 'required');
				$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

				//Mengambil filename gambar untuk disimpan
				$nmfile = "file_".time();
				$config['upload_path'] = './asset/img/upload_img_testimoni/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '4000'; //kb
				$config['file_name'] = $nmfile;

				$data_testimoni=array(
								'nama_testimoni'=>$this->input->post('nama_testimoni'),
								'job'=>$this->input->post('job'),
								'deskripsi'=>$this->input->post('deskripsi'),
								'tanggal_posting'=>date("Y-m-d h:i:sa")
								);
				$data['dataTestimoni'] = $data_testimoni;
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
							$data_testimoni['path_gambar'] = $gbr['file_name'];
						}
						else
						{
							$this->session->set_flashdata('msg_gagal', 'Data Testimoni gagal diedit');
							$iserror = true;
						}

					}
					if (!$iserror) {
						$this->db->update('testimoni', $data_testimoni, array('id_testimoni'=>$id_testimoni));
						$this->session->set_flashdata('msg_berhasil', 'Data Testimoni berhasil diedit');
						redirect('KelolaTestimoni');
						
					}
				}
				else
				{
					$this->session->set_flashdata('msg_gagal', 'Data Testimoni gagal diedit');
					$this->edit_testimoni($id_testimoni);
				}
			}
			else
			{
				$data['testimoni'] = $this->TestimoniModels->select_by_id_testimoni($id_testimoni)->row();

				$data_testimoni=array(
								'nama_testimoni'=>$data['testimoni']->nama_testimoni,
								'job'=>$data['testimoni']->job,
								'deskripsi'=>$data['testimoni']->deskripsi,
								'tanggal_posting'=>$data['testimoni']->tanggal_posting,
								'path_gambar'=> $data['testimoni']->path_gambar
								);
				$data['dataTestimoni'] = $data_testimoni;


			}
			$data['idTestimoni'] = $id_testimoni;
			$this->load->view('skin/admin/header_admin');
			$this->load->view('skin/admin/nav_kiri');
			$this->load->view('content_admin/edit_testimoni', $data);
			$this->load->view('skin/admin/footer_admin');
		} 
		else
		{
			redirect(site_url('Account'));
		}
	}


	public function delete_testimoni()
	{
		$id_testimoni = $_POST['id_testimoni'];
		$this->load->model('testimoni_models/TestimoniModels');
		$this->TestimoniModels->delete_testimoni($id_testimoni);
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