<?php

	class CompanyOverviewModel extends CI_Model
	{
		function construct()
		{
			parent::__construct();
		}

		public function get_data_cover_by_id($id_company)
		{
			$this->db->select('company_cover');
			$this->db->from('company');
			$this->db->where('id_company', $id_company);

			return $this->db->get();
		}

		public function get_data_company_by_id($id_company)
		{
			$this->db->select('*');
			$this->db->from('company');
			$this->db->where('id_company', $id_company);

			return $this->db->get();
		}
	}