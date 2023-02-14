<?php
function langdata()
{
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "SELECT * FROM lang WHERE status='Active'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->result_array();
	return $row;
}

function langdata_default()
{
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "SELECT * FROM lang WHERE status='Active' AND default_lang='default'"; 
	$query 	= $ci->db->query($sql);
	$row 	= $query->result_array();
	return $row;
}
function get_spc_column($field,$table,$condition)
{
	$ci=& get_instance();
	$ci->load->database(); 
	
	$sql 	= "SELECT ".$field." FROM ".$table." WHERE ".$condition.""; 				
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0)
	{
	
		$row = $query->row();	
		return $row->$field;
	}
	else{
		return "";
	}
}
function get_common_category($field,$id,$lang_key){
	$ci=& get_instance();
	$ci->load->database();
	$sql ="SELECT ".$field." FROM ".CATEGORY_DETAILS." WHERE base_id=".$id." AND lang_id='". $lang_key."'";
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0)
	{
		$row = $query->row();
		return $row->$field;
	}
	else{
		$sql ="SELECT ".$field." FROM ".CATEGORY_DETAILS." WHERE base_id=".$id." AND lang_id='en'";
		$query 	= $ci->db->query($sql);
		$row = $query->row();
		return $row->$field;
	} 
}
function get_common_subcategory($field,$id,$lang_key){
	$ci=& get_instance();
	$ci->load->database();
	$sql ="SELECT ".$field." FROM ".SUBCATEGORY_DETAILS." WHERE base_id=".$id." AND lang_id='". $lang_key."'";
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0)
	{
		$row = $query->row();
		return $row->$field;
	}
	else{
		$sql ="SELECT ".$field." FROM ".SUBCATEGORY_DETAILS." WHERE base_id=".$id." AND lang_id='en'";
		$query 	= $ci->db->query($sql);
		$row = $query->row();
		return $row->$field;
	} 
}
function get_common_details($table,$field,$id,$lang_key){
	$ci=& get_instance();
	$ci->load->database();
	$sql ="SELECT ".$field." FROM ".$table." WHERE base_id=".$id." AND lang_id='". $lang_key."'";
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0)
	{
		$row = $query->row();
		return $row->$field;
	}
	else{
		$sql ="SELECT ".$field." FROM ".$table." WHERE base_id=".$id." AND lang_id='en'";
		$query 	= $ci->db->query($sql);
		$row = $query->row();
		return $row->$field;
	} 
}
function get_featured_tasker($tasker_id,$lang_key){
	$ci=& get_instance();
	$ci->load->database();
	$ci->load->helper('site_language_helper');
	$hr = get_lang_site_key($lang_key,"common_lang","hr");
	$sql ="SELECT * FROM ".TASKER_CATEGORY_SELECTION." WHERE user_id=".$tasker_id." Limit 3";
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0)
	{
		$skill='';
      foreach($query->result() as $val){
		$sql ="SELECT task_name FROM ".CATEGORY_DETAILS." WHERE base_id=".$val->task_category_id." AND lang_id='". $lang_key."'";
		$query 	= $ci->db->query($sql);
		
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$skill.='<p> '.$row->task_name.' <span class="pull-right me-4">'.$val->price.'/'.$hr.'</span></p>';
		}
		else{
			$sql ="SELECT task_name FROM ".CATEGORY_DETAILS." WHERE base_id=".$val->task_category_id." AND lang_id='en'";
			$query 	= $ci->db->query($sql);
			$row = $query->row();
			$skill.=  '<p> '.$row->task_name.' <span class="pull-right me-4">'.$val->price.'/'.$hr.'</span></p>';
		} 
		
	  }
     return $skill;
	}else{
		return '--';
	}
	
}
function get_tasker_des($id){
	$ci=& get_instance();
   $ci->load->database();
   $sql ="SELECT * FROM ".TASKER_CATEGORY_SELECTION." WHERE user_id=".$id."";
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0)
	{
		$row = $query->row();
		return $row->tasker_description;
	}
	else{
		
		return 'I have supplies and resources available for helping you with your move ins, move outs and move';
} 
}