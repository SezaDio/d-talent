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
		
	}
