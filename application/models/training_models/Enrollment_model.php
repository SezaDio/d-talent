<?php

/**
 * Model Enrollment, mewakili pendaftaran member talent ke course
 * @author Nur Hardyanto
 *
 */
class Enrollment_model extends CI_Model {
	const ENROLLMENT_TABLE = "enrollment";
	const COURSE_TABLE = SRV_TBL_COURSES;
	
	public function enroll_course($idCourse, $idMember, $idSchedule, $idInvoice, $newStatus = null, $extraData = null) {
		$currentDate = date('Y-m-d H:i:s');
		
		$enrollmentData = array(
				'id_course'		=> $idCourse,
				'id_member'		=> $idMember,
				'status'		=> ($newStatus === null ? SRV_STATUS_PENDING : $newStatus),
				'id_schedule'	=> $idSchedule,
				'id_invoice'	=> $idInvoice,
				'date_assigned'	=> $currentDate
		);
		
		$queryResult = $this->db->insert($this::ENROLLMENT_TABLE, $enrollmentData);
		return $queryResult;
	}
	
	public function get_course_enrollment($idMember, $idCourse) {
		$this->db->from($this::ENROLLMENT_TABLE);
		$this->db->where(['id_member' => $idMember, 'id_course' => $idCourse]);
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		
		return $queryResult->row();
	}
	
	private function _apply_enrollmentfilter($idMember, $statusFilter = null, $extendFilter = null) {
		$this->db->where(array($this::ENROLLMENT_TABLE.'.id_member' => $idMember));
		
		if ($statusFilter !== null) {
			$this->db->where(array($this::ENROLLMENT_TABLE.'.status' => $statusFilter));
		}
	}
	public function get_courses_by_member($idMember, $statusFilter = null, $extendFilter = null) {
		$this->db->select( $this::ENROLLMENT_TABLE.'.*, '.$this::ENROLLMENT_TABLE.'.status AS enroll_status' );
		$this->db->from($this::ENROLLMENT_TABLE);
		
		$this->_apply_enrollmentfilter($idMember, $statusFilter, $extendFilter);
		
		//-- Add field here
		$this->db->select( $this::COURSE_TABLE.'.*' );
		$this->db->join($this::COURSE_TABLE, $this::COURSE_TABLE.'.id_course='.$this::ENROLLMENT_TABLE.'.id_course');
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->result();
	}
	
	public function count_courses_by_member($idMember, $statusFilter = null, $extendFilter = null) {
		$this->_apply_enrollmentfilter($idMember, $statusFilter, $extendFilter);
		return $this->db->count_all_results( $this::ENROLLMENT_TABLE );
	}
	
	/**
	 * Count cuurse or schedule participants. If id_course specified in $configFilter, the function will list
	 * 	the count of schedule participants, otherwise return the count of course participants
	 * @param array $configFilter Filter configuration. Available keys:<br />
	 * 	<code>id_course</code>: ID course<br />
	 * 	<code>status</code>: Enrollment status<br />
	 * 
	 * @return NULL|Array Return associative array [ID} =&gt; [Count], or NULL if query failed
	 */
	public function count_course_participants($configFilter = null) {
		$this->db->from($this::ENROLLMENT_TABLE);
		
		if (isset($configFilter['id_course'])) {
			$this->db->where(['id_course' => $configFilter['id_course']]);
			$this->db->select('id_schedule AS id_item, COUNT(*) AS participants');
			$this->db->group_by('id_schedule');
		} else {
			$this->db->select('id_course AS id_item, COUNT(*) AS participants');
			$this->db->group_by('id_course');
		}
		
		if (isset($configFilter['status'])) {
			$this->db->where(['status' => $configFilter['status']]);
		}
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		$tmpCountData = $queryResult->result();
		
		$countData = [];
		foreach ($tmpCountData as $itemCountData) {
			$countData[$itemCountData->id_item] = $itemCountData->participants;
		}
		
		return $countData;
	}
	
	/**
	 * Get course/schedule participants.
	 * @param int $idCourse ID Course
	 * @param int $idSchedule ID schedule
	 * @param bool $joinMemberData Join the result with login data? Optional. Default: TRUE
	 * @return NULL
	 */
	public function get_course_participants($idCourse, $idSchedule = null, $joinMemberData = true) {
		$this->db->select($this::ENROLLMENT_TABLE.'.*');
		$this->db->from($this::ENROLLMENT_TABLE);
		$this->db->where(array('id_course' => $idCourse));
		
		if ($idSchedule !== null) $this->db->where(array('id_schedule' => $idSchedule));
		
		if ($joinMemberData) {
			$this->db->select(['fullname','date_registered']);
			$this->db->join(SRV_TBL_LOGINDATA, SRV_TBL_LOGINDATA.'.id_member='.$this::ENROLLMENT_TABLE.'.id_member');
		}
		
		$queryResult = $this->db->get();
		
		if (!$queryResult) return null;
		return $queryResult->result();
	}
	
	/**
	 * Set enrollment data by filter config
	 * @param array $configFilter Valid key is id_invoice
	 * @param array $updateData Update data, key is based on the database
	 * @return boolean|NULL Return NULL if query failed or filter is invalid, return non-NULL if succeed
	 */
	public function set_enrollmentdata_by_filter($configFilter, $updateData) {
		if (isset($configFilter['id_invoice'])) {
			$this->db->where('id_invoice', $configFilter['id_invoice']);
		} else {
			return null; // No valid filter specified
		}
			
		$this->db->set($updateData);
		$queryResult = $this->db->update($this::ENROLLMENT_TABLE);
		return $queryResult;
	}
}