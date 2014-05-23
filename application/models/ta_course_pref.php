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

		public function exist($ta_id, $course_id, $year, $term)
		{
			$sql = "SELECT * FROM TA_Course_Pref WHERE TA_ID = ? AND Course_ID = ? AND Year = ? AND Term = ?";
			$result = $this->db->query($sql, array($ta_id, $course_id, $year, $term));
			if($result->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function search_all_pref($year, $term)
		{
			$sql = "SELECT * FROM TA_Course_Pref WHERE Year = ? AND Term = ?";
			$result = $this->db->query($sql, array($year, $term));
			if($result->num_rows() < 1)
			{
				return null;
			}
			else
			{
				$store = array();
				foreach ($result->result() as $row) 
				{
					# code...
					$store[$row->TA_ID][] = array($row->Course_ID => $row->Preference);
				}
				return $store;
			}
		}
	}
/*This is the end of this file*/