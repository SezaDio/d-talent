<?php

	class TalentCVCourseModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all($id_talent)
		{
			$query = $this->db->order_by('year', 'DESC')->get_where('talent_cv_course', array('id_talent' => $id_talent));
			return $query->result();
		}

		public function create($id_talent)
		{
			$associated_education = $this->input->post('associated_education');
			$associated_work 	  = $this->input->post('associated_work');

			$data = array(
				'id_talent'   => $id_talent,
				'title' 	  => $this->input->post('title'),
				// give null if field is empty
				'associated_education' => !empty($associated_education) ? $associated_education : null,
				'associated_work' 	   => !empty($associated_work) ? $associated_work : null,
				'organizer' 	  => $this->input->post('organizer'),
				// add -01-01 because day & month are ignored
				'year' 	  => $this->input->post('year') . '-01-01',
			);
			
			return $this->db->insert('talent_cv_course', $data);
		}

		public function edit($id_talent_cv_course)
		{
			$query = $this->db->get_where('talent_cv_course', array('id_talent_cv_course' => $id_talent_cv_course));
			// get 1 object from query
			return $query->row();
		}

		public function update($id_talent_cv_course)
		{
			$associated_education = $this->input->post('associated_education');
			$associated_work 	  = $this->input->post('associated_work');

			$data = array(
				'title' 	  => $this->input->post('title'),
				// give null if field is empty
				'associated_education' => !empty($associated_education) ? $associated_education : null,
				'associated_work' 	   => !empty($associated_work) ? $associated_work : null,
				'organizer' 	  => $this->input->post('organizer'),
				// add -01-01 because day & month are ignored
				'year' 	  => $this->input->post('year') . '-01-01',
			);

			$this->db->where('id_talent_cv_course', $id_talent_cv_course);
			return $this->db->update('talent_cv_course', $data);
		}

		public function delete($id_talent_cv_course)
		{
			$this->db->where('id_talent_cv_course', $id_talent_cv_course);
			return $this->db->delete('talent_cv_course');
		}
	}