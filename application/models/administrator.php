<?php
	/*
		This class includes the operation of administrator in database
	 */
	class administrator extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		//Insert new administrator
		public function insert_admin($info_array)
		{
			$ad_account = $this->db->escape($info_array['Account']);
			$ad_pwd = $this->db->escape($info_array['Password']);
			$ad_email = $this->db->escape($info_array['Email']);

			$sql = "INSERT INTO Administrator_Info 
					(Account, Password, Email) VALUES
					($ad_account, $ad_pwd, $ad_email)";

			return $this->db->query($sql);
		}

		//administrator login
		public function userlogin($account, $password)
		{
			$sql = "SELECT * FROM Administrator_Info WHERE Account = ?";
			$result = $this->db->query($sql, array($account));

			if ($result->num_rows() > 0)
			{
				foreach ($result->result() as $row) 
				{
					if($row->Password == $password)
					{
						$newsession = array('Account' => $account, 
											'ID' => $row->ID,
											'Email' => $row->Email);
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
/*This is the end of this file*/