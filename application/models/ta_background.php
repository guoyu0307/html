<?php

	/*
		this class includes the function for TA background in database.
	 */
	class ta_background extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		/*
			For TA background:
			the is_ust_ug indicades if the TA is the ust ug: 0-no 1-yes
			For the technology skills: 0--no experience, 1--beginner, 2--familiar, 3--master	
		 */
		
		/*insert ta background*/
		public function insert_ta_bg($info_array)
		{
			$ta_id = $this->db->escape($info_array['TA_ID']);
			$ta_ug = $this->db->escape($info_array['Is_UST_UG']);
			$c_lang = $this->db->escape($info_array['C_Language']);
			$java = $this->db->escape($info_array['Java']);
			$python = $this->db->escape($info_array['Python']);
			$alg = $this->db->escape($info_array['Algorithm']);
			$c_t = $this->db->escape($info_array['Computer_Theory']);
			$data_base = $this->db->escape($info_array['Data_base']);
			$network = $this->db->escape($info_array['Networks']);
			$s_e = $this->db->escape($info_array['Software_Engineering']);
			$os = $this->db->escape($info_array['Operating_System']);
			$graphics = $this->db->escape($info_array['Graphics']);
			$music = $this->db->escape($info_array['Computer_Music']);
			$ai = $this->db->escape($info_array['AI']);

			$sql = "INSERT INTO TA_Background VALUES
					($ta_id, $ta_ug, $c_lang, $java, $python, $alg, $c_t, $data_base, $network, $s_e, $os, $graphics, $music, $ai)";

			return $this->db->query($sql);
		}

		/*insert ta background in Active Record*/
		public function insert_ta_bg_AR($info_array)
		{
			return $this->db->insert('TA_Background',$info_array);
		}

		/*select ta background*/
		public function search_ta_bg($TA_ID)
		{
			$sql = "SELECT * FROM TA_Background WHERE TA_ID = ?";
			$result = $this->db->query($sql, array($TA_ID));

			return $result;
		}

		public function update_bg($id, $data)
		{
			$this->db->where('TA_ID', $id);
			$this->db->update('TA_Background', $data);
		}

		public function search_skill($skill, $degree)
		{
			$sql = "SELECT * FROM TA_Background WHERE $skill >= $degree AND $skill < 4";
			$result = $this->db->query($sql);

			return $result;
		}

	}

/*this is the end of this file*/