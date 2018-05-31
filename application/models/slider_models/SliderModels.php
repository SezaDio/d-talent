<?php

	class SliderModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		//Mengambil data slider
		function get_slider()
		{
			$query = $this->db->query("SELECT * FROM `slider`");
		
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
		
		//Mempublish slider
		function publish_slider($id_slider)
		{
			$data = array(
				'status' => 1	
			);
			$this->db->where('id_slider',$id_slider);
			$this->db->update('slider',$data);
		}
		
		//Me unpublish slider
		function unpublish_slider($id_slider)
		{
			$data = array(
				'status' => 2	
			);
			$this->db->where('id_slider',$id_slider);
			$this->db->update('slider',$data);
		}
		
		//Menghapus data slider
		function delete_slider($id_slider)
		{
			$this->db->where('id_slider',$id_slider);
			$this->db->delete('slider');
		}

		//Select slider by id slider
		function select_by_id_slider($id_slider)
		{
			$this->db->select('*');
			$this->db->from('slider');
			$this->db->where('id_slider',$id_slider);

			return $this->db->get();
		}
		
	}
