<?php
class backend extends CI_Model 
{
  



function update($table,$data,$where)
{

$this->db->set($data);
$this->db->where($where);
$this->db->update($table); 
return true;

}

function delete($table,$where)
{
    $this->db->where($where);
    $this->db->delete($table);
    return true;
}   


function insert($table, $data)
{  

    $this->db->insert($table, $data);
    return true;
}

  

 function alldata($table)
 {
  $query=$this->db->get($table);
  return $query->result();

 } 

function iddata($id,$table)
 {  

  $this->db->where($id);
  $query=$this->db->get($table);
  return $query->result();

 }

function checkdata($id,$table)
 { 

$this->db->select('*');
$this->db->from($table);
$this->db->where($id);
return $this->db->count_all_results();
   
  } 

 function count($table)
 {
  $query=$this->db->get($table);
  return $query->num_rows();

 } 

 function join($table,$table2,$id,$id2)
  { 
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($table2, $table2.".".$id2."=". $table.".".$id);
    $query=$this->db->get();
    return $query->result();
  }

 function join3($table,$table2,$table3,$id,$id2,$id3)
  { 
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($table2, $table2.".".$id2."=". $table.".".$id);
     $this->db->join($table3, $table3.".".$id3."=". $table.".".$id);
    $query=$this->db->get();
    return $query->result();
  }

 function join4($table,$table2,$table3,$table4,$id,$id2,$id3,$id4)
  { 
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($table2, $table2.".".$id2."=". $table.".".$id);
    $this->db->join($table3, $table3.".".$id3."=". $table.".".$id);
    $this->db->join($table4, $table4.".".$id4."=". $table.".".$id);
    $query=$this->db->get();
    return $query->result();
  }

  function join5($table,$table2,$table3,$table4,$table5,$id,$id2,$id3,$id4,$id5)
  { 
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($table2, $table2.".".$id2."=". $table.".".$id);
    $this->db->join($table3, $table3.".".$id3."=". $table.".".$id);
    $this->db->join($table4, $table4.".".$id4."=". $table.".".$id);
    $this->db->join($table5, $table5.".".$id5."=". $table.".".$id);
    $query=$this->db->get();
    return $query->result();
  }

    function join6($table,$table2,$table3,$table4,$table5,$table6,$id,$id2,$id3,$id4,$id5,$id6)
  { 
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($table2, $table2.".".$id2."=". $table.".".$id);
    $this->db->join($table3, $table3.".".$id3."=". $table.".".$id);
    $this->db->join($table4, $table4.".".$id4."=". $table.".".$id);
    $this->db->join($table5, $table5.".".$id5."=". $table.".".$id);
     $this->db->join($table6, $table6.".".$id6."=". $table.".".$id);
    $query=$this->db->get();
    return $query->result();
  }


  function join3s($table,$table2,$table3,$id,$id2,$id3)
  { 
    $this->db->select('*');
    $this->db->from($table);
    $this->db->join($table2, $table2.".".$id2."=". $table.".".$id);
     $this->db->join($table3, $table3.".".$id3."=". $table.".".$id3);
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


}