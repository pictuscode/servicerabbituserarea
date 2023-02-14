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

        }, name_albhabets);
				
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
						  url: baseurl+'site/landing/check_email',
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
                        required: required_first_name,
                        nameRegex: first_name_caps
                    }, 
					last_name: {
                        required: required_lastname,
                        nameRegex: last_name_albha
                    },
					password: {
                        required: required_password,
                        pwcheck: strong_password,
                        minlength: length_password
                    },
                    email: {
						required: required_mail,
						email:valid_mail,
						remote:already_exist
					},
					zipcode:required_zipcode
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/signup_process',
							dataType: "json",
							data: $('#register-form').serialize(),
							success: function(data)
							{ 
								if (data['result'] == 'error')
								{
								  swal({title: oops, text: register_mail_exist, type: "error"},
								   function(){ 
										   location.reload();
									   }
									);
								}
								else
								{
								   
								   swal({title: good_job, text: create_success, type: "success"},
								   function(){ 
										  
										   location.href=baseurl
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
                        required: required_password,
                        minlength: length_password,
                    },
                    login_email: {
						required: required_mail,
						email: valid_mail
					}
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'site/landing/login_process',
							dataType: "json",
							data: $('#login-form').serialize(),
							success: function(data)
							{ 
								if (data['status'] == 1)
								{
								   swal({title: success, text: login_success, type: "success"},
								   function(){ 
                                             location.href=baseurl
									   }
									);								  
								}
								else if (data['status'] == 2)
								{
								   swal(oops,data['message'],'error');
								}
								else
								{
								  swal(oops,data['message'],'error');
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
                    first_name: required_first_name,
                    last_name: required_lastname,
                    phone: {
                        required: required_mobile , 
                        number: number_validate               
                    },
                    email: {
						required: required_mail,
						email:valid_mail,
						remote:already_exist
					},
					zipcode:required_zipcode
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
								  swal({title: success, text: update_success+".", type: "success"},
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
								  swal({title: "Oops", text: register_mail_exist, type: "error"},
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
                        required: crt_current_password,
                        remote: wrong_current_password
                    },  new_password: {
                        required: new_password,
                        pwcheck: strong_password,
						notequalTo: same_password_current_new,
                        minlength: length_password
                    },  confirm_password: {
                        required: required_confirm_password,
                        equalTo: same_password,
                        
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
										swal(error,e['message'],'error');
										}
										else
										{
										swal(success,e['message'],'success');	
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
										swal(error,e['message'],'error');
										}
										else
										{
										swal(success,e['message'],'success');	
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
            swal(error,file_type+'.','error');
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

        }, name_albhabets);
				
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
						  url: baseurl+'site/landing/check_email',
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
                        required: required_first_name,
                        nameRegex: first_name_caps
                    }, 
					last_name: {
                        required: required_lastname,
                        nameRegex: last_name_albha
                    },password: {
                        required: required_password,
                        pwcheck: strong_password,
                        minlength: length_password
                    },
                    email: {
						required: required_mail,
						email: valid_mail,
						remote: already_exist
					},
					zipcode:required_zipcode
					},
                submitHandler: function(form) {
                    $.ajax(
						{
							type: "POST",
							url: baseurl+'tasker_signup_process',
							dataType: "json",
							data: $('#tasker-register-form').serialize(),
							success: function(data)
							{ 
								if (data['result'] == 'error')
								{
								  swal({title: oops, text: register_mail_exist, type: "error"},
								   function(){ 
										   location.reload();
									   }
									);
								}
								else
								{
								   
								   swal({title: good_job, text: fill_details+".", type: "success"},
								   function(){ 
                                        location.href=baseurl
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
                    email_preference: {
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
                        required: choose_city
                    },
                    email_preference: {
                        required: choose_email_preference
                    },
					 home: {
                        required: require_address
                    },
					 street: {
                        required: require_street
                    },
					 city: {
                        required: require_city
                    },
					 state: {
                        required: require_state
                    },
					 zipcode: {
                        required: require_zipcode
                    },
					 dob: {
                        required: require_dob
                    },
					 phone_type: {
                        required: require_mobile_type
                    },
					 vehicle_type: {
                        required: require_vehicles
                    },
					 hear_about: {
                        required: about_us
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
                                        swal({title: error, text: e['message'], type: "error"},
                                        function(){ 
                                            window.location.href=baseurl+'tasker_step3';
                                            }
                                         );	
                                    }
                                    else
                                    {
                                        swal({title: success, text: e['message'], type: "success"},
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
                        required: choose_city
                    },
					 home: {
                        required: require_address
                    },
					 street: {
                        required: require_street
                    },
					 city: {
                        required: require_city
                    },
					 state: {
                        required: require_state
                    },
					 zipcode: {
                        required: require_zipcode
                    },
					 dob: {
                        required: require_dob
                    },
					 phone_type: {
                        required: require_mobile_type
                    },
					 vehicle_type: {
                        required: require_vehicles
                    },
					 hear_about: {
                        required: about_us
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
                                            swal({title: error, text: e['message'], type: "error"},
                                            function(){ 
                                                load_tasker_profile();
                                                }
                                             );	
										}
										else
										{
                                            swal({title: success, text: e['message'], type: "success"},
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
                        required: require_card_number
                    },
					 exp_month: {
                        required: require_card_month
                    },
					 exp_year: {
                        required: require_card_year
                    },
					 cvc: {
                        required: require_cvv
                    },
					 address_zip: {
                        required: require_zipcode
                    },
					 phone_no: {
                        required: require_phone
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
										swal(error,e['error_new'],'error');
										$('#confirm_booking_btn').html('Confirm');	
										$('#confirm_booking_btn').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn').html(success);	
										 swal({title: good_job, text: summit_success, type: "success"},
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
                        required: require_card_number
                    },
					 exp_month: {
                        required: require_card_month
                    },
					 exp_year: {
                        required: require_card_year
                    },
					 cvc: {
                        required: require_cvv
                    },
					 address_zip: {
                        required: require_zipcode
                    },
					 phone_no: {
                        required: require_phone
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
										swal(error,e['error_new'],'error');
										$('#confirm_booking_btn').html('Confirm');	
										$('#confirm_booking_btn').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn').html(success);	
										 if(e['tasker_automation']!=""){
											swal({title: good_job, text: approve_admin_takser, type: "success"},
										   function(){ 
												   location.href=baseurl+'dashboard';
											   }
											); 
										 }
										 else{
										 swal({title: good_job, text: tasker_signp_success, type: "success"},
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
                        required: require_card_number
                    },
					 exp_month: {
                        required: require_card_month
                    },
					 exp_year: {
                        required: require_card_year
                    },
					 cvc: {
                        required: require_cvv
                    },
					 address_zip: {
                        required: require_zipcode
                    },
					 phone_no: {
                        required: require_phone
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
										swal(error,e['error_new'],'error');
										$('#confirm_booking_btn').html('Confirm');	
										$('#confirm_booking_btn').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn').html(success);	
										 swal({title: success, text: save_card, type: "success"},
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
                        required: require_card_number
                    },
					task_date: {
                        required: choose_date
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
										swal(error,e['error_new'],'error');
										$('#confirm_booking_btn1').html('Save');	
										$('#confirm_booking_btn1').prop('disabled',false);
										}
										else
										{
										$('#confirm_booking_btn1').html('Save');	
										 swal({title: success, text: success_block, type: "success"},
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
						required: required_mail,
						email:valid_mail
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
								   swal({title: success, text: forget_password_success, type: "success"},
								   function(){ 
										  location.href=baseurl;
									   }
									);								  
								}
								else if (data['status'] == 2)
								{
								   swal(oops,data['message'],'error');
								}
								else
								{
								  swal(oops,data['message'],'error');
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