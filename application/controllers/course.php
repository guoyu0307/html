<?php
	class course extends CI_Controller
	{
		public function direct_add_new_course()
		{
			$this->load->view('add_new_course');
		}

		public function add_new_course()
		{
			$this->load->model('course_entity');
			$course_id = strtoupper($this->input->post('courseID'));
			$result = $this->course_entity->search_course_OID($course_id);
			if($result->num_rows() > 0)
			{
				echo '<script>alert("The course id exists")</script>';
			}
			else
			{
				$data = array('Course_Offical_ID' => $course_id,
						  'Course_Used_ID' => $this->input->post('oldcode'),
						  'Course_Name' => $this->input->post('coursename'),
						  'Credits' => $this->input->post('credits'),
						  'Comment' => $this->input->post('comment'));
				$insert = $this->course_entity->insert_course($data);
				echo '<script>alert("Insert succeed!")</script>';
			}
		}

		public function add_course()
		{
			$config['upload_path'] = '/Library/WebServer/Documents/html/application/upload/';
  			$config['allowed_types'] = 'xlsx';
  			$config['max_size'] = '10000000';
  			$new_name = time();
  			$config['file_name'] = $new_name;
  			echo $new_name;
  			$this->load->library('upload', $config);

  			if(!$this->upload->do_upload())
  			{
  				//echo '<script>alert("Error!")</script>';
  				$this->add_new_course();
  			}
  			else
  			{
  				//echo '<script>alert("Upload succeed!")</script>';
  				$this->read_excel($new_name);
  			}

  			$this->load->view('add_new_course');
		}

		public function updata_course()
		{

		}

		public function read_excel($filename)
		{
			date_default_timezone_set('Asia/Shanghai');
			set_include_path(get_include_path() . PATH_SEPARATOR . '/Library/WebServer/Documents/html/application/PHPExcel_1.8.0_pdf/Classes/');
			include 'PHPExcel/IOFactory.php';
			$inputFileName = '/Library/WebServer/Documents/html/application/upload/'.$filename.'.xlsx';
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

			$sheetdata = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			var_dump($sheetdata);		
		}

		
		

		public function list_all_course()
		{
			$this->load->library('pagination');
			$this->load->model('course_entity');
			$this->load->helper('url');

			$config['base_url'] = base_url().'index.php/course/list_all_course/';
			$config['total_rows'] = $this->db->count_all('Course_Information');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了 
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->library('table');
    		$this->table->set_heading('ID', 'Used ID', 'Name', 'Credit', 'Comment', 'Operation');
    		
    		$results = $this->course_entity->search_all_course($config['per_page'],$this->uri->segment(3));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();
    			$newr[] = $row->Course_Offical_ID;
    			$newr[] = $row->Course_Used_ID;
    			$newr[] = $row->Course_Name;
    			$newr[] = $row->Credits;
    			$newr[] = $row->Comment;
    			//$temp = $row->Course_ID;
    			$edit = '<a href="http://localhost/html/index.php/course/direct_updata_course/'.$row->Course_ID.'">edit</a>';
    			$newr[] = $edit;
    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
    		$this->load->view('course_list', $data);
		}

		public function search_course()
		{
			$this->load->library('pagination');
			$this->load->model('course_entity');
			$id = $this->input->post('rolename');
			$this->load->library('table');
    		$this->table->set_heading('ID', 'Used ID', 'Name', 'Credit', 'Comment', 'Operation');
    		
    		$results = $this->course_entity->search_course_OID(strtoupper($id));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();
    			$newr[] = $row->Course_Offical_ID;
    			$newr[] = $row->Course_Used_ID;
    			$newr[] = $row->Course_Name;
    			$newr[] = $row->Credits;
    			$newr[] = $row->Comment;
    			//$temp = $row->Course_ID;
    			$edit = '<a href="http://localhost/html/index.php/course/direct_updata_course/'.$row->Course_ID.'">edit</a>';
    			$newr[] = $edit;
    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
    		$this->load->view('course_list', $data);
		}

		public function direct_updata_course($course_id)
		{
			$this->load->model('course_entity');
			$result = $this->course_entity->search_course_ID($course_id);
			$data = array();
			foreach ($result->result() as $row) 
			{
				# code...
				$data['Course_ID'] = $course_id;
				$data['Course_Offical_ID'] = $row->Course_Offical_ID;
				$data['Course_Used_ID'] = $row->Course_Used_ID;
				$data['Course_Name'] = $row->Course_Name;
				$data['Credits'] = $row->Credits;
				$data['Comment'] = $row->Comment;
			}

			$this->load->view('update_course', $data);

		}

		//Seceive data from form
		public function update_course()
		{
			$id = $this->input->post('id');
			$data = array('Course_Offical_ID' => $this->input->post('courseID'),
						  'Course_Used_ID' => $this->input->post('oldcode'),
						  'Course_Name' => $this->input->post('coursename'),
						  'Credits' => $this->input->post('credits'),
						  'Comment' => $this->input->post('comment'));

			//var_dump($data);
			$this->load->model('course_entity');
			if($this->course_entity->update_course($id, $data))
			{

				header("Location: http://localhost/html/index.php/course/list_all_course");

				echo '<script>alert("Update succeed!")</script>';
			}

		}
	}
/*This is the end of this file*/