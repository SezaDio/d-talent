<?php
/**
 * Facility model, represents course facilities
 * @author Nur Hardyanto
 *
 */
class Facility_model extends CI_Model {
	const FACILITY_TABLE = "facilities";
	const COURSE_ASSIGN_TABLE = "course_facilities";
	
	/**
	 * Fetch course facilities
	 * @param int $idCourse ID course
	 * @return Object|NULL Instructor row object array. NULL if query failed
	 */
	public function get_course_facilities($idCourse, $filterOption = null) {
		$this->db->from($this::COURSE_ASSIGN_TABLE);
		$this->db->where(array($this::COURSE_ASSIGN_TABLE.'.id_course' => $idCourse));
		
		if ($filterOption !== null) {
			//-- Included filter
			if (isset($filterOption['included'])) {
				$tmpValue = ($filterOption['included'] ? 1 : 0);
				$this->db->where(array($this::COURSE_ASSIGN_TABLE.'.included' => $tmpValue));
			}
			
			//-- Default filter
			if (isset($filterOption['default'])) {
				$tmpValue = ($filterOption['default'] ? 1 : 0);
				$this->db->where(array($this::COURSE_ASSIGN_TABLE.'.default' => $tmpValue));
			}
		}
		
		$this->db->join($this::FACILITY_TABLE, $this::FACILITY_TABLE.'.id_facility='.$this::COURSE_ASSIGN_TABLE.'.id_facility');
		
		$queryResult = $this->db->get();
		if (!$queryResult) return null;
		return $queryResult->result();
	}
}