<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_model
{
	function __construct() {
	parent::__construct();
	
	}


	function verify_user($email, $password )
    {
      //$pswd = sha1($password);
  
       
      
      $this->db->where('email',$email);
      //$this->db->or_where('email', $email);
      
      $this->db->where('pwd', $password);

      $q = $this->db->get('users');
    


      if ($q->num_rows() > 0)
      {
          return $q->row();
      } 
      return false;
    }// varify user function

  function update_login_count($user_id)
  {
    $date = date("Y-m-d H:i:s");
    $data = array(
               'last_login' => $date
              
                           );
    $this->db->where('user_id',$user_id);
    //$this->db->set('last_login', $date, FALSE);
    $this->db->set('login_count','`login_count`+1', FALSE);
    $this->db->update('users', $data);
  }
  function get_cat($id)
	{
		$query=$this->db->query("select * from category,subcategory where category.id=subcategory.parent_category");
	    return $query->result();
	}
	function get_top_product()
	{
		$query=$this->db->query("select * from product order by id desc limit 0,4");
	    return $query->result();
	}
     function insert_data($db_name,$data){
          $q=$this->db->insert($db_name,$data);
		return $insert_id = $this->db->insert_id();
    }
   public function get_specific_data($db_id,$id,$db_name){
		$q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        return $q->result();
	}
	public function get_all_data($db_name){
		$q=$this->db->select('*')->get($db_name);
        return $q->result();
	}
     public function login($email,$password)
    {
       $q=$this->db->where('email',$email)
                    ->where("password",$password)
                     ->get('admin_login');
      if($q->num_rows()==1){
           return 1;
	    }
        else{
            return 0;
        }     

    }
   

   
    
    public function get_row_data($db_id,$id,$db_name){
        $q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        return $q->row();
    }
    
    function edit_data($db_id,$id,$data,$db_name){
        return $q=$this->db->where($db_id,$id)->update($db_name,$data);
    }
    
    function edit_data_mul($db_id,$id,$db_id1,$id1,$db_id2,$id2,$data,$db_name){
        return $q=$this->db->where($db_id,$id)->where($db_id1,$id1)->where($db_id2,$id2)->update($db_name,$data);
    }
    
    function delete_data($db_id,$id,$db_name){
        $this -> db -> where($db_id, $id);
        $this -> db -> delete($db_name);
    }
    
    function delete_data_mul($db_id1,$id1,$db_id2,$id2,$db_name){
        $this -> db -> where($db_id1, $id1);
        $this -> db -> where($db_id2, $id2);
        $this -> db -> delete($db_name);
    }

    function count_row($db_id,$id,$db_name){
        $this->db->from($db_name)->where($db_id,$id);
        $query = $this->db->get();
        return $query->num_rows();
    }
	public function get_current_page_records($limit, $start,$dbname) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($dbname);
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

    function count_row_multiple($db_id1,$id1,$db_id2,$id2,$db_name)
	{
        $this->db->from($db_name)->where($db_id1,$id1)->where($db_id2,$id2);
        $query = $this->db->get();
        return $query->num_rows();
    }
	function count_role($query)
	{
        $q = $this->db->query($query);
        return $q->num_rows();
    }
    function count_row1($db_name)
	{
        $this->db->from($db_name);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_row_multiple_getUnique($db_id1,$id1,$db_id2,$id2,$db_name,$select){
        $this->db->from($db_name)->where($db_id1,$id1)->where($db_id2,$id2);
            
        $query = $this->db->distinct()->select($select)->get();
        return $query->num_rows();
    }
    
    function count_row_multiple_fourx($db_id1,$id1,$db_id2,$id2,$db_id3,$id3,$db_id4,$id4,$db_name){
        $this->db->from($db_name)->where($db_id1,$id1)->where($db_id2,$id2)->where($db_id3,$id3);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_x($get_id,$db_id,$id,$db_name){
        $q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        
            return $q->row()->$get_id;
        
    }
	
	
    function get_xx($get_id,$db_id,$id,$db_id1,$id1,$db_name){
        $q=$this->db->select('*')->where($db_id,$id)->where($db_id1,$id1)->get($db_name);
        
            return $q->row()->$get_id;
        
    }
    
    function get_unique($db_id,$id,$db_name){
        $this->db->from($db_name)->where($db_id,$id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function getLatest($fieldneeded,$db,$orderbyid,$wherefield){
       $q = $this->db->query("SELECT ".$fieldneeded." FROM ".$db." WHERE ".$wherefield." ORDER BY ".$orderbyid." DESC LIMIT 1");
       if($q->num_rows()){
           return $q->row();
        }
        else{
            return false;
        }
    }

    function getRawRow($query){
        $q = $this->db->query($query);
        if($q->num_rows()){
            return $q->row();
         }
         else{
             return false;
         }
     }

     function getRawResult($query){
        $q = $this->db->query($query);
        if($q->num_rows()){
            return $q->result();
         }
         else{
             return false;
         }
     }
     
     public function insert_product_image($data = array()){
        $insert = $this->db->insert_batch('bv_product_image',$data);
        return $insert?true:false;
    }
    public function insert_batch($table,$data = array()){
        $insert = $this->db->insert_batch($table,$data);
        return $insert?true:false;
    }
    	function edit_user1($u_data, $ui_data, $uf_data, $id){
		$this->db->trans_begin();

		
		    $r1=$this->db->where('doctor_id',$id)->update('doctors',$u_data);
			
		
		
			$r2=$this->db->where('doctor_id',$id)->update('doctor_info',$ui_data);

		
			$r3=$this->db->where('doctor_id',$id)->update('doctor_profession',$uf_data);

		if (($r1==true)&&($r2==true)&&($r3==true)) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}
  

}// end of class