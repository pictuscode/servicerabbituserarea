<?php $this->load->view('site/common/header');	?>
		<section>
		<div class="clearfix"></div>
			<div class="contact_us_base">
				<div class="container">
					<div class="contact_detail_inner col-md-12 col-sm-12 col-xs-12 text-center">
						<h1><?php  echo get_lang_site_key($lang_key,"header_footer_lang","contact_us") ?></h1>
						<div class="contact_fields">
						 <?php
								$attributes = array('method' => 'post', 'id' => 'contact-form');
								echo form_open('#', $attributes); ?>
																			
									<div class="col-md-12 col-sm-12 col-xs-12 contact_text">
											<input type="text" placeholder="<?php  echo get_lang_site_key($lang_key,"common_lang","name") ?>" name="name" id="name" class="error">
											<label for="name" generated="true" class="error"></label>
									</div>
									 <div class="col-md-12 col-sm-12 col-xs-12 contact_text">
											<input type="text" placeholder="<?php  echo get_lang_site_key($lang_key,"common_lang","email") ?>" name="email" id="email" class="error"><label for="email" generated="true" class="error"></label>
									</div>
									 <div class="col-md-12 col-sm-12 col-xs-12 contact_text">
											<input type="text" placeholder="<?php  echo get_lang_site_key($lang_key,"common_lang","mobile_no") ?>" name="phone" id="phone" class="error"><label for="phone" generated="true" class="error"></label>
									</div>
									 <div class="col-md-12 col-sm-12 col-xs-12 contact_text">
											<textarea placeholder="<?php  echo get_lang_site_key($lang_key,"common_lang","msg") ?>" name="message" id="message" class="error"></textarea>					<label for="message" generated="true" class="error"></label><br>
									</div>
									 <div class="col-md-12 col-sm-12 col-xs-12 contact_text">
											<button id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php  echo get_lang_site_key($lang_key,"common_lang","wait_process") ?>..." class="submit_btn" type="submit"> <?php  echo get_lang_site_key($lang_key,"common_lang","send_now") ?></button>	
									</div>
										</form>
						</div>
					</div>
				</div>   
			</div>
			<div class="clearfix"></div>
			
	</section>
	<script>
	$(document).ready(function() {
    $.validator.addMethod("nameRegex", function(value, element) {
        return this.optional(element) || /^[a-z\- . ]+$/i.test(value);
    }, "<?php echo  get_lang_site_key($lang_key,"common_lang","name_letter") ?>.");
    $.validator.addMethod("number", function(value, element) {
        return this.optional(element) || /^[0-9\-( ) + ]+$/i.test(value);
    }, "<?php echo  get_lang_site_key($lang_key,"common_lang","number_validate") ?>.");
    $("#contact-form").validate({
        errorElement: "label",
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true,
                minlength: 8,
                maxlength: 15
            },
            message: {
                required: true,
                minlength: 3,
                maxlength: 1000
            }
        },
        messages: {
            name: {
                required: "<?php echo  get_lang_site_key($lang_key,"common_lang","require_name") ?>",
                minlength: "<?php echo  get_lang_site_key($lang_key,"common_lang","min_3") ?>",
                maxlength: "<?php echo  get_lang_site_key($lang_key,"common_lang","max_50") ?>"
            },
            email: {
                required: "<?php echo  get_lang_site_key($lang_key,"common_lang","required_mail") ?>",
                email: "<?php echo  get_lang_site_key($lang_key,"common_lang","valid_mail") ?>"
            },
            phone: {
                required: "<?php echo  get_lang_site_key($lang_key,"common_lang","required_mobile") ?>",
                number: " <?php echo  get_lang_site_key($lang_key,"common_lang","validate_num") ?>",
                minlength: "<?php echo  get_lang_site_key($lang_key,"common_lang","min_8") ?>",
                maxlength: "<?php echo  get_lang_site_key($lang_key,"common_lang","max_15") ?>"
            },
            message: {
                required: "<?php echo  get_lang_site_key($lang_key,"common_lang","enter_msg") ?>",
                minlength: "<?php echo  get_lang_site_key($lang_key,"common_lang","min_3") ?>",
                maxlength: "<?php echo  get_lang_site_key($lang_key,"common_lang","max_1000") ?>"
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
            $('#load').html($('#load').attr('data-loading-text'));
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>site/landing/save_contactus",
                dataType: "json",
                timeout: 500000,
                data: $('#contact-form').serialize(),
                success: function(json) {
                    if (json.result == '1') {
                        swal({
                            title: "<?php echo  get_lang_site_key($lang_key,"common_lang","success") ?>",
                            text: "<?php echo  get_lang_site_key($lang_key,"common_lang","enquiry_success") ?>.",
                            type: "success"
                        }, function() {
                            location.href = '<?php echo base_url();?>';
                        });
                        return false;
                    } else if (json.result == '0') {
                        swal({
                                title: "<?php echo  get_lang_site_key($lang_key,"common_lang","oops") ?>",
                                text: "<?php echo  get_lang_site_key($lang_key,"common_lang","system_busy") ?>",
                                type: "error"
                            }, function() {
                                location.href = '<?php echo base_url();?>';
                            }

                        );
                    }
                }
            });
        }
    });
});
	</script>
<?php $this->load->view('site/common/footer');?>