<?php

	class CompanyJobVacancyModel extends CI_Model
	{
		function construct()
		{
			parent::__construct();
		}

		public function get_all($id_company)
		{
			$this->db->select('*');
			$this->db->from('job_vacancy');
			$this->db->where('id_company', $id_company);
			$this->db->order_by('publish_date', 'DESC');

			return $this->db->get()->result();
		}

		public function create($id_company, $job_required_skill)
		{
			$data = array(
				'id_company'  		 => $id_company,
				'job_title' 	  	 => $this->input->post('job_title'),
				'job_type' 	  		 => $this->input->post('job_type'),
				'job_role' 	  		 => $this->input->post('job_role'),
				'job_category' 	  	 => $this->input->post('job_category'),
				'job_province_location_id' => $this->input->post('job_province_location_id'),
				'job_city_location_id' 	   => $this->input->post('job_city_location_id'),
				'job_date_start' 	 => $this->input->post('job_date_start'),
				'job_date_end' 	  	 => $this->input->post('job_date_end'),
				'job_description' 	 => $this->input->post('job_description'),
				'job_required_skill' => $job_required_skill,
				// 'publish_date' auto fill by MySQL
			);
			
			return $this->db->insert('job_vacancy', $data);
		}

		public function edit($id_job)
		{
			$query = $this->db->get_where('job_vacancy', array('id_job' => $id_job));
			// get 1 object from query
			return $query->row();
		}

		public function update($id_job, $job_required_skill)
		{
			$data = array(
				'job_title' 	  	 => $this->input->post('job_title'),
				'job_type' 	  		 => $this->input->post('job_type'),
				'job_role' 	  		 => $this->input->post('job_role'),
				'job_category' 	  	 => $this->input->post('job_category'),
				'job_province_location_id' => $this->input->post('job_province_location_id'),
				'job_city_location_id' 	   => $this->input->post('job_city_location_id'),
				'job_date_start' 	 => $this->input->post('job_date_start'),
				'job_date_end' 	  	 => $this->input->post('job_date_end'),
				'job_description' 	 => $this->input->post('job_description'),
				'job_required_skill' => $job_required_skill,
			);
			
			$this->db->where('id_job', $id_job);
			return $this->db->update('job_vacancy', $data);
		}

		public function delete($id_job)
		{
			$this->db->where('id_job', $id_job);
			return $this->db->delete('job_vacancy');
		}
	}