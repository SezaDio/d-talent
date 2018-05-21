<?php

	class adminModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		//Mengambil data admin
		function get_data_admin()
		{
			$query = $this->db->query("SELECT * FROM `admin`");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		//Mengambil data admin yang butuh validasi
		function get_data_admin_pend()
		{
			$query = $this->db->query("SELECT * FROM `admin` WHERE status='2'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//Menyetujui data admin
		function setuju_admin($id_admin)
		{
			$data = array(
				'status' => 1	
			);
			$this->db->where('id_admin',$id_admin);
			$this->db->update('admin',$data);
		}
		
		//Menghapus data admin
		function delete_admin($id_admin)
		{
			$this->db->where('id_admin',$id_admin);
			$this->db->delete('admin');
		}

		//Select admin by id admin
		function select_by_id_admin($id_admin)
		{
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('id_admin',$id_admin);

			return $this->db->get();
		}
		
		//Menambah data youth admin
		function add_data_admin($data_admin)
		{
			$this->db->insert('admin', $data_admin);
		}
	}
