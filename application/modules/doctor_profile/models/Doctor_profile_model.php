<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_profile_model extends CI_model {
	

	function get_doctor_data($temp_doc_id){
		$this->db->select('d.doctor_id, d.first_name, d.last_name, d.email, d.phone, d.category_id, d.is_active, d.speciality_id, dr.category_name, CONCAT(uu.first_name, " ", uu.last_name) as added_by, di.*, st.name as state_name, ct.name as city_name, dp.registration_no as regi,dp.medical_council as council ,dp.certification_year as certificate ,dp.medical_degree as degree, dp.passout_year as passout , dp.college_name as collage, dp.experience as exp');
		$this->db->from('doctors d');
		$this->db->join('doctors_category dr', 'dr.doctor_category_id=d.category_id');
		$this->db->join('doctor_info di', 'di.doctor_id=d.doctor_id');
		$this->db->join('states st', 'st.id=di.state');
		$this->db->join('cities ct', 'ct.id=di.city');
		$this->db->join('doctor_profession dp', 'dp.doctor_id=di.doctor_id');
		$this->db->join('users uu', 'uu.user_id=di.added_by');
		$this->db->where('d.doctor_id', $temp_doc_id);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_doctor_data

	function get_doctor_img($temp_doc_id){
		$this->db->select('*');
		$this->db->where('ref_id', $temp_doc_id);
		$q = $this->db->get('images');
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_doctor_img
	function get_category(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('doctors_category');

		return $q->result_array();
	}
	function get_specility(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('doctors_speciality');

		return $q->result_array();
	}//end of function get_specility

	function get_medical_council(){
		$this->db->select('*');
		$q = $this->db->get('medical_council');

		return $q->result_array();
	}//end of function get_medical_council

	function get_medical_degrees(){
		$this->db->select('*');
		$q = $this->db->get('medical_degrees');

		return $q->result_array();
	}//end of function get_medical_degrees
	function get_indian_states(){
		$this->db->cache_on();
		
		$this->db->select('id, name');
		$this->db->where_in('country_id', '101');
		$this->db->order_by('name');
		$q = $this->db->get('states');
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of ffunction get_indian_states

	function get_cities_by_state($state_id){
		$this->db->select('name,id');
	    $this->db->where('state_id',$state_id);
	    $result = $this->db->get('cities');
	     
	      try {
	      if ($result->num_rows()>0) {
	         return $result->result_array();
	      } else {
	        $this->throw_error->throw("There is No City.");
	      } 

	    } catch (Exception $e) {
	      return false;
	      exit;
	    }
	}

}//end of class