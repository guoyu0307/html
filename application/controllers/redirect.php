<?php
	class redirect extends CI_Controller
	{
		

		public function ta_preference()
		{
			$this->load->view('taprefer');
		}

		public function list_ta()
		{
			$this->load->view('ta_list');
		}


		

		
    			

		public function list_assignment()
		{
			$this->load->view('assignment_list');
		}

		public function ins_prefer()
		{
			$this->load->view('ins_prefer');
		}

		public function evaluation()
		{
			$this->load->view('evaluation');
		}




		

		

		
	}

/*This is the end of this file*/