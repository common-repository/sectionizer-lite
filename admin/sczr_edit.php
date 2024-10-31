<?php 
function edit_sectionizer(){ 
    $sczr_options = $_GET['edit'];
	if($_GET["edit"]){ $sczr_options = $_GET['edit']; }
	else{$sczr_options ='sczr_options';	}	
	if (isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated']=="true"){	} 
?>	
<div class="sczrwrapper clearfix">
	<div id="sczr_icon-theme" class="icon32"></div>
	<h2><?php _e('Sectionizer Setting\'s','sczr');?></h2>
</div>
<div class="sczr_edit_form postbox" >		
<div class="inside">
<form name="sczr_editform" method="POST" action="options.php">
<?php 
wp_nonce_field('update-options'); 
$sczr_option = get_option($sczr_options);
?>
<div class="sczr_general_settings postbox">
<div class="handlediv"> </div>
<h3 class="hndle"><span> <?php _e('General Settings','sczr'); ?> </span></h3>
	<table  id="edit_sczr" class="inside" style="padding:20px;width:100%">	                    
		<tr>						
			<td style="width: 174px;"> <?php _e('Choose Direction for Sectionizer ','sczr'); ?></td>
			<td style="width: 174px;"> 			
				<select style="width:136px;" id="sczr_direction" name="<?php echo $sczr_options; ?>[sczr_direction]">
					<option <?php selected('Vertical', $sczr_option['sczr_direction']); ?> value="Vertical"><?php _e('Vertical','sczr'); ?></option>
					<option <?php selected('Horizontal Top', $sczr_option['sczr_direction']); ?> value="Horizontal Top"><?php _e('Horizontal Top','sczr'); ?></option>
					<option <?php selected('Horizontal Bottom', $sczr_option['sczr_direction']); ?> value="Horizontal Bottom"><?php _e('Horizontal Bottom','sczr'); ?></option>					
				</select>			
			</td> 
		</tr> 		
		<tr class="sczr_position  <?php if (($sczr_option['sczr_direction'] === 'Horizontal Top') || ($sczr_option['sczr_direction'] === 'Horizontal Bottom') ){echo 'hide_row';}else{echo 'show_row' ;} ?>">								
			<td style="width: 174px;"> <?php _e('Choose Position for Sectionizer ','sczr'); ?></td>
			<td style="width: 174px;"> 			
				<select style="width:136px;" name="<?php echo $sczr_options; ?>[sczr_position]">
					<option <?php selected('LeftTop', $sczr_option['sczr_position']); ?> value="LeftTop"><?php _e('LeftTop','sczr'); ?></option>
					<option <?php selected('LeftCenter',$sczr_option['sczr_position']); ?> value="LeftCenter"><?php _e('LeftCenter','sczr'); ?></option>
					<option <?php selected('LeftBottom',$sczr_option['sczr_position']); ?> value="LeftBottom"><?php _e('LeftBottom','sczr'); ?></option>
					<option <?php selected('RightTop', $sczr_option['sczr_position']); ?> value="RightTop"><?php _e('RightTop','sczr'); ?></option>
					<option <?php selected('RightCenter',$sczr_option['sczr_position']); ?> value="RightCenter"><?php _e('RightCenter','sczr'); ?></option>
					<option <?php selected('RightBottom',$sczr_option['sczr_position']); ?> value="RightBottom"><?php _e('RightBottom','sczr'); ?></option>
				</select>			
			</td> 
		</tr> 
		<tr class ="sczr_width <?php if (($sczr_option['sczr_direction'] === 'Horizontal Top') || ($sczr_option['sczr_direction'] === 'Horizontal Bottom')){echo 'show_row';}else{echo 'hide_row' ;} ?>" >		
			<td style="width: 174px;"> <?php _e('Choose the width mode for Sectionizer ','sczr'); ?></td>			
			<td style="width: 174px;"> 			
				<select style="width:136px;" id="sczr_width"  name="<?php echo $sczr_options; ?>[sczr_width]">
					<option <?php selected('FullWidth', $sczr_option['sczr_width']); ?> value="FullWidth"><?php _e('FullWidth','sczr'); ?></option>
					<option <?php selected('CustomWidth',$sczr_option['sczr_width']); ?> value="CustomWidth"><?php _e('CustomWidth','sczr'); ?></option>
				</select>	
		    </td> 		
		</tr>
		<tr class="custom_width <?php if (($sczr_option['sczr_width'] === 'CustomWidth')&& (($sczr_option['sczr_direction'] === 'Horizontal Top') || ($sczr_option['sczr_direction'] === 'Horizontal Bottom') )){echo 'show_row';}else{echo 'hide_row' ;} ?> ">								
			<td style="width: 174px;"> <?php _e('Please Enter custom width ','sczr'); ?></td>
			<td style="width: 174px;"> <input type="text" style="143px;" name="<?php echo $sczr_options; ?>[sczr_customwidth]" value="<?php echo $sczr_option['sczr_customwidth'] ;?>"/> <span style="font-size:10px; color:#302C2C"> <?php _e('In pixel','sczr'); ?>  </span> </td> 
		</tr>			
		<tr>								
			<td style="width: 174px;"> <?php _e('Choose Background color for Sectionizer ','sczr'); ?></td>		
			<td style="width: 174px;"> 
			  <div class="sczr_colwrap">			  
				 <input id="sczr_color_scheme" style="143px;" name="<?php echo $sczr_options; ?>[sczr_bg_color]" value="<?php echo $sczr_option['sczr_bg_color'] ?>" type="text" value="#eeeeee" /> 
			     <div class="sczr_colsel sczr_color_scheme"></div> 
			  </div>	
			</td> 		 
		</tr>
		<tr>								
			<td style="width: 174px;"> <?php _e('Choose text color for Sectionizer ','sczr'); ?></td>
			<td style="width:174px;">
               	<div class="sczr_text_color">	
					<input id="sczr_text_color" type="text"style="143px;"name="<?php echo $sczr_options; ?>[sczr_text_color]" value="<?php echo $sczr_option['sczr_text_color'] ;?>"/>
                    <div class="sczr_textcol sczr_col_scheme"></div>
				 </div>
			</td> 		    
		</tr>
        <tr>								
			<td style="width: 174px;"> <?php _e('Scroll distance to show sectionizer','sczr'); ?></td>
			<td style="width: 174px;"> <input id="sczr_distance" type="text" style="143px;" name="<?php echo $sczr_options; ?>[sczr_top_distance]" value="<?php echo $sczr_option['sczr_top_distance'] ;?>"/> <span style="font-size:10px; color:#302C2C"> <?php _e('In pixel','sczr'); ?>  </span> </td> 
		</tr> 		
       </table>	   
	   </div>
		<div class="sczr_social postbox">
			<div class="handlediv"> </div>
				<h3 class="hndle"><span> <?php _e("Social Network Settings",'sczr'); ?> </span></h3>					    
				  <table class="inside" style="padding:20px;width:100%">								
						<tr>
							<td style="width: 174px;"><?php _e("Facebook Follow Link",'sczr'); ?> </td>									
							<td style="width: 174px;"> <input type="text" name="<?php echo $sczr_options; ?>[sczr_facebookUrl]" style="width:143px;" value="<?php echo $sczr_option['sczr_facebookUrl'] ?>" /></td>     									
						</tr>	
						<tr>
							<td style="width: 174px;"><?php _e("Twitter Follow Link",'sczr'); ?> </td>
							<td style="width: 174px;"> <input type="text" name="<?php echo $sczr_options; ?>[sczr_twitterUrl]" style="width:143px;" value="<?php echo $sczr_option['sczr_twitterUrl'] ?>" /></td>
						</tr>
						<tr>
							<td style="width: 174px;"><?php _e("Linkedin Follow Link",'sczr'); ?> </td>
							<td style="width: 174px;"> <input type="text" name="<?php echo $sczr_options; ?>[sczr_linkedinUrl]" style="width:143px;" value="<?php echo $sczr_option['sczr_linkedinUrl'] ?>" /></td>	
						</tr>	 
						 <tr>
							<td style="width: 174px;"><?php _e("Google Plus Follow Link",'sczr'); ?> </td>
							<td style="width: 174px;"> <input type="text" name="<?php echo $sczr_options; ?>[sczr_googleUrl]" style="width:143px;" value="<?php echo $sczr_option['sczr_googleUrl'] ?>" /></td>	
						</tr>								
						<tr>
							<td style="width: 174px;"><?php _e("RSS Feedback Link",'sczr'); ?> </td>
							<td style="width: 174px;"> <input type="text" name="<?php echo $sczr_options; ?>[sczr_rssUrl]" style="width:143px;" value="<?php echo $sczr_option['sczr_rssUrl'] ?>" /></td>									
						</tr>									
						<tr>
							<td style="width: 174px;"> <?php _e("Show ScrollTop Button",'sczr'); ?> </td>
							<td style="width: 174px;">									  
							   <input id="sczr_scroll" type="checkbox" <?php if(isset($sczr_option['sczr_scrolltop_btn_chk'])) checked('1', $sczr_option['sczr_scrolltop_btn_chk'],true);?>  name="<?php echo $sczr_options; ?>[sczr_scrolltop_btn_chk]" value = "1"/>									   
							   <label for="sczr_scroll"> <span class="snbar_form_msg"> <?php _e("Check it to show scroll top button",'sczr'); ?> </span> </label>
							</td>
						</tr>
					</table>
		</div><!--sczr_display end-->
		<div class="add_sections postbox">
			<div class="handlediv"> </div>
				<h3 class="hndle"><span> <?php _e("Create sections Settings",'sczr'); ?> </span></h3>
					<table class="inside" style="padding:20px;width:100%">
			<tr>
			  <td>
				<ul id="sczr_sections">
				 <?php	
					$indx = 0;	              				
					if(!empty($sczr_option['sczr_secs'])) {	                    
					foreach($sczr_option['sczr_secs'] as $sczr_secs){ 
					?>  <li>
							<div class="clearfix"> <span style="width:288px; float:left"> <?php _e('Add Section Name','sczr'); ?> </span> <span> <input type="text" style="width:143px;" class="sczr_section_title"  name="<?php echo $sczr_options; ?>[sczr_secs][<?php echo $indx; ?>]" value="<?php echo stripslashes($sczr_secs); ?>"  />
							<input type="button" class="button-primary" value="Add new" onClick="sczr_add_section(this);" /> 
							<input type="button" class="button-primary" value="Remove" onClick="sczr_delete_field(this);" />					
							</span>	</div>
						</li>                    				 
					<?php 
						$indx++;	
					  }
					}else{ ?>
						<li>
							<div class="clearfix"> <span style="width:280px;float:left"> <?php _e('Add Section Name','sczr'); ?> </span> <span> <input type="text" class="sczr_section_title"  name="<?php echo $sczr_options; ?>[sczr_secs][<?php echo $indx; ?>]" value=""  />
							<input type="button" class="button-primary" value="Add new" onClick="sczr_add_section(this);"  />
							<input type="button" class="button-primary" value="Remove" onClick="sczr_delete_field(this);" />
							</span>
							</div>
						 </li>					
				 <?php 	} ?>	
				</ul>
			   </td>			
			 </tr>  
			<tr> <td> <input type="hidden" size="8" id="sczr_section_count" name="<?php echo $sczr_options; ?>[sczr_section_count]" value="<?php echo $sczr_option['sczr_section_count']; ?>"/> </td> </tr>		  
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" id="sczr_option" value="<?php echo $sczr_options; ?>" />		
		</table>
		</div>
		<p>
		<input type="submit" onClick="sczr_count_sections();" value="<?php _e('Save Settings','sczr'); ?>" class="button-primary"  id="sczr_update" name="sczr_update">	
		</p> 
</form>
</div>
<?php } ?>