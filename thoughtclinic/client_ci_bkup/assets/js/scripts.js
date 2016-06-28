
	$(document).ready(function() {
		$("#cust_form").validate({
			rules: {
				cust_name:{
						required:true,		
				},	
                cust_email:{
						required:true,		
						email:true,		
				},		
                formatted_address:"required",							
                cust_phone:{
						required:true,		
						number:true,		
				},					
			}
		});
	});
	
	$(document).ready(function() {
		$("#signin").validate({
			rules: {
				user_name:{
						required:true,		
				},	
                user_email:{
						required:true,		
						email:true,		
				},		
                user_address:"required",							
                user_city:"required",							
                user_state:"required",							
                user_cont:{
						required:true,		
						number:true,		
				},					
			}
		});
	});
	
	$(document).ready(function() {
		$("#login").validate({
			rules: {
				
                user_email:{
						required:true,		
						email:true,		
				},		
                user_password:"required",							
			}
		});
	});
	
	