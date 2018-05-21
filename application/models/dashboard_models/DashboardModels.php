<?php

	class DashboardModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		/*Mengambil data jumlah approved event
		function get_jumlah_approved_event()
		{
			$query = $this->db->query("SELECT * FROM `coming` WHERE status='1'");
		
			$result = $query->num_rows();
			
			return $result;
		}

		//Mengambil data jumlah pending event
		function get_jumlah_pending_event()
		{
			$query = $this->db->query("SELECT * FROM `coming` WHERE status='2'");
		
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
		function get_jumlah_pending_pepak()
		{
			$query = $this->db->query("SELECT * FROM `pepak` WHERE status='2'");
		
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

		    $query =$this->db->query("SELECT YEARWEEK(date_join) as minggu, COUNT(*) as jumlah FROM member GROUP BY minggu");

			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$row['minggu']] = $row['jumlah'];
			}
		
			return $result;
		} */	
	}