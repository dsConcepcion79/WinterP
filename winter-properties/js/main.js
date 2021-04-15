/* 
 * Scripts for nav menu click
*/
var on_hover_link = document.querySelectorAll('.menu__list > li.menu-item-has-children > a');
for(i=0;i<on_hover_link.length;i++){
	on_hover_link[i].addEventListener("click", function(e){
		
		e.preventDefault();
		
		var display_sub_menu = this.parentElement.querySelector('.sub-menu');
		
		var isBlock = display_sub_menu.style.display;
		
		if(isBlock !== 'block'){
			display_sub_menu.style.display = 'block';
		}else{
			display_sub_menu.style.display = 'none';
		}
		
	});
}


// Investment columns in mobile screen 

const mq = window.matchMedia( "(max-width: 767px)" );
if (mq.matches) {

jQuery('.inv_flex_row').each(function(){

  var child_length = jQuery(this).find('.inv_str_cotnent_column');
  
	if(child_length.length == 1){
		jQuery(child_length).attr('style', 'flex: 0 100%;');
	}
	if(child_length.length == 2){
	   jQuery(child_length).attr('style', 'flex: 0 50%;');
	}
    if(child_length.length == 3){
	   jQuery(child_length).attr('style', 'flex: 0 50%;');
    }

});
	
}else{
	jQuery('.inv_flex_row').each(function(){

	  var child_length = jQuery(this).find('.inv_str_cotnent_column');
	  
		if(child_length.length == 1){
			jQuery(child_length).attr('style', 'flex: 0 100%;');
		}
		if(child_length.length == 2){
		   jQuery(child_length).attr('style', 'flex: 0 50%;');
		}
		if(child_length.length == 3){
		   jQuery(child_length).attr('style', 'flex: 0 33%;');
		}

	});
}



// Remove empty div from gallery grid module
jQuery('.team-list__item').each(function(){
    var listHtml = jQuery(this).html();
    if(listHtml == ''){
        jQuery(this).remove();
    }
});


















