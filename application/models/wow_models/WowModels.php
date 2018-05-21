<?php

	class WowModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		//Mengambil data produk wow
		function get_data_wow()
		{
			
			$query = $this->db->order_by('tanggal_posting','DESC')->select('*')->get('wow');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		//Menambah data youth WOW
		function add_data_wow($data_wow)
		{
			$this->db->insert('wow', $data_wow);
		}
		
		//Menghapus data  wow
		function delete_wow($id_wow)
		{
			$this->db->where('id_wow',$id_wow);
			$this->db->delete('wow');
		}

		//Select data WOW by id wow
		function select_by_id_wow($id_wow)
		{
			$this->db->select('*');
			$this->db->from('wow');
			$this->db->where('id_wow',$id_wow);

			return $this->db->get();
		}

		//get jumlah data ngerti rak
		function jumlah_data_ngerti_rak()
		{
			return $this->db->get('wow')->num_rows();
		}

		function get_ngerti_rak($number, $offset)
		{
			$query = $this->db->order_by('tanggal_posting','DESC')->select('*')->get('wow', $number, $offset);
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
	}
