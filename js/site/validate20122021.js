(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		$.validator.addMethod("pwcheck", function(value) {
		   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
			   && /[a-z]/.test(value) // has a lowercase letter
			   && /\d/.test(value) // has a digit
		});
	    $.validator.addMethod("nameRegex", function(value, element) {

        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);

        }, "Name must contain only albhabets.");
				
             $("#register-form").validate({
                rules: {
                    first_name: {required:true,
								 nameRegex:true },
                    last_name:  {required:true,
								 nameRegex:true },
                    email: {
                        required: true,
                        email: true,
						remote:
						{
						  url: baseurl+'site/user/check_email',
						  type: "post",
						  data:
						  {
							  email: function()
							  {
								  return $('#register-form :input[name="email"]').val();
							  }
						  }
						}
                    },
                    password: {
                        required: true,
						pwcheck:true,
                        minlength: 5
                    },
					zipcode:
					{
					required:true
					}
				   },
                messages: {
                     first_name: {
                        required: "Please enter first name",
                        nameRegex: "First Name must be albhabets"
                    }, 
					last_name: {
                        required: "Please enter last name",
                        nameRegex: "Last Name must be albhabets"
                    },
					password: {
                        required: "Please provide a password",
                        pwcheck: "Please provide a strong password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: {
						required: "Please enter your email",
						email:"Please enter a valid email address",
						remote:"Already exist"
					},
					zipcode:"Please enter your zipcode"
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/signup_process',
							dataType: "json",
							data: $('#register-form').serialize(),
							success: function(data)
							{ 
								if (data['result'] == 'error')
								{
								  swal({title: "Oops", text: "This email address is already registered.", type: "error"},
								   function(){ 
										   location.reload();
									   }
									);
								}
								else
								{
								   
								   swal({title: "Good job", text: "Your account created and logged in successfully", type: "success"},
								   function(){ 
										  
										   if(data['redirecturl']==''){	
										   location.href=baseurl+'dashboard';}
										   else{location.href=data['redirecturl'];}
									   }
									);
								}
							},
							error: function(xhr, textStatus, errorThrown)
							{
                                
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#login-form").validate({
                rules: {
                    login_email: {
                        required: true,
                        email: true
					},
                    login_password: {
                        required: true,
                        minlength: 5
                    }
				   },
                messages: {
                    login_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    login_email: {
						required: "Please enter your email",
						email:"Please enter a valid email address"
					}
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/login_process',
							dataType: "json",
							data: $('#login-form').serialize(),
							success: function(data)
							{ 
								if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Logged in successfully", type: "success"},
								   function(){ 
										   if(data['tasker_steps_pending_redirect']!="")
										   {   
											   location.href=data['tasker_steps_pending_redirect']; return false;
										   }	
										   if(data['redirecturl']==''){	
										   location.href=baseurl+'dashboard';}else{
											   location.href=data['redirecturl'];
										   }
									   }
									);								  
								}
								else if (data['status'] == 2)
								{
								   swal('Oops',data['message'],'error');
								}
								else
								{
								  swal('Oops',data['message'],'error');
								}	
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#profile-tab1-edit-form").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    email: {
                        required: true,
                        email: true,
						remote:
						{
						  url: baseurl+'site/user/check_email_profile',
						  type: "post",
						  data:
						  {
							  email: function()
							  {
								  return $('#profile-tab1-edit-form :input[name="email"]').val();
							  },
							  id:$('#profile-tab1-edit-form').attr('data-user-id')
						  }
						}
                    },
                    password: {
                        required: true,
						pwcheck:true,
                        minlength: 5
                    },
					phone:
					{
					required:true,
					number:true
					},
				   zipcode:
					{
					required:true
					}
				   },
                messages: {
                    first_name: "Please enter your firstname",
                    last_name: "Please enter your lastname",
                    phone: {
                        required: "Please provide a mobile"                       
                    },
                    email: {
						required: "Please enter your email",
						email:"Please enter a valid email address",
						remote:"Already exist"
					},
					zipcode:"Please enter your zipcode"
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/save_profile_tab1',
							dataType: "json",
							data: $('#profile-tab1-edit-form').serialize(),
							success: function(data)
							{ 
								if (data['success'] == 1)
								{
								  swal({title: "Success", text: "Account updated successfully.", type: "success"},
								   function(){ 
										$('#l_name').html(data['name']);
										$('#l_email').html(data['email']);
										$('#l_phone').html(data['phone']);
										$('#l_zipcode').html(data['zipcode']);
										$("#profile_tab1_edit_form").css('display','none');
										$("#profile_tab1_form").css('display','block');
										
									   }
									);
								}
								else if (data['success'] == 2)
								{
								  swal({title: "Oops", text: "This email address is already registered.", type: "error"},
								   function(){ 
										$('#l_name').html(data['name']);
										$('#l_email').html(data['email']);
										$('#l_phone').html(data['phone']);
										$('#l_zipcode').html(data['zipcode']);
										$("#profile_tab1_edit_form").css('display','none');
										$("#profile_tab1_form").css('display','block');
									   }
									);
								}
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
                               
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#profile-tab2-edit-form").validate({
                rules: {
                    current_password: {
                        required: true,
                        remote:
						{
						  url: baseurl+'site/user/check_current_password',
						  type: "post",
						  data:
						  {
							  current_password: function()
							  {
								  return $('#profile-tab2-edit-form :input[name="current_password"]').val();
							  }
						  }
						}
                    },
                    new_password: {
                        required: true,
						pwcheck:true,
						minlength: 5
                    },
					confirm_password:
					{
					required:true,
					equalTo: '#new_password'
					}
				   },
                messages: {
                     current_password: {
                        required: "Please provide your current password",
                        remote: "Your current password is wrong"
                    },  new_password: {
                        required: "Please provide a new password",
                        pwcheck: "Please provide a strong password",
						notequalTo:"current and new password are same",
                        minlength: "Your password must be at least 5 characters long"
                    },  confirm_password: {
                        required: "Please provide a confirm password",
                        equalTo: "Please enter same password",
                        
                    }
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/save_profile_tab2',
							dataType: "json",
							data: $('#profile-tab2-edit-form').serialize(),
								success:function(e){
									if(e['status']==0)
										{
										swal('Error',e['message'],'error');
										}
										else
										{
										swal('Success',e['message'],'success');	
										}
										$('#profile-tab2-edit-form').trigger('reset');
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
			$("#profile-tab3-edit-form").validate({               
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/save_profile_tab3',
							dataType: "json",
							data: $('#profile-tab3-edit-form').serialize(),
								success:function(e){
									if(e['status']==0)
										{
										swal('Error',e['message'],'error');
										}
										else
										{
										swal('Success',e['message'],'success');	
										}
										$('#profile-tab2-edit-form').trigger('reset');
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

$('#user-profile-photo').change(function () {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
		case 'JPG':
        case 'JPEG':
        case 'PNG':
        $('#uploadButton').attr('disabled', false);
            break;
        default:
            swal('Error','This is not an allowed file type.','error');
            this.value = '';
    }
});
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		$.validator.addMethod("pwcheck", function(value) {
		   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
			   && /[a-z]/.test(value) // has a lowercase letter
			   && /\d/.test(value) // has a digit
		});
		 $.validator.addMethod("nameRegex", function(value, element) {

        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);

        }, "Name must contain only albhabets.");
				
             $("#tasker-register-form").validate({
                rules: {
                    first_name: {required:true,
								 nameRegex:true },
                    last_name:  {required:true,
								 nameRegex:true },
                    email: {
                        required: true,
                        email: true,
						remote:
						{
						  url: baseurl+'site/tasker/check_email',
						  type: "post",
						  data:
						  {   
							  email: function()
							  {
								  return $('#tasker-register-form :input[name="email"]').val();
							  }
						  }
						}
                    },
                    password: {
                        required: true,
						pwcheck:true,
                        minlength: 5
                    },
					zipcode:
					{
					required:true
					}
				   },
                messages: {
                     first_name: {
                        required: "Please enter first name",
                        nameRegex: "First Name must be albhabets"
                    }, 
					last_name: {
                        required: "Please enter last name",
                        nameRegex: "Last Name must be albhabets"
                    },password: {
                        required: "Please provide a password",
                        pwcheck: "Please provide a strong password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: {
						required: "Please enter your email",
						email:"Please enter a valid email address",
						remote:"Already exist"
					},
					zipcode:"Please enter your zipcode"
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/tasker/signup_process',
							dataType: "json",
							data: $('#tasker-register-form').serialize(),
							success: function(data)
							{ 
								if (data['result'] == 'error')
								{
								  swal({title: "Oops", text: "This email address is already registered.", type: "error"},
								   function(){ 
										   location.reload();
									   }
									);
								}
								else
								{
								   
								   swal({title: "Good job", text: "Your account created but please fill your details.", type: "success"},
								   function(){ 
										   location.href=baseurl+'tasker_step1';
									   }
									);
								}
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#step1-form").validate();
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#tasker_profile_picture_form").validate({
                rules: {
                    work_city: {
                        required: true                       
                    },
                    home: {
                        required: true                       
                    },
                    street: {
                        required: true                       
                    },
                    city: {
                        required: true                       
                    },
                    state: {
                        required: true                       
                    },
                    zipcode: {
                        required: true                       
                    },
                    dob: {
                        required: true                       
                    },
                    phone_type: {
                        required: true                       
                    },
                     vehicle_type: {
                        required: true                       
                    },
                    hear_about: {
                        required: true                       
                    }
                    
				   },
                messages: {
                     
                     work_city: {
                        required: "Choose your work city"
                    },
					 home: {
                        required: "Enter your home address"
                    },
					 street: {
                        required: "Enter your street"
                    },
					 city: {
                        required: "Enter your home city"
                    },
					 state: {
                        required: "Enter your state"
                    },
					 zipcode: {
                        required: "Enter your zipcode"
                    },
					 dob: {
                        required: "Enter your DOB"
                    },
					 phone_type: {
                        required: "Choose your phone type"
                    },
					 vehicle_type: {
                        required: "Select your vehicles"
                    },
					 hear_about: {
                        required: "Select how you hear about us"
                    },
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/tasker/save_step2',
							dataType: "json",
							data: $('#tasker_profile_picture_form').serialize(),
								success:function(e){
									if(e['status']==0)
                                    {
                                        swal({title: "Error", text: e['message'], type: "error"},
                                        function(){ 
                                            window.location.href=baseurl+'tasker_step3';
                                            }
                                         );	
                                    }
                                    else
                                    {
                                        swal({title: "Success", text: e['message'], type: "success"},
                                        function(){ 
                                            window.location.href=baseurl+'tasker_step3';
                                            }
                                         );	
                                    }
										
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#edittasker_profile_picture_form").validate({
                rules: {
                    work_city: {
                        required: true                       
                    },
                    home: {
                        required: true                       
                    },
                    street: {
                        required: true                       
                    },
                    city: {
                        required: true                       
                    },
                    state: {
                        required: true                       
                    },
                    zipcode: {
                        required: true                       
                    },
                    dob: {
                        required: true                       
                    },
                    phone_type: {
                        required: true                       
                    },
                     vehicle_type: {
                        required: true                       
                    },
                    hear_about: {
                        required: true                       
                    }
                    
				   },
                messages: {
                     
                     work_city: {
                        required: "Choose your work city"
                    },
					 home: {
                        required: "Enter your home address"
                    },
					 street: {
                        required: "Enter your street"
                    },
					 city: {
                        required: "Enter your home city"
                    },
					 state: {
                        required: "Enter your state"
                    },
					 zipcode: {
                        required: "Enter your zipcode"
                    },
					 dob: {
                        required: "Enter your DOB"
                    },
					 phone_type: {
                        required: "Choose your phone type"
                    },
					 vehicle_type: {
                        required: "Select your vehicles"
                    },
					 hear_about: {
                        required: "Select how you hear about us"
                    },
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/tasker/save_step2',
							dataType: "json",
							data: $('#edittasker_profile_picture_form').serialize(),
								success:function(e){
									if(e['status']==0)
										{
                                            swal({title: "Error", text: e['message'], type: "error"},
                                            function(){ 
                                                load_tasker_profile();
                                                }
                                             );	
										}
										else
										{
                                            swal({title: "Success", text: e['message'], type: "success"},
                                            function(){ 
                                                load_tasker_profile();
                                                }
                                             );	
                                        }
                                        
                                        
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... '+url + query);
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#payment_form").validate({
                rules: {
                    number: {
                        required: true                       
                    },
                    exp_month: {
                        required: true                       
                    },
                    exp_year: {
                        required: true                       
                    },
                    cvc: {
                        required: true                       
                    },
                    address_zip: {
                        required: true                       
                    },
                    phone_no: {
                        required: true                       
                    }
                    
				   },
                messages: {
                     
                     number: {
                        required: "Enter credit card number"
                    },
					 exp_month: {
                        required: "choose card expiration month"
                    },
					 exp_year: {
                        required: "choose card expiration year"
                    },
					 cvc: {
                        required: "Enter your card cvc"
                    },
					 address_zip: {
                        required: "Enter your zipcode"
                    },
					 phone_no: {
                        required: "Enter your phone no"
                    }
					},
                submitHandler: function(form) {
				    $('#confirm_booking_btn').prop('disabled',true);
                    $.ajax(
						{   
							type: "POST",
							url: baseurl+'site/user/save_booking_confirm',
							dataType: "json",
							data: $('#payment_form').serialize(),
						    beforeSend:function(){ 
								$('#confirm_booking_btn').html('<img src="'+baseurl+'images/site/sivaloader.gif" style="margin:0 auto;width:25;height:25px;">');
							   },
								success:function(e){ 
									if(e['error_new']!='')
										{
										swal('Error',e['error_new'],'error');
										$('#confirm_booking_btn').html('Confirm');	
										$('#confirm_booking_btn').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn').html('Success');	
										 swal({title: "Good job", text: "Your request submitted successfully, Tasker will respond you shortly", type: "success"},
										   function(){ 
												   location.href=baseurl+'dashboard';
											   }
										);
										}										
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... ');
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#tasker_payment_form").validate({
                rules: {
                    number: {
                        required: true                       
                    },
                    exp_month: {
                        required: true                       
                    },
                    exp_year: {
                        required: true                       
                    },
                    cvc: {
                        required: true                       
                    },
                    address_zip: {
                        required: true                       
                    },
                    phone_no: {
                        required: true                       
                    }
                    
				   },
                messages: {
                     
                     number: {
                        required: "Enter credit card number"
                    },
					 exp_month: {
                        required: "choose card expiration month"
                    },
					 exp_year: {
                        required: "choose card expiration year"
                    },
					 cvc: {
                        required: "Enter your card cvc"
                    },
					 address_zip: {
                        required: "Enter your zipcode"
                    },
					 phone_no: {
                        required: "Enter your phone no"
                    }
					},
                submitHandler: function(form) {
				    $('#confirm_booking_btn').prop('disabled',true);
                    $.ajax(
						{   
							type: "POST",
							url: baseurl+'site/tasker/save_step4',
							dataType: "json",
							data: $('#tasker_payment_form').serialize(),
						    beforeSend:function(){ 
								$('#confirm_booking_btn').html('<img src="'+baseurl+'images/site/sivaloader.gif" style="margin:0 auto;width:25;height:25px;">');
							   },
								success:function(e){ 
									if(e['error_new']!='')
										{
										swal('Error',e['error_new'],'error');
										$('#confirm_booking_btn').html('Confirm');	
										$('#confirm_booking_btn').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn').html('Success');	
										 if(e['tasker_automation']!=""){
											swal({title: "Good job", text: "Tasker signup process successfully completed. Admin will approve shortly.", type: "success"},
										   function(){ 
												   location.href=baseurl+'dashboard';
											   }
											); 
										 }
										 else{
										 swal({title: "Good job", text: "Tasker signup process successfully completed.", type: "success"},
										   function(){ 
												   location.href=baseurl+'account';
											   }
											);
										 }
										}										
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... ');
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#edit_tasker_payment_form").validate({
                rules: {
                    number: {
                        required: true                       
                    },
                    exp_month: {
                        required: true                       
                    },
                    exp_year: {
                        required: true                       
                    },
                    cvc: {
                        required: true                       
                    },
                    address_zip: {
                        required: true                       
                    },
                    phone_no: {
                        required: true                       
                    }
                    
				   },
                messages: {
                     
                     number: {
                        required: "Enter credit card number"
                    },
					 exp_month: {
                        required: "choose card expiration month"
                    },
					 exp_year: {
                        required: "choose card expiration year"
                    },
					 cvc: {
                        required: "Enter your card cvc"
                    },
					 address_zip: {
                        required: "Enter your zipcode"
                    },
					 phone_no: {
                        required: "Enter your phone no"
                    }
					},
                submitHandler: function(form) {
				    $('#confirm_booking_btn').prop('disabled',true);
                    $.ajax(
						{   
							type: "POST",
							url: baseurl+'site/tasker/change_creditcard',
							dataType: "json",
							data: $('#edit_tasker_payment_form').serialize(),
						    beforeSend:function(){ 
								$('#confirm_booking_btn').html('<img src="'+baseurl+'images/site/sivaloader.gif" style="margin:0 auto;width:25;height:25px;">');
							   },
								success:function(e){ 
									if(e['error_new']!='')
										{
										swal('Error',e['error_new'],'error');
										$('#confirm_booking_btn').html('Confirm');	
										$('#confirm_booking_btn').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn').html('Success');	
										 swal({title: "Success", text: "Credit card saved successfully.", type: "success"},
										   function(){ 
												   location.href=baseurl+'account';
											   }
										);
										}										
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... ');
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		
				
             $("#block_dates_frm").validate({
                rules: {
                    number: {
                        required: true                       
                    },
                     task_date: {
                        required: true                       
                    }
                    
				   },
                messages: {
                     
                     number: {
                        required: "Enter credit card number"
                    },
					task_date: {
                        required: "Choose date"
                    }
					},
                submitHandler: function(form) {
				    $('#confirm_booking_btn1').prop('disabled',true);
                    $.ajax(
						{   
							type: "POST",
							url: baseurl+'site/tasker/insert_block_dates',
							dataType: "json",
							data: $('#block_dates_frm').serialize(),
						    beforeSend:function(){ 
								$('#confirm_booking_btn1').html('<img src="'+baseurl+'images/site/sivaloader.gif" style="margin:0 auto;width:25;height:25px;">');
							   },
								success:function(e){ 
									if(e['error_new']!='')
										{
										swal('Error',e['error_new'],'error');
										$('#confirm_booking_btn1').html('Save');	
										$('#confirm_booking_btn1').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn1').html('Save');	
										 swal({title: "Success", text: "Date blocked saved successfully.", type: "success"},
										   function(){ 
												  load_block_dates();
											   }
										);
										}										
								
							},
							error: function(xhr, textStatus, errorThrown)
							{
								alert('ajax loading error... ... ');
								return false;
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#forgot-form").validate({
                rules: {
                    login_email: {
                        required: true,
                        email: true
					}
				   },
                messages: {
                    
                    login_email: {
						required: "Please enter your email",
						email:"Please enter a valid email address"
					}
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/user/send_forgot_password',
							dataType: "json",
							data: $('#forgot-form').serialize(),
							success: function(data)
							{ 
								if (data['status'] == 1)
								{
								   swal({title: "Success", text: "Your password reseted successfully check your mail", type: "success"},
								   function(){ 
										  location.href=baseurl;
									   }
									);								  
								}
								else if (data['status'] == 2)
								{
								   swal('Oops',data['message'],'error');
								}
								else
								{
								  swal('Oops',data['message'],'error');
								}	
							}
						});
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);