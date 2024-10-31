<?php function sczr_display_sectionizer(){
global $wpdb; 
 if(isset($_GET['delete'])){
		$id=$_GET['delete'];	 
		global $wpdb;
		$table_name = $wpdb->prefix . "sectionizer"; 			
		$sql = "DELETE FROM " . $table_name . " WHERE option_name='".$id."';";
		$wpdb->query( $sql );
		echo "<div class='sczr_showmessage'>"; 
		_e('Sectionizer Has been Deleted','sczr');
		echo "</div>";
	}
if(isset($_POST['sczr_add_btn'])){
sczr_add_new_sectionizer();
} 
?>
<div id="poststuff" class="sczr_wrapper">
<div class="postbox">
<h3 class="hndle sczr_head"><span> <?php _e("Table of Sectionizer",'sczr'); ?> </span></h3>					    
	<div class="sectionizer_table inside" style="padding:0px; margin-bottom:0px;">	
	<table style="width:100%;">	
		<td style="padding-left:20px; color:#000000;font-weight:bold;text-align:center"> <?php _e("ID",'sczr'); ?> </td>
		<td style="padding-left:20px; color:#000000;font-weight:bold;text-align:center">  <?php _e("Name",'sczr'); ?> </td>
		<td style="padding-left:20px; color:#000000;font-weight:bold;"> <?php _e("Edit",'sczr'); ?> </td>
		<td style="padding-left:20px; color:#000000;font-weight:bold;"> <?php _e("Delete",'sczr'); ?> </td>      			 
	</table>
   <?php 	  
		$table_name = $wpdb->prefix . "sectionizer";				
		$rows_count = $wpdb->get_results("SELECT * FROM $table_name");		
		foreach($rows_count as $row){			
		echo '<div class="sczr_row clearfix">
		 <div class="sczr_col">'.$row->id .'</div>
		 <div class="sczr_col" style="margin-right:0px; height:auto;">'.$row->option_name.'</div> 
		 <div class="sczr_col"> <a class="button-primary"  href="?page=edit-sectionizer&edit='. $row->option_name. '"> Edit</a></div>
		 <div class="sczr_col"> <a class="sczr_delete_btn" href="?page=create_sectionizer&delete='. $row->option_name . '" onclick="return fwgm_delconfirm(\''.$row->option_name.'\');"">Delete</a></div>				 
	   </div>';
	 }
	?>		
</div> 	
	<div class="add_sczr">
		<form id="create_sectionizer" action="?page=create_sectionizer&add=1" method="post">
			<input type="text" class="sczr_addnew_textbox" name="add_new_section" style="border: 1px solid #AAAAAA; margin-left:20px;"  />
			<input type="submit" value=" <?php _e('Add sectionizer','sczr'); ?> " class="button-primary" id="sczr_add_btn" name="sczr_add_btn">	
		</form>
	</div>
  </div>	
 </div>
<?php
}
function sczr_add_new_sectionizer(){
	global $wpdb,$sczr_msg;
	$table_name = $wpdb->prefix . "sectionizer"; 
		if(isset($_GET['add']) && $_GET['add']==1) {
			$option=$_POST['add_new_section'];		
			if(!get_option($_POST['add_new_section'])){
					if($option){		
						$option = preg_replace('/[^a-z0-9\s]/i', '', $option);  
						$option = str_replace(" ", "_", $option);				
						$options = get_option($option);				
						if($options){
							$sczr_msg = "Please Choose Different Name";				
						}
						else{					
							$sql = "INSERT INTO " . $table_name . " values ('','".$option."','1');";						
							if ($wpdb->query( $sql )){
									add_option($option, sczr_defaults_options());
									$sczr_msg = 'Sectionizer Successfully Created';
							}				
						}
					}else{$sczr_msg =  "Please Choose Different Name";}
			}else{$sczr_msg =  "Please Choose Different Name";}
		}else{$sczr_msg =  "Please Choose Different Name";} ?>
		<div class="sczr_show_message"> <?php echo $sczr_msg; ?> </div>
<?php } 
function sczr_display_section_content($content){
global $post;
$sczr_pageId = $post->ID;
$chk_sczr_disable = get_post_meta($sczr_pageId,'sczr_disable_check',true );
$sczr_pageId = $post->ID;
$sczr_id = get_post_meta($sczr_pageId,'sczr_selection',true ); 
$option_name = sczr_getoptions($sczr_id);
$option_Arr = get_option($option_name);
$option_Arr['sczr_section_count'];
$section = get_post_meta($post->ID, 'sczr_textarea');
$content = get_the_content() ;
if (($chk_sczr_disable=='true')) {  
$i=0;
foreach($section as $arr_val => $key ){ 
	foreach($key as $val=>$value) {
		if($val< $option_Arr['sczr_section_count']){
			$value = "<div class='section' id='sczr_".$i."_content'> 	 
						$value  </div>";
			$content .=	$value;     
			} 		  
			$i++;			
		}
	}
}	 
return  $content;
}
add_filter('the_content', 'sczr_display_section_content'); 
function sczr_getoptions($user_option_id){
 global $wpdb,$option_Arr ;
 $option_name = 0;
 $table_name = $wpdb->prefix . "sectionizer";				
 $rows_count = $wpdb->get_results("SELECT  * FROM $table_name");
   foreach($rows_count as $row){   
    if($row->id == $user_option_id){
    $option_name = $row->option_name;
    }
   }    
return $option_name;
} ?>