<?php

	class DashboardModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		//Mengambil data jumlah approved event
		function get_jumlah_job_vacancy()
		{
			$query = $this->db->query("SELECT * FROM `job_vacancy`");
		
			$result = $query->num_rows();
			
			return $result;
		}

		//Mengambil data jumlah pending event
		function get_jumlah_company_member()
		{
			$query = $this->db->query("SELECT * FROM `company`");
		
			$result = $query->num_rows();
			
			return $result;
		}
		//Mengambil data jumlah pesan
		function get_jumlah_pesan()
		{
			$query = $this->db->query("SELECT * FROM `hubungi_kami`");
		
			$result = $query->num_rows();
			
			return $result;
		}

		
		//Mengambil data jumlah pending event
		function get_jumlah_talent_member()
		{
			$query = $this->db->query("SELECT * FROM `talent`");
		
			$result = $query->num_rows();
			
			return $result;
		}

		//Mengambil data coming coming terdekat
		function get_data_coming_terdekat()
		{
			$query = $this->db->query("SELECT * FROM `coming` WHERE `tgl_mulai` >= CURRENT_DATE() ORDER BY `tgl_mulai` ASC LIMIT 5");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//Mengambil data jumlah member untuk grafik
		function get_data_jumlah_member()
		{

		    $query =$this->db->query("SELECT YEARWEEK(company_date_join) as minggu, COUNT(*) as jumlah FROM company GROUP BY minggu");

			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$row['minggu']] = $row['jumlah'];
			}
		
			return $result;
		}	

		//Mengambil data jumlah member untuk grafik
		function get_data_jumlah_talent_member()
		{

		    $query =$this->db->query("SELECT YEARWEEK(talent_date_join) as minggu, COUNT(*) as jumlah FROM talent GROUP BY minggu");

			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$row['minggu']] = $row['jumlah'];
			}
		
			return $result;
		}	
	}