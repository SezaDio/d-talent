<?php

/**
 * MY_Loader merupakan extends dari CI_Loader
 * @author M Nur Hardyanto
 * 
 */
class MY_Loader extends CI_Loader {
	const APP_VERSION		= "v.0.1 Alpha";
	const APP_VERSION_STR	= "v0.1-alpha";
	
	const SESS_TYPE			= "sess_type";
	const SESS_TYPE_TALENT	= "talent";
	const SESS_TYPE_COMPANY = "company";
	const SESS_TYPE_BO		= "backoffice";
	
	const SESS_ID_MEMBERID	= "sess_uid";
	const SESS_ID_DETAILID	= "sess_udetailid";
	const SESS_ID_FULLNAME	= "sess_ufullname";
	const SESS_ID_ROLE		= "sess_urole";
	const SESS_ID_PRIV		= "sess_upriv";
	
	/**
	 * Mengubah tanggal menjadi format Indonesia
	 * @param int $time_ UNIX time
	 * @param boolean $hari_ TRUE apabila ingin menampilkan nama hari (Senin, Selasa, dsb)
	 * @param boolean $waktu_ TRUE apabila ingin menampilkan waktu dalam HH:mm:ss
	 * @return string Tanggal yang sudah terformat
	 */
	function tanggal_indonesia($time_, $hari_ = true, $waktu_ = false) {
		$hari="";
		if ($hari_) {
			switch (date("w", $time_)) {
				case "0" : $hari="Minggu, ";break;
				case "1" : $hari="Senin, ";break;
				case "2" : $hari="Selasa, ";break;
				case "3" : $hari="Rabu, ";break;
				case "4" : $hari="Kamis, ";break;
				case "5" : $hari="Jumat, ";break;
				case "6" : $hari="Sabtu, ";break;
			}
		}

		switch (date("m", $time_)) {
			case "1" : $bulan="Januari";break;
			case "2" : $bulan="Februari";break;
			case "3" : $bulan="Maret";break;
			case "4" : $bulan="April";break;
			case "5" : $bulan="Mei";break;
			case "6" : $bulan="Juni";break;
			case "7" : $bulan="Juli";break;
			case "8" : $bulan="Agustus";break;
			case "9" : $bulan="September";break;
			case "10" : $bulan="Oktober";break;
			case "11" : $bulan="November";break;
			case "12" : $bulan="Desember";break;
		}
		
		return $hari. date("j", $time_) ." $bulan". date(" Y", $time_).($waktu_ ? date(", H:i", $time_):"");
	}
	
	/**
	 * Generate URL CDN untuk asset
	 * @param string $filePath Path ke asset, diawali dengan slash. Ex: '/assets/images/file.png'
	 * @return string URL output
	 */
	function cdn_base_url($filePath) {
		return $this->config->item('cdn_base_url').$filePath;
	}
	
	/**
	 * @param string $text Teks yang ingin dioutputkan
	 * @param boolean $return TRUE jika outputnya ingin direturn
	 * @return NULL|string
	 */
	public function append_output($text, $return = FALSE) {
		$this->output->append_output($text);
		if ($return) return $text;
	}
    /**
     * Mengoutputkan konten dengan template front-end
     * @param string $template_name File konten yang akan ditampilkan
     * @param array $vars Array nilai
     * @param boolean $return Minta return output?
     * @return Output &lt;string&gt;
     */
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        $this->view('skin/front_header', $vars, $return);
		$this->view($template_name, $vars, $return);
        $this->view('skin/front_footer', $vars, $return);
    }

    public function template_talent($template_name, $vars = array(), $return = FALSE)
    {
    	$vars['hideNav'] = true;
    	$vars['showMemberInfobar'] = true;
    	$vars['memberArea'] = true;
    	
    	$this->view('skin/front_header', $vars, $return);
    	$this->output->append_output('<section class="section-bottom-border web_simplepage"><div class="container"><div class="row">'.PHP_EOL);
    	$this->view('skin/talent_navigation', $vars, $return);
    	$this->view($template_name, $vars, $return);
    	$this->output->append_output('</div></div></section>'.PHP_EOL);
    	$this->view('skin/front_footer', $vars, $return);
    }
    
    public function template_backoffice($template_name, $vars = array(), $return = FALSE) {
    	$this->view('bo/skin/bo_header', $vars, $return);
    	if (!isset($vars['simplePage']))
			$this->view('bo/skin/bo_navigation', $vars, $return);
    	$this->view($template_name, $vars, $return);
    	$this->view('bo/skin/bo_footer', $vars, $return);
    }
    
    public function get_session_data(&$contollerData) {
    	$ci =& get_instance();
    	
    	$contollerData[WEB_SESS_TYPE]		= $ci->session->userdata($this::SESS_TYPE);
    	$contollerData[WEB_SESS_MEMBERID]	= $ci->session->userdata($this::SESS_ID_MEMBERID);
    	$contollerData[WEB_SESS_FNAME]		= $ci->session->userdata($this::SESS_ID_FULLNAME);
    	$contollerData[WEB_SESS_DETAILID]	= $ci->session->userdata($this::SESS_ID_DETAILID);
    	$contollerData[WEB_SESS_ROLE]		= $ci->session->userdata($this::SESS_ID_ROLE);
    	$contollerData[WEB_SESS_PRIV]		= $ci->session->userdata($this::SESS_ID_PRIV);
    }
    
	/**
	 * Cek sesi talent member
	 * @param string $enableRedirect Jika TRUE, maka akan redirect jika tidak ada sesi
	 * @return boolean TRUE jika ada sesi, sebaliknya FALSE
	 */
	public function check_session_talent($enableRedirect = true) {
		$ci =& get_instance();
		
		if ($ci->session->userdata($this::SESS_TYPE) != $this::SESS_TYPE_TALENT) {
			if ($enableRedirect) {
				$ci->output->set_header('Location: '.site_url('/auth/login?next='.urlencode($_SERVER['REQUEST_URI'])));
			}
			return false;
		}
		return true;
	}
	
	/**
	 * Cek sesi administrator
	 * @param string $enableRedirect Jika TRUE, maka akan redirect jika tidak ada sesi
	 * @return boolean TRUE jika ada sesi, sebaliknya FALSE
	 */
	public function check_session_backoffice($enableRedirect = true) {
		$ci =& get_instance();
	
		if ($ci->session->userdata($this::SESS_TYPE) != $this::SESS_TYPE_BO) {
			if ($enableRedirect) {
				$ci->output->set_header('Location: '.site_url(WEB_BACKOFFICE_BASEURL.'/auth?next='.urlencode($_SERVER['REQUEST_URI'])));
			}
			return false;
		}
		return true;
	}
	
	/**
	 * Get status HTML texts
	 * @return string[]
	 */
	public function text_statuslabel() {
		return [
			SRV_STATUS_ACCEPTED	=> '<span class="label label-success">Active</span>',
			SRV_STATUS_PENDING	=> '<span class="label label-default">Unactivated</span>',
			SRV_STATUS_REJECTED	=> '<span class="label label-danger">Suspended</span>'
		];
	}
	
	
	public function halt_verbose($verboseData) {
		$ci =& get_instance();
		$ci->load->view('_debug/verbose', ['pageTitle' => 'Verbose', 'verboseData' => $verboseData]);
	}
	
}