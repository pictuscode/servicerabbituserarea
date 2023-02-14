<?php
$CI =& get_instance();
function get_lang_site_key($language='en',$filepath,$key){	
	try{
	$alt_path=APPPATH.'language/'.$language.'/'.$filepath.'.php';
	if (file_exists($alt_path))
	{
		include ($alt_path);
		if ( isset($lang) && is_array($lang))
		{
			if(isset($lang[$key])){
				return $lang[$key];
			}
			else{
				return '???????';
				/* return ucwords(str_replace('_'," ",$key)); */
			}
		}
		else{
			return '???????';
			/* return ucwords(str_replace('_'," ",$key)); */
		}
		
	}	

	else{
		return '???????';
		/* return ucwords(str_replace('_'," ",$key)); */
	}
    }
	catch(Exception $e){
		return '???????';
		/* return ucwords(str_replace("_"," ",$key)); */
	}
}

function get_home_page_listing_count($id)
{   
	if($id!=""){
	$ci=& get_instance();
	$ci->load->database(); 
	$row='';
	$sql 	= "select count(id) as totcount from  fc_property where property_type='".$id."' and status='1'"; 
	$query 	= $ci->db->query($sql);
	if($query->num_rows()>0){
		$row 	= $query->row()->totcount.'+';
	}
	return $row;
	}
	else { return 0;}
}







?>