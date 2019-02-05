<?php

	class UserModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		// Cek keberadaan user di sistem
		function check_user_account($username, $password)
		{
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			return $this->db->get();
		}

		//Mengambil data dari tabel Talent
		function get_data_talent()
		{
			$query = $this->db->query("SELECT * FROM `members` WHERE role='talent'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		// cek id member
		function check_id_members($email)
		{
			$this->db->select("id_member");
			$this->db->from("members");
			$this->db->where("username", $email);

			return $this->db->get();
		}

		// Cek keberadaan user di sistem
		function check_member_account($email, $password)
		{
			$this->db->select('*');
			$this->db->from('talent');
			$this->db->where('email', $email);
			$this->db->where('password', md5($password));

			return $this->db->get();
		}

		//Mengambil data dari tabel Talent
		function get_data_company()
		{
			$query = $this->db->query("SELECT * FROM `company`");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		// Cek keberadaan user di sistem
		function check_company_member_account($email, $password)
		{
			$this->db->select('*');
			$this->db->from('company');
			$this->db->where('company_email', $email);
			$this->db->where('password', md5($password));

			return $this->db->get();
		}


		//Mengambil data user
		function get_member($id_member)
		{
			$this->db->select('*');
			$this->db->from('member');
			$this->db->where('id_member', $id_member);

			return $this->db->get();
		}

		//Ambiil Data lokasi provinsi dari database
		function lokasi_provinsi()
		{
			$query = $this->db->query("SELECT * FROM `inf_lokasi` WHERE lokasi_propinsi!=0 AND lokasi_kabupatenkota=0 AND lokasi_kecamatan=0 AND lokasi_kelurahan=0 ORDER BY lokasi_nama ASC");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$row['lokasi_propinsi']] = $row;
			}
		
			return $result;
		}

		//Ambiil Data lokasi provinsi dari database untuk job vacancy
		function lokasi_provinsi_job()
		{
			$query = $this->db->query("SELECT * FROM `inf_lokasi` WHERE lokasi_propinsi!=0 AND lokasi_kabupatenkota=0 AND lokasi_kecamatan=0 AND lokasi_kelurahan=0 ORDER BY lokasi_nama ASC");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$row['lokasi_propinsi']] = $row;
			}
		
			return $result;
		}

		//Ambil Data lokasi kota dari database
		function lokasi_kabupaten_kota($id_provinsi)
		{
			$query = $this->db->query("SELECT * FROM `inf_lokasi` WHERE lokasi_propinsi='".$id_provinsi."' AND lokasi_kabupatenkota!=0 AND lokasi_kecamatan=0 AND lokasi_kelurahan=0 ORDER BY lokasi_nama ASC");
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$row['lokasi_kode']] = $row;
			}
		
			return $result;
		}

		// get data talent by idmember
		public function get_talent_by_idmember($idMember) {
			$this->db->from(SRV_TBL_TALENTINFO);
			$this->db->limit(1);
			$this->db->where(array('id_member' => $idMember));
			
			$queryResult = $this->db->get();
			if (!$queryResult) return null;
			return $queryResult->row();
		}

		// get data company by idmember
		public function get_company_by_idmember($idMember) {
			$this->db->from("company");
			$this->db->limit(1);
			$this->db->where(array('id_member' => $idMember));
			
			$queryResult = $this->db->get();
			if (!$queryResult) return null;
			return $queryResult->row();
		}
	}
