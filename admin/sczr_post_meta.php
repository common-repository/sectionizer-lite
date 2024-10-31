<?php
add_action("admin_menu", "sczr_post_meta_box_options");
add_action('save_post', 'sczr_post_meta_box_save');
function sczr_post_meta_box_options(){
	if( function_exists( 'add_meta_box' ) ) {
		$post_types=get_post_types(); 
		foreach($post_types as $post_type) {
			add_meta_box("sczr_post_metas", "Select Sectionizer for this page/post", "sczr_post_meta_box_add", $post_type, "normal", "high");
		}
    }
	else{}
}
function sczr_post_meta_box_add(){
	global $post,$wpdb;
    $count=0;  
	$sczr_custom = get_post_custom($post->ID);
    if(!isset($sczr_custom['sczr_check']))
	$sczr_custom['sczr_check']='0';
	if(!isset($sczr_custom['sczr_selection']))
	$sczr_custom['sczr_selection']='0';
	$sczr_selection = $sczr_custom['sczr_selection'][0];
	if(!isset($sczr_custom['sczr_disable_check']))
	$sczr_custom['sczr_disable_check']='0';
	$sczr_disable_check = $sczr_custom['sczr_disable_check'][0];	
	$sczr_check = $sczr_custom['sczr_check'][0]; 
	$table_name = $wpdb->prefix . "sectionizer"; 
	$sczr_data = $wpdb->get_results("SELECT * FROM $table_name where active='1' ORDER BY id DESC"); 
?>  <div class="sczr_disable">	
		<div class="sczr_checkbox">
			<input type="checkbox" name="sczr_disable_check" id="sczr_disable_check" <?php if($sczr_disable_check){ ?> checked <?php } ?> value="true"/>&nbsp;<label for="sczr_disable_check"><?php _e('Add "Sectionizer" to this post/page..','sczr'); ?> </label>
		</div>	
		<div class="sczr_select">
		<?php if($sczr_data){ ?>
		 <select name="sczr_selection" class="sczr_selection" style="width:150px;">
			<option class="sczr_options"  value="<?php echo $count; ?>" ><?php echo "Default" ;?></option>
				<?php
				foreach ($sczr_data as $data) { 
				$optn_name = $data->option_name;
				$option_Arry = get_option($optn_name);
	            $count = $option_Arry['sczr_section_count'];		
                $sczr_sec_count[]= $count;
  				?>	
			<option class="sczr_options" section-count="<?php echo $count; ?>" value="<?php echo $data->id; ?>" <?php if($sczr_selection == $data->id ){ echo 'selected="selected"'; }?>><?php echo $data->option_name; ?></option>
		 <?php }  ?>
		 </select>
		 <?php  $max_val =  max($sczr_sec_count);
				// echo $max_val;				
			}
			else{
				?><span style="color:red"><?php _e("Sectionizer(s) not activated / created.",'sczr') ?></span><?php
			} ?>
        <div class="sczr_post_section_area">  
			<ul>
			<?php 
			$j='';
			for($i=0;$i<$max_val;$i++){ ?>		 
				  <li class="sczr_hide_textarea" style="list-style:none;">
					<div class="clearfix">				   
				   <?php 
				     $j = $i+1;				   
					 echo "<span style=' float: left; font-size: 15px; font-weight: bold; padding-top: 14px; width: 100px;'> Section $j </span>";
					 $feild_val = get_post_meta($post->ID, "sczr_textarea"); 
					if(!empty($feild_val)){ 
						foreach($feild_val as $val){   
						?>
						<textarea class="sczr_sections" style="width:80%;" id="sczr_textarea<?php echo $i;?>" name="sczr_textarea[]"> <?php echo $val[$i]; ?> </textarea> 
						<div> 
					</li>    
						<?php
						}
					}else{					
						?>
						<textarea class="sczr_sections" style="width:80%;" id="sczr_textarea<?php echo $i;?>" name="sczr_textarea[]"></textarea> 
					  </div>
					</li>    
					 <?php
					}
				}
			?>	</ul>
			<input type="hidden" name="sczr_data_submit" value="1" />
		</div>
	 </div>		
	</div> 	
<?php }
function sczr_create_textarea(){
	global $post;
	$sczr_pageId = $post->ID;
	$sczr_id = get_post_meta($sczr_pageId,'sczr_selection',true );
	$option_name = sczr_getoptions($sczr_id);
	$option_Arr = get_option($option_name);
	$count = $option_Arr['sczr_section_count'];
	for($i=1; $i<= $count;$i++){
	    $sczr_feild = "sczr_section_$i";    
	}
}
function sczr_post_meta_box_save(){
	global $post;
	if(isset($_POST['sczr_data_submit'])){
	update_post_meta($post->ID, "sczr_selection",$_POST['sczr_selection']);
	update_post_meta($post->ID, "sczr_disable_check",$_POST['sczr_disable_check']);
	update_post_meta($post->ID, "sczr_check",$_POST['sczr_check']);		
    update_post_meta($post->ID, "sczr_textarea",$_POST['sczr_textarea']);
	}
} ?>