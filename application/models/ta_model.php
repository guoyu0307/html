<?php
	/*
		this class includes the function for TA in database.
	 */
	class ta_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		//convert the character
		public function escape_data(&$info)
		{
			foreach ($info as $key => $value)
			{
				$value = $this->db->escape($value);
				$info[$key] = $value;
			}

		}

		/*Insert by normal methord*/
		public function insert_ta($info_array)
		{
			$ta_name = $this->db->escape($info_array['TA_Name']);
			$ta_email = $this->db->escape($info_array['TA_Email']);
			$ta_password = $this->db->escape($info_array['TA_Password']);
			$ta_stuID = $this->db->escape($info_array['TA_StudentID']);
			$ta_enroll_Year = $this->db->escape($info_array['TA_Enrollment_Year']);
			$ta_enroll_Term = $this->db->escape($info_array['TA_Enrollment_Term']);
			$ta_program = $this->db->escape($info_array['TA_Program']);
			$ta_advisor = $this->db->escape($info_array['TA_Advisor']);
			$ta_comment = $this->db->escape($info_array['TA_Comment']);

			$sql = "INSERT INTO TA_Information
					(TA_Name, TA_Email, TA_Password, TA_StudentID, TA_Enrollment_Year, TA_Enrollment_Term, TA_Program, TA_Advisor, TA_Comment) values
					($ta_name, $ta_email, $ta_password, $ta_stuID, $ta_enroll_Year, $ta_enroll_Term, $ta_program, $ta_advisor, $ta_comment)";

			return $this->db->query($sql);
		}

		/*Insert by active record class*/
		public function insert_ta_AR($info_array)
		{
			$this->escape_data($info_array);
			return $this->db->insert('TA_Information',$info_array);
		}

		/*Search TA information*/
		public function search_TA($TA_ID)
		{
			$sql = "SELECT * FROM TA_Information WHERE TA_ID = ?";
			$result = $this->db->query($sql, array($TA_ID));

			return $result;
		}

		public function talogin($email, $password)
		{
			$sql = "SELECT * FROM TA_Information WHERE TA_Email = ?";
			$result = $this->db->query($sql, array($email));

			if($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) 
				{
					# code...
					if($row->TA_Password == $password)
					{
						$newsession = array('TA_ID' => $row->TA_ID,
											'TA_Name' => $row->TA_Name,
											'TA_Email' => $email,
											'TA_StudentID' => $row->TA_StudentID,
											'TA_Enrollment_Year' => $row->TA_Enrollment_Year,
											'TA_Enrollment_Term' => $row->TA_Enrollment_Term,
											'TA_Program' => $row->TA_Program,
											'TA_Advisor' => $row->TA_Advisor,
											'TA_Comment' => $row->TA_Comment);
						$this->session->set_userdata($newsession);

						return true;
					}
					else
					{
						return false;
					}
				}
			}
			else
			{
				return false;
			}
		}

		public function search_all_ta($num, $offset)
		{
			if($offset == null)	$offset = 0;
			$sql = "SELECT * FROM TA_Information LIMIT $offset, $num";
			$query = $this->db->query($sql);
    		return $query;
		}

		public function search_ta_email($email)
		{
			$sql = "SELECT * FROM TA_Information WHERE TA_Email = ?";
			$result = $this->db->query($sql, array($email));

			return $result;
		}

		public function search_by_skill($skill, $degree)
		{
			$sql = "SELECT * FROM TA_Information WHERE $skill >= ? AND $skill < 4";
			$result = $this->db->query($sql, array($degree));

			return $result;
		}

	}

/*This is the end of this file*/
/*This class is used to insert TA information into database*/

