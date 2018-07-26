<?php

	class CompanyNotificationModel extends CI_Model
	{
		function construct()
		{
			parent::__construct();
		}
		
		public function get_total() 
	    {
	        return $this->db->count_all("job_notification");
	    }

		public function get_all($id_company)
		{
			$this->db->select('job_notification.*, talent.*');
			$this->db->from('job_notification');
			$this->db->where('job_notification.id_company', $id_company);
			$this->db->join('talent', 'talent.id_talent = job_notification.id_talent', 'left');
			$this->db->order_by('notification_date', 'DESC');

			return $this->db->get()->result();
		}

		public function create($id_company)
		{
			$data = array(
				'id_company'  => $id_company,

			);
			
			return $this->db->insert('job_notification', $data);
		}

		public function edit($id_notification)
		{
			$query = $this->db->get_where('job_notification', array('id_notification' => $id_notification));
			// get 1 object from query
			return $query->row();
		}

		public function update($id_notification, $image_filename=null)
		{
			$data = array(
				// ...
			);
			
			$this->db->where('id_notification', $id_notification);
			return $this->db->update('job_notification', $data);
		}

		public function delete($id_notification)
		{
			$this->db->where('id_notification', $id_notification);
			return $this->db->delete('job_notification');
		}
	}