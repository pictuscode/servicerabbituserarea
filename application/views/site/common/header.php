<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php if(isset($heading)){ echo $heading!=''?$heading.' - ':'';echo ucfirst($this->config->item('site_name'));} else { echo ucfirst($this->config->item('site_name')); }?></title>
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
<script src="<?php echo base_url();?>js/site/jquery-3.1.1.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<?php echo stripcslashes($this->config->item('google_analytics'));?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113362863-1');
  		<?php
				$key= $this->security->get_csrf_token_name();		  
                $value= $this->security->get_csrf_hash();
		
		?>
</script>

<body>
	<header>
	<?php 
	
	$lang_data 	 = langdata();
	
	?>
		<div class="head_base">
            <div class="container">
				<div class="col-md-12 col-sm-12 col-xs-12 desktop_menu nopadd">
					<div class="col-md-3 col-sm-4 col-xs-12 logo">
						<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>"></a>
					</div>
					<?php if($logincheck==""){?>
					<div class="col-md-9 col-sm-8 col-xs-12 login">
							<ul class="list-inline pull-right">	

							<li class="language dropdown"><a href="#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								
							<?php
								$lang_key=$this->session->userdata('pictuslang_key')==''?'en':$this->session->userdata('pictuslang_key');
							foreach($lang_data as $val){
								if($val['lang_code']==$lang_key) 
								{	echo $val['lang_name'];}
							}
						 ?>  
							
							<img src="<?php echo base_url();?>images/site/arrow.png"></a>
								<ul class="dropdown-menu" aria-labelledby="dLabel">
									<?php foreach($lang_data as $val){ ?>
										<li><a href="<?php echo base_url().'site/language/lang_set/'.$val['lang_code']; ?>"><?php echo $val['lang_name']; ?></a></li>
									<?php } ?>

								</ul>
							</li>
							<li class="language dropdown"><a href="#" id="dLabel1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $currency_code; ?>  <img src="<?php echo base_url();?>images/site/arrow.png"></a>
								<ul class="dropdown-menu" aria-labelledby="dLabel1">
									<?php foreach($currency_lists->result() as $curr){ ?>
										<li><a href="<?php echo base_url().'site/currency/change_currency/'.$curr->currency_type; ?>"><?php echo $curr->currency_type; ?></a></li>
									<?php } ?>

								</ul>
							</li>
							<li class="login_a"><a href="<?php echo base_url();?>user_login"><?php echo get_lang_site_key($lang_key,"header_footer_lang","login"); ?></a>
							</li>
							<li><a href="<?php echo base_url();?>become-a-tasker" class="theme_btn"><?php echo get_lang_site_key($lang_key,"header_footer_lang","become_tasker"); ?></a></li>
						</ul>
					</div>
					<?php } else { if(!empty($userDetails)){
						if($userDetails->row()->photo!='')
						{
							$pro_pic=base_url().'images/site/profile/'.$userDetails->row()->photo;
						}
						else
						{
							$pro_pic=base_url().'images/site/profile/avatar.png';
						}
						if($userDetails->row()->first_name!='')
						{
							$first_name=$userDetails->row()->first_name;
						}
						else
						{
							$first_name='Guest';
						}	
						$valid=$this->uri->segment(1);							
					?>
					<div class="col-md-9 col-sm-8 col-xs-12 login_aft">	
						<div class="dropdown drop_custom pull-right dropdown_header">
							<img class="header_logo_ajax" src="<?php echo $pro_pic;?>">
							<a href="javascript:void(0);" class="dropdown-toggle drop_head_title" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								 <?php if($valid!="tasker_step1" && $valid!="tasker_step2" && $valid!="tasker_step3" && $valid!="tasker_step4"){ ?>
								<li><a href="<?php echo BASEURL;?>dashboard"><?php echo get_lang_site_key($lang_key,"header_footer_lang","dashboard"); ?></a></li>
								<li><a href="<?php echo BASEURL;?>inbox"><?php echo get_lang_site_key($lang_key,"header_footer_lang","inbox") ?></a></li>
								<li><a href="<?php echo BASEURL;?>account"><?php echo get_lang_site_key($lang_key,"header_footer_lang","my_account"); ?></a></li>
								 <?php } ?>
								<li><a href="<?php echo BASEURL;?>logout"><?php echo get_lang_site_key($lang_key,"header_footer_lang","logout"); ?></a></li>
							  </ul>
						</div>	
						<?php if($valid!="tasker_step1" && $valid!="tasker_step2" && $valid!="tasker_step3" && $valid!="tasker_step4"){ ?> <a href="<?php echo BASEURL;?>inbox" class="msg_icon"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="notify_msg"></span> </a><?php } ?>
						<div class="col-md-9 col-sm-8 col-xs-12 login">
							<ul class="list-inline pull-right">
								<li class="language dropdown"><a href="#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
							foreach($lang_data as $val){
								if($val['lang_code']==$lang_key) 
								{	echo $val['lang_name'];}
							}
						 ?> 
						   <img src="<?php echo base_url();?>images/site/arrow.png"></a>
									<ul class="dropdown-menu" aria-labelledby="dLabel">
										<?php foreach($lang_data as $val){ ?>
											<li><a href="<?php echo base_url().'site/language/lang_set/'.$val['lang_code']; ?>"><?php echo ($val['lang_name']); ?></a></li>
										<?php } ?>

									</ul>
								</li>
								<li class="language dropdown"><a href="#" id="dLabel1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $currency_code; ?>  <img src="<?php echo base_url();?>images/site/arrow.png"></a>
									<ul class="dropdown-menu" aria-labelledby="dLabel1">
										<?php foreach($currency_lists->result() as $curr){ ?>
											<li><a href="<?php echo base_url().'site/currency/change_currency/'.$curr->currency_type; ?>"><?php echo $curr->currency_type; ?></a></li>
										<?php } ?>

									</ul>
								</li>
							</ul>
						</div>
					</div>
				<?php }} ?>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 mobile_menu">
					<div class="col-md-3 col-sm-4 col-xs-8 logo text-left">
							<a href="<?php echo base_url();?>" class="pull-left"><img src="<?php echo base_url();?>images/site/logo/<?php echo $this->config->item('site_logo')!=''?$this->config->item('site_logo'):'logo.png';?>"></a>
					</div>
					<?php if($logincheck==""){?>
					<div class="col-md-9 col-sm-8 col-xs-4 login">
						<div id="mySidenav" class="sidenav">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
							<ul class="list-unstyled pull-right">
								<li class="login_a"><a href="<?php echo base_url();?>user_login"><?php echo get_lang_site_key($lang_key,"header_footer_lang","login"); ?></a></li>
								<li><a href="<?php echo base_url();?>become-a-tasker" class="theme_btn"><?php echo get_lang_site_key($lang_key,"header_footer_lang","become_tasker"); ?></a></li>
							</ul>
							<ul class="list-inline pull-right">
								<li class="language dropdown"><a href="#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang_key; ?>  <img src="<?php echo base_url();?>images/site/arrow.png"></a>
									<ul class="dropdown-menu" aria-labelledby="dLabel">
										<?php foreach($lang_data as $val){ ?>
											<li><a href="<?php echo base_url().'site/language/lang_set/'.$val['lang_code']; ?>"><?php echo $val['lang_code']; ?></a></li>
										<?php } ?>

									</ul>
								</li>
							</ul>
						</div>
					<span onclick="openNav()" class="pull-right nav_icon_mob"><i class="fa fa-align-justify" aria-hidden="true"></i></span>
					</div>
					
					<?php } else { if(!empty($userDetails)){
						if($userDetails->row()->photo!='')
						{
							$pro_pic=base_url().'images/site/profile/'.$userDetails->row()->photo;
						}
						else
						{
							$pro_pic=base_url().'images/site/profile/avatar.png';
						}
						if($userDetails->row()->first_name!='')
						{
							$first_name=$userDetails->row()->first_name;
						}
						else
						{
							$first_name='Guest';
						}		
					?>
				<div class="col-md-9 col-sm-8 col-xs-4 login_aft">	
					<div id="mySidenav" class="sidenav">
						  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<div class="dropdown drop_custom pull-right dropdown_header">
						<img class="header_logo_ajax" src="<?php echo $pro_pic;?>">
						<a href="javascript:void(0);" class="dropdown-toggle drop_head_title" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo BASEURL;?>dashboard"><?php echo get_lang_site_key($lang_key,"header_footer_lang","dashboard"); ?></a></li>
							<li><a href="<?php echo BASEURL;?>account"><?php echo get_lang_site_key($lang_key,"header_footer_lang","my_account"); ?></a></li>
							<li><a href="<?php echo BASEURL;?>logout"><?php echo get_lang_site_key($lang_key,"header_footer_lang","logout"); ?></a></li>
						  </ul>
					</div>	
					<div class="clearfix"></div>
					<a href="<?php echo BASEURL;?>inbox" class="msg_icon"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="notify_msg"></span> </a>
					<div class="col-md-9 col-sm-8 col-xs-12 login">
						<ul class="list-inline pull-right">
						<li class="language dropdown"><a href="#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang_key; ?>  <img src="<?php echo base_url();?>images/site/arrow.png"></a>
							<ul class="dropdown-menu" aria-labelledby="dLabel">
								<?php foreach($lang_data as $val){ ?>
									<li><a href="<?php echo base_url().'site/language/lang_set/'.$val['lang_code']; ?>"><?php echo $val['lang_code']; ?></a></li>
								<?php } ?>

							</ul>
						</li>
					</ul>
				</div>
				</div>
				<span onclick="openNav()" class="pull-right nav_icon_mob"><i class="fa fa-align-justify" aria-hidden="true"></i></span>
				</div>
				<?php }} ?>
					
					
				</div>
            </div>
		</div>

		<script type="text/javascript">
			
			/* Open the sidenav */
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
		</script>
	</header>