<?php
	class system_setting extends CI_Controller
	{
		public function index()
		{
			$this->load->model('setting');
			$config = $this->setting->getConfig();

			$this->load->view('sys_setting', $config);
		}

		public function alter_release()
		{
			$this->load->model('setting');
			$data = array('Release' => $this->input->post('release'));
			$this->setting->update_release($data);
		}
	}

/*This is the end of this file*/