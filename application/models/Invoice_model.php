<?php
/**
 * Invoice model, represents training invoice
 * @author Nur Hardyanto
 *
 */
class Invoice_model extends CI_Model {
	const INVOICE_TABLE = "invoice";

	public function get_upload_path() { return '/assets/upload/invoice/'; } // Do not forget the trailing slash
	
	/**
	 * Fetch single invoice object row by its ID
	 * @param int $idInvoice ID invoice
	 * @return Object|NULL Invoice row object. NULL if specified ID is not found
	 */
	public function get_invoice_by_id($idInvoice, $joinLoginData = false) {
		$this->db->select($this::INVOICE_TABLE.'.*');
		$this->db->from($this::INVOICE_TABLE);
		$this->db->where(array('id_invoice' => $idInvoice));
	
		if ($joinLoginData) {
			$this->_join_logindata();
		}
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	/**
	 * Fetch single invoice object row by its unique code
	 * @param string $invoiceUnique Unique code
	 * @return Object|NULL Invoice row object. NULL if specified ID is not found
	 */
	public function get_invoice_by_unique($invoiceUnique, $joinLoginData = false) {
		$this->db->from($this::INVOICE_TABLE);
		$this->db->where(array('unique' => $invoiceUnique));
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->row();
	}
	
	/**
	 * Save invoice row
	 *
	 * @param array $invoiceData Invoice row data, field based on the database fields
	 * @param int $idInvoice ID invoice. -1 to create new
	 * @return int|NULL Returns saved row ID if succeed, otherwise NULL
	 */
	public function save_invoice_by_id($invoiceData, $idInvoice) {
		$this->db->set($invoiceData);
	
		$processResult = null;
		if ($idInvoice > 0) {
			$this->db->where('id_invoice', $idInvoice);
			$processResult = $this->db->update($this::INVOICE_TABLE);
			$returnId = $idInvoice;
			
		} else {
			$processResult = $this->db->insert($this::INVOICE_TABLE);
			$returnId = $this->db->insert_id();
			
		}
		if ($processResult) {
			return $returnId;
			
		} return null;
	}
	
	private function _apply_filter($configFilter) {
		if (isset($configFilter['status'])) {
			$this->db->where(array('status' => $configFilter['status']));
		}
		if (isset($configFilter['search'])) {
			$this->db->where('id_invoice', $configFilter['search']);
		}
	}
	
	private function _join_logindata() {
		$this->db->select(['fullname','role','priv','date_registered']);
		$this->db->join(SRV_TBL_LOGINDATA, SRV_TBL_LOGINDATA.'.id_member='.$this::INVOICE_TABLE.'.id_member');
	}
	
	public function get_latest_invoice($configFilter = null, $limit = 20) {
		$this->db->select($this::INVOICE_TABLE.'.*');
		$this->db->from($this::INVOICE_TABLE);
		$this->_apply_filter($configFilter);
		
		if (!empty($configFilter['join_logindata'])) {
			$this->_join_logindata();
		}
		
		if ($limit > 0) $this->db->limit($limit);
		$this->db->order_by('date_created DESC');
		
		$queryResult = $this->db->get();
		
		if (!$queryResult) return null;
		return $queryResult->result();
	}
	
	/**
	 * Set invoice property
	 * @param int $idInvoice ID invoice
	 * @param array $updateData Update data. Key based on the database
	 * @return boolean|NULL Return NULL if query failed, or non-NULL if query succeed
	 */
	public function set_invoice_data($idInvoice, $updateData) {
		$this->db->where('id_invoice', $idInvoice);
		$this->db->set($updateData);
		$queryResult = $this->db->update($this::INVOICE_TABLE);
		return $queryResult;
	}
	
	public function get_invoice_channels() {
		return [
				'manual' => [
						'available' => false,
						'label' => 'Transfer Bank',
						'desc' => 'Transfer manual ke rekening kami dengan konfirmasi pembayaran manual.'],
				'bank-transfer' => [
						'available' => true,
						'label' => 'Transfer Bank',
						'desc' => 'Transfer melalui ATM, internet Banking atau SMS banking. Konfirmasi pembayaran otomatis.',
						'image' => '/assets/images/payment/atm-bersama-48.jpg'],
				'credit-card' => [
						'available' => true,
						'label' => 'Kartu Kredit',
						'desc' => 'Bayar menggunakan kartu kredit berlogo VISA atau MasterCard. Konfirmasi pembayaran otomatis.',
						'image' => '/assets/images/payment/credit-card-48.png']
		];
	}
}