<?php

	class TestCharacterModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all()
		{
			$query = $this->db->get('test_character');
			return $query->result();
		}

		public function store()
		{
			$data = array(
				'question' => $this->input->post('question'),
				'option_a' => $this->input->post('option_a'),
				'option_b' => $this->input->post('option_b')
			);
			
			return $this->db->insert('test_character', $data);
		}

		public function find($id_test_character)
		{
			$query = $this->db->get_where('test_character', ['id_test_character'=>$id_test_character]);
			// get 1 object from query
			return $query->row();
		}

		public function update($id_test_character)
		{
			$data = array(
				'question' => $this->input->post('question'),
				'option_a' => $this->input->post('option_a'),
				'option_b' => $this->input->post('option_b')
			);
			
			$this->db->where('id_test_character', $id_test_character);
			return $this->db->update('test_character', $data);
		}

		public function delete($id_test_character)
		{
			$this->db->where('id_test_character', $id_test_character);
			return $this->db->delete('test_character');
		}
	}