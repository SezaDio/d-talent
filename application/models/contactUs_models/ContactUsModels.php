<?php

	class ContactUsModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}		

		//Menambah data youth pendaftar
		function kirim_pesan($data_pesan)
		{
			$this->db->insert('hubungi_kami', $data_pesan);
		}

		function get_data_pesan()
		{
			$query = $this->db->query("SELECT * FROM `hubungi_kami`");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//Menghapus data pesan
		function delete_pesan($id_pesan)
		{
			$this->db->where('id_pesan',$id_pesan);
			$this->db->delete('hubungi_kami');
		}

		function select_data_pesan_byId($id_pesan)
		{
			$this->db->select('*');
			$this->db->from('hubungi_kami');
			$this->db->where('id_pesan',$id_pesan);

			return $this->db->get();
		}
	}
