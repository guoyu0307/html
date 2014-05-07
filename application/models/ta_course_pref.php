<?php
	/*
		This class includes the operation when TA select course in database
	 */
	class ta_course_pref extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_ta_course($info_array)
		{
			$ta_id = $this->db->escape($info_array['TA_ID']);
			$course_id = $this->db->escape($info_array['Course_ID']);
			$year = $this->db->escape($info_array['Year']);
			$term = $this->db->escape($info_array['Term']);
			$pref = $this->db->escape($info_array['Preference']);

			$sql = "INSERT INTO TA_Course_Pref
					(TA_ID, Course_ID, Year, Term, Preference) values
					($ta_id, $course_id, $year, $term, $pref)";

			return $this->db->query($sql);
		}
	}
/*This is the end of this file*/