<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $heading!=''?$heading:ucfirst($this->config->item('site_name'));?></title>
	<link rel="alternate" href="<?php echo base_url();?>">
    <meta content='<?php echo $this->config->item('site_name');?>' name='author'>
	<meta content='<?php echo $this->config->item('meta_description');?>' name='description'>
	<meta content='<?php echo $this->config->item('meta_keywords');?>' name='keywords'>
	<meta property="fb:app_id" content="<?php echo $this->config->item('fb_app_id');?>">
	<meta property="og:site_name" content="<?php echo ucfirst($this->config->item('site_name'));?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo base_url();?>">
	<meta property="og:title" content="<?php echo $this->config->item('meta_title');?>">
	<meta property="og:description" content="<?php echo $this->config->item('meta_description');?>">
	<meta property="og:image" content="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>">
	<meta property="og:locale" content="en_US">
    <meta name="twitter:widgets:csp" content="on">
	<meta name="twitter:url" content="<?php echo base_url();?>">
	<meta name="twitter:description" content="<?php echo $this->config->item('meta_description');?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php echo $this->config->item('meta_title');?>">
	<meta name="twitter:site" content="<?php echo $this->config->item('twitter_name');?>">
	<meta name="twitter:app:id" content="<?php echo $this->config->item('twitter_app_id');?>">
	<meta name="twitter:app:name:iphone" content="<?php echo ucfirst($this->config->item('site_name'));?>">
	<meta name="twitter:app:name:ipad" content="<?php echo ucfirst($this->config->item('site_name'));?>">
	<meta name="twitter:app:name:googleplay" content="<?php echo ucfirst($this->config->item('site_name'));?>">
	<meta name="twitter:app:id:googleplay" content="<?php echo base_url();?>">
	<meta name="twitter:app:url:iphone" content="<?php echo base_url();?>">
	<meta name="twitter:app:url:ipad" content="<?php echo base_url();?>">
	<meta name="twitter:app:url:googleplay" content="<?php echo base_url();?>">
	<link rel="shortcut icon" sizes="76x76" type="image/x-icon" href="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_favicon')!=''?$this->config->item('site_favicon'):'favicon.ico';?>" />
	<script>
		var baseurl="<?php echo base_url();?>"; 
		var required_first_name="<?php echo get_lang_site_key($lang_key,"common_lang","required_first_name"); ?>";
		var first_name_caps="<?php echo get_lang_site_key($lang_key,"common_lang","first_name_caps"); ?>";
		var required_lastname="<?php echo get_lang_site_key($lang_key,"common_lang","required_lastname"); ?>";
		var lastname_caps="<?php echo get_lang_site_key($lang_key,"common_lang","lastname_caps"); ?>";
		var required_password="<?php echo get_lang_site_key($lang_key,"common_lang","required_password"); ?>";
		var strong_password="<?php echo get_lang_site_key($lang_key,"common_lang","strong_password"); ?>";
		var length_password ="<?php echo get_lang_site_key($lang_key,"common_lang","length_password"); ?>";
		var required_mail="<?php echo get_lang_site_key($lang_key,"common_lang","required_mail"); ?>";
		var valid_mail="<?php echo get_lang_site_key($lang_key,"common_lang","valid_mail"); ?>";
		var already_exist="<?php echo get_lang_site_key($lang_key,"common_lang","already_exist"); ?>";
		var required_zipcode="<?php echo get_lang_site_key($lang_key,"common_lang","required_zipcode"); ?>";
		var register_mail_exist="<?php echo get_lang_site_key($lang_key,"common_lang","register_mail_exist"); ?>";
		var create_success="<?php echo get_lang_site_key($lang_key,"common_lang","create_success"); ?>";
		var good_job="<?php echo get_lang_site_key($lang_key,"common_lang","good_job"); ?>";
		var oops="<?php echo get_lang_site_key($lang_key,"common_lang","oops"); ?>";
		var success="<?php echo get_lang_site_key($lang_key,"common_lang","success"); ?>";
		var login_success="<?php echo get_lang_site_key($lang_key,"common_lang","login_success"); ?>";
		var required_mobile="<?php echo get_lang_site_key($lang_key,"common_lang","required_mobile"); ?>";
		var update_success="<?php echo get_lang_site_key($lang_key,"common_lang","update_success"); ?>";
		var crt_current_password="<?php echo get_lang_site_key($lang_key,"common_lang","crt_current_password"); ?>";
		var wrong_current_password="<?php echo get_lang_site_key($lang_key,"common_lang","wrong_current_password"); ?>";
		var new_password="<?php echo get_lang_site_key($lang_key,"common_lang","new_password"); ?>";
		var same_password_current_new="<?php echo get_lang_site_key($lang_key,"common_lang","same_password_current_new"); ?>";
		var required_confirm_password="<?php echo get_lang_site_key($lang_key,"common_lang","required_confirm_password"); ?>";
		var same_password="<?php echo get_lang_site_key($lang_key,"common_lang","same_password"); ?>";
		var error="<?php echo get_lang_site_key($lang_key,"common_lang","error"); ?>";
		var file_type="<?php echo get_lang_site_key($lang_key,"common_lang","file_type"); ?>";
		var name_albhabets="<?php echo get_lang_site_key($lang_key,"common_lang","name_albhabets"); ?>";
		var last_name_albha="<?php echo get_lang_site_key($lang_key,"common_lang","last_name_albha"); ?>";
		var fill_details="<?php echo get_lang_site_key($lang_key,"common_lang","fill_details"); ?>";
		var choose_city="<?php echo get_lang_site_key($lang_key,"common_lang","choose_city"); ?>";
		var choose_email_preference="<?php echo get_lang_site_key($lang_key,"common_lang","choose_email_preference"); ?>";
		var require_address="<?php echo get_lang_site_key($lang_key,"common_lang","require_address"); ?>";
		var require_street="<?php echo get_lang_site_key($lang_key,"common_lang","require_street"); ?>";
		var require_city="<?php echo get_lang_site_key($lang_key,"common_lang","require_city"); ?>";
		var require_state="<?php echo get_lang_site_key($lang_key,"common_lang","require_state"); ?>";
		var require_zipcode="<?php echo get_lang_site_key($lang_key,"common_lang","require_zipcode"); ?>";
		var require_dob="<?php echo get_lang_site_key($lang_key,"common_lang","require_dob"); ?>";
		var require_mobile_type="<?php echo get_lang_site_key($lang_key,"common_lang","require_mobile_type"); ?>";
		var require_vehicles="<?php echo get_lang_site_key($lang_key,"common_lang","require_vehicles"); ?>";
		var about_us="<?php echo get_lang_site_key($lang_key,"common_lang","about_us"); ?>";
		var require_card_number="<?php echo get_lang_site_key($lang_key,"common_lang","require_card_number"); ?>";
		var require_card_month="<?php echo get_lang_site_key($lang_key,"common_lang","require_card_month"); ?>";
		var require_card_year="<?php echo get_lang_site_key($lang_key,"common_lang","require_card_year"); ?>";
		var require_cvv="<?php echo get_lang_site_key($lang_key,"common_lang","require_cvv"); ?>";
		var require_phone="<?php echo get_lang_site_key($lang_key,"common_lang","require_phone"); ?>";
		var summit_success="<?php echo get_lang_site_key($lang_key,"common_lang","summit_success"); ?>";
		var save_card="<?php echo get_lang_site_key($lang_key,"common_lang","save_card"); ?>";
		var choose_date="<?php echo get_lang_site_key($lang_key,"common_lang","choose_date"); ?>";
		var success_block="<?php echo get_lang_site_key($lang_key,"common_lang","success_block"); ?>";
		var forget_password_success="<?php echo get_lang_site_key($lang_key,"common_lang","forget_password_success"); ?>";
		var tasker_signp_success="<?php echo get_lang_site_key($lang_key,"common_lang","tasker_signp_success"); ?>";
		var approve_admin_takser="<?php echo get_lang_site_key($lang_key,"common_lang","approve_admin_takser"); ?>";
		var number_validate="<?php echo get_lang_site_key($lang_key,"common_lang","number_validate"); ?>";
	</script>	
