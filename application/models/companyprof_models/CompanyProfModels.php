<?php

	class CompanyProfModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}
	
		function get_testimoni(){
			$query = $this->db->order_by('id_testimoni','DESC')->select('*')->get('testimoni');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		//get big slider
		function get_slider()
		{
			$query = $this->db->order_by('id_slider','DESC')->select('*')->get('slider');
			//$query = $this->db->query("SELECT * FROM `slider` WHERE tipe=2 ORDER BY id_slider DESC");
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
			//var_dump($result);
			//exit();
			return $result;
		}

		//Mengambil data slider (Kecil)
		function get_slider_small()
		{
			$query = $this->db->query("SELECT * FROM `slider` WHERE type=2 ORDER BY id_slider DESC");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
	}
