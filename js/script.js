/**
 * @author Andrew Rickmann
 */

// Use jQuery via jQuery(...)
     jQuery(document).ready(function(){
       jQuery("span.cfh-wrap span.cfh-url").each( function (i){
	   	linkText = jQuery(this).text();
		jQuery(this).replaceWith('<a href="'+linkText+'" title="Visit the commenter\'s website">'+linkText+'</a>');
	   });
     });