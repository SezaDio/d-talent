<?php
/**
 * Invoice transaction model, represents invoice transactions
 * @author Nur Hardyanto
 *
 */
class Transaction_model extends CI_Model {
	const TRX_TABLE = 'invoice_transactions';
	
	/**
	 * Fetch single invoice object row by its ID
	 * @param int $idInvoice ID invoice
	 * @return Object|NULL Invoice row object. NULL if specified ID is not found
	 */
	public function get_transactions_by_invoice($idInvoice) {
		$this->db->from($this::TRX_TABLE);
		$this->db->where(array('id_invoice' => $idInvoice));
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->result();
	}
	
	/**
	 * Fetch transaction row by ID
	 * @param int $idTrx Transaction ID
	 * @return Object Transaction row object
	 */
	public function get_transaction_by_id($idTrx) {
		$this->db->from($this::TRX_TABLE);
		$this->db->where(['id_trx' => $idTrx]);
	
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
	
		return $queryResult->row();
	}
	
	/**
	 * Save transaction row
	 *
	 * @param array $trxData Transaction row data, field based on the database fields
	 * @param int $idTrx ID transaction. -1 or NULL to create new
	 * @return int|NULL Returns saved row ID if succeed, otherwise NULL
	 */
	public function save_transaction_by_id($trxData, $idTrx) {
		$this->db->set($trxData);
	
		$processResult = null;
		if ($idTrx > 0) {
			$this->db->where('id_trx', $idTrx);
			$processResult = $this->db->update($this::TRX_TABLE);
			$returnId = $idTrx;
			
		} else {
			$processResult = $this->db->insert($this::TRX_TABLE);
			$returnId = $this->db->insert_id();
				
		}
		if ($processResult) {
			return $returnId;
				
		} return null;
	}
	
	/**
	 * Remove transaction record by ID
	 * @param int $idTrx ID transaction
	 */
	public function remove_transaction_by_id($idTrx) {
		$this->db->where('id_trx', $idTrx);
		return $this->db->delete($this::TRX_TABLE);
	}
	
	public function get_transaction_channels() {
		return [
				'cash' => 'Tunai',
				'cast-transfer' => 'Setor Tunai',
				'atm' => 'Transfer ATM',
				'ebanking' => 'e-Banking',
				'smsbanking' => 'SMS Banking',
				'creditcard' => 'Kartu kredit',
				'ipg-doku' => 'Doku payment channel',
				'other' => 'Lain-lain'
		];
	}
}