<?php

	class MemberModels extends CI_Model
	{
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
	}
