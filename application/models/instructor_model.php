<?php
	/*
		This class includes the function for Instructor in database.
	 */
	class instructor_model extends CI_Model
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

		/*insert the instructor information by normal funtion*/
		public function insert_instructor($info_array)
		{	
			$ins_name = $this->db->escape($info_array['Instructor_Name']);
			$ins_email = $this->db->escape($info_array['Instructor_Email']);
			$ins_pas = $this->db->escape($info_array['Instructor_Password']);
					
			$sql = "INSERT INTO Instructor_Information 
					(Instructor_Name, Instructor_Email, Instructor_Password) values 
					($ins_name, $ins_email, $ins_pas)";
			
			return $this->db->query($sql);
			
			//$table_name = 'Instructor_Information';
			//return $this->insert_DB_data($info_array, $table_name);
		}


		/*insert the instructor information by active record methord*/
		public function insert_instructor_AR($info_array)
		{
			$this->escape_data($info_array);
			return $this->db->insert('Instructor_Information', $info_array);
			
		}

		/*Search instructor information*/
		public function search_instructor($ins_ID)
		{
			$sql = "SELECT * FROM Instructor_Information WHERE Instructor_ID = ?";
			$result = $this->db->query($sql, array($ins_ID));

			return $result;
		}

		//Search by email
		public function search_instructor_email($email)
		{
			$sql = "SELECT * FROM Instructor_Information WHERE Instructor_Email = ?";
			$result = $this->db->query($sql, array($email));

			return $result;
		}

		public function inslogin($email, $password)
		{
			$sql = "SELECT * FROM Instructor_Information WHERE Instructor_Email = ?";
			$result = $this->db->query($sql, array($email));

			if($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) 
				{
					# code...
					if($row->Instructor_Password == $password)
					{
						$newsession = array('Instructor_ID' => $row->Instructor_ID,
											'Instructor_Name' => $row->Instructor_Name,
											'Instructor_Email' => $email);
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
	}


/* This is the end of this file*/