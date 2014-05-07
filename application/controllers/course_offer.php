<?php
	class course_offer extends CI_Controller
	{
		public function direct_add_new_course_offering()
		{
			$this->load->view('add_new_course_offering');
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

		public function add_course_offreing()
		{
			$config['upload_path'] = '/Library/WebServer/Documents/html/application/upload/';
  			$config['allowed_types'] = 'xlsx';
  			$config['max_size'] = '10000000';
  			$new_name = time();
  			$config['file_name'] = $new_name;

  			$this->load->library('upload', $config);

  			if(!$this->upload->do_upload())
  			{
  				//echo '<script>alert("Error!")</script>';
  				$this->add_new_course_offering();
  			}
  			else
  			{
  				//echo '<script>alert("Upload succeed!")</script>';
  				$this->read_excel($new_name);
  			}

  			$this->load->view('add_new_course_offering');
		}

		public function add_new_course_offering()
		{
			$this->load->model('course_offering');
			$this->load->model('course_entity');
			$this->load->model('instructor_course');
			$this->load->model('instructor_model');

			$course_id = strtoupper($this->input->post('courseID'));
			$year = $this->input->post('year');
			$term = $this->input->post('term');
			$ins_email = $this->input->post('instructor_email');

			//Search if the instructor exist
			$ins_result = $this->instructor_model->search_instructor_email($ins_email);
			$ins_id = 0;
			if($ins_result->num_rows() < 1)
			{
				echo "<script>alert('This instructor does not exist')</script>";
				return;
			}
			else
			{
				foreach ($ins_result->result() as $row) 
				{
					$ins_id = $row->Instructor_ID;
				}
			}


			$result = $this->course_entity->search_course_OID($course_id);

			if($result->num_rows() < 1)
			{
				echo "<script>alert('Please add this new course in the course page')</script>";
				return;
			}
			else
			{
				$id = 0;
				foreach ($result->result() as $row) 
				{
					# code...
					$id = $row->Course_ID;
				}

				$new_result = $this->course_offering->serarch_courseoff($id, $year, $term);

				if($new_result->num_rows() > 0)
				{
					echo '<script>alert("The offering course exists")</script>';
				}
				else
				{
					$data = array('Course_ID' => $id,
								  'Year' => $year,
								  'Term' => $term,
						  		  'Lab_Quota_Avg' => $this->input->post('labquota'),
						          'Lecture_Quota_Avg' => $this->input->post('lecturequota'),
						  		  'Lab_Sections' => $this->input->post('labsections'),
						  	      'Lecture_Sections' => $this->input->post('lecturesections'),
						  		  'Comment' => $this->input->post('comment'));

					$ins_course = array('Course_ID' => $id,
										'Year' => $year,
										'Term' => $term,
										'Instructor_ID' => $ins_id);

					$insert1 = $this->instructor_course->insert_course_ins($ins_course);
					$insert = $this->course_offering->insert_course_offering($data);
					echo '<script>alert("Insert succeed!")</script>';
				}
			}
		}

		public function list_all_course_offering()
		{
			$this->load->library('pagination');
			$this->load->model('course_offering');
			$this->load->model('course_entity');
			$this->load->model('instructor_course');
			$this->load->model('instructor_model');
			
			$this->load->helper('url');

			$config['base_url'] = base_url().'index.php/course_offer/list_all_course_offering/';
			$config['total_rows'] = $this->db->count_all('Course_Offering');
			$config['per_page'] = 10;
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了 
			$config['full_tag_open'] = '<p>';
    		$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config); 

			$this->load->library('table');
    		$this->table->set_heading('Course ID', 'Course Name', 'Year', 'Term', 'Instructor', 'Lab Quota', 'Lecture Quota', 'Lab Sections', 'Lecture Sections', 'Comment', 'Operation');
    		
    		$results = $this->course_offering->search_all_course_offering($config['per_page'],$this->uri->segment(3));
    		$all_new= array();

    		foreach ($results->result() as $row) 
    		{
    			$newr = array();
    			$temp = $this->course_entity->search_id($row->Course_ID);
    			$temp_OID = 0;
    			foreach ($temp->result() as $nrow) 
    			{
    				# code...
    				$temp_OID = $nrow->Course_Offical_ID;
    				$newr[] = $nrow->Course_Offical_ID;
    				$newr[] = $nrow->Course_Name;
    			}
    			$newr[] = $row->Year;
    			$newr[] = $row->Term;

    			//Instructor
    			$ins_result = $this->instructor_course->search_ins_id($row->Course_ID, $row->Year, $row->Term);
    			if($ins_result->num_rows() < 1)
    			{
    				$newr[] = 'Not Decided';
    			}
    			else
    			{
    				foreach ($ins_result->result() as $kkk) 
    				{
    					$result_ins_name = $this->instructor_model->search_instructor($kkk->Instructor_ID);
    					foreach ($result_ins_name->result() as $key) 
    					{
    						$newr[] = $key->Instructor_Name;
    					}
    				}
    			}

    			$newr[] = $row->Lab_Quota_Avg;
    			$newr[] = $row->Lecture_Quota_Avg;
    			$newr[] = $row->Lab_Sections;
    			$newr[] = $row->Lecture_Sections;
    			$newr[] = $row->Comment;
    			//$temp = $row->Course_ID;
    			//$edit = '<a href="http://localhost/html/index.php/redirect/direct_updata_course/'.$row->Course_ID.'">edit</a>';
    			//$newr[] = $edit;
    			$edit = '<a href="http://localhost/html/index.php/course_offer/direct_update_course_offering/'.$row->Course_ID.'/'.$row->Year.'/'.$row->Term.'/'.$temp_OID.'">edit</a>';

    			$newr[] = $edit;

    			$all_new[] = $newr;
    		}

    		$data['results'] = $all_new;
			$this->load->view('course_offering_list', $data);
		}

		public function direct_update_course_offering($course_id, $year, $term, $oid)
		{
			$this->load->model('course_offering');
			$result = $this->course_offering->search_courseOff_ID($course_id, $year, $term);
			$data = array();
			foreach ($result->result() as $row) 
			{
				# code...
				$data['Course_ID'] = $course_id;
				$data['Course_Offical_ID'] = $oid;
				$data['Year'] = $row->Year;
    			$data['Term'] = $row->Term;
    			$data['Lab_Quota_Avg'] = $row->Lab_Quota_Avg;
    			$data['Lecture_Quota_Avg'] = $row->Lecture_Quota_Avg;
    			$data['Lab_Sections'] = $row->Lab_Sections;
    			$data['Lecture_Sections'] = $row->Lecture_Sections;
    			$data['Comment'] = $row->Comment;
			}

			$this->load->view('update_course_offering', $data);
		}

		//From from view update_course_offering
		public function update_course_offering()
		{
			$course_id = $this->input->post('id');
			$year = $this->input->post('year');
			$term = $this->input->post('term');

			$data = array('Lab_Quota_Avg' => $this->input->post('labquota'),
						  'Lecture_Quota_Avg' => $this->input->post('lecturequota'),
						  'Lab_Sections' => $this->input->post('labsections'),
						  'Lecture_Sections' => $this->input->post('lecturesections'),
						  'Comment' => $this->input->post('comment'));
			$this->load->model('course_offering');

			if($this->course_offering->update_course_offering($course_id, $year, $term, $data))
			{
				header("Location: http://localhost/html/index.php/course_offer/list_all_course_offering");

				echo '<script>alert("Update succeed!")</script>';
			}

		}
	}