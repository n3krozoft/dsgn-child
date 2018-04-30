;
(function ($) {
	// Declare Flexslider function, in order to prevent JS errors.
	$.fn.flexslider = function(options) {};
})(jQuery);
  
  
jQuery(document).ready(function($){
		
		/* 
		 * Outgoing Links = new window
		 ****************************************************
		 */
		
		$("a[href^=http]").each(
		   function(){
		      if(this.href.indexOf(location.hostname) === -1) {
		      $(this).attr('target', '_blank');
					}
		   }
		 );
		 
		 /* 
		  * 1.
		  * EmailSpamProtection (jQuery Plugin)
		  ****************************************************
		  * Author: Mike Unckel
		  * Description and Demo: http://unckel.de/labs/jquery-plugin-email-spam-protection
		  * HTML: <span class="email">info [at] domain.com</span>
		  */
		 $.fn.emailSpamProtection = function(className) {
		 	return $(this).find("." + className).each(function() {
		 		var $this = $(this);
		 		var s = $this.text().replace(" [at] ", "&#64;");
		 		$this.html("<a href=\"mailto:" + s + "\">" + s + "</a>");
		 	});
		 };
		 $("body").emailSpamProtection("email");
		
}); // end document ready