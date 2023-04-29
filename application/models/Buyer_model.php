<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buyer_model extends CI_Model 
{
	public function login_user($email,$pass)
	{
		$query= $this->db->query("SELECT * FROM admin WHERE email= '" . $email . "' AND password = '" .$pass. "'");
		return $query;
	}

  public function login_employee($email,$password)
  {
    //$query= $this->db->query("SELECT * FROM users WHERE email_id= '" . $email . "' ");
     $query=$this->db->select('t2.*,t4.sub_industry_name,t5.industry_name,t6.expiry_date as pro_expiry_date')
     ->from('users as t2')
     ->where('t2.email_id',$email)
     ->where('t2.password',$password)
    ->join('sub_industry as t4', 't2.sub_industry = t4.sub_industry_id', 'LEFT')
     ->join('industry as t5', 't2.industry = t5.industry_id', 'LEFT')
     ->join('pro_users as t6', 't2.user_id = t6.user_id', 'LEFT')
     ->get();
    return $query->row();
  }
  public function loginm_employee($email,$password)
  {
    //$query= $this->db->query("SELECT * FROM users WHERE mobile_no= '" . $email . "'");
    $query=$this->db->select('t2.*,t4.sub_industry_name,t5.industry_name,t6.expiry_date as pro_expiry_date')
     ->from('users as t2')
     ->where('t2.mobile_no',$email)
      ->where('t2.password',$password)
    ->join('sub_industry as t4', 't2.sub_industry = t4.sub_industry_id', 'LEFT')
     ->join('industry as t5', 't2.industry = t5.industry_id', 'LEFT')
     ->join('pro_users as t6', 't2.user_id = t6.user_id', 'LEFT')
     ->get();
    return $query->row();
  }
  
	public function insertdata($table,$data)
	{
		$a = $this->db->insert($table,$data);
		return $a;
  	}

  	public function email($str,$table)
    {
      $this->db->where('email', $str);
      $this->db->from($table);
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
        return true;
      }
      return false; 
    }

    public function fetchall($table,$where='')
    {
    	$this->db->select("*");
    	$this->db->from($table);
    	if($where){
    	  $this->db->where($where);
    	}
    	$query=$this->db->get();
    	return $query->result();
    }

    public function fetchallactive($table)
    {
      $this->db->select("*");
      $this->db->where('status','1');
      $this->db->from($table);
      $query=$this->db->get();
      return $query->result();
    }

    public function fetchdata($table, $id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->row();
	   }
	public function updatedata($table,$data,$where)
	{
		$this->db->where($where);
    return $this->db->update($table,$data);		
	}
	public function deletedata($table,$where)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
public function deletedataattr($table,$id)
  {
    $this->db->where('product_id', $id);
    return $this->db->delete($table);
  }
	public function standard($str,$table)
    {
      $this->db->where('standard', $str);
      $this->db->from($table);
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
        return true;
      }
      return false; 
    }
    public function countdata($table)
    {
      $this->db->select('*');
      $this->db->from($table);
      return $this->db->count_all_results();
    }

    public function forgotepassword($table,$email)
    {
      $query= $this->db->query("SELECT * FROM ".$table." WHERE email= '" . $email . "' ");
    return $query;
    }
    
     public function fetchcompany($table,$emp_id)
    {
      $this->db->select("*");
      $this->db->from($table);
      $this->db->where('categoryId',$emp_id);
      $query=$this->db->get();
      return $query->result();
    }
    public function select_where($table,$where)
    {
       
      $this->db->select("*");
      $this->db->from($table);
      $this->db->where($where);
      $query=$this->db->get();
      return $query->result();
    }
      public function fetchdata_where($table,$where)
    {
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->row();
     }

     public function fetchdata_rowarray($table,$where)
    {
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->row_array();
     }

    
     public function countdata_where($table,$where)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where);
      return $this->db->count_all_results();
    }
    
    public function fetchdata_where_result($table,$where,$page='')
    {
      if($page)
      {
        $per_page=15;
        $start = ($page - 1) * $per_page; 
      }
      $this->db->select("*");
      $this->db->where($where);
      if($page)
      {
        $this->db->limit($per_page, $start);
      }
      $query = $this->db->get($table);
      return $query->result();
    }
     
     
     public function insertdatafile($data) {
$res = $this->db->insert_batch('products',$data);
if($res){
return TRUE;
}else{
return FALSE;
}
}

  public function fetchdata_where_gruopby($table,$where='',$group='')
    {
        $this->db->select("*");
        if($where){
        $this->db->where($where);
        }
        $this->db->group_by($group);
        $this->db->order_by('orderid','desc');
        $query = $this->db->get($table);
        return $query->result();
     }
     public function result_array($table,$where)
    {
     $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    $result=$query->result_array();
    return $result;
     }
     public function fetchresult_array($table,$select,$where='',$orderby='')
    {
     $this->db->select($select);
     $this->db->from($table);
    if($where){
      $this->db->where($where);
    }
    if($orderby)
    {
      $this->db->order_by($orderby,'desc');
    }
    $query = $this->db->get();
    $result=$query->result_array();
    return $result;
     }

      public function fetchdata_paginagtion_result($table,$page='')
    {
      if($page)
      {
      $per_page=15;
      $start = ($page - 1) * $per_page; 
      }
      
        $this->db->select("*");
        if($page){
          $this->db->limit($per_page, $start);
        }
        
        $query = $this->db->get($table);
        return $query->result();
     }

    
}