</head>
<link href="<?php echo base_url();?>css/site/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/developer.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/site/sweetalert.css" rel="stylesheet">
<body class="signin_base">
<section class="signin_base">
<?php 
	
	$lang_data 	 = langdata();
	
	?>
    <div class="col-md-12 col-sm-12 col-xs-12 nopadd">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center nopadd">
                <div class="col-md-5 col-sm-8 col-xs-12 sign_start nopadd">
                    <div class="sign_base sign_in">
                        <a href="<?php echo $fb_login;?>" class="sign_btn fb"><?php echo get_lang_site_key($lang_key,"common_lang","login_fb"); ?></a>
                        <a href="<?php echo $gmail_link;?>" class="sign_btn gmail"><?php echo get_lang_site_key($lang_key,"common_lang","login_mail"); ?></a>
                        <h6>or</h6>
								<?php
								$attributes = array('method' => 'post', 'id' => 'login-form', 'novalidate' => 'novalidate');
								echo form_open('#', $attributes); ?>
									<input type="email" name="login_email" placeholder="<?php echo get_lang_site_key($lang_key,"common_lang","mail_check"); ?>" class="form-control">
									<input type="password" name="login_password" placeholder="<?php echo get_lang_site_key($lang_key,"common_lang","password"); ?>" class="form-control">
									<input type="submit" value="<?php echo get_lang_site_key($lang_key,"common_lang","login_mail"); ?>" class="submit_btn">
								</form>
					   <h5> <a href="<?php echo base_url();?>forgot_password"><?php echo get_lang_site_key($lang_key,"common_lang","forget_password"); ?></a></h5>
					   <div class="clearfix"></div>
					   <span class="under_line sign_line">&nbsp;</span>
					   <h4><?php echo get_lang_site_key($lang_key,"common_lang","no_account"); ?> </h4>
					   <p><a href="<?php echo base_url();?>user_signup"><?php echo get_lang_site_key($lang_key,"common_lang","register"); ?></a></p>
					</div>
                    <div class="sign_logo">
						<div class="sign_inner">
						</div>
                    </div>
                                            
                </div>
            </div>
        </div>
    </div>
</section>
<script>
	
	var swtOk="<?php echo get_lang_site_key($lang_key,"header_footer_lang","alert_text_ok")?>";

</script>
<script src="<?php echo base_url();?>js/site/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>js/site/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/site/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/site/sweetalert.min.js"></script>
<script>
        var sign_pos= $('.sign_inner').offset();
        var sign_top= $('.sign_base').offset();
	    var window_width= $(window).width();
$(document).ready(function(){
				$('.sign_whtspace').offset({left:sign_pos.left + 6});
                $('.sign_whtspace').offset({top:sign_top.top});
   
});
</script>
</body>

</html>