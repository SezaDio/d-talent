<?php

	class TalentCVEducationModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all($id_talent)
		{
			$query = $this->db->order_by('to_year', 'DESC')->get_where('talent_cv_education', array('id_talent' => $id_talent));
			return $query->result();
		}

		public function create($id_talent)
		{
			$data = array(
				'id_talent'   => $id_talent,
				'school' 	  => $this->input->post('school'),
				'degree' 	  => $this->input->post('degree'),
				'field_of_study' => $this->input->post('field_of_study'),
				'grade' 	  => $this->input->post('grade'),
				'activity' 	  => $this->input->post('activity'),
				// add -01-01 because the month & the day is ignored
				'from_year'   => $this->input->post('from_year') . '-01-01',
				'to_year' 	  => $this->input->post('to_year') . '-01-01',
				'description' => $this->input->post('description'),
			);
			
			return $this->db->insert('talent_cv_education', $data);
		}

		public function edit($id_talent_cv_education)
		{
			$query = $this->db->get_where('talent_cv_education', array('id_talent_cv_education' => $id_talent_cv_education));
			// get 1 object from query
			return $query->row();
		}

		public function update($id_talent_cv_education)
		{
			$data = array(
				'school' 	  => $this->input->post('school'),
				'degree' 	  => $this->input->post('degree'),
				'field_of_study' => $this->input->post('field_of_study'),
				'grade' 	  => $this->input->post('grade'),
				'activity' 	  => $this->input->post('activity'),
				// add -01-01 because the month & the day is ignored
				'from_year'   => $this->input->post('from_year') . '-01-01',
				'to_year' 	  => $this->input->post('to_year') . '-01-01',
				'description' => $this->input->post('description'),
			);
			
			$this->db->where('id_talent_cv_education', $id_talent_cv_education);
			return $this->db->update('talent_cv_education', $data);
		}

		public function delete($id_talent_cv_education)
		{
			$this->db->where('id_talent_cv_education', $id_talent_cv_education);
			return $this->db->delete('talent_cv_education');
		}
	}