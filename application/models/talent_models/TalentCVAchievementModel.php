<?php

	class TalentCVAchievementModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all($id_talent)
		{
			$query = $this->db->order_by('year', 'DESC')->get_where('talent_cv_achievement', array('id_talent' => $id_talent));
			return $query->result();
		}

		public function create($id_talent)
		{
			$associated_education = $this->input->post('associated_education');
			$associated_work 	  = $this->input->post('associated_work');

			$data = array(
				'id_talent'   => $id_talent,
				'title' 	  => $this->input->post('title'),
				// give null if form is empty
				// 'associated_education' => !empty($associated_education) ? $associated_education : null,
				// 'associated_work' 	   => !empty($associated_work) ? $associated_work : null,
				'associated_education' => null,
				'associated_work' 	   => null,

				'issuer' 	  => $this->input->post('issuer'),
				'month'   	  => $this->input->post('month'),
				'year' 	  	  => $this->input->post('year'),
				'description' => $this->input->post('description'),
			);
			
			return $this->db->insert('talent_cv_achievement', $data);
		}

		public function edit($id_talent, $id_talent_cv_achievement)
		{
			$query = $this->db->get_where('talent_cv_achievement', array('id_talent'=>$id_talent, 'id_talent_cv_achievement' => $id_talent_cv_achievement));
			// get 1 object from query
			return $query->row();
		}

		public function update($id_talent, $id_talent_cv_achievement)
		{
			$associated_education = $this->input->post('associated_education');
			$associated_work 	  = $this->input->post('associated_work');

			$data = array(
				'title' 	  => $this->input->post('title'),
				// give null if form is empty
				// 'associated_education' => !empty($associated_education) ? $associated_education : null,
				// 'associated_work' 	   => !empty($associated_work) ? $associated_work : null,
				'associated_education' => null,
				'associated_work' 	   => null,

				'issuer' 	  => $this->input->post('issuer'),
				'month'   	  => $this->input->post('month'),
				'year' 	  	  => $this->input->post('year'),
				'description' => $this->input->post('description'),
			);
			
			$this->db->where('id_talent', $id_talent);
			$this->db->where('id_talent_cv_achievement', $id_talent_cv_achievement);
			return $this->db->update('talent_cv_achievement', $data);
		}

		public function delete($id_talent, $id_talent_cv_achievement)
		{
			$this->db->where('id_talent', $id_talent);
			$this->db->where('id_talent_cv_achievement', $id_talent_cv_achievement);
			return $this->db->delete('talent_cv_achievement');
		}
	}