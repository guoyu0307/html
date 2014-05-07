<?php
	class system_setting extends CI_Controller
	{
		public function index()
		{
			$this->load->model('setting');
			$config = $this->setting->getConfig();

			$this->load->view('sys_setting', $config);
		}
	}

/*This is the end of this file*/