<?php
	/*
		This class include the operation when instructor select TA
	 */
	class instructor_TA_Pref extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_ins_ta($info_array)
		{
			$ta_id = $this->db->escape($info_array['TA_ID']);
			$ins_id = $this->db->escape($info_array['Instructor_ID']);
			$course_id = $this->db->escape($info_array['Course_ID']);
			$term = $this->db->escape($info_array['Term']);
			$year = $this->db->escape($info_array['Year']);
			$pref = $this->db->escape($info_array['Preference']);

			$sql = "INSERT INTO Instructor_TA_Pref
					(TA_ID, Instructor_ID, Course_ID, Term, Year, Preference) values
					($ta_id, $ins_id, $course_id, $term, $year, $pref)";
					
			return $this->db->query($sql);
		}

		public function insert_ins_ta_pref($info_array)
		{
			return $this->db->insert('Instructor_TA_Pref', $info_array);
		}

		
	}
/*This is the end of this file*/