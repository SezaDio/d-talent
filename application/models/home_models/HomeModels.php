<?php

	class HomeModels extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		function login_member($username, $password) {
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$query=$this->db->get('member');
			if ($query->num_rows()>0) {
				return $query->row_array();
			}
			else {
				return FALSE;
			}
		}
		
		//Mengambil data slider slider
		function get_data_slider()
		{
			$query = $this->db->query("SELECT * FROM `header` WHERE status='1'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}	

		function get_top_event()
		{
			$query = $this->db->query("SELECT * FROM `coming` WHERE top_event='1'");
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}	

		function get_new_event($number, $offset){
			$query = $this->db->order_by('tanggal_posting','DESC')->select('*')->where('status',1)->get('coming', $number, $offset);
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		function get_event($number, $offset)
		{
			$query = $this->db->order_by('tgl_mulai','ASC')->select('*')->where('status',1)->get('coming', $number, $offset);
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}

		//get jumlah data new event
		function jumlah_data_new_event()
		{
			return $this->db->get('coming')->num_rows();
		}
		
		function get_ngerti_rak(){
			$query = $this->db->order_by('id_wow','DESC')->select('*')->get('wow');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		function get_nama_challenge(){
			$query = $this->db->query("SELECT * FROM `nama_challenge` WHERE id_nama_challenge=(SELECT max(id_nama_challenge) FROM `nama_challenge`)");
		
			return $query;
		}
		
		function get_challenge(){
			$query = $this->db->order_by('id_challenge','DESC')->select('*')->get('challenge');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		function get_artikel(){
			$query = $this->db->limit(5)->order_by('id_artikel','DESC')->select('*')->get('artikel');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		
		function get_event_byid($id_coming)
		{
			$query = $this->db->where('id_coming',$id_coming)->get('coming');
				
			return $query->row_array();
		}

		function get_tiket_byid($id_coming)
		{
			$query = $this->db->where('id_event',$id_coming)->get('tiket');
				
			return $query->result_array();
		}

		function jumlah_testimoni($id_coming)
		{
			$query = $this->db->where('id_event',$id_coming)->get('testimoni');
				
			return $query->num_rows();
		}
		
		function get_press_release($id_coming)
		{
			$query = $this->db->where('id_event',$id_coming)->get('news');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		function jumlah_komentar($id_artikel)
		{
			$query = $this->db->where('id_artikel',$id_artikel)->get('komentar');
				
			return $query->num_rows();
		}
		
		function get_testimoni($id_coming)
		{
			$query = $this->db->select('testimoni.id_testimoni, testimoni.id_member, testimoni.isi_testimoni, testimoni.tgl_posting, testimoni.id_event, member.nama_member, member.path_foto')->join('member','testimoni.id_member = member.id_member','left')->where('testimoni.id_event',$id_coming)->get('testimoni');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		function get_komentar($id_artikel)
		{
			$query = $this->db->select('komentar.id_komentar, komentar.id_member, komentar.isi_komentar, komentar.tgl_posting, komentar.id_artikel, member.nama_member, member.path_foto')->join('member','komentar.id_member = member.id_member','left')->where('komentar.id_artikel',$id_artikel)->get('komentar');
		
			$indeks = 0;
			$result = array();
			
			foreach ($query->result_array() as $row)
			{
				$result[$indeks++] = $row;
			}
		
			return $result;
		}
		
		function get_head_news()
		{
			$query = $this->db->query("SELECT * FROM `news` WHERE id_news=(SELECT max(id_news) FROM `news`)");
		
			return $query;
		}

		function get_head_comming()
		{
			$query = $this->db->query("SELECT * FROM `coming` WHERE id_coming=(SELECT max(id_coming) FROM `coming`)");
		
			return $query;
		}	

		function get_head_shopping()
		{
			$query = $this->db->query("SELECT * FROM `shopping` WHERE id_produk=(SELECT max(id_produk) FROM `shopping`)");
		
			return $query;
		}

		function get_news_youther()
		{
			$query = $this->db->query("SELECT * FROM `news` WHERE id_news=(SELECT max(id_news) FROM `news` WHERE jenis_news='2')");
			
			return $query;
		}

		function get_news_recommend()
		{
			$query = $this->db->query("SELECT * FROM `news` WHERE id_news=(SELECT max(id_news) FROM `news` WHERE jenis_news='3')");
			
			return $query;
		}
		
		function get_news_community()
		{
			$query = $this->db->query("SELECT * FROM `news` WHERE id_news=(SELECT max(id_news) FROM `news` WHERE jenis_news='4')");
			
			return $query;
		}
		
		function get_news_SM()
		{
			$query = $this->db->query("SELECT * FROM `news` WHERE id_news=(SELECT max(id_news) FROM `news` WHERE jenis_news='6')");
			
			return $query;
		}

		function update_hits($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		function update_like($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
	}
