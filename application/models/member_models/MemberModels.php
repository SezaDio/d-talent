<?php

	class MemberModels extends CI_Model
	{
		const MEMBERS_TABLE = SRV_TBL_LOGINDATA;
		const TALENT_TABLE = SRV_TBL_TALENTINFO;

		function construct()
		{
			parent::_construct();
		}

		//Mengambil data member
		function get_data_member()
		{
			$query = $this->db->query("SELECT * FROM `member` WHERE status='1'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		//Mengambil data member yang butuh validasi
		function get_data_member_pend()
		{
			$query = $this->db->query("SELECT * FROM `member` WHERE status='2'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//Menyetujui data member
		function setuju_member($id_member)
		{
			$data = array(
				'status' => 1	
			);
			$this->db->where('id_member',$id_member);
			$this->db->update('member',$data);
		}
		
		//Menghapus data member
		function delete_member($id_member)
		{
			$this->db->where('id_member',$id_member);
			$this->db->delete('member');
		}

		//Select member by id member
		function select_by_id_member($id_member)
		{
			$query = $this->db->where('id_member',$id_member)->get('member');

			return $query->row_array();
		}
		
		function select_by_id($id_member)
		{
			$query = $this->db->where('id_member',$id_member)->get('member');

			return $query;
		}
		
		function event_by_id_member($id_member)
		{
			$query = $this->db->where('id_member',$id_member)->get('coming');

			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		//Menambah data youth member
		function add_data_member($data_member)
		{
			$this->db->insert('member', $data_member);
		}

		/**
		 * Fungsi dari DTalent lama	 
		 */
		
		// check ketersediaan member
		public function get_member_by_username($userName) {
			$this->db->from($this::MEMBERS_TABLE);
			$this->db->where(array('username'=>$userName));
		
			$queryResult = $this->db->get();
			if (!$queryResult) return null;
			return $queryResult->row();
		}

		/**
		 * Dapatkan data login member berdasar ID
		 * @param int $idMember ID member
		 * @return NULL|Object Row jika ada, NULL jika tidak ada
		 * @author Nur Hardyanto
		 */
		public function get_member_by_id($idMember) {
			$this->db->from($this::MEMBERS_TABLE);
			$this->db->where(array('id_member'=>$idMember));
			
			$queryResult = $this->db->get();
			if (!$queryResult) return null;
			return $queryResult->row();
		}

		/**
		 * Buat membership baru.
		 * @param array $dataLogin Data login.
		 * 	Field: username, password (unhashed), level, status, date_approved (optional)
		 * @param string $memberRole Role jobseeker / employer
		 * @param string $todayDate MySQL date yyyy-mm-dd hh:ii:ss
		 * @return boolean TRUE jika sukses, sebaliknya FALSE
		 */
		private function _create_member($dataLogin, $memberRole, $todayDate) {
			//== Conventional MD5...
			$hashOld = md5(uniqid(rand(), true));
			
			//== Modern hash
			$passwordHash = $this->_hash_password($dataLogin['password']);
			
			$loginData = array(					
					'passw' => $passwordHash,
					'role' => $memberRole,
					'priv' => $dataLogin['level'],
					'fullname' => $dataLogin['fullname'],
					'status' => $dataLogin['status'],
					'date_registered' => $todayDate,
					'username' => $dataLogin['username']
			);
			
			//-- Optionals
			//if (!empty($dataLogin['date_approved']))
			//	$loginData['date_approved'] = $dataLogin['date_approved'];
			//if (!empty($dataLogin['date_activated']))
			//	$loginData['date_activated'] = $dataLogin['date_activated'];
			//if (!empty($dataLogin['date_expired']))
			//	$loginData['date_expired'] = $dataLogin['date_expired'];
				
			$queryResult = $this->db->insert($this::MEMBERS_TABLE, $loginData);
			return $queryResult;
		}
		
		/**
		 * Tambah record member talent
		 * @param array $dataLogin Data login. Field: username, password (unhashed), level, status, date_approved (optional)
		 * @param array $dataMember Data detil login. Field sesuai pada database.
		 * @return int ID member jika sukses, NULL jika gagal.
		 * @author Nur Hardyanto
		 */
		public function create_member_talent($dataLogin, $dataMember) {
			$todayDate = date('Y-m-d H:i:s');
						
			$queryResult = $this->_create_member($dataLogin, 'talent', $todayDate);
			if ($queryResult) {
				$idMember = $this->db->insert_id();
				
				$dataDetil = array();
				$dataDetil['id_member'] = $idMember;
				foreach ($dataMember as $fieldName => $fieldVal) {
					$dataDetil[$fieldName] = $fieldVal;
				}				
				$dataDetil['talent_date_join'] = $todayDate;

				$queryResult = $this->db->insert($this::TALENT_TABLE, $dataDetil);
					
				return $idMember;				
				
			} else {
				return null;
			}
		}
		/**
		 * Tambah record member talent
		 * @param array $dataLogin Data login. Field: username, password (unhashed), level, status, date_approved (optional)
		 * @param array $dataMember Data detil login. Field sesuai pada database.
		 * @return int ID member jika sukses, NULL jika gagal.
		 * @author Nur Hardyanto
		 */
		public function create_member_company($dataLogin, $dataMember) {
			$todayDate = date('Y-m-d H:i:s');
						
			$queryResult = $this->_create_member($dataLogin, 'company', $todayDate);
			if ($queryResult) {
				$idMember = $this->db->insert_id();
				
				$dataDetil = array();
				$dataDetil['id_member'] = $idMember;
				foreach ($dataMember as $fieldName => $fieldVal) {
					$dataDetil[$fieldName] = $fieldVal;
				}				
				$dataDetil['company_date_join'] = $todayDate;

				$queryResult = $this->db->insert('company', $dataDetil);
					
				return $idMember;				
				
			} else {
				return null;
			}
		}
		/**
		 * Hash password pada sistem UNDIP Career Center
		 * @param string $newPassword String password
		 * @return string String hash
		 */
		private function _hash_password($newPassword) {
			// == Generate hash untuk password baru
			$cost = 10;
			$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$passwordHash = crypt($newPassword, $salt);
			
			return $passwordHash;
		}

		public function autentikasi($userName, $passWord, $updateLog = true) {
			$this->db->from($this::MEMBERS_TABLE);
			$this->db->where(array('username'=>$userName));
		
			$queryResult = $this->db->get();
			if (!$queryResult) return null;
			else {
				$memberLoginData = $queryResult->row();
				
				if (!$memberLoginData) {
					return null;
				}
				
				// Jika password benar...
				if ((crypt($passWord, $memberLoginData->passw)) === $memberLoginData->passw) {
					// Valid login
				} else {
					return null;
				}
				
				/*
				if ($updateLog) {
					$currentDate = date('Y-m-d H:i:s');
					$currentIpAddr = $_SERVER['REMOTE_ADDR'];
					
					$this->db->where(array('username'=>$userName));
					$this->db->update($this::MEMBERS_TABLE, array(
							'date_last_login'=>$currentDate,
							'ip_last_login'=>$currentIpAddr
					));
				}
				*/
				return $memberLoginData;
			}
		}
		/**
		 * Ganti password member UCC
		 * @param int $memberId Member ID
		 * @param string $newPassword Password baru
		 * @return boolean TRUE jika berhasil, FALSE jika gagal
		 * @author Nur Hardyanto
		 */
		public function change_password($memberId, $newPassword) {
			//== Conventional MD5, randomized
			$hashPass = md5(uniqid(rand(), true));
			
			//== Modern hash
			$passwordHash = $this->_hash_password($newPassword);
		
			$this->db->where('id_member', $memberId);
			$qResult = $this->db->update($this::MEMBERS_TABLE, array(
					'passw' => $passwordHash
			));
		
			if ($this->db->affected_rows() == 0) return false;
			return true;
		}
	}
