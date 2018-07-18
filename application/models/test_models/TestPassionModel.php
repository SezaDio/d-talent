<?php

	class TestPassionModel extends CI_Model
	{
		function construct()
		{
			parent::_construct();
		}

		public function get_all()
		{
			$query = $this->db->get('test_passion');
			return $query->result();
		}

		public function insert_batch()
		{
			// get data
			$array_category  = $this->input->post('category[]');
			$array_statement = $this->input->post('statement[]');

			// create data for insert_batch
			$data = [[]];
			foreach ($array_category as $key => $category) {
				$data[$key]['category']  = $category;
				$data[$key]['statement'] = $array_statement[$key];
			}

			return $this->db->insert_batch('test_passion', $data);
		}

		public function find($id_test_passion)
		{
			$query = $this->db->get_where('test_passion', ['id_test_passion'=>$id_test_passion]);
			// get 1 object from query
			return $query->row();
		}

		public function update($id_test_passion)
		{
			$data = array(
				'category'  => $this->input->post('category'),
				'statement' => $this->input->post('statement'),
			);
			
			$this->db->where('id_test_passion', $id_test_passion);
			return $this->db->update('test_passion', $data);
		}

		public function delete($id_test_passion)
		{
			$this->db->where('id_test_passion', $id_test_passion);
			return $this->db->delete('test_passion');
		}
	}