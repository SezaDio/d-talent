<?php

	class headerModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		//Mengambil data header header
		function get_header_event()
		{
			$query = $this->db->query("SELECT * FROM `header` WHERE jenis_header = 1 ");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}		
		
		function get_header_nonevent()
		{
			$query = $this->db->query("SELECT * FROM `header` WHERE jenis_header = 0 ");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}	
		
		function get_nama_header()
		{
			$query = $this->db->query("SELECT * FROM `nama_header` WHERE id_nama_header=(SELECT max(id_nama_header) FROM `nama_header`)");
			
			return $query->row_array();
		}
		
		function get_event(){
			$query = $this->db->query("SELECT * FROM `coming`");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		//Mempublish header
		function publish_header($id_header)
		{
			$data = array(
				'status' => 1	
			);
			$this->db->where('id_header',$id_header);
			$this->db->update('header',$data);
		}
		
		//Me unpublish header
		function unpublish_header($id_header)
		{
			$data = array(
				'status' => 2	
			);
			$this->db->where('id_header',$id_header);
			$this->db->update('header',$data);
		}
		
		//Menghapus data  header header
		function delete_header($id_header)
		{
			$this->db->where('id_header',$id_header);
			$this->db->delete('header');
		}

		//Select header by id header
		function select_by_id_header($id_header)
		{
			$this->db->select('*');
			$this->db->from('header');
			$this->db->where('id_header',$id_header);

			return $this->db->get();
		}
		
		//Menambah data youth header
		function add_data_header($data_header)
		{
			$this->db->insert('header', $data_header);
		}
	}
