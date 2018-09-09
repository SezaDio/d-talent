<?php
/**
 * Model Email, untility untuk e-mailing pada website
 * @author Nur Hardyanto
 *
 */
class Email_model extends CI_Model {
	const LOG_TABLE = "log_email";
	const EMAILCONFIG_INFO = 0;
	
	var $activeConfig;
	var $emailError = null;
	var $emailAttachments = array();
	
	var $emailConfig = array(
		1 => array(
			'host' => 'mail.d-talentsolution.id',
			'from' => 'hello@d-talentsolution.id',
			'user' => 'hello@d-talentsolution.id',
			'pass' => 'd-TalentInfo',
			'port' => 587
		),
		0 => array(
			'host' => 'mail.dtalent.id',
			'from' => 'hello@dtalent.id',
			'user' => 'hello@dtalent.id',
			'pass' => 'd-TalentInfo',
			'port' => 587
		),
		3 => array(
			'host' => 'localhost',
			'from' => 'postmaster@localhost',
			'user' => 'postmaster',
			'pass' => 'admin',
			'port' => 25
		),
		4 => array(
				'host' => 'smtp.sendgrid.com',
				'from' => 'email@email.net',
				'user' => 'user',
				'pass' => 'pass',
				'port' => 587
		),
	);
	var $logData;
	
	public function __construct() {
		parent::__construct();
		// Config default
		$this->activeConfig = $this::EMAILCONFIG_INFO;
	}
	
	
	/**
	 * Ambil data konfigurasi aktif
	 * @return string[]|number[]
	 */
	public function get_config($configId) {return $this->emailConfig[$configId]; }
	
	/**
	 * Set konfigurasi e-mail
	 * @param integer $configId ID config (0: info, 1: staff.event, 2: company.service)
	 */
	public function set_config($configId) { $this->activeConfig = $configId; }
	
	//-- For internal use only!
	public function set_config_force($configId) { $this->activeConfig = $configId; }
	
	/**
	 * Tambah file attachment
	 * @param string $filePath Alamat real dari file yang akan diattach
	 */
	public function add_attachment($filePath) { $this->emailAttachments[] = $filePath; }
	
	/**
	 * Hapus attachment
	 */
	public function clear_attachment() { $this->emailAttachments = array(); }
	
	/**
	 * Ambil informasi error e-mail
	 * @return NULL
	 */
	public function get_debug_info() {
		return $this->emailError;
	}
	
	/**
	 * Menghapus informasi error
	 */
	public function clear_debug_info() { $this->emailError = null; }
	
	/**
	 * Kirim e-mail memakai konfigurasi yang aktif (default: info)
	 * @param string $destAddress Alamat e-mail tujuan
	 * @param string $emailSubject Subject e-mail
	 * @param string $emailContent Konten e-mail
	 * @param string $emailTag Tag e-mail (ditampilkan dalam log)
	 * @param boolean $logEmail Tulis log?
	 * @return Ambigous <NULL, boolean> NULL jika gagal mengirim, TRUE jika berhasil.
	 */
	public function web_send_email($destAddress, $emailSubject, $emailContent, $emailTag, $logEmail = true) {
		$processResult = null;
		$currentTime = date('Y-m-d H:i:s');
		
		$this->logData = array(
			'subject' => $emailSubject,
			'content' => $emailContent,
			'recipient' => $destAddress,
			'timestamp' => $currentTime,
			'tag' => $emailTag
		);
		
		$this->load->library ( 'email' );
		
		$this->email->initialize ( array (
			'protocol' => 'smtp',
			'smtp_host' => $this->emailConfig[$this->activeConfig]['host'],
			'smtp_user' => $this->emailConfig[$this->activeConfig]['user'],
			'smtp_pass' => $this->emailConfig[$this->activeConfig]['pass'],
			'smtp_port' => $this->emailConfig[$this->activeConfig]['port'],
			'crlf' => "\r\n",
			'newline' => "\r\n",
			'mailtype' => 'html',
			'smtp_crypto' => 'tls',
			'charset' => 'iso-8859-1' 
		) );
		
		$this->email->clear(true);
		$this->email->from ( $this->emailConfig[$this->activeConfig]['from'], 'D-Talent' );
		$this->email->to ( $destAddress );
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');
		$this->email->subject ( $emailSubject );
		$this->email->message ( $emailContent );
		
		foreach ($this->emailAttachments as $attachmentItem) {
			$this->email->attach($attachmentItem);
		}
		
		if ($this->email->send()) {
			$this->emailError = null;
			$processResult = true;
			$this->logData['status'] = 1;
			$this->logData['extradata'] = "Success";
		} else {
			$this->emailError = $this->email->print_debugger();
			$processResult = null;
			$this->logData['status'] = 0;
			$this->logData['extradata'] = "Error. Debug Info: ".$this->emailError;			
		}
		if ($logEmail) {
			$this->save_email_log();
		}
		
		return $processResult;
	}
	
	/**
	 * Simpan log e-mail.
	 */
	public function save_email_log() {
		if (empty($this->logData)) return;
		 
		//--------- Tulis log email
		$this->db->insert($this::LOG_TABLE, $this->logData);
			
		$randomHash	= md5(uniqid(rand(), true));
		$randomPostFix = substr($randomHash, 1, 5);
			
		$dateChunk = date("Ymd-His").'-'.$randomPostFix;
		
		$reportToLog  = "\r\n[".date('j F Y, H:i:s')."]\t: mailto [".$this->logData['recipient']."]\t: ";
		if ($this->logData['status'] == 1) { // Sukses
			$reportToLog .= "Message sent...";
		} else {
			$reportToLog .= "Mailer Error!";
		}
		$reportToLog .= "\t[".$this->logData['tag']."] | [".$this->logData['subject']."] | [".$dateChunk.".html]";
			
		/*** Actually we not really need this kind of logging
		file_put_contents(APPPATH."logs/email.log", $reportToLog, FILE_APPEND);
		file_put_contents(APPPATH."logs/emails/".$dateChunk.".html", $this->logData['content']);*/
		
		$this->logData = array(); // Clear log data
	}
}