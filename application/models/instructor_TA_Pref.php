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

		public function search_all_pref($year, $term)
		{
			$sql = "SELECT * FROM Instructor_TA_Pref WHERE Year = ? AND Term = ? ORDER BY Preference";
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
					$store[$row->Course_ID][$row->Preference][] = $row->TA_ID;
				}
				
				return $store;
			}
		}

		public function exist($ta_id, $ins_id, $course_id, $year, $term, $pref)
		{
			$sql = "SELECT * FROM Instructor_TA_Pref WHERE TA_ID = ? AND Instructor_ID = ? AND Course_ID = ? AND 
					Year = ? AND Term = ?";
			$result = $this->db->query($sql, array($ta_id, $ins_id, $course_id, $year, $term));

			if($result->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		
	}
/*This is the end of this file*/