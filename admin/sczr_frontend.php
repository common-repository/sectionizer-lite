<?php
function sczr_front_display(){
if(!is_admin()){
	global $wp_query;
	$post = $wp_query->post;
	$sczr_pageId = $post->ID;
	$chk_sczr_disable = get_post_meta($sczr_pageId,'sczr_disable_check',true );
    $sczr_id = get_post_meta($sczr_pageId,'sczr_selection',true );			
	if (($chk_sczr_disable=='true'))
	{ 
?>	
<div class="sczr_front_display" style="display:none;z-index:99999;">
<?php
 $option_name = sczr_getoptions($sczr_id);
 $option_Arr = get_option($option_name); 
   $sczr_fb = 0;
  if(array_key_exists("sczr_facebookUrl" ,$option_Arr))
  $sczr_fb =str_replace(' ','',$option_Arr['sczr_facebookUrl']); 
  $sczr_tweet = 0;  
  if(array_key_exists("sczr_twitterUrl" ,$option_Arr))
  $sczr_tweet =str_replace(' ','',$option_Arr['sczr_twitterUrl']);
  $sczr_linkden = 0;  
  if(array_key_exists("sczr_linkedinUrl" ,$option_Arr));
  $sczr_linkden = str_replace(' ','', ($option_Arr['sczr_linkedinUrl'])); 
  $sczr_google = 0;
  $sczr_google =str_replace(' ','',$option_Arr['sczr_googleUrl']);
  if(array_key_exists("sczr_googleUrl" ,$option_Arr));
  $sczr_rss = 0 ;
  if(array_key_exists("sczr_rssUrl" ,$option_Arr))
  $sczr_rss = str_replace(' ','',$option_Arr['sczr_rssUrl']); 
  $sczr_scroll =0;
  if(array_key_exists("sczr_scrolltop_btn_chk" ,$option_Arr))
  $sczr_scroll = $option_Arr['sczr_scrolltop_btn_chk']  
?>
	<style type="text/css">
		.sczr_front_sectionizer{ background-color: <?php echo $option_Arr['sczr_bg_color']; ?>; }
		.sczr_front_sectionizer ul li a { color: <?php echo $option_Arr['sczr_text_color'];?> }
		.sczr_front_sectionizer ul li a:hover{ color: <?php echo $option_Arr['sczr_text_hover_color'];?>;text-decoration:none; cursor:pointer; }
		.sczr_front_display .sczr_front_sectionizer.Horizontal_top.fullwidth{ border: 1px solid #CCCCCC; height: auto; left: 0; margin: 0 auto; position: fixed; right: 0; top: 0; width:100%; 	} 
		.sczr_front_display .sczr_front_sectionizer.Horizontal_bottom.fullwidth{ border: 1px solid #CCCCCC; height: auto; left: 0; margin: 0 auto; position: fixed; right: 0; bottom: 0; width:100%; 	} 
		.sczr_front_display .Horizontal_top{ border: 1px solid #CCCCCC; height: auto; left: 0; margin: 0 auto; position: fixed; right: 0; top: 0; width: <?php echo $option_Arr['sczr_customwidth'];?>px; 	}
		.sczr_front_display .Horizontal_bottom { border: 1px solid #CCCCCC; height: auto; left: 0; margin: 0 auto; position: fixed; right: 0; bottom: 0; width: <?php echo $option_Arr['sczr_customwidth'];?>px; }
  	</style>
	<div class="sczr_front_sectionizer <?php if($option_Arr['sczr_direction']=='Vertical'){if( $option_Arr['sczr_position']=='LeftTop'){ echo 'sectionizer_top'; }elseif ( $option_Arr['sczr_position']=='LeftBottom'){ echo 'sectionizer_leftbottom'; } elseif ( $option_Arr['sczr_position']=='LeftCenter'){ echo 'sectionizer_leftcenter'; } elseif ( $option_Arr['sczr_position']=='RightTop'){ echo 'sectionizer_righttop'; }elseif ( $option_Arr['sczr_position']=='RightCenter'){ echo 'sectionizer_RightCenter'; }elseif ( $option_Arr['sczr_position']=='RightBottom'){ echo 'sectionizer_RightBottom'; } } else{ if($option_Arr['sczr_direction']=='Horizontal Top'){ echo 'Horizontal_top'; }elseif($option_Arr['sczr_direction']=='Horizontal Bottom'){ echo 'Horizontal_bottom';} }?> <?php if($option_Arr['sczr_width']=='FullWidth'){ echo "fullwidth"; } ?>">
		<div class="sczr_social">
			<a href="<?php echo  $sczr_fb; ?>" target="_blank"> <div class="sczr_fbicon <?php if( $sczr_fb ==''){echo "szcr_front_hide";} ?>"> </div></a>
			<a href="<?php echo  $sczr_tweet; ?>" target="_blank"> <div class="sczr_tweeticon <?php if( $sczr_tweet ==''){echo "szcr_front_hide";} ?>"> </div></a>
			<a href="<?php echo  $sczr_linkden; ?>" target="_blank"> <div class="sczr_linkicon <?php if( $sczr_linkden ==''){echo "szcr_front_hide";} ?>"> </div></a>
			<a href="<?php echo  $sczr_google; ?>" target="_blank"> <div class="sczr_gogleicon <?php if( $sczr_google ==''){echo "szcr_front_hide";} ?>"> </div></a>
			<a href="<?php echo  $sczr_rss; ?>" target="_blank" > <div class="sczr_rssicon <?php if($sczr_rss ==''){echo "szcr_front_hide";} ?> "> </div></a>
		</div>  	
	    <div class="sczr_sec_link">		
			<ul>		
				<?php $section_arr = $option_Arr['sczr_secs']; $i=0; foreach($section_arr as $key){ ?>
					<li> <a id="sczr_<?php echo $i; ?>"> <?php echo  $key ; ?></a></li>			
				<?php $i++ ; } ?>			
			</ul>
	     </div>	
		 <input type="hidden" id="show_sczr_var" value="<?php echo $option_Arr['sczr_top_distance'] ;?>" />
      <?php if($sczr_scroll == '1' ){ ?><div class="sczr_scroll_btn" title="scroll to top" > <span style=" padding-left: 27px;"> <?php _e("Back to Top",'sczr'); ?> </span> </div> 
	   <?php }
			$sczr_from_this = "http://wpfruits.com/?snbar_refs=".$_SERVER['SERVER_NAME']; ?>		  
			 <div style="float: left;width: 100%;">  <span style="   background-color: #FFFFFF;color: #000000; font-size: 10px; font-weight: bold; position: absolute; right: 0; top: 0;"> <a style="text-decoration:none;" title="Wpfruits.com"  href="<?php echo $sczr_from_this ; ?>" target="_blank"> <?php _e('WPF','snbar'); ?> </a> </span> </div> 	  </div>
<script type="text/javascript"> 
 jQuery(window).load(function(){
 if (jQuery('.sczr_front_sectionizer').hasClass('sectionizer_leftcenter')){
    var left_window_value = jQuery(window).height();
    left_window_value = left_window_value / 2 ;	
	var sectionizer_height = jQuery('.sczr_front_sectionizer').height();
	sectionizer_height = sectionizer_height/2;
	sectionizer_pos = left_window_value - sectionizer_height ;
	jQuery('.sectionizer_leftcenter').css({'top':sectionizer_pos}); 
 }else if(jQuery('.sczr_front_sectionizer').hasClass('sectionizer_RightCenter')){
    var window_value = jQuery(window).height();
	window_value = window_value / 2 ;
	var sectionizer_height = jQuery('.sczr_front_sectionizer').height();
	sectionizer_height = sectionizer_height/2;
	sectionizer_pos = window_value - sectionizer_height ;
	jQuery('.sectionizer_RightCenter').css({'top':sectionizer_pos});  
 }else{}
 }) ;  
 jQuery (document).ready(function(){
	jQuery(".sczr_front_sectionizer ul li a").click(function() {
	var selected = jQuery(this).attr('id');
	selected = '#'+selected+'_content';
	var divPosition = jQuery(selected).offset();
	jQuery('html, body').animate({scrollTop: divPosition.top}, "slow");
	})	
	jQuery(".sczr_scroll_btn").click(function() {
	jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});		
})
	 jQuery (document).ready(function(){
			  var sczr_value_txt = jQuery("#show_sczr_var").val();	
			  jQuery(window).scroll(function() {             		
				var sczr_windowtop = jQuery(window).scrollTop();		
				
					if(sczr_windowtop > sczr_value_txt){
						jQuery('div.sczr_front_display').fadeIn(300);			
					}
					else{			
						jQuery('div.sczr_front_display').fadeOut(300);		
					}		
			});
		});	




</script>
<?php 
     }
  }
} add_action('wp_footer', 'sczr_front_display'); 
?>