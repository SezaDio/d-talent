<?php

class Preferences_model extends CI_Model {
	const EMAIL_TABLE = 'email';
	const CONTACTS_TABLE = 'contact_number';
	
    function read_contact($args) {
        $this->db->select('*');
        $this->db->from('contact_number');
        $this->db->order_by('id_contact_number', 'asc');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Ambil record nomor kontak
     * @param int $idMember ID member
     * @param string $contactNumber Nomor HP dengan format 08....
     * @return Object Kembali objek email
     */
    function get_contact_data($idMember, $contactNumber) {
    	$this->db->from($this::CONTACTS_TABLE);
    	$this->db->where(['id_member' => $idMember, 'contact_number' => $contactNumber]);
    	$query = $this->db->get();
    	return $query->row();
    }
    
    /**
     * Ambil list data contact berdasar nomor kontak.
     * @param string $contactNumber
     * @param int $statusFilter Filter status. NULL untuk disable filter status.
     * @return object[] Array dari objek, atau NULL jika query gagal.
     */
    function get_contacts_by_number($contactNumber, $statusFilter = null) {
    	$this->db->from($this::CONTACTS_TABLE);
    	
    	$queryFilter = ['contact_number' => $contactNumber];
    	
    	if ($statusFilter !== null) {
    		$queryFilter['status'] = $statusFilter;
    	}
    	$this->db->where($queryFilter);
    	$query = $this->db->get();
    	
    	if ($query) {
	    	return $query->result();
    	}
    	return null;
    }
    
    function read_active_contact($args) {
        $this->db->select('no_hp');
        $this->db->from('member_dtl');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->row()->no_hp;
    }

    /**
     * Simpan record nomor kontak.
     * @param array $args
     * @return unknown|NULL
     */
    public function save_contact($args) {
        $contactNumber = $args['contact_number'];
        $idMember = $args['id_member'];
        $contactStatus = (empty($args['status']) ? SRV_STATUS_PENDING : $args['status']);
        
        $contact = array(
            'id_member' => $idMember,
            'contact_number' => $contactNumber,
        	'status' => $contactStatus,
        	'verify_code' => $args['verify_code']
        );

		$procResult = $this->db->insert($this::CONTACTS_TABLE, $contact);
        
		if ($procResult) {
	        $insert_id = $this->db->insert_id();
	        return $insert_id;
		}
		return null;
    }

    public function delete_contact($id) {
        $this->db->where('id_contact_number', $id);
        $query = $this->db->delete('contact_number');
        return true;
    }

    function read_current_contact($args) {
        $this->db->select('contact_number');
        $this->db->from('contact_number');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->row()->contact_number;
    }

    /* EMAIL */

    function read_email($args) {
        $this->db->from('email');
        $this->db->order_by('id_email', 'asc');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /**
     * Ambil record email
     * @param int $idMember ID member
     * @param string $emailAddr Email address
     * @return Object Kembali objek email
     */
    function get_email_data($idMember, $emailAddr) {
    	$this->db->from($this::EMAIL_TABLE);
    	$this->db->where(['id_member' => $idMember, 'email' => $emailAddr]);
    	$query = $this->db->get();
    	return $query->row();
    }

    function read_existing_email($args) {
        $this->db->select('email');
        $this->db->from('email');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function read_active_email($args) {
        $this->db->select('email');
        $this->db->from('member_dtl');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->row()->email;
    }

    public function attempt_email_verification($idMember, $emailAddr) {
    	$currentDate = date('Y-m-d H:i:s');
    	$updateData = array(
    		'date_last_attempt' => $currentDate
    	);
    	
    	$this->db->where([
    		'id_member' => $idMember,
    		'email' => $emailAddr
    	]);
    	$this->db->update($updateData);
    }
    
    
    /**
     * Simpan record e-mail.
     * @param array $args
     * @return unknown|NULL
     */
    public function save_email($args) {
        $email = $args['email'];
        $idMember = $args['id_member'];
        $emailStatus = (empty($args['status']) ? SRV_STATUS_PENDING : $args['status']);
        $emailToSave = array(
            'id_member' => $idMember,
            'email' => $email,
            'status' => $emailStatus,
        	'token' => $args['token']
        );

        if (isset($args['date_last_attempt'])) $emailToSave['date_last_attempt'] = $args['date_last_attempt'];
        $queryResult = $this->db->insert('email', $emailToSave);
        
        if ($queryResult) {
	        $insert_id = $this->db->insert_id();
    	    return $insert_id;
        }
        
        return null;
    }

    public function delete_email($id) {
        $this->db->where('id_email', $id);
        $query = $this->db->delete('email');
        return true;
    }

    public function create_email_token($id,$args) {
        $this->db->where('id_email', $id);
        $this->db->update('email', $args);
        return true;
    }

    public function activate_email($token) {
        $data = array(
            'status' => 2,
        );
        $this->db->where('token', $token);
        $this->db->update('email', $data);
        return true;
    }

    function read_current_email($args) {
        $this->db->from('email');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->row();
    }

    function read_active_user($args) {
        $this->db->select('*');
        $this->db->from('member_dtl');
        $this->db->where($args);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Update record email
     * @param int $idEmail
     * @param array $updateData
     */
    function update_emaildata($idEmail, $updateData) {
    	$this->db->where('id_email', $idEmail);
    	$this->db->set($updateData);
    	return $this->db->update($this::EMAIL_TABLE);
    }
    
    /**
     * Update record contact
     * @param int $idContact
     * @param array $updateData
     */
    function update_contactdata($idContact, $updateData) {
    	$this->db->where('id_contact_number', $idContact);
    	$this->db->set($updateData);
    	return $this->db->update($this::CONTACTS_TABLE);
    }
}
