<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_profile extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		if ($this->session->tempdata('temp_doc_id')!=null) {
			$this->load->model('doctor_profile_model');
			$user_id = $this->session->userdata['sessiondata']['user_id'];
			
			$temp_doc_id = $this->session->tempdata('temp_doc_id');

			$doc_data = $this->doctor_profile_model->get_doctor_data($temp_doc_id);
			//print_r($doc_data);

			$doc_img = $this->doctor_profile_model->get_doctor_img($temp_doc_id);
			
			$category = $this->doctor_profile_model->get_category();
			$specility = $this->doctor_profile_model->get_specility();
		$states = $this->doctor_profile_model->get_indian_states();

		$mc = $this->doctor_profile_model->get_medical_council();
		$md = $this->doctor_profile_model->get_medical_degrees();
		    // print_r($doc_data);

			$data = array(
				'doc_data'		=>		$doc_data,
				'doc_img'		=>		$doc_img,
				'category'		=>		$category,
			'specility'		=>		$specility,
			'states'		=>		$states,
			'mc'			=>		$mc,
			'md'			=>		$md
			  
			);
			$this->load->view('doc-info-view', $data);
		}else{
			 redirect(base_url().'template/doctors_list');
		}
		
			
	}//end of index
	
	public function save()
	{
		 echo "rohit";
	}



	

}//end of class