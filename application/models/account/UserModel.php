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
			$query = $this->db->query("SELECT * FROM `talent`");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
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
	}
