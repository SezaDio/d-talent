<?php

	class TestimoniModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		//Mengambil data testimoni
		function get_data_testimoni()
		{
			
			$query = $this->db->order_by('tanggal_posting','DESC')->select('*')->get('testimoni');
		
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
		
		//Menghapus data testimoni
		function delete_testimoni($id_testimoni)
		{
			$this->db->where('id_testimoni',$id_testimoni);
			$this->db->delete('testimoni');
		}

		//Select data Testimoni by id testimoni
		function select_by_id_testimoni($id_testimoni)
		{
			$this->db->select('*');
			$this->db->from('testimoni');
			$this->db->where('id_testimoni',$id_testimoni);

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
