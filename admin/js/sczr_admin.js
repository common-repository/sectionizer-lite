function sczr_add_section(field) {

		var optn = jQuery('#sczr_option').val();		

		var indx  = jQuery("#sczr_sections li").size();	            		

		var sczr_section_title = jQuery(field).parent('li').find('.sczr_section_title').val();	      

		var field_html  = '<div class="clearfix"> <span style="width:280px;float:left"> Add Section Name </span><span><input style="width:143px;" type="text" id="sczr_section_title" name="'+ optn +'[sczr_secs]['+ indx +']" value=""  />'

		field_html  += '<input class="button-primary" type=\"button\" value=\"Add new\" onClick=\"sczr_add_section(this);\"/>  <input class="button-primary" type=\"button\" value=\"Remove\" onClick=\"sczr_delete_field(this);\"/> </span> </div>';	   

		jQuery('#sczr_sections li:last').after("<li>" + field_html + "</li>");

		jQuery(field).parent().next().stop().slideDown('fast');

	}

	

function sczr_delete_field( field )	{

	jQuery(field).parents('li').fadeOut('slow', function(e){

		jQuery(field).parents('li').remove();

	});

}

	

	//Count number of sections

function sczr_count_sections(){	

 var list_count = jQuery("#sczr_sections li").size();

 jQuery('#sczr_section_count').val(list_count);	 

}	

	//Count number of sections

 

   // create Dynamic sections in pages/posts               

jQuery('document').ready(function(){

    jQuery('.sczr_selection').change(function(){

		jQuery('.sczr_post_section_area ul li').removeClass('sczr_show_textarea');	   

		var i;

		var option_sec_count = jQuery('.sczr_selection :selected').attr('section-count'); 

		var val = jQuery('.sczr_post_section_area ul li').length;				

		for(i=0; i<option_sec_count; i++){		

		  jQuery('.sczr_post_section_area ul li').eq(i).addClass('sczr_show_textarea');  

		} 	

	});

});





jQuery('document').ready(function(){

    jQuery('#sczr_direction').change(function(){	

		var option_count = jQuery('#sczr_direction :selected').text(); 

		if(option_count =='Vertical'){

			jQuery('.sczr_position').removeClass('hide_row');

            jQuery('.sczr_position').addClass('show_row');

            jQuery('.sczr_width').addClass('hide_row');	

            jQuery('.sczr_width').removeClass('show_row');

			 jQuery('.custom_width').addClass('hide_row');	

			 jQuery('.custom_width').removeClass('show_row');	                 			

		}else{

		 var option_count_text = jQuery('#sczr_width :selected').text(); 

		if(option_count_text=='CustomWidth'){



       jQuery('.custom_width').addClass('show_row');	

			 jQuery('.custom_width').removeClass('hide_row');	            



		}

		  jQuery('.sczr_position').addClass('hide_row');

          jQuery('.sczr_position').removeClass('show_row');	

         jQuery('.sczr_width').addClass('show_row');

         jQuery('.sczr_width').removeClass('hide_row'); 

		 

			 

		}				

    });

});



jQuery('document').ready(function(){

    jQuery('#sczr_width').change(function(){	

		var option_count = jQuery('#sczr_width :selected').text(); 

		if(option_count=='CustomWidth'){

			jQuery('.custom_width').removeClass('hide_row');

            jQuery('.custom_width').addClass('show_row');           		

		}else{

		  jQuery('.custom_width').addClass('hide_row');

          jQuery('.custom_width').removeClass('show_row');       		  

		}				

    });

});



function sczr_delconfirm(sczr){   

	sczr = " '"+sczr+"' ";

	var sczr_agree = confirm('Are you sure you want to delete ' + sczr + ' Sectionizer ?');

	return sczr_agree; 

} 





jQuery(window).load(function(){

	jQuery('.sczr_post_section_area ul li').removeClass('sczr_show_textarea');	   

	var i;

	var option_sec_count = jQuery('.sczr_selection :selected').attr('section-count'); 

	var val = jQuery('.sczr_post_section_area ul li').length;

			

	  for(i=0; i<option_sec_count; i++){		

		jQuery('.sczr_post_section_area ul li').eq(i).addClass('sczr_show_textarea');  

		} 	

});





jQuery('document').ready(function(){

		if(jQuery('#sczr_check').prop('checked')==false) {		

		} else {	

			jQuery(".sczr_disable").slideDown();

		}

		

		if( jQuery('#sczr_disable_check').prop('checked')==false) {

			jQuery(".sczr_select").slideUp();

		} else {

		   jQuery(".sczr_select").slideDown();

		}		

		

		jQuery('#sczr_check').click(function() {		

		 if( jQuery('#sczr_disable_check').is(':checked')) {

			jQuery(".sczr_disable").slideUp();

		} else {

		   jQuery(".sczr_disable").slideDown();

		}		

	    }); 

	

	 jQuery('#sczr_disable_check').click(function(){

		if( jQuery('#sczr_disable_check').is(':checked')) {

			jQuery(".sczr_select").slideDown();

		} else {

		   jQuery(".sczr_select").slideUp();

		}

	 }); 

});



jQuery(document).ready(function(){

   if(jQuery('.sczr_color_scheme').length)

   jQuery('.sczr_color_scheme').farbtastic('#sczr_color_scheme');

   jQuery('html').click(function() {jQuery(".sczr_edit_form .farbtastic").fadeOut('fast');});

		jQuery('.sczr_edit_form .sczr_colsel').click(function(event){

			jQuery(".sczr_edit_form .farbtastic").hide();

			jQuery(this).find(".farbtastic").fadeIn('fast');event.stopPropagation();

		});

});





jQuery(document).ready(function(){

   if(jQuery('.sczr_col_scheme').length)

   jQuery('.sczr_col_scheme').farbtastic('#sczr_text_color');

   jQuery('html').click(function() {jQuery(".sczr_text_color .farbtastic").fadeOut('fast');});

		jQuery('.sczr_text_color .sczr_textcol').click(function(event){

			jQuery(".sczr_text_color .farbtastic").hide();

			jQuery(this).find(".farbtastic").fadeIn('fast');event.stopPropagation();

		});

});



jQuery(document).ready(function(){

	jQuery('.sczr_edit_form .handlediv,.hndle').click(function(){

		jQuery(this).parent().find('.inside').slideToggle("fast");

	});

